  <?php
  session_start();
  $conn = mysqli_connect("localhost" , "root" , "", "familybook");
  
           $data = "SELECT * FROM comments";


              $firstquery = mysqli_query($conn, $data);
            $commentquery =mysqli_fetch_array($firstquery);

                        if (isset($_GET['id'])) {
                           $post_id = $_GET['id'];
                           $user_id = $_GET['id'];
                           $commentid = $_GET['id'];
                        
                        if (isset($_POST['submit'])) {
                          
                          $name = $_POST['reply'];
                          // $commentid = $_POST['replycomment'];
                          // $user_id = $_POST['userid'];

    
                          $reply_query = "insert into reply (post_id ,comment_id, reply, user_id) value('$post_id', '$commentid', '$name', '$user_id')";
                          $reply_res   = mysqli_query($conn , $reply_query);
                        }
                      }
                        
   
?>


  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<link rel="stylesheet" href="css/c.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>

  <body>
    <div>
        <nav class="navbar navbar-default navbar-fixed-top bg-info">
      <div class="container">
        <div class="row">
          
    
        <div class="col-md-4"><br>
          <a href="profile.php"></a>
        </div>
  
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
   <?php 
              if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                
                   $query = "select * from post where id = '$id'";
            $res   = mysqli_query($conn , $query);

                $post = mysqli_fetch_array($res);
              
}
        ?> 

<div class="container">

     

          
  <div class="row">

<br><br><br>
     <div class="p-5 col-lg-6">
         <h2><a href="profile.php"><img src="upload/<?php echo $post['p_photo'];?>" style="width: 30px; height: 30px; border-radius: 50px; margin-right: 300px;"><br><?php echo $post['title']; ?></a></h2>
         <img src="upload/<?php echo $post['p_photo']; ?>">
         <!-- <p><br><?php echo $post['textarea']; ?></p> -->
         

       </div>
     </div>
   </div>
         
         
<div class="container">
  
  <div class="card">
      <div class="card-body">
        <?php 

            if (isset($_GET['id'])) {

              $cid = $_GET['id'];
              $uid = $_GET['id'];

              $data = "SELECT * FROM comments WHERE post_id='$cid' AND user_id = '$uid'";


              $firstquery = mysqli_query($conn, $data);
                    while($commentquery =mysqli_fetch_array($firstquery)){
   ?>
          <div class="row">
            <h3>Comments:</h3>
              <div class="col-md-4">
                  <img src="upload/<?php echo $post['p_photo'];?>" class="mr-3" style="width: 30px; height: 30px; border-radius: 50px; margin-right: 300px;" class="img img-rounded img-fluid"/>
                  <!-- <p class="text-secondary text-center">15 Minutes Ago</p> -->
              </div>
              <div class="col-md-4">
                  <p>
                      <a href="home.php" style="margin-left: -350px;"><strong><?php echo $post['title']; ?></strong></a>
                      <!-- <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                      <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                      <span class="float-right"><i class="text-warning fa fa-star"></i></span> -->

                 </p>
                 <div class="clearfix"></div>
                  <p style="margin-left: -350px; width: 400px;"><?php echo $commentquery['comment_description']; ?></p>
                  <p>
                  
                  
                      <button type="button" class="btn btn-primary" style="margin-left:-120px;">Reply</button>
                      <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>

                      
                     <form action="" method="post" class="form" >
                       <input type="hidden" name="replycomment" value="<?php echo $commentquery['id'];?>">

                      <input type="hidden" name="userid" value="<?php echo $commentquery['id'];?>"> 

                       <input type="text" name="reply" class="form-control" style="margin-left: -300px;">
                       <input type="submit"  value="reply" name="submit" style="margin-left: -300px; margin-bottom: 20px;">
                     </form>
                      
                 </p>
              </div>
               <div class="col-md-4">
                 
               </div>
          </div>
            <script>
                      $(document).ready(function(){
                      $('.form').hide();
                      $('.btn-primary').click(function(){
                      $('.form').show();
                      });
                      });
                    </script>


<?php } }?>
 <div class="row">
    
              <h3>Reply:</h3>
              <div class="col-md-4">
                  <img src="upload/<?php echo $post['p_photo'];?>" class="mr-3" style="width: 30px; height: 30px; border-radius: 50px; margin-right: 300px;" class="img img-rounded img-fluid"/>
                  <!-- <p class="text-secondary text-center">15 Minutes Ago</p> -->
              </div>

              <div class="col-md-4">
                <?php 
            // $id  = $commentquery['id'];     

      if (isset($_GET['id'])) {
          
          $postid = $_GET['id'];
      
            $query = "select * from reply where post_id = '$postid'";
            $reply = mysqli_query($conn , $query);
             while ($fetchquery  = mysqli_fetch_array($reply)){?>

                  <p>
                      <a href="home.php" style="margin-left: -350px;"><strong><?php echo $post['title']; ?></strong></a>
                      <!-- <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                      <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                      <span class="float-right"><i class="text-warning fa fa-star"></i></span> -->

                 </p>
                 <div class="clearfix"></div>
                  <p style="margin-left: -350px;"><?php echo $fetchquery['reply']; ?></p>
                  <p>
                                <?php } }?>
                  
                  
                      <button type="button" class="btn btn-primary" style="margin-left:-120px;">Reply</button>
                      <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>

                      
                     <form action="" method="post" class="form" >
                      <input type="hidden" name="replycomment" value="<?php echo $commentquery['id'];?>">
                        
                      <!-- <input type="hidden" name="userid" value="<?php echo $commentquery['id'];?>"> -->

                       <input type="text" name="reply" class="form-control" style="margin-left: -300px;">
                       <input type="submit"  value="reply" name="submit" style="margin-left: -300px; margin-bottom: 20px;">
                     </form>
                      
                 </p>
              </div>

               <div class="col-md-4">
                 
               </div>
          </div>
      </div>
       <div class="media">
  
  <div class="media-body">
    
    <img src="upload/<?php echo $post['p_photo'];?>" class="mr-3" style="width: 30px; height: 30px; border-radius: 50px; margin-right: 300px;">

          
    <h5 class="mt-0">

      <?php 

         if (isset($_GET['id'])) {
           $post_id = $_GET['id'];
           $user_id = $_GET['id'];
         
        
          if (isset($_POST['comment'])) {
            
            $comment_description = $_POST['description'];

              $comment_query = "INSERT INTO comments(post_id,comment_description,user_id)VALUES('$post_id', '$comment_description', '$user_id')";

             $comment_result =  mysqli_query($conn, $comment_query);

          }
 
}
       ?>

      <form action="" method="post">
      <div>
      <input type="text" name="description"  class="form-control" style="border-radius:20px; width: 40%;" placeholder="add comment" required >
      </div><br>
      <!-- <input type="submit" class="btn btn-primary" name="comment"> -->
      <button type="submit" name="comment" class="btn btn-primary btn-flat">Add Comment</button>
    </form></h5>
    
  </div>
</div>
  </div>

</div>
   
    </body>
  </html>

