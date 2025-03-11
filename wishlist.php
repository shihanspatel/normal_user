<?php
include("After-login-header.php");
?>

<br><br>
<div class="container mt-3">
    <h2>Your Wishlist,</h2>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Image</th>
                <th>Product Price</th>
                <th>Applied Offer</th>
                <th>After Offer Price</th>
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
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary">Remove</button>
                        <button type="button" class="btn btn-secondary"><a href="order.php" style="text-decoration: none; color:white">Order</a></button>

                    </div>
                </td>

            </tr>
            <tr>
                <td>Neverfull Bandouliere Inside Out BB</td>
                <td><img src="images/c2.1.avif" alt="" style="height: 90px;"></td>
                <td>₹ 200,000</td>
                <td>Winter Sale 10% off</td>
                <td>₹ 180,000</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary">Remove</button>
                        <button type="button" class="btn btn-secondary"><a href="order.php" style="text-decoration: none; color:white">Order</a></button>

                    </div>
                </td>
            </tr>
            <tr>
                <td>Neverfull Bandouliere Inside Out BB</td>
                <td><img src="images/s1.1.avif" alt="" style="height: 90px;"></td>
                <td>₹ 128,000</td>
                <td>Diwali Sale 10% off</td>
                <td>₹ 115,200</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary">Remove</button>
                        <button type="button" class="btn btn-secondary"><a href="order.php" style="text-decoration: none; color:white">Order</a></button>

                    </div>
                </td>
            </tr>
            <tr>
                <td>Neverfull Bandouliere Inside Out BB</td>
                <td><img src="images/g1.1.avif" alt="" style="height: 90px;"></td>
                <td>₹ 228,000</td>
                <td>Holi Sale 10% off</td>
                <td>₹ 205,200</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary">Remove</button>
                        <button type="button" class="btn btn-secondary"><a href="order.php" style="text-decoration: none; color:white">Order</a></button>

                    </div>
                </td>
            </tr>

        </tbody>
    </table>

    <?php include_once("footer.php") ?>