<?php
 session_start();
// include "login.php";
// echo "session";
require("connection.php");

if (isset($_POST['login']))
{     
<<<<<<< HEAD
 $email=$_POST['email'];
 $password=$_POST['password'];
//  $role = $_POST['role'];
 $query = mysqli_query($conn,"SELECT * FROM login  WHERE `email`='$email' and `password`='$password'");
=======
 $email=$_POST['user_email'];
 $password=$_POST['user_password'];
//  $role = $_POST['role'];
 $query = mysqli_query($conn,"SELECT * FROM `login`  WHERE `email`='$email' and `password`='$password'");
>>>>>>> 994deee79161b4ee295b3e7b688b8153ef541192
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
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 994deee79161b4ee295b3e7b688b8153ef541192
