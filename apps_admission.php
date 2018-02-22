<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$admission_year = $_POST['admission_year'];
	$reg_number = $_POST['reg_number'];
	$year_of_study = $_POST['year_of_study'];
	$program = $_POST['program'];
	$faculty = $_POST['faculty'];

	$appsadd = "INSERT INTO apps_admission(serial_no, admission_year, reg_number, year_of_study, program, faculty) VALUES('$serial_no','$admission_year','$reg_number','$year_of_study','$program','$faculty')";

	if (mysqli_query ($db, $appsadd)){
    
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
    
    echo "failed to run $appsadd  " . mysqli_error($db);
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