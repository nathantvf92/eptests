<?php
require ("orthoconnectDatabase.php");
$body = file_get_contents('php://input');
parse_str($body, $output);
// $object = json_decode($output);

$cols = array();
$vals = array();
$a = false;
foreach ($output as $key => $value) {
   
  $a = true;
  $cols[]= $key;
  $vals[]= "'$value'";
}

$colsstr = implode($cols, ',');
$colsvals = implode($vals, ',');
 
$sql = "INSERT INTO ortho ($colsstr) VALUES ($colsvals)";
$result = $con->query($sql);
$con->close();
if($result > 0 && $a){
  echo json_encode(array('status'=>true,'msg'=>'Success'));
}else{
  echo json_encode(array('status'=>false,'msg'=>'There was a problem while saving the data '));
}
?>
