
  </head>

<script src="validation.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

  <body>


      <?php
        include_once("before-loginheader.php");
        include_once("duplicate-email.php");

        ?>
      <div class="containerr d-flex flex-wrap justify-content-between">

          <div class="login-box col-12 col-md-6 mb-4">
              <h2>Welcome Back</h2>
              <p class="text">Sign in with your email address and your password.</p>
              <p class="required">Required fields*</p>
              <form action="login.php" method="get" id="login-form">
                  <div class="mb-3">
                      <label for="email" class="form-label">Email*</label>

                      <input type="email" id="email" name="email" class="form-control" data-validation="required email">
                      <div class="error" id="passwordError"></div>
                  </div>
                  <div class="mb-3">
                      <label for="password" class="form-label">Password*</label>
                      <input type="password" id="password" name="password" class="form-control" data-validation="required">
                  </div>

                  <a href="forget passsword.php" class="forget_text">Forgot your password?</a>
                  <div class="text1 mt-3">Or use a one-time login link to sign in.</div>
                  <button type="submit" class="btn btn-secondary mt-3 " name="sign_in-btn" id="sign_in-btn">Sign In</button>
                  <!-- <button class="btn btn-outline-secondary order-btn">Order</button> -->
              </form>
              <p class="mt-3">Don't have a MyLV account? <a href="sign-up.php">Create an Account</a></p>
          </div>

          <div class="info-box col-12 col-md-5">
              <h7 class="tital">WHAT YOU WILL FIND IN YOUR MYLV ACCOUNT</h7>
              <ul class="mt-4">
                  <li class="itam"><span>*</span> Track your orders, repairs, and access your invoices</li>
                  <li class="itam"><span>*</span> Manage your personal information</li>
                  <li class="itam"><span>*</span> Receive newsletters from Louis Vuitton</li>
                  <li class="itam"><span>*</span> Create, view, and share your wishlist</li>
              </ul>
          </div>
      </div>
      <?php

        $con = mysqli_connect("localhost", "root", "", "noraml_user");

        if (isset($_GET['sign_in-btn'])) {
            $email = $_GET['email'];
            $pwd = $_GET['password'];

            $q = "SELECT * FROM user WHERE email='$email' AND password='$pwd'";
            $result = $con->query($q);

            if ($result->num_rows == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['status'] == 'active') {
                    if ($row['role'] == "admin") {
                        $_SESSION['admin'] = $email;
                        setcookie("success", "Login Successfully to Admin Panel", time() + 5, "/");
                        echo "<script>window.location.href = 'Admin_Panel/Dashboard.php';</script>";
                        // exit();
                    } else {
                        $_SESSION['user'] = $email;
                        setcookie("success", "Login Successfully To LV❤️ ", time() + 5, "/");
                        echo "<script>window.location.href = 'after-login-index.php';</script>";
                        // exit();
                    }
                } else {
                    setcookie("error", "Email is not verified", time() + 5, "/");
                    echo "<script>window.location.href = 'login.php';</script>";
                    // exit();
                }
            } else {
                setcookie("error", "Invalid username or password", time() + 5, "/");
                echo "<script>window.location.href = 'login.php';</script>";
                // exit();
            }
        }

        include 'footer.php';


        ?>