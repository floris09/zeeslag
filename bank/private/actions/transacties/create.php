<?php
  require_once('../../initialize.php');


  if(isset($_POST['data'])){

    header("Content-type: application/json; charset=UTF-8");
    $obj = json_decode($_POST['data'],false);

    $dao = new MegaDAO();
    $getRekening = $dao->getRekening($obj->vanRekening);
    $getRekening = json_decode($getRekening);

    if($getRekening->gebruiker_id == $_SESSION['user']['id'] && isset($obj->naarRekening)){
      $dao = new MegaDAO();
      echo $dao->createTransactie($obj);
    } elseif(!isset($obj->naarRekening)) {
      echo 'Geen rekeningnummer ingevuld';
    } else {
      header("Location: ../../../public/index.php");
    }

  }

  ob_end_flush();

 ?>
