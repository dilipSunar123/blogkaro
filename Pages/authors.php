<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author - Page</title>

    <!-- Title bar icon -->
    <link rel = "icon" href="https://localhost/blogTemplate/Pages/images//titleIcon2.png" type="image/x-icon">

    <!-- Including cdn.php file -->
    <?php include 'cdn.php'; ?>

    <!-- Including style.php file -->
    <link rel='stylesheet' type='text/css' href='style.php' />
    <!-- Adding javascript file -->
    <script src="script.js"></script>
</head>
<style>
    
</style>
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
                        <li><a href="contact.php" class="nav-item">Contact</a></li>
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
        <?php
            include 'connection.php';

            $email = $_GET['email'];
            $select = "SELECT * FROM register WHERE email = '$email'";

            $query = mysqli_query($conn, $select);

            while ($res = mysqli_fetch_assoc($query)) {
                ?>
                <div class="scroll hidden-xs hidden-sm">
                    <a href="#" class="to-top">
                        <i class="fas fa-chevron-up"></i>
                    </a>
                </div>
                <div class="author-info">
                    <div class="author-details-info">
                        <p>First name: <?php echo $res['firstName']; ?></p>
                        <p>Last name: <?php echo $res['lastName']?></p>
                        <p>Email address: <?php echo $res['email']; ?></p>
                        <p>user id: #<?php echo $res['sl.no']; ?></p>
                        <p>Post Uploaded: </p>
                        <ul type="none">
                            <?php
                                include 'connection.php';
                                $selectQuery = "SELECT * FROM posts WHERE author_email = '$email'";
                                $query2 = mysqli_query($conn, $selectQuery);
                                while ($result = mysqli_fetch_array($query2)) {
                                    ?>
                                        <li style="text-align: left;">- <a href="blogPost.php?id=<?php echo $result['id']; ?>" class="authorPage-list"><?php echo $result['topic']; ?></a></li>
                                    <?php
                                }
                            ?>
                        </ul>
                        <div class="author-icon">
                            Follow: &nbsp
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin text-info"></i></a> &nbsp
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-square text-info"></i></a> &nbsp
                            <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp-square text-success"></i></a> &nbsp
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram-square ig"></i></a>
                        </div>
                    </div>
                    <div>
                        <img src="images/footerImg.png" alt="" class="author-img hidden-xs hidden-sm">
                    </div>
                </div>
                <?php
            }
        ?>
            
        <div style="margin-top: 15rem;">&nbsp</div>
        
        <!-- Including footer.php file -->
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>