<?php
session_start();
include ("../../config/connection.php");
include ("../../includes/header.php");
include ("../../includes/footer.php");
include ("../../core/functions.php");
if (!isset($_SESSION['username'])) {
  header("location:../../pages/sign-in.php");
}
?>
<style>
  .dropdown-item-no-padding {
    margin-right: -20px;
  }

  .expiryReminder .modal-dialog {
    max-width: 750px;
  }

  .expiryReminder .modal-content {
    height: 550px;
  }

  .expiryButton {
    margin-top: 4.5px !important;
    margin-left: 12px !important;
  }

  .tipsButton {
    margin-top: 4.5px !important;
    margin-left: 12px !important;
    margin-right: 20px !important;
  }

  .shake {
    animation: shake 2s infinite cubic-bezier(0.215, 0.61, 0.355, 1) both;
  }

  @keyframes shake {
    0% {
      transform: translateX(0);
    }

    20%,
    60% {
      transform: translateX(-5px);
    }

    40%,
    80% {
      transform: translateX(10px);
    }
  }

  .storageTipsBody {
    color: #333333
  }

  .storageTipsPrint {
    font-family: Book Antiqua;
    font-size: 18.5pt;
    text-align: center;
    padding: 15%;
    padding-top: 20%;
    background-color: #fdbb2d
  }

  .storageTipsPrint {
    /* background: linear-gradient(0deg, rgba(34,193,195,1) 22%, rgba(157,190,111,1) 50%, rgba(253,187,45,1) 100%); */
    /* background: rgb(63,94,251);
background: linear-gradient(311deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);  */
    /* background: rgb(131,58,180);
background: linear-gradient(90deg, rgba(131,58,180,1) 6%, rgba(253,29,29,1) 46%, rgba(252,176,69,1) 100%);  */
    background: rgb(238, 174, 202);
    background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
  }
</style>

<?php
$toExpire = getExpiringFoodItems();
$emptyCheck = empty($toExpire);
?>



<h1>Dashboard</h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top d-flex justify-content-between"
  style="margin-bottom:10px !important">
  <div class="container-fluid">
    <a class="navbar-brand" href="user_dashboard.php"><em><strong> <img src="../../images/favicon.ico" alt=""
            style="height:30px; width:30px"> Food Waste Management System</strong></em></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav" style="margin-left:26% !important">
      <li class="nav-item">
        <a class="nav-link " aria-current="page" href="user_dashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view_inventory.php">Inventory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="feedback.php">Feedback</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="storage_tips.php">Storage Tips</a>
        </li>
      <li class="nav-item">
        <button class="btn btn-outline-primary btn-sm tipsButton" data-bs-toggle="modal"
          data-bs-target="#storageTipsModal">
          <i class="bi bi-lightbulb-fill"></i> Storage Tip of Day
        </button>
      </li>

      <li class="nav-item">
        <?php if (!$emptyCheck) {
          ?>
          <button type="button" class="btn btn-sm btn-outline-danger expiryButton shake" data-toggle="modal"
            data-target="#expiryReminder">
            <i class="bi bi-bell"></i> Expiry Reminder
            <?php
        } else {
          ?>
            <button type="button" class="btn btn-sm btn-outline-danger expiryButton" data-toggle="modal"
              data-target="#expiryReminder">
              <i class="bi bi-bell"></i> Expiry Reminder
              <?php
        }
        ?>
          </button>
      </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../../images/user.jpg" alt="User Avatar" width="40px" height="34px"
              class="rounded-circle">&nbsp;&nbsp; <?php echo $_SESSION['username'] ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item dropdown-item-no-padding" href="manage_profile.php">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item dropdown-item-no-padding text-danger" href="../../backend/logout.php">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav><br />

