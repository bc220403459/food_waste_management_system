<?php
session_start();
include ("../../config/connection.php");
include ("../../includes/header.php");
include ("../../includes/footer.php");
include ("../../core/functions.php");
// var_dump($_SESSION); exit; 
if (!isset($_SESSION['username']))
{
    header("location:../../pages/sign-in.php");
}
// var_dump($_SESSION); exit;
?>
<style>
  .dropdown-item-no-padding { 
    margin-right:-20px;
  }
  .expiryReminder .modal-dialog {
            max-width: 750px; /* Set the width */
        }
        .expiryReminder .modal-content {
            height: 550px; /* Set the height */
        }
</style>
<h1>Dashboard</h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top d-flex justify-content-between" style="margin-bottom:10px !important">
    <div class="container-fluid">
     
      <a class="navbar-brand" href="../views/user_dashboard/user_dashboard.php"><em><strong> <img src="../../images/favicon.ico" alt="" style="height:30px; width:30px"> Food Waste Management System</strong></em></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <ul class="navbar-nav" style="margin-left:26% !important">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view_inventory.php">Inventory</a>
        </li>
        <li class="nav-item">
          
          <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#expiryReminder">
        <i class="bi bi-bell"></i> Expiry Reminder
    </button>
          <!--Expiry Reminder-->        </li>
      </ul>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../../images/user.jpg" alt="User Avatar" width="40px" height="34px" class="rounded-circle">&nbsp;&nbsp; <?php echo $_SESSION['username'] ?>
            </a>
            <!-- <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li class="btn btn-danger"><a class="dropdown-item " href="#">Logout</a></li>
            </ul> -->
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item dropdown-item-no-padding" href="manage_profile.php">Profile</a></li>
              <!-- <li><a class="dropdown-item dropdown-item-no-padding" href="#">Settings</a></li> -->
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item dropdown-item-no-padding text-danger" href="../../backend/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav><br/>



<div class="expiryReminder">
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#expiryReminder">
        <i class="bi bi-bell"></i>
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="expiryReminder" tabindex="-1" aria-labelledby="expiryReminderLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="expiryReminderLabel">Expiry Reminders</h5>
                    <div class="text-end" style="margin-left:60% !important">
                    <button type="button " class="close" data-dismiss="modal" aria-label="Close">
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
                        </tr>

                        <?php 
                        $expiringFoodItems = getExpiringFoodItems();
                        if (!empty($expiringFoodItems)) {
                          foreach ($expiringFoodItems as $item) {
                        ?>
                        <tr>
                          <td align="left"><?php echo $item['item_name'] ?></td>
                          <td><?php echo $item['quantity'] ?> </td>
                          <td><?php echo $item['expiry_date'] ?></td>
                          <td><?php echo calculateDaysUntilExpiry($item['expiry_date']) ?></td>
                          <td>
                            <?php 
                             switch($item['storage_location']){
                              case 'rwp_branch':
                                  echo "Rawalpindi ";
                                  break;
                              case 'lhr_branch':
                                  echo "Lahore ";
                                  break;
                              case 'mtn_branch':
                                  echo "Multan ";
                                  break;
                              case 'khi_branch':
                                  echo "Karachi";
                                  break;
                              default:
                                  echo '';
                              }
                            ?>
                            </td>
                        </tr>
                        <?php
                          }
                    } else {
                        echo "No food items found expiring in three days.\n";
                    }
                    ?>
                      </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </button>
  </div>
  <p>
    <?php //dd($_SESSION); 
    $deitaryPreference=$_SESSION['dietary_preference'];
    $alleryInfo=$_SESSION['allergy_info'];
    $test=getExpiringFoodItems();
    dd($test);
    ?>
  </p>