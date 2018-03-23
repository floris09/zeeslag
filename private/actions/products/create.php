<?php
  require_once('../../initialize.php');


  if(isset($_POST['data'])){

    header("Content-type: application/json; charset=UTF-8");
    $obj = json_decode($_POST['data'],false);

    $user_id = $_SESSION['user']['id'];

    global $db;

    $sql = "INSERT INTO products ";
    $sql .= "(user_id, location_id, category_id, name, image_url, description, ";
    $sql .= "price, type, state, size, color, brand) VALUES ";
    $sql .= "($user_id, )";


    VALUE ('$obj->name')";

    $result = mysqli_query($db, $sql);
    if ($result) {
      echo $db->insert_id;
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }

  }

  ob_end_flush();
 ?>
