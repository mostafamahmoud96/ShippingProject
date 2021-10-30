<<<<<<< HEAD
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
=======
<?php 
// session_start();
// require "connection.php"?>
<?php
// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//         $adminUsername = $_POST['user_email'];
//         $adminPassword =  $_POST['user_password'];
//         $query= "SELECT * FROM `login` WHERE email= ? AND password= ? AND groupid !=0";
//         $stmt= $connect->prepare($query);
//         $stmt->execute(array($adminUsername , $hashedPass));
//         /*
//          ** $rowCount() -> boolen function return 1 if data in DB | 0 if data doesn't in DB
//         */
//         $count= $stmt->rowCount();
        
//         $row= $stmt->fetch();
        
//         $inDb= 1 ;
//         if ($count == $inDb){
//           //   $_SESSION['USER_ID'] = $row['userid'];
//           //   $_SESSION['USER_NAME'] = $adminUsername;
//             $_SESSION['EMAIL'] = $row['email'];
//           //   $_SESSION['FULL_NAME'] = $row['fullname'];
//           //   $_SESSION['GROUP_ID'] = $row['groupid'];
//             header("location:layout.php");
//             exit();
//         }

//     }
    ?>

<!-- <div class="container">
        <h2 class="text-center"><?= $lang['admin_login'] ?></h2>
        <!-- Language -->
        <section class="lang-choice">
            <a href="?lang=en">English</a>
            <a href="?lang=ar">العربية</a>
        </section>
        <!-- /Language -->
        <section class="login border-top">
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><?= $lang['username'] ?></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="user_email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><?= $lang['password'] ?></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="user_password">
                </div>
                <button type="submit" class="btn btn-primary"><?= $lang['submit'] ?></button>
            </form>
        </section>
    </div> -->
>>>>>>> e97933fe9f144bd7ed60cb1469f40bbb3beecbab
