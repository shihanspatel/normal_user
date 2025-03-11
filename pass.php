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
        <form action="profile.php" method="post" id="login-form">

            <div class="mb-3">
                <label for="old_password" class="form-label">Enter Old Password*</label>
                <input type="password" id="old_password" name="old_password" class="form-control"
                    data-validation="required">
                <span id="old_passwordError" class="text-danger"></span>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Enter New Password*</label>
                <input type="password" id="password" name="password" class="form-control"
                    data-validation="required strongPassword" data-min="8" data-max="20">
                <span id="passwordError" class="text-danger"></span>
            </div>

            <div class="mb-3">
                <label for="c_password" class="form-label">Confirm New Password*</label>
                <input type="password" id="c_password" name="c_password" class="form-control"
                    data-validation="required c_Password" data-password-id="password">
                <span id="c_passwordError" class="text-danger"></span>
            </div>
            <input type="submit" value="Save" class="btn btn-secondary mt-3">
        </form>

        <!-- <p class="mt-3">Don't have a MyLV account? <a href="login.php">Create an Account</a></p> -->
    </div>
</div>



<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script> -->


<script>
    // $(document).ready(function() {
    //     $("#login-form").validate({
    //         rules: {
    //             password: {
    //                 required: true,
    //                 minlength: 8,
    //                 maxlength: 20,
    //                 pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{10,20}$/

    //             },
    //             c_passeord: {
    //                 required: true,
    //                 equalTo: "#password"
    //             },
    //             old_password: {
    //                 required: true,
    //                 minlength: 8,
    //                 maxlength: 20,
    //                 pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{10,20}$/
    //             }
    //         },
    //         messages: {
    //             password: {
    //                 required: "Please enter your password.",
    //                 minlength: "Minmum length is 8",
    //                 maxlength: "maximum length is 20",
    //                 pattern: "INvalid syntex it shoud contain 1 uppercase 1lowercaser numbers and at least 1 special symbol"
    //             },
    //             c_passeord: {
    //                 required: "Please enter your password",
    //                 equalTo: "Your entered password is not matching"
    //             },
    //             old_password: {
    //                 required: "Please enter your password.",
    //                 minlength: "Minmum length is 8",
    //                 maxlength: "maximum length is 20",
    //                 pattern: "INvalid syntex it shoud contain 1 uppercase 1lowercaser numbers and at least 1 special symbol"
    //             }
    //         },
    //         errorElement: "div",
    //         errorPlacement: function(error, element) {
    //             error.addClass("text-danger");
    //             error.insertAfter(element);
    //         },
    //         highlight: function(element) {
    //             $(element).addClass("is-invalid");
    //         },
    //         submitHandler: function(form) {
    //             alert("Form submitted successfully!");
    //             form.submit();
    //         }
    //     });
    // });
</script>

<?php include_once("footer.php"); ?>