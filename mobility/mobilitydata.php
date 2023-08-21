<?php
require ("mobilityconnectDatabase.php");
 $data = array(); 

// if (isset($_GET['page_no']) && $_GET['page_no']!="") {
//   $page_no = $_GET['page_no'];
// } else {
//   $page_no = 1;
// }
// $total_records_per_page = 100;

// $offset = ($page_no-1) * $total_records_per_page;
// $previous_page = $page_no - 1;
// $next_page = $page_no + 1;
// $adjacents = "2";
// $result_count  = "SELECT COUNT(*) As total_records FROM stats ";
// $result = $con->query($result_count);
// while($row = $result->fetch_assoc()) {
//     $total_records = $row; 
// }
// $total_records = $total_records['total_records'];
// $total_no_of_pages = ceil($total_records / $total_records_per_page);
// $second_last = $total_no_of_pages - 1; 


// total pages minus 1
// echo '<pre>'; print_r($total_records); exit;


// $sql = "SELECT * FROM stats ORDER BY id DESC LIMIT $offset, $total_records_per_page ";

$products = array();
$wards = array();
$info = array();

if(isset($_GET['id'])){

  $sql = "SELECT * from products ";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $products[$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * from wards ";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $wards[$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * from mobility where id=".$_GET['id'];
  $result = $con->query($sql);
  if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
      $info = $row; 
    }
  }

}

if(isset($_POST['idget'])){
  $id = $_POST['idget'];
  $clinicians_initials = $_POST['clinicians_initials'];
  $network_date = $_POST['network_date'];
  $ward = $_POST['ward'];
  $patient_last_name = $_POST['patient_last_name'];
  $patient_hospital_no = $_POST['patient_hospital_no'];
  $patient_gender = $_POST['patient_gender'];
  $product_item = $_POST['product_item'];
  $product_puk_no = $_POST['product_puk_no'];
  $product_amount = $_POST['product_amount']; 
  $product_amount = $_POST['product_amount']; 

  $sql = "UPDATE mobility SET 
    clinicians_initials = '$clinicians_initials',
   network_date= '$network_date',
   ward= '$ward',
   patient_last_name= '$patient_last_name',
   patient_hospital_no= '$patient_hospital_no',
   patient_gender= '$patient_gender',
   product_item= '$product_item',
   product_puk_no= '$product_puk_no',
   product_amount= '$product_amount'
   WHERE id = $id
    ";
    
  $result = $con->query($sql);
}

if(isset($_POST['idadd']) && $_POST['idadd'] == 'add'){ 
  $idproduct = '1';//$_POST['idproduct']; 
  $name = $_POST['name']; 

  $sql = "INSERT INTO products( name, idproduct) VALUES ('$name', $idproduct)  "; 
  $result = $con->query($sql);
}


$sql = "SELECT mobility.*, products.name as productname, wards.name as wardname
FROM mobility
LEFT JOIN products ON products.id = mobility.product_item
LEFT JOIN wards ON wards.id = mobility.ward ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data[$key] = $row;
    $key++;
  }
}

$con->close();
// echo '<pre>'; print_r($_POST); exit;

?>
