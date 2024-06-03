<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Waste Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body{
        background-color:#F1ECE7;
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
</head>

<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Sign up</h3>
            <form>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="firstName" class="form-control form-control" placeholder="Enter you first name..."/>
                    <!-- <label class="form-label" for="firstName">First Name</label> -->
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="lastName" class="form-control form-control" placeholder="Enter you last name..." />
                    <!-- <label class="form-label" for="lastName">Last Name</label> -->
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div data-mdb-input-init class="form-outline datepicker w-100">
                  <h6 class="mb-2 pb-1">Date of Birth: </h6>
                    <input id="startDate" class="form-control" type="date" placeholder="Enter date of birth..." />
                    <!-- <input type="text" class="form-control form-control-lg" id="birthdayDate" />
                    <label for="birthdayDate" class="form-label">Birthday</label> -->
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                      value="option1" checked />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                      value="option2" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                      value="option3" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <input type="email" id="emailAddress" class="form-control form-control" placeholder="Enter email address"/>
                    <!-- <label class="form-label" for="emailAddress">Email</label> -->
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <input type="password" id="phoneNumber" class="form-control form-control" placeholder="Enter password" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                <h6 class="">Dietary Preferences </h6>
                  <select class="select form-control">
                    <option value="2">Vegan</option>
                    <option value="3">Vegetarian</option>
                    <option value="4">Gluten Free</option>
                    <option value="5">Dairy Free</option>
                    <option value="6">Low Carb</option>
                    <option value="7">Ketogenic</option>
                  </select>
                  <!-- <label class="form-label select-label">Choose option</label> -->

                </div>

                <div class="col-md-6 mb-4 pb-2">
                <h6 class="">Allergy (if any) </h6>
                  <select class="select form-control">
                    <option value="2">Egg Allergy</option>
                    <option value="3">Lactose Intolerance</option>
                    <option value="4">Wheat allergy</option>
                    <option value="5">Soy allergy</option>
                  </select>
                  <!-- <label class="form-label select-label">Choose option</label> -->

                </div>

              </div>

              <div class="mt-4 pt-2 text-center">
                <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Sign up" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>