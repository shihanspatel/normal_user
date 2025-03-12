<?php include_once("index.php"); ?>

<?php

$users = [
    ["o-id" => 1, "p-name" => "LV X Pharrell Williams Shoes", "name" => "Priyal Antala", "price" => "RS.100000", "pay-status" => "Done", "ord-status" => "pending"],
    ["o-id" => 2, "p-name" => "LV X Pharrell Williams Shoes", "name" => "Shihans Patel", "price" => "RS.108900", "pay-status" => "pending", "ord-status" => "Done"],
    ["o-id" => 3, "p-name" => "LV X Pharrell Williams Shoes", "name" => "Shubham Desai", "price" => "RS.800000", "pay-status" => "Done", "ord-status" => "Done"],
    ["o-id" => 4, "p-name" => "LV X Pharrell Williams Shoes", "name" => "Shivam Patel", "price" => "RS.50000", "pay-status" => "pending", "ord-status" => "pending"],
    
];
?>

<style>
    .table-container {
        padding: 20px;
    }

    /* Standardized Button Styling */
    .status-btn {
        border-radius: 10px;
        border: none;
        padding: 8px;
        min-width: 120px;
        font-size: 14px;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    /* Image Styling */
    .product-img {
        max-height: 100px;
        width: auto;
        border-radius: 5px;
    }

    /* Responsive Table */
    .table-responsive {
        overflow-x: auto;
    }
</style>

<div class="col-xxl-9" style="margin: auto;">
        <div class="table-container table-responsive">
            <h2 class="mb-4 text-center">Manage order</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>Full Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Price</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['o-id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['p-name'] ?></td>
                                <td><img src="images/beg mm.avif" class="product-img" alt="Product"></td>
                                <td><?= $user['price'] ?></td>
                                <td>
                                    <button class="status-btn <?= $user['pay-status'] === 'Done' ? 'btn-success' : 'btn-danger' ?>">
                                        <?= $user['pay-status'] === 'Done' ? 'Payment Done' : 'Payment Pending' ?>
                                    </button>
                                </td>
                                <td>
                                    <button class="status-btn <?= $user['ord-status'] === 'Done' ? 'btn-success' : 'btn-danger' ?>">
                                        <?= $user['ord-status'] === 'Done' ? 'Delivered' : 'Not Delivered' ?>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
   
</div>