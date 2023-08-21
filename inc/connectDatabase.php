<?php

//mysqli_connect("link of the database", "username of the database", "password of the database", "name of the database");

// $con = mysqli_connect("localhost","statsappuser","HVu4tjKGaMSZEiX","statsapp");
$con = mysqli_connect("localhost","root","","statsapp");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
