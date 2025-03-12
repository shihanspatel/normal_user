<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <style>
        .sidebar {
            background: #f8f9fa;
            padding: 20px;
            left: 0;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            color: #343a40;
            margin-bottom: 15px;
            font-weight: 600;
            text-decoration: none;
            padding: 12px;
            border-radius: 25px;
            background: #e9ecef;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .sidebar a:hover {
            background: linear-gradient(to right, #007bff, #00d9ff);
            color: white !important;
            transform: translateX(5px);
            box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.4);
        }

        .sidebar a::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.4s ease;
        }

        .sidebar a:hover::before {
            left: 0;
        }

        /* Content Styling */
        .content {
            /* margin-left: 250px; */
            padding: 20px;
        }

        /* Top Navbar Styling */
        .navbar {
            background: linear-gradient(to right, #343a40, #212529);
        }

        .navbar a {
            color: white !important;
        }

        .navbar a:hover {
            color: #00d9ff !important;
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                height: 100%;
                position: relative;
                top: 0;
                box-shadow: none;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="demo2.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row g-0">
        <div class="col-xxl-3 sidebar">
            <a href="Dashboard.php">Dashboard</a>
            <a href="User.php">Users</a>
            <a href="Categories.php">Categories</a>
            <a href="Products.php">Products</a>
            <a href="inquiry.php">Inquiry</a>
            <a href="Orders.php">Orders</a>
            <a href="offers.php">Offers</a>
        </div>