<?php
session_start();
include("connection.php");

if ($_GET['sub']== 'deleteItem')
{
    $sql = "DELETE FROM shipped_items ";
    $sql .= "WHERE id='" . $_GET['id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($conn, $sql);
    	 header("location: index.php?sub=items&title=list");   
} 
elseif ($_GET['sub'] == 'deleteTrans'){
    
    $sql = "DELETE FROM transportation_events ";
    $sql .= "WHERE id='" . $_GET['id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($conn, $sql);
    header("location :index.php?sub=trans&title=list" );

}
elseif($_GET['sub'] == 'deleteRetail'){
    $sql = "DELETE FROM retail_center ";
    $sql .= "WHERE id='" . $_GET['id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($conn, $sql);
    header("location :index.php?sub=retails&title=list");

} elseif ($_GET['sub'] == 'deleteTrack') {
    $sql = "DELETE FROM item_transportations ";
    $sql .= "WHERE id='" . $_GET['id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($conn, $sql);
    header("location :index.php?sub=track&title=list");
}