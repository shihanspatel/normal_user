<?php
include_once('before-loginheader.php');

$con = mysqli_connect("localhost", "root", "", "noraml_user");

if (isset($_GET['email']) && isset($_GET['token'])){
    $email = $_GET['email'];
    $token = $_GET['token'];
    $sql = "SELECT * FROM user WHERE email = '$email' AND token = '$token'";
    $count = $con->query($sql);
    $r = mysqli_fetch_assoc($count);


    if ($count->num_rows == 1) {
        if ($r['status'] == 'inactive') {
            $update = "UPDATE user SET status = 'active' WHERE email = '$email'";
            if ($con->query($update)) {
                setcookie('success', 'Account Verification Successful', time() + 5,"/");
            } else {
                setcookie('error', 'Error in verifying email', time() + 5,"/");
            }
        } else {
            setcookie('error', 'Email already verified', time() + 5,"/");
        }
    } else {
        setcookie('error', 'Email not registered', time() + 5,"/");
    }

}
?>
<script>
    window.location.href = 'login.php';
</script>
