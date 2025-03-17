<?php
include_once("index.php");
$con = mysqli_connect("localhost", "root", "", "noraml_user");

$email = $_SESSION['admin'];
// echo $email;
$q = "select * from user where email='$email'";
$result = $con->query($q);
$row = mysqli_fetch_assoc($result); ?>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<div class="col-11">
    <div class="container my-4">
        <div class="row">
            <div class="col-xxl-9" style="margin: auto;">
                <div class="card text-center shadow-sm border-light">
                    <div class="card-body">
                        <img src="../images/profile_pictures/<?php echo $row['images'] ?? 'default.jpg'; ?>"
                            alt="Profile Image" class="rounded-circle mb-3"
                            style="width: 150px; height: 150px; object-fit: cover; border: 4px solid green;">

                        <h5 class="card-title mb-1" id="profileFullName"><?php echo $row['firstname'] . " " . $row['lastname']; ?></h5>
                        <!-- <p class="text-muted" id="profileRole">Web Developer</p> -->
                        <div class="d-flex justify-content-center mt-4">
                            <div class="p-2 rounded">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Profile Details</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">First Name</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="editFlName"><?php echo $row['firstname'] ?></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Last Name</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="editlName"><?php echo $row['lastname'] ?></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Email</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profileEmail"><?php echo $row['email']; ?></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Phone No</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profilePhone"><?php echo $row['mobilenumber']; ?></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Gender</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profileGender"><?php echo $row['gender']; ?></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Address</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="profileAddress"><?php echo $row['Address']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Profile Modal -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editProfileForm">
                                <div class="mb-3">
                                    <label for="editFullName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="editFlName" name="editFlName" data-validation="required alpha">
                                    <span class="text-danger" id="editFullNameError"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="editFullName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="editlName" name="editlName" data-validation="required alpha">
                                    <span class="text-danger" id="editFullNameError"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="editPhone" class="form-label">Phone No</label>
                                    <input type="text" class="form-control" id="editPhone" name="editPhone" data-validation="required phone" pattern="^[6-9]\d{9}$">
                                    <span class="text-danger" id="editPhoneError"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="editGender" class="form-label">Gender</label>
                                    <select class="form-select" id="editGender" name="editGender" data-validation="required">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="text-danger" id="editGenderError"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="editAddress" class="form-label">Address</label>
                                    <textarea class="form-control" id="editAddress" name="editAddress" rows="3" data-validation="required min" data-min="10"></textarea>
                                    <span class="text-danger" id="editAddressError"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="img" class="form-label">Select Your Image<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="img" name="img">
                                    <span id="imgError" class="text-danger"></span>
                                </div>
                                <button type="submit" class="btn btn-outline-primary" id="save" name="save">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>


</html>
<?php

if (isset($_GET['save'])) {
    $firstname = $_GET['editFlName'];
    $lastname = $_GET['editlName'];
    $gender = $_GET['editGender'];
    $number = $_GET['editPhone'];
    $image = $_GET['img'];
    $address = $_GET['editAddress'];
    $adminEmail = $_SESSION['admin'];


    $update = "update `user` set `firstname`='$firstname',`lastname`='$lastname',`gender`='$gender',`mobilenumber`='$number',`Address`='$address' where email='$adminEmail'";
    $run = $con->query($update);

    
}
?>