<?php
// session_start();
include ("../../includes/header.php");
include ("../../includes/footer.php");
include ("../../config/connection.php");
// include ("../../auth/is_auth.php");
?>

<!-- 
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
</style> -->
<h1 class="text-center mt-5">Inventory Management</h1>
<!-- <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-75">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Add Inventory</h3>
                        <div class="text-end mt-1 mb-3">
                            <button class="btn btn-sm btn-dark">View Available Inventory</button>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" id="basic-addon1">#</span>
                                        <input type="text" id="firstName" class="form-control form-control"
                                            style="font-style:italic"
                                            placeholder="Item ID (this will be automatically generated)..." />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="firstName" class="form-control form-control"
                                            placeholder="Food item name..." />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="number" id="lastName" class="form-control form-control"
                                            placeholder="Quantity..." />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div data-mdb-input-init class="form-outline datepicker w-100">
                                        <h6 class="mb-2 pb-1">Expiry Date: </h6>
                                        <input id="startDate" class="form-control" type="date"
                                            placeholder="Enter date of birth..." />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="">Storage Location </h6>
                                    <select class="select form-control">
                                        <option value="2">Rawalpindi Branch</option>
                                        <option value="3">Lahore Branch</option>
                                        <option value="4">Multan Branch</option>
                                        <option value="5">Karachi Branch</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4 pt-2 text-center">
                                <input data-mdb-ripple-init class="btn btn-info btn-lg" type="submit"
                                    value="Add item" />
                            </div>
                            <div class="mt-2 mb-3 text-end">
                                <i class="bi bi-qr-code-scan"></i> Add item using QR code
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->










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






    /* Profile Picture */
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

    .link{
        color:white;
        text-decoration: none;
    }

    </style>
</head>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-50">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">View Inventory</h3>
                            <div class="mt-3">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Item Name</th>
                                        <th>Available Stock</th>
                                        <th>Expiry Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tr>
                                        <td>8454</td>
                                        <td>Mango Juice Box</td>
                                        <td class="text-center">20</td>
                                        <td>20-June-2024</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8152</td>
                                        <td>Milk Box</td>
                                        <td class="text-center">40</td>
                                        <td>22-May-2024</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="text-end">

                                <button class="btn btn-primary">
                                    <a href="add_inventory.php" class="link">Add Item(s)</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>