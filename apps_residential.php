<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$district = $_POST['district'];
	$res_phone = $_POST['res_phone'];
	$next_of_kin = $_POST['next_of_kin'];
	$place_name = $_POST['place_name'];
	$next_of_kin_occupation = $_POST['next_of_kin_occupation'];
	$next_of_kin_relation = $_POST['next_of_kin_relation'];
	$next_of_kin_location = $_POST['next_of_kin_location'];

	$appsres = "INSERT INTO apps_residential(serial_no, district, res_phone, next_of_kin, place_name, next_of_kin_occupation, next_of_kin_relation, next_of_kin_location) VALUES('$serial_no','$district','$res_phone','$next_of_kin','$place_name','$next_of_kin_occupation','$next_of_kin_relation','$next_of_kin_location')";

	if (mysqli_query ($db, $appsres)){
    
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
    
    echo "failed to run $appsres  " . mysqli_error($db);
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