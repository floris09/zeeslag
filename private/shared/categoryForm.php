<?php






 ?>


<script>

  function submit(){
    var data = {};
    data.name = document.getElementById('name').value;
    data = JSON.stringify(data);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           document.getElementById("message").innerHTML = xhttp.responseText;
           console.log(xhttp);
        }
    };
    xhttp.open("POST", "/qien/marketplace/private/categories/create.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("data="+data);
  }

</script>

<input type='text' id='name' placeholder='Name...'>
<button onclick='submit()'> Create </button>

<p id='message'></p>
