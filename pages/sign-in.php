<?php
include ('../core/functions.php');
include ('../includes/header.php');
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

    .rounded-image {}
</style>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../images/banner.png" class="img-fluid rounded-image" alt="Banner">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h1 class="text-center mb-5" style="text-align:center !important">Login</h1>
                <form action="../backend/login_user.php" method="post">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" name="email" id="email" class="form-control form-control-lg"
                            placeholder="Enter a valid email address" required  />
                    </div>
                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                            placeholder="Enter password"  required />
                    </div>

                    <div class="text-center text-lg-start mt-2 pt-2">
                        <div class="text-center">
                        <input type="submit" class="btn btn-success btn-lg" name="submit" value="Login" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                            <!-- <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-success btn-lg"
                                >Login</button> -->
                        </div>
                </form>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="sign-up.php" class="link-danger">Register</a></p>
            </div>
        </div>
    </div>
    </div>
</section>