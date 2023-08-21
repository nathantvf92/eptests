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
// $sql = "SELECT * FROM stats WHERE	 team != '' and team !='Team...' GROUP BY team";
$sql = "SELECT s.*,t.name as teamname FROM stats_new_view s
LEFT JOIN teams t ON t.id = s.team AND t.status = 1 $whrdate
GROUP BY s.team";
 
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['teamactivitylevels'][$count] = $row;
      $team = $row['team']; 
      
      $sql2 = "SELECT
      sum( CASE when s.discipline = '1' AND s.newpatient = '1' AND team = '$team' THEN 1 ELSE 0 END) as newpatientsphysio,
      sum( CASE when s.discipline = '2' AND s.newpatient = '1' AND team = '$team' THEN 1 ELSE 0 END) as newpatientsot FROM stats_new_view s $whrdate";
 
      $result2 = $con->query($sql2);
        if ($result2->num_rows > 0) {
           while($row2 = $result2->fetch_assoc()) {
              $data['teamactivitylevels'][$count]['teamwise'] = $row2;
        }

       }
       $count++;
     }
}
// echo '<pre>'; print_r($data); exit;


$where = '';
$date ='';
$dateto = '';
if(isset($_POST['date'])){
  $date = date_format(date_create($_POST['date']),"Y-m-d");  
  $dateto =date_format(date_create($_POST['dateto']),"Y-m-d");   
  $where  = " AND s.date >= '$date' AND s.date <= '$dateto' ";
}
 
$whrdate =  "";
if(isset($_POST['date']) && $_POST['date'] != "") {
  $date = date_format(date_create($_POST['date']),"Y-m-d");  
  $dateto =date_format(date_create($_POST['dateto']),"Y-m-d"); 
  $whrdate =  ' AND s.date between "'.$date.'" and "'.$dateto.'" '; 
}


$sql = "SELECT 
rt.name, sum( CASE when s.newpatient != '0' THEN 1 ELSE 0 END) as totalnewpatient 
FROM stats_new_view s
LEFT JOIN responsetime rt ON rt.id = s.response AND rt.status = 1
WHERE s.response !='0' $whrdate
GROUP BY s.response";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['activitybynewpatient'][] = $row;
    }
}
$data['activitybynewpatientdietician'] = array();
$sql = "SELECT  sum( CASE when s.newpatient != '0' and s.discipline = 6 THEN 1 ELSE 0 END) as totalnewpatientdietician 
FROM stats_new_view s 
WHERE 1=1 $whrdate
";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['activitybynewpatientdietician'][] = $row;
    }
}


$con->close();
// echo '<pre>'; print_r($data); exit;

?>
