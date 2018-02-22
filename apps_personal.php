<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$other_names = $_POST['other_names'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$district = $_POST['district'];
	$township = $_POST['township'];
	$village = $_POST['village'];
	$dob = $_POST['dob'];

	$pers = "INSERT INTO apps_personal(serial_no, firstname, surname, other_names, gender, address, phone, mobile, email, district, township, village, dob) VALUES('$serial_no','$firstname','$surname','$other_names','$gender','$address','$phone','$mobile','$email','$district','$township','$village','$dob')";

	if (mysqli_query ($db, $pers)){
    
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
    
    echo "failed to run $pers  " . mysqli_error($db);
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