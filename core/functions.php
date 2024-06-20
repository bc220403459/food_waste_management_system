<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
// include ("../includes/header.php");
function dd($data)
{
    echo "<pre style='background-color:black; color:yellow'>";
    var_dump($data);
    echo "</pre>";
    exit;
}

function calculateDaysUntilExpiry($expiryDate) {
    $expiryTimestamp = strtotime($expiryDate);
    $currentTimestamp = time();
    $difference = $expiryTimestamp - $currentTimestamp;
    $daysUntilExpiry = floor($difference / (60 * 60 * 24));
    if ($daysUntilExpiry<0){ 
        $daysLeft="<p class='badge badge-danger'>Expired</p>";
        return $daysLeft; 
    }
    else{
        return $daysUntilExpiry;
    }
}

function getExpiringFoodItems() {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "fwms"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $threeDaysFromNow = date('Y-m-d', strtotime('+3 days'));
    $sql = "SELECT * FROM fooditem WHERE expiry_date <= '$threeDaysFromNow'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $foodItems = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $foodItems = []; 
    }
    $conn->close();
    return $foodItems;
}
function errorShow($var)
{
    echo "<pre style='background-color:black; color:red; font-size:15pt; padding-top:6px; padding-bottom:6px; padding-left:4px'><strong><span style='font-style:none'>Error:</span></strong> ";
    print_r($var);
    exit;
}

function basePath()
{
    return __DIR__ . '/../';
}

function getStandardDateFormat($date)
{
    $dateString = $date;
    $date = new DateTime($dateString);
    $formattedDate = $date->format('d-M-Y');
    return $formattedDate;

}

function generateRandomString($length,$number=false) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($number){
        $characters='0123456789';
    }
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


// function getExpiryStatus($expiryDate) {
//     $expiryDateTime = new DateTime($expiryDate);
//     $today = new DateTime();
//     $interval = $expiryDateTime->diff($today);
//     $daysUntilExpiry = $interval->days;
//     if ($daysUntilExpiry < 0) {
//       $status = "Expired";
//     } elseif ($daysUntilExpiry <= 3) {
//       $status = "Near Expiry";
//     } else {
//       $status = "Fresh";
//     }
//     // return array("days_until_expiry" => $daysUntilExpiry, "status" => $status);
//     return $status;
//   }
  


  function getExpiryStatus($expiryDate) {
    $expiryDateTime = new DateTime($expiryDate);
    $today = new DateTime();
    $interval = $expiryDateTime->diff($today);
    $daysUntilExpiry = $interval->days;
    if ($daysUntilExpiry < 0) {
      $status = "Expired";
    } elseif ($daysUntilExpiry > 0) {
      $status = "In Stock";
    } else {
      $status = "Near Expiry";
    }
    return $status;
    // return array("days_until_expiry" => $daysUntilExpiry, "status" => $status);
  }
  