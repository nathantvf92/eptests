<?php
require ("connectDatabase.php");
$data = array(); 

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}
$whrdate =  "";
if(isset($_POST['date']) && $_POST['date'] != "") {   
  $ddate = date_format(date_create($_POST['date']),"Y-m-d");  
  $ddateto = date_format(date_create($_POST['dateto']),"Y-m-d");   
  $whrdate =  ' AND s.date between "'.$ddate.'" and "'.$ddateto.'" '; 
}

$total_records_per_page = 100;

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$result_count  = "SELECT COUNT(*) As total_records FROM stats_new_view s $whrdate ";
$result = $con->query($result_count);
while($row = $result->fetch_assoc()) {
  $total_records = $row;
}
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

// echo '<pre>'; print_r($total_records); exit;


$sql = "SELECT s.clinicians_initials as username, s.date, s.ff,s.nonff,s.unmeet_needs,s.newpatient, s.direct_contacts, d.name as discipline,b.name as band,t.name as team,w.name as ward,dc.name as directcontact,dot.name as dischargeoutcome,rt.name as responsetime,pt.name as periodoftherapy,nc.name as nationalcode 
FROM stats_new_view s 
LEFT JOIN disciplines d ON d.id = s.discipline AND d.status = 1
LEFT JOIN bands b ON b.id = s.band AND b.status = 1
LEFT JOIN teams t ON t.id = s.team AND t.status = 1
LEFT JOIN wards w ON w.id = s.ward AND w.status = 1
LEFT JOIN directcontacts dc ON dc.id = s.dc_id AND dc.status = 1
LEFT JOIN dischargeoutcomes dot ON dot.id = s.discharge_outcomes AND dot.status = 1
LEFT JOIN responsetime rt ON rt.id = s.response AND rt.status = 1
LEFT JOIN periodoftherapy pt ON pt.id = s.periodeoftherapy AND pt.status = 1
LEFT JOIN nationalcode nc ON nc.id = s.nationalcode AND nc.status = 1 $whrdate
ORDER BY s.id DESC LIMIT $offset, $total_records_per_page ";

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
