<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$admission_year = $_POST['admission_year'];
	$reg_number = $_POST['reg_number'];
	$year_of_study = $_POST['year_of_study'];
	$program = $_POST['program'];
	$faculty = $_POST['faculty'];

	$addedit = "UPDATE apps_admission SET serial_no='$serial_no', admission_year='$admission_year', reg_number = '$reg_number', year_of_study = '$year_of_study', program = '$program', faculty = '$faculty' WHERE serial_no = '$serial_no'";

	if (mysqli_query ($db, $addedit)){
    
    ?> <script>
        swal({
        title: 'Edit Successful!!',
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
    
    echo "failed to run $addedit  " . mysqli_error($db);
    ?><script>
        swal({
        title: 'EDIT FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="edit.php";
        })
      </script>
    <?php
  }
?>