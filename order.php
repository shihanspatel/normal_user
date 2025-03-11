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

    .color {
        background: linear-gradient(0deg, rgb(223, 223, 223), rgb(255, 255, 255))
    }
</style>

<div class="container mt-3">
    <h2>Order Summary,</h2>
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
                    <th>Date of Order</th>
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
                    <td>3-4-2035</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-secondary">View</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Neverfull Bandouliere Inside Out BB</td>
                    <td><img src="images/c2.1.avif" alt="" style="height: 90px;"></td>
                    <td>₹ 200,000</td>
                    <td>Winter Sale 10% off</td>
                    <td>₹ 180,000</td>
                    <td>3-4-2035</td>
                   
                    
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-secondary">View</button>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Neverfull Bandouliere Inside Out BB</td>
                    <td><img src="images/s1.1.avif" alt="" style="height: 90px;"></td>
                    <td>₹ 128,000</td>
                    <td>Diwali Sale 10% off</td>
                    <td>₹ 115,200</td>
                    <td>3-4-2035</td>
                    
                    
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-secondary">view</button>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Neverfull Bandouliere Inside Out BB</td>
                    <td><img src="images/g1.1.avif" alt="" style="height: 90px;"></td>
                    <td>₹ 228,000</td>
                    <td>Holi Sale 10% off</td>
                    <td>₹ 205,200</td>
                    <td>3-4-2035</td>
                   
                    
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-secondary">View</button>

                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
        Total,₹ 705,600
        <br>
        <center><button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#paymentModal">Order Now</button></center>
    </div>
</div>

<!-- Payment Method Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Choose Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <button class="btn btn-primary w-100 mb-2">Cash on Delivery</button>
                <button class="btn btn-success w-100">Pay Online</button>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>
