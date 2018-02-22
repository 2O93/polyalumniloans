<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$primary_sponsor = $_POST['primary_sponsor'];
	$secondary_sponsor = $_POST['secondary_sponsor'];
	$alevel_sponsor = $_POST['alevel_sponsor'];
	$current_sponsor = $_POST['current_sponsor'];
	$guardian_sponsor = $_POST['guardian_sponsor'];
	$scholarship = $_POST['scholarship'];


	$sponsor = "INSERT INTO apps_sponsors(serial_no, primary_sponsor, secondary_sponsor, alevel_sponsor, current_sponsor, guardian_sponsor, scholarship) VALUES('$serial_no','$primary_sponsor','$secondary_sponsor','$alevel_sponsor','$current_sponsor','$guardian_sponsor','$scholarship')";

if (mysqli_query ($db, $sponsor)){
    
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
    
    echo "failed to run $sponsor  " . mysqli_error($db);
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