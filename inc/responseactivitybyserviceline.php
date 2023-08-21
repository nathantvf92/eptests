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
        sum( CASE when s.nationalcode != '' THEN s.ff + s.nonff ELSE 0 END) as totalsumofserviceline,
        sum( CASE when s.nationalcode IN ('10') THEN s.ff + s.nonff ELSE 0 END) as theatresanaesthatics,
        sum( CASE when s.nationalcode IN ('1','4') THEN s.ff + s.nonff ELSE 0 END) as generalSurgeryGastrology,
        sum( CASE when s.nationalcode IN ('2','3','5','6','7') THEN s.ff + s.nonff ELSE 0 END) as toVascularUrologyBreast,
        sum( CASE when s.nationalcode IN ('8') THEN s.ff + s.nonff ELSE 0 END) as ent,
        sum( CASE when s.nationalcode IN ('12','13','15','20') THEN s.ff + s.nonff ELSE 0 END) as medicine,
        sum( CASE when s.nationalcode IN ('17') THEN s.ff + s.nonff ELSE 0 END) as careforelderly,
        sum( CASE when s.nationalcode IN ('11','19') THEN s.ff + s.nonff ELSE 0 END) as acuteandemergencyservice,
        sum( CASE when s.nationalcode IN ('18') THEN s.ff + s.nonff ELSE 0 END) as womenhealth,
        sum( CASE when s.nationalcode IN ('16','9') THEN s.ff + s.nonff ELSE 0 END) as childrenservices,
        sum( CASE when s.nationalcode IN ('14') THEN s.ff + s.nonff ELSE 0 END) as cancerandpalliative
        FROM stats_new_view s $whrdate";
// echo $sql; exit;
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['activitybyserviceline'] = $row; 
      $count++;
    }
} 

// echo '<pre>'; print_r($data['activitybyserviceline']); exit;
$con->close();

?>
