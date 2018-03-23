<?php

class User {
  public $id;
  public $email;
  public $username;
  public $admin;
  public $firstname;
  public $lastname;
  public $image_url;
}

class Category {
  public $id;
  public $name;
}

class Location {
  public $id;
  public $name;
  public $coordinates;
}

class Product {
  public $id;
  public $user_id;
  public $location_id;
  public $category_id;
  public $name;
  public $image_url = 'http://res.cloudinary.com/florismeininger/image/upload/v1521731445/marketplace/imageplaceholder.png';
  public $description;
  public $price;
  public $type;
  public $state;
  public $size;
  public $color;
  public $brand;
  public $coordinates;
}

class Surfboard extends Product {
  public $volume;
}

 ?>
