<?php

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
    return $daysUntilExpiry;
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
