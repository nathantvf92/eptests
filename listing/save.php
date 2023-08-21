<?php
require ("../inc/connectDatabase.php");
$data = array();   
$whr = "";
 

// if(isset($_POST['cat']) && $_POST['cat'] == 'disciplines'){
  $table = $_POST['cat'];
  $name = $_POST['name']; 

  if(isset($_POST['idget']) && $_POST['idget'] != ""){
    $id = $_POST['idget'];
    
    $sql = "UPDATE $table SET  name = '$name' WHERE id = $id "; 
    $result = $con->query($sql);
  
  }else{

    $sql = "INSERT INTO $table (name) VALUES ('$name')  "; 
    $result = $con->query($sql);

  }
// }

 
 
// echo '<pre>'; print_r($data); exit;
$con->close();
header("Location: $table.php");
?>
