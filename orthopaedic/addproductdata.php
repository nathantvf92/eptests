<?php
require ("orthopaedicconnectDatabase.php");

$productcategory = array();  
 
$sql = "SELECT * from productcategory "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $productcategory[$key] = $row;
    $key++;
  }
}
 

// echo '<pre>'; print_r($productcategory); exit;
$con->close();

?>
