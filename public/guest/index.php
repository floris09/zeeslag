<?php require_once('../../private/initialize.php');

include(SHARED_PATH . '/header.php');

if (!isset($_SESSION['user'])){
  header('Location: ../index.php');
}

if (isset($_GET['logout'])) {
  logout();
  header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href=<?= '../styles/style.css?'.time(); ?> />
  <link rel="stylesheet" media="screen and (min-width: 900px)" href=<?= "./styles/widestyle.css?".time(); ?> >
  <title>Market Place</title>

</head>
<body>

  <a href='index.php?logout=true'><p>LOGOUT</p></a>

</body>

<?php include(SHARED_PATH . '/footer.php'); ?>
