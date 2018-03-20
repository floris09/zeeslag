<script>

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         var categories = JSON.parse(xhttp.responseText);
         console.log(categories);

         categories.forEach(function(category){
           var div = document.createElement("div");
           var id = category.id;
           div.id = 'cat-'+id;

           var nameDiv = document.createElement("div");
           nameDiv.innerHTML = category.name;
           nameDiv.className = 'inline';

           var editDiv = document.createElement("div");
           editDiv.className = 'icon';
           editDiv.onclick = editCategory.bind(this, id, nameDiv);

           var edit = document.createElement("i");
           edit.className = "fas fa-pen-square";

           editDiv.appendChild(edit);

           var delDiv = document.createElement("div");
           delDiv.className = 'icon';
           delDiv.onclick = deleteCategory.bind(this, id, div);

           var del = document.createElement("i");
           del.className = "fas fa-trash-alt";

           delDiv.appendChild(del);

           var container = document.getElementById('categories');
           div.appendChild(editDiv);
           div.appendChild(delDiv);
           div.appendChild(nameDiv);
           container.appendChild(div);
         });
      }
  };
  xhttp.open("GET", "../../private/actions/categories/getAll.php", true);
  xhttp.send();


</script>


<div id='categories'></div>
