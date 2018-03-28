<?php require_once('../../private/initialize.php');

$user = $_SESSION['user'];

if (!isset($_SESSION['user'])){
  header('Location: ../index.php');
}

if (isset($_GET['logout'])) {
  logout();
  header('Location: ../../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
  <link rel='stylesheet' href=<?= '../styles/style.css?'.time(); ?> />
  <title>Flonani Bank</title>

  <script src="../../private/js/functions.js"></script>


</head>
<body id='guest-body'>
  <div id='formdiv'></div>
  <div id='guest-container'>
    <div id='guest-nav'>
      <a href='index.php?logout=true'><div class="nav-div">Log Out</div></a>
    </div>

    <button onclick="nieuweRekening(<?= $_SESSION['user']['id']; ?>)">Rekening Openen</button>

    <div id='rekeningen'>
      <?php
        $dao = new MegaDAO();
        $results = $dao->getUserRekeningen($_SESSION['user']['id']);
        $results = json_decode($results);

        foreach ($results as $result) {
          $reknr = $result->rekeningNummer;
          $waarde = $result->waarde;
          echo "<div class='rekening$reknr' onclick='rekeningPagina($reknr)'>" .rekeningNr($reknr). " - &euro;$waarde</div>";
        }
      ?>
    </div>

  </div>

</body>

<?php include(SHARED_PATH . '/footer.php'); ?>
