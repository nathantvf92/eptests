<?php
require ("orthopaedicconnectDatabase.php");
$data = array(); 
$whr = ' WHERE products.deleted = 1';

if(isset($_GET['id'])){
  $whr = ' AND products.id = '.$_GET['id'];
}

if(isset($_POST['idget'])){
  $id = $_POST['idget'];
  $name = $_POST['name']; 

  $sql = "UPDATE products SET  name = '$name' WHERE id = $id "; 
  $result = $con->query($sql);
}

if(isset($_POST['idadd']) && $_POST['idadd'] == 'add'){ 
  $idproduct = $_POST['idproduct']; 
  $name = $_POST['name']; 

  $sql = "INSERT INTO products( name, idproduct) VALUES ('$name', $idproduct)  "; 
  $result = $con->query($sql);
}


$sql = "SELECT products.*, productcategory.name as categoryname from products 
        LEFT JOIN productcategory ON productcategory.id = products.idproduct $whr order by productcategory.id, products.name"; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data[$key] = $row;
    $key++;
  }
}

if(isset($_GET['id'])){
  $data = $data[0];
}

// echo '<pre>'; print_r($data); exit;
$con->close();

?>
