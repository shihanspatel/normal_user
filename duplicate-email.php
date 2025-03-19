<?php
$con = mysqli_connect("localhost", "root", "", "noraml_user");

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $query = "SELECT email FROM user WHERE email='$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "true"; // Email exists
    } else {
        echo "false"; // Email is available
    }
}
?>
