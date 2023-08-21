<?php
require_once("mobilityconnectDatabase.php"); 
require_once("../inc/config.php"); 

// $sql = "DELETE FROM products WHERE id=".$_POST['id'];
$sql = "UPDATE products set deleted = 0 WHERE id=".$_POST['id'];
$result = $con->query($sql);

if($result){
  echo json_encode(array('status'=>true,'msg'=>'Success'));
}else{
  echo json_encode(array('status'=>false,'msg'=>'There was a problem while saving the data '));
}