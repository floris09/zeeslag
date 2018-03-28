// ----------------------- DOM MANIPULATION --------------------------

function createRekeningDiv(reknr, waarde){
  var div = document.createElement('div');
  div.class = 'rekening'+reknr;
  div.innerHTML = reknr + " - &euro;" + waarde;

  var container = document.getElementById('rekeningen');
  container.appendChild(div);
}

// ----------------------- RANDOM -------------------------

function rekeningNr(id){
  switch(id.length){
    case 1:
      return "FNB0000" + id;
      break;
    case 2:
      return "FNB000" + id;
      break;
    case 3:
      return "FNB00" + id;
      break;
    case 4:
      return "FNB0" + id;
      break;
    case 5:
      return "FNB" + id;
      break;
  }
}

// --------------------- REQUESTS -----------------------

function nieuweRekening(id){

  var obj = {}
  obj.gebruiker_id = id;
  obj.waarde = 50000;

  var data = JSON.stringify(obj);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(xhttp.responseText);

        var rekeningNummer = rekeningNr(xhttp.responseText);
        createRekeningDiv(rekeningNummer, obj.waarde);

      }
  };

  xhttp.open("POST", "../../private/actions/rekeningen/create.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("data="+data);

}
