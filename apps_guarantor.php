<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$residence = $_POST['residence'];


	$guarantor = "INSERT INTO apps_guarantor(serial_no, name, phone, mobile, residence) VALUES('$serial_no','$name','$phone','$mobile','$residence')";

if (mysqli_query ($db, $guarantor)){
    
    ?> <script>
        swal({
        title: 'Details added!!',
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
    
    echo "failed to run $guarantor  " . mysqli_error($db);
    ?><script>
        swal({
        title: 'ADDITION FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
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
?>