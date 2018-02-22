<?php
include ('includes/adminhead.php');

	$serial_no = $_POST['serial_no'];
	$current_address = $_POST['current_address'];
	$current_phone = $_POST['current_phone'];
	$current_mobile = $_POST['current_mobile'];
	$date = strtotime("today");
	$date = strtotime("+23 Months");
	$mature_date = date("Y-m-d", $date);
	$loan_grant = $_POST['loan_grant'];
	$outstanding_balance = $loan_grant;


	$approveloan = "INSERT INTO beneficiary(serial_no, current_address, current_phone, current_mobile, mature_date, outstanding_balance, loan_grant) VALUES('$serial_no','$current_address','$current_phone','$current_mobile','$mature_date','$outstanding_balance','$loan_grant')";

if (mysqli_query ($db, $approveloan)){
    
    ?> <script>
      swal({
        title: 'Loan approved!!',
        text: "Press OK to go back",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="adminhome.php";
        })
      </script>
    <?php   
  }
  else {
    
    echo "failed to run $approveloan  " . mysqli_error($db);
    ?><script>
      swal({
        title: 'APPROVAL FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="loans.php";
        })
      </script>
    <?php
  }
?>