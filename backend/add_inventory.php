<?php
include("../config/connection.php");
session_start();
$user_id=$_SESSION['user_id'];
$food_id=$_POST['food_id'];
$item_name=$_POST['item_name'];
$quantity=$_POST['quantity'];
$expiry_date=$_POST['$expiry_date'];
$storage_location=$_POST['storage_location'];
$add_inventory="INSERT into fooditem VALUE ('$food_id','$user_id','$item_name', '$quantity','$expiry_date','$storage_location')";
var_dump($add_inventory); exit;
// var_dump($user_id); exit;
// $_POST[''];