<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script src="additional-methods.min.js"></script>

    <style>
        /* Sidebar Styling */
        .sidebar {
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            width: 280px;
            height: 100vh;
            padding: 20px;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }

        /* Sidebar Links */
        .sidebar a {
            display: block;
            /* color: #343a40; */
            font-weight: 600;
            text-decoration: none;
            padding: 12px;
            border-radius: 10px;
            background: #ffffff;
            transition: all 0.4s ease;
        }

        .sidebar a:hover {
            background: linear-gradient(to right, #007bff, #00d9ff);
            color: white !important;
            transform: translateX(5px);
            box-shadow: 0px 4px 15px rgba(0, 123, 255, 0.5);
        }

        /* Active Link */
        .sidebar .nav-link.active {
            background: #007bff;
            color: white !important;
            box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.5);
        }

        /* Sidebar Title */
        .sidebar span.fs-4 {
            font-weight: bold;
            /* color: #343a40; */
            letter-spacing: 1px;
        }

        /* Content Styling */
        /* .content {
            margin-left: 280px;
            width: calc(100% - 280px);
            padding: 20px;
        } */

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                box-shadow: none;
            }

            .content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Toggle Button for Sidebar -->
    <button class="btn btn-dark d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidenavContent"
        aria-controls="sidenavContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Sidebar Structure -->
    <div class="collapse d-md-block " id="sidenavContent">
        <div class="row g-0">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2 sidebar">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none p-3">
                    <span class="fs-4">LOUIS VUITTON</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="Dashboard.php" class="nav-link active" aria-current="page">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="User.php" class="nav-link link-dark">
                            User
                        </a>
                    </li>
                    <li>
                        <a href="Categories.php" class="nav-link link-dark">
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="Products.php" class="nav-link link-dark">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="inquiry.php" class="nav-link link-dark">
                            Inquiry
                        </a>
                    </li>
                    <li>
                        <a href="Orders.php" class="nav-link link-dark">
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="offers.php" class="nav-link link-dark">
                            Offers
                        </a>
                    </li>
                    <li>
                        <a href="profile.php" class="nav-link link-dark">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" class="nav-link link-dark">
                            Logout
                        </a>
                    </li>
                </ul>
                <hr>
            </div>