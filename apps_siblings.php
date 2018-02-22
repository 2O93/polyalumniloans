<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$sibling_name = $_POST['sibling_name'];
	$school = $_POST['school'];
	$level = $_POST['level'];
	$annual_fees = $_POST['annual_fees'];


	$siblings = "INSERT INTO apps_siblings(serial_no, sibling_name, school, level, annual_fees) VALUES('$serial_no','$sibling_name','$school','$level','$annual_fees')";

if (mysqli_query ($db, $siblings)){
    
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
    
    echo "failed to run $siblings  " . mysqli_error($db);
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