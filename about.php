<?php
include('includes/guesthead.php');
?>

			<div class="content">

                <h1><strong>About</strong></h1>

                <h3>In 2016, The Polytechnic Students Union managed to raise funds mounting up to MWK 89,000,000.00 through various fund raising activities which included a fundraising dinner. The major reason was to assist needy students in paying tuition fees. The funds raised were to become a revolving fund that was going to be re-invested back to other needy students once the loans are paid back. This was the beginning of The Polytechnic Alumni Loan Board.</h3>

                <div class="links">
                    <a href="#">About</a>
                    <a href="login.php"><strong>Login</a></strong>
                    <a href="register.php"><strong>Register</strong></a>
                </div>
            </div>

            <footer class="container-fluid text-center">
  		<a href="about.php#pagetop" title="To Top">
    		<span class="glyphicon glyphicon-chevron-up"></span>
  		</a>
  		<p>&copy;2017 Chisomo Kalumbe
	</footer>
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
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
</body>

</html>