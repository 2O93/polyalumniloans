<?php
include ('includes/adminhead.php');

echo "
    <form action=\"adminhome.php\">
	    <button type=\"submit\" class=\"btn btn-primary\">Go Back</button>							
    </form>
";

	$report = $_POST['report'];

    if ($report == 'beneficiary'){    
    $filename = 'beneficiaries_'.date('Ymd').'_'.date('His');

	$csv_q = "select p.`firstname`, p.`surname`, a.`reg_number`, pr.`prog_code`, a.`year_of_study`, ben.`loan_grant` from apps_personal p, apps_admission a, apps_loan_app la, beneficiary ben, program pr where p.`serial_no` = a.`serial_no` and p.`serial_no` = la.`serial_no` and la.`serial_no` = a.`serial_no` and p.`serial_no` = ben.`serial_no` and ben.`serial_no` = la.`serial_no` and ben.`serial_no` = a.`serial_no` and pr.`prog_id` = a.`program` 
    into outfile 'C:/xampp/htdocs/dev.polyalumniloans.org/reports/$filename.csv' FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n'";

if (mysqli_query ($db, $csv_q)){
    
    echo " <script>
      swal({
        title: 'Beneficiaries Report produced!!',
        text: \"Press OK to go View it\",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location=\"reports/$filename.csv\";
        })
      </script>";
       
  }
  else {
    
    echo "failed to run $csv_q  " . mysqli_error($db);
    ?><script>
      swal({
        title: 'Report production FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="reports.php";
        })
      </script>
    <?php
  }
} elseif ($report == 'balance') {
    $filename = 'balances_'.date('Ymd').'_'.date('His');

	$balances_q = "select p.`firstname`, p.`surname`, a.`reg_number`, pr.`prog_code`, a.`year_of_study`, ben.`loan_grant`, ben.`outstanding_balance` from apps_personal p, apps_admission a, apps_loan_app la, beneficiary ben, program pr where p.`serial_no` = a.`serial_no` and p.`serial_no` = la.`serial_no` and la.`serial_no` = a.`serial_no` and p.`serial_no` = ben.`serial_no` and ben.`serial_no` = la.`serial_no` and ben.`serial_no` = a.`serial_no` and pr.`prog_id` = a.`program` AND ben.`outstanding_balance` > 0
    into outfile 'C:/xampp/htdocs/dev.polyalumniloans.org/reports/$filename.csv' FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n'";

if (mysqli_query ($db, $balances_q)){
    
    echo " <script>
      swal({
        title: 'Balances Report produced!!',
        text: \"Press OK to View it\",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location=\"reports/$filename.csv\";
        })
      </script>";
       
  }
  else {
    
    echo "failed to run $balances_q  " . mysqli_error($db);
    ?><script>
      swal({
        title: 'Report production FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="reports.php";
        })
      </script>
    <?php
  }
} elseif ($report == 'applicants') {
    $filename = 'applications_'.date('Ymd').'_'.date('His');

	$applications_q = "SELECT p.`serial_no`, p.`firstname`, p.`surname`, a.`reg_number`, pr.`prog_code`, a.`year_of_study`, la.`tuition`, la.`upkeep`, la.`total_loan` FROM apps_personal p, apps_admission a, apps_loan_app la, program pr WHERE p.`serial_no` = a.`serial_no` AND p.`serial_no` = la.`serial_no` AND la.`serial_no` = a.`serial_no` AND pr.`prog_id` = a.`program`
    into outfile 'C:/xampp/htdocs/dev.polyalumniloans.org/reports/$filename.csv' FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n'";

if (mysqli_query ($db, $applications_q)){
    
    echo " <script>
      swal({
        title: 'Applications Report produced!!',
        text: \"Press OK to view it\",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location=\"reports/$filename.csv\";
        })
      </script>";
       
  }
  else {
    
    echo "failed to run $applications_q  " . mysqli_error($db);
    ?><script>
      swal({
        title: 'Report production FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="reports.php";
        })
      </script>
    <?php
  }
} else {
    ?><script>
      swal({
        title: 'Report production FAILED!',
        text: "Invalid report choice. Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="reports.php";
        })
      </script>
    <?php
}
?>