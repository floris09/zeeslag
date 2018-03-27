<?php
  require_once('../../initialize.php');

  global $db;

  $sql = "SELECT * FROM categories";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  $categories = [];

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $category = new Category();
      $category->id = $row['id'];
      $category->name = $row['name'];

      $categories[] = $category;
    }
  }

  $categories = json_encode($categories);
  echo $categories;

  ob_end_flush();
 ?>
