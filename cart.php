<?php
include("After-login-header.php");
?>
<style>
    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: scale(1.03);
    }

    .product-info {
        text-align: center;
        padding: 10px;
    }

    .product-price {
        color: #555;
        font-weight: bold;
    }

    .product-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 8px;
    }

    .im {
        width: 100%;
    }

    .color {
        background: linear-gradient(0deg, rgb(223, 223, 223), rgb(255, 255, 255))
    }

    .order-btn {
        margin-top: 10px;
        width: 55%;
        font-weight: bold;
    }

    .heart-icon {
        position: absolute;
        top: 30px;
        right: 30px;
    }
</style>



<br><br>
<div class="container mt-3 g-0">
    <h2>Product Summary,</h2>
    <br>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Product Price</th>
                    <th>Applied Offer</th>
                    <th>After Offer Price</th>
                    <th>Quantity</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Neverfull Bandouliere Inside Out BB</td>
                    <td><img src="images/c1.1.avif" alt="" style="height: 90px;"></td>
                    <td>₹ 228,000</td>
                    <td>Summer Sale 10% off</td>
                    <td>₹ 205,200</td>
                    <td><input type="number" name="" id="" style="border: 1px solid black; width:30px" value="1"></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Remove</button>
                            <button type="button" class="btn btn-secondary"><a href="order.php" style="text-decoration: none;color:white">Order</a></button>

                        </div>
                    </td>


                </tr>
                <tr>
                    <td>Neverfull Bandouliere Inside Out BB</td>
                    <td><img src="images/c2.1.avif" alt="" style="height: 90px;"></td>
                    <td>₹ 200,000</td>
                    <td>Winter Sale 10% off</td>
                    <td>₹ 180,000</td>
                    <td><input type="number" name="" id="" style="border: 1px solid black; width:30px" value="1"></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Remove</button>
                            <button type="button" class="btn btn-secondary"><a href="order.php" style="text-decoration: none;color:white">Order</a></button>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Neverfull Bandouliere Inside Out BB</td>
                    <td><img src="images/s1.1.avif" alt="" style="height: 90px;"></td>
                    <td>₹ 128,000</td>
                    <td>Diwali Sale 10% off</td>
                    <td>₹ 115,200</td>
                    <td><input type="number" name="" id="" style="border: 1px solid black; width:30px" value="1"></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Remove</button>
                            <button type="button" class="btn btn-secondary"><a href="order.php" style="text-decoration: none;color:white">Order</a></button>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Neverfull Bandouliere Inside Out BB</td>
                    <td><img src="images/g1.1.avif" alt="" style="height: 90px;"></td>
                    <td>₹ 228,000</td>
                    <td>Holi Sale 10% off</td>
                    <td>₹ 205,200</td>
                    <td><input type="number" name="" id="" style="border: 1px solid black; width:30px" value="1"></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Remove</button>
                            <button type="button" class="btn btn-secondary"><a href="order.php" style="text-decoration: none;color:white">Order</a></button>

                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>


    <?php include_once("footer.php") ?>