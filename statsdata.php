<?php
session_start(); 
require ("inc/connectDatabase.php");
$data = array(); 
 
$products = array();
$wards = array();
$info = array();
$datainserted = "";
if(isset($_GET['id'])){

 

  $sql = "SELECT * from stats_new where isOld = 0 and id=".$_GET['id'];
  $result = $con->query($sql);
  if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
      $info = $row; 
    }
  }
}

if(isset($_POST['idget'])){  
  $id = $_POST['idget'];
  $clinicians_initials = $_POST['clinicians_initials'];
  $date = $_POST['date'];
  $discipline = $_POST['discipline'];
  $band = $_POST['band'];
  $team = $_POST['team'];
  $ward = $_POST['ward'];
  $nationalcode = $_POST['nationalcode'];
  $ff = $_POST['ff'];
  $nonff = $_POST['nonff']; 
  $newpatient = $_POST['newpatient']; 
  $response = $_POST['response']; 
  $unmeet_needs = $_POST['unmeet_needs']; 
  $direct_contacts = $_POST['direct_contacts']; 
  $dc_id = $_POST['dc_id']; 
  $periodeoftherapy = $_POST['periodeoftherapy']; 
  $discharge_outcomes = $_POST['discharge_outcomes']; 
  if($id != ""){

    $sql = "UPDATE stats_new SET 
      clinicians_initials = '$clinicians_initials',
      date= '$date',
      discipline= '$discipline',
      band= '$band',
      team= '$team',
      ward= '$ward',
      nationalcode= '$nationalcode',
      ff= '$ff',
      nonff= '$nonff',
      newpatient= '$newpatient',
      response= '$response',
      unmeet_needs= '$unmeet_needs',
      direct_contacts= '$direct_contacts',
      dc_id= '$dc_id',
      periodeoftherapy= '$periodeoftherapy',
      discharge_outcomes= '$discharge_outcomes'
      WHERE id = $id and isOld = 0 "; 
      
    $datainserted = "Stats Successfully updated";    
  }else{
    $sql = "INSERT INTO stats_new( clinicians_initials, date,discipline,band,team,ward,nationalcode,ff,nonff,newpatient,response,unmeet_needs,direct_contacts,dc_id,periodeoftherapy,discharge_outcomes) VALUES ('$clinicians_initials', '$date','$discipline','$band','$team','$ward','$nationalcode','$ff','$nonff','$newpatient','$response','$unmeet_needs','$direct_contacts','$dc_id','$periodeoftherapy','$discharge_outcomes')  "; 
    $datainserted = "Stats Successfully added";
    
    $_SESSION['stats_form_data'] = [
      'clinicians_initials' => $clinicians_initials,
      'discipline' => $discipline,
      'band' => $band,
      'team' => $team,
      'ward' => $ward,
      'nationalcode' => $nationalcode,
    ];
  }

  $result = $con->query($sql);
}

// if(isset($_POST['idadd']) && $_POST['idadd'] == 'add'){ 
//   $idproduct = '1';//$_POST['idproduct']; 
//   $name = $_POST['name']; 

//   $sql = "INSERT INTO products( name, idproduct) VALUES ('$name', $idproduct)  "; 
//   $result = $con->query($sql);
// }



 


// SELECT s.clinicians_initials as username, s.date, s.ff,s.nonff,s.unmeet_needs,s.newpatient, s.direct_contacts, d.name as discipline,b.name as band,t.name as team,w.name as ward,dc.name as directcontact,dot.name as dischargeoutcome,rt.name as responsetime,pt.name as periodoftherapy,nc.name as nationalcode 
// FROM stats_new s 
// LEFT JOIN disciplines d ON d.id = s.discipline AND d.status = 1
// LEFT JOIN bands b ON b.id = s.band AND b.status = 1
// LEFT JOIN teams t ON t.id = s.team AND t.status = 1
// LEFT JOIN wards w ON w.id = s.ward AND w.status = 1
// LEFT JOIN directcontacts dc ON dc.id = s.dc_id AND dc.status = 1
// LEFT JOIN dischargeoutcomes dot ON dot.id = s.discharge_outcomes AND dot.status = 1
// LEFT JOIN responsetime rt ON rt.id = s.response AND rt.status = 1
// LEFT JOIN periodoftherapy pt ON pt.id = s.periodeoftherapy AND pt.status = 1
// LEFT JOIN nationalcode nc ON nc.id = s.nationalcode AND nc.status = 1
// ORDER BY s.id DESC
if(isset($_GET['id']) || isset($_GET['stats'])) {
  $sql = "SELECT * FROM disciplines where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['disciplines'][$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * FROM bands where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['bands'][$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * FROM teams where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['teams'][$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * FROM wards where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['wards'][$key] = $row;
      $key++;
    }
    usort($data['wards'], "cmp");
  }

  $sql = "SELECT * FROM nationalcode where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['nationalcodes'][$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * FROM responsetime where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['responsetime'][$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * FROM periodoftherapy where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['periodoftherapy'][$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * FROM dischargeoutcomes where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['dischargeoutcomes'][$key] = $row;
      $key++;
    }
  }

  $sql = "SELECT * FROM directcontacts where status=1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $key=0;
    while($row = $result->fetch_assoc()) {
      $data['directcontacts'][$key] = $row;
      $key++;
    }
  }
}

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}
$whrdate =  "";
if(isset($_POST['date']) && $_POST['date'] != "") {
  $whrdate =  ' where s.date between "'.$_POST['date'].'" and "'.$_POST['dateto'].'" and s.isOld=0'; 
}else{
  $whrdate =  ' where s.isOld=0'; 
}
$total_records_per_page = 100;

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$result_count  = "SELECT COUNT(*) As total_records FROM stats_new s $whrdate" ;
$result = $con->query($result_count);
while($row = $result->fetch_assoc()) {
    $total_records = $row; 
}
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

$sql = "SELECT s.id,s.clinicians_initials as username, s.date, s.ff,s.nonff,s.unmeet_needs,s.newpatient, s.direct_contacts, d.name as discipline,b.name as band,t.name as team,w.name as ward,dc.name as directcontact,dot.name as dischargeoutcome,rt.name as responsetime,pt.name as periodoftherapy,nc.name as nationalcode 
FROM stats_new s
LEFT JOIN disciplines d ON d.id = s.discipline AND d.status = 1
LEFT JOIN bands b ON b.id = s.band AND b.status = 1
LEFT JOIN teams t ON t.id = s.team AND t.status = 1
LEFT JOIN wards w ON w.id = s.ward AND w.status = 1
LEFT JOIN directcontacts dc ON dc.id = s.dc_id AND dc.status = 1
LEFT JOIN dischargeoutcomes dot ON dot.id = s.discharge_outcomes AND dot.status = 1
LEFT JOIN responsetime rt ON rt.id = s.response AND rt.status = 1
LEFT JOIN periodoftherapy pt ON pt.id = s.periodeoftherapy AND pt.status = 1
LEFT JOIN nationalcode nc ON nc.id = s.nationalcode AND nc.status = 1  $whrdate
ORDER BY s.id DESC LIMIT $offset, $total_records_per_page ";

$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['list'][$key] = $row;
    $key++;
  }
}

$con->close();
// echo '<pre>'; print_r($_POST); exit;

/* function sort by name */ 
function cmp($a, $b) {
  return strcmp($a['name'], $b['name']);
}

?>
