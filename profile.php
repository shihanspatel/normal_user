<?php
include_once("After-login-header.php");
$con = mysqli_connect("localhost", "root", "", "noraml_user");

$email = $_SESSION['user'];
$q = "select * from user where email='$email'";
$result = $con->query($q);
$row = mysqli_fetch_assoc($result);



?>

<div class="text-center mt-4">
    <h3><?php echo $row['firstname']; ?></h3>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h2>My Profile</h2>
                <hr>
                <p>Title:- <?php echo "$row[title]"; ?></p>
                <!-- <p>E-mail:- ?></p> -->
                <p>Gander:- <?php echo "$row[gender]"; ?></p>
                <!-- <p>Mobile Number:- </p> -->
                <p>Address:- <?php echo "$row[Address]"; ?></p>
                <a href="edit-profile.php"><button class="btn btn-outline-dark mt-3 btn-block">Edit My Profile</button></a>
            </div>
        </div>
     <div class="col-md-6 mb-4">
        
     <div class="">
            <div class="card p-4">
                <h2>My Orders</h2>
                <hr>
                <p class="text-center">There are no current orders</p>
                <button type="button" class="btn  mx-auto" style="border: 1px solid black;"><a href="after-login-man_cloth.php" style="text-decoration: none; color:black;" class="a">Start Shopping</a></button>
            </div>
        </div>
        <br>
        <div class="info-box">
                <h4>Primary,</h4>
                <p><strong>Email:-</strong>  <?php echo $row['email'];?></p>
                <p><strong>Mobile Number:-</strong> <?php echo "$row[mobilenumber]"; ?></p>
                <button class="btn btn-dark rounded-pill " id="s"><a href="pass.php" style="text-decoration: none; color:#ffffff">Change Password</a></button>
            </div>
     </div>
       
    </div>
</div>

<div class="text-center mt-4">
    <button type="button" class="btn btn-outline-danger" style="border-radius:50px"><a href="login.php" style="text-decoration: none; color:black;">    <?php  setcookie('success','logout successfull',time()+5,"/");?>Logout</a></button>
</div>
<br>
<?php include_once("footer.php"); ?>