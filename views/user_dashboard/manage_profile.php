<?php
session_start();
include ("../../config/connection.php");
include ("../../includes/header.php");
include ("../../includes/footer.php");
$userID = $_SESSION['user_id'];
?>
<?php
$getUser = "SELECT * FROM users WHERE user_id = $userID";
$gotUser = mysqli_query($connect, $getUser);
if (mysqli_num_rows($gotUser) > 0) {
    while ($rows = mysqli_fetch_assoc($gotUser)) {
?>
<style>
    body {
        background-color: #F1ECE7;
    }

    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Sign up</h3>
            <form action="../../backend/update_profile.php" method="post">
              <div class="row">
                <div class="col mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                      </div>
                      <input type="text" class="form-control" id="username" name="username" value="<?php echo $rows['username'] ?>">
                    </div>
                    <!-- <input type="text" id="username" name="username" class="form-control form-control" placeholder="Username you want..." required /> -->
                  </div>

              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="f_name" name="f_name" class="form-control form-control" value="<?php echo $rows['f_name'] ?>" />
                    <!-- <label class="form-label" for="firstName">First Name</label> -->
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="l_name" name="l_name" class="form-control form-control" value="<?php echo $rows['l_name'] ?>"  />
                    <!-- <label class="form-label" for="lastName">Last Name</label> -->
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div data-mdb-input-init class="form-outline datepicker w-100">
                  <h6 class="mb-2 pb-1">Date of Birth: </h6>
                    <input id="dob" name="dob" class="form-control" type="date"  value="<?php echo $rows['dob'] ?>"  />
                  </div>

                </div>
                <div class="col-md-6 mb-4">
                  <h6 class="mb-2 pb-1">Gender: </h6>
                  <div class="form-check form-check-inline">
                  <input type="radio" name="gender" value="Male" <?php if ($rows['gender'] == 'male') {
                                                                    echo "checked";
                                                                } ?>>Male
                    <input type="radio" name="gender" value="Female" <?php if ($rows['gender'] == 'female') {
                                                                        echo "checked";
                                                                } ?>>Female
                </div>
                  <!-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male"  />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                      value="female"  />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>


                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="otherGender"
                      value="option3" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div> -->

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <input type="email" id="email" name="email" class="form-control form-control" value="<?php echo $rows['email'] ?>" />
                    <!-- <label class="form-label" for="emailAddress">Email</label> -->
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <input type="password" id="password" name="password" class="form-control form-control" value="<?php echo $rows['password'] ?>" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                <h6 class="">Dietary Preferences </h6>
                  <select class="select form-control" name="dietary_preference" value="<?php echo $rows['dietary_preference'] ?>" required>
                    <option value="none" selected>None</option>
                    <option value="vegan">Vegan</option>
                    <option value="vegetarian">Vegetarian</option>
                    <option value="gluten_free">Gluten Free</option>
                    <option value="dairy_free">Dairy Free</option>
                    <option value="low_carb">Low Carb</option>
                    <option value="ketogenic">Ketogenic</option>
                  </select>
                  <!-- <label class="form-label select-label">Choose option</label> -->

                </div>

                <div class="col-md-6 mb-4 pb-2">
                <h6 class="">Allergy (if any) </h6>
                  <select class="select form-control" name="allergy_info" value="<?php echo $rows['allergy_info']?>" required>
                    <option value="none">None</option>
                    <option value="egg_allergy">Egg Allergy</option>
                    <option value="lactose_intolerance">Lactose Intolerance</option>
                    <option value="wheat_allergy">Wheat allergy</option>
                    <option value="soy_allergy">Soy allergy</option>
                  </select>
                  <!-- <label class="form-label select-label">Choose option</label> -->

                </div>

              </div>

              <div class="mt-4 pt-2 text-center">
                <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Update" name="update" />
              </div>
<?php
 
}
}

?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>