<?php
   if(isset($_COOKIE["login"]))
   {
    // header("location:layout.php");
   }
    else
    {
        
        if(isset($_POST['login']))
        {
            setcookie("login_email", $_POST["email"], time()+3600);
            setcookie("login_pass", $_POST["password"], time()+3600);
            
            // header("location:layout.php");
        }else{
        }
        // header("location:index.php");
        
    }
?>
