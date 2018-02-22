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
			<li><a href="datahome.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> Add Application</a></li>
			<li><a href="view.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg> View Applications</a></li>
			<li><a href="edit.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Edit Application</a></li>
			
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
		</ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop">Welcome <?php echo $user_id; ?></h1>
			</div>
	</div>

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="dataprofile.php#details_heading"><div id="details_heading" class="panel-heading"  onclick="show_block('details_form');"><strong>Your Details. You may edit where applicable.</strong></div></a>
					<div class="panel-body" id="details_form" style="display: none;">
					<?php 
							$userinfo = "SELECT * FROM staff WHERE username = '$user_id'";
							$run=mysqli_query($db,$userinfo);
							while($row=mysqli_fetch_array($run)){
								$userfname = $row['firstname'];  
                				$userlname = $row['surname'];
                				$userphone = $row['phone_number'];
                				$usermobile = $row['mobile_number'];
                				$useremail = $row['email'];
                				$useraddress = $row['address'];
                			}
                	?>
						<div class="col-md-6">
							<form role="form" method="post" action="updatedata.php">
							
							<div class="form-group">
									<label>First Name: <?php echo $userfname; ?></label>
								</div>
																
								<div class="form-group">
									<label>Surname: <?php echo $userlname; ?></label>
								</div>

								<div class="form-group">
									<label>Your Username: <?php echo $user_id; ?></label>
								</div>

								<div class="form-group">
									<label>Phone Number</label>
									<input class="form-control" name="phone_number" value="<?php echo $userphone; ?>">
								</div>
								
								<div class="form-group">
									<label>Mobile</label>
									<input class="form-control" name="mobile_number" value="<?php echo $usermobile; ?>">
								</div>
								
                            </div>
                            
							<div class="col-md-6">
							
								
								<div class="form-group">
									<label>E-mail</label>
									<input class="form-control" type="email" name="email" value="<?php echo $useremail; ?>">
								</div>

								<div class="form-group">
									<label>Address</label>
									<input class="form-control" name="address" value="<?php echo $useraddress; ?>">
								</div>
								
								<div class="form-group">
									<label>Submit Changes to edit your profile.</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Update Changes</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="dataprofile.php#password_heading"><div id="password_heading" class="panel-heading" id="details" onclick="show_block('password_form');"><strong>CHANGE PASSWORD</strong></div></a>
					<div class="panel-body" id="password_form" style="display: none;">
						<div class="col-md-6">
							<form role="form" method="post" action="datapassword.php">
							
								<div class="form-group">
									<label>Old Password</label>
									<input class="form-control" name="old_pass"  autofocus="" type="password">
								</div>

								<div class="form-group">
									<label>New password</label>
									<input class="form-control" name="new_pass" type="password">
								</div>
																
								<div class="form-group">
									<label>Confirm new password</label>
									<input class="form-control" name="confirm_new_pass" type="password">
								</div>
								
                            </div>
                            
							<div class="col-md-6">

								<div class="form-group">
									<label>Submit Changes to edit your profile</label>
								</div>
								
								<button type="submit" class="btn btn-primary">Change Password</button>
                                
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
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
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