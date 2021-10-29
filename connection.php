<?php
// require_once('cookies.php');
$dsn = "mysql:dbname=shipping;dbhost=127.0.0.1;dbport=3306";

define("dbuser","root");
define("dbpassword","root");
try
{
    $connect=new PDO($dsn,dbuser,dbpassword);
$connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// echo "connected";
}
catch(PDOException $e){
    die ("error couldnt connect". $e -> getMessage());
}
?>
<!-- <script>
    $(".logout").click(function () {
            $.post('cookies.php',{
                cook: 'delete'
            },function(){
               window.location.replace("index.php");
            });
        })
        </script> -->


        <?php
//database_connection.php
// $connect = new PDO("mysql:host=localhost;dbname=shipping", "root", "root");
// if($connect){
//     echo "connected";
// }
?>