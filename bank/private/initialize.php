<?php
  ob_start();
  session_start();

  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("ROOT_PATH", dirname(PROJECT_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  require_once(ROOT_PATH . '/private/credentials.php');
  require_once('functions.php');
  require_once('database.php');
  require_once('query_functions.php');
  require_once('models.php');

  $db = createconnection();

?>
