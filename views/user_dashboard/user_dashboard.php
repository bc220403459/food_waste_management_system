<?php
session_start();
include ("../../includes/header.php");
include ("../../config/connection.php");
include ("../../includes/footer.php");
// var_dump($_SESSION); exit; 
// if (!isset($_SESSION))
// {
//     header("location:../pages/sign-in.php");
// }
// var_dump($_SESSION); exit;
?>
<style>
  .dropdown-item-no-padding {
    margin-right:-20px;
  }
</style>
<h1>Dashboard</h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top d-flex justify-content-between" style="margin-bottom:10px">
    <div class="container-fluid">
     
      <a class="navbar-brand" href="../views/user_dashboard/user_dashboard.php"><em><strong>Food Waste Management System</strong></em></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Inventory</a>
        </li>
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
  <li><a class="dropdown-item dropdown-item-no-padding text-danger" href="../backend/logout.php">Logout</a></li>
</ul>


          </li>
        </ul>
      </div>
    </div>
  </nav>
  <p>test</p>