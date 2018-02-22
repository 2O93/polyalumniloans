<?php
 include ('includes/adminhead.php');
 //include ('includes/db.php');
?>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<link rel="icon" href="img/logo.png">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>

		</form>
		<ul class="nav menu">
			<li><a href="adminhome.php"><svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg> Dashboard</a></li>
			<li><a href="users.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Users</a></li>
			<li><a href="loans.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Loans</a></li>
			<li class="active"><a href="#"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"/></svg> Score Board</a></li>
			<li><a href="emails.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> E-mails</a></li>
			<li><a href="reports.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Reports</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="adminprofile.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Profile Settings</a></li>
		</ul>

	</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop">SCORES OF APPLICANTS</h1>
			</div>
	</div>

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="summaries.php#user_heading"><div id="user_heading" class="panel-heading" onclick="show_block('user_form');"><strong>Summaries, Scores to applicants</strong></div></a>
					<div class="panel-body" id="user_form">

					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-sortable="true" >Serial Number </th>
						        <th data-sortable="true">First Name </th>
						        <th data-sortable="true">Surname </th>
						        <th data-sortable="true">Reg Number </th>
						        <th data-sortable="true">Year of Study </th>
						        <th data-sortable="true">Total Score </th>
						        <th data-sortable="true">View Details </th>
						    </tr>
						    </thead>
						    <tbody>
						    	<?php
        						$sql = "SELECT sc.`serial_no`, p.`firstname`, p.`surname`, a.`reg_number`, a.`year_of_study`, sc.`total_score` FROM scores sc, apps_personal p, apps_admission a WHERE sc.`serial_no` = p.`serial_no` AND sc.`serial_no` = a.`serial_no` AND a.`serial_no` = p.`serial_no` ORDER BY sc.`total_score` DESC";
        						//$result = mysqli_query ($db, $sql);
        						$result=$db->query($sql);
										while ($row = mysqli_fetch_array($result)){ 
                			$serial_noapp = $row['serial_no'];
											$firstnameapp = $row['firstname'];
											$surnameapp = $row['surname'];
											$genderapp = $row['reg_number'];
											$year_of_studyapp = $row['year_of_study'];
											$total_loanapp = $row['total_score'];
            
											echo <<<EOF
                  							<tr>
                  
                       							<td style="height:3px; border:0px;padding-left:10px; margin:0px; font-size:16px;">$serial_noapp</td>

                
                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$firstnameapp</span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$surnameapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$genderapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$year_of_studyapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$total_loanapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style=""><a href="scoredetails.php?serial_no=$serial_noapp"><i class="glyphicon glyphicon-eye-open"></i></a></td>
											</tr>
EOF;
              							}

      						?>
						    </tbody>
					</table>
						
                	</div>
                </div>
            
            </div><!-- /.col-->
            
	</div><!-- /.row -->

	<form method="post" action="summariesaction.php">
					<div class="panel-heading">Action: 
						<button type="submit" class="btn btn-primary" name="score"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg>Re-assign Scores</button>
						NB: Should done be done when necessary e.g. after adding new applications.
					</div>
	</form>

</div><!-- /.Main-->

	<footer class="container-fluid text-center">
  		<a href="summaries.php#pagetop" title="To Top">
    		<span class="glyphicon glyphicon-chevron-up"></span>
  		</a>
  		<p>&copy;2017 Chisomo Kalumbe
	</footer>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
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