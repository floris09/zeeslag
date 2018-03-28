<?php
  require_once('../../initialize.php');


  if(isset($_POST['data'])){

    header("Content-type: application/json; charset=UTF-8");
    $obj = json_decode($_POST['data'],false);

    $dao = new MegaDAO();
    $result = $dao->createRekening($obj);
    echo $result;
  }

  ob_end_flush();

 ?>
