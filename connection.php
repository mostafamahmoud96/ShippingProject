<?php

$dsn = "mysql:dbname=shipping;dbhost=127.0.0.1;dbport=3306";

define("dbuser","root");
define("dbpassword","root");
try
{$db=new PDO($dsn,dbuser,dbpassword);
$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// echo "connected";
}
catch(PDOException $e){
    die ("error couldnt connect". $e -> getMessage());
}
?>
