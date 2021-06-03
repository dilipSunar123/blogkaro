<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <style>
      body {
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
       .break-all {
         /* word-break: break-word; */
         word-break: break-all;
       }
    </style>
    <title>Dashboard - Editor</title>

    <!-- Title bar icon -->
    <link rel = "icon" href="https://localhost/blogTemplate/Pages/images//titleIcon2.png" type="image/x-icon">
</head>
<body>
    <div class="container mt-4 mb-4">
        <div class="row justify-content-md-center">
            <?php
                // Including the connection (database)
                include 'connection.php';

                // Storing the id coming from the editor.php page which the user chose to edit 
                $id = $_GET['num'];

                // sql query selecting the details of row whose id is matched
                $selectQuery = "SELECT * FROM posts WHERE id = $id";

                // running the delete query(2nd parameter) along with the db connection(1st parameter)
                $showData = mysqli_query($conn, $selectQuery);

                // fetching the array values of the data
                $arrayData = mysqli_fetch_array($showData);

                // If the submit button is clicked
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
                      $destination = 'images//'.$fileName;
                      // echo $destination;
                      move_uploaded_file($filePath, $destination);
                    }
                                
                    // sql update query which will update the row selected with new data 
                    $updateQuery = "UPDATE posts SET photo = '$destination', post = '$posts', topic = '$topic', author_name = '$authorName', author_email = '$email' WHERE id = $id";
                    
                    // running the update query(2nd parameter) along with the db connection(1st parameter)
                    $res = mysqli_query($conn, $updateQuery);

                    // If everything goes fine
                    if ($res) {
                    ?>
                    <script>alert("Post updated!");</script>
                    <?php
                    } /* If something goes wrong */ else {
                    ?>
                    <script>alert("Error!")</script>
                    <?php
                    }
                }
            ?>
          <div class="col-md-12 col-lg-8">
            <label style="color: white; font-size: 20px;">It's now time to <i><u>pour your heart out</u></i> :)</label>
            <br><br>
            <form method="POST" action="">
              <div class="col-lg-12 col-12">
                <!-- Topic (text) -->
                <label for="topic" class="text-white input-lg">Topic : </label>
                <!-- Textbox displaying previous topic -->
                <input type="text" name="topic" style="width: 114px;" value="<?php echo $arrayData['topic']; ?>"/>
                <!-- Author name (text) -->
                <label for="topic" class="text-white">Author Name : </label>
                <!-- Textbox displaying previous author name -->
                <input type="text" name="authorName" class="form-group" value="<?php echo $arrayData['author_name']; ?>"/>
                <!-- Email (text) -->
                <label for="topic" class="form-group text-white input-lg">E-mail : </label>
                <!-- Textbox displaying previous author email address -->
                <input type="text" class="form-group" name="author_email" value="<?php echo $arrayData['author_email']?>"/>
                <!-- Displaying url of previous image url -->
                <input type="file" name="photo" value="<?php echo $arrayData['photo']; ?>">
                <div class="form-group" style="background-color: #95a5a6; height: 60vh; margin-top: 10px">
                  <!-- Displaying previous post -->
                  <textarea type="text" id="editor" name="posts" style="height: 60vh;"><?php echo $arrayData['post']; ?></textarea>
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary">Upload</button>  
              </div>
            </form>
          </div>
        </div>
      </div>    
</body>
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

