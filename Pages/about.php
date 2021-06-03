<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

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
                        <li class="active"><a href="about.php" class="nav-item">About</a></li>
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

        <!-- Jumbotron -->
        <div class="jumbotron aboutJumbo col-lg-12 col-12" style="margin-top: 3rem">
            <h2 class="m-auto"><b>blogkaro.com</b></h2>
            <p style="margin-top: 30px;" class="m-auto">
                <p>
                    blogger.com is a blog site where bloggers come, create their account, post blogs 
                    and get famous together.
                </p>
                <p>
                    This site was designed and developed by a group of students
                    from Shillong, Meghalaya as part of their Summer Internship Program(SIP) with software company 
                    <b>Codigion</b>. <br> <p>Visit- <a href="https://codigion.com/" target="_blank">https://codigion.com/</a></p>
                </p>
                <p>User can visit, read as well as comment on the post they read.</p>
                <p>The UI has been designed by referring to many templates over the Internet.</p>
                <p style="font-size: 15px; margin-top: 95px; text-align: center;">
                    <i>
                        "We had fun designing this blog and we really thank <b>Sir Shiva</b> and the entire team of 
                        <b>Codigion</b> for their support and guidance. This won't have been possible without them."
                    </i>
                </p>
            </p>
        </div>
        <!-- Jumbotron ends -->

        <!-- Scroll to top button -->
        <div class="scroll hidden-xs hidden-sm">
            <a href="#" class="to-top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>

        <!-- Post Suggestions -->
        <label for="featured articles" style="margin-top: 15rem"><h4><b>You might like to read-</b></h4></label>
        <div class="peopleAlsoRead">
        <?php
            
            // Displaying some posts
            include 'connection.php';
            $selectQuery = "SELECT * FROM posts WHERE id < 4";
            $query = mysqli_query($conn, $selectQuery);
            
            while ($res = mysqli_fetch_array($query))  {
                ?>
                <div class="read1 col-lg-4 col-12">
                    <img src="<?php echo $res['photo']; ?>" alt="" class="featured-img">
                    <span><b><h4><?php echo $res['topic']?></h4></b></span>
                    <span style="margin-top: 2rem">- <?php echo $res['author_name']?></span>
                    <a href="blogPost.php?id=<?php echo $res['id']; ?>"><button class="btn btn-info" style="margin-top: 4rem">Read Post...</button></a>
                </div>
                <?php
            }
        ?>
        </div>
        <div style="margin-top: 10rem;">&nbsp</div>

        <!-- Including footer.php file -->
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>