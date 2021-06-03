<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CDN link of bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <style>
        body {
            /* Setting background color of the page */
            background-color: #2980b9;
        }
        /* Remove company name from WYSIWYG Text Editor using CSS */
      .tox-statusbar__branding {
           display:none;
       }
       .tox-notification__body {
           display:none;
       }
       .tox-notifications-container {
           display:none;
       }
    </style>
    <title>Dashboard - Editor</title>
</head>
<body>
    <div class="container mt-4 mb-4">
        <div class="row justify-content-md-center">
          <div class="col-md-12 col-lg-8">
            <label style="color: white; font-size: 20px;">It's now time to <i><u>pour your heart out</u></i> :)</label>
            <br><br>
            <!-- form to upload new blog -->
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="col-lg-12 col-12">
                <label for="topic" class="form-group text-white input-lg">Topic : </label>
                <input type="text" name="topic" style="width: 114px;" class="form-group" required/>
                <label for="name" class="form-group text-white input-lg">Author Name : </label>
                <input type="text" name="authorName" class="form-group" required/>
                <label for="email" class="form-group text-white input-lg">E-mail : </label>
                <input type="text" class="form-group" name="author_email" required/>
                <input type="file" name="photo">
                <!-- <input type="text" class="form-group" name="photo" required placeholder="enter image url..."/> -->
                <textarea type="text" id="editor" class="form-group" name="posts" style="height: 60vh;"></textarea>
                <button type="submit" name="submit" class="btn btn-primary">Upload</button>  
              </div>
            </form>
          </div>
        </div>
      </div>    
</body>
<!-- CDN links for the textarea -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea#editor',
      menubar: false
    });
</script>
</html>

<?php
  // Including the connection (database)
  include 'connection.php';

  // Action to take place if the submit button is clicked
  if (isset($_POST['submit'])) {
    // Storing the content of post
    $posts = $_POST['posts'];
    // Storing the topic
    $topic = $_POST['topic'];
    // Storing the name of author
    $authorName = $_POST['authorName'];
    // Storing the image
    $image = $_FILES['photo'];
    // Storing the email address
    $email = $_POST['author_email'];
    
    // Storing the details of the image 
    $fileName = $image['name'];
    $filePath = $image['tmp_name'];
    $fileError = $image['error'];

    if ($fileError == 0) {
      // Storing the image from the temp folder to the uploadImg folder
      $destination = 'images/'.$fileName;
      move_uploaded_file($filePath, $destination);
    }

    // sql select query to store the data entered
    $insertQuery = "INSERT INTO posts(photo, post, topic, author_name, author_email) VALUES('$destination', '$posts', '$topic', '$authorName', '$email')";

    // running the select query(2nd parameter) along with the db connection(1st parameter)
    $res = mysqli_query($conn, $insertQuery);

    // if everything goes fine --
    if ($res) {
      ?>
      <script>alert('Post uploaded.')</script>
      <?php
    } /* if something goes wrong -- */ else {
      ?>
      <script>alert('Oops! Something went wrong.')</script>
      <?php
    }
  }
?>
