<?php
include ('includes/datahead.php');

    //edited data
	$serial_no = $_POST['serial_no'];
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$other_names = $_POST['other_names'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$district = $_POST['district'];
	$township = $_POST['township'];
	$village = $_POST['village'];
	$dob = $_POST['dob'];

    $actdate = date('Y-m-d H:i:s');

    /*/original data
    $personalq = "SELECT p.`serial_no`, p.`firstname`, p.`surname`, p.`other_names`, p.`gender`, p.`address`, p.`phone`, p.`mobile`, p.`email`, p.`district`, d.`name`, p.`township`, p.`village`, p.`dob` FROM apps_personal p, district d WHERE p.`serial_no` = '$serial_no' AND p.`district`=d.`district_id`";
		$run=mysqli_query($db,$personalq);
		while($row=mysqli_fetch_array($run)){
			$serial_noper = $row['serial_no'];
			$firstnameper = $row['firstname'];
			$surnameper = $row['surname'];
			$other_namesper = $row['other_names'];
			$genderper = $row['gender'];
			$addressper = $row['address'];
			$phoneper = $row['phone'];
			$mobileper = $row['mobile'];
			$emailper = $row['email'];
			$districtper = $row['district'];
			$nameper = $row['name'];
			$townshipper = $row['township'];
			$villageper = $row['village'];
			$dobper = $row['dob'];
		}*/

    $persedit = "UPDATE apps_personal SET serial_no='$serial_no', firstname='$firstname', surname = '$surname', other_names = '$other_names', gender = '$gender', address = '$address', phone = '$phone', mobile = '$mobile', email = '$email', district = '$district', township = '$township', village = '$village', dob = '$dob' WHERE serial_no = '$serial_no'";
    
    $persedit_log = "INSERT INTO activitylog(username, details, act_date) VALUES('$user_id', '$persedit', '$actdate')";
    $run=mysqli_query($db,$persedit_log);

    if (mysqli_query ($db, $persedit)){
    
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
    
    echo "failed to run $persedit  " . mysqli_error($db);
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