<?php
    if(isset($_COOKIE['login']))
    {

    }
    else
    {
        header ('location: login.php');
    }
    if(isset($_POST['login']))
    {
        setcookie('email');
        setcookie('password');
        // setcookie('userRole');
    }
?>
<!-- <script>
    if(localStorage.getItem('remember')=='true')
    {
        
    }
    else
    {
        header ('location: login.php');
    }
</script> -->