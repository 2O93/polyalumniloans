<?php

include ('includes/db.php');

	if(isset($_POST['login'])){
				
					$username = $_POST['username'];
					$password = $_POST['password'];
					$username = validate($username);
					$password = validate($password);
					$password = md5($password);

					$position = checkPosition($username);

					//echo $position;
					
					if ($position == "board_member") {
    					$authenticate = "SELECT username, password from staff WHERE username='$username' AND password='$password'";  

						$run=mysqli_query($db,$authenticate);
						
						$count = mysqli_num_rows($run);
						if($count==1){
							$_SESSION["logger_id"] = $username;
							$_SESSION["logger_pos"] = $position;
							//print_r($_SESSION);
							header("Location: adminhome.php");
							//echo "<script>window.open('adminhome.php','_self')</script>";
						}
						else{
							?><script>
								swal({
        							title: 'Authentication Failure',
        							text: "Your password is incorrect. Please try again.",
        							type: 'error',
        							confirmButtonColor: '#CF000F',
        							confirmButtonText: 'Okay...',
        							imageUrl: 'img/logo.png',
        							imageWidth: 100,
        							imageHeight: 120,
        							imageAlt: 'Custom image'
      							}).then(function () {
        								window.location="login.php";
        							})
							</script> <?php						
						}
					
					} elseif ($position == "data_entry") {
    					$authenticatedata = "SELECT username, password from staff WHERE username='$username' AND password='$password'";  

						$run=mysqli_query($db,$authenticatedata);
						$count = mysqli_num_rows($run);
						if($count==1){
							$_SESSION["logger_id"]=$username;
							$_SESSION["logger_pos"]=$position;
							//print_r($_SESSION);
							header("Location: datahome.php");
							//echo "<script>window.open('datahome.php','_self')</script>";
						}
						else{
							?><script>
								swal({
        							title: 'Authentication Failure',
        							text: "Your password is incorrect. Please try again.",
        							type: 'error',
        							confirmButtonColor: '#CF000F',
        							confirmButtonText: 'Okay...',
        							imageUrl: 'img/logo.png',
        							imageWidth: 100,
        							imageHeight: 120,
        							imageAlt: 'Custom image'
      							}).then(function () {
        								window.location="login.php";
        							})
							</script> <?php	
						}
					
					} 
					else {
    					$authenticateuser = "SELECT username, password from staff WHERE username='$username' AND password='$password'";  

						$run=mysqli_query($db,$authenticateuser);
						$count = mysqli_num_rows($run);
						if($count==1){
							$_SESSION["logger_id"]=$username;
							$_SESSION["logger_pos"]=$position;
							//print_r($_SESSION);
							header("Location: userhome.php");
							//echo "<script>window.open('userhome.php','_self')</script>";
						}
						else{
							?><script>
								swal({
        							title: 'Authentication Failure',
        							text: "Your password is incorrect. Please try again.",
        							type: 'error',
        							confirmButtonColor: '#CF000F',
        							confirmButtonText: 'Okay...',
        							imageUrl: 'img/logo.png',
        							imageWidth: 100,
        							imageHeight: 120,
        							imageAlt: 'Custom image'
      							}).then(function () {
        								window.location="login.php";
        							})
							</script> <?php
						}
						
					}
				}

	function validate($input){
                //$term=mysqli_real_escape_string($db,$_GET['id']);
                $input = filter_var($input, FILTER_SANITIZE_STRING);
                $input=trim($input);
                $input= stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
	}

	function checkPosition($username){
		$db1 = new mysqli("localhost", "root", "", "polyalumniloans");

		if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
		}

		$checkpos = "SELECT position FROM staff WHERE username = '$username'";

		$run=mysqli_query($db1,$checkpos);
		while($row=mysqli_fetch_array($run)){
		if(mysqli_num_rows($run)>0){
			$position = $row['position'];
			return $position;
		}
		else{
			?><script>
					swal({
        				title: 'Authentication Failure',
        				text: "Username not found. Please try again.",
        				type: 'error',
        				confirmButtonColor: '#CF000F',
        				confirmButtonText: 'Okay...',
        				imageUrl: 'img/logo.png',
        				imageWidth: 100,
        				imageHeight: 120,
        				imageAlt: 'Custom image'
      					}).then(function () {
        					window.location="login.php";
        					})
			</script> <?php
		}
	}
	}

include('includes/logandregisterhead.php');
?>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

		<center><img src="img/logo.png" alt="logo" style="width:200px;height:250px;">
		<h1><strong>Log in</strong></h1></center> 
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" action="login.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input class="btn btn-primary" type="submit" style="border-radius:0px; width:30%;height:40px;margin-bottom:10PX" value="Login" name="login">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

	<footer class="container-fluid text-center">
  		<a href="login.php#pagetop" title="To Top">
    		<span class="glyphicon glyphicon-chevron-up"></span>
  		</a>
  		<p>&copy;2017 Chisomo Kalumbe
	</footer>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<!--script src="js/chart-data.js"></script-->
	<script src="js/easypiechart.js"></script>
	<!--script src="js/easypiechart-data.js"></script-->
	<!--script src="js/bootstrap-datepicker.js"></script-->
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