<div class="expiryReminder">
  <div class="modal fade" id="expiryReminder" tabindex="-1" aria-labelledby="expiryReminderLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="expiryReminderLabel">Expiry Reminders</h4>
          <div class="text-end" style="margin-left:auto !important">
            <button type="button btn-outline-danger" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <table class="table">
              <tr>
                <th>Item Name</th>
                <th>Quantity Left</th>
                <th>Expiry Date</th>
                <th>Days Remaining</th>
                <th>Storage Location</th>
                <!-- <th>Status</th> -->
              </tr>
              <?php
              $expiringFoodItems = getExpiringFoodItems();
              if (!empty($expiringFoodItems)) {
                foreach ($expiringFoodItems as $item) {
                  ?>
                  <tr>
                    <td align="left"><?php echo $item['item_name'] ?></td>
                    <td><?php echo $item['quantity'] ?> </td>
                    <td><?php echo getStandardDateFormat($item['expiry_date']) ?></td>
                    <td><?php echo calculateDaysUntilExpiry($item['expiry_date']) ?></td>
                    <td>
                      <?php
                      switch ($item['storage_location']) {
                        case 'rwp_branch':
                          echo "Rawalpindi Branch";
                          break;
                        case 'lhr_branch':
                          echo "Lahore Branch";
                          break;
                        case 'mtn_branch':
                          echo "Multan Branch";
                          break;
                        case 'khi_branch':
                          echo "Karachi Branch";
                          break;
                        default:
                          echo '';
                      }
                      ?>
                    </td>
                    <!-- <td><?php //echo returnStatus($item['expiry_date']) ?></td> -->
                  </tr>
                  <?php
                }
              } else {
                echo "No food items found expiring in coming three days.\n";
              }
              ?>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-sm btn-primary reminderSettings">Settings</button>  -->
          <!-- <script>
                     $(document).ready(function() {
                       $('#expiryReminder').on('shown.bs.modal', function () {
                        $('.btn-primary').click(function() {
                          // Open reminderSettings modal
                          $('#reminderSettings').modal('show');
                        });
                      });
                    });

                    </script> -->
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="reminderSettings" tabindex="-1" aria-labelledby="reminderSettingsLabel"
    aria-hidden="true">
    <!-- <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reminderSettingsLabel">Reminder Settings</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>This is the reminder settings modal content. You can add options to configure notification frequency, expiry thresholds, etc.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div> -->
  </div>


</div>
<!-- Modal -->
<div class="modal fade" id="storageTipsModal" tabindex="-1" aria-labelledby="storageTipsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="storageTipsModalLabel">Storage Tip of the Day</h5>
        <div class="text-end" style="margin-left:auto !important">
          <button type="button btn-outline-danger" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body storageTipsBody">
        <p class="storageTipsPrint">
          <?php

          $storageTips = array(
            "<strong>Bananas:</strong> Keep bananas at room temperature until they ripen. Once ripe, store them in the refrigerator to extend their shelf life by a few days.",
            "<strong>Berries:</strong> Store berries in a single layer in a shallow container lined with paper towels to absorb moisture. Do not wash until ready to eat.",
            "<strong>Bread:</strong> Keep bread in a cool, dry place, preferably in a bread box. Avoid storing it in the refrigerator, as it will dry out faster.",
            "<strong>Cheese:</strong> Wrap cheese in wax paper or parchment paper and then place it in a loose plastic bag. Store in the vegetable drawer of the refrigerator.",
            "<strong>Cucumbers:</strong> Store cucumbers at room temperature. Refrigeration can cause them to become waterlogged and develop pitting.",
            "<strong>Eggs:</strong> Store eggs in their original carton on a refrigerator shelf, not in the door, to maintain a consistent temperature.",
            "<strong>Garlic:</strong> Keep garlic in a cool, dark place with good air circulation. A mesh bag or paper bag works well.",
            "<strong>Herbs:</strong> Store fresh herbs in the refrigerator with their stems submerged in water, covered loosely with a plastic bag. Change the water every few days.",
            "<strong>Lettuce:</strong> Wrap washed and dried lettuce in paper towels and store in a plastic bag or container in the refrigerator to keep it crisp.",
            "<strong>Milk:</strong> Store milk on a refrigerator shelf, not in the door, to keep it at a consistent, cold temperature.",
            "<strong>Mushrooms:</strong> Keep mushrooms in a paper bag in the refrigerator to prevent moisture buildup, which can cause spoilage.",
            "<strong>Nuts:</strong> Store nuts in the refrigerator or freezer in an airtight container to prevent them from going rancid.",
            "<strong>Onions:</strong> Store onions in a cool, dry, well-ventilated area away from potatoes, as they can cause each other to spoil faster.",
            "<strong>Tomatoes:</strong> Store tomatoes at room temperature away from direct sunlight. Refrigeration can alter their texture and flavor.",
            "<strong>Yogurt:</strong> Keep yogurt in the coldest part of the refrigerator, typically on a shelf rather than in the door, to maintain its freshness."
          );

          $randomTip = mt_rand(0, count($storageTips) - 1);
          echo $storageTips[$randomTip];
          ?>
        </p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<script>
  document.querySelector('.tipsButton').addEventListener('click', function () {
    var myModal = new bootstrap.Modal(document.getElementById('storageTipsModal'));
    myModal.show();
  });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</button>
