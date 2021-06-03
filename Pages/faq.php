<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
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

        <!-- Scroll to top button -->
        <div class="scroll hidden-xs hidden-sm">
            <a href="#" class="to-top"><i class="fas fa-chevron-up"></i></a>
        </div>
        
        <label for="featured articles" class="index-featured-articles"><h3><b>Frequently Asked Questions (FAQs)</b></h3></label>
            <div class="blogs" id="blogs" style="margin-top: 20px;" id="postMainDiv">
                <div class="card faqCard">
                    <div class="card-header"><span style="color: red;">Question</span> - Can I upload a blog without creating an account?</div><br>
                    <p><span style="color: #00B74A;">Ans</span> - No. You need to first create an account on blogkaro.com to start uploading your own blogs.
                        <p>Thank you.</p>
                    </p>
                </div>
            </div>
            <div class="blogs" id="blogs" style="margin-top: 20px;" id="postMainDiv">
                <div class="card faqCard">
                    <div class="card-header"><span style="color: red;">Question</span> - Post once uploaded can be edited or deleted ?</div><br>
                    <p><span style="color: #00B74A;">Ans</span> - Ofcourse. You're always free to do that.
                        <p>Thank you.</p>
                    </p>
                </div>
            </div>
            <div class="blogs" id="blogs" style="margin-top: 20px;" id="postMainDiv">
                <div class="card faqCard">
                    <div class="card-header"><span style="color: red;">Question</span> - Can I upload a blog without creating an account?</div><br>
                    <p><span style="color: #00B74A;">Ans</span> - No. You need to first create an account on blogkaro.com to start uploading your own blogs.
                        <p>Thank you.</p>
                    </p>
                </div>
            </div>
            <div class="blogs" id="blogs" style="margin-top: 20px;" id="postMainDiv">
                <div class="card faqCard">
                    <div class="card-header"><span style="color: red;">Question</span> - I recently uploaded a post and now I want check who commented on my blog. How can I do that?</div><br>
                    <p><span style="color: #00B74A;">Ans</span> - You can view the comments on your blog in 2 ways <br> &emsp;&emsp;&emsp; 
                                1. Navigate to your blog page and scroll
                                down. You'll see the comments there (If anyone did). <br> &emsp;&emsp;&emsp; 
                                2. Login and navigate to the comments
                                page from the dashboard. You'll see the comments on all your blogs there. in addition, you can 
                                &emsp;&emsp;&emsp;&emsp; even delete comments if you want.
                        <p>Thank you.</p>
                    </p>
                </div>
            </div>
            <div class="blogs" id="blogs" style="margin-top: 20px;" id="postMainDiv">
                <div class="card faqCard">
                    <div class="card-header"><span style="color: red;">Question</span> - I want to check the total number of bloggers who have created account and uploaded blog. How can I do that?</div><br>
                    <p><span style="color: #00B74A;">Ans</span> - For doing that you simply need to login first, then once you are on the dashboard then you can click
                                on bloggers using the side-bar provided. You'll see the entire list there.
                        <p>Thank you.</p>
                    </p>
                </div>
            </div>
        <div style="margin-top: 15rem;">&nbsp</div>
        
        <!-- Including footer.php file -->
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>