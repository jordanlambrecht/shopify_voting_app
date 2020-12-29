<?php
  $host = "localhost";
  $username = "shop_vot";
  $password = "P9@1yxf0#e4tJ0AM";
  $database = "shop_vot";
  $conn = mysqli_connect($host, $username, $password, $database);

  if(!$conn){
    die("connection error: " . mysqli_connect_error()); 
  }
?>
