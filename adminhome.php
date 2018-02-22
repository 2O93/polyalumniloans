<?php 
    include ('includes/adminhead.php');

		$num_users_q = "SELECT COUNT(st.`username`) AS num_users FROM staff st";
		$run=mysqli_query($db,$num_users_q);
		while($row=mysqli_fetch_array($run)){
			$num_users = $row['num_users'];
		}

		$total_apps_q = "SELECT COUNT(per.`serial_no`) AS num_apps FROM apps_personal per";
		$run=mysqli_query($db,$total_apps_q);
		while($row=mysqli_fetch_array($run)){
			$total_apps = $row['num_apps'];
		}

		$total_ben_q = "SELECT COUNT(ben.`serial_no`) AS num_ben FROM beneficiary ben";
		$run=mysqli_query($db,$total_ben_q);
		while($row=mysqli_fetch_array($run)){
			$total_ben = $row['num_ben'];
		}

		$approval_rate = ($total_ben/$total_apps)*100;
		$approval_rate = number_format($approval_rate, 0, '.', ',');
?>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<link rel="icon" href="img/logo.png">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>

		</form>
		<ul class="nav menu">
			<li class="active"><a href="#"><svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg> Dashboard</a></li>
			<li><a href="users.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Users</a></li>
			<li><a href="loans.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Loans</a></li>
			<li><a href="summaries.php"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"/></svg> Score Board</a></li>
			<li><a href="emails.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> E-mails</a></li>
			<li><a href="reports.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Reports</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="adminprofile.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Profile Settings</a></li>
		</ul>

	</div><!--/.sidebar-->


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		<div class="row">
			<h1 class="page-header" id="pagetop"><?php echo $user_id ?>'s Dashboard</h1>

		</div><!--row-->

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="text-muted">Date</div>
							<div class="text-muted"><?php echo date('Y-m-d'); ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<a href="loans.php"><div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $total_ben ?></div>
							<div class="text-muted">Beneficiaries</div>
						</div></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<a href="users.php"><div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $num_users ?></div>
							<div class="text-muted">Users</div>
						</div></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<a href="loans.php"><div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked flag"><use xlink:href="#stroked-flag"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $total_apps ?></div>
							<div class="text-muted">Applications</div>
						</div></a>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Calendar: </div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<div id="calendar"></div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div><!--Main-->

	<footer class="container-fluid text-center">
  		<a href="adminhome.php#pagetop" title="To Top">
    		<span class="glyphicon glyphicon-chevron-up"></span>
  		</a>
  		<p>&copy;2017 Chisomo Kalumbe
	</footer>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});
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
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, .panel-heading a, .panel a, footer a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1500, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})

function show_block(id){

	var id = id;
	document.getElementById(id).style.display = "block";
}
</script>	
</body>
</html>