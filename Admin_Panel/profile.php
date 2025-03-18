<?php
include_once("index.php");
$con = mysqli_connect("localhost", "root", "", "noraml_user");

$email = $_SESSION['admin'];
$q = "select * from user where email='$email'";
$result = $con->query($q);
$row = mysqli_fetch_assoc($result);
?>

<script src="jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<div class="col-11 g-0">
    <div class="container my-4">
        <div class="row">
            <div class="col-xxl-9" style="margin: auto;">
                <div class="card text-center shadow-sm border-light">
                    <div class="card-body">
                        <img src="../images/profile_pictures/<?php echo $row['images'] ?? 'default.jpg'; ?>" class="rounded-circle mb-3"
                            style="width: 150px; height: 150px; object-fit: cover; border: 4px solid green;">

                        <h5 class="card-title mb-1" id="profileFullName"><?php echo $row['firstname'] . " " . $row['lastname']; ?></h5>
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
                        <h5 class="card-title text-primary mb-3">Primary Details</h5>
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
                        <h5 class="card-title text-primary mb-3">Others</h5>
                        
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-bold">Password</label>
                            <div class="col-sm-8">
                                <p class="form-control-plaintext" id="password"><?php echo $row['password']; ?></p>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</button>
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
                            <form id="editProfileForm" enctype="multipart/form-data" action="profile.php" method="POST">
                                <div class="mb-3">
                                    <label for="editFlName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="editFlName" name="editFlName">
                                </div>
                                <div class="mb-3">
                                    <label for="editlName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="editlName" name="editlName">
                                </div>
                                <div class="mb-3">
                                    <label for="editGender" class="form-label">Gender</label>
                                    <select class="form-select" id="editGender" name="editGender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editAddress" class="form-label">Address</label>
                                    <textarea class="form-control" id="editAddress" name="editAddress" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="img" class="form-label">Select Your Image</label>
                                    <input type="file" class="form-control" id="img" name="img">
                                </div>
                                <button type="submit" class="btn btn-outline-primary" id="save" name="save">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Change Password Modal -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="changePasswordForm" action="profile.php" method="POST">
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                </div>
                                <button type="submit" class="btn btn-outline-primary" id="savePassword" name="savePassword">Save Password</button>
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
if (isset($_POST['save'])) {
    $firstname = $_POST['editFlName'];
    $lastname = $_POST['editlName'];
    $gender = $_POST['editGender'];
    $images = isset($_FILES['img']) ? $_FILES['img']['name'] : '';
    $address = $_POST['editAddress'];
    $adminEmail = $_SESSION['admin'];

    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
        $pic = $_FILES['img']['tmp_name'];
        if (file_exists("../images/profile_pictures/")) {
            move_uploaded_file($pic, "../images/profile_pictures/" . $images);
        } else {
            mkdir("../images/profile_pictures/");
            move_uploaded_file($pic, "../images/profile_pictures/" . $images);
        }
    }

    $update = "UPDATE `user` SET 
    `firstname`='$firstname',
    `lastname`='$lastname',
    `images`='$images',
    `gender`='$gender',
    `Address`='$address' 
    WHERE `email`='$adminEmail'";
    
    $run = $con->query($update);
}

if (isset($_POST['savePassword'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $adminEmail = $_SESSION['admin'];

    $checkQuery = "SELECT password FROM user WHERE email='$adminEmail'";
    $checkResult = $con->query($checkQuery);
    $userData = mysqli_fetch_assoc($checkResult);

    if ($currentPassword === $userData['password']) {
        if ($newPassword === $confirmPassword) {
            $updatePassword = "UPDATE `user` SET `password`='$newPassword' WHERE `email`='$adminEmail'";
            $run = $con->query($updatePassword);
            if ($run) {
                session_destroy();
                ?>
                <script>
                    window.location.href="../login.php";
                </script>
                <?php
                setcookie('success', 'Password updated successfully', time() + 5,"/");
            }
        } else {
            setcookie('error', 'New and Confirm Password are not matching', time() + 5,"/");
        }
    } else {
        setcookie('error', 'Current Password is incorrect', time() + 5,"/");
    }
}
?>