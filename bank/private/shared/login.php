<?php
  $errorMessage = '';

  if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $query = find_user($username);
    $user = mysqli_fetch_assoc($query);
    $hash = $user["password"];
    $valid = password_verify($_POST["password"],$hash);
    $admin = $user["admin"] == 1;

    if ($valid && $admin) {
      $_SESSION['user'] = $user;
      header('Location: ./public/admin/index.php');
    } elseif ($valid) {
      $_SESSION['user'] = $user;
      header('Location: ./public/guest/index.php');
    } else {
      $errorMessage = "Incorrect username and/or password. Please try again.";
    }
  }
 ?>

<div class='form-container'>
  <p class='error'><?= $errorMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type='text' id='username' name='username' placeholder='Username...'>

    <input type='password' id='password' name='password' placeholder='Password...'>

    <input type='submit' name='login' value='submit'>
  </form>
</div>
