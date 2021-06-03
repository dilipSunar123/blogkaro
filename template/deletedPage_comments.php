<?php
    // Including the connection (database)
    include 'connection.php';

    // Storing the id of the selected comment to be deleted
    $id = $_GET['num'];

    // SQL delete query (Deleting the comments where the id matches)
    $deleteQuery = "DELETE FROM comments WHERE id = $id";

    // running the delete query(2nd parameter) along with the db connection(1st parameter)
    $query = mysqli_query($conn, $deleteQuery);
    
    // Redirected to comments.php after comment deletion
    header('location: comments.php');
?>