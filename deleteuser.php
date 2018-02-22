<?php
include ('includes/adminhead.php');

	$username = $_POST['usernamed'];

	$deleteuser = "DELETE FROM staff WHERE username = '$username'";
  

	if (mysqli_query ($db, $deleteuser)){
    
    ?> <script>
     swal({
        title: 'User deleted!!',
        text: "Press OK to go back",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="adminhome.php";
        })
      </script>
    <?php   
  }
  else {
    
    echo "failed to run $deleteuser  " . mysqli_error($db);
    ?><script>
        swal({
        title: 'DELETION FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="users.php";
        })
      </script>
    <?php
  }
?>