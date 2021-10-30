<?php
 session_start();
// include "login.php";
// echo "session";
require("connection.php");

if (isset($_POST['login']))
{     
 $email=$_POST['user_email'];
 $password=$_POST['user_password'];
//  $role = $_POST['role'];
 $query = mysqli_query($conn,"SELECT * FROM `login`  WHERE `email`='$email' and `password`='$password'");
$count = mysqli_num_rows($query);  
// echo $count;
 if ($count >0)
 {

     echo "<script language='javascript' type='text/javascript'> location.href='layout.php' </script>";   
     $_SESSION['login_user']=$email; 
   
     $_SESSION['pass']= $password;
     
    }
    else
    {
       // echo  "faild";
      
       echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
    }
 }
 else{
    echo "<script language='javascript' type='text/javascript'> Location.href='index.php'</script>";

 }

 if (isset($_POST['logout']))
{  
    session_start();
    session_destroy();  
   // echo "logout";
    echo "<script language='javascript' type='text/javascript'> Location.href='index.php'</script>";
}
?>