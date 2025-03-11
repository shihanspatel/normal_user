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
                        <label for="dob" class="form-label">Date of Birth<span class="text-danger">*</span></label><br>
                        <select id="dobDay" name="dobDay" class="form-select d-inline w-auto" data-validation="required">
                            <option value="">Day</option>
                            <!-- Days 1-31 -->
                            <script>
                                for (let i = 1; i <= 31; i++) {
                                    document.write(`<option value="${i}">${i}</option>`);
                                }
                            </script>
                        </select>
                        <select id="dobMonth" name="dobMonth" class="form-select d-inline w-auto" data-validation="required">
                            <option value="">Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select id="dobYear" name="dobYear" class="form-select d-inline w-auto" data-validation="required">
                            <option value="">Year</option>
                            <script>
                                let year = new Date().getFullYear();
                                for (let i = year; i >= 1990; i--) {
                                    document.write(`<option value="${i}">${i}</option>`);
                                }
                            </script>
                        </select>
                        <span id="dobDayError" class="text-danger"></span>
                        <span id="dobMonthError" class="text-danger"></span>
                        <span id="dobYearError" class="text-danger"></span>
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
<script>
    const daySelect = document.getElementById('dobDay');
    const monthSelect = document.getElementById('dobMonth');
    const yearSelect = document.getElementById('dobYear');
    for (let i = 1; i <= 31; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        daySelect.appendChild(option);

        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        months.forEach((month, index) => {
            const option = document.createElement('option');
            option.value = index + 1;
            option.textContent = month;
            monthSelect.appendChild(option);
        });
        const currentYear = new Date().getFullYear();
        for (let i = currentYear; i >= 1900; i--) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            yearSelect.appendChild(option);
        }
        // $(document).ready(function() {
        //     $('#userForm').validate({
        //         rules: {
        //             title: {
        //                 required: true
        //             },
        //             firstName: {
        //                 required: true,
        //                 minlength: 3,
        //                 pattern: /^[A-Za-z]+$/
        //             },
        //             lastName: {
        //                 required: true,
        //                 minlength: 3,
        //                 pattern: /^[A-Za-z]+$/
        //             },
        //             country: {
        //                 required: true
        //             },
        //             dobDay: {
        //                 required: true
        //             },
        //             dobMonth: {
        //                 required: true
        //             },
        //             dobYear: {
        //                 required: true
        //             }
        //         },
        //         messages: {
        //             title: {
        //                 required: "Please select a title."
        //             },
        //             firstName: {
        //                 required: "Please enter your first name.",
        //                 minlength: "Your first name must be at least 3 characters long.",
        //                 pattern: "Only roman characters are allowed."
        //             },
        //             lastName: {
        //                 required: "Please enter your last name.",
        //                 minlength: "Your last name must be at least 3 characters long.",
        //                 pattern: "Only roman characters are allowed."
        //             },
        //             country: {
        //                 required: "Please select a country."
        //             },
        //             dobDay: {
        //                 required: "Please select a day."
        //             },
        //             dobMonth: {
        //                 required: "Please select a month."
        //             },
        //             dobYear: {
        //                 required: "Please select a year."
        //             }
        //         },
        //         errorElement: "div",
        //         errorPlacement: function(error, element) {
        //             error.addClass('invalid-feedback');
        //             error.insertAfter(element);
        //         },
        //         highlight: function(element) {
        //             $(element).addClass('is-invalid').removeClass('is-valid');
        //         },
        //         unhighlight: function(element) {
        //             $(element).removeClass('is-invalid').addClass('is-valid');
        //         }
        //     });
        // });
        $(document).ready(function() {
            //     $('#userForm').on('submit', function(e) {
            //         const isChecked = $('input[name="contactPreference"]:checked').length > 0;
            //         if (!isChecked) {
            //             $('#contactError').text('Please select at least one contact preference.').show();
            //             e.preventDefault();
            //         } else {
            //             $('#contactError').hide();
            //         }
            //     });
        });
</script>

<?php
include('footer.php');
?>