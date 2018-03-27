<?php
  require_once('../../initialize.php');

  global $db;

  $sql = "SELECT * FROM locations ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  $categories = [];

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $location = new Location();
      $location->id = $row['id'];
      $location->name = $row['name'];
      $location->coordinates = $row['coordinates'];

      $locations[] = $location;
    }
  }

  $locations = json_encode($locations);
  echo $locations;

  ob_end_flush();
 ?>
