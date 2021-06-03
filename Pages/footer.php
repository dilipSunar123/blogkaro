
<div class="footer">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-7ZE0yPLYziujpaBaoR_pYWp7FeUsn4tktA&usqp=CAU" alt="" class="footer-Img">
    <p style="font-size: 20px">
        blogkaro.com is more than just a blog. Become a member today <br>to discover how 
        we can help you <br>publish a beautiful blog. <br><br>
        <a href="https://localhost/blogTemplate//template//register.php"><button class="btn btn-info" style="font-size: 17px">Register now</button></a>
    </p>
</div>
<!-- Drop Down list -->
<div class="dropdown hidden-xs hidden-sm">
    <!-- <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">More -->
    <span data-toggle="dropdown">More<span class="caret"></span></button></span>
    
    <ul class="dropdown-menu">
        <li><a href="faq.php">FAQs</a></li>
        <li><a href="USER MANUAL.pdf" download="USER MANUAL">Download Manual</a></li>
    </ul>
</div>

<!-- List section -->
<div class="footerList hidden-xs hidden-sm">
    <!-- List of pages -->
    <div class="listSection">
        <ul type="none">
            <li style="font-size: 17px">Pages</li>
            <li><a href="index.php" class="list">Home</a></li>
            <li><a href="about.php" class="list">About</a></li>
            <li>
            <style>.tooltip { font-size: 16px;} </style>
                <a href="#" data-toggle="tooltip" data-placement="left" 
                title="To read a blog, visit the home page and select a featured article."
                class="list">Blog</a>
            </li>
            <li><a href="contact.php" class="list">Contact</a></li>
        </ul>
    </div>
    <!-- List of pages ends -->

    <!-- List of blogs -->
    <div class="listSection">
        <ul type="none">
            <li style="font-size: 17px">Blogs</li>
            <?php
                
                // Displaying some posts
                include 'connection.php';
                $selectQuery = "SELECT * FROM posts WHERE id < 5";
                $query = mysqli_query($conn, $selectQuery);
                while ($res = mysqli_fetch_array($query)) {
                    ?>
                        <li><a href="blogPost.php?id=<?php echo $res['id']; ?>" class="list"><?php echo $res['topic']; ?></a></li>
                    <?php
                }
            ?>
        </ul>
    </div>
    <!-- List of blogs ends -->

    <!-- List of developers -->
    <div class="listSection">
        <ul type="none">
            <li style="font-size: 17px">Developers</li>
            <li><a href="#" class="list">Dilip Kumar Sunar</a></li>
            <li><a href="#" class="list">Binjina Magar</a></li>
            <li><a href="#" class="list">Dafeny Sawian</a></li>
            <li><a href="#" class="list">Zarzosang Hmar</a></li>
        </ul>
    </div>
    <div class="listSection">
        <ul type="none">
            <li style="font-size: 17px">Developers</li>
            <li><a href="#" class="list">Versha M Sangma</a></li>
            <li><a href="#" class="list">Jordan Kharlin</a></li>
            <li><a href="#" class="list">&nbsp</li>
            <li><a href="#" class="list">&nbsp</li>
        </ul>
    </div>
    <!-- List of developers ends-->
</div>
<!-- List section ends -->

<!-- Social media icons -->
<div class="qr">
    <img src="https://chart.apis.google.com/chart?cht=qr&chs=100x100&chl=https://www.iumeghalaya.edu.in/" class="qrImg hidden-sm hidden-xs">
</div>
<div class="footerIcons hidden-xs hidden-sm">
    <a href="https://www.github.com/" target="_blank"><i class="fab fa-github" style="font-size: 25px; float: right; margin-left: 5px"></i></i></a>
    <a href="https://www.google.com/" target="_blank"><i class="fab fa-google" style="font-size: 25px; float: right; margin-left: 5px"></i></a>
    <a href="https://twitter.com/?lang=en" target="_blank"><i class="fab fa-twitter" style="font-size: 25px; float: right; margin-left: 5px"></i></a>
    <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" style="font-size: 25px; float: right; margin-left: 5px"></i></a>
</div>
<!-- Social media icons ends-->
<div class="helpDiv">
    <span><a href="faq.php">Need help?</a></span>
</div>



<!-- Copyright section -->
<div class="copyright">
    <span>Copyright &copy;blogkaro.com | 2021</span>
    <a href="https://www.vecteezy.com/free-vector/e-commerce">Graphics by Vecteezy</a>
</div>