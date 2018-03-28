<?php require_once('./private/initialize.php'); ?>

<!DOCTYPE html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href=<?= './public/styles/style.css?'.time(); ?> />
  <title>Flonani Bank</title>

</head>

<body id='login-body'>

<h3>Log In</h3>
<?php include(SHARED_PATH . '/login.php'); ?>
<br>

<h3>Register</h3>
<?php include(SHARED_PATH . '/register.php'); ?>

</body>

<?php include(SHARED_PATH . '/footer.php'); ?>
