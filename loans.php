<?php 
    include ('includes/adminhead.php');
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
			<li class="active"><a href="#"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Loans</a></li>
			<li><a href="summaries.php"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"/></svg> Score Board</a></li>
			<li><a href="emails.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> E-mails</a></li>
			<li><a href="reports.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Reports</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="adminprofile.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Profile Settings</a></li>
		</ul>

	</div><!--/.sidebar-->


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop">LOANS</h1>
				<div class="panel-heading">Jump to section: 
					<a href="loans.php#grantloan" onclick="show_block('payment_form');"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Grant a loan...</a>
					<a href="loans.php#payment_heading" ><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Add a payment...</a>
				</div>
			</div>
		</div><!--row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="loans.php#apps_heading"><div id="apps_heading" class="panel-heading" onclick="show_block('apps_info');"><strong>LOAN APPLICATIONS</strong></div></a>
					<div class="panel-body" id="apps_info" style="display: none;">

					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-sortable="true" >Serial Number </th>
						        <th data-sortable="true">First Name </th>
						        <th data-sortable="true">Surname </th>
						        <th data-sortable="true">Gender </th>
						        <th data-sortable="true">Program </th>
						        <th data-sortable="true">Year of Study </th>
						        <th data-sortable="true">Total Loan Applied </th>
						        <th data-sortable="true">View Details </th>
						    </tr>
						    </thead>
						    <tbody>
						    	<?php
        						$sql = "SELECT p.`serial_no`, p.`firstname`, p.`surname`, p.`gender`, pr.`prog_code`, a.`year_of_study`, l.`total_loan` FROM apps_personal p, apps_admission a, apps_loan_app l, program pr WHERE p.`serial_no`=a.`serial_no` AND p.`serial_no`=l.`serial_no` AND a.`program`=pr.`prog_id` AND p.`serial_no` NOT IN (SELECT b.`serial_no` FROM beneficiary b)";
        						//$result = mysqli_query ($db, $sql);
        						$result=$db->query($sql);
										while ($row = mysqli_fetch_array($result)){ 
                							$serial_noapp = $row['serial_no'];
											$firstnameapp = $row['firstname'];
											$surnameapp = $row['surname'];
											$genderapp = $row['gender'];
											$prog_codeapp = $row['prog_code'];
											$year_of_studyapp = $row['year_of_study'];
											$total_loanapp = $row['total_loan'];
											$total_loanapp = number_format($total_loanapp, 2, '.', ','); 
            
											echo <<<EOF
                  							<tr>
                  
                       							<td style="height:3px; border:0px;padding-left:10px; margin:0px; font-size:16px;">$serial_noapp</td>

                
                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$firstnameapp</span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$surnameapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$genderapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$prog_codeapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$year_of_studyapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">MWK $total_loanapp </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style=""><a href="viewloandetails.php?serial_no=$serial_noapp"><i class="glyphicon glyphicon-eye-open"></i></a></td>
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

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="loans.php#ben_heading"><div id="ben_heading" class="panel-heading" onclick="show_block('ben_info');"><strong>BENEFICIARIES</strong></div></a>
					<div class="panel-body" id="ben_info" style="display: none;">

					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-sortable="true" >Serial Number </th>
						        <th data-sortable="true">First Name </th>
						        <th data-sortable="true">Curent Address </th>
						        <th data-sortable="true">Mature Date </th>
						        <th data-sortable="true">Outstanding Balance </th>
						        <th data-sortable="true">View Details </th>
						    </tr>
						    </thead>
						    <tbody>
						    	<?php
        						$sql = "SELECT p.`serial_no`, p.`firstname`, b.`current_address`, b.`mature_date`, b.`outstanding_balance` FROM apps_personal p, beneficiary b WHERE p.`serial_no`=b.`serial_no`";
        						//$result = mysqli_query ($db, $sql);
        						$result=$db->query($sql);
										while ($row = mysqli_fetch_array($result)){ 
                							$serial_noben = $row['serial_no'];
											$firstnameben = $row['firstname'];
											$current_addressben = $row['current_address'];
											$mature_dateben = $row['mature_date'];
											$outstanding_balanceben = $row['outstanding_balance'];
											$outstanding_balanceben = number_format($outstanding_balanceben, 2, '.', ','); 
            
											echo <<<EOF
                  							<tr>
                  
                       							<td style="height:3px; border:0px;padding-left:10px; margin:0px; font-size:16px;">$serial_noben</td>

                
                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$firstnameben</span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$current_addressben </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$mature_dateben </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">MWK $outstanding_balanceben </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style=""><a href="viewloandetails.php?serial_no=$serial_noben"><i class="glyphicon glyphicon-eye-open"></i></a></td>
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

		<div class="row" id="grantloan">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="laons.php#grantloan_heading"><div id="grantloan_heading" class="panel-heading" onclick="show_block('grantloan_form');"><strong>Select an applicant to approve loan</strong></div></a>
					<div class="panel-body" id="grantloan_form">
						<div class="col-md-6">
							<form role="form" method="post" action="grantloan.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose user</option>
										<?php 
											$name = "SELECT p.`serial_no`, p.`firstname`, p.`surname`, pr.`prog_name`, a.`year_of_study` FROM apps_personal p, apps_admission a, program pr WHERE p.`serial_no`=a.`serial_no` AND pr.`prog_id` = a.`program` AND p.`serial_no` NOT IN (SELECT b.`serial_no` FROM beneficiary b)";
											$run=mysqli_query($db,$name);
											while($row=mysqli_fetch_array($run)){
												$id = $row['serial_no'];  
                								$fname= $row['firstname'];
                								$sname = $row['surname'];
                								$pname = $row['prog_name'];
                								$syear = $row['year_of_study'];
            
												echo <<<EOF
												<option value="$id">$id  $fname  $sname $pname Year $syear</option>
                  
EOF;
              								}
										?>
									</select>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>Proceed to grant a loan for this application.</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Grant Loan</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="choose">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="loans.php#payment_heading"><div id="payment_heading" class="panel-heading" onclick="show_block('payment_form');"><strong>Select an application to add payment by choosing a serial number</strong></div></a>
					<div class="panel-body" id="payment_form">
						<div class="col-md-6">
							<form role="form" method="post" action="addpayment.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT b.`serial_no`, p.`firstname`, p.`surname` FROM apps_personal p, beneficiary b WHERE b.`serial_no`=p.`serial_no`";
											$run=mysqli_query($db,$name);
											while($row=mysqli_fetch_array($run)){
												$id = $row['serial_no'];  
                								$fname= $row['firstname'];
                								$sname = $row['surname'];
            
												echo <<<EOF
												<option value="$id">$id  $fname  $sname</option>
                  
EOF;
              								}
										?>
									</select>
								</div>

								<div class="form-group">
									<label>Amount: </label>
									<input class="form-control" name="amount_paid" placeholder="Amount in MWK">
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>Proceed to add this payment: </label>
								</div>
								
								<button type="submit" class="btn btn-primary">Add Payment</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

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