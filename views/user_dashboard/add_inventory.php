<?php
session_start();
include ("../../includes/header.php");
include ("../../includes/footer.php");
include ("../../config/connection.php");
include ("../../core/functions.php");

?>
<link rel="icon" type="image/x-icon" href="../../images/favicon.ico">
<style>
body {
    background-color: #F1ECE7;
}

@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");

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

.profile-pic {
    display: inline-block;
    vertical-align: middle;
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%;
}

.profile-pic img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.profile-menu .dropdown-menu {
    right: 0;
    left: unset;
}

.profile-menu .fa-fw {
    margin-right: 10px;
}

.toggle-change::after {
    border-top: 0;
    border-bottom: 0.3em solid;
}

.link {
    text-decoration: none;
    color: white
}
</style>
<h1 class="text-center mt-5">Inventory Management</h1>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-75">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Add Inventory</h3>
                        <div class="text-end mt-1 mb-3">
                            <button class="btn btn-sm btn-dark">
                                <a href="view_inventory.php" class="link">View Available Inventory</a>
                            </button>
                        </div>
                        <form action="../../backend/add_inventory.php" method="post">
                            <div class="row">
                                <div class="col-12 mb-4">

                                    <div class="input-group mb-1">
                                        <span class="input-group-text" id="basic-addon1">#</span>
                                        <input type="text" id="food_id" name="food_id" class="form-control form-control"
                                            style="font-style:italic"
                                            placeholder="Item ID (this will be automatically generated)..."
                                            value="<?php echo generateRandomString() ?>"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="item_name" name="item_name"
                                            class="form-control form-control" placeholder="Food item name..."  />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="number" id="quantity" name="quantity"
                                            class="form-control form-control" placeholder="Quantity..."  />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div data-mdb-input-init class="form-outline datepicker w-100">
                                        <h6 class="mb-2 pb-1">Expiry Date: </h6>
                                        <input id="expiry_date" class="form-control" type="date" name="expiry_date"
                                            placeholder="Enter expiry date..."  />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="">Storage Location </h6>
                                    <select class="select form-control" name="storage_location" >
                                        <option selected>Select storage branch...</option>
                                        <option value="rwp_branch">Rawalpindi Branch</option>
                                        <option value="lhr_branch">Lahore Branch</option>
                                        <option value="mtn_branch">Multan Branch</option>
                                        <option value="khi_branch">Karachi Branch</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4 pt-2 text-center">
                                <input data-mdb-ripple-init class="btn btn-outline-info btn-lg" type="submit"
                                    value="Add item" />
                            </div>
                        </form>
                        <div class="mt-2 mb-3 text-end">
                            <button class="btn btn-outline-primary">
                                <i class="bi bi-qr-code-scan"></i> Add item using QR code
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>