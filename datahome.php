<?php
 include ('includes/datahead.php');
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
			<li class="active"><a href="datahome.php#personal_heading"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> Add Application</a></li>
			<li><a href="view.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg> View Applications</a></li>
			<li><a href="edit.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Edit Application</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="dataprofile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
		</ul>

	</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop">Add an Application</h1>
				<div class="panel-heading">Jump to section: 
					<a href="datahome.php#residential" onclick="show_block('residential_form');"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>Residential...</a>
					<a href="datahome.php#educational" onclick="show_block('educational_form');"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>Educational...</a>
					<a href="datahome.php#admission" onclick="show_block('admission_form');"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Admission...</a>
					<a href="datahome.php#loanamounts" onclick="show_block('loanamounts_form');"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Loan Amounts...</a>
					<a href="datahome.php#fathers" onclick="show_block('fathers_form');"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Fathers...</a>
					<a href="datahome.php#mothers" onclick="show_block('mothers_form');"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Mothers...</a>
				</div>
				<div class="panel-heading">Jump to section: 
					<a href="datahome.php#sponsors" onclick="show_block('sponsors_form');"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Sponsors...</a>
					<a href="datahome.php#siblings" onclick="show_block('siblings_form');"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Siblings...</a>
					<a href="datahome.php#social" onclick="show_block('social_form');"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>Social...</a>
					<a href="datahome.php#dependants" onclick="show_block('dependants_form');"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Dependants...</a>
					<a href="datahome.php#guarantor" onclick="show_block('guarantor_form');"><svg class="glyph stroked brush"><use xlink:href="#stroked-brush"/></svg>Guarantors...</a>
				</div>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#personal_heading"><div id="personal_heading" class="panel-heading" onclick="show_block('personal_form');"><strong>Personal Details of the Applicant</strong></div></a>
					<div class="panel-body" id="personal_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_personal.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<input class="form-control" name="serial_no"  autofocus="" placeholder="Serial Number">
								</div>

								<div class="form-group">
									<label>First Name</label>
									<input class="form-control" name="firstname" placeholder="First Name">
								</div>
																
								<div class="form-group">
									<label>Surname</label>
									<input class="form-control" name="surname" placeholder="Surname">
								</div>
								
								<div class="form-group">
									<label>Other Names</label>
									<input class="form-control" name="other_names" placeholder="Other Names">
								</div>
																
								<div class="form-group">
									<label>Gender</label>
									<div class="radio">
										<label>
											<input type="radio" name="gender" id="optionsRadios1" value="M" checked>Male
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="gender" id="optionsRadios2" value="F">Female
										</label>
									</div>
								</div>
								
								<div class="form-group">
									<label>Address</label>
									<input class="form-control" name="address" placeholder="Address">
								</div>
								
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" name="phone" placeholder="Primary Phone Number">
								</div>
								
                            </div>
                            
							<div class="col-md-6">
							
								<div class="form-group">
									<label>Mobile</label>
									<input class="form-control" name="mobile" placeholder="Secondary Phone Number">
								</div>
								
								<div class="form-group">
									<label>E-mail</label>
									<input class="form-control" type="email" name="email" placeholder="E-mail Address">
								</div>
								
								<div class="form-group">
									<label>District</label>
									<select class="form-control" name="district">
										<option value="" selected>Choose One</option>
										<option value="1">Balaka</option>
										<option value="2">Blantyre</option>
										<option value="3">Chikwawa</option>
										<option value="4">Chiradzulu</option>
										<option value="5">Chitipa</option>
										<option value="6">Dedza</option>
										<option value="7">Dowa</option>
										<option value="8">Karonga</option>
										<option value="9">Kasungu</option>
										<option value="10">Likoma</option>
										<option value="11">Lilongwe</option>
										<option value="12">Machinga</option>
										<option value="13">Mangochi</option>
										<option value="14">Mchinji</option>
										<option value="15">Mulanje</option>
										<option value="16">Mwanza</option>
										<option value="17">Mzimba</option>
										<option value="18">Neno</option>
										<option value="19">Nkhatabay</option>
										<option value="20">Nkhotakota</option>
										<option value="21">Nsanje</option>
										<option value="22">Ntcheu</option>
										<option value="23">Ntchisi</option>
										<option value="24">Phalombe</option>
										<option value="25">Rumphi</option>
										<option value="26">Salima</option>
										<option value="27">Thyolo</option>
										<option value="28">Zomba</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Township</label>
									<input class="form-control" name="township" placeholder="Township">
								</div>

								<div class="form-group">
									<label>Village</label>
									<input class="form-control" name="village" placeholder="Village">
								</div>

								<div class="form-group">
									<label>Date of Birth</label>
									<input class="form-control" name="dob" placeholder="Format: YYYY-MM-DD">
								</div>

								<div class="form-group">
									<label>Enter Data for this section only and proceed with just the Serial Number in the other sections</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="residential">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#residential_heading"><div id="residential_heading" class="panel-heading" onclick="show_block('residential_form');"><strong>Applicant's Residential Contact Details (Current Address)</strong></div></a>
					<div class="panel-body" id="residential_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_residential.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_residential)";
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
									<label>Residential District</label>
									<select class="form-control" name="district">
										<option value="" selected>Choose One</option>
										<option value="1">Balaka</option>
										<option value="2">Blantyre</option>
										<option value="3">Chikwawa</option>
										<option value="4">Chiradzulu</option>
										<option value="5">Chitipa</option>
										<option value="6">Dedza</option>
										<option value="7">Dowa</option>
										<option value="8">Karonga</option>
										<option value="9">Kasungu</option>
										<option value="10">Likoma</option>
										<option value="11">Lilongwe</option>
										<option value="12">Machinga</option>
										<option value="13">Mangochi</option>
										<option value="14">Mchinji</option>
										<option value="15">Mulanje</option>
										<option value="16">Mwanza</option>
										<option value="17">Mzimba</option>
										<option value="18">Neno</option>
										<option value="19">Nkhatabay</option>
										<option value="20">Nkhotakota</option>
										<option value="21">Nsanje</option>
										<option value="22">Ntcheu</option>
										<option value="23">Ntchisi</option>
										<option value="24">Phalombe</option>
										<option value="25">Rumphi</option>
										<option value="26">Salima</option>
										<option value="27">Thyolo</option>
										<option value="28">Zomba</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Residence Phone</label>
									<input class="form-control" name="res_phone" placeholder="Phone Number At the Residence">
								</div>
																
								<div class="form-group">
									<label>Next of Kin</label>
									<input class="form-control" name="next_of_kin" placeholder="Name ">
								</div>
							
								<div class="form-group">
									<label>Place Name</label>
									<input class="form-control" name="place_name" placeholder="Village/Township/Constituency">
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>Occupation of Next of Kin</label>
									<input class="form-control" type="text" name="next_of_kin_occupation" placeholder="Occupation of Next of Kin">
								</div>
								
								<div class="form-group">
									<label>Relationship with Next of Kin</label>
									<select class="form-control" name="next_of_kin_relation">
										<option value="" selected>Choose Relation</option>
										<option value="Sibling">Sibling</option>
										<option value="Cousin">Cousin</option>
										<option value="Nephew">Nephew</option>
										<option value="Niece">Niece</option>
										<option value="Child">Child</option>
										<option value="Parent">Parent</option>
										<option value="Uncle">Uncle</option>
										<option value="Aunt">Aunt</option>
										<option value="Spouse">Spouse</option>
										<option value="Legal Guardian">Legal Guardian</option>
										<option value="In-law">In-law</option>
										<option value="Step-parent">Step-Parent</option>
										<option value="Other">Other</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Location of Next of Kin</label>
									<input class="form-control" name="next_of_kin_location" placeholder="Where the Next of Kin lives">
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="educational">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#educational_heading"><div id="educational_heading" class="panel-heading" onclick="show_block('educational_form');"><strong>Applicant's Educational Background Information</strong></div></a>
					<div class="panel-body" id="educational_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_education.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_education)";
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
									<label>Primary Schools</label>
									<textarea class="form-control" name="primary_schools" rows="3" placeholder="List the names of Primary Schools the applicant attended"></textarea>
								</div>
								
								<div class="form-group">
									<label>Primary Fees</label>
									<input class="form-control" name="primary_fees" placeholder="Amount of annual Primary School fees">
								</div>
																
								<div class="form-group">
									<label>Year of Primary Completion</label>
									<input class="form-control" name="primary_completion" placeholder="Year the applicant completed Primary School. Format YYYY">
								</div>
							
								<div class="form-group">
									<label>Secondary Schools</label>
									<textarea class="form-control" name="secondary_schools" rows="3" placeholder="List the names of Secondary Schools the applicant attended"></textarea>
								</div>

								<div class="form-group">
									<label>Secondary Fees</label>
									<input class="form-control" name="secondary_fees" placeholder="Amount of annual Secondary School fees">
								</div>

								<div class="form-group">
									<label>Year of Secondary Completion</label>
									<input class="form-control" name="secondary_completion" placeholder="Year the applicant completed Secondary School. Format YYYY">
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>A-Level Schools</label>
									<textarea class="form-control" name="alevel_schools" rows="3" placeholder="List the names of A-Level Schools the applicant attended"></textarea>
								</div>
								
								<div class="form-group">
									<label>A-Level Fees</label>
									<input class="form-control" name="alevel_fees" placeholder="Amount of annual A-Level School fees">
								</div>
								
								<div class="form-group">
									<label>A-Level Completion</label>
									<input class="form-control" name="alevel_completion" placeholder="Year the applicant completed A-Level School. Format YYYY">
								</div>

								<div class="form-group">
									<label>Number of Primary Schools</label>
									<input class="form-control" name="primary_schools_no" placeholder="State the number of Primary Schools the Applicant attended">
								</div>

								<div class="form-group">
									<label>Number of Secondary Schools</label>
									<input class="form-control" name="secondary_schools_no" placeholder="State the number of Secondary Schools the Applicant attended">
								</div>

								<div class="form-group">
									<label>Number of A-Level Schools</label>
									<input class="form-control" name="alevel_schools_no" placeholder="State the number of A-Level Schools the Applicant attended">
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="admission">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#admission_heading"><div id="admission_heading" class="panel-heading" onclick="show_block('admission_form');"><strong>Applicant's Admission Details</strong></div></a>
					<div class="panel-body" id="admission_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_admission.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_admission)";
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
									<label>Admission Year</label>
									<input class="form-control" name="admission_year" placeholder="Applicant's year of admission">
								</div>
																
								<div class="form-group">
									<label>Registration Number</label>
									<input class="form-control" name="reg_number" placeholder="Applicant's Registration Number">
								</div>
								
								<div class="form-group">
									<label>Current Year of Study</label>
									<input class="form-control" name="year_of_study" placeholder="Integer from 1-5">
								</div>
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Program of Study</label>
									<select class="form-control" name="program">
									<option value="" selected>Choose a program</option>
										<?php 
											$programs = "SELECT prog_id, prog_code, prog_name FROM program";
											$run=mysqli_query($db,$programs);
											while($row=mysqli_fetch_array($run)){
												$id = $row['prog_id'];  
                								$pcode= $row['prog_code'];
                								$pname = $row['prog_name'];
            
												echo <<<EOF
												<option value="$id">$pcode  $pname</option>
                  
EOF;
              								}
										?>
									</select>
								</div>

								<div class="form-group">
									<label>Faculty</label>
									<select class="form-control" name="faculty">
									<option value="" selected>Choose a faculty</option>
										<?php 
											$faculties = "SELECT faculty_id, name FROM faculty";
											$run=mysqli_query($db,$faculties);
											while($row=mysqli_fetch_array($run)){
												$facid = $row['faculty_id'];
                								$facname = $row['name'];
            
												echo <<<EOF
												<option value="$facid">$facname</option>
                  
EOF;
              								}
										?>
									</select>
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="loanamounts">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#loanamounts_heading"><div id="loanamounts_heading" class="panel-heading" onclick="show_block('loanamounts_form');"><strong>Loan Amount required for one academic year</strong></div></a>
					<div class="panel-body" id="loanamounts_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_loan_app.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_loan_app)";
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
									<label>Tuition Fees</label>
									<input class="form-control" name="tuition" placeholder="Tuition for one Academic Year">
								</div>
																
								
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Upkeep</label>
									<input class="form-control" name="upkeep" placeholder="Upkeep required for one Academic Year">
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="fathers">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#fathers_heading"><div id="fathers_heading" class="panel-heading" onclick="show_block('fathers_form');"><strong>Applicant's Father</strong></div></a>
					<div class="panel-body" id="fathers_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_father.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_father)";
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
									<label>First Name</label>
									<input class="form-control" name="firstname" placeholder="Father's First Name">
								</div>
																
								<div class="form-group">
									<label>Surname</label>
									<input class="form-control" name="surname" placeholder="Father's Surname">
								</div>

								<div class="form-group">
									<label>Other Names</label>
									<input class="form-control" name="other_names" placeholder="List Father's Other Names">
								</div>

								<div class="form-group">
									<label>Profession</label>
									<input class="form-control" name="profession" placeholder="What does the Father do">
								</div>

								<div class="form-group">
									<label>Date of Birth</label>
									<input class="form-control" name="dob" placeholder="Father's Date of Birth: YYYY-MM-DD">
								</div>

								<div class="form-group">
									<label>Highest Level of Education</label>
									<select class="form-control" name="education">
										<option value="" selected>Choose Qualification</option>
										<option value="Primary">Primary</option>
										<option value="Secondary">Secondary</option>
										<option value="Certificate">Certificate</option>
										<option value="Diploma">Diploma</option>
										<option value="Advanced Diploma">Advanced Diploma</option>
										<option value="Graduate Diploma">Graduate Diploma</option>
										<option value="Bachelors">Bachelors</option>
										<option value="Masters">Masters</option>
										<option value="PhD">PhD</option>
										<option value="Professor">Professor</option>
										<option value="Uneducated">Uneducated</option>
									</select>
								</div>

								<div class="form-group">
									<label>Postal Address</label>
									<input class="form-control" name="address" placeholder="Father's Postal Address">
								</div>

								<div class="form-group">
									<label>Phone Number</label>
									<input class="form-control" name="phone" placeholder="Father's Working Phone Number">
								</div>

								<div class="form-group">
									<label>Cell</label>
									<input class="form-control" name="mobile" placeholder="Father's Secondary Phone Number">
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>E-mail Address</label>
									<input class="form-control" name="email" placeholder="Father's E-mail Address">
								</div>

								<div class="form-group">
									<label>Employer/Nature of Business</label>
									<input class="form-control" name="employer_business" placeholder="Father's Employer/Nature of Business">
								</div>
								
								<div class="form-group">
									<label>Current Residential Address</label>
									<input class="form-control" name="residential_address" placeholder="Where does the Father Stay">
								</div>

								<div class="form-group">
									<label>Monthly Income</label>
									<input class="form-control" name="monthly_income" placeholder="How much he gets from work per month">
								</div>

								<div class="form-group">
									<label>Other Income</label>
									<input class="form-control" name="other_income" placeholder="How much he gets from elsewhere per month">
								</div>

								<div class="form-group">
									<label>Residential District</label>
									<select class="form-control" name="district">
										<option value="" selected>Choose One</option>
										<option value="1">Balaka</option>
										<option value="2">Blantyre</option>
										<option value="3">Chikwawa</option>
										<option value="4">Chiradzulu</option>
										<option value="5">Chitipa</option>
										<option value="6">Dedza</option>
										<option value="7">Dowa</option>
										<option value="8">Karonga</option>
										<option value="9">Kasungu</option>
										<option value="10">Likoma</option>
										<option value="11">Lilongwe</option>
										<option value="12">Machinga</option>
										<option value="13">Mangochi</option>
										<option value="14">Mchinji</option>
										<option value="15">Mulanje</option>
										<option value="16">Mwanza</option>
										<option value="17">Mzimba</option>
										<option value="18">Neno</option>
										<option value="19">Nkhatabay</option>
										<option value="20">Nkhotakota</option>
										<option value="21">Nsanje</option>
										<option value="22">Ntcheu</option>
										<option value="23">Ntchisi</option>
										<option value="24">Phalombe</option>
										<option value="25">Rumphi</option>
										<option value="26">Salima</option>
										<option value="27">Thyolo</option>
										<option value="28">Zomba</option>
									</select>
								</div>

								<div class="form-group">
									<label>Deceased/Living</label>
									<div class="radio">
										<label>
											<input type="radio" name="life" id="optionsRadios3" value="Living" checked>Living
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="life" id="optionsRadios4" value="Deceased">Deceased
										</label>
									</div>
								</div>

								<div class="form-group">
									<label>District of Origin</label>
									<select class="form-control" name="origin_district">
										<option value="" selected>Choose One</option>
										<option value="1">Balaka</option>
										<option value="2">Blantyre</option>
										<option value="3">Chikwawa</option>
										<option value="4">Chiradzulu</option>
										<option value="5">Chitipa</option>
										<option value="6">Dedza</option>
										<option value="7">Dowa</option>
										<option value="8">Karonga</option>
										<option value="9">Kasungu</option>
										<option value="10">Likoma</option>
										<option value="11">Lilongwe</option>
										<option value="12">Machinga</option>
										<option value="13">Mangochi</option>
										<option value="14">Mchinji</option>
										<option value="15">Mulanje</option>
										<option value="16">Mwanza</option>
										<option value="17">Mzimba</option>
										<option value="18">Neno</option>
										<option value="19">Nkhatabay</option>
										<option value="20">Nkhotakota</option>
										<option value="21">Nsanje</option>
										<option value="22">Ntcheu</option>
										<option value="23">Ntchisi</option>
										<option value="24">Phalombe</option>
										<option value="25">Rumphi</option>
										<option value="26">Salima</option>
										<option value="27">Thyolo</option>
										<option value="28">Zomba</option>
									</select>
								</div>

								<div class="form-group">
									<label>Village Of Origin</label>
									<input class="form-control" name="origin_place" placeholder="Father's Home Village">
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="mothers">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#mothers_heading"><div id="mothers_heading" class="panel-heading" onclick="show_block('mothers_form');"><strong>Applicant's Mother</strong></div></a>
					<div class="panel-body" id="mothers_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_mother.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_mother)";
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
									<label>First Name</label>
									<input class="form-control" name="firstname" placeholder="Mother's First Name">
								</div>
																
								<div class="form-group">
									<label>Surname</label>
									<input class="form-control" name="surname" placeholder="Mother's Surname">
								</div>

								<div class="form-group">
									<label>Other Names</label>
									<input class="form-control" name="other_names" placeholder="List Mother's Other Names">
								</div>

								<div class="form-group">
									<label>Profession</label>
									<input class="form-control" name="profession" placeholder="What does the Mother do">
								</div>

								<div class="form-group">
									<label>Date of Birth</label>
									<input class="form-control" name="dob" placeholder="Mother's Date of Birth: YYYY-MM-DD">
								</div>

								<div class="form-group">
									<label>Highest Level of Education</label>
									<select class="form-control" name="education">
										<option value="" selected>Choose Qualification</option>
										<option value="Primary">Primary</option>
										<option value="Secondary">Secondary</option>
										<option value="Certificate">Certificate</option>
										<option value="Diploma">Diploma</option>
										<option value="Advanced Diploma">Advanced Diploma</option>
										<option value="Graduate Diploma">Graduate Diploma</option>
										<option value="Bachelors">Bachelors</option>
										<option value="Masters">Masters</option>
										<option value="PhD">PhD</option>
										<option value="Professor">Professor</option>
										<option value="Uneducated">Uneducated</option>
									</select>
								</div>

								<div class="form-group">
									<label>Postal Address</label>
									<input class="form-control" name="address" placeholder="Mother's Postal Address">
								</div>

								<div class="form-group">
									<label>Phone Number</label>
									<input class="form-control" name="phone" placeholder="Mother's Working Phone Number">
								</div>

								<div class="form-group">
									<label>Cell</label>
									<input class="form-control" name="mobile" placeholder="Mother's Secondary Phone Number">
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>E-mail Address</label>
									<input class="form-control" name="email" placeholder="Mother's E-mail Address">
								</div>

								<div class="form-group">
									<label>Employer/Nature of Business</label>
									<input class="form-control" name="employer_business" placeholder="Mother's Employer/Nature of Business">
								</div>
								
								<div class="form-group">
									<label>Current Residential Address</label>
									<input class="form-control" name="residential_address" placeholder="Where does the Mother Stay">
								</div>

								<div class="form-group">
									<label>Monthly Income</label>
									<input class="form-control" name="monthly_income" placeholder="How much she gets from work per month">
								</div>

								<div class="form-group">
									<label>Other Income</label>
									<input class="form-control" name="other_income" placeholder="How much she gets from elsewhere per month">
								</div>

								<div class="form-group">
									<label>Residential District</label>
									<select class="form-control" name="district">
										<option value="" selected>Choose One</option>
										<option value="1">Balaka</option>
										<option value="2">Blantyre</option>
										<option value="3">Chikwawa</option>
										<option value="4">Chiradzulu</option>
										<option value="5">Chitipa</option>
										<option value="6">Dedza</option>
										<option value="7">Dowa</option>
										<option value="8">Karonga</option>
										<option value="9">Kasungu</option>
										<option value="10">Likoma</option>
										<option value="11">Lilongwe</option>
										<option value="12">Machinga</option>
										<option value="13">Mangochi</option>
										<option value="14">Mchinji</option>
										<option value="15">Mulanje</option>
										<option value="16">Mwanza</option>
										<option value="17">Mzimba</option>
										<option value="18">Neno</option>
										<option value="19">Nkhatabay</option>
										<option value="20">Nkhotakota</option>
										<option value="21">Nsanje</option>
										<option value="22">Ntcheu</option>
										<option value="23">Ntchisi</option>
										<option value="24">Phalombe</option>
										<option value="25">Rumphi</option>
										<option value="26">Salima</option>
										<option value="27">Thyolo</option>
										<option value="28">Zomba</option>
									</select>
								</div>

								<div class="form-group">
									<label>Deceased/Living</label>
									<div class="radio">
										<label>
											<input type="radio" name="life" id="optionsRadios3" value="Living" checked>Living
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="life" id="optionsRadios4" value="Deceased">Deceased
										</label>
									</div>
								</div>

								<div class="form-group">
									<label>District of Origin</label>
									<select class="form-control" name="origin_district">
										<option value="" selected>Choose One</option>
										<option value="1">Balaka</option>
										<option value="2">Blantyre</option>
										<option value="3">Chikwawa</option>
										<option value="4">Chiradzulu</option>
										<option value="5">Chitipa</option>
										<option value="6">Dedza</option>
										<option value="7">Dowa</option>
										<option value="8">Karonga</option>
										<option value="9">Kasungu</option>
										<option value="10">Likoma</option>
										<option value="11">Lilongwe</option>
										<option value="12">Machinga</option>
										<option value="13">Mangochi</option>
										<option value="14">Mchinji</option>
										<option value="15">Mulanje</option>
										<option value="16">Mwanza</option>
										<option value="17">Mzimba</option>
										<option value="18">Neno</option>
										<option value="19">Nkhatabay</option>
										<option value="20">Nkhotakota</option>
										<option value="21">Nsanje</option>
										<option value="22">Ntcheu</option>
										<option value="23">Ntchisi</option>
										<option value="24">Phalombe</option>
										<option value="25">Rumphi</option>
										<option value="26">Salima</option>
										<option value="27">Thyolo</option>
										<option value="28">Zomba</option>
									</select>
								</div>

								<div class="form-group">
									<label>Village Of Origin</label>
									<input class="form-control" name="origin_place" placeholder="Mother's Home Village">
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="sponsors">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#sponsors_heading"><div id="sponsors_heading" class="panel-heading" onclick="show_block('sponsors_form');"><strong>Applicant's Previous Sponsors</strong></div></a>
					<div class="panel-body" id="sponsors_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_sponsors.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_sponsors)";
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
									<label>Who Paid Primary School Fees</label>
									<select class="form-control" name="primary_sponsor">
										<option value="" selected>Choose One</option>
										<option value="Parent or Guardian">Parent or Guardian</option>
										<option value="External or Scholarship">External or Scholarship</option>
									</select>
								</div>

								<div class="form-group">
									<label>Who Paid Secondary School Fees</label>
									<select class="form-control" name="secondary_sponsor">
										<option value="" selected>Choose One</option>
										<option value="Parent or Guardian">Parent or Guardian</option>
										<option value="External or Scholarship">External or Scholarship</option>
									</select>
								</div>

								<div class="form-group">
									<label>Who Paid A-Level School Fees</label>
									<select class="form-control" name="alevel_sponsor">
										<option value="" selected>Choose One</option>
										<option value="Parent or Guardian">Parent or Guardian</option>
										<option value="External or Scholarship">External or Scholarship</option>
									</select>
								</div>
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Current Sponsor</label>
									<select class="form-control" name="current_sponsor">
										<option value="" selected>Choose One</option>
										<option value="Self">Self</option>
										<option value="Parent or Guardian">Parent or Guardian</option>
										<option value="External or Scholarship">External or Scholarship</option>
									</select>
								</div>

								<div class="form-group">
									<label>If Guardian, What is the relationship?</label>
									<input class="form-control" name="guardian_sponsor" placeholder="Relationship with Guardian Sponsor">
								</div>

								<div class="form-group">
									<label>If Organisation, State details</label>
									<textarea class="form-control" name="scholarship" rows="3" placeholder="Details of any Scholarship"></textarea>
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="siblings">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#siblings_heading"><div id="siblings_heading" class="panel-heading" onclick="show_block('siblings_form');"><strong>Details of Applicant's Siblings</strong></div></a>
					<div class="panel-body" id="siblings_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_siblings.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_siblings)";
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
									<label>Sibling Name</label>
									<input class="form-control" name="sibling_name" placeholder="Name of the Sibling">
								</div>

								<div class="form-group">
									<label>Current/Last Institution the Sibling is/was at</label>
									<input class="form-control" name="school" placeholder="Enter School/Institution Name">
								</div>

                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Level of Study/Class</label>
									<input class="form-control" name="level" placeholder="Level/Class">
								</div>

								<div class="form-group">
									<label>Annual Fees</label>
									<input class="form-control" name="annual_fees" placeholder="Amount of fees paid annually">
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="social">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#social_heading"><div id="social_heading" class="panel-heading" onclick="show_block('social_form');"><strong>Family Social Economic Indicators</strong></div></a>
					<div class="panel-body" id="social_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_social.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_social)";
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
									<label>Number of Children from Biological Father</label>
									<input class="form-control" name="fathers_children" placeholder="Integer">
								</div>

								<div class="form-group">
									<label>Number of Children from Biological Mother</label>
									<input class="form-control" name="mothers_children" placeholder="Integer">
								</div>

								<div class="form-group">
									<label>Parents together?</label>
									<div class="radio">
										<label>
											<input type="radio" name="parents_together" id="optionsRadios5" value="Yes" checked>Yes
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="parents_together" id="optionsRadios6" value="No">No
										</label>
									</div>
								</div>

								<div class="form-group">
									<label>If not, whom does he/she stay with?</label>
									<select class="form-control" name="apps_stay">
										<option value="" selected>Choose One</option>
										<option value="Father">Father</option>
										<option value="Mother">Mother</option>
										<option value="Other">Other</option>
									</select>
								</div>

								<div class="form-group">
									<label>Type of Family Residence</label>
									<select class="form-control" name="residence">
										<option value="" selected>Choose One</option>
										<option value="Rented">Rented</option>
										<option value="Owned">Owned</option>
										<option value="Employers">Employers</option>
										<option value="Other">Other</option>
									</select>
								</div>

								<div class="form-group">
									<label>Type of House</label>
									<select class="form-control" name="house">
										<option value="" selected>Choose One</option>
										<option value="Permanent">Permanent</option>
										<option value="Semi Permanent">Semi Permanent</option>
									</select>
								</div>

								<div class="form-group">
									<label>Number of rooms in the family house</label>
									<input class="form-control" name="house_rooms" placeholder="Integer">
								</div>

                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Average Household Monthly Expenditure</label>
									<input class="form-control" name="household_expenditure" placeholder="Amount...">
								</div>

								<div class="form-group">
									<label>Where does the family seek medical care?</label>
									<select class="form-control" name="medical_care">
										<option value="" selected>Choose One</option>
										<option value="Private Missionary">Private Missionary</option>
										<option value="Private Commercial">Private Commercial</option>
										<option value="Insurance Cover">Insurance Cover</option>
										<option value="District Public Hospital">District Public Hospital</option>
										<option value="Other">Other</option>
									</select>
								</div>

								<div class="form-group">
									<label>Applicant's Reasons for Borrowing</label>
									<textarea class="form-control" name="apps_reason" rows="3" placeholder="Details of applicant's reasons"></textarea>
								</div>

								<div class="form-group">
									<label>Applicant's Educational Funding Background</label>
									<textarea class="form-control" name="apps_background" rows="3" placeholder="Summarise Background"></textarea>
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="dependants">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#dependants_heading"><div id="dependants_heading" class="panel-heading" onclick="show_block('dependants_form');"><strong>Details of Family Dependants</strong></div></a>
					<div class="panel-body" id="dependants_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_dependants.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_dependants)";
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
									<label>Dependant Name</label>
									<input class="form-control" name="dependant_name" placeholder="Full Name of the Dependant">
								</div>

								<div class="form-group">
									<label>Current Institution the Dependant is at</label>
									<input class="form-control" name="school" placeholder="Enter School/Institution Name">
								</div>

                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Level of Study/Class</label>
									<input class="form-control" name="level" placeholder="Level/Class of Dependant">
								</div>

								<div class="form-group">
									<label>Annual Fees</label>
									<input class="form-control" name="annual_fees" placeholder="Amount of fees paid annually">
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="guarantor">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="datahome.php#guarantor_heading"><div id="guarantor_heading" class="panel-heading" onclick="show_block('guarantor_form');"><strong>Details of Applicant's Guarantor</strong></div></a>
					<div class="panel-body" id="guarantor_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="apps_guarantor.php">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal WHERE serial_no NOT IN (SELECT serial_no FROM apps_guarantor)";
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
									<label>Guarantor's Full Name</label>
									<input class="form-control" name="name" placeholder="Name of Guarantor">
								</div>
																
								<div class="form-group">
									<label>Guarantor's Working Phone number</label>
									<input class="form-control" name="phone" placeholder="Phone Number">
								</div>
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Mobile</label>
									<input class="form-control" name="mobile" placeholder="Cell">
								</div>

								<div class="form-group">
									<label>Residential Physical Address</label>
									<input class="form-control" name="residence" placeholder="Place name">
								</div>

								<div class="form-group">
									<label>Enter this Section before proceeding</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Enter Section</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<footer class="container-fluid text-center">
  		<a href="datahome.php#pagetop" title="To Top">
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