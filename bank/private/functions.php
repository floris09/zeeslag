<?php

function urlFor($script_path) {
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function logout(){
  session_destroy();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function rekeningNr($id){
  switch(strlen($id)){
    case 1:
      return "FNB0000" . $id;
      break;
    case 2:
      return "FNB000" . $id;
      break;
    case 3:
      return "FNB00" . $id;
      break;
    case 4:
      return "FNB0" . $id;
      break;
    case 5:
      return "FNB" . $id;
      break;
  }
}

?>
