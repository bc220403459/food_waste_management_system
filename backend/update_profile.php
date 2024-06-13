<?php
session_start();
// var_dump($_SESSION); exit;
include ("../config/connection.php");
include ("../core/functions.php");


if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $query = "UPDATE users SET ";
    $allowed_columns = array('username', 'f_name', 'l_name', 'email', 'password', 'dietary_preference', 'allergy_info'); // List of allowed columns
  
    foreach ($allowed_columns as $column) {
      if (isset($_POST[$column])) {  // Check if the column exists in the submitted data
        $query .= $column . " = '" . $_POST[$column] . "', ";
      }
    }
    $query = substr(trim($query), 0, -1);  // Remove trailing comma
    $query .= " WHERE user_id=$user_id";
    // echo $query; exit; // Optional for debugging
    $update_profile = mysqli_query($connect, $query);
  



// if (isset($_POST['update'])) {
//     $user_id = $_POST['user_id'];
//     $query = "UPDATE users SET ";
//     foreach ($_POST as $key => $value) {
//       // Option 1 (exclude based on column names):
//       if (!in_array($key, array('dob', 'gender'))) {  // Check if key is not in excluded list
//         $query .= $key . " = '" . $value . "', "; // Ensure value is properly quoted
//       }
      
//       // Option 2 (whitelist desired columns):
//       // if (isset($_POST[$column])) {  // Check if the column exists in the submitted data
//       //   $query .= $column . " = '" . $_POST[$column] . "', ";
//       // }
//     }
//     // Ensure query ends with semicolon
//     $query = substr(trim($query), 0, -1) . ";";
    
//     // Test the query directly (optional)
//     echo $query; exit;
  
//     $update_profile = mysqli_query($connect, $query);

  


// if (isset($_POST['update'])) {
//     $user_id = $_POST['user_id'];
//     $query = "UPDATE users SET ";
//     foreach ($_POST as $key => $value) {
//         $query .= $key . " = '" . $value . "', ";
//     }
//     $query = substr(trim($query), 0, -1);
//     $query .= " WHERE user_id=$user_id";
//     // var_dump($query); exit;
//     // extract($_POST);
//     // $query = "UPDATE users SET username='$username', f_name='$f_name', l_name='$l_name', dob='$dob', gender='$gender',email='$email',`password` ='$password', dietary_preference='$dietary_preference', allergy_info='$allergy_info' WHERE user_id='$user_id'";
//     $update_profile = mysqli_query($connect, $query);
    if ($update_profile) {
        // var_dump($_SESSION); exit;
        $_SESSION['message'] = "
            <div class='alert alert-success text-align:center' role='alert'>
                Profile Updated!
            </div>
        ";
        header("location: ../views/user_dashboard/manage_profile.php");
    }
}