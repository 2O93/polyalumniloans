<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$dependant_name = $_POST['dependant_name'];
	$school = $_POST['school'];
	$level = $_POST['level'];
	$annual_fees = $_POST['annual_fees'];


	$dependants = "INSERT INTO apps_dependants(serial_no, dependant_name, school, level, annual_fees) VALUES('$serial_no','$dependant_name','$school','$level','$annual_fees')";

if (mysqli_query ($db, $dependants)){
    
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
    
    echo "failed to run $dependants  " . mysqli_error($db);
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