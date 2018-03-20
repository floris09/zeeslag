<?php require_once('../../private/initialize.php');

$user = $_SESSION['user'];

if ($user['admin'] != 1){
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
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
  <link rel='stylesheet' href=<?= '../styles/style.css?'.time(); ?> />
  <link rel="stylesheet" media="screen and (min-width: 900px)" href=<?= "../styles/widestyle.css?".time(); ?> >
  <title>Market Place</title>

</head>
<body>

<a href='index.php?logout=true'><p>LOGOUT</p></a>

<?php include(SHARED_PATH . '/categoryForm.php'); ?>

<?php include(SHARED_PATH . '/categories.php'); ?>

</body>

<?php include(SHARED_PATH . '/footer.php'); ?>
