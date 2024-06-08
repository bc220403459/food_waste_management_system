<?php
session_start();
include("../config/connection.php");
if (isset($_POST['submit'])) {
    // $email = mysqli_real_escape_string($connect, $_POST['email']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email' AND `password`='$password' ";
    $result = mysqli_query($connect, $sql) or die("Failed!");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['user_id'] = $row['user_id'];
        if ($_SESSION['username']=='admin' && $_SESSION['password']='admin@123_'){
            header("location: ../views/admin_dashboard.php");
        }
        else{
            header("location: ../views/dashboard.php");
        }
    } else {
        echo "<script>alert('Invalid Credentials');";
        echo "setTimeout(function() {window.location.href='../pages/sign-in.php';}, 1) </script>";
    }
}
