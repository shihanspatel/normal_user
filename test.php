

</script>
</head>


<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#email').on('blur', function() {
            var email = $(this).val();
            $.ajax({
                type: 'GET',
                url: 'check_duplicate_Email.php',
                data: {
                    email: email
                },
                success: function(response) {
                    if (response == 'true') {
                        $('#emailError').text('Email already registered.').show();
                        $('#email').addClass('is-invalid');
                    } else {
                        $('#emailError').text('This email is available').show();
                        $('#email').removeClass('is-invalid');
                        $('#email').addClass('is-valid');
                        $('#emailError').addClass('text-success');
                    }
                }
            });
        });
    });
</script>

<div class="container py-5">
    <h2 class="text-uppercase fw-bold mb-3">Create Your Account</h2>
    <p class="text-muted">Create your account to have access to a more personalized experience.</p>
    <p>Already have a MyLV account? <a href="login.php" class="text-decoration-none">Log in here.</a></p>
    <p class="text-end text-danger">* Required fields</p>

    <form id="registrationForm" action="verify.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
            <select class="form-select" id="title" name="title" data-validation="required" required>
                <option value="">Select Title</option>
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
                <option value="Mrs">Mrs</option>
            </select>
            <span id="titleError" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name*</label>
            <input type="text" id="first_name" name="first_name" class="form-control form-control-sm"
                data-validation="required alpha min max" data-min="2" data-max="50" required>
            <span id="first_nameError" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name*</label>
            <input type="text" id="last_name" name="last_name" class="form-control form-control-sm"
                data-validation="required alpha min max" data-min="2" data-max="50" required>
            <span id="last_nameError" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="email" id="email" name="email" class="form-control form-control-sm"
                data-validation="required email" required>
            <span id="emailError" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile Number*</label>
            <input type="tel" id="mobile" name="mobile" class="form-control form-control-sm"
                data-validation="required numeric min max" pattern="[0-9]{10}" data-min="10" data-max="10" required>
            <span id="mobileError" class="text-danger"></span>
        </div>

        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password*</label>
            <input type="password" id="password" name="password" class="form-control form-control-sm"
                data-validation="required strongPassword min max" data-min="8" data-max="20" required>
            <span id="passwordError" class="text-danger"></span>
        </div>

        <div class="mb-3 position-relative">
            <label for="confirm_password" class="form-label">Confirm Password*</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-sm"
                data-validation="required confirmPassword" data-password-id="password" required>
            <span id="confirm_passwordError" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture"
                data-validation="file" data-filesize="200">
            <span id="profile_pictureError" class="text-danger"></span>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" data-validation="terms">
            <label class="form-check-label" for="terms">I agree to the Terms & Conditions</label>
            <span id="termsError" class="text-danger"></span>
        </div>

        <div class="text-center">
            <input type="submit" class="btn btn-dark px-5" name="signup_btn" id="signup_btn" value="Continue">
            <p class="mt-2 text-muted">You will receive an activation code by email to validate your account creation.</p>
        </div>
    </form>

</div>



<?php
include_once("before-loginheader.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Database connection
$con = new mysqli("localhost", "root", "", "noraml_user");

if ($con->connect_error) {
    die("Database Connection Failed: " . $con->connect_error);
}

if (isset($_POST['signup_btn'])) {
    $title = $_POST['title'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $profile_picture = uniqid() . basename($_FILES['profile_picture']['name']);
    $profile_picture_tmp_name = $_FILES['profile_picture']['tmp_name'];
    $token = uniqid() . time();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database using prepared statements
    $stmt = $con->prepare("INSERT INTO `user` (`title`, `firstname`, `lastname`, `email`, `mobilenumber`, `password`, `images`, `role`, `status`, `token`) VALUES (?, ?, ?, ?, ?, ?, ?, 'user', 'inactive', ?)");
    $stmt->bind_param("ssssssss", $title, $firstname, $lastname, $email, $mobile, $hashed_password, $profile_picture, $token);

    if ($stmt->execute()) {
        if (!file_exists('images/profile_pictures')) {
            mkdir('images/profile_pictures', 0777, true);
        }
        move_uploaded_file($profile_picture_tmp_name, 'images/profile_pictures/' . $profile_picture);

        // Send verification email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = 'smtp.gmail.com';
        $mail->Port       = 465;
        $mail->Username   = "your-email@gmail.com";  // Replace with your email
        $mail->Password   = "your-app-password";    // Replace with your app password
        $mail->setFrom('your-email@gmail.com', 'Your Website');
        $mail->addReplyTo('your-email@gmail.com', 'Your Website');
        $mail->addAddress($email);
        $mail->Subject    = "Account Verification Link";

        $verification_link = 'http://localhost/normal_user/verify.php?email=' . urlencode($email) . '&token=' . $token;
        $mail->Body       = "Click on this link to verify your account: <a href='$verification_link'>Verify Account</a>";
        $mail->isHTML(true);

        if ($mail->send()) {
            echo "Registration successful! Please check your email to verify your account.";
        } else {
            echo "Error: Could not send verification email.";
        }
    } else {
        echo "Error: Registration failed.";
    }
    $stmt->close();
}
$con->close();
?>
