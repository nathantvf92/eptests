<?php
require ("../inc/connectDatabase.php");
$data = array();  
$data['disciplines'] = array();  
$data['bands'] = array();  
$data['teams'] = array();  
$data['wards'] = array();  
$data['nationalcode'] = array();  
$data['periodoftherapy'] = array();  
$data['dischargeoutcomes'] = array();  
 

$sql = "SELECT * from disciplines where status = '1' order by id "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['disciplines'][$key] = $row;
    $key++;
  }
}

$sql = "SELECT * from bands where status = '1' order by id "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['bands'][$key] = $row;
    $key++;
  }
}

$sql = "SELECT * from teams where status = '1' order by id "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['teams'][$key] = $row;
    $key++;
  }
}

$sql = "SELECT * from wards where status = '1' order by name "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['wards'][$key] = $row;
    $key++;
  }
}

$sql = "SELECT * from nationalcode where status = '1' order by name "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['nationalcode'][$key] = $row;
    $key++;
  }
}

$sql = "SELECT * from periodoftherapy where status = '1' order by name "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['periodoftherapy'][$key] = $row;
    $key++;
  }
}

$sql = "SELECT * from dischargeoutcomes where status = '1' order by name "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['dischargeoutcomes'][$key] = $row;
    $key++;
  }
}
 
// echo '<pre>'; print_r($data); exit;
$con->close();

?>
