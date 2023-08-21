<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
 
require ("connectDatabase.php");

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value
## Custom Field value
$limit = " limit ".$row.",".$rowperpage;
if($row == 0 && $rowperpage == -1){
   $limit = "";
}

$searchByDate = "";//$_POST['date'];
$searchByDateto = "";//$_POST['dateto'];

if(isset($_POST['date']) && isset($_POST['dateto']) && $_POST['dateto'] != "" && $_POST['date'] != ""){
  $searchByDate =  date("Y-m-d", strtotime($_POST['date'])); 
  $searchByDateto = date("Y-m-d", strtotime($_POST['dateto']));
}

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (s.clinicians_initials like '%".$searchValue."%' or 
        s.date like '%".$searchValue."%' or 
        s.ff like '%".$searchValue."%' or 
        s.nonff like '%".$searchValue."%' or 
        s.unmeet_needs like '%".$searchValue."%' or 
        s.newpatient like '%".$searchValue."%' or 
        s.direct_contacts like '%".$searchValue."%' or 
        d.name like '%".$searchValue."%' or 
        b.name like '%".$searchValue."%' or 
        t.name like '%".$searchValue."%' or 
        w.name like '%".$searchValue."%' or 
        dc.name like '%".$searchValue."%' or 
        dot.name like '%".$searchValue."%' or 
        rt.name like '%".$searchValue."%' or 
        pt.name like '%".$searchValue."%' or  
        nc.name like'%".$searchValue."%' ) ";
}
if($searchByDate != '' && $searchByDateto != ''){
   $searchQuery .= ' and ( s.date between "'.$searchByDate.'" and "'.$searchByDateto.'" ) ';
}
// if($searchByDateto != ''){
//    $searchQuery .= " and (gender='".$searchByDateto."') ";
// }
## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from stats_new_view");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($con,"select count(*) as allcount FROM stats_new_view s 
LEFT JOIN disciplines d ON d.id = s.discipline AND d.status = 1
LEFT JOIN bands b ON b.id = s.band AND b.status = 1
LEFT JOIN teams t ON t.id = s.team AND t.status = 1
LEFT JOIN wards w ON w.id = s.ward AND w.status = 1
LEFT JOIN directcontacts dc ON dc.id = s.dc_id AND dc.status = 1
LEFT JOIN dischargeoutcomes dot ON dot.id = s.discharge_outcomes AND dot.status = 1
LEFT JOIN responsetime rt ON rt.id = s.response AND rt.status = 1
LEFT JOIN periodoftherapy pt ON pt.id = s.periodeoftherapy AND pt.status = 1
LEFT JOIN nationalcode nc ON nc.id = s.nationalcode AND nc.status = 1 
WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT  s.id,s.clinicians_initials as username, s.date, s.ff,s.nonff,s.unmeet_needs,s.newpatient, s.direct_contacts, d.name as discipline,b.name as band,t.name as team,w.name as ward,dc.name as directcontact,dot.name as dischargeoutcome,rt.name as responsetime,pt.name as periodoftherapy,nc.name as nationalcode 
FROM stats_new_view s 
LEFT JOIN disciplines d ON d.id = s.discipline AND d.status = 1
LEFT JOIN bands b ON b.id = s.band AND b.status = 1
LEFT JOIN teams t ON t.id = s.team AND t.status = 1
LEFT JOIN wards w ON w.id = s.ward AND w.status = 1
LEFT JOIN directcontacts dc ON dc.id = s.dc_id AND dc.status = 1
LEFT JOIN dischargeoutcomes dot ON dot.id = s.discharge_outcomes AND dot.status = 1
LEFT JOIN responsetime rt ON rt.id = s.response AND rt.status = 1
LEFT JOIN periodoftherapy pt ON pt.id = s.periodeoftherapy AND pt.status = 1
LEFT JOIN nationalcode nc ON nc.id = s.nationalcode AND nc.status = 1 
WHERE 1 ".$searchQuery." order by s.id DESC, ".$columnName." ".$columnSortOrder." ".$limit;
// WHERE 1 ".$searchQuery." order by s.id DESC, ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// echo $empQuery; exit;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "date"=>date("d-m-Y", strtotime($row['date'])),
      "username"=>$row['username'],
      "band"=>$row['band'],
      "team"=>$row['team'],
      "discipline"=>$row['discipline'],
      "ward"=>$row['ward'],
      "nationalcode"=>$row['nationalcode'],
      "ff"=>$row['ff'],
      "nonff"=>$row['nonff'],
      "unmeet_needs"=>$row['unmeet_needs'],
      "newpatient"=>$row['newpatient'],
      "direct_contacts"=>$row['direct_contacts']
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);