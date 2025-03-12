<?php 

include_once("After-login-header.php");

if (isset($_POST['email']) && isset($_POST['token'])){

$con = mysqli_connect("localhost", "root", "", "noraml_user");
    $email = $_POST['email'];
    $token = $_POST['token'];
    $sql = "SELECT * FROM user WHERE email = '$email' AND token = '$token'";
    $count = $con->query($sql);
    $row = mysqli_fetch_assoc($count);
}
?>

<div class="text-center mt-4">
    <h3><?php echo $row['email']; ?></h3>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h2>My Profile</h2>
                <hr>
                <p>Title:- Mr.</p>
                <p>Country:- India</p>
                <p>E-mail:- shihanspatel07@gmail.com</p>
                <p>Gander:- Male</p>
                <p>Mobile Number:- 8780074890</p>
                <a href="edit-profile.php"><button class="btn btn-outline-dark mt-3 btn-block">Edit My Profile</button></a>


            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h2>My Orders</h2>
                <hr>
                <p class="text-center">There are no current orders</p>
                <button type="button" class="btn  mx-auto" style="border: 1px solid black;"><a href="after-login-man_cloth.php" style="text-decoration: none; color:black;" class="a">Start Shopping</a></button>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-4">
    <button type="button" class="btn btn-outline-danger" style="border-radius:50px"><a href="login.php" style="text-decoration: none; color:black;">Logout</a></button>
</div>
<br>
<?php include_once("footer.php"); ?>
