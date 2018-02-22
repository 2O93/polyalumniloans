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
			<li class="active"><a href="#"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Users</a></li>
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
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop">View Users</h1>
				<div class="panel-heading">Jump to section: 
					<a href="users.php#adduser" onclick="show_block('adduser_form');"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Add a User...</a>
					<a href="users.php#deluser" onclick="show_block('deluser_form');"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg>Delete a User...</a>
				</div>
			</div>
	</div>

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="users.php#user_heading"><div id="user_heading" class="panel-heading" onclick="show_block('user_form');"><strong>Users in the system</strong></div></a>
					<div class="panel-body" id="user_form" style="display: none;">

					<?php

						$result = $db->query("SELECT s.`firstname`, s.`surname`, s.`username`, s.`phone_number`, s.`mobile_number`, s.`email`, s.`address`, s.`position` FROM staff s");

						$json = array();
						$json = $result->fetch_all(MYSQLI_ASSOC);

						$file = fopen("tables/dataviewtable.json","w+");
						echo fwrite($file,json_encode($json));
						fclose($file);

 					?>

					<table data-toggle="table" data-url="tables/dataviewtable.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="firstname" data-sortable="true" >First Name </th>
						        <th data-field="surname" data-sortable="true">Surname </th>
						        <th data-field="username"  data-sortable="true">username </th>
						        <th data-field="phone_number" data-sortable="true">Phone </th>
						        <th data-field="mobile_number" data-sortable="true">Cell </th>
						        <th data-field="email" data-sortable="true">E-mail </th>
						        <th data-field="address" data-sortable="true">Address </th>
						        <th data-field="position" data-sortable="true">Position </th>
						    </tr>
						    </thead>
					</table>
						
                	</div>
                </div>
            
            </div><!-- /.col-->
            
	</div><!-- /.row -->

	<div class="row" id="adduser">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="users.php#adduser_heading"><div id="adduser_heading" class="panel-heading" onclick="show_block('adduser_form');"><strong>Add a User</strong></div></a>
					<div class="panel-body" id="adduser_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="adduser.php">
							
								<div class="form-group">
									<label>First Name</label>
									<input class="form-control" name="firstname" placeholder="First Name">
								</div>
																
								<div class="form-group">
									<label>Surname</label>
									<input class="form-control" name="surname" placeholder="Surname">
								</div>
								
								<div class="form-group">
									<label>User Name</label>
									<input class="form-control" name="username" placeholder="Choose a unique name">
								</div>
								
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" name="password" placeholder="The user will reset">
								</div>
								
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" name="phone_number" placeholder="Primary Phone Number">
								</div>
								
                            </div>
                            
							<div class="col-md-6">
							
								<div class="form-group">
									<label>Mobile</label>
									<input class="form-control" name="mobile_number" placeholder="Secondary Phone Number">
								</div>
								
								<div class="form-group">
									<label>E-mail</label>
									<input class="form-control" name="email" placeholder="E-mail Address">
								</div>
								
								<div class="form-group">
									<label>Address</label>
									<input class="form-control" name="address" placeholder="Postal Address">
								</div>

								<div class="form-group">
									<label>Position</label>
									<select class="form-control" name="position">
										<option value="" selected>Choose Position</option>
										<option value="board_member">Board Member</option>
										<option value="data_entry">Data Entry Clerk</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Submit to add user. The user will be able to log in.</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Create User</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row" id="deluser">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="edit.php#deluser_heading"><div id="deluser_heading" class="panel-heading" onclick="show_block('deluser_form');"><strong>Select a User to DELETE</strong></div></a>
					<div class="panel-body" id="deluser_form">
						<div class="col-md-6">
							<form role="form" method="post" action="deleteuser.php">
							
								<div class="form-group">
									<label>User info:</label>
									<select class="form-control" name="usernamed">
										<option value="" selected>Choose user</option>
										<?php 
											$name = "SELECT s.`firstname`, s.`surname`, s.`username`, s.`phone_number`, s.`mobile_number`, s.`email`, s.`address`, s.`position` FROM staff s";
											$run=mysqli_query($db,$name);
											while($row=mysqli_fetch_array($run)){  
                								$fnamed = $row['firstname'];
                								$snamed = $row['surname'];
                								$usernamed = $row['username'];
                								$positiond = $row['position'];
            
												echo <<<EOF
												<option value="$usernamed">$fnamed  $snamed  Username: $usernamed Position: $positiond </option>
                  
EOF;
              								}
										?>
									</select>
								</div>
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>Proceed to delete this user, this action is irreversible.</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Delete User</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

</div><!-- /.Main-->

	<footer class="container-fluid text-center">
  		<a href="users.php#pagetop" title="To Top">
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