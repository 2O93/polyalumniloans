<?php 
include('includes/logandregisterhead.php');
?>
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
        <center><img src="img/logo.png" alt="logo" style="width:200px;height:250px;">
        <h1><strong>Register</strong></h1></center> 
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Register</strong></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="registration.php">
                        <div class="form-group">
                            <label for="serial_no" class="col-md-4 control-label">Serial Number</label>

                            <div class="col-md-6">
                                <input id="serial_no" type="text" class="form-control" name="serial_no" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" placeholder="Choose a unique Username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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