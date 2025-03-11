<?php
include_once("After-login-header.php");
?>

<title>My Profile</title>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <h4>Personal Information</h4>
                    <form id="userForm" action="edit-profile.php">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                            <select class="form-select" id="title" name="title" required>
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Dr">Dr</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name (input characters only)<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name" required pattern="[A-Za-z]+" title="Only roman characters allowed.">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name (input characters only)<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name" required pattern="[A-Za-z]+" title="Only roman characters allowed.">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Select Gender</label><br>
                            <select id="gender" name="gender" class="form-select" required>
                                <option value="Male">Male</option>
                                <option value="">Female</option>
                                <option value="">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country/Region<span class="text-danger">*</span></label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                                <option value="Canada">Canada</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Contact Preferences</label><br>
                            <input type="checkbox" id="contactMail" name="contactPreference">
                            <label for="contactMail">Contactable by mail</label><br>
                            <input type="checkbox" id="contactPhone" name="contactPreference">
                            <label for="contactPhone">Contactable by phone</label><br>
                            <input type="checkbox" id="contactSMS" name="contactPreference">
                            <label for="contactSMS">Contactable by SMS</label><br>
                            <div id="contactError" class="text-danger" style="display: none;">Please select at least one contact preference.</div>
                        </div> -->

                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label><br>
                            <select id="dobDay" name="dobDay" class="form-select d-inline w-auto" required>
                                <option value="">Day</option>
                            </select>
                            <select id="dobMonth" name="dobMonth" class="form-select d-inline w-auto" required>
                                <option value="">Month</option>
                            </select>
                            <select id="dobYear" name="dobYear" class="form-select d-inline w-auto" required>
                                <option value="">Year</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="lastName" class="form-label">Select Yor Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="ig" name="img" placeholder="Enter your last name" required >
                        </div>

                        <center>
                            <button type="submit" class="btn btn-dark btn-lg rounded-pill w-75 btn-hover-effect">Save Your Information</button>
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
         $(document).ready(function() {
             $('#userForm').validate({
             rules: {
                 title: {
                        required: true
                 },
                    firstName: {
                     required: true,
                   minlength: 3,
                          pattern: /^[A-Za-z]+$/
                   },
                   lastName: {
                       required: true,
                       minlength: 3,
                       pattern: /^[A-Za-z]+$/
                   },
                   country: {
                       required: true
             },
             dobDay: {
                 required: true
             },
                   dobMonth: {
                       required: true
                     },
                 dobYear: {
                         required: true
                     }
                 },
                 messages: {
                     title: {
                         required: "Please select a title."
                     },
                     firstName: {
                         required: "Please enter your first name.",
                        minlength: "Your first name must be at least 3 characters long.",
                         pattern: "Only roman characters are allowed."
                     },
                     lastName: {
                         required: "Please enter your last name.",
                         minlength: "Your last name must be at least 3 characters long.",
                         pattern: "Only roman characters are allowed."
                     },
                     country: {
                         required: "Please select a country."
                     },
                     dobDay: {
                         required: "Please select a day."
                     },
                     dobMonth: {
                         required: "Please select a month."
                    },
                     dobYear: {
                         required: "Please select a year."
                     }
                 },
                 errorElement: "div",
                 errorPlacement: function(error, element) {
                     error.addClass('invalid-feedback');
                     error.insertAfter(element);
                 },
                 highlight: function(element) {
                     $(element).addClass('is-invalid').removeClass('is-valid');
                 },
                 unhighlight: function(element) {
                     $(element).removeClass('is-invalid').addClass('is-valid');
                 }
             });
         });
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