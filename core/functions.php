<style>
    .danger-badge {
  display: inline-block;
  padding: .25em .4em;
  font-size: 75%;
  font-weight: bold;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25rem;
  background-color: #dc3545;
  color: #fff;
}

</style>
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
    if ($daysUntilExpiry<0){ 
        // $daysLeft="<p class='badge badge-danger'>Expired</p>";
        // return $daysLeft; 
        echo "<span class='danger-badge'>Expired</span>";
    }
    else{
        return $daysUntilExpiry;
    }
}

// function getExpiringFoodItems() {
//     $servername = "localhost"; 
//     $username = "root"; 
//     $password = ""; 
//     $dbname = "fwms"; 
//     $conn = new mysqli($servername, $username, $password, $dbname);
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }
//     $threeDaysFromNow = date('Y-m-d', strtotime('+3 days'));
//     $sql = "SELECT * FROM fooditem WHERE expiry_date <= '$threeDaysFromNow'";
//     $today = date('Y-m-d'); 
//     $result = $conn->query($sql);
//     $expiredItems="SELECT * FROM fooditem WHERE expiry_date <$today";
//     if ($result->num_rows > 0) {
//             $foodItems = $result->fetch_all(MYSQLI_ASSOC);
//     } else {
//         $foodItems = []; 
//     }
//     $conn->close();
//     return $foodItems;
// }


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
    $today = date('Y-m-d'); // Get today's date
  
    $sql = "SELECT * FROM fooditem 
            WHERE expiry_date <= '$threeDaysFromNow' ";
            /*AND expiry_date >= '$today'";*/ // Filter for items within 3 days and not expired
  
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      $foodItems = $result->fetch_all(MYSQLI_ASSOC);
    } else {
      $foodItems = [];
    }
  
    $conn->close();
    return $foodItems;
  }
  
  function returnStatus($date) {
    $today = date('Y-m-d'); // Get today's date
  
    $dateTimeToday = DateTime::createFromFormat('Y-m-d', $today);
    $dateTimeExpiry = DateTime::createFromFormat('Y-m-d', $date);
  
    if ($dateTimeToday > $dateTimeExpiry) {
      echo "Expired";
    }
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
  


// function findQuantity($item){
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "fwms";

  // $conn = new mysqli($servername, $username, $password, $dbname);
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }
  // $query="SELECT quantity FROM fooditem WHERE item_name = '".$item."' ";
  // var_dump($query); 
  // $findQuantity=mysqli_query($conn,$query);
  // if (!$findQuantity){
  //   echo "Invalid Operation";
  // }
  // return $findQuantity;
// }

function findQuantity(string $item): mixed
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "fwms";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare a parameterized query to prevent SQL injection
  $stmt = $conn->prepare("SELECT quantity FROM fooditem WHERE item_name REGEXP ?");
  $stmt->bind_param("s", $item); // Bind the item as a string parameter

  $stmt->execute();
  $result = $stmt->get_result(); // Get the result from the prepared statement

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row['quantity']; // Return the quantity from the first row
  } else {
    return null; // Item not found
  }

  // $stmt->close(); // Close the prepared statement
  // $conn->close(); // Close the connection
}

// Example usage


