
<script>

  function createCategory(){
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

            var nameDiv = document.createElement("div");
            nameDiv.innerHTML = obj.name;
            nameDiv.className = 'inline';
            div.appendChild(nameDiv);

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

  function editCategory(id, nameDiv){
    var input = document.createElement('input');
    input.placeholder = 'New name...';
    input.id = 'edit';

    var submit = document.createElement('button');
    submit.innerHTML = 'Submit';

    var parent = nameDiv.parentNode;
    parent.appendChild(input);
    parent.appendChild(submit);
    submit.onclick = editSubmit.bind(this, id, nameDiv, parent, input, submit);
  }

  function editSubmit(id, nameDiv, parent, input, submit){
    var obj = {};
    obj.id = id;
    var value = document.getElementById('edit').value;
    obj.name = value;
    data = JSON.stringify(obj);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("successfully updated");

          nameDiv.innerHTML = value;

          parent.removeChild(input);
          parent.removeChild(submit);
        }
    };
    xhttp.open("POST", "../../private/actions/categories/update.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("data="+data);
  }

</script>

<input type='text' id='name' placeholder='Category name...'>
<button onclick='createCategory()'> Create </button>

<p id='message'></p>
