<?php
// include "login.php";
include_once("connection.php");

if (isset($_POST['login'])) {
   session_start();
  
   $email = $_POST['email'];
   $password = $_POST['password'];
   $query = "SELECT * FROM `login` WHERE `email`='$email' and `password`='$password' ";
   $stmt = $db->prepare($query);
   $result = $stmt->execute();
   $count = $stmt->rowCount();
   if ($count > 0) {
           echo "<script language='javascript' type='text/javascript'> location.href='layout.php' </script>";   
      $_SESSION['user_mail'] = $email;
      echo $_SESSION['user_mail'];
   } else {
      echo  "faild";

             echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
   }



}

if (isset($_POST['logout'])) {
   session_start();
   unset($_SESSION['user_mail']); 
   session_destroy();
   header("Location:index.php");
   echo "logout";
   // echo "<script language='javascript' type='text/javascript'> Location.href='login.php'</script>";
}
