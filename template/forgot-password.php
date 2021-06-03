<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Forgot Password</title>

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
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and if you're already a member of this website then we will redirect you to the Reset Password page!</p>
                    <p class="mb-4 text-danger">
                      <?php
                        // Displaying 'Email does not exists!' if the email of the user do not exists
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
                      <input type="email" name="recoverEmail" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
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

    // storing the email address entered
    $email = $_POST['recoverEmail'];

    // Selecting the row from register table where the email matches
    $selectQuery = "SELECT * FROM register WHERE email = '$email'";

    // running the delete query(2nd parameter) along with the db connection(1st parameter)
    $query = mysqli_query($conn, $selectQuery);
    
    // counting the no of rows selected
    $row = mysqli_num_rows($query);

    // If the email is present --
    if ($row) {
      header('location: updatePassword.php');
    } /*If the email does not exists*/ else {
      $msg = "Email does not exists!";
      // remain on the same page with 'Email does not exists' message
      header('location: forgot-password.php?msg='.$msg);
    }
  }
?>
