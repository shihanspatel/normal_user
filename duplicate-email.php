<?php
$con = mysqli_connect("localhost", "root", "", "noraml_user");

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT email FROM user WHERE email='$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
    setcookie('error', 'The entered E-mail Address is already registered You Can Try With Another E-mail Account', time() + 5,"/");

      session_destroy();
      ?>
      <script>window.location.href="sign-up.php"</script>
      <?php
    } else {
    
    }
}
?>
