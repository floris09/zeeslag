<?php
  require_once('../../initialize.php');
  require_once('../../cloudinary/Cloudinary.php');
  require_once('../../cloudinary/Uploader.php');
  require_once('../../cloudinary/Api.php');

  if(isset($_POST['data'])){

    header("Content-type: application/json; charset=UTF-8");
    $obj = json_decode($_POST['data'],false);

    $user_id = $_SESSION['user']['id'];
    $location_id = $obj->location_id;
    $category_id = $obj->category_id;
    $name = $obj->name;
    $image_url = $obj->image_url;
    $description = $obj->description;
    $price = $obj->price;
    $state = $obj->state;
    $size = $obj->size;
    $color = $obj->color;
    $brand = $obj->brand;

    global $db;
    print_r($_FILES["file"]);

    $result = \Cloudinary\Uploader::upload($image_url);

    $sql = "INSERT INTO products ";
    $sql .= "(user_id, location_id, category_id, name, image_url, description, ";
    $sql .= "price, state, size, color, brand) VALUES ";
    $sql .= "('$user_id', '$location_id', '$category_id', '$name', ";
    $sql .= "'$image_url', '$description', '$price', ";
    $sql .= "'$state', '$size', '$color', '$brand' )";

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
