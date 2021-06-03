<?php
    // Staring the session which will allow sending data from this page to the other pages
    session_start();
    // connecting to the localhost server
    $conn = mysqli_connect('localhost', 'root');

    // Connecting to the database
    $database = mysqli_select_db($conn, 'blogkaro');

    // Action to take place if the submit button is being clicked
    if (isset($_POST['submit'])) {
        // Storing the email entered
        $email = $_POST['email'];
        // Storing the password entered
        $password = $_POST['password'];

        // sql select query selecting the email and the password of the user where the condition matches
        $emailSearch = "SELECT * FROM register WHERE email = '$email'";
        // running the delete query(2nd parameter) along with the db connection(1st parameter)
        $query = mysqli_query($conn, $emailSearch);

        // counting the no of rows
        $row = mysqli_num_rows($query);

        if ($row) {
            // Verifying the encrypted password
            $email_pass = mysqli_fetch_array($query);
            $db_pass = $email_pass['password'];
            $pass_decode = password_verify($password, $db_pass);

            if ($pass_decode) {
                // If the user clicks the remember me checkbox
                if (isset($_POST['rememberMe'])) {
                    // Set the cookie for email entered for 86400 sec
                    setcookie('emailCookie', $email, time() + 86400);
                    // Set the cookie for password entered for 86400 sec
                    setcookie('passwordCookie', $password, time() + 86400);
        
                    echo "Logged in successfully";         
                    $_SESSION['email'] = $email;
                    // heading to the dashboard
                    header('location:dashboard.php');
        
                } else {
                    echo "Logged in successfully";         
                    $_SESSION['email'] = $email;
                    // heading to the dashboard
                    header('location:dashboard.php');
                }
            } else {
                $msg = "Wrong Credentials!";
                // remain on the same page with the message 'Wrong Credentials!';
                header ('location:login.php?msg='.$msg);
            }
        } else {
            $msg = "Wrong Credentials!";
            // remain on the same page with the message 'Wrong Credentials!';
            header ('location:login.php?msg='.$msg);
        }
    }
?>