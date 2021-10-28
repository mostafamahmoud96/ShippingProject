<?php
// include "login.php";
include("connection.php");

if (isset($_POST['login'])) {
   session_start();
   $email = $_POST['email'];
   $password = $_POST['password'];
   $query = "SELECT * FROM `login` WHERE `email`='$email' and `password`='$password' ";
   // echo $query;
   $stmt = $db->prepare($query);
   $result = $stmt->execute();
   $count = $stmt->rowCount();
   
   // echo 'started'.$count;
   if ($count > 0) {
         //   echo "<script language='javascript' type='text/javascript'> location.href='index.php?title=profile' </script>";   
      $_SESSION['user_mail'] = $email;
      // echo $_SESSION['user_mail'];
   } else {
      echo  "faild";

             echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
   }
}

if (isset($_POST['logout'])) {
   session_start();
   session_destroy();
   echo "logout";
   // echo "<script language='javascript' type='text/javascript'> Location.href='login.php'</script>";
}
