<?php

function dd($data)
{
    echo "<pre style='background-color:black; color:yellow'>";
    var_dump($data);
    echo "</pre>";
    exit;
}

// function foodItemExpiringInThreeDay($item_id){
//     include ("../config/connection.php");
//     $query="SELECT * fooditem WHERE item_id=$item_id";
//     $getItemData=mysqli_query($connect,$query);
//     while($result=mysqli_fetch_assoc($getItemData)){
        
//     }
// }
// Function to calculate days until item expires
function calculateDaysUntilExpiry($expiryDate) {
    // Convert expiry date to Unix timestamp
    $expiryTimestamp = strtotime($expiryDate);
    
    // Get current Unix timestamp
    $currentTimestamp = time();
    
    // Calculate difference in seconds
    $difference = $expiryTimestamp - $currentTimestamp;
    
    // Convert difference to days
    $daysUntilExpiry = floor($difference / (60 * 60 * 24));
    return $daysUntilExpiry;
}

// Example usage:

// Function to fetch food items expiring in three days
function getExpiringFoodItems() {
    $servername = "localhost"; // Change this to your MySQL server
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "fwms"; // Change this to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Calculate three days from now in YYYY-MM-DD format
    $threeDaysFromNow = date('Y-m-d', strtotime('+3 days'));

    // SQL query to fetch food items expiring in three days
    $sql = "SELECT * FROM fooditem WHERE expiry_date <= '$threeDaysFromNow'";

    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Fetch all rows into an associative array
        $foodItems = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $foodItems = []; // If no results, return an empty array or handle as needed
    }

    // Close connection
    $conn->close();

    // Return the array of food items
    return $foodItems;
}

// Example usage:
// $expiringFoodItems = getExpiringFoodItems();

// Print or process the fetched food items
// if (!empty($expiringFoodItems)) {
//     echo "Food items expiring in three days:\n";
//     foreach ($expiringFoodItems as $item) {
//         echo $item['food_name'] . " - Expiry Date: " . $item['expiry_date'] . "\n";
//     }
// } else {
//     echo "No food items found expiring in three days.\n";
// }
  
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

