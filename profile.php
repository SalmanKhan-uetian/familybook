  <?php
  session_start();
  $conn = mysqli_connect("localhost" , "root" , "");
          mysqli_select_db($conn , "familybook");
 
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
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



  <div class="container-fualt">

      <div class="row">
         <?php

                   if (isset($_SESSION['loginemail'])) {
              
                   $email = $_SESSION['loginemail'];
              
             
          $query  = "select * from reg where id = '$email' ";
          $result = mysqli_query($conn , $query);


        while ($row = mysqli_fetch_array($result)) { 

       ?>
       <div class="col-lg-12">
       <!--  <img src="upload/11.jpg" style="width: 1350px; height: 550px;">

       <img src="upload/<?php echo $row['photo']; ?>" style="border-radius: 200px; width: 200px; height: 200px;" > -->

    <div>
         
         <img src="upload/11.jpeg" style="width:100%; height:550px; position: relative;">  
         
         <img src="upload/<?php echo $row['photo']; ?>" style="border-radius: 200px; width: 200px; height: 200px; position: absolute; margin-top: -150px; margin-left: 50px;" >
         <br><br><br><br><br>

         <h4 class="p-3 text-info">First Name: <?php echo $row['f_name']; ?></h4>
         <h4 class="p-3 text-info">Last Name : <?php echo $row['l_name']; ?></h4>  
         <h4 class="p-3 text-info">Address   : <?php echo $row['address']; ?></h4>
         <h4 class="p-3 text-info">Number    : <?php echo $row['number']; ?></h4>
         <h4 class="p-3 text-info">DOB       : <?php echo $row['dob']; ?></h4>
    
 
    </div>

</div>
<?php } } ?>
    
  </div>

  </body>
  </html>