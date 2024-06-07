<?php
session_start();
include("../config/connection.php");
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    // $role = $_POST['role'];
    $sql = "SELECT * FROM users WHERE email='$email' AND `password`='$password' ";
    $result = mysqli_query($connect, $sql) or die("Failed!");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['user_id'] = $row['user_id'];
        header("location: ../views/dashboard.php");
        // header("loc")
        // if ($_SESSION['email'] == "hassan@hassan.com") {
            // header("location: customer_dashboard.php");
            // echo "Connection done!";
        // } else {

            // header("location: admin_dashboard.php");
    } else {
        echo "<script>alert('Invalid Credentials');";
        echo "setTimeout(function() {window.location.href='../pages/sign-in.php';}, 1) </script>";
        // echo "<p class='mt-2 text-center text-danger fst-italic'>Invalid Username or Password!</p>";
    }
}
