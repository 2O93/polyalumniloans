<?php
 include ('includes/adminhead.php');
 //include ('includes/db.php'); 

 $serial_no = $_POST['serial_no'];

?>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
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
			<li class="active"><a href="#"><svg class="glyph stroked monitor"><use xlink:href="#stroked-monitor"/></svg> Grant Loan Mode</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="adminprofile.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Profile Settings</a></li>
		</ul>

	</div><!--/.sidebar-->

	<?php 
		$admissionq = "SELECT a.`admission_year`, a.`reg_number`, a.`year_of_study`, a.`program`, a.`faculty`, p.`prog_name`, f.`name` FROM apps_admission a, program p, faculty f WHERE serial_no = '$serial_no' and a.`program`=p.`prog_id` and a.`faculty` = f.`faculty_id`";
		$run=mysqli_query($db,$admissionq);
		while($row=mysqli_fetch_array($run)){
			$admission_yearr = $row['admission_year'];  
            $reg_numberr= $row['reg_number'];
            $year_of_studyr = $row['year_of_study'];
            $programrn = $row['program'];
            $facultyrn = $row['faculty'];
            $programr = $row['prog_name'];
            $facultyr = $row['name'];
        }

        $socialq = "SELECT * FROM apps_social WHERE serial_no = '$serial_no'";
											$run=mysqli_query($db,$socialq);
											while($row=mysqli_fetch_array($run)){
												$serial_nosoc = $row['serial_no'];
												$fathers_childrensoc = $row['fathers_children'];
												$mothers_childrensoc = $row['mothers_children'];
												$parents_togethersoc = $row['parents_together'];
												$apps_staysoc = $row['apps_stay'];
												$residencesoc = $row['residence'];
												$housesoc = $row['house'];
												$house_roomssoc = $row['house_rooms'];
												$household_expendituresoc = $row['household_expenditure'];
												$medical_caresoc = $row['medical_care'];
												$apps_reasonsoc = $row['apps_reason'];
												$apps_backgroundsoc = $row['apps_background'];
            
              								}

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
		$name = "SELECT p.`serial_no`, p.`firstname`, p.`surname`, pr.`prog_name`, a.`year_of_study` FROM apps_personal p, apps_admission a, program pr WHERE p.`serial_no`=a.`serial_no` AND p.`serial_no`='$serial_no' AND pr.`prog_id` = a.`program` AND p.`serial_no` NOT IN (SELECT b.`serial_no` FROM beneficiary b)";
		$run=mysqli_query($db,$name);
		while($row=mysqli_fetch_array($run)){
		$id = $row['serial_no'];  
        $fname= $row['firstname'];
        $sname = $row['surname'];
        $pname = $row['prog_name'];
        $syear = $row['year_of_study'];
        }

	?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop"><strong>Grant a loan to <?php echo $fnamer." ".$snamer; ?></strong></h1>
				<h3><strong>Quick details: Program: <?php echo $pname ?>, Year of Study: <?php echo $syear ?>. </strong></h3>
				<h3><?php echo $fnamer ?> Says: <?php echo $apps_reasonsoc ?></h3>
				<h3><?php echo $fnamer ?> Reports that: <?php echo $apps_backgroundsoc ?></h3>
				<h4>Review details and grant loan at the end. </h4>
				<div class="panel-heading">Jump to section: 
					<a href="grantloan.php#residential" onclick="show_block('residential_info');"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>Residential...</a>
					<a href="grantloan.php#educational" onclick="show_block('educational_info');"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>Educational...</a>
					<a href="grantloan.php#admission" onclick="show_block('admission_info');"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Admission...</a>
					<a href="grantloan.php#loanamounts" onclick="show_block('loanamounts_info');"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Loan Amounts...</a>
					<a href="grantloan.php#fathers" onclick="show_block('fathers_info');"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Fathers...</a>
					<a href="grantloan.php#mothers" onclick="show_block('mothers_form');"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Mothers...</a>
				</div>
				<div class="panel-heading">Jump to section: 
					<a href="grantloan.php#sponsors" onclick="show_block('sponsors_info');"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Sponsors...</a>
					<a href="grantloan.php#siblings" onclick="show_block('siblings_info');"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Siblings...</a>
					<a href="grantloan.php#social" onclick="show_block('social_info');"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>Social...</a>
					<a href="grantloan.php#dependants" onclick="show_block('dependants_info');"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Dependants...</a>
					<a href="grantloan.php#guarantor" onclick="show_block('guarantor_info');"><svg class="glyph stroked brush"><use xlink:href="#stroked-brush"/></svg>Guarantors...</a>
				</div>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#personal_heading"><div id="personal_heading" class="panel-heading" id="personal" onclick="show_block('personal_info');"><strong>Personal Details of the Applicant</strong></div></a>
					<div class="panel-body" id="personal_info" style="display: none;">
						<div class="col-md-6">
							<form role="form">
							
								<div class="form-group">
									<label>Serial Number: </label>
									<label><?php echo $serial_no ?></label>
								</div>

								<div class="form-group">
									<label>First Name: </label>
									<label><?php echo $fnamer ?></label>
								</div>
																
								<div class="form-group">
									<label>Surname: </label>
									<label><?php echo $snamer ?></label>
								</div>
								
								<div class="form-group">
									<label>Other Names: </label>
									<label><?php echo $other_namespers ?></label>
								</div>
																
								<div class="form-group">
									<label>Gender: </label>
									<label><?php echo $genderpers ?></label>
								</div>
								
								<div class="form-group">
									<label>Address: </label>
									<label><?php echo $addresspers ?></label>
								</div>
								
								<div class="form-group">
									<label>Phone: </label>
									<label><?php echo $phonepers ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
							
								<div class="form-group">
									<label>Mobile: </label>
									<label><?php echo $mobilepers ?></label>
								</div>
								
								<div class="form-group">
									<label>E-mail: </label>
									<label><?php echo $emailpers ?></label>
								</div>
								
								<div class="form-group">
									<label>District: </label>
									<label><?php echo $districtpers ?></label>
								</div>
								
								<div class="form-group">
									<label>Township: </label>
									<label><?php echo $townshippers ?></label>
								</div>

								<div class="form-group">
									<label>Village: </label>
									<label><?php echo $villagepers ?></label>
								</div>

								<div class="form-group">
									<label>Date of Birth: </label>
									<label><?php echo $dobpers ?></label>
								</div>

								<!--div class="form-group">
									<label>Enter Data for this section only and proceed with just the Serial Number in the other sections</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button-->
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="residential">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#residential_heading"><div id="residential_heading" class="panel-heading" onclick="show_block('residential_info');"><strong>Applicant's Residential Contact Details (Current Address)</strong></div></a>
					<div class="panel-body" id="residential_info" style="display: none;">
						<div class="col-md-6">
							<form role="form">
							
										<?php 
											$residentialq = "SELECT r.`serial_no`, d.`name`, r.`res_phone`, r.`next_of_kin`, r.`place_name`, r.`next_of_kin_occupation`, r.`next_of_kin_relation`, r.`next_of_kin_location` FROM apps_residential r, district d WHERE serial_no = '484' and d.`district_id`=r.`district`";
											$run=mysqli_query($db,$residentialq);
											while($row=mysqli_fetch_array($run)){
												$serial_nores = $row['serial_no'];
												$districtres = $row['name'];
												$res_phoneres = $row['res_phone'];
												$next_of_kinres = $row['next_of_kin'];
												$place_nameres = $row['place_name'];
												$next_of_kin_occupationres = $row['next_of_kin_occupation'];
												$next_of_kin_relationres = $row['next_of_kin_relation'];
												$next_of_kin_locationres = $row['next_of_kin_location'];
              								}
										?>
																
								<div class="form-group">
									<label>Residential District: </label>
									<label><?php echo $districtres ?></label>
								</div>
								
								<div class="form-group">
									<label>Residence Phone: </label>
									<label><?php echo $res_phoneres ?></label>
								</div>
																
								<div class="form-group">
									<label>Next of Kin: </label>
									<label><?php echo $next_of_kinres ?></label>
								</div>
							
								<div class="form-group">
									<label>Place Name: </label>
									<label><?php echo $place_nameres ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>Occupation of Next of Kin: </label>
									<label><?php echo $next_of_kin_occupationres ?></label>
								</div>
								
								<div class="form-group">
									<label>Relationship with Next of Kin: </label>
									<label><?php echo $next_of_kin_relationres ?></label>
								</div>
								
								<div class="form-group">
									<label>Location of Next of Kin: </label>
									<label><?php echo $next_of_kin_relationres ?></label>
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

		<div class="row" id="educational">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#educational_heading"><div id="educational_heading" class="panel-heading" onclick="show_block('educational_info');"><strong>Applicant's Educational Background Information</strong></div></a>
					<div class="panel-body" id="educational_info" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_education.php">
							
										<?php 
											$educationq = "SELECT * FROM apps_education WHERE serial_no = '$serial_no'";
											$run=mysqli_query($db,$educationq);
											while($row=mysqli_fetch_array($run)){
												$primary_schoolsr = $row['primary_schools'];
												$primary_feesr = $row['primary_fees'];
												$primary_completionr = $row['primary_completion'];
												$secondary_schoolsr = $row['secondary_schools'];
												$secondary_feesr = $row['secondary_fees'];
												$secondary_completionr = $row['secondary_completion'];
												$alevel_schoolsr = $row['alevel_schools'];
												$alevel_feesr = $row['alevel_fees'];
												$alevel_completionr = $row['alevel_completion'];
												$primary_schools_nor = $row['primary_schools_no'];
												$secondary_schools_nor = $row['secondary_schools_no'];
												$alevel_schools_nor = $row['alevel_schools_no'];
            
              								}
										?>
																
								<div class="form-group">
									<label>Primary Schools:</label>
									<p><?php echo $primary_schoolsr ?></p>
								</div>
								
								<div class="form-group">
									<label>Primary Fees: </label>
									<?php $primary_feesr = number_format($primary_feesr, 2, '.', ','); ?>
									<label>MWK <?php echo $primary_feesr ?></label>
								</div>
																
								<div class="form-group">
									<label>Year of Primary Completion: </label>
									<label><?php echo $primary_completionr ?></label>
								</div>
							
								<div class="form-group">
									<label>Secondary Schools: </label>
									<p><?php echo $secondary_schoolsr ?></p>
								</div>

								<div class="form-group">
									<label>Secondary Fees: </label>
									<?php $secondary_feesr = number_format($secondary_feesr, 2, '.', ','); ?>
									<label>MWK <?php echo $secondary_feesr ?></label>
								</div>

								<div class="form-group">
									<label>Year of Secondary Completion: </label>
									<label><?php echo $secondary_completionr ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>A-Level Schools: </label>
									<p><?php echo $alevel_schoolsr ?></p>
								</div>
								
								<div class="form-group">
									<?php $alevel_feesr = number_format($alevel_feesr, 2, '.', ','); ?>
									<label>A-Level Fees: </label>
									<label>MWK <?php echo $alevel_feesr ?></label>
								</div>
								
								<div class="form-group">
									<label>A-Level Completion: </label>
									<label><?php echo $alevel_completionr ?></label>
								</div>

								<div class="form-group">
									<label>Number of Primary Schools: </label>
									<label><?php echo $primary_schools_nor ?></label>
								</div>

								<div class="form-group">
									<label>Number of Secondary Schools: </label>
									<label><?php echo $secondary_schools_nor ?></label>
								</div>

								<div class="form-group">
									<label>Number of A-Level Schools</label>
									<label><?php echo $alevel_schools_nor ?></label>
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

		<div class="row" id="admission">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#admission_heading"><div id="admission_heading" class="panel-heading" onclick="show_block('admission_info');"><strong>Applicant's Admission Details</strong></div></a>
					<div class="panel-body" id="admission_info" style="display: none;">
						<div class="col-md-6">
							<form role="form">
							
								<div class="form-group">
									<label>Serial Number: <?php echo $serial_no ?></label>
									<select class="form-control" name="serial_no" style="display: none;">
										<option value="<?php echo $serial_no ?>" selected>Choose Serial Number</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Admission Year: <?php echo $admission_yearr ?></label>
								</div>
																
								<div class="form-group">
									<label>Registration Number: <?php echo $reg_numberr ?></label>
								</div>
								
								<div class="form-group">
									<label>Current Year of Study: <?php echo $year_of_studyr ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Program of Study: <?php echo $programr ?></label>
								</div>

								<div class="form-group">
									<label>Faculty: <?php echo $facultyr ?></label>
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

		<div class="row" id="loanamounts">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#loanamounts_heading"><div id="loanamounts_heading" class="panel-heading" onclick="show_block('loanamounts_info');"><strong>Loan Amount required for one academic year</strong></div></a>
					<div class="panel-body" id="loanamounts_info" style="display: none;">
						<div class="col-md-6">
							<form role="form">
							
										<?php 
											$loan_appq = "SELECT * FROM apps_loan_app WHERE serial_no = '$serial_no'";
											$run=mysqli_query($db,$loan_appq);
											while($row=mysqli_fetch_array($run)){
												$serial_no = $row['serial_no'];
												$tuitionapp = $row['tuition'];
												$upkeepapp = $row['upkeep'];
												$total_loanapp = $upkeepapp+$tuitionapp;

												$tuitionapp = number_format($tuitionapp, 2, '.', ',');
												$upkeepapp = number_format($upkeepapp, 2, '.', ',');
												$total_loanapp = number_format($total_loanapp, 2, '.', ',');
              								}
										?>
								
								<div class="form-group">
									<label>Tuition Fees: </label>
									<label>MWK <?php echo $tuitionapp ?></label>
								</div>
																
								<div class="form-group">
									<label>Upkeep Amount: </label>
									<label>MWK <?php echo $upkeepapp ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Total Amount Applied for: </label>
									<label>MWK <?php echo $total_loanapp ?></label>
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

		<div class="row" id="fathers">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#fathers_heading"><div id="fathers_heading" class="panel-heading" onclick="show_block('fathers_info');"><strong>Applicant's Father</strong></div></a>
					<div class="panel-body" id="fathers_info" style="display: none;">
						<div class="col-md-6">
							<form role="form">
							
										<?php 
											$fatherq = "SELECT f.`serial_no`, f.`firstname`, f.`surname`, f.`other_names`, f.`profession`, f.`dob`, f.`education`, f.`address`, f.`phone`, f.`mobile`, f.`email`, f.`employer_business`, f.`residential_address`, f.`monthly_income`, f.`other_income`, d.`name` as district, f.`life`, f.`origin_place` FROM apps_father f, district d WHERE f.`serial_no` = '$serial_no' AND f.`district` = d.`district_id`";
											$run=mysqli_query($db,$fatherq);
											while($row=mysqli_fetch_array($run)){
												$firstnamert = $row['firstname'];
												$surnamert = $row['surname'];
												$other_namesrt = $row['other_names'];
												$professionrt = $row['profession'];
												$dobrt = $row['dob'];
												$educationrt = $row['education'];
												$addressrt = $row['address'];
												$phonert = $row['phone'];
												$mobilert = $row['mobile'];
												$emailrt = $row['email'];
												$employer_businessrt = $row['employer_business'];
												$residential_addressrt = $row['residential_address'];
												$monthly_incomert = $row['monthly_income'];
												$other_incomert = $row['other_income'];
												$districtrt = $row['district'];
												$lifert = $row['life'];
												$origin_placert = $row['origin_place'];
              								}
										?>
								
								<div class="form-group">
									<label>First Name: </label>
									<label><?php echo $firstnamert ?></label>
								</div>
																
								<div class="form-group">
									<label>Surname: </label>
									<label><?php echo $surnamert ?></label>
								</div>

								<div class="form-group">
									<label>Other Names: </label>
									<label><?php echo $other_namesrt ?></label>
								</div>

								<div class="form-group">
									<label>Profession: </label>
									<label><?php echo $professionrt ?></label>
								</div>

								<div class="form-group">
									<label>Date of Birth: </label>
									<label><?php echo $dobrt ?></label>
								</div>

								<div class="form-group">
									<label>Highest Level of Education: </label>
									<label><?php echo $educationrt ?></label>
								</div>

								<div class="form-group">
									<label>Postal Address: </label>
									<label><?php echo $addressrt ?></label>
								</div>

								<div class="form-group">
									<label>Phone Number: </label>
									<label><?php echo $phonert ?></label>
								</div>

								<div class="form-group">
									<label>Cell: </label>
									<label><?php echo $mobilert ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>E-mail Address: </label>
									<label><?php echo $emailrt ?></label>
								</div>

								<div class="form-group">
									<label>Employer/Nature of Business: </label>
									<label><?php echo $employer_businessrt ?></label>
								</div>
								
								<div class="form-group">
									<label>Current Residential Address: </label>
									<label><?php echo $residential_addressrt ?></label>
								</div>

								<div class="form-group">
									<?php $monthly_incomert = number_format($monthly_incomert, 2, '.', ','); ?>
									<label>Monthly Income: </label>
									<label>MWK <?php echo $monthly_incomert ?></label>
								</div>

								<div class="form-group">
									<?php $other_incomert = number_format($other_incomert, 2, '.', ','); ?>
									<label>Other Income: </label>
									<label>MWK <?php echo $other_incomert ?></label>
								</div>

								<div class="form-group">
									<label>Residential District: </label>
									<label><?php echo $districtrt ?></label>
								</div>

								<div class="form-group">
									<label>Deceased/Living: </label>
									<label><?php echo $lifert ?></label>
								</div>

								<div class="form-group">
									<label>Village Of Origin: </label>
									<label><?php echo $origin_placert ?></label>
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

		<div class="row" id="mothers">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#mothers_heading"><div id="mothers_heading" class="panel-heading" onclick="show_block('mothers_info');"><strong>Applicant's Mother</strong></div></a>
					<div class="panel-body" id="mothers_info" style="display: none;">
						<div class="col-md-6">
							<form role="form">
							
										<?php 
											$motherq = "SELECT m.`serial_no`, m.`firstname`, m.`surname`, m.`other_names`, m.`profession`, m.`dob`, m.`education`, m.`address`, m.`phone`, m.`mobile`, m.`email`, m.`employer_business`, m.`residential_address`, m.`monthly_income`, m.`other_income`, d.`name` as district, m.`life`, m.`origin_place` FROM apps_mother m, district d WHERE m.`serial_no` = '$serial_no' AND m.`district` = d.`district_id`";
											$run=mysqli_query($db,$motherq);
											while($row=mysqli_fetch_array($run)){
												$firstnamert = $row['firstname'];
												$surnamert = $row['surname'];
												$other_namesrt = $row['other_names'];
												$professionrt = $row['profession'];
												$dobrt = $row['dob'];
												$educationrt = $row['education'];
												$addressrt = $row['address'];
												$phonert = $row['phone'];
												$mobilert = $row['mobile'];
												$emailrt = $row['email'];
												$employer_businessrt = $row['employer_business'];
												$residential_addressrt = $row['residential_address'];
												$monthly_incomert = $row['monthly_income'];
												$other_incomert = $row['other_income'];
												$districtrt = $row['district'];
												$lifert = $row['life'];
												$origin_placert = $row['origin_place'];
              								}
										?>
								
								<div class="form-group">
									<label>First Name: </label>
									<label><?php echo $firstnamert ?></label>
								</div>
																
								<div class="form-group">
									<label>Surname: </label>
									<label><?php echo $surnamert ?></label>
								</div>

								<div class="form-group">
									<label>Other Names: </label>
									<label><?php echo $other_namesrt ?></label>
								</div>

								<div class="form-group">
									<label>Profession: </label>
									<label><?php echo $professionrt ?></label>
								</div>

								<div class="form-group">
									<label>Date of Birth: </label>
									<label><?php echo $dobrt ?></label>
								</div>

								<div class="form-group">
									<label>Highest Level of Education: </label>
									<label><?php echo $educationrt ?></label>
								</div>

								<div class="form-group">
									<label>Postal Address: </label>
									<label><?php echo $addressrt ?></label>
								</div>

								<div class="form-group">
									<label>Phone Number: </label>
									<label><?php echo $phonert ?></label>
								</div>

								<div class="form-group">
									<label>Cell: </label>
									<label><?php echo $mobilert ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>E-mail Address: </label>
									<label><?php echo $emailrt ?></label>
								</div>

								<div class="form-group">
									<label>Employer/Nature of Business: </label>
									<label><?php echo $employer_businessrt ?></label>
								</div>
								
								<div class="form-group">
									<label>Current Residential Address: </label>
									<label><?php echo $residential_addressrt ?></label>
								</div>

								<div class="form-group">
									<?php $monthly_incomert = number_format($monthly_incomert, 2, '.', ','); ?>
									<label>Monthly Income: </label>
									<label>MWK <?php echo $monthly_incomert ?></label>
								</div>

								<div class="form-group">
									<?php $other_incomert = number_format($other_incomert, 2, '.', ','); ?>
									<label>Other Income: </label>
									<label>MWK <?php echo $other_incomert ?></label>
								</div>

								<div class="form-group">
									<label>Residential District: </label>
									<label><?php echo $districtrt ?></label>
								</div>

								<div class="form-group">
									<label>Deceased/Living: </label>
									<label><?php echo $lifert ?></label>
								</div>

								<div class="form-group">
									<label>Village Of Origin: </label>
									<label><?php echo $origin_placert ?></label>
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

		<div class="row" id="sponsors">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#sponsors_heading"><div id="sponsors_heading" class="panel-heading" onclick="show_block('sponsors_info');"><strong>Applicant's Previous Sponsors</strong></div></a>
					<div class="panel-body" id="sponsors_info" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_sponsors.php">
							
										<?php 
											$sponsorsq = "SELECT * FROM apps_sponsors WHERE serial_no = '$serial_no'";
											$run=mysqli_query($db,$sponsorsq);
											while($row=mysqli_fetch_array($run)){
												$serial_nosp = $row['serial_no'];
												$primary_sponsorsp = $row['primary_sponsor'];
												$secondary_sponsorsp = $row['secondary_sponsor'];
												$alevel_sponsorsp = $row['alevel_sponsor'];
												$current_sponsorsp = $row['current_sponsor'];
												$guardian_sponsorsp = $row['guardian_sponsor'];
												$scholarshipsp = $row['scholarship'];
              								}
										?>
								
								<div class="form-group">
									<label>Primary School Sponsor: </label>
									<label><?php echo $primary_sponsorsp ?></label>
								</div>

								<div class="form-group">
									<label>Secondary School Sponsor: </label>
									<label><?php echo $secondary_sponsorsp ?></label>
								</div>

								<div class="form-group">
									<label>A-Level School Sponsor: </label>
									<label><?php echo $alevel_sponsorsp ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Current Sponsor</label>
									<label><?php echo $current_sponsorsp ?></label>
								</div>

								<div class="form-group">
									<label>If Guardian, What is the relationship?: </label>
									<label><?php echo $guardian_sponsorsp ?></label>
								</div>

								<div class="form-group">
									<label>If Organisation, State details: </label>
									<p><?php echo $scholarshipsp ?></p>
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

		<div class="row" id="siblings">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#siblings_heading"><div id="siblings_heading" class="panel-heading" onclick="show_block('siblings_info');"><strong>Details of Family siblings</strong></div></a>
					<div class="panel-body" id="siblings_info" style="display: none;">
						<div class="col-md-10">
							<form role="form">
							<div class="form-group">

							<?php
        						$sql = "SELECT * FROM apps_siblings WHERE serial_no = '$serial_no'";
        						$result = mysqli_query ($db, $sql);
      						?>

							<table class="table table-hover">
    							<thead>
      								<tr>
        								<th>Sibling Name</th>
						        		<th>Institution/School</th>
						        		<th>Level of Study</th>
						        		<th>Annual fees</th>
      								</tr>
    							</thead>
    							<tbody>

    								<?php 
    									$result=$db->query($sql);
										while ($row = mysqli_fetch_array($result)){ 
                							$sibling_namer = $row['sibling_name'];
											$schoolr = $row['school'];
											$levelr = $row['level'];
											$annual_feesr = $row['annual_fees'];
											$annual_feesr = number_format($annual_feesr, 2, '.', ',');  
            
											echo <<<EOF
                  							<tr>
                  
                       							<td style="height:3px; border:0px;padding-left:10px; margin:0px; font-size:16px;">$sibling_namer</td>

                
                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$schoolr</span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$levelr </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">MWK $annual_feesr </span></td>
											</tr>
EOF;
              							}

    								?>
    							</tbody>
  							</table>
							</div>
                        	</form>
                    	</div>
                	</div>
            	</div>
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="social">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#social_heading"><div id="social_heading" class="panel-heading" onclick="show_block('social_info');"><strong>Family Social Economic Indicators</strong></div></a>
					<div class="panel-body" id="social_info" style="display: none;">
						<div class="col-md-6">
							<form role="form">
								
								<div class="form-group">
									<label>Number of Children from Biological Father: </label>
									<label><?php echo $fathers_childrensoc ?></label>
								</div>

								<div class="form-group">
									<label>Number of Children from Biological Mother: </label>
									<label><?php echo $mothers_childrensoc ?></label>
								</div>

								<div class="form-group">
									<label>Parents together?: </label>
									<label><?php echo $parents_togethersoc ?></label>
								</div>

								<div class="form-group">
									<label>If not, whom does he/she stay with?: </label>
									<label><?php echo $apps_staysoc ?></label>
								</div>

								<div class="form-group">
									<label>Type of Family Residence: </label>
									<label><?php echo $residencesoc ?></label>
								</div>

								<div class="form-group">
									<label>Type of House: </label>
									<label><?php echo $housesoc ?></label>
								</div>

								<div class="form-group">
									<label>Number of rooms in the family house: </label>
									<label><?php echo $house_roomssoc ?></label>
								</div>

                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Average Household Monthly Expenditure: </label>
									<?php $household_expendituresoc = number_format($household_expendituresoc, 2, '.', ','); ?>
									<label><?php echo $household_expendituresoc ?></label>
								</div>

								<div class="form-group">
									<label>Medical Care: </label>
									<label><?php echo $medical_caresoc ?></label>
								</div>

								<div class="form-group">
									<label>Applicant's Reasons for Borrowing: </label>
									<p><strong><?php echo $apps_reasonsoc ?></strong></label>
								</div>

								<div class="form-group">
									<label>Applicant's Educational Funding Background: </label>
									<p><strong><?php echo $apps_backgroundsoc ?></strong></p>
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

		<div class="row" id="dependants">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#dependants_heading"><div id="dependants_heading" class="panel-heading" onclick="show_block('dependants_info');"><strong>Details of Family Dependants</strong></div></a>
					<div class="panel-body" id="dependants_info" style="display: none;">
						<div class="col-md-10">
							<form role="form">
							<div class="form-group">

							<?php
        						$sql = "SELECT * FROM apps_dependants WHERE serial_no = '$serial_no'";
        						$result = mysqli_query ($db, $sql);
      						?>

							<table class="table table-hover">
    							<thead>
      								<tr>
        								<th>Dependant Name</th>
						        		<th>Institution/School</th>
						        		<th>Level of Study</th>
						        		<th>Annual fees</th>
      								</tr>
    							</thead>
    							<tbody>

    								<?php 
    									$result=$db->query($sql);
										while ($row = mysqli_fetch_array($result)){ 
                							$dependant_namer = $row['dependant_name'];
											$schoolr = $row['school'];
											$levelr = $row['level'];
											$annual_feesr = $row['annual_fees'];
											$annual_feesr = number_format($annual_feesr, 2, '.', ',');  
            
											echo <<<EOF
                  							<tr>
                  
                       							<td style="height:3px; border:0px;padding-left:10px; margin:0px; font-size:16px;">$dependant_namer</td>

                
                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$schoolr</span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">$levelr </span></td>

                     							<td style="height:3px;border:0px; padding:1px; margin:0px; font-size:16px"><span style="">MWK $annual_feesr </span></td>
											</tr>
EOF;
              							}

    								?>
    							</tbody>
  							</table>
							</div>
                        	</form>
                    	</div>
                	</div>
            	</div>
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="guarantor">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="grantloan.php#guarantor_heading"><div id="guarantor_heading" class="panel-heading" onclick="show_block('guarantor_info');"><strong>Details of Applicant's Guarantor</strong></div></a>
					<div class="panel-body" id="guarantor_info" style="display: none;">
						<div class="col-md-6">
							<form role="form"">
							
										<?php 
											$guarantorq = "SELECT * FROM apps_guarantor WHERE serial_no = '$serial_no'";
											$run=mysqli_query($db,$guarantorq);
											while($row=mysqli_fetch_array($run)){
												$serial_nogua = $row['serial_no'];
												$namegua = $row['name'];
												$phonegua = $row['phone'];
												$mobilegua = $row['mobile'];
												$residencegua = $row['residence'];
            
              								}
										?>
								
								<div class="form-group">
									<label>Guarantor's Full Name: </label>
									<label><?php echo $namegua ?></label>
								</div>
																
								<div class="form-group">
									<label>Guarantor's Working Phone number: </label>
									<label><?php echo $phonegua ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Mobile: </label>
									<label><?php echo $mobilegua ?></label>
								</div>

								<div class="form-group">
									<label>Residential Physical Address: </label>
									<label><?php echo $residencegua ?></label>
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
					<a href="grantloan.php#approve_heading"><div id="approve_heading" class="panel-heading" onclick="show_block('approve_form');"><strong>Approve this application</strong></div></a>
					<div class="panel-body" id="approve_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="approveloan.php">
							
								<div class="form-group">
									<label>Serial Number: </label>
									<label><?php echo $serial_no ?></label>
								</div>

								<div class="form-group">
									<label><strong><?php echo $fnamer." ".$snamer ?></strong></label>
								</div>
																
								<div class="form-group">
									<label><?php echo $fnamer." ".$snamer ?> is doing <?php echo $pname ?> and is in year <?php echo $syear ?></label>
								</div>
								
								<div class="form-group">
									<label><?php echo $fnamer ?> is asking for MWK <?php echo $total_loanapp ?> for reasons this quoted reason: "<?php echo $apps_reasonsoc ?>"</label>
								</div>
																
								<div class="form-group">
									<label>This is <?php echo $fnamer ?>'s background: <?php echo $apps_backgroundsoc ?></label>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
							
								<div class="form-group">
									<label>THE BOARD HAS REVIEWED THIS APPLICATION AND HEREBY GRANTS <?php echo $fnamer ?> A LOAN OF: MWK </label>
									<input class="form-control" name="loan_grant" placeholder="Enter amount here">
								</div>
								
								<input class="form-control" style="display: none;" name="serial_no" value="<?php echo $serial_no ?>">
								<input class="form-control" style="display: none;" name="current_address" value="<?php echo $addresspers ?>">
								<input class="form-control" style="display: none;" name="current_phone" value="<?php echo $phonepers ?>">
								<input class="form-control" style="display: none;" name="current_mobile" value="<?php echo $mobilepers ?>">
								<!--div class="form-group">
									<label>Enter Data for this section only and proceed with just the Serial Number in the other sections</label>
								</div-->
								
								<button type="submit" class="btn btn-primary">GRANT</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<footer class="container-fluid text-center">
  		<a href="grantloan.php#pagetop" title="To Top">
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