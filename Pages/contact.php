<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- Title bar icon -->
    <link rel = "icon" href="https://localhost/blogTemplate/Pages/images//titleIcon2.png" type="image/x-icon">

    <!-- Including cdn.php file -->
    <?php include 'cdn.php'; ?>
    
    <!-- Including style.php file -->
    <link rel='stylesheet' type='text/css' href='style.php' />
    <!-- Adding javascript file -->
    <script src="script.js"></script>
</head>

<body>
    
    <div class="container">
        <!-- nav-bar -->
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="index.php"><i class="fas fa-pen-nib"></i></a></div>
                <button class="navbar-toggler navbar-inverse bg-inverse hidden-lg hidden-xl" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>   
                </button>
                <!-- nav-bar items -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" class="nav-item">Home</a></li>
                        <li><a href="about.php" class="nav-item">About</a></li>
                        <li class="active"><a href="contact.php" class="nav-item">Contact</a></li>
                    </ul>
                
                <!-- Search box -->
                <div class="form-group search-items">
                    <!-- Post-search form -->
                    <form method="get" action="search.php" class="searchForm">
                        <input type="text" class="form-control responsive" name="search" name="query">
                        <button class="btn btn-info">Search</button>
                    </form>
                    <!-- User registration icon -->
                    <div class="user-data">
                        <a href="https://localhost/blogTemplate//template//register.php"><i class="fas fa-user"></i></a>
                    </div>
                </div>
                </div>
                <!-- Search box ends -->
            </div>
        </nav>
        
        <!-- nav-bar ends -->

        <label for="featured articles" class="feel-free"><h4><b>Feel free to contact us anytime &#128522;</b></h4></label>
        <div class="scroll hidden-xs hidden-sm">
            <a href="#" class="to-top"><i class="fas fa-chevron-up"></i></a>
        </div>

        <!-- Contact form -->
        <div class="contactForm">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name"><h4><b>Name :</b></h4></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email"><h4><b>Email :</b></h4></label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message"><h4><b>Message :</b></h4></label>
                    <textarea cols="30" rows="10" class="form-control" name="message" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-info" style="padding: 10px; width: 10%;">Submit</button>
            </form>
        </div>
        <!-- Contact form ends -->

        <div style="margin-top: 10rem;">&nbsp</div>

        <!-- Including footer.php file -->
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>

<?php
    include ('connection.php');
    
    // Action to take place when submit button is clicked
    if (isset($_POST['submit'])) {

        // Storing data entered
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $query = "INSERT INTO contactUS(name, email, message) VALUES('$name', '$email', '$message')";

        $result = mysqli_query($conn, $query);

        // If everyone goes fine
        if ($result) {
            ?>
                <script>alert('Message Sent.')</script> 
            <?php
        } else {    
        // If something goes wrong
            ?>
                <script>alert('Something went wrong!')</script>
            <?php
        }
    }
?>