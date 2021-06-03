<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Reset Password</title>

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
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Reset Password!</h1>
                    <p class="mb-4 text-danger">
                      <?php
                        // Displaying 'Passwords do not match!' if the passowords do not match
                        if (isset($_GET['msg'])) {
                          echo $_GET['msg'];
                        } else {
                          $_GET['msg'] = "";
                        }
                      ?>
                    </p>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="password" name="recoverPassword" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter New Password..." autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="password" name="recoverCPassword" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Confirm New Password..." autocomplete="off">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="login.php">Already have an account? Login!</a>
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
  // Including the connection (database)
  include 'connection.php';
  
  // action to be taken if the submit button is clicked
  if (isset($_POST['submit'])) {

    // Storing the password entered
    $newPass = $_POST['recoverPassword'];
    // Storing the confirm password entered
    $newCPass = $_POST['recoverCPassword'];

    // If both the passwords matches
    if ($newPass === $newCPass) {

        // Storing the email which is comming from loginAuthenticate.php page through session
        $val = $_SESSION['email'];

        // sql update query to update the new password and confirm password
        $updateQuery = "UPDATE register SET password = '$newPass', confirmPassword = '$newCPass' WHERE email = '$val'";
        
        // running the delete query(2nd parameter) along with the db connection(1st parameter)
        $query = mysqli_query($conn, $updateQuery);

        // If everything goes fine
        if ($query) {
            header('location: login.php');
            $msg = "Password Updated!";
            $_SESSION['$msg'];
            ?>
                <script>alert('Password Updated Successfully!')</script>
            <?php
        }/*If something goes wrong*/ else {
            ?>
                <script>alert('Error! Please try again')</script>
            <?php
        }
    } /*If passwords do not match*/ else {
      $msg = "Passwords do not match!";
      // remain on the same page with 'Passwords do not match!' message
      header('location: updatePassword.php?msg='.$msg);
    }
  }
?>
