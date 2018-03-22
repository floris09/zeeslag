<?php

  function getAllCategories(){
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
    return $categories;
  }


  function getAllProducts(){
    global $db;

    $sql = "SELECT * FROM products";
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
    return $products;
  }

  function getRecentProducts($limit){
    global $db;

    $sql = "SELECT * FROM products ";
    $sql .= "ORDER BY id DESC ";
    $sql .= "LIMIT $limit";
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
    return $products;
  }


  function getAllSurfboards(){
    global $db;

    $sql = "SELECT * FROM surfboards";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $surfboards = [];

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
        $product->volume = $row['volume'];

        $surfboards[] = $surfboard;
      }
    }

    $surfboards = json_encode($surfboards);
    return $surfboards;
  }

  function getRecentSurfboards($limit){
    global $db;

    $sql = "SELECT * FROM surfboards ";
    $sql .= "ORDER BY id DESC ";
    $sql .= "LIMIT $limit";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $surfboards = [];

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
        $product->volume = $row['volume'];

        $surfboards[] = $surfboard;
      }
    }

    $surfboards = json_encode($surfboards);
    return $surfboards;
  }


  function find_user($username) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_children($child_table, $foreign_key, $foreign_key_id) {
    global $db;

    $sql = "SELECT * FROM $child_table ";
    $sql .= "WHERE $foreign_key=$foreign_key_id";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function create_user($username,$password,$wedding_id) {
    global $db;

    $sql = "INSERT INTO users ";
    $sql .= " (username, password, wedding_id, admin) VALUES (";
    $sql .= " '$username', '$password', '$wedding_id', '0' ";
    $sql .= " ) ";

    $result = mysqli_query($db, $sql);
    if ($result) {
      echo "User successfully created.";
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }


  function delete_children($child_table, $foreign_key, $foreign_key_id){
    global $db;

    $sql = "DELETE FROM $child_table ";
    $sql .= "WHERE $foreign_key=$foreign_key_id";

    $result = mysqli_query($db, $sql);
    if ($result) {
      echo "Successfully deleted children.";
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }
