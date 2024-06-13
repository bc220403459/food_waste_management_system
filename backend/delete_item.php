<?php
session_start();
include ("../config/connection.php");
$item_id=$_POST['item_id'];
var_dump($item_id); exit;
$query="DELETE FROM `fooditem` WHERE item_id=$item_id";
var_dump($query); exit;
$delete_item=mysqli_query($connect,$query);
if ($delete_item){
    $_SESSION['message']='Item deleted successfully!';
    header("location:../views/user_dashboard/view_inventory.php");
}
