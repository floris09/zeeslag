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

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
  <link rel='stylesheet' href=<?= '../styles/style.css?'.time(); ?> />
  <title>Flonani Bank</title>

  <script src="../../private/js/functions.js"></script>
</head>
<body>
    <a href='index.php?logout=true'><div class="nav-div">Log Out</div></a>

    Bedrag   <input type='number' id='waarde'>
    Naar rekening <input type='number' id='naarRekening'>
    Opmerking     <input type='textarea' id='opmerking'>
    <input type='button' onclick='transactie(<?= $_GET['reknr'] ?>)' value='Overmaken'>

    <div id='transacties'>
      <?php
      $dao = new MegaDAO();
      $results = $dao->getRekeningTransacties($_GET['reknr']);
      $results = json_decode($results); ?>

      <table>
        <tr>
          <th>Van rekening</th>
          <th>Naar rekening</th>
          <th>Bedrag</th>
          <th>Tijdstip</th>
          <th>Opmerking</th>
        </tr>

      <?php
      foreach ($results as $result) :
        $van = $result->vanRekening;
        $naar = $result->naarRekening;
        $waarde = $result->waarde;
        $timestamp = $result->timestamp;
        $opmerking = $result->opmerking;
      ?>
        <tr>
          <td><?= rekeningNr($van) ?></td>
          <td><?= rekeningNr($naar) ?></td>
          <td><?= $waarde ?></td>
          <td><?= $timestamp ?></td>
          <td><?= $opmerking ?></td>
        </tr>
      <?php
        endforeach;
      ?>
      </table>
    </div>
</body>

</html>
