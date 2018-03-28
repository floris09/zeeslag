<?php
  $errorMessage = '';

  if (isset($_POST['register'])) {
    $user = new User();
    $user->voornaam = test_input($_POST["voornaam"]);
    $user->achternaam = test_input($_POST["achternaam"]);
    $user->username = test_input($_POST["username"]);
    $user->password = password_hash(test_input($_POST["password"]), PASSWORD_DEFAULT);
    $user->bank_id = 1;
    $user->bsn = test_input($_POST["bsn"]);
    $user->geboorteDatum = test_input($_POST["geboorteDatum"]);
    $user->adres = test_input($_POST["adres"]);
    $user->emailAdres = test_input($_POST["emailAdres"]);

    $query = create_user($user);

  }
 ?>

<div class='form-container'>
  <p class='error'><?= $errorMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type='text' id='reg-username' name='username' placeholder='Username...' required>

    <input type='password' id='reg-password' name='password' placeholder='Password...' required>

    <input type='text' id='voornaam' name='voornaam' placeholder='Voornaam...'>
    <input type='text' id='achternaam' name='achternaam' placeholder='Achternaam...'>
    <input type='number' id='bsn' name='bsn' placeholder='BSN...'>
    Geboorte datum<input type='date' id='geboorteDatum' name='geboorteDatum'>
    <input type='text' id='adres' name='adres' placeholder='Adres...'>
    <input type='text' id='emailAdres' name='emailAdres' placeholder='Email adres...'>

    <input type='submit' name='register' value='submit'>
  </form>
</div>
