<?php
require ("../inc/connectDatabase.php");
$data = array();   
$whr = "";
if(isset($_GET['id'])){
  $whr = ' Where id = '.$_GET['id'];
}
$table = $_GET['cat'];
// if(isset($_GET['cat']) && $_GET['cat'] == 'disciplines'){
  $sql = "SELECT * from $table $whr order by id "; 
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data = $row;
      $key++;
    }
  }
// }

 
 
// echo '<pre>'; print_r($data); exit;
$con->close();

?>
