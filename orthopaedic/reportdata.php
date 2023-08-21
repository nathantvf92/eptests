<?php
require ("orthopaedicconnectDatabase.php");
$data = array();

$fromdate = $_POST['fromdate']; 
$todate = $_POST['todate']; 
$sql = "SELECT ortho.product_item, products.name as productname, SUM(ortho.product_amount) as totalIssued
FROM ortho
LEFT JOIN products ON products.id = ortho.product_item 
WHERE ortho.network_date BETWEEN '$fromdate' and '$todate'
GROUP BY ortho.product_item
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
