<script>

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         var categories = JSON.parse(xhttp.responseText);
         console.log(categories);

         categories.forEach(function(category){
           var div = document.createElement("div");
           div.id = 'cat-'+category.id;
           div.innerHTML = category.name;
           var container = document.getElementById('categories');
           container.appendChild(div);
         });
      }
  };
  xhttp.open("GET", "../../private/actions/categories/getAll.php", true);
  xhttp.send();


</script>

<div id='categories'></div>
