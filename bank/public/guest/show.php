<?php require_once('../../private/initialize.php');

$userId = $_SESSION['user']['id'];
$reknr = test_input($_GET['reknr']);

$dao = new MegaDAO();

$rekening = $dao->getRekening($reknr);
$rekening = json_decode($rekening);

if($rekening->gebruiker_id != $userId){
  header("Location: ./index.php");
}

echo rekeningNr($rekening->rekeningNummer) . '<br>';
echo $rekening->waarde;


 ?>
