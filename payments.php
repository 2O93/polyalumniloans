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
			<li><a href="loans.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Loans</a></li>
			<li><a href="summaries.php"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"/></svg> Score Board</a></li>
			<li><a href="emails.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> E-mails</a></li>
			<li><a href="reports.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Reports</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="adminprofile.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Profile Settings</a></li>
			<li  class="active"><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Payment mode</a></li>
		</ul>

	</div><!--/.sidebar-->


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		<div class="row">
			<h1 class="page-header" id="pagetop">Handle payment</h1>

		</div><!--row-->

		<div class="row" id="choose">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="payments.php#choose_heading"><div id="choose_heading" class="panel-heading" onclick="show_block('choose_form');"><strong>Select an application to add payment by choosing a serial number</strong></div></a>
					<div class="panel-body" id="choose_form">
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
	<script src="js/chart-data.js"></script>
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