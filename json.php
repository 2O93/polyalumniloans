<?php
 include ('includes/datahead.php');

$result = $db->query("SELECT p.`serial_no`, p.`firstname`, p.`surname`, p.`gender`, p.`email`, d.`name` AS origin FROM apps_personal p, district d WHERE p.`district`=d.`district_id`");
$json = array();
$json = $result->fetch_all(MYSQLI_ASSOC);

//echo json_encode($json);

$file = fopen("tables/j1.json","w+");
echo fwrite($file,json_encode($json));
fclose($file);

 ?>