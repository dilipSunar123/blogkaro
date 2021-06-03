<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>

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
        <?php 

            // Displaying post which user clicked on
            include 'connection.php';
            // Getting the id of the post from the index.php file (SESSION)
            $id = $_GET['id'];

            $selectQuery = "SELECT * FROM posts WHERE id = '$id'";
            $query = mysqli_query($conn, $selectQuery);
            
            while ($res = mysqli_fetch_array($query)) {
                $_SESSION['title'] = $res['topic'];
                ?>
                <div class="scroll hidden-xs hidden-sm">
                    <!-- Scroll to top button -->
                    <a href="#" class="to-top">
                        <i class="fas fa-chevron-up"></i>
                    </a>
                </div>
                <div class="post col-12" style="background-image: url('<?php echo $res['photo']; ?>')"></div>
                
                <div class="content-post">
                    <div class="content-topic">
                        <label for="topic" style="text-align: center"><h2 style="padding: 5px;"><b><?php echo $res['topic']; ?></b></h2></label>
                    </div>
                    <div class="author-details">
                        <div class="footer-card col-12"><h4>Author - <?php echo $res['author_name']; ?></h4></div>
                        
                        <p for="profile" style="font-size: 15px;">
                            View author's profile <a href="authors.php?email=<?php echo $res['author_email']; ?>">Click here</a>
                        </p>
                    </div>
                    <div class="icons hidden-xs hidden-sm">
                        <!-- Share via: &nbsp&nbsp -->
                        <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a> &nbsp
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a> &nbsp
                        <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a> &nbsp
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    </div>
                    <p class="blog-content"><?php echo $res['post']; ?></p>
                </div>
                <?php
            }
        ?>
        <label for="featured articles" style="margin-top: 15rem"><h4><b>People who read this also read-</b></h4></label>
        
        <!-- Post recommendations -->
        <div class="peopleAlsoRead col-12">
            <?php 
                include 'connection.php';
                
                $id = $_GET['id'];
                
                $selectQuery = "SELECT * FROM posts WHERE id < 5 AND id != '$id'";
                $query = mysqli_query($conn, $selectQuery);
                
                while ($res = mysqli_fetch_array($query)) {
                    ?>
                    <div class="read1 col-lg-4 col-12">
                        <img src="<?php echo $res['photo']; ?>" alt="featured image" class="featured-img">
                        <span><b><h4><?php echo $res['topic']; ?></h4></b></span>
                        <span style="margin-top: 2rem">- <?php echo $res['author_name']; ?></span>
                        <a href="blogPost.php?id=<?php echo $res['id']; ?>"><button class="btn btn-info" style="margin-top: 4rem">Read Post...</button></a>
                    </div>
                    <?php
                }
            ?>
        </div>
        
        <!-- Displaying comments (if any) -->
        <div class="table-responsive table-bordered table-hover" style="margin-top: 20rem;">
            <table class="table">
                <thead>
                    <th><h4>Name of post</h4></th>
                    <th><h4>Comment</h4></th>
                    <th><h4>Name of Commenter</h4></th>
                </thead>
                <tbody>
                    <?php
                        include 'connection.php';
                        $title = $_SESSION['title'];
                        $selectQuery = "SELECT * FROM comments WHERE name_of_the_post = '$title'";
                        $query = mysqli_query($conn, $selectQuery);

                        while ($res = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $res['name_of_the_post']?></td>
                                    <td><?php echo $res['comment']?></td>
                                    <td><?php echo $res['name']?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Form (New Comment) -->
        <form action="" method="POST" class="commentForm">
            <div class="form-group" style="width: 90%; padding: 10px;" id="addingComment">
                <h2 style="text-align: center;">LEAVE A REPLY</h2><br><br>
                <textarea name="comment" cols="30" rows="7" class="form-control detailBox" placeholder="COMMENT" style="border: 1px solid black;" name="comment" required></textarea><br>
                <input type="text" placeholder="NAME" class="form-control" style="border: 1px solid black;" name="commentorName" required><br>
                <input type="text" placeholder="NAME OF POST" class="form-control"name="nameOfPost" style="border: 1px solid black;" required><br>
                <button class="form-control btn btn-info" name="submit" type="submit">POST COMMENT</button><br>
            </div>
        </form>
        <!-- Comment form ends -->
            
        <div style="margin-top: 10rem;">&nbsp</div>

        <!-- Including footer.php file -->
        <?php include 'footer.php'; ?>        
    </div>
    
</body>
</html>

<?php
    include ('connection.php');

    // Action to take place if submit button is clicked
    if (isset($_POST['submit'])) {

        // Storing the details provided 
        $name = $_POST['commentorName'];
        $nameOfPost = $_POST['nameOfPost'];
        $comment = $_POST['comment'];

        $query = "INSERT INTO comments(name, name_of_the_post, comment) VALUES('$name', '$nameOfPost', '$comment')";

        // running the select query(2nd parameter) along with the db connection(1st parameter)
        $res = mysqli_query($conn, $query);

        // If everything goes fine
        if ($res) {
            ?><script>alert('Comment added!');</script><?php
        }
        // If something goes wrong
        else {
            ?><script>alert('Oops! Something went wrong');</script><?php
        }
    }
?>
