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
                <form id="userForm" action="edit-profile.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                        <select class="form-select" id="title" name="title" data-validation="required">
                            <option value="">Select</option>
                            <option value="Mr">Mr</option>
                            <option value="Ms">Ms</option>
                            <option value="Mrs">Mrs</option>
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
                        <label for="img" class="form-label">Select Your Image<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="img" name="img">
                        <span id="imgError" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Change Your Address<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="text" name="text" data-validation="required">
                        <span id="textError" class="text-danger"></span>
                    </div>

                    <center>
                        <input type="submit" class="btn btn-dark btn-lg rounded-pill w-75 btn-hover-effect" id="save" name="save" value="Save Your Information">
                    </center>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <h4>My Newsletter</h4>
                <p>Discover the latest newsletter</p>
                <p>Receive digital communications for first access to latest collections, campaigns, and videos.</p>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
$con = mysqli_connect("localhost", "root", "", "noraml_user");

$email = $_SESSION['user'];
$q = "select * from user where email='$email'";
$result = $con->query($q);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['save'])) {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $title = $_POST['title'];
    $images = isset($_FILES['img']) ? $_FILES['img']['name'] : '';
    $gender = $_POST['gender'];
    $address = $_POST['text'];
    $userEmail = $_SESSION['user'];
    
    // echo "$images";
   
    if (isset($_FILES['img']['name'])) {
        // echo "$images";
        
        $pic = $_FILES['img']['tmp_name'];
        
        if (file_exists('images/profile_pictures/')) {
            // echo "hey"; 
            move_uploaded_file($pic, 'images/profile_pictures/' . $images);
        }
        else{
            mkdir('images/profile_pictures/');
            move_uploaded_file($pic, 'images/profile_pictures/' . $images);
        }
    }
    $update = "UPDATE `user` SET 
    `firstname`='$firstname',
    `lastname`='$lastname',
    `title`='$title',
    `images`='$images',
    `gender`='$gender',
    `Address`='$address' 
    WHERE `email`='$userEmail'";
    
    $con->query($update);
}
?>