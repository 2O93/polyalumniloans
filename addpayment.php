<?php
include ('includes/adminhead.php');

	$serial_no = $_POST['serial_no'];
	$amount_paid = $_POST['amount_paid'];

  $balanceq = "SELECT outstanding_balance FROM beneficiary WHERE serial_no = '$serial_no'";

  $run=mysqli_query($db,$balanceq);
                      while($row=mysqli_fetch_array($run)){
                        $balance = $row['outstanding_balance'];
                        }

                        $new_balance = $balance-$amount_paid;
  

	$payment = "UPDATE beneficiary SET outstanding_balance = '$new_balance' WHERE serial_no = '$serial_no'";

if (mysqli_query ($db, $payment)){
    
    ?> <script>
        swal({
        title: 'Payment added!!',
        text: "Press OK to go back",
        type: 'success',
        confirmButtonColor: '#1F3A93',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="adminhome.php";
        })
      </script>
    <?php   
  }
  else {
    
    echo "failed to run $payment  " . mysqli_error($db);
    ?><script>
        swal({
        title: 'ADDITION FAILED!',
        text: "Press OK to go back",
        type: 'error',
        confirmButtonColor: '#CF000F',
        confirmButtonText: 'Okay...',
        imageUrl: 'img/logo.png',
        imageWidth: 100,
        imageHeight: 120,
        imageAlt: 'Custom image'
      }).then(function () {
        window.location="payments.php";
        })
      </script>
    <?php
  } 
?>