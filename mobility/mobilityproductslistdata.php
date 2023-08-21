<?php
require ("mobilityconnectDatabase.php");
$data = array();
$sql = "SELECT * from productcategory";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {

    $sql2 = "SELECT * from products where idproduct=".$row['id']." and deleted = 1 order by name";
    $result2 = $con->query($sql2);

    $products = [];
    $key2 = 0;
    while($row2 = $result2->fetch_assoc()) {
      $products[$key2] = $row2; 
      $key2++;
    }
    // print_r($products); exit;
    $data[$key] = $row;
    $data[$key]['products'] = $products;
    $key++;
  }
}
$newdate = array(
  'status'=>true,
  'statusCode'=>200,
  'data'=>$data,

);
echo json_encode($newdate);