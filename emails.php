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
			<li><a href="summaries.php"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"/></svg> Score Board</a></li>
			<li class="active"><a href="#"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> E-mails</a></li>
			<li><a href="reports.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Reports</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="adminprofile.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Profile Settings</a></li>
		</ul>

	</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop">E-mail a beneficiary</h1>
			</div>
	</div>

	<div class="row" id="adduser">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="emails.php#email_heading"><div id="email_heading" class="panel-heading" onclick="show_block('email_form');"><strong>Send an e-mail</strong></div></a>
					<div class="panel-body" id="email_form">
						<div class="col-md-12">
							<form role="form" method="post" action="sendmail.php">
							
								<div class="form-group">
									<label>Beneficiary:</label>
									<select class="form-control" name="email">
										<option value="" selected>Choose beneficiary</option>
										<?php 
											$mail = "SELECT p.`serial_no`, p.`firstname`, p.`surname`, p.`email` FROM apps_personal p";
											$run=mysqli_query($db,$mail);
											while($row=mysqli_fetch_array($run)){  
                								$serial_no = $row['serial_no'];
                								$firstname = $row['firstname'];
                								$surname = $row['surname'];
                								$email = $row['email'];
            
												echo <<<EOF
												<option value="$email">$serial_no  $firstname  $surname E-mail: $email </option>
                  
EOF;
              								}
										?>
									</select>
								</div>
																
								<div class="form-group">
									<label>Subject</label>
									<input class="form-control" name="subject" placeholder="E-mail Subject">
								</div>

                                <div class="form-group">
									<label>E-mail text</label>
									<textarea class="form-control" name="message" rows="5" placeholder="Type your message here."></textarea>
								</div>

                                <button type="submit" class="btn btn-primary">Send E-mail</button>
								
                            </div>
                            
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->


</div><!-- /.Main-->

	<footer class="container-fluid text-center">
  		<a href="emails.php#pagetop" title="To Top">
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