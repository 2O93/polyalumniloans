<?php   

session_start();
//print_r($_SESSION);

$db = new mysqli("localhost", "root", "", "polyalumniloans");
//$db = new PDO("mysql:host=localhost;dbname=polyalumniloans", 'root', '');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
  
?>