<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$fathers_children = $_POST['fathers_children'];
	$mothers_children = $_POST['mothers_children'];
	$parents_together = $_POST['parents_together'];
	$apps_stay = $_POST['apps_stay'];
	$residence = $_POST['residence'];
	$house = $_POST['house'];
	$house_rooms = $_POST['house_rooms'];
	$household_expenditure = $_POST['household_expenditure'];
	$medical_care = $_POST['medical_care'];
	$apps_reason = $_POST['apps_reason'];
	$apps_background = $_POST['apps_background'];

	
	$social = "INSERT INTO apps_social(serial_no, fathers_children, mothers_children, parents_together, apps_stay, residence, house, house_rooms, household_expenditure, medical_care, apps_reason, apps_background) VALUES('$serial_no','$fathers_children','$mothers_children','$parents_together','$apps_stay','$residence','$house','$house_rooms','$household_expenditure','$medical_care','$apps_reason','$apps_background')";

if (mysqli_query ($db, $social)){
    
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
    
    echo "failed to run $social  " . mysqli_error($db);
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