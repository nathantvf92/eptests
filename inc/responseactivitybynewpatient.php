<?php
require ("connectDatabase.php");
$data = array();
$where = '';
$date ='';
$dateto = '';

if(isset($_POST['date'])){
  $date = date_format(date_create($_POST['date']),"Y-m-d"); 
  $dateto =  date_format(date_create($_POST['dateto']),"Y-m-d");   
  $where  = " AND s.date >= '$date' AND s.date <= '$dateto' ";
}
 
 
$sql = "SELECT 
rt.name, sum( CASE when s.newpatient != '0' THEN 1 ELSE 0 END) as totalnewpatient 
FROM stats_new s
LEFT JOIN responsetime rt ON rt.id = s.response AND rt.status = 1
WHERE s.response !='0' AND s.isOld = 0
GROUP BY s.response";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['activitybynewpatient'][] = $row;
    }
}
 
$con->close();
// echo '<pre>'; print_r($data); exit;

?>
