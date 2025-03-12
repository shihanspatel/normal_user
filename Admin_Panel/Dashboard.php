<?php
include('index.php');
?>
<style>
    body {
        margin: 0;
        padding: 0;
    }


    /* Content Styling */
    .content {
        padding: 20px;
    }

    /* Dashboard Cards */
    .dashboard-container .card {
        /* background: tra; */
        /* color: wh; */
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }


    .dashboard-container .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        /* filter: invert(1); */
        /* color: white; */
    }

    .dashboard-container .card .card-body {
        text-align: center;
        padding: 20px;
    }



    .dashboard-container .card-title {
        font-size: 1.0rem;
        font-weight: bold;

    }

    .dashboard-container .card-value {
        font-size: 2.5rem;
        margin: 10px 0;
    }

    .row {
        margin-bottom: 20px;
    }
</style>
<div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10" style="margin-top: 30px; margin-bottom: auto; margin-left:auto; margin-right: auto;">
        <div class="dashboard-container">
            <!-- First Row -->
            <div class="row ">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <div class="card-value">1,234</div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <div class="card-value">567</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="margin-top: 20px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <div class="card-value">345</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="margin-top: 20px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Inquiries</h5>
                            <div class="card-value">78</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Row -->
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Active Users</h5>
                            <div class="card-value">890</div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Inactive Users</h5>
                            <div class="card-value">344</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <div class="card-value">23</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Today's Orders</h5>
                            <div class="card-value">12</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>