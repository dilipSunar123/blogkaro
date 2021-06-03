<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                        <li class="active"><a href="index.php" class="nav-item">Home</a></li>
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

        <!-- Jubmotron -->
        <div class="jumbotron index-jumbo col-lg-12 col-12">
            <div class="jubmo-content">
                <h2 class="m-auto"><b>blogkaro.com</b></h2>
                <p class="m-auto">
                    A place where all the talented bloggers meet, post and get famous together. <br>
                    Most of the popular bloggers started as a beginner from this site. So come, join 
                    us<br> and get famous. 
                </p>
            </div>
            <div class="div-handWithPen">
                <img src="m_33.jpg" class="img-blogIcon hidden-sm hidden-xs" alt="icon">
            </div>
        </div>

        <!-- Scroll to top button -->
        <div class="scroll hidden-xs hidden-sm">
            <a href="#" class="to-top"><i class="fas fa-chevron-up"></i></a>
        </div>
        
        <!-- Jubmotron ends -->
        
        <label for="featured articles" class="index-featured-articles"><h3><b>Featured Articles</b></h3></label>
        <?php
            
            // Displaying all the posts in descending order
            include 'connection.php';
            $selectQuery = "SELECT * FROM posts ORDER BY id DESC";
            $query = mysqli_query($conn, $selectQuery);
            
            while ($res = mysqli_fetch_array($query)) {
                ?>
                <div class="blogs" id="blogs" style="margin-top: 20px;" id="postMainDiv">
                    <div class="card cardOwn">
                        <div class="card-header"><img src="<?php echo $res['photo']; ?>" alt="Featured Image" class="featured-img"></div>
                        <div class="card-body">
                            <h4><?php echo $res['topic']; ?></h4>
                            <p>- <?php echo $res['author_name']?></p>
                            <div style="margin-top: 20px"><a href="blogPost.php?id=<?php echo $res['id']; ?>"><button class="btn btn-info">Read post...</button></a></div>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
        <!-- Video -->
        <center>
            <div class="video">
                <video controls autoplay muted style="width: 95%">
                    <source src="PPGJ9005.MOV" type="video/mp4">
                    <source src="PPGJ9005.MOV" type="video/ogg">
                </video>
            </div>
        </center>
        <!-- Video ends -->
        <div style="margin-top: 15rem;">&nbsp</div>
        
        <!-- Including footer.php file -->
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
