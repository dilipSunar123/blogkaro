<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Delete Account Confirmation</title>

  <!-- Title bar icon -->
  <link rel = "icon" href="https://localhost/blogTemplate/Pages/images//titleIcon2.png" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Delete Account?</h1>
                    <p>
                        Sure you want to delete your blog account?
                        Please fill in the  details below so that we authenticate whether its 
                        actually you or not.
                    </p>
                    <p class="text-danger">
                        <?php
                            include 'connection.php';
                            if (isset($_GET['wrongCredentials'])) {
                                echo $_GET['wrongCredentials'];
                            }
                        ?>
                    </p>
                    
                    <!-- <p class="text-danger"></p>
                    <p class="text-success"></p> -->
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." autocomplete="off" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">
                      Delete Account
                    </button>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
    include 'connection.php';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $selectQuery = "SELECT * FROM register WHERE email = '$email'";

        $query = mysqli_query($conn, $selectQuery);

        $rowCount = mysqli_num_rows($query);

        if ($rowCount) {
            // decoding
            $email_pass = mysqli_fetch_array($query);
            $dbPass = $email_pass['password'];
            $passDecode = password_verify($password, $dbPass);

            if ($passDecode) {
                $deleteQuery = "DELETE FROM register WHERE email = '$email'";
                $query2 = mysqli_query($conn, $deleteQuery);
            
                $accountDeleted = "Account Successfully deleted."
                ?>
                    <script>
                        window.location.href="register.php?accountDeleted=Account Successfully deleted.";
                    </script>
                <?php
            } else {
                $wrongCredentials = "Wrong Credentials!";
                ?>
                    <script>
                        window.location.href="deleteAccount.php?wrongCredentials=Wrong Credentials!";
                    </script>
                <?php
            }
        } else {
            $wrongCredentials = "Wrong Credentials!";
            ?>
                <script>
                    window.location.href="deleteAccount.php?wrongCredentials=Wrong Credentials!";
                </script>
            <?php

        }

    }
?>