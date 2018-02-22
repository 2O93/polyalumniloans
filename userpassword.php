<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  
</head>
<body>
<?php
include ('includes/userhead.php');

  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $confirm_new_pass = $_POST['confirm_new_pass'];

  $old_pass = md5($old_pass);
  $check_pass = "SELECT password FROM staff WHERE username = '$user_id'";
  $run=mysqli_query($db,$check_pass);
  while($row=mysqli_fetch_array($run)){
      $comp_pass = $row['password'];
  }

  if ($comp_pass != $old_pass) {
    ?> <script>
      swal({
        title: 'Password change FAILED',
        text: "Your old password is incorrect. Please try again.",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="userprofile.php#password_heading";
        })
      
      </script>
    <?php
  }else {

  if ($new_pass == $confirm_new_pass) {

  $new_pass = md5($new_pass);

  $userpassword = "UPDATE staff set password = '$new_pass' WHERE username = '$user_id'";

  if (mysqli_query ($db, $userpassword)){
    
    ?> <script>
      swal({
        title: 'Password change SUCCESSFUL.',
        text: "Press okay to go home",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="userhome.php";
        })
      </script>
    <?php   
  }
  else {
    
    echo "failed to run $userpassword  " . mysqli_error($db);
    ?><script>
      swal(
        'Password change FAILED',
        'Something went wrong!',
        'error'
      )
      window.location="userprofile.php";
      </script>
    <?php 
  } 
  }
  else{
    ?> <script>
      swal({
        title: 'Password change FAILED',
        text: "Your new passwords do not match. Please try again.",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="userprofile.php#password_heading";
        })
      </script>
    <?php
  }

  }
   
?>
</body>
</html>
