<?php 
session_start();
  $conn = mysqli_connect("localhost" , "root" , "");
          mysqli_select_db($conn , "familybook");
          session_destroy();


          header('location:register.php?success');



?>