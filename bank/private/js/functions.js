function nieuweRekening(id){

  var obj = {}
  obj.gebruiker_id = id;
  obj.waarde = 50000;

  var data = JSON.stringify(obj);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(xhttp.responseText);
      }
  };

  xhttp.open("POST", "../../private/actions/rekeningen/create.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("data="+data);

}
