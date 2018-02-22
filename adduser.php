<?php

include ('includes/adminhead.php');

	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$phone_number = $_POST['phone_number'];
	$mobile_number = $_POST['mobile_number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$position = $_POST['position'];

/*function checkUsernameAvilability($username){
        
        $db2 = new mysqli("localhost", "root", "", "polyalumniloans");

		if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
		}

        $checkname = "SELECT username FROM staff WHERE username = '$username'";

        $run=mysqli_query($db2,$checkname);
        while($row=mysqli_fetch_array($run)){
            if(mysqli_num_rows($run)>0){

            	//return $username;
               ?> <script>
      			alert("Username exists, Please choose another one.");
      			window.location="users.php";
      			</script>
    		<?php 
            }
            else{
                return $username;
            }
        }
    }

	$username = checkUsernameAvilability($username);*/

	$password = md5($password);

	$adduser = "INSERT INTO staff(firstname, surname, username, password, phone_number, mobile_number, email, address, position) VALUES('$firstname','$surname','$username','$password','$phone_number','$mobile_number','$email','$address','$position')";

if (mysqli_query ($db, $adduser)){
    
    ?> <script>
      swal({
        title: 'User added!!',
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
    
    echo "failed to run $adduser  " . mysqli_error($db);
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
        window.location="users.php";
        })
      </script>
    <?php
  }

?>