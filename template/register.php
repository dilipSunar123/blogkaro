<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

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

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                <p class="text-danger">
                  <?php
                    // Including the connection (database)
                    include 'connection.php';
                    // If email already exists
                    if (isset($_GET['msg'])) {
                      echo $_GET['msg'];
                      // If the password and the confirm password do not match
                    } else if (isset($_GET['passwordMismatch'])){
                      echo $_GET['passwordMismatch'];
                      // If everything is correct -- display nothing
                    } else {
                      echo $_GET['msg'] = "";
                    }
                  ?>
                </p>
                <p class="text-success">
                    <?php
                      include 'connection.php';
                      if (isset($_GET['accountDeleted'])) {
                        echo $_GET['accountDeleted'];
                      }
                    ?>
                </p>
              </div>
              <form class="user" method="POST" action="">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="firstName" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="lastName" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="confirmPassword" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                  </div>
                </div>
                <div style="display: flex; justify-content: center;">
                  <button style="width: 60%;" class="btn btn-primary btn-user btn-block" type="submit" name="submit">Register Account</button>
                </div>
                
                <hr>
                <!-- <a href="#" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="#" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
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
  
  // If the submit is clicked
  if (isset($_POST['submit'])) {
    
    // Storing the firstname entered
    $firstName = $_POST['firstName'];
    
    // Storing the lastname entered
    $lastName = $_POST['lastName'];
    
    // Storing the email entered
    $email = $_POST['email'];
    
    // Storing the password entered
    $password = $_POST['password'];
    
    // Storing the confirm password entered
    $confirmPassword = $_POST['confirmPassword'];

    // For encryption (BlowFish Encryption)
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $confPass = password_hash($confirmPassword, PASSWORD_BCRYPT);

    // SQL select query 
    $emailQuery = "SELECT * FROM register WHERE email = '$email'";
    
    // running the delete query(2nd parameter) along with the db connection(1st parameter)
    $query = mysqli_query($conn, $emailQuery);

    // Counting the no of rows 
    $emailCount = mysqli_num_rows($query);

    // email (row count) is greater than 0 i.e the email already exists
    if ($emailCount > 0) {
      $msg = "Email already exists!";
      // Display the message 'Email already exists!' and remain on the same page
      ?>
        <script>
          window.location.href="register.php?msg=Email already exists!";
        </script>
      <?php
      // header('location: register.php?msg='.$msg);
    } else {
      // if password and confirm password matches
      if ($password === $confirmPassword) {

        // sql insert query inserting all the data entered
        $insertQuery = "INSERT INTO register(firstName, lastName, email, password, confirmPassword) VALUES
          ('$firstName', '$lastName', '$email', '$pass', '$confPass')";

        // running the delete query(2nd parameter) along with the db connection(1st parameter)
        $res = mysqli_query($conn, $insertQuery);
        
        // If everything goes fine --
        if ($res) {
          $registrationDone = "Registration Successful";
          ?>
          <script>
            window.location.href="login.php?registrationDone=Registration Successfull";
          </script>
          <?php
          // header('location: login.php?registrationDone='.$registrationDone);
        } /* // If anything goes wrong -- */ else {
          ?>
            <script>alert('Registration Failed!')</script>
          <?php
        }

      } /* if passwords do not match */ else {
        $passwordMismatch = "Passwords do not match!";
        // Remain on the same page and dispaly the message 'Passwords do not match!'; 
        ?>
          <script>
            window.location.href="register.php?passwordMismatch=Passwords do not match!";
          </script>
        <?php
        // header('location: register.php?passwordMismatch='.$passwordMismatch);
      }
    }
  }
?>