<?php
  require_once('../../initialize.php');

  global $db;
  $id = $_SESSION['user']['id'];

  $sql = "SELECT * FROM products ";
  $sql .= "WHERE user_id = $id";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  $products = [];

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $product = new Product();
      $product->id = $row['id'];
      $product->user_id = $row['user_id'];
      $product->location_id = $row['location_id'];
      $product->category_id = $row['category_id'];
      $product->name = $row['name'];
      $product->image_url = $row['image_url'];
      $product->description = $row['description'];
      $product->price = $row['price'];
      $product->type = $row['type'];
      $product->state = $row['state'];
      $product->size = $row['size'];
      $product->color = $row['color'];
      $product->brand = $row['brand'];
      $product->coordinates = $row['coordinates'];

      $products[] = $product;
    }
  }

  $products = json_encode($products);
  echo $products;

  ob_end_flush();
 ?>
