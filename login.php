<?php 
session_start();
$conn = mysqli_connect("localhost" , "root" , "");
        mysqli_select_db($conn , "familybook");

        if (isset($_POST['login'])){

          $email = $_POST['loginemail'];
          $pass  = $_POST['loginpassword'];

          $query   = "select * from reg where email = '$email' && password = '$pass' ";
          $result  = mysqli_query($conn , $query);
          $info  = mysqli_fetch_array($result);
          $id = $info['id'];
          $num     = mysqli_num_rows($result);

          if ($num) {

            $_SESSION['loginemail'] = $id;

            header('location:home.php?success');

          }
          else{

            header('location:register.php?failed');

          }

        }


?>