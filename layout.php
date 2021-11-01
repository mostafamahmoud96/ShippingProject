<?php 
session_start();
session_destroy();
header('Location:/ShippingProject/login.php');
exit();
 ?>