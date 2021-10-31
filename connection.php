<?php
// require_once('cookies.php');
// $dsn = "mysql:dbname=shipping;dbhost=127.0.0.1;dbport=3306";

// define("dbuser","root");
// define("dbpassword","root");
// try
// {
//     $connect=new PDO($dsn,dbuser,dbpassword);
// $connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// // echo "connected";
// }
// catch(PDOException $e){
//     die ("error couldnt connect". $e -> getMessage());
// }



$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shipping";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
    // echo "connected";
}
?>