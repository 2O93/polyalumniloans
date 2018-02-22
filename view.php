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
			<li class="active"><a href="#"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg> View Applications</a></li>
			<li><a href="edit.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Edit Application</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
		</ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="pagetop">View Applications</h1>
			</div>
	</div>

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="view.php#apps_heading"><div id="apps_heading" class="panel-heading" onclick="show_block('apps_form');"><strong>Applications so far</strong></div></a>
					<div class="panel-body" id="apps_form">

					<?php

						$result = $db->query("SELECT p.`serial_no`, p.`firstname`, p.`surname`, p.`gender`, p.`email`, d.`name` AS origin FROM apps_personal p, district d WHERE p.`district`=d.`district_id`");

						$json = array();
						$json = $result->fetch_all(MYSQLI_ASSOC);

						$file = fopen("tables/dataviewtable.json","w+");
						echo fwrite($file,json_encode($json));
						fclose($file);

 					?>

					<table data-toggle="table" data-url="tables/dataviewtable.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="serial_no" data-sortable="true" >Serial Number </th>
						        <th data-field="firstname" data-sortable="true">First Name </th>
						        <th data-field="surname"  data-sortable="true">Surname </th>
						        <th data-field="gender" data-sortable="true">Gender </th>
						        <th data-field="email" data-sortable="true">E-mail </th>
						        <th data-field="origin" data-sortable="true">District </th>
						    </tr>
						    </thead>
					</table>
						
                	</div>
                </div>
            
            </div><!-- /.col-->
			
			</div><!-- /.row -->

            <div class="row" id="choose">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<a href="edit.php#choose_heading"><div id="choose_heading" class="panel-heading" onclick="show_block('choose_form');"><strong>Select an application to View details</strong></div></a>
					<div class="panel-body" id="choose_form">
						<div class="col-md-6">
							<form role="form" method="get" action="viewloansdata.php?serial_no=$serial_no">
							
								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="serial_no">
										<option value="" selected>Choose Serial Number</option>
										<?php 
											$name = "SELECT serial_no, firstname, surname FROM apps_personal";
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
								
                            </div>
                            
							<div class="col-md-6">
								
								<div class="form-group">
									<label>Proceed to View details</label>
								</div>
								
								<button type="submit" class="btn btn-primary">View Details</button>
                                
							</div>
                        </form>
                        
					</div>
                </div>
            
            </div><!-- /.col-->
            
		</div><!-- /.row -->
    
</div>

	<footer class="container-fluid text-center">
  		<a href="view.php#pagetop" title="To Top">
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