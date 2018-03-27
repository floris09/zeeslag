<?php
  require_once('../../initialize.php');


  if(isset($_POST['data'])){

    header("Content-type: application/json; charset=UTF-8");
    $obj = json_decode($_POST['data'],false);

    global $db;

    $sql = "UPDATE products ";
    $sql .= "SET name='$obj->name' ";
    $sql .= "WHERE id='$obj->id'";

    $result = mysqli_query($db, $sql);
    if ($result) {
      echo "successfully updated product with id ". $db->insert_id;
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }

  }

  ob_end_flush();
 ?>
