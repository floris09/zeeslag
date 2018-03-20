
<script>

  function submit(){
    var obj = {};
    obj.name = document.getElementById('name').value;
    data = JSON.stringify(obj);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log('successfully created');

            var div = document.createElement("div");
            div.id = 'cat-'+xhttp.responseText;
            div.innerHTML = obj.name;
            var container = document.getElementById('categories');
            container.appendChild(div);
        }
    };
    xhttp.open("POST", "../../private/actions/categories/create.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("data="+data);
  }

</script>

<input type='text' id='name' placeholder='Name...'>
<button onclick='submit()'> Create </button>

<p id='message'></p>
