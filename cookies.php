<?php
    if(isset($_COOKIE['login']))
    {

    }
    else
    {
        header ('location: index.php');
    }
    if(isset($_POST['login']))
    {
        setcookie('email');
        setcookie('password');
    }
?>
