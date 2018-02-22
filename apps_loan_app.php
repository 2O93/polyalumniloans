<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$tuition = $_POST['tuition'];
	$upkeep = $_POST['upkeep'];
	$total_loan = $upkeep+$tuition;

	$appsloan = "INSERT INTO apps_loan_app(serial_no, tuition, upkeep, total_loan) VALUES('$serial_no','$tuition','$upkeep','$total_loan')";

if (mysqli_query ($db, $appsloan)){
    
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
    
    echo "failed to run $appsloan  " . mysqli_error($db);
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