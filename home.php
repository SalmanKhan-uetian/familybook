  <?php
  session_start();
  $conn = mysqli_connect("localhost" , "root" , "");
          mysqli_select_db($conn , "familybook");

  
         

                     $result = "SELECT  * FROM post";
            $result_query   = mysqli_query($conn , $result);

            $result_fetch = mysqli_fetch_array($result_query);
            $comment_id = $result_fetch['id'];
            $user_id = $result_fetch['id'];
              $data = "SELECT * FROM comments WHERE post_id='$comment_id' AND user_id = '$user_id'";

              $firstquery = mysqli_query($conn, $data);
                    $commentquery = mysqli_fetch_array($firstquery);
?>

<?php 

          if (isset($_SESSION['loginemail'])) {
                
                $id = $_SESSION['loginemail'];

                $query = "SELECT * FROM reg WHERE id='$id'";

                  $result = mysqli_query($conn, $query);
                      $user =  mysqli_fetch_array($result);
        
        
        if (isset($_POST['comment'])) {

           $postid = $_POST['post'];
           $comment = $_POST['description'];
           $userid = $_POST['user'];

           $query = "INSERT INTO comments (post_id, comment_description, user_id)VALUES('$postid', '$comment', '$userid')";
                   $comment_insertion = mysqli_query($conn, $query);

                  


                  
        }
      } 
?>


  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>
    <div>
        <nav class="navbar navbar-default navbar-fixed-top bg-info">
      <div class="container">
        <div class="row">
          
        <?php 
             if (isset($_SESSION['loginemail'])) {
               
               $email = $_SESSION['loginemail'];

              $query = "select * from reg where id = '$email' ";
              
              $res   = mysqli_query($conn , $query);
             
           while ($row = mysqli_fetch_array($res)) { ?>
        <div class="col-md-4"><br>
          <a href="profile.php"><img src="upload/<?php echo $row['photo'];  ?>" style="width: 30px; height: 30px; border-radius: 50px; margin-right: 300px;"></a>
        </div>
      <?php } }?>
        <div class="col-md-4"><br>
          <a href="home.php" style="color: white;"><strong>Home</strong></a>
        </div>
          <div class="col-md-4"><br>
             <a href="register.php" style="color: white;"><strong>Logout</strong></a>     
           </div>

          </div>
         </div> 
        </nav>
      </div>
  


<div class="container">

     
   <?php 
            
            $query = "select * from post";
            $res   = mysqli_query($conn , $query);

            while ($post = mysqli_fetch_array($res)) { ?>
  <div class="row">


     <div class="p-5 col-lg-6">
         <h2><a href="profile.php"><img src="upload/<?php echo $post['p_photo'];?>" style="width: 30px; height: 30px; border-radius: 50px; margin-right: 300px;"><br><?php echo $row['title']; ?></a></h2>
         <a href="post_details.php?id=<?php echo $post['id']; ?>"><img src="upload/<?php echo $post['p_photo']; ?>"></a>
         <p><br><?php echo $row['textarea']; ?></p>
         <h3>Comments:</h3>
         
  <div class="media">
  <img src="upload/<?php echo $post['p_photo']; ?>" style="width:30px; height:30px; border-radius:50px;" class="mr-3">
  <div class="media-body">

    <h5 class="mt-0"><?php echo $post['title']; ?></h5>
    <?php echo $commentquery['comment_description']; ?>
  </div>
</div>

       <div class="media">
  <img src="upload/<?php echo $post['p_photo'];?>" class="mr-3" style="width: 30px; height: 30px; border-radius: 50px; margin-right: 300px;">
  <div class="media-body">
    
     
    <h5 class="mt-0">
      <form action="" method="post">
        
      <input type="hidden"   name="user" value="<?php echo $user['id']; ?>">
      <input type="hidden"   name="post" value="<?php echo $post['id']; ?>">
      <input type="text"    name="description"  class="form-control" style="border-radius:20px;" placeholder="add comment" required ><br>
      <!-- <input type="submit" class="btn btn-primary" name="comment"> -->
      <button type="submit" name="comment" class="btn btn-primary btn-flat">Add Comment</button>
    </form></h5>
    
  </div>
</div>    </div>
 
   


</div>
<?php } ?>
</div>

  </body>
  </html>


