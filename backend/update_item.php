<?php
session_start();
include ('../config/connection.php');
include ('../core/functions.php');

$id = $_GET['id']; 

// dd($id);




// var_dump($item_id); exit;

$query="UPDATE `fooditem` SET user_id=$user_id, item_name=$item_name,quantity=$quantity,`expiry_date`=$expiry_date,`storage_location` =$storage_location WHERE item_id=$id";
dd($query);
