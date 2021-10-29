<?php
 session_start();  
 session_destroy();  
//  header("location:index.php"); 

setcookie("login", "", time()-3600);

header("location:index.php");

?>

<?php
// session_start();
// session_unset();
// session_destroy();
// header("Location:index.php");
?>