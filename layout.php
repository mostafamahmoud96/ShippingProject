<?php 
session_start();
session_destroy();
// Redirect to the login page:
header('Location:/shippingProject/login.php');
exit();
 ?>