<?php
require ("connectDatabase.php");
$data = array();

// $sql = "SELECT
// 	sum( CASE when direct_Contacts = 'PT-pt' THEN 2 ELSE 0 END) as ptpttotaldirectcontacts,
// 	sum( CASE when direct_Contacts = 'PT-pt' AND new_patient = 'Y' THEN 2 ELSE 0 END) as ptpttotaldirectcontactsnewpatients,
// 	sum( CASE when direct_Contacts = 'PT-pt' AND new_patient = 'N' THEN 2 ELSE 0 END) as ptpttotaldirectcontactsfollowup,

// 	sum( CASE when direct_Contacts = 'PT-ot' THEN 2 ELSE 0 END) as ptottotaldirectcontacts,
// 	sum( CASE when direct_Contacts = 'PT-ot' AND new_patient = 'Y' THEN 2 ELSE 0 END) as ptottotaldirectcontactsnewpatients,
// 	sum( CASE when direct_Contacts = 'PT-ot' AND new_patient = 'N' THEN 2 ELSE 0 END) as ptottotaldirectcontactsfollowup,

// 	sum( CASE when direct_Contacts = 'PT-tech' THEN 2 ELSE 0 END) as pttechtotaldirectcontacts,
// 	sum( CASE when direct_Contacts = 'PT-tech' AND new_patient = 'Y' THEN 2 ELSE 0 END) as pttechtotaldirectcontactsnewpatients,
// 	sum( CASE when direct_Contacts = 'PT-tech' AND new_patient = 'N' THEN 2 ELSE 0 END) as pttechtotaldirectcontactsfollowup,

// 	sum( CASE when direct_Contacts = 'OT-ot' THEN 2 ELSE 0 END) as otottotaldirectcontacts,
// 	sum( CASE when direct_Contacts = 'OT-ot' AND new_patient = 'Y' THEN 2 ELSE 0 END) as otottotaldirectcontactsnewpatients,
// 	sum( CASE when direct_Contacts = 'OT-ot' AND new_patient = 'N' THEN 2 ELSE 0 END) as otottotaldirectcontactsfollowup,

// 	sum( CASE when direct_Contacts = 'OT-tech' THEN 2 ELSE 0 END) as ottechtotaldirectcontacts,
// 	sum( CASE when direct_Contacts = 'OT-tech' AND new_patient = 'Y' THEN 2 ELSE 0 END) as ottechtotaldirectcontactsnewpatients,
// 	sum( CASE when direct_Contacts = 'OT-tech' AND new_patient = 'N' THEN 2 ELSE 0 END) as ottechtotaldirectcontactsfollowup,

// 	sum( CASE when direct_Contacts = 'Pt-single' THEN 1 ELSE 0 END) as ptsingletotaldirectcontacts,
// 	sum( CASE when direct_Contacts = 'Pt-single' AND new_patient = 'Y' THEN 1 ELSE 0 END) as ptsingletotaldirectcontactsnewpatients,
// 	sum( CASE when direct_Contacts = 'Pt-single' AND new_patient = 'N' THEN 1 ELSE 0 END) as ptsingletaldirectcontactsfollowup,


// 	sum( CASE when direct_Contacts = 'Ot-single' THEN 1 ELSE 0 END) as otsingletotaldirectcontacts,
// 	sum( CASE when direct_Contacts = 'Ot-single' AND new_patient = 'Y' THEN 1 ELSE 0 END) as otsingletotaldirectcontactsnewpatients,
// 	sum( CASE when direct_Contacts = 'Ot-single' AND new_patient = 'N' THEN 1 ELSE 0 END) as otsingletaldirectcontactsfollowup,


// 	sum( CASE when direct_Contacts = 'tech-single' OR direct_Contacts = 'Tech-single' THEN 1 ELSE 0 END) as techsingletotaldirectcontacts,
// 	sum( CASE when direct_Contacts = 'tech-single' OR direct_Contacts = 'Tech-single'AND new_patient = 'Y' THEN 1 ELSE 0 END) as techsingletotaldirectcontactsnewpatients,
// 	sum( CASE when direct_Contacts = 'tech-single' OR direct_Contacts = 'Tech-single'AND new_patient = 'N' THEN 1 ELSE 0 END) as techsingletaldirectcontactsfollowup

//   FROM stats";

$whrdate =  "";
if(isset($_POST['date']) && $_POST['date'] != "") {
  
  $ddate = date_format(date_create($_POST['date']),"Y-m-d");  
  $ddateto = date_format(date_create($_POST['dateto']),"Y-m-d");   
  $whrdate =  ' AND s.date between "'.$ddate.'" and "'.$ddateto.'" '; 
}


$sql = "SELECT dot.name, COUNT(s.id) as total FROM stats_new_view s 
				LEFT JOIN dischargeoutcomes dot ON dot.id = s.discharge_outcomes AND dot.status = 1
				WHERE dot.name IS NOT NULL $whrdate
				GROUP BY s.discharge_outcomes";
$result = $con->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['dischargeoutcomes'][]  = $row;
    }
}


$sql = "SELECT pt.name, COUNT(s.id) as total FROM stats_new_view s 
LEFT JOIN periodoftherapy pt ON pt.id = s.periodeoftherapy AND pt.status = 1
WHERE pt.name IS NOT NULL $whrdate
GROUP BY s.discharge_outcomes";
$result = $con->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['periodeoftherapy'][]  = $row;
    }
}
// echo '<pre>'; print_r($data); exit;
$con->close();
// echo '<pre>'; print_r($data); exit;

?>
