<?php require_once('./private/initialize.php'); ?>

<!DOCTYPE html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href=<?= './styles/style.css?'.time(); ?> />
  <link rel="stylesheet" media="screen and (min-width: 900px)" href=<?= "./styles/widestyle.css?".time(); ?> >
  <title>Flonani Bank</title>

</head>

<body id='login-body'>

<?php include(SHARED_PATH . '/login.php'); ?>

</body>

<?php include(SHARED_PATH . '/footer.php'); ?>
