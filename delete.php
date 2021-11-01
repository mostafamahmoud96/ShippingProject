<?php
session_start();
include("connection.php");

if ($_GET['sub']== 'item')
{
    $sql = "DELETE FROM shipped_items ";
    $sql .= "WHERE id='" . $_GET['id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($conn, $sql);
    echo "<script>window.location.href='http://localhost/ShippingProject/?sub=items&title=list';</script>";
   
} 
elseif ($_GET['sub'] == 'trans'){
    $sql = "DELETE FROM transportation_events ";
    $sql .= "WHERE id='" . $_GET['id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "askldn";
    }
    echo "<script>window.location.href='http://localhost/ShippingProject/?sub=trans&title=list';</script>";

}
elseif($_GET['sub'] == 'retails'){
    $sql = "DELETE FROM retail_center ";
    $sql .= "WHERE id='" . $_GET['id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($conn, $sql);
    echo "<script>window.location.href='http://localhost/ShippingProject/?sub=retails&title=list';</script>";

} elseif ($_GET['sub'] == 'Track') {
    // echo $_GET['id'];
    $sql = "DELETE FROM item_transportation ";
    $sql .= "WHERE id='" . $_GET['id'] . "' ";
    $sql .= "LIMIT 1";
    // echo $sql ;
    $result = mysqli_query($conn, $sql);
    echo "<script>window.location.href='http://localhost/ShippingProject/?title=list&sub=track';</script>";
}