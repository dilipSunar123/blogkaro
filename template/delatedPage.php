<?php
    // Including the connection (database)
    include ('connection.php');

    // Storing the id of the selected post to be displayed
    $id = $_GET['num'];

    // sql delete query to delete the post
    $deleteQuery = "DELETE FROM posts WHERE id = $id";

    // running the delete query(2nd parameter) along with the db connection(1st parameter)
    $query = mysqli_query($conn, $deleteQuery);

    // If deleted successfully --
    ?>
        <script>alert('Post deleted!'); </script>
    <?php
    
    // Redirected to allBlogs.php after blog deletion
    header('location: allBlogs.php');
?>