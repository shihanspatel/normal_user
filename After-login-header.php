<?php 
    session_start();
    if (isset($_COOKIE['success'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?php echo $_COOKIE['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        if (isset($_COOKIE['error'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong><?php echo $_COOKIE['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Louis Vuitton Navbar</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script src="additional-methods.min.js"></script>
    <script src="js/universal_validation.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            /* padding: 10px; */
            /* width: 1; */
        }

        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px;
        }

        .navbar .navbar-brand {
            color: black;
            text-transform: uppercase;
        }

        .navbar-brand:hover {
            color: black;
        }

        /* Center the navbar items */
        .navbar-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .navbar a:hover,
        .dropdown:hover .dropbtn {
            color: black;
        }

        .dropdown-content a {
            color: black;
        }

        .dropdown:hover .dropdown-content a {
            color: black;
        }

        /* Search Section */
        .search-container {
            display: flex;
            align-items: center;
            font-size: 18px;
            font-family: Arial, sans-serif;
            cursor: pointer;
        }

        .search-icon {
            font-size: 22px;
            margin-right: 5px;
        }

        .search-text {
            color: black;
        }

        .navbar-nav .nav-item i {
            font-size: 20px;
            padding-right: 5px;
        }

        .navbar-nav .nav-item {
            padding-left: 10px;
            padding-right: 10px;
        }

        /* after login women glass shoes and bag */

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
            /* background: linear-gradient(0deg, rgb(223, 223, 223), rgb(255, 255, 255));*/
            background: linear-gradient(0deg, rgb(196 196 196), rgb(255 255 255));
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

        .hover-text-white:hover {
            color: white !important;
        }

        /* this is of edit profile page */
        .container {
            margin-top: 50px;
        }

        .info-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .btn-hover-effect {
            background-color: #000000 !important;
            color: #ffffff !important;
            border: 2px solid transparent !important;
        }

        .btn-hover-effect:hover {
            background-color: transparent !important;
            color: black !important;
            border: 2px solid black !important;
        }

        /*  */

        /* this is of after-login-index page */
        .images {
            background-color: rgb(216, 218, 220);
            height: aout;
            border-radius: 10px;
            transition: transform 0.3s ease;
            width: 100%;
            object-fit: cover;
        }

        .images:hover {
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        .section-title {
            text-align: center;
            margin-top: 12px;
        }

        .section-heading {
            text-align: center;
        }

        .hover-inside-border {
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 12px 24px;
            background-color: rgb(164, 173, 183);
            color: white;
            border: 1px solidrgb(110, 114, 118);
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
        }

        .hover-inside-border:hover {
            background-color: white;
            color: rgb(0, 0, 0);
        }

        /*  */
        /* this is of pro1,2,3,4,5,6 page*/

        body {
            background-color: #f8f9fa;
            /* margin: 1%; */
        }

        .product-image {
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-details {
            padding: 20px;
        }

        .btn-black {
            background-color: black;
            color: white;
        }

        /* Adjustments for smaller devices */
        @media (max-width: 768px) {
            .product-details {
                padding: 15px;
            }

            .product-image img {
                object-fit: contain;
            }
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.5rem;
            }

            h4 {
                font-size: 1.25rem;
            }

            .btn-black,
            .btn-outline-dark {
                font-size: 14px;
            }

            .product-details p {
                font-size: 0.875rem;
            }
        }

        /*  */
        /* wishlist */
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

        /* webkith */
        /* Width of the scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track (background of the scrollbar) */
        ::-webkit-scrollbar-track {
            /* background: #1e1e1e; */
            /* Dark background */
            border-radius: 10px;
        }

        /* Handle (draggable part of the scrollbar) */
        ::-webkit-scrollbar-thumb {
            background: rgb(198, 198, 47);
            /* Green color */
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: rgb(145, 160, 69);
        }

        /*  */
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f0f0">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span style="font-family: cursive;">My</span>
                <span class="brand ms-1">
                    <img src="images/Louis_Vuitton-Logo.wine copy.png" alt="Brand Logo" style="width: 50px; height: auto;">
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Centered Navbar Items -->
                <ul class="navbar-nav mx-auto"> <!-- mx-auto will center the items -->
                    <li class="nav-item">
                        <a class="nav-link" href="after-login-index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="womanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Women</a>
                        <ul class="dropdown-menu" aria-labelledby="womanDropdown">
                            <li><a class="dropdown-item" href="after-login-women-shoes.php">Shoes</a></li>
                            <li><a class="dropdown-item" href="after-login-women-bag.php">Bag</a></li>
                            <li><a class="dropdown-item" href="after-login-women-glass.php">Sunglass</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="manDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Men</a>
                        <ul class="dropdown-menu" aria-labelledby="manDropdown">
                            <li><a class="dropdown-item" href="after-login-man_shoes.php">Shoes</a></li>
                            <li><a class="dropdown-item" href="after-login-man_cloth.php">cloth</a></li>
                            <li><a class="dropdown-item" href="after-login-man_wu.php">wallets</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">My Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wishlist.php">My Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about&contactus.php">About</a>
                    </li>
                </ul>
                <a href="profile.php"> <img src="images/profile_pictures/<?php echo "$row[images]";?>" alt="" class="user-img" height="50px" width="50px" style="border-radius: 100%;"></a>
            </div>
        </div>
        </div>
    </nav>
