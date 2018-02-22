<?php
include ('includes/datahead.php');

	$phone_number = $_POST['phone_number'];
	$mobile_number = $_POST['mobile_number'];
	$email = $_POST['email'];
	$address = $_POST['address'];


	$updatedata = "UPDATE staff set phone_number = '$phone_number', mobile_number = '$mobile_number', email = '$email', address = '$address' WHERE username = '$user_id'";

if (mysqli_query ($db, $updatedata)){
    
    ?> <script>
      swal({
        title: 'Details updated!!',
        text: "Press OK to go back",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="datahome.php";
        })
      </script>
    <?php   
  }
  else {
    
    echo "failed to run $updatedata  " . mysqli_error($db);
    ?><script>
      swal({
        title: 'UPDATE FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="dataprofile.php";
        })
      </script>
    <?php
  } 
?>