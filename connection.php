<?php
// echo "this is connection file";
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
    echo "connected successfully";
}

// Create database
$sql = "CREATE DATABASE shipping";
if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
} else {
//   die("Error creating database: " . $conn->error);
}

$conn->close();
?>
