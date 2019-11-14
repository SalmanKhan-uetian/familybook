<?php 
session_start();
$conn = mysqli_connect("localhost" , "root" , "");
        mysqli_select_db($conn , "familybook");

        if (isset($_POST['submit'])) {

          $fname    = $_POST['fname'];
          $lname    = $_POST['lname'];
          $email    = $_POST['email'];
          $address  = $_POST['address'];
          $number   = $_POST['number'];
          $dob     = $_POST['dob'];
          $pass     = $_POST['password'];
 
         $photo = $_FILES['photo']['name'];
         $type  = $_FILES['photo']['type'];
         $size  = $_FILES['photo']['size'];
         $temp  = $_FILES['photo']['tmp_name'];

          if($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg') {
            
            if($size <= 987654321){
              
              if(move_uploaded_file($temp, "upload/".$photo)){
                
                 $query    = "insert into reg (f_name , l_name , email , password , photo , address , number , dob ) value('$fname' , '$lname' , '$email' , '$pass' , '$photo' , '$address' , '$number' , '$dob')";

              $result   = mysqli_query($conn , $query);

          if ($result) {
            
             header('location:register.php?success');

          }

          else{

            header('location:register.php?error');

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
  <div>
    <form action="login.php" method="post">
<nav class="navbar navbar-default navbar-fixed-top bg-info">
  <div class="container">
    <h1 class="navbar-brand text-white"><strong>Facebook</strong></h1>
      <div class="row">
        
      <div class="form-group col-lg-5">
        <label class="text-white">Email</label>
        <input type="email" name="loginemail" required>
      </div>

      <div class="form-group col-lg-5">
        <label class="text-white">Password</label>
        <input type="password" name="loginpassword" required>
      </div>

      <div class="col-xs-2">
          <button type="submit" name="login" class="btn btn-primary btn-block my-4">Login</button>
          <!-- or <a href="register.php">Sign Up</a> -->
      </div>

      </div>

  </div>
</nav>
</form>
</div>

<div class="container col-md-4">
  

      <form action="" method="post" enctype="multipart/form-data">
  
  <h5 class="col-lg-12 card-header info-color white-text text-center py-4 my-2">
    <strong>Create a new account</strong>
  </h5>


      <div class="form-group col-lg-12 my-4">
        <input type="fname" name="fname" class="form-control" placeholder="First Name" required >
      </div>

      <div class="form-group col-lg-12">
        <input type="lname" name="lname" class="form-control" placeholder="Last Name" required> 
      </div>

      <div class="form-group col-lg-12">
        <input type="address" name="address" class="form-control" placeholder="Address" required> 
      </div>

      <div class="form-group col-lg-12">
        <input type="number" name="number" class="form-control" placeholder="Number" required> 
      </div>

      <div class="form-group col-lg-12">
        <input type="email" name="email" class="form-control" placeholder="Email" required> 
      </div>

      <div class="form-group col-lg-12">
        <input type="date" name="dob" class="form-control" required> 
      </div>

      <div class="form-group col-lg-12">
        <input type="password" name="password" class="form-control" placeholder="Password" required> 
      </div>

      <div class="form-group col-lg-12">
        <input type="file" name="photo" class="form-control" required> 
      </div>

     <!--  <div class="form-group col-lg-12">
        <input type="file" name="cphoto" class="form-control" required> 
      </div> -->


      <div class="row p-4">
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sigh Up</button>
      </div>

      </div>
    </form>
</div>

</body>
</html>