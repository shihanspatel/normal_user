<?php include_once("After-login-header.php"); ?>


<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<br>
<h2 style="margin-left: 40px;">Contact Us</h2>
<form id="contactForm"style="margin-left: 40px; " method="get" action="profile.php">
    <div class="mb-3">
        <label class="form-label">Change Address</label>

        <textarea class="form-control" rows="4" name="txt" id="txt" data-validation="required min" data-min="10" style="width: 80%;"></textarea>
        <span id="txtError" class="text-danger"></span>
    </div>
    <button type="submit" name="save" id="save" class="btn btn-primary">Save</button>
</form>
<br>
<?php include_once("footer.php");

if (isset($_GET['save'])) {
    $address = $_GET['txt'];
    $update = "update `user` set `Address`='$address' where `email`='$userEmail'";

    $run = $con->query($update);
}


?>