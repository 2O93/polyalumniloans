<?php
include ('includes/adminhead.php');

  $email = $_POST['email'];
	$subject1 = $_POST['subject'];
	$message1 = $_POST['message'];

shell_exec("perl perl-test.pl $subject1 $email $message1");

?> <script>
        swal({
        title: 'E-mail Sent!!',
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


?>
