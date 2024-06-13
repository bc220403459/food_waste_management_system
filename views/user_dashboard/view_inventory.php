<?php
session_start();
include("../../includes/header.php");
include("../../includes/footer.php");
include("../../config/connection.php");
include("../../core/functions.php");
?>
<h1 class="text-center mt-5">Inventory Management</h1>

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

    .toggle-change::after {
        border-top: 0;
        border-bottom: 0.3em solid;
    }

    .link {
        color: white;
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
                                <?php
                                $query = "SELECT * FROM fooditem";
                                $allFoodItems = mysqli_query($connect, $query) or die("Failed!");
                                if (mysqli_num_rows($allFoodItems) > 0) {
                                    while ($row = mysqli_fetch_assoc($allFoodItems)) {

                                ?>
                                        <tr>
                                            <td><?php echo $row['food_id'] ?></td>
                                            <td><?php echo $row['item_name'] ?></td>
                                            <td class="text-center"><?php echo $row['quantity'] ?></td>
                                            <td><?php echo getStandardDateFormat($row['expiry_date']) ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "no record";
                                }
                                ?>
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