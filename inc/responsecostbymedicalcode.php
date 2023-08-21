<?php
require ("connectDatabase.php");
$whrdate =  "";
if(isset($_POST['date']) && $_POST['date'] != "") {
  $ddate = date_format(date_create($_POST['date']),"Y-m-d");  
  $ddateto = date_format(date_create($_POST['dateto']),"Y-m-d");   

  $whrdate =  ' where s.date between "'.$ddate.'" and "'.$ddateto.'" '; 
}

$data = array(); 
$count = 0; 
$sql = "SELECT
        nc.id,
        nc.name,
        sum( CASE WHEN s.band = 1 THEN ( (s.ff + s.nonff)*10/60 )* 5 ELSE 0 END ) AS band1,
        sum( CASE WHEN s.band = 2 THEN ( (s.ff + s.nonff)*10/60 )* 10 ELSE 0 END ) AS band2,
        sum( CASE WHEN s.band = 3 THEN ( (s.ff + s.nonff)*10/60 )* 15 ELSE 0 END ) AS band3,
        sum( CASE WHEN s.band = 4 THEN ( (s.ff + s.nonff)*10/60 )* 20 ELSE 0 END ) AS band4,
        sum( CASE WHEN s.band = 5 THEN ( (s.ff + s.nonff)*10/60 )* 25 ELSE 0 END ) AS band5,
        sum( CASE WHEN s.band = 6 THEN ( (s.ff + s.nonff)*10/60 )* 30 ELSE 0 END ) AS band6,
        sum( CASE WHEN s.band = 7 THEN ( (s.ff + s.nonff)*10/60 )* 35 ELSE 0 END ) AS band7,
        sum( CASE WHEN s.band = 8 THEN ( (s.ff + s.nonff)*10/60 )* 40 ELSE 0 END ) AS band8 
      FROM
        nationalcode nc 	
      LEFT JOIN stats_new_view s ON s.nationalcode = nc.id 
      $whrdate
      GROUP BY
    	nc.id 
      ORDER BY nc.id	";
// echo $sql; exit;
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['costbymedicalcode'][] = $row; 
      $count++;
    }
} 

// echo '<pre>'; print_r($data['costbymedicalcode']); exit; 
$con->close();

?>
