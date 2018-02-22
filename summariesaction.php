<?php 
    include ('includes/adminhead.php');

    $empty_table_q = "DELETE FROM scores";
    if (mysqli_query ($db, $empty_table_q)){
        ?> <script>
        swal({
        title: 'Old Scores Flushed',
        text: "Press OK to go continue",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      })
      </script>
    <?php
    }else {
        echo "failed to run $empty_table_q  " . mysqli_error($db);
        ?><script>
        swal({
        title: 'Failed to get rid of old scores',
        text: "Something went wrong. Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="summaries.php";
        })
      </script>
    <?php
    }    

    $applicants = "SELECT serial_no FROM apps_personal";
    $year = date('Y');
    $count = 0;

	$run=mysqli_query($db,$applicants);

    while($row=mysqli_fetch_array($run)){
	    $id = $row['serial_no'];
        $adm_year_q = "SELECT apps_admission.`admission_year` FROM apps_admission WHERE apps_admission.`serial_no` = '$id'";
        $study_year_q = "SELECT apps_admission.`year_of_study` FROM apps_admission WHERE apps_admission.`serial_no` = '$id'";
        $registered_q = "SELECT registered_apps.`serial_no` from registered_apps where serial_no = '$id'";
        $gender_q = "SELECT apps_personal.`gender` FROM apps_personal WHERE apps_personal.`serial_no` = '$id'";
        $f_in_q = "SELECT f.`monthly_income`+f.`other_income` AS income FROM apps_father f, apps_personal p WHERE f.`serial_no`=p.`serial_no` AND p.`serial_no` = '$id'";
        $m_in_q = "SELECT m.`monthly_income`+m.`other_income` AS incomem FROM apps_mother m, apps_personal p WHERE m.`serial_no`=p.`serial_no` AND p.`serial_no` = '$id'";
        $sibling_exp_q = "SELECT SUM(s.`annual_fees`)/12 AS sibl FROM apps_siblings s WHERE s.`serial_no`='$id'";
        $depen_exp_q = "SELECT SUM(d.`annual_fees`)/12 AS depen FROM apps_dependants d WHERE d.`serial_no`='$id'";
        $fam_exp_q = "SELECT s.`household_expenditure` FROM apps_social s WHERE s.`serial_no`='$id'";

        $run1=mysqli_query($db,$adm_year_q);
        $row1=mysqli_fetch_array($run1);
        $adyr = $row1['admission_year'];

        $run2=mysqli_query($db,$study_year_q);
        $row2=mysqli_fetch_array($run2);
        $styr = $row2['year_of_study'];
        if ($adyr+$styr != $year){
            $repeat_score = 0;
        }
        else{
            $repeat_score = 1;
        }

        $run3=mysqli_query($db,$registered_q);
        $row3=mysqli_fetch_array($run3);
        if(mysqli_num_rows($run3)>0){
            $registered_score = 0;
        }
        else{
            $registered_score = 1;
        }

        $run4=mysqli_query($db,$gender_q);
        $row4=mysqli_fetch_array($run4);
        $gen = $row4['gender'];
        if($gen == 'F'){
            $gender_score = 1;
        }
        else{
            $gender_score = 0.8;
        }

        $run5=mysqli_query($db,$f_in_q);
        $row5=mysqli_fetch_array($run5);
        $f_in = $row5['income'];

        $run6=mysqli_query($db,$m_in_q);
        $row6=mysqli_fetch_array($run6);
        $m_in = $row6['incomem'];

        $combined_in = $f_in + $m_in;

        $run7=mysqli_query($db,$sibling_exp_q);
        $row7=mysqli_fetch_array($run7);
        $sibling_exp = $row7['sibl'];

        $run8=mysqli_query($db,$depen_exp_q);
        $row8=mysqli_fetch_array($run8);
        $depen_exp = $row8['depen'];

        $run9=mysqli_query($db,$fam_exp_q);
        $row9=mysqli_fetch_array($run9);
        $fam_exp = $row9['household_expenditure'];

        $total_exp = $sibling_exp+$depen_exp+$fam_exp;

        $deficit = $combined_in-$total_exp;

        if($combined_in < 150000.0){
            $income_score = 5;
        } elseif ($combined_in > 150000.01 && $combined_in < 250000.0) {
            $income_score = 4;
        } elseif ($combined_in > 250000.01 && $combined_in < 350000.0) {
            $income_score = 3;
        } elseif ($combined_in > 350000.01 && $combined_in < 450000.0) {
            $income_score = 2;
        } elseif ($combined_in > 450000.01 && $combined_in < 550000.0) {
            $income_score = 1;
        } elseif ($combined_in > 550000.01) {
           $income_score = 0.1;
        } else {
            $income_score = 0;
        }

        if($total_exp < 150000.0){
            $expen_score = 5;
        } elseif ($total_exp > 150000.01 && $total_exp < 250000.0) {
            $expen_score = 4;
        } elseif ($total_exp > 250000.01 && $total_exp < 350000.0) {
            $expen_score = 3;
        } elseif ($total_exp > 350000.01 && $total_exp < 450000.0) {
            $expen_score = 2;
        } elseif ($total_exp > 450000.01 && $total_exp < 550000.0) {
            $expen_score = 1;
        } elseif ($total_exp > 550000.01) {
           $expen_score = 0.1;
        } else {
            $expen_score = 0;
        }

        if ($deficit < 10.0) {
            $credibility_score = 0;
        } elseif ($deficit > 0.0 && $deficit < 20000.0) {
            $credibility_score = 0.3;
        } elseif ($deficit > 20000.01 && $deficit < 40000.0) {
            $credibility_score = 0.45;
        } elseif ($deficit > 40000.01) {
            $credibility_score = 0.6;
        } else {
            $credibility_score = 0.01;
        }

        $total_score = $repeat_score + $registered_score + $gender_score + $income_score + $expen_score + $credibility_score;

        $reassign_q = "INSERT INTO scores(serial_no, total_score, repeat_score, registered_score, gender_score, income_score, expen_score, credibility_score) VALUES('$id', '$total_score', '$repeat_score', '$registered_score', '$gender_score', '$income_score', '$expen_score', '$credibility_score')";
        
        $run10=mysqli_query($db,$reassign_q);

       $count++;
        
    }

    if ($count > 0){
    
    ?> <script>
        swal({
        title: 'Scores reassigned successfully',
        text: "Press OK to go back",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="summaries.php";
        })
      </script>
    <?php   
  }
  else {
    
    ?><script>
        swal({
        title: 'REASSIGNMENT FAILED!',
        text: "Something went wrong. Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="summaries.php";
        })
      </script>
    <?php
  }
    
?>