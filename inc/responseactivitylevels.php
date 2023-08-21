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

$sql = "SELECT s.*, t.name as teamname FROM 
        stats_new_view s
        LEFT JOIN teams t ON t.id = s.team AND t.status = 1 $whrdate
        GROUP BY team";

$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['teamactivitylevels'][$count] = $row;
      $team = $row['team']; 
      $sql2 = "SELECT
       sum( CASE when s.discipline = '1' THEN ff + nonff ELSE 0 END) as totalsumphysio,
       sum( CASE when s.discipline = '1' AND team = '$team' THEN ff + nonff ELSE 0 END) as totalsumphysioteam,
       sum( CASE when s.discipline = '2' THEN ff + nonff ELSE 0 END) as totalsumot,
       sum( CASE when s.discipline = '2' AND team = '$team' THEN ff + nonff ELSE 0 END) as totalsumotteam FROM stats_new_view s $whrdate" ;



       $result2 = $con->query($sql2);
       if ($result2->num_rows > 0) {
         while($row2 = $result2->fetch_assoc()) {
            $data['teamactivitylevels'][$count]['teamwise'] = $row2;
         }

       }
       $count++;
     }
} 
$whrdate2 =  "";
if(isset($_POST['date']) && $_POST['date'] != "") {
  
  $ddate = date_format(date_create($_POST['date']),"Y-m-d");  
  $ddateto = date_format(date_create($_POST['dateto']),"Y-m-d");  

  $whrdate2 =  ' AND s.date between "'.$ddate.'" and "'.$ddateto.'" '; 
}
// echo '<pre>'; print_r($data); exit;
$count = 0; 
$sql = "SELECT s.*, t.name as teamname FROM stats_new_view s
        LEFT JOIN teams t ON t.id = s.team AND t.status = 1
        WHERE s.date >= '2020-9-01' $whrdate2 GROUP BY team";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['teamactivitylevelsNovember2020'][$count] = $row;
      $team = $row['team'];
 
      $sql2 = "SELECT
       sum( CASE when s.discipline = '1' THEN s.ff + s.nonff ELSE 0 END) as totalsumphysio,
       sum( CASE when s.discipline = '1' AND s.team = '$team' THEN s.ff + s.nonff ELSE 0 END) as totalsumphysioteam,
       sum( CASE when s.discipline = '2' THEN s.ff + s.nonff ELSE 0 END) as totalsumot,
       sum( CASE when s.discipline = '2' AND s.team = '$team' THEN s.ff + s.nonff ELSE 0 END) as totalsumotteam,
       sum( CASE when s.discipline = '6' THEN s.ff + s.nonff ELSE 0 END) as totalsumdietician,
       sum( CASE when s.discipline = '6' AND s.team = '$team' THEN s.ff + s.nonff ELSE 0 END) as totalsumdieticianteam FROM stats_new_view  s $whrdate";

       $result2 = $con->query($sql2);
       if ($result2->num_rows > 0) {
         while($row2 = $result2->fetch_assoc()) {
            $data['teamactivitylevelsNovember2020'][$count]['teamwise'] = $row2;
         }
       }
       $count++;
     }
} 

// echo '<pre>'; print_r($data); exit;
$con->close();

?>
