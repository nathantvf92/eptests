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
	
  $whrdate =  ' where s.date between "'.$ddate.'" and "'.$ddateto.'" '; 
}

$sql = "SELECT
	sum( CASE when s.dc_id = '1' THEN 2 ELSE 0 END) as ptpttotaldirectcontacts,
	sum( CASE when s.dc_id = '1' AND newpatient = '1' THEN 2 ELSE 0 END) as ptpttotaldirectcontactsnewpatients,
	sum( CASE when s.dc_id = '1' AND newpatient = '0' THEN 2 ELSE 0 END) as ptpttotaldirectcontactsfollowup,

	sum( CASE when s.dc_id = '2' THEN 2 ELSE 0 END) as ptottotaldirectcontacts,
	sum( CASE when s.dc_id = '2' AND newpatient = '1' THEN 2 ELSE 0 END) as ptottotaldirectcontactsnewpatients,
	sum( CASE when s.dc_id = '2' AND newpatient = '0' THEN 2 ELSE 0 END) as ptottotaldirectcontactsfollowup,

	sum( CASE when s.dc_id = '3' THEN 2 ELSE 0 END) as pttechtotaldirectcontacts,
	sum( CASE when s.dc_id = '3' AND newpatient = '1' THEN 2 ELSE 0 END) as pttechtotaldirectcontactsnewpatients,
	sum( CASE when s.dc_id = '3' AND newpatient = '0' THEN 2 ELSE 0 END) as pttechtotaldirectcontactsfollowup,

	sum( CASE when s.dc_id = '4' THEN 2 ELSE 0 END) as otottotaldirectcontacts,
	sum( CASE when s.dc_id = '4' AND newpatient = '1' THEN 2 ELSE 0 END) as otottotaldirectcontactsnewpatients,
	sum( CASE when s.dc_id = '4' AND newpatient = '0' THEN 2 ELSE 0 END) as otottotaldirectcontactsfollowup,

	sum( CASE when s.dc_id = '5' THEN 2 ELSE 0 END) as ottechtotaldirectcontacts,
	sum( CASE when s.dc_id = '5' AND newpatient = '1' THEN 2 ELSE 0 END) as ottechtotaldirectcontactsnewpatients,
	sum( CASE when s.dc_id = '5' AND newpatient = '0' THEN 2 ELSE 0 END) as ottechtotaldirectcontactsfollowup,

	sum( CASE when s.dc_id = '7' THEN 1 ELSE 0 END) as ptsingletotaldirectcontacts,
	sum( CASE when s.dc_id = '7' AND newpatient = '1' THEN 1 ELSE 0 END) as ptsingletotaldirectcontactsnewpatients,
	sum( CASE when s.dc_id = '7' AND newpatient = '0' THEN 1 ELSE 0 END) as ptsingletaldirectcontactsfollowup,


	sum( CASE when s.dc_id = '8' THEN 1 ELSE 0 END) as otsingletotaldirectcontacts,
	sum( CASE when s.dc_id = '8' AND newpatient = '1' THEN 1 ELSE 0 END) as otsingletotaldirectcontactsnewpatients,
	sum( CASE when s.dc_id = '8' AND newpatient = '0' THEN 1 ELSE 0 END) as otsingletaldirectcontactsfollowup,


	sum( CASE when s.dc_id = '9' THEN 1 ELSE 0 END) as techsingletotaldirectcontacts,
	sum( CASE when s.dc_id = '9' AND newpatient = '1' THEN 1 ELSE 0 END) as techsingletotaldirectcontactsnewpatients,
	sum( CASE when s.dc_id = '9' AND newpatient = '0' THEN 1 ELSE 0 END) as techsingletaldirectcontactsfollowup

  FROM stats_new_view s $whrdate ";
$result = $con->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['directcontacts']  = $row;
    }
}
// echo '<pre>'; print_r($data); exit;
$con->close();
// echo '<pre>'; print_r($data); exit;

?>
