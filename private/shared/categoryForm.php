
<script>

  function submit(){
    var obj = {};
    obj.name = document.getElementById('name').value;
    data = JSON.stringify(obj);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log('successfully created');

            var id = xhttp.responseText;
            var div = document.createElement("div");
            div.id = 'cat-'+id;
            div.innerHTML = obj.name;

            var editDiv = document.createElement("div");
            editDiv.className = 'icon';
            editDiv.onclick = editCategory.bind(this, id, div);

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
            container.appendChild(div);
            div.appendChild(editDiv);
            div.appendChild(delDiv)
        }
    };
    xhttp.open("POST", "../../private/actions/categories/create.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("data="+data);
  }

  function deleteCategory(id, div){
    var obj = {};
    obj.id = id;
    data = JSON.stringify(obj);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("successfully deleted");

          var parent = div.parentNode;
          parent.removeChild(div);
        }
    };
    xhttp.open("POST", "../../private/actions/categories/delete.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("data="+data);
  }

  function editCategory(){}

</script>

<input type='text' id='name' placeholder='Category name...'>
<button onclick='submit()'> Create </button>

<p id='message'></p>
