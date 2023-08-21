<?php
require ("orthopaedicconnectDatabase.php");
$data = array(); 

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}
$total_records_per_page = 100;

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$result_count  = "SELECT COUNT(*) As total_records FROM ortho ";
$result = $con->query($result_count);
while($row = $result->fetch_assoc()) {
    $total_records = $row; 
}
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

// echo '<pre>'; print_r($total_records); exit;


// $sql = "SELECT * FROM stats ORDER BY id DESC LIMIT $offset, $total_records_per_page ";
// $result = $con->query($sql);
// if ($result->num_rows > 0) {
//   $key=0;
//   while($row = $result->fetch_assoc()) {
//     $data[$key] = $row;
//     $key++;
//   }
// }

$sql = "SELECT ortho.*, products.name as productname, wards.name as wardname
FROM ortho
LEFT JOIN products ON products.id = ortho.product_item
LEFT JOIN wards ON wards.id = ortho.ward ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data[$key] = $row;
    $key++;
  }
}

$con->close();
// echo '<pre>'; print_r($data); exit;

?>
