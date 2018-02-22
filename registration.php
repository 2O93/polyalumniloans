<?php 
$db = new mysqli("localhost", "root", "", "polyalumniloans");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$serial_no = $_POST['serial_no'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$position = "user";

$personalq = "SELECT * FROM apps_personal WHERE serial_no='$serial_no'";
		$run=mysqli_query($db,$personalq);
		while($row=mysqli_fetch_array($run)){
			$firstname = $row['firstname'];
			$surname = $row['surname'];
			$other_names = $row['other_names'];
			$gender = $row['gender'];
			$address = $row['address'];
			$phone = $row['phone'];
			$mobile = $row['mobile'];
			$email = $row['email'];
			$district = $row['district'];
			$township = $row['township'];
			$village = $row['village'];
			$dob = $row['dob'];
		}

		
if ($password == $password_confirmation) {

  $password = md5($password);

  $register = "INSERT INTO staff(firstname, surname, username, password, phone_number, mobile_number, email, address, position, serial_no) VALUES('$firstname','$surname','$username','$password','$phone','$mobile','$email','$address','$position', '$serial_no')";

  if (mysqli_query ($db, $register)){
    
    ?> <script>
      swal({
        title: 'Registraion successful. You may log in.',
        text: "Press OK to go back",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="login.php";
        })
      </script>
    <?php   
  }
  else {
    
    echo "failed to run $register  " . mysqli_error($db);
    ?><script>
      alert("Registration FAILED!");
      window.location="register.php";
      swal({
        title: 'Registration FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="register.php";
        })
      </script>
    <?php 
  } 
  }
  else{
    ?> <script>
      swal({
        title: 'Your passwords do not match. Please try again.',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="register.php";
        })
      </script>
    <?php
  }

?>