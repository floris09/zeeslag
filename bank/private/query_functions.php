<?php

function find_user($username) {
  global $db;

  $sql = "SELECT * FROM fn_users ";
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

function create_user($obj) {
  global $db;

  $sql = "INSERT INTO fn_users ";
  $sql .= " (username, password, bank_id, admin, voornaam, achternaam, ";
  $sql .= " bsn, geboorteDatum, adres, emailAdres) VALUES (";
  $sql .= " '$obj->username', '$obj->password', '$obj->bank_id', '0', ";
  $sql .= " '$obj->voornaam', '$obj->achternaam', '$obj->bsn', '$obj->geboorteDatum', ";
  $sql .= " '$obj->adres', '$obj->emailAdres' ";
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
 ?>
