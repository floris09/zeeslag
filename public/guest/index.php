<?php require_once('../../private/initialize.php');

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
  <link rel="stylesheet" media="screen and (min-width: 900px)" href=<?= "../styles/widestyle.css?".time(); ?> >
  <title>Market Place</title>

</head>
<body id="guest-body">

  <div id='admin-nav'>
    <a href='index.php?logout=true'><div class="nav-div">Log Out</div></a>
  </div>

    <?php include('../../private/shared/guestCategories.php'); ?>

</body>

<?php include(SHARED_PATH . '/footer.php'); ?>
