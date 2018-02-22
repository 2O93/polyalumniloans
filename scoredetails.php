<?php
 include ('includes/adminhead.php');
 //include ('includes/db.php');
 $serial_no = $_GET['serial_no'];
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
			<li><a href="summaries.php"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"/></svg> Score Board</a></li>
			<li><a href="emails.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> E-mails</a></li>
			<li><a href="reports.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Reports</a></li>
            <li class="active"><a href="#"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg> Score Details Mode</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="adminprofile.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Profile Settings</a></li>
		</ul>

	</div><!--/.sidebar-->

    <?php

    $personalq = "select p.`serial_no`, p.`firstname`, p.`surname`, p.`other_names`, p.`gender`, p.`address`, p.`phone`, p.`mobile`, p.`email`, d.`name`, p.`township`, p.`village`, p.`dob` from apps_personal p, district d where p.`serial_no` = '$serial_no' and p.`district`=d.`district_id`";
		$run=mysqli_query($db,$personalq);
		while($row=mysqli_fetch_array($run)){
			$fnamer = $row['firstname'];
			$snamer = $row['surname'];
			$other_namespers = $row['other_names'];
			$genderpers = $row['gender'];
			$addresspers = $row['address'];
			$phonepers = $row['phone'];
			$mobilepers = $row['mobile'];
			$emailpers = $row['email'];
			$districtpers = $row['name'];
			$townshippers = $row['township'];
			$villagepers = $row['village'];
			$dobpers = $row['dob'];
		}

        //quick details
		$name = "SELECT p.`serial_no`, p.`firstname`, p.`surname`, pr.`prog_name`, a.`year_of_study`, a.`admission_year` FROM apps_personal p, apps_admission a, program pr WHERE p.`serial_no`=a.`serial_no` AND p.`serial_no`='$serial_no' AND pr.`prog_id` = a.`program`";
		$run1=mysqli_query($db,$name);
		while($row=mysqli_fetch_array($run1)){
		$id = $row['serial_no'];  
        $fname= $row['firstname'];
        $sname = $row['surname'];
        $pname = $row['prog_name'];
        $syear = $row['year_of_study'];
        $adyear = $row['admission_year'];
        }

        //scores table entries for applicant
        $scores_q = "SELECT * FROM scores s WHERE s.`serial_no`='$serial_no'";
        $run2=mysqli_query($db,$scores_q);
		while($row=mysqli_fetch_array($run2)){
		$total_score = $row['total_score'];  
        $repeat_score= $row['repeat_score'];
        $registered_score = $row['registered_score'];
        $gender_score = $row['gender_score'];
        $income_score = $row['income_score'];
        $expen_score = $row['expen_score'];
        $credibility_score = $row['credibility_score'];
        }

        if ($registered_score==1) {
            $is_registered = "No";
        } else {
            $is_registered = "Yes";
        }

        $f_in_q = "SELECT f.`monthly_income`+f.`other_income` AS income FROM apps_father f, apps_personal p WHERE f.`serial_no`=p.`serial_no` AND p.`serial_no` = '$serial_no'";
        $m_in_q = "SELECT m.`monthly_income`+m.`other_income` AS incomem FROM apps_mother m, apps_personal p WHERE m.`serial_no`=p.`serial_no` AND p.`serial_no` = '$serial_no'";
        $sibling_exp_q = "SELECT SUM(s.`annual_fees`)/12 AS sibl FROM apps_siblings s WHERE s.`serial_no`='$serial_no'";
        $depen_exp_q = "SELECT SUM(d.`annual_fees`)/12 AS depen FROM apps_dependants d WHERE d.`serial_no`='$serial_no'";
        $fam_exp_q = "SELECT s.`household_expenditure` FROM apps_social s WHERE s.`serial_no`='$serial_no'";

        $run5=mysqli_query($db,$f_in_q);
        $row5=mysqli_fetch_array($run5);
        $f_in = $row5['income'];

        $run6=mysqli_query($db,$m_in_q);
        $row6=mysqli_fetch_array($run6);
        $m_in = $row6['incomem'];

        $combined_in = $f_in + $m_in;

        $run7=mysqli_query($db,$sibling_exp_q);
        $row7=mysqli_fetch_array($run7);
        $sibling_exp = $row7['sibl'];

        $run8=mysqli_query($db,$depen_exp_q);
        $row8=mysqli_fetch_array($run8);
        $depen_exp = $row8['depen'];

        $run9=mysqli_query($db,$fam_exp_q);
        $row9=mysqli_fetch_array($run9);
        $fam_exp = $row9['household_expenditure'];

        $total_exp = $sibling_exp+$depen_exp+$fam_exp;

        $deficit = $combined_in-$total_exp;

        $f_in = number_format($f_in, 2, '.', ',');
        $m_in = number_format($m_in, 2, '.', ',');
        $combined_in = number_format($combined_in, 2, '.', ',');
        $sibling_exp = number_format($sibling_exp, 2, '.', ',');
        $depen_exp = number_format($depen_exp, 2, '.', ',');
        $fam_exp = number_format($fam_exp, 2, '.', ',');
        $total_exp = number_format($total_exp, 2, '.', ',');

    ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop"><strong>View <?php echo $fnamer." ".$snamer; ?>'s Score details</strong></h1>
				<h3><strong>Quick details: Program: <?php echo $pname ?>, Year of Study: <?php echo $syear ?>. </strong></h3>
                <div class="panel-heading">Action: 
					<a href="summaries.php" ><svg class="glyph stroked arrow left"><use xlink:href="#stroked-arrow-left"/></svg>Go Back</a>
				</div>
			</div>
	</div>

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="scoredetails.php#user_heading"><div id="user_heading" class="panel-heading" onclick="show_block('user_form');"><strong>Summaries, Scores to applicants</strong></div></a>
					<div class="panel-body" id="user_form">

					<div class="col-md-6">
							<form role="form">
								
								<div class="form-group">
									<label>Admission Year: </label>
									<label><?php echo $adyear ?></label>
								</div>
																
								<div class="form-group">
									<label>Year of Study: </label>
									<label><?php echo $syear ?></label>
								</div>

								<div class="form-group">
									<label>Registered (Yes/No): </label>
									<label><?php echo $is_registered ?></label>
								</div>

								<div class="form-group">
									<label>Gender: </label>
									<label><?php echo $genderpers ?></label>
								</div>

								<div class="form-group">
									<label>Father's Income: </label>
									<label>MWK <?php echo $f_in ?></label>
								</div>

								<div class="form-group">
									<label>Mother's Income: </label>
									<label>MWK <?php echo $m_in ?></label>
								</div>

								<div class="form-group">
									<label>Family Income: </label>
									<label>MWK <?php echo $combined_in ?></label>
								</div>

								<div class="form-group">
									<label>Expenditure on siblings: </label>
									<label>MWK <?php echo $sibling_exp ?></label>
								</div>

								<div class="form-group">
									<label>Expenditure on dependants: </label>
									<label>MWK <?php echo $depen_exp ?></label>
								</div>

                                <div class="form-group">
									<label>Family expenditure: </label>
									<label>MWK <?php echo $fam_exp ?></label>
								</div>

                                <div class="form-group">
									<label>Projected total Monthly Expenditure: </label>
									<label>MWK <?php echo $total_exp ?></label>
								</div>

                                <div class="form-group">
									<label>Income - Expenditure: </label>
									<label><?php echo $deficit ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>Total Score: </label>
									<label><?php echo $total_score ?></label>
								</div>

								<div class="form-group">
									<label>Repeat Score: </label>
									<label><?php echo $repeat_score ?></label>
								</div>
								
								<div class="form-group">
									<label>Registered Score: </label>
									<label><?php echo $registered_score ?></label>
								</div>

								<div class="form-group">
									<label>Gender Score: </label>
									<label><?php echo $gender_score ?></label>
								</div>

								<div class="form-group">
									<label>Income Score: </label>
									<label><?php echo $income_score ?></label>
								</div>

								<div class="form-group">
									<label>Expenditure Score: </label>
									<label><?php echo $expen_score ?></label>
								</div>

								<div class="form-group">
									<label>Credibility Score: </label>
									<label><?php echo $credibility_score ?></label>
								</div>

								<!--div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button-->
                                
							</div>
                        </form>
						
                	</div>
                </div>
            
            </div><!-- /.col-->
            
	</div><!-- /.row -->

    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="scoredetails.php#details_heading"><div id="details_heading" class="panel-heading" onclick="show_block('details_form');"><strong>Details of Scoring Criteria</strong></div></a>
					<div class="panel-body" id="details_form">

					<div class="col-md-12">
							<form role="form">
								
								<div class="form-group">
									<label>Repeat Score: </label>
									<p>Repeats get a score of 0 and non-repeats a score of 1</p>
								</div>
																
								<div class="form-group">
									<label>Registered Score: </label>
									<p>Registered students get a score of 0 and non registered students get a score of 1</p>
								</div>

								<div class="form-group">
									<label><strong>Gender Score: </strong></label>
									<p>Males get 0.8 and females get 1</p>
								</div>

								<div class="form-group">
									<label><strong>Income Score: </strong></label>
									<label>Combined family income. Calculated from a sum of father's and mother's earnings (Both monthly income and other sources). Range and Scores here below:</label>
                                    <p>Less than MWK150,000.00: 5</p>
                                    <p>MWK150,000.01 - MWK250,000.00: 4</p>
                                    <p>MWK250,000.01 - MWK350,000.00: 3</p>
                                    <p>MWK350,000.01 - MWK450,000.00: 2</p>
                                    <p>MWK450,000.01 - MWK550,000.00: 1</p>
                                    <p>Over MWK550,000.00: 0.1</p>
								</div>

								<div class="form-group">
									<label><strong>Expenditure Score: </strong></label>
									<label>Average family's monthly expenditure. Calculated from a sum of the family's monthly expenditure. Includes fees for siblings and dependants. Range and Scores here below:</label>
                                    <p>Less than MWK150,000.00: 5</p>
                                    <p>MWK150,000.01 - MWK250,000.00: 4</p>
                                    <p>MWK250,000.01 - MWK350,000.00: 3</p>
                                    <p>MWK350,000.01 - MWK450,000.00: 2</p>
                                    <p>MWK450,000.01 - MWK550,000.00: 1</p>
                                    <p>Over MWK550,000.00: 0.1</p>
								</div>

								<div class="form-group">
									<label><strong>Credibility Score: </strong></label>
									<label>Income minus expenditure. Based on the idea that a family can not spend more than they earn each month. If expenditure is equal to or higher than their income then credibility is low. Range of difference and Scores here below:</label>
                                    <p>Less than or equal to 0: 0</p>
                                    <p>0.1 - 20000: 0.3</p>
                                    <p>20000.01 - 40000: 0.45</p>
                                    <p>Over 40000: 0.6</p>
								</div>
								
                            </div>
							
                        </form>
						
                	</div>
                </div>
            
            </div><!-- /.col-->
            
	</div><!-- /.row -->

</div><!-- /.Main-->

	<footer class="container-fluid text-center">
  		<a href="scoredetails.php#pagetop" title="To Top">
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