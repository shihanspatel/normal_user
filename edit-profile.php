<?php
include_once("After-login-header.php");
?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<title>My Profile</title>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <h4>Personal Information</h4>
                <form id="userForm" action="edit-profile.php">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                        <select class="form-select" id="title" name="title" data-validation="required">
                            <option value="">Select</option>
                            <option value="Mr">Mr</option>
                            <option value="Ms">Ms</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Dr">Dr</option>
                        </select>
                        <span id="titleError" class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name (input characters only)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name"
                            data-validation="required alpha min max" data-min="3" data-max="20" minlength="3" maxlength="20">
                        <span id="firstNameError" class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name (input characters only)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name"
                            data-validation="required alpha min max" data-min="3" data-max="20" minlength="3" maxlength="20">
                        <span id="lastNameError" class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Select Gender<span class="text-danger">*</span></label>
                        <select id="gender" name="gender" class="form-select" data-validation="required">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <span id="genderError" class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country/Region<span class="text-danger">*</span></label>
                        <select class="form-select" id="country" name="country" data-validation="required">
                            <option value="">Select Country</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Canada">Canada</option>
                        </select>
                        <span id="countryError" class="text-danger"></span>
                    </div>




                    <div class="mb-3">
                        <label for="img" class="form-label">Select Your Image<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="img" name="img" data-validation="file" required>
                        <span id="imgError" class="text-danger"></span>
                    </div>

                    <center>
                        <input type="submit" class="btn btn-dark btn-lg rounded-pill w-75 btn-hover-effect" id="submitUserForm" value="Save Your Information">
                    </center>
                </form>

            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <h4>My Newsletter</h4>
                <p>Discover the latest newsletter</p>
                <p>Receive digital communications for first access to latest collections, campaigns, and videos.</p>
                <!-- <button class="btn btn-dark  rounded-pill  btn-hover-effect">Unsubscribe</button> -->
            </div>
            <div class="info-box mt-4">
                <h4>Primary,</h4>
                <p><strong>Email:-</strong> shihanspatel07@gmail.com</p>
                <p><strong>Mobile Number:-</strong> +91-8780076890</p>
                <button class="btn btn-dark rounded-pill " id="s"><a href="pass.php" style="text-decoration: none; color:#ffffff">Change Password</a></button>
            </div>
            <div class="info-box mt-4">
                <h4>My Address Book</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo natus inventore qui, adipisci quaerat sed eaque non amet ut ratione, nemo ea aliquid ullam repellat, laborum ipsam modi minima harum.</p>
                <button class="btn btn-dark rounded-pill "><a href="change address.php" style="text-decoration: none; color:white">Change Address</a></button>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>