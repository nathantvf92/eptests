<?php
require ("mobilityconnectDatabase.php");
$data = array();

$fromdate = $_POST['fromdate']; 
$todate = $_POST['todate']; 
$sql = "SELECT mobility.patient_gender,mobility.network_date, mobility.product_amount, mobility.patient_hospital_no, mobility.patient_last_name as pname, mobility.product_item, products.name as productname 
FROM mobility
LEFT JOIN products ON products.id = mobility.product_item 
WHERE mobility.network_date BETWEEN '$fromdate' and '$todate'
";

$result = $con->query($sql);

if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data[$key] = $row;
    $key++;
  }
}

$con->close();
// echo '<pre>'; print_r($data); exit;

?>
