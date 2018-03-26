<?php require_once('../../private/initialize.php');

if (!isset($_SESSION['user'])){
  header('Location: ../index.php');
}

if (isset($_GET['logout'])) {
  logout();
  header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Cagliostro" rel="stylesheet">
  <link rel='stylesheet' href=<?= '../styles/style.css?'.time(); ?> />
  <link rel="stylesheet" media="screen and (min-width: 900px)" href=<?= "../styles/widestyle.css?".time(); ?> >
  <title>Market Place</title>

  <script>

    function addProduct(){

      var icon = document.getElementById('addIcon');
      icon.style = 'animation-name: rotate-right';
      icon.onclick = closeForm;

      var formFields = ['name', 'category', 'location', 'description', 'price', 'type', 'state', 'size', 'color', 'brand', 'image'];

      var addForm = document.createElement('div');
      addForm.id = 'productForm';

      var name = document.createElement('input');
      name.type = 'text'; name.id = 'name'; name.placeholder = 'Name...';
      addForm.appendChild(name);

      var select = document.createElement('select');
      select.id = 'category';
      addForm.appendChild(select);

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
             var categories = JSON.parse(xhttp.responseText);
             categories.forEach(function(category){
               var option = document.createElement('option');
               option.value =  category.id;
               option.innerHTML = category.name;
               select.appendChild(option);
             })
             };
          }

      xhttp.open("GET", "../../private/actions/categories/getAll.php", true);
      xhttp.send();

      var selectLocation = document.createElement('select');
      selectLocation.id = 'location';
      addForm.appendChild(selectLocation);

      var xhttp2 = new XMLHttpRequest();
      xhttp2.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var locations = JSON.parse(xhttp2.responseText);
              locations.forEach(function(location){
                var option = document.createElement('option');
                option.value =  location.id;
                option.innerHTML = location.name;
                selectLocation.appendChild(option);
              })
              };
          }

      xhttp2.open("GET", "../../private/actions/locations/getAll.php", true);
      xhttp2.send();

      var selectState = document.createElement('select');
      selectState.id = 'state';
      addForm.appendChild(selectState);

      var stateOptions = ['Like New','Good Condition','Used'];

      stateOptions.forEach(function(state){
        var option = document.createElement('option');
        option.value =  state;
        option.innerHTML = state;
        selectState.appendChild(option);
      })

      var priceLabel = document.createElement('label');
      priceLabel.innerHTML = 'Price';
      addForm.appendChild(priceLabel);

      var price = document.createElement('input');
      price.type = 'number'; price.id = 'price';
      addForm.appendChild(price)

      var description = document.createElement('input');
      description.type = 'textarea'; description.id = 'description'; description.placeholder = 'Description...';
      addForm.appendChild(description);

      var size = document.createElement('input');
      size.type = 'text'; size.id = 'size'; size.placeholder = 'Size...';
      addForm.appendChild(size);

      var color = document.createElement('input');
      color.type = 'text'; color.id = 'color'; color.placeholder = 'Color...';
      addForm.appendChild(color);

      var brand = document.createElement('input');
      brand.type = 'text'; brand.id = 'brand'; brand.placeholder = 'Brand...';
      addForm.appendChild(brand);

      var image = document.createElement('input');
      image.type = 'file'; image.id = 'image'; image.accept = 'image/*'; image.placeholder = 'Image...'; image.multiple = true;
      addForm.appendChild(image);

      var submit = document.createElement('button');
      submit.onclick = submitProduct.bind(addForm);
      submit.innerHTML = 'Submit';
      addForm.appendChild(submit);

      var container = document.getElementById('form-container');
      container.appendChild(addForm);
    }

    function submitProduct(){
        var obj = {};
        obj.name = document.getElementById('name').value;
        obj.location_id = document.getElementById('location').value;
        obj.category_id = document.getElementById('category').value;
        obj.image_url = document.getElementById('image').value;
        obj.description = document.getElementById('description').value;
        obj.price = document.getElementById('price').value;
        obj.state = document.getElementById('state').value;
        obj.size = document.getElementById('size').value;
        obj.color = document.getElementById('color').value;
        obj.brand = document.getElementById('brand').value;

        if(document.getElementById('image').value){
          obj.image_url = document.getElementById('image').value;
        } else {
          obj.image_url = 'http://res.cloudinary.com/florismeininger/image/upload/v1521731445/marketplace/imageplaceholder.png';
        }

        data = JSON.stringify(obj);

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var form = document.getElementById('productForm');
              form.innerHTML = 'Your product has been added!';

              var id = xhttp.responseText;
              var productDiv = document.createElement('div');
              productDiv.className = 'guest-product-div';
              productDiv.id = 'prod-'+id;
              var nameDiv = document.createElement('div');
              nameDiv.className = 'guest-product-name-div';
              nameDiv.innerHTML = obj.name + '<br>' + obj.price;
              productDiv.appendChild(nameDiv);
              var imageDiv = document.createElement('div');
              imageDiv.className = 'guest-product-image-div';
              imageDiv.style = "background-image:url("+obj.image_url+")";
              productDiv.appendChild(imageDiv);

              var container = document.getElementById('guest-products-container');

              container.insertBefore(productDiv, container.firstChild);
              container.removeChild(container.lastChild);
            }
        };
        xhttp.open("POST", "../../private/actions/products/create.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("data="+data);
    }

    function closeForm(){
      var icon = document.getElementById('addIcon');
      icon.style = 'animation-name: rotate-left';
      icon.onclick = addProduct;

      var form = document.getElementById('productForm');
      form.style = 'animation-name: slide-up';

      setTimeout(function(){
        var form = document.getElementById('productForm');
        document.getElementById('form-container').removeChild(form);
        }, 500)

    }

    function userPage(id){
      var body = document.getElementById('guest-body');
      var productsContainer = document.getElementById('guests-all-products-container');
      body.removeChild(productsContainer);

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              console.log(xhttp.responseText);
              var products = JSON.parse(xhttp.responseText);

              products.forEach(function(product){
                var productDiv = document.createElement('div');
                productDiv.className = 'guest-product-div';
                productDiv.id = 'prod-'+product.id;
                var nameDiv = document.createElement('div');
                nameDiv.className = 'guest-product-name-div';
                nameDiv.innerHTML = product.name + '<br>' + product.price;
                productDiv.appendChild(nameDiv);
                var deleteDiv = document.createElement('div');
                deleteDiv.id = 'deleteDiv';
                var deleteIcon = document.createElement('i');
                deleteIcon.className = "fas fa-trash-alt";
                deleteDiv.appendChild(deleteIcon);
                nameDiv.appendChild(deleteDiv);
                var editDiv = document.createElement('div');
                editDiv.id = 'editDiv';
                var editIcon = document.createElement('i');
                editIcon.className = "fas fa-pen-square";
                editDiv.appendChild(editIcon);
                nameDiv.appendChild(editDiv);
                var imageDiv = document.createElement('div');
                imageDiv.className = 'guest-product-image-div';
                imageDiv.style = "background-image:url("+product.image_url+")";
                productDiv.appendChild(imageDiv);

                var container = document.createElement('div');
                container.id = 'guest-products-container';
                container.style = 'display:inline';

                container.appendChild(productDiv);
                body.appendChild(container);
              });
          }
        };
        xhttp.open("GET", "../../private/actions/products/getUserProducts.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    }

  </script>

</head>
<body id="guest-body">

  <div id='admin-nav'>
    <a href='index.php?logout=true'><div class="nav-div">Log Out</div></a>
    <i id='addIcon' onclick='addProduct()' class="fas fa-plus-circle nav-add-icon"></i>
    <i id=userIcon onclick='userPage(<?= $_SESSION['user']['id']?>)' class="fas fa-user-circle nav-add-icon"></i>

  </div>

  <div class='sidebar-left'>
    <?php include('../../private/shared/guestCategories.php'); ?>
  </div>


  <div id='form-container'></div>

  <div id='guests-all-products-container'>
    <?php include('../../private/shared/guestProducts.php'); ?>
  </div>
</body>

<?php include(SHARED_PATH . '/footer.php'); ?>
