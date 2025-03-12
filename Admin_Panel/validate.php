<?php
session_start();

// Predefined username and password for admin login
$adminUsername = 'priyal';
$adminPassword = '2431';

// Get the credentials from the POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the credentials are correct
if ($username === $adminUsername && $password === $adminPassword) {
    // Set session variable to indicate the user is logged in
    $_SESSION['loggedIn'] = true;
    echo 'success'; // Send success response
} else {
    echo 'fail'; // Send failure response
}
