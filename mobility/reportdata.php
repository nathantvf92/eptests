<?php
require ("mobilityconnectDatabase.php");
$data = array();

$fromdate = $_POST['fromdate']; 
$todate = $_POST['todate']; 
$sql = "SELECT mobility.product_item, products.name as productname, SUM(mobility.product_amount) as totalIssued
FROM mobility
LEFT JOIN products ON products.id = mobility.product_item 
WHERE mobility.network_date BETWEEN '$fromdate' and '$todate'
GROUP BY mobility.product_item
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
