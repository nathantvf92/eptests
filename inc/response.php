<?php
require ("connectDatabase.php");
$data = array(); 
 
$whrdate =  "";
if(isset($_POST['date']) && $_POST['date'] != "") {   
  $ddate = date_format(date_create($_POST['date']),"Y-m-d");  
  $ddateto = date_format(date_create($_POST['dateto']),"Y-m-d");   
  $whrdate =  ' AND s.date between "'.$ddate.'" and "'.$ddateto.'" '; 
}


$sql = "SELECT w.name as ward, sum( s.nonff ) as nonf2f, sum( s.ff ) AS f2f FROM stats_new_view s
        LEFT JOIN wards w ON s.ward = w.id 
        WHERE s.discipline = '1' and s.ward != '' $whrdate  GROUP BY s.ward "; 
// echo $sql; exit;
$data['physiobyward'] = array();
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['physiobyward'][] = $row;
    }
}

$data['physiototal'] = array();
// $sql = "SELECT sum( nonf2f ) as nonf2f, sum( f2f ) AS f2f FROM stats WHERE discipline = 'physio' and ward != ''  and ward != '7' $where ";
$sql = "SELECT sum( nonff ) as nonf2f, sum( ff ) AS f2f FROM stats_new_view s WHERE discipline = '1' and ward != ''  $whrdate  ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['physiototal'] = $row;
    }
}

$data['otbyward'] = array(); 
$sql = "SELECT w.name as ward, sum( s.nonff ) as nonf2f, sum( s.ff ) AS f2f FROM stats_new_view s 
        LEFT JOIN wards w ON s.ward = w.id 
        WHERE s.discipline = '2' and s.ward != '' $whrdate  GROUP BY s.ward";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['otbyward'][] = $row;
    }
}


$data['otbywardtotal'] = array();
$sql = "SELECT sum( nonff ) as nonf2f, sum( ff ) AS f2f FROM stats_new_view s WHERE discipline = '2' and ward != '' $whrdate  ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['otbywardtotal'] = $row;
    }
}
 
$data['techbyward'] = array();
$sql = "SELECT w.name as ward, sum( s.nonff ) as nonf2f, sum( ff ) AS f2f FROM stats_new_view s 
        LEFT JOIN wards w ON s.ward = w.id 
        WHERE s.discipline = '3' and ward != '' $whrdate  GROUP BY ward";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['techbyward'][] = $row;
    }
}
 
$data['techbywardtotal'] = array();
$sql = "SELECT sum( nonff ) as nonf2f, sum( ff ) AS f2f FROM stats_new_view s WHERE discipline = '3' $whrdate  ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['techbywardtotal'] = $row;
    }
}


$data['dieticianbyward'] = array();
$sql = "SELECT w.name as ward, sum( s.nonff ) as nonf2f, sum( ff ) AS f2f FROM stats_new_view s 
        LEFT JOIN wards w ON s.ward = w.id 
        WHERE s.discipline = '6' and ward != '' $whrdate  GROUP BY ward";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['dieticianbyward'][] = $row;
    }
}
 
$data['dieticianbywardtotal'] = array();
$sql = "SELECT sum( nonff ) as nonf2f, sum( ff ) AS f2f FROM stats_new_view s WHERE discipline = '6' $whrdate  ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['dieticianbywardtotal'] = $row;
    }
}

$con->close();
// echo '<pre>'; print_r($data); exit;

?>
