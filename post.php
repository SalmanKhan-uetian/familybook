<?php 
session_start();
  $conn = mysqli_connect("localhost" , "root" , "");
          mysqli_select_db($conn , "familybook");

          if (isset($_POST['submit'])) {
             
             $title    = $_POST['title'];
             $textarea = $_POST['textarea'];

         $photo = $_FILES['photo']['name'];
         $type  = $_FILES['photo']['type'];
         $size  = $_FILES['photo']['size'];
         $temp  = $_FILES['photo']['tmp_name'];

          if($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg') {
            
            if($size <= 987654321){
              
              if(move_uploaded_file($temp, "upload/".$photo)){
                
                 $query    = "insert into post (title , p_photo , textarea ) value('$title' , '$photo' , '$textarea')";

              $res   = mysqli_query($conn , $query);

          if ($res) {
            
             header('location:home.php?success');

          }

          else{

            header('location:post.php?error');

          }

              }

              echo "file uploaded failed";

            }

          else{
              echo 'size not matched';
          }

          }

          else{
            echo "image type is incorrect";
          }


                  
          

        }

?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
<br><br><br>
<div class="container">
  <h2>Add Post</h2>

      <form action="" method="post" enctype="multipart/form-data">

      <div class="form-group col-md-4">
        <input type="title" name="title" class="form-control" placeholder="Title" required>
      </div>

      <div class="form-group col-md-4">
        <input type="file" name="photo" class="form-control">
      </div>

      <div class="form-group col-md-4">
        <textarea rows="5" cols="48" name="textarea" class="form-control">
        	
        </textarea>     
      </div>

      <div class="row">
      
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Add Post</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
</div>

</body>
</html>