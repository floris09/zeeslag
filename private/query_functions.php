<?php

  function find_all($table) {
    global $db;

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

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
