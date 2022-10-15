<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "final";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
?>