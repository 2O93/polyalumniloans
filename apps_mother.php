<?php
include ('includes/datahead.php');

	$serial_no = $_POST['serial_no'];
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$other_names = $_POST['other_names'];
	$profession = $_POST['profession'];
	$dob = $_POST['dob'];
	$education = $_POST['education'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$employer_business = $_POST['employer_business'];
	$residential_address = $_POST['residential_address'];
	$monthly_income = $_POST['monthly_income'];
	$other_income = $_POST['other_income'];
	$district = $_POST['district'];
	$life = $_POST['life'];
	$origin_district = $_POST['origin_district'];
	$origin_place = $_POST['origin_place'];


	$mother = "INSERT INTO apps_mother(serial_no, firstname, surname, other_names, profession, dob, education, address, phone, mobile, email, employer_business, residential_address, monthly_income, other_income, district, life, origin_district, origin_place) VALUES('$serial_no','$firstname','$surname','$other_names','$profession','$dob','$education','$address','$phone','$mobile','$email','$employer_business','$residential_address','$monthly_income','$other_income','$district','$life','$origin_district','$origin_place')";

if (mysqli_query ($db, $mother)){
    
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
    
    echo "failed to run $mother  " . mysqli_error($db);
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