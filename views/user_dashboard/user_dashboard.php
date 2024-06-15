<?php
session_start();
include ("../../config/connection.php");
include ("../../includes/header.php");
include ("../../includes/footer.php");
include ("../../core/functions.php");
if (!isset($_SESSION['username']))
{
    header("location:../../pages/sign-in.php");
}
?>
<style>
  .dropdown-item-no-padding { 
    margin-right:-20px;
  }
  .expiryReminder .modal-dialog {
    max-width: 750px; 
  }
  .expiryReminder .modal-content {
    height: 550px; 
  }
  .expiryButton{
    margin-top:4.5px !important;
    margin-left:12px !important; 
  } 
  .tipsButton{
    margin-top:4.5px !important;
    margin-left:12px !important; 
    margin-right:20px !important;
  }
  .shake {
  animation: shake 2s infinite cubic-bezier(0.215, 0.61, 0.355, 1) both;
}

@keyframes shake {
  0% { transform: translateX(0); }
  20%, 60% { transform: translateX(-5px); }
  40%, 80% { transform: translateX(10px); }
}
</style>
<?php 
  $toExpire=getExpiringFoodItems();
  $emptyCheck=empty($toExpire);
  ?>
<h1>Dashboard</h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top d-flex justify-content-between" style="margin-bottom:10px !important">
    <div class="container-fluid">
      <a class="navbar-brand" href="user_dashboard.php"><em><strong> <img src="../../images/favicon.ico" alt="" style="height:30px; width:30px"> Food Waste Management System</strong></em></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
            <button class="btn btn-outline-primary btn-sm tipsButton"><i class="bi bi-lightbulb-fill"></i> Storage Tips</button>
        </li>
        <li class="nav-item">
          <?php if (!$emptyCheck){
            ?>
          <button type="button" class="btn btn-sm btn-outline-danger expiryButton shake" data-toggle="modal" data-target="#expiryReminder">
          <i class="bi bi-bell"></i> Expiry Reminder
          <?php
          }
          else{
          ?>
          <button type="button" class="btn btn-sm btn-outline-danger expiryButton" data-toggle="modal" data-target="#expiryReminder">
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../../images/user.jpg" alt="User Avatar" width="40px" height="34px" class="rounded-circle">&nbsp;&nbsp; <?php echo $_SESSION['username'] ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item dropdown-item-no-padding" href="manage_profile.php">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item dropdown-item-no-padding text-danger" href="../../backend/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav><br/>
  
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
                             switch($item['storage_location']){
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
                    <button type="button" class="btn btn-sm btn-primary reminderSettings">Settings</button> 
                    <script>
                     $(document).ready(function() {
  $('#expiryReminder').on('shown.bs.modal', function () {
    $('.btn-primary').click(function() {
      // Open reminderSettings modal
      $('#reminderSettings').modal('show');
    });
  });
});

                    </script>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reminderSettings" tabindex="-1" aria-labelledby="reminderSettingsLabel" aria-hidden="true">
  <div class="modal-dialog">
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
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </button>
  </div>
  <p>
    <?php 
    $deitaryPreference=$_SESSION['dietary_preference'];
    $alleryInfo=$_SESSION['allergy_info'];
    $test=getExpiringFoodItems();
    dd($test);
    ?>
  </p>