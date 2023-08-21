<?php
require ("../inc/connectDatabase.php");
$table = $_POST['cat'];
if($table != "stats_new"){
  $sql = "UPDATE $table set status = 0 WHERE id=".$_POST['id'];
}else{
  $sql = "DELETE FROM $table WHERE id=".$_POST['id'];
}

$result = $con->query($sql);
$con->close();

if($result){
  echo json_encode(array('status'=>true,'msg'=>'Success'));
}else{
  echo json_encode(array('status'=>false,'msg'=>'There was a problem while saving the data '));
}

?>
