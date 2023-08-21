<?php
require ("connectDatabase.php");
$body = file_get_contents('php://input');
//parse_str($body, $output);
//echo print_r($output); exit;
$object = json_decode($body);

$cols = array();
$vals = array();
$a = false;
foreach ($object as $key => $value) {
   
  $a = true;
  $cols[]= $key;
  $vals[]= "'$value'";
}

$colsstr = implode($cols, ',');
$colsvals = implode($vals, ',');


//echo print_r($colsvals); exit;
$sql = "INSERT INTO stats ($colsstr) VALUES ($colsvals)";
$result = $con->query($sql);
$con->close();
if($result > 0 && $a){
  echo json_encode(array('status'=>true,'msg'=>'Data Successfully Saved'));
}else{
  echo json_encode(array('status'=>false,'msg'=>'There was a problem while saving the data '));
}
?>
