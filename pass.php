<!-- Bootstrap CSS -->
<style>
    body {
        margin: 0;
        padding: 0;
        /* background: url('images/w2.webp') no-repeat center center/cover; */
    }

    .containerr {
        margin: 64px 9.3vw 92px;
        min-height: calc(100vh - 236px);
    }

    h2 {
        font-size: 35px;
        font-weight: 500;
        color: #000;
        margin-bottom: 16px;
        font-family: system-ui;
    }

    .text,
    .info-box ul li {
        font-size: 15px;
        font-family: system-ui;
        line-height: 1.8;
        padding-bottom: 13%;
    }

    .required {
        font-size: 15px;
        font-family: system-ui;
        text-align: right;
    }

    .forget_text {
        cursor: pointer;
        color: #19110b;
        text-decoration: underline;
    }

    .btn-custom {
        border: 1px solid #19110b;
        font-size: 16px;
        font-weight: 400;
        line-height: 20px;
        text-align: center;
        color: #fff;
        background-color: #000;
        padding: 14px 122px;
        border-radius: 24px;
    }

    .btn-custom:hover {
        background-color: #fff;
        color: #000;
        font-size: larger;
    }

    .info-box {
        background-color: #f6f5f3;
        padding: 32px;
    }

    .tital {
        text-transform: uppercase;
        font-family: system-ui;
        color: #19110b;
    }

    .itam {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .itam span {
        font-size: 24px;
        color: black;
    }

    .text-danger {
        font-size: 14px;
    }
</style>

<?php
include_once("After-login-header.php");
?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<div class="containerr d-flex flex-wrap justify-content-between">

    <div class="login-box col-12 col-md-6 mb-4">
        <h2>Change Password</h2>
        <!-- <p class="text">Forgeoted your Password No needs To be Worried</p> -->
        <p class="required">Required fields*</p>
        <form action="pass.php" method="post" id="login-form">

            <div class="mb-3">
                <label for="old_password" class="form-label">Enter Old Password*</label>
                <input type="password" id="current_password" name="current_password" class="form-control"
                    data-validation="required">
                <span id="old_passwordError" class="text-danger"></span>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Enter New Password*</label>
                <input type="password" id="new_password" name="new_password" class="form-control"
                    data-validation="required strongPassword" data-min="8" data-max="20">
                <span id="passwordError" class="text-danger"></span>
            </div>

            <input type="submit" value="Save" name="save" id="save" class="btn btn-secondary mt-3">
        </form>

        <!-- <p class="mt-3">Don't have a MyLV account? <a href="login.php">Create an Account</a></p> -->
    </div>
</div>


<?php include_once("footer.php");

$con = mysqli_connect("localhost", "root", "", "noraml_user");
if (isset($_POST['save'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $emailUser = $_SESSION['user'];
    // Code to update password in the database here
    $q = "select * from user where email= '$emailUser'";
    $result = $con->query($q);
    $row = mysqli_fetch_assoc($result);
    if ($current_password != $row['password']) {
        $update = "UPDATE user SET password='$new_password' WHERE email='$emailUser'";
        if ($con->query($update)) {
            setcookie('success', 'Password updated successfully', time() + 5,"/");
        } else {
            setcookie('error', 'Error in updating password', time() + 5,"/");
        }
    } else {
        setcookie('error', 'Current password is incorrect', time() + 5,"/");
    }
}
?>
