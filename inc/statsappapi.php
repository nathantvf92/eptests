<?php
require ("connectDatabase.php");
$data = array();


$sql = "SELECT * from disciplines where status='1' ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    
    $data['disciplines'][$key] = $row; 
    $key++;
  }
}

$sql = "SELECT * from bands where status='1' ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    
    $data['bands'][$key] = $row; 
    $key++;
  }
}

$sql = "SELECT * from teams where status='1' ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    
    $data['teams'][$key] = $row; 
    $key++;
  }
}

$sql = "SELECT * from wards where status='1' order by name ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    
    $data['wards'][$key] = $row; 
    $key++;
  }
}

$sql = "SELECT * from nationalcode where status='1' order by name ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    
    $data['nationalcode'][$key] = $row; 
    $key++;
  }
}

$sql = "SELECT * from periodoftherapy where status='1' order by name ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    
    $data['periodoftherapy'][$key] = $row; 
    $key++;
  }
}

$sql = "SELECT * from dischargeoutcomes where status='1' order by name ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    
    $data['dischargeoutcomes'][$key] = $row; 
    $key++;
  }
}


$newdate = array(
  'status'=>true,
  'statusCode'=>200,
  'data'=>$data,

);
echo json_encode($newdate);