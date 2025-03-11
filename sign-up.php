<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script> -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/universal_validation.js"></script>
<link href=" css/bootstrap-icons.css">
    <script src="js/additional-methods.min.js">
</script>

</script>
</head>


<?php
include_once("before-loginheader.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');

;
?>

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
        <div class=" mb-3">
                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture" placeholder="Confirm password"
                        data-validation="required file filesize" data-filesize="200">
                    <div class="error" id="profile_pictureError"></div>
                </div>
                
        <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms" data-validation="terms">
                    <label class="form-check-label" for="terms">I agree to the Terms & Conditions</label>
                    <div class="error" id="termsError"></div>
                </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark px-5" name="signup_btn">Continue</button>
            <p class="mt-2 text-muted">You will receive an activation code by email to validate your account creation.</p>
        </div>
      
    </form>
</div>

<?php
include('footer.php');
?>


<?php
$con = mysqli_connect("localhost", "root", "", "normal_user");

if(isset($_POST['signup_btn'])){
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile =$_POST['mobile'];
    $password = $_POST['password'];
    $c_password = $_POST['confirm_password'];
    $profile_picture = uniqid() . $_FILES['profile_picture']['name'];
    $terms = $_POST['terms'];
    $profile_picture_tmp_name = $_FILES['profile_picture']['tmp_name'];
    $token = time();

    $insert = "INSERT INTO `user`( `firstname`, `lastname`, `email`, `mobilenumber`, `password`, `c_password`, `images`, `role`, `status`,`token`) VALUES ('$firstname','$lastname','$email','$mobile','$password','$c_password','$profile_picture','user','inactive','$token')";

    if($con->query($insert)){
        if(!file_exists('images/profile_pictures')){
            mkdir('images/profile_pictures');
        }
        move_uploaded_file($profile_picture_tmp_name,'images/profile_pictures/'.$profile_picture);
        $mail = new PHPMailer();
        $headers = 'X-Mailer:PHP/'.phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;charset=iso-8859-1\r\n";
        $token = date('Y-m-d H:i:s');
        $token = uniqid() . time();
        $to = $email;
        $subject = "Account Verification Link";

        $link = 'http://localhost/normal_user/verify.php?email=' . $email . '&token=' . $token;
        $body = "<div style='background-color: #f8f9fa; padding: 20px; border-radius: 5px;'>
                     <h2 style='color: #dc3545; text-align: center;'>Account Verification</h2>
                     <p style='text-align: center;'>Click on the button below to verify your account</p>
                    <a href='" . $link . "' style='display: block; width: 200px; margin: 0 auto; text-align: center; background-color: #dc3545; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Verify Account</a>
                 </div>";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPDebug  = 2;                // enables SMTP debug information (for testing)
        
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )  
        );

        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = 'smtp.gmail.com';      // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = "bhaiphp@gmail.com";  // GMAIL username(from)
        $mail->Password   = "tqnp vikw vnqb mdrb";            // GMAIL password(from)
        $mail->SetFrom('bhaiphp@gmail.com', 'Student Demo Website'); //from
        $mail->AddReplyTo("bhaiphp@gmail.com", "Student Demo Website"); //to
        $mail->Subject    = "Account Verification Link";
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
        $mail->MsgHTML($body);

        $mail->AddAddress($to, "Student Sample Website");
        if (!$mail->Send()) {
            setcookie('error', 'Failed to send the registration link', time() + 5);
        } else {
            setcookie('success', 'Registration Successfull. Account verification link has been sent to your email. Verify your email to login.', time() + 5);
        }
    } else {
        setcookie('error', 'Registration Failed', time() + 5);
    }
?>
    <script>
        window.location.href = 'sign-up.php';
    </script>
<?php
}
?>
