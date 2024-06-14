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
    a{color:white; text-decoration:none}
</style>
</head>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-50">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">View Inventory</h3>
                        <div class="text-end" style="margin-top:-5%; margin-bottom:3% !important">

                            <button class="btn btn-primary btn-sm">
                                <a href="add_inventory.php" class="link">Add Item(s)</a>
                            </button>
                        </div>
                        <div class="mt-3">
                            <table class="table table-striped">
                                <tr>
                                    <!-- <th>Item ID</th> -->
                                    <th>SKU</th>
                                    <th>Item Name</th>
                                    <th>Available Stock</th>
                                    <th>Expiry Date</th>
                                    <!-- <th>Storage Location <br>(Branch)</th> -->
                                    <th>Actions</th>
                                </tr>
                                <?php
                                $query = "SELECT * FROM fooditem";
                                $allFoodItems = mysqli_query($connect, $query) or die("Failed!");
                                if (mysqli_num_rows($allFoodItems) > 0) {
                                    while ($row = mysqli_fetch_assoc($allFoodItems)) {
                                ?>
                                        <tr>
                                            <!-- <td> -->
                                                <?php $item_id= $row['item_id'] ?>
                                            <!-- </td> -->
                                            <td><?php echo $row['sku'] ?></td>
                                            <?php //echo $row['user_id'] ?>
                                            <td><?php echo $row['item_name'] ?></td>
                                            <td class="text-center"><?php echo $row['quantity'] ?></td>
                                            <td><?php echo getStandardDateFormat($row['expiry_date']) ?></td>
                                            <!-- <td> -->
                                                <?php
                                                // switch($row['storage_location']){
                                                //     case 'rwp_branch':
                                                //         echo "Rawawpindi ";
                                                //         break;
                                                //     case 'lhr_branch':
                                                //         echo "Lahore ";
                                                //         break;
                                                //     case 'mtn_branch':
                                                //         echo "Multan ";
                                                //         break;
                                                //     case 'khi_branch':
                                                //         echo "Karachi";
                                                //         break;
                                                //     default:
                                                //         echo '';
                                                //         break;                                                }
                                                ?>
                                            <!-- </td> -->
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <form action="update_item.php?>id=<?php echo $item_id?>">
                                                    <a href="update_item.php?id=<?php echo $item_id ?>"><i class="bi bi-pencil-square"></i></a>
                                                    </form>
                                                </button>
                                                <button class="btn btn-sm btn-danger del_item">
                                                    <form action="../../backend/delete_item.php" method="post">
                                                        <a href="../../backend/delete_item.php?id=<?php echo $item_id ?>"><i class="bi bi-trash"></i></a>
                                                        </form>
                                                    </button>
                                                </button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    // echo "no record";
                                }
                                ?>
                                <!-- <tr>
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
                                </tr> -->
                            </table>
                            <div class="text-end mt-4 mb-1">
                                <button class="btn btn-danger btn-sm del_all">
                                    <a href="../../backend/delete_all_items.php">
                                    <i class="bi bi-trash"></i>Delete All
                                    </a>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
  const deleteAllButton = document.querySelector('.del_all');
  deleteAllButton.addEventListener('click', function(event) {
    if (!confirm("Are you sure you want to delete all items? This action cannot be undone.")) {
      event.preventDefault();
    }
  });

  const deleteItemButton =document.querySelector('.del_item');
  deleteItemButton.addEventListener('click',function (event){
    if (!confirm("Are you sure?")){
        event.preventDefault();
    }
  });
</script>
