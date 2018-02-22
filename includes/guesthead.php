<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Poly Loans</title>

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
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .override-a{
				        background-color: #1f3a93;
			      }

            .example-modal .modal {
                position: relative;
                top: auto;
                bottom: auto;
                right: auto;
                left: auto;
                display: block;
                z-index: 1;
            }

            .example-modal .modal {
                background: transparent !important;
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
				<a class="navbar-brand" href="index.php"><span>Polytechnic</span>Alumni Loans</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Guest <span class="caret"></span></a>
						<ul class="dropdown-menu override-a" role="menu">
							<li><a href="login.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Log in</a></li>
							<li><a href="register.php"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Register</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		<!--/div>< /.container-fluid -->
	</nav>


<div class="jumbotron text-center">
  <h1>The Polytechnic Alumni Loans Board</h1>
  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="first-slide" style="width:1600px;height:462px;" src="img/img2.jpg" alt="">
        <div class="container">
          <div class="carousel-caption">
            <h1>Custom Tailored Loans to Suit your Needs</h1>
            <p>Apply today</p>
          </div>
        </div>
      </div>
      <div class="item">
        <img class="second-slide" style="width:1600px;height:462px;" src="img/img1.jpg" alt="">
        <div class="container">
          <div class="carousel-caption">
            <h1>Freedom of mind begins with financial security</h1>
            <p>Our interest rates are next to negligible</p>
          </div>
        </div>
      </div>
      <div class="item">
        <img class="third-slide" src="img/img44.jpg" alt="">
        <div class="container">
          <div class="carousel-caption">
            <h1>Supporting Needy Students at The Polytechnic</h1>
            <p>No student should be left behind because of fees.</p>
          </div>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
    
</div>  