</div>
<p>
  <?php
  $deitaryPreference = $_SESSION['dietary_preference'];
  $alleryInfo = $_SESSION['allergy_info'];
  $test = getExpiringFoodItems();
  // dd($test);
  ?>
</p>

<div class="mt-4 mb-5">
  <h1 class="text-center text-success">Welcome back, <em><?php echo $_SESSION['username'] ?></em></h1>
  

<p>Food suggestions for you according to your Dietary Preference:</p>

<?php
$biryani=findQuantity("rice")>=1 && findQuantity('chicken')>=1 && findQuantity('masala')>=1;
$pizza=findQuantity('dough')>=1 && findQuantity('tomato')>=1 && findQuantity('olive')>=1 && findQuantity('cheese')>=1 && findQuantity('sauces');
$burger=findQuantity('bun')>=1 && findQuantity('chicken')>=1 && findQuantity('onion') && findQuantity('ketchup') && findQuantity('mayonese');
$beefPulao=findQuantity('rice')>=1 && findQuantity('beef')>=1 && findQuantity('masala')>=1;
$shawarma=findQuantity('shawarma bread')>=1 && findQuantity('mayonese') && findQuantity('chicken')>=1 && findQuantity('pickles')>=1 && findQuantity('sauces')>=1;
$qorma=findQuantity('chicken')>=1 && findQuantity('masala')>=1 && findQuantity('tomato')>=1 && findQuantity('onion')>=1;
$mixSalad=findQuantity('apple')>=1 && findQuantity('banana')>=1 && findQuantity('cucumber')>=1 && findQuantity('chickpeas')>=1;
$vegSalad=findQuantity('beetroot')>=1 && findQuantity('cabbage')>=1 && findQuantity('cucumber')>=1 && findQuantity('carrot')>=1;
$fruitSalad=findQuantity('apple')>=1 && findQuantity('banana')>=1 && findQuantity('guava')>=1 && findQuantity('melon')>=1 && findQuantity('watermelon')>=1;
$vegPulao=findQuantity('rice')>=1 && findQuantity('potato')>=1 && findQuantity('masala')>=1;

$vegan =($_SESSION['dietary_preference']="vegan");
$vegetarian =($_SESSION['dietary_preference']="vegetarian");
$gluten_free =($_SESSION['dietary_preference']="gluten_free");
$dairy_free =($_SESSION['dietary_preference']="dairy_free");
$low_carb =($_SESSION['dietary_preference']="low_carb");
$ketogenic =($_SESSION['dietary_preference']="ketogenic");
?>




<?php 
if ($biryani){
  $query="SELECT * FROM recipe WHERE recipe_name REGEXP 'biryani' ";
  $biryani=mysqli_query($connect,$query);
  while($biryani_data=mysqli_fetch_assoc($biryani)){
?>
<div class="card" style="width: 18rem; margin-left:10px">
  <div class="card-body">
    <h5 class="card-title">Biryani</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">
      <strong>Cuisine: </strong> <?php echo capitalise($biryani_data['cuisine']) ?> <br/>
      <strong>Meal Type: </strong> <?php echo capitalise($biryani_data['meal_type']) ?><br/>
      <strong>Cooking Time: </strong> <?php echo capitalise($biryani_data['cooking_time']) ?> minutes </br>
    </p>
    <p class="text-center">
      <a href="feedback.php" class="card-link">Rate Recipe</a>
    </p>
  </div>
</div>
<?php
 }
}
?>
</div>



<?php
// $dishes = array("biryani", "pizza", "burger", "beefPulao", "shawarma", "qorma", "mixSalad", "vegSalad", "fruitSalad", "vegPulao");

// foreach ($dishes as $dish) {
//   if ($dish) {
//     $query = "SELECT * FROM recipe WHERE recipe_name REGEXP '$dish'";
//     $result = mysqli_query($connect, $query);

//     if (mysqli_num_rows($result) > 0) {
//       while ($dish_data = mysqli_fetch_assoc($result)) {
//         echo "<div class='card' style='width: 18rem; margin-left:10px'>";
//         echo "<div class='card-body'>";
//         echo "<h5 class='card-title'>" . ucfirst($dish) . "</h5>"; // Capitalize the first letter of the dish name
//         echo "<h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>";
//         echo "<p class='card-text'>";
//         echo "<strong>Cuisine: </strong>" . capitalise($dish_data['cuisine']) . "<br/>";
//         echo "<strong>Meal Type: </strong>" . capitalise($dish_data['meal_type']) . "<br/>";
//         echo "<strong>Cooking Time: </strong>" . capitalise($dish_data['cooking_time']) . " minutes </br>";
//         echo "</p>";
//         echo "<p class='text-center'>";
//         echo "<a href='feedback.php' class='card-link'>Rate Recipe</a>";
//         echo "</p>";
//         echo "</div>";
//         echo "</div>";
//       }
//     } else {
//       // Handle the case where no recipe is found for the dish
//       echo "<p>No recipes found for " . ucfirst($dish) . "</p>";
//     }

//     mysqli_free_result($result); // Free the result memory
//   }
// }
?>


<?php
// $dishes = array("biryani", "pizza", "burger", "beefPulao", "shawarma", "qorma", "mixSalad", "vegSalad", "fruitSalad", "vegPulao");
// $columnCount = 0; // Keeps track of the number of cards in the current column

// foreach ($dishes as $dish) {
//   if ($dish) {
//     $query = "SELECT * FROM recipe WHERE recipe_name REGEXP '$dish'";
//     $result = mysqli_query($connect, $query);

//     if (mysqli_num_rows($result) > 0) {
//       if ($columnCount % 3 === 0) { // Start a new column every 3rd dish
//         echo "<div class='row'>"; // Open a new row for the cards
//       }

//       while ($dish_data = mysqli_fetch_assoc($result)) {
//         echo "<div class='card col-md-4' style='margin-left:10px'>"; // Set card width to fit 3 in a row
//         echo "<div class='card-body'>";
//         echo "<h5 class='card-title'>" . ucfirst($dish) . "</h5>"; // Capitalize the first letter of the dish name
//         echo "<h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>";
//         echo "<p class='card-text'>";
//         echo "<strong>Cuisine: </strong>" . capitalise($dish_data['cuisine']) . "<br/>";
//         echo "<strong>Meal Type: </strong>" . capitalise($dish_data['meal_type']) . "<br/>";
//         echo "<strong>Cooking Time: </strong>" . capitalise($dish_data['cooking_time']) . " minutes </br>";
//         echo "</p>";
//         echo "<p class='text-center'>";
//         echo "<a href='feedback.php' class='card-link'>Rate Recipe</a>";
//         echo "</p>";
//         echo "</div>";
//         echo "</div>";
//         $columnCount++; // Increment card counter
//       }

//       if ($columnCount % 3 === 0) { // Close the row if 3 cards are displayed
//         echo "</div>"; // Close the row for the cards
//       }
//     } else {
//       // Handle the case where no recipe is found for the dish
//       echo "<p>No recipes found for " . ucfirst($dish) . "</p>";
//     }

//     mysqli_free_result($result); // Free the result memory
//   }
// }

// // Close any remaining open row (if there are less than 3 dishes)
// if ($columnCount % 3 !== 0) {
//   echo "</div>"; // Close the last row for the cards
// }
?>


<?php
// $dishes = array("biryani", "pizza", "burger", "beefPulao", "shawarma", "qorma", "mixSalad", "vegSalad", "fruitSalad", "vegPulao");
// $rowCount = 0; // Keeps track of the number of rows
// $columnCount = 0; // Keeps track of the number of cards in the current row

// foreach ($dishes as $dish) {
//   if ($dish) {
//     $query = "SELECT * FROM recipe WHERE recipe_name REGEXP '$dish'";
//     $result = mysqli_query($connect, $query);

//     if (mysqli_num_rows($result) > 0) {
//       if ($rowCount === 0) { // Open a new row for the first dish
//         echo "<div class='row'>"; // Open a new row for the cards
//       }

//       while ($dish_data = mysqli_fetch_assoc($result)) {
//         echo "<div class='card col-md-4' style='width: 400px; height: 200px; margin: 10px;'>"; // Set card dimensions and margin
//         echo "<div class='card-body'>";
//         echo "<h5 class='card-title'>" . ucfirst($dish) . "</h5>"; // Capitalize the first letter of the dish name
//         echo "<h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>";
//         echo "<p class='card-text'>";
//         echo "<strong>Cuisine: </strong>" . capitalise($dish_data['cuisine']) . "<br/>";
//         echo "<strong>Meal Type: </strong>" . capitalise($dish_data['meal_type']) . "<br/>";
//         echo "<strong>Cooking Time: </strong>" . capitalise($dish_data['cooking_time']) . " minutes </br>";
//         echo "</p>";
//         echo "<p class='text-center'>";
//         echo "<a href='feedback.php' class='card-link'>Rate Recipe</a>";
//         echo "</p>";
//         echo "</div>";
//         echo "</div>";
//         $columnCount++;

//         if ($columnCount % 3 === 0) { // Close the row if 3 cards are displayed
//           echo "</div>"; // Close the row for the cards
//           $rowCount++; // Increment row counter
//           $columnCount = 0; // Reset column counter for the next row
//         }
//       }

//       // Close any remaining open row (if there are less than 3 dishes in the last row)
//       if ($columnCount > 0) {
//         echo "</div>"; // Close the last row for the cards
//       }
//     } else {
//       // Handle the case where no recipe is found for the dish
//       echo "<p>No recipes found for " . ucfirst($dish) . "</p>";
//     }

//     mysqli_free_result($result); // Free the result memory
//   }
// }

// // Close any remaining open row (if there are less than 9 dishes)
// if ($rowCount < 3) {
//   echo "</div>"; // Close the
// }
?>



<?php
// $dishes = array("biryani", "pizza", "burger", "beefPulao", "shawarma", "qorma", "mixSalad", "vegSalad", "fruitSalad", "vegPulao");
// $rowCount = 0; // Keeps track of the number of rows
// $columnCount = 0; // Keeps track of the number of cards in the current row

// foreach ($dishes as $dish) {
//   if ($dish) {
//     $query = "SELECT * FROM recipe WHERE recipe_name REGEXP '$dish'";
//     $result = mysqli_query($connect, $query);

//     if (mysqli_num_rows($result) > 0) {
//       if ($rowCount === 0) { // Open a new row for the first dish
//         echo "<div class='row'>"; // Open a new row for the cards
//       }

//       while ($dish_data = mysqli_fetch_assoc($result)) {
//         echo "<div class='card col d-flex justify-content-center' >"; // Set card dimensions and margin
//         echo "<div class='card-body'>";
//         echo "<h5 class='card-title'>" . ucfirst($dish) . "</h5>"; // Capitalize the first letter of the dish name
//         echo "<h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>";
//         echo "<p class='card-text'>";
//         echo "<strong>Cuisine: </strong>" . capitalise($dish_data['cuisine']) . "<br/>";
//         echo "<strong>Meal Type: </strong>" . capitalise($dish_data['meal_type']) . "<br/>";
//         echo "<strong>Cooking Time: </strong>" . capitalise($dish_data['cooking_time']) . " minutes </br>";
//         echo "</p>";
//         echo "<p class='text-center'>";
//         echo "<a href='feedback.php' class='card-link'>Rate Recipe</a>";
//         echo "</p>";
//         echo "</div>";
//         echo "</div>";
//         $columnCount++;

//         if ($columnCount % 3 === 0) { // Close the row if 3 cards are displayed
//           echo "</div>"; // Close the row for the cards
//           $rowCount++; // Increment row counter
//           $columnCount = 0; // Reset column counter for the next row
//         }
//       }

//       // Close any remaining open row (if there are less than 3 dishes in the last row)
//       if ($columnCount > 0) {
//         echo "</div>"; // Close the last row for the cards
//       }
//     } else {
//       // Handle the case where no recipe is found for the dish
//       echo "<p>No recipes found for " . ucfirst($dish) . "</p>";
//     }

//     mysqli_free_result($result); // Free the result memory
//   }
// }

// // Close any remaining open row (if there are less than 9 dishes)
// if ($rowCount < 3) {
//   echo "</div>"; // Close the last row for the cards
// }
?>

<?php
//! PERFECT WORKING CODE BELOW 
?>

<?php
// $dishes = array("biryani", "pizza", "burger", "beefPulao", "shawarma", "qorma", "mixSalad", "vegSalad", "fruitSalad", "vegPulao");
// $rowCount = 0; // Keeps track of the number of rows
// $columnCount = 0; // Keeps track of the number of cards in the current row

// foreach ($dishes as $dish) {
//   if ($dish) {
//     $query = "SELECT * FROM recipe WHERE recipe_name REGEXP '$dish'";
//     $result = mysqli_query($connect, $query);

//     if (mysqli_num_rows($result) > 0) {
//       if ($rowCount === 0) { // Open a new row for the first dish
//         echo "<div class='row'>"; // Open a new row for the cards
//       }

//       while ($dish_data = mysqli_fetch_assoc($result)) {
//         echo "<div class='card col-sm-4' style='margin:1%; margin-left:2%; height:11%; width:28%'>"; // Set card size using Bootstrap class
//         echo "<div class='card-body'>";
//         echo "<h5 class='card-title'>" . ucfirst($dish) . "</h5>"; // Capitalize the first letter of the dish name
//         echo "<h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>";
//         echo "<p class='card-text'>";
//         echo "<strong>Cuisine: </strong>" . capitalise($dish_data['cuisine']) . "<br/>";
//         echo "<strong>Meal Type: </strong>" . capitalise($dish_data['meal_type']) . "<br/>";
//         echo "<strong>Cooking Time: </strong>" . capitalise($dish_data['cooking_time']) . " minutes </br>";
//         echo "</p>";
//         echo "<p class='text-center'>";
//         echo "<a href='feedback.php' class='card-link'>Rate Recipe</a>";
//         echo "</p>";
//         echo "</div>";
//         echo "</div>";
//         $columnCount++;

//         if ($columnCount % 3 === 0) { // Close the row if 3 cards are displayed
//           echo "</div>"; // Close the row for the cards
//           $rowCount++; // Increment row counter
//           $columnCount = 0; // Reset column counter for the next row
//         }
//       }

//       // Close any remaining open row (if there are less than 3 dishes in the last row)
//       if ($columnCount > 0) {
//         echo "</div>"; // Close the last row for the cards
//       }
//     } else {
//       // Handle the case where no recipe is found for the dish
//       echo "<p>No recipes found for " . ucfirst($dish) . "</p>";
//     }

//     mysqli_free_result($result); // Free the result memory
//   }
// }

// // Close any remaining open row (if there are less than 9 dishes)
// if ($rowCount < 3) {
//   echo "</div>"; // Close the last row for the cards
// }
?>

<?php

$dishes = array("biryani", "pizza", "burger", "beefPulao", "shawarma", "qorma", "mixSalad", "vegSalad", "fruitSalad", "vegPulao");
$rowCount = 0; // Keeps track of the number of cards displayed in the current row

if (isset($_SESSION['dietary_preference']) && $_SESSION['dietary_preference'] === "vegetarian") {
  $filteredDishes = array("vegSalad", "vegPulao"); // Vegetarian options
} else {
  $filteredDishes = $dishes; // Show all dishes if not vegetarian
}

foreach ($filteredDishes as $dish) {
  if ($dish) {
    $query = "SELECT * FROM recipe WHERE recipe_name REGEXP '$dish'";
    $result = mysqli_query($connect, $query);

    if ($result) { // Check if query was successful
      if (mysqli_num_rows($result) > 0) {
        // Open a new row for every group of 3 dishes
        if ($rowCount % 3 === 0) {
          echo "<div class='row'>"; // Open a new row for the cards
        }

        while ($dish_data = mysqli_fetch_assoc($result)) {
          echo "<div class='card col-sm-4' style='margin:1%; margin-left:2%; height:11%; width:28%'>"; // Set card size using Bootstrap class
          // ... rest of the card display code remains the same ...
          $rowCount++; // Increment counter for cards displayed in the current row

          // Close the row if 3 cards have been displayed
          if ($rowCount % 3 === 0) {
            echo "</div>"; // Close the row for the cards
          }
        }

        // Close any remaining open row (if there are less than 3 dishes left)
        if (mysqli_num_rows($result) % 3 !== 0) {
          echo "</div>"; // Close the last row for the cards
        }
      } else {
        // Handle the case where no recipe is found for the dish
        echo "<p>No recipes found for " . ucfirst($dish) . "</p>";
      }
    } else {
      echo "<p>Error connecting to database.</p>"; // Inform user of connection error
    }

    mysqli_free_result($result); // Free the result memory
  }
}

// No need for the final row check here, as rows are closed within the loop
?>
