<?php 
    include ('db.php');
    $logger_pos = $_SESSION['logger_pos'];
    if ($logger_pos != "user") {
    	echo "<script>alert('Login as an Applicant or Beneficiary to access this page')</script>";
    	echo "<script>window.open('../login.php','_self')</script>";
    }

    $user_id = $_SESSION['logger_id'];

    $serial_noq = "SELECT serial_no FROM staff WHERE username='$user_id'";
	$run=mysqli_query($db,$serial_noq);
	while($row=mysqli_fetch_array($run)){
		$serial_no = $row['serial_no'];
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Users</title>

<link rel="icon" href="img/logo.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/css_10.css" rel="stylesheet" type="text/css">
<link href="css/css_11.css" rel="stylesheet" type="text/css">
<link href="css/css_12.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/sweetalert2.js"></script>

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<style>
	.override-a{
		background-color: #1f3a93;
	}
</style>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!--div class="container-fluid"-->
			<div class="navbar-header">
			<img src="img/logo.png" alt="logo" style="width:50px;height:50px;">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Polytechnic</span>Alumni Loans</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $user_id ?> <span class="caret"></span></a>
						<ul class="dropdown-menu override-a" role="menu">
							<li><a href="userprofile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="includes/logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		<!--/div>< /.container-fluid -->
	</nav>
		