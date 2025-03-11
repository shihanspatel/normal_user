<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script> -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/universal_validation.js></script>
<link href=" css/bootstrap-icons.css">
    //<script src="js/additional-methods.min.js">
</script>

</script>
</head>


<?php
include_once("before-loginheader.php");
?>
<div class="container py-5">
    <h2 class="text-uppercase fw-bold mb-3">Create Your Account</h2>
    <p class="text-muted">Create your account to have access to a more personalized experience.</p>
    <p>Already have a MyLV account? <a href="login.php" class="text-decoration-none">Log in here.</a></p>
    <p class="text-end text-danger">* Required fields</p>

    <form id="registrationForm" action="after-login-index.php" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
            <select class="form-select" id="title" name="title" required>
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
                <option value="Mrs">Mrs</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name*</label>
            <input type="text" id="first_name" name="first_name" class="form-control form-control-sm" required minlength="2">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name*</label>
            <input type="text" id="last_name" name="last_name" class="form-control form-control-sm" required minlength="2">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="email" id="email" name="email" class="form-control form-control-sm" required>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile Number*</label>
            <input type="tel" id="mobile" name="mobile" class="form-control form-control-sm" required pattern="[0-9]{10}">
        </div>
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password*</label>
            <input type="password" id="password" name="password" class="form-control form-control-sm" required minlength="8" maxlength="20">

        </div>
        <div class="mb-3 position-relative">
            <label for="confirm_password" class="form-label">Confirm Password*</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-sm" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark px-5">Continue</button>
            <p class="mt-2 text-muted">You will receive an activation code by email to validate your account creation.</p>
        </div>
    </form>
</div>

<?php
include('footer.php');
?>


<?php
$con = mysqli_connect("localhost", "root", "", "normal_user");


?>