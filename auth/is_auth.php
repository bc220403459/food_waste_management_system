<?php
if (!isset($_SESSION['username'])){
    header("location: ./pages/sign-in.php");
}
else{
    echo "Logged in";
}