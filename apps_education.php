<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$primary_schools = $_POST['primary_schools'];
	$primary_fees = $_POST['primary_fees'];
	$primary_completion = $_POST['primary_completion'];
	$secondary_schools = $_POST['secondary_schools'];
	$secondary_fees = $_POST['secondary_fees'];
	$secondary_completion = $_POST['secondary_completion'];
	$alevel_schools = $_POST['alevel_schools'];
	$alevel_fees = $_POST['alevel_fees'];
	$alevel_completion = $_POST['alevel_completion'];
	$primary_schools_no = $_POST['primary_schools_no'];
	$secondary_schools_no = $_POST['secondary_schools_no'];
	$alevel_schools_no = $_POST['alevel_schools_no'];

	$educ = "INSERT INTO apps_education(serial_no, primary_schools, primary_fees, primary_completion, secondary_schools, secondary_fees, secondary_completion, alevel_schools, alevel_fees, alevel_completion, primary_schools_no, secondary_schools_no, alevel_schools_no) VALUES('$serial_no','$primary_schools','$primary_fees','$primary_completion','$secondary_schools','$secondary_fees','$secondary_completion','$alevel_schools','$alevel_fees','$alevel_completion','$primary_schools_no','$secondary_schools_no','$alevel_schools_no')";

if (mysqli_query ($db, $educ)){
    
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
    
    echo "failed to run $educ  " . mysqli_error($db);
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