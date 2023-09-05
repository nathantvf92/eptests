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

/*update chart new*/

$whr_date_new = "";
if(isset($_POST['date']) && $_POST['date'] != "" && isset($_POST['dateto']) && $_POST['dateto'] != "") {
  $ddate = date_format(date_create($_POST['date']),"Y-m-d");  
  $ddateto = date_format(date_create($_POST['dateto']),"Y-m-d");  
  $whr_date_new = 'and STR_TO_DATE(date, "%d-%m-%Y") between "'.$ddate.'" and "'.$ddateto.'"'; 
}

$data['sortList']=  [
  [
    'id' => 1,
    'name' => 'A-Z'
  ],
  [
    'id' => 2,
    'name' => 'Z-A'
  ],
  [
    'id' => 3,
    'name' => 'Heighest - Lowest'
  ],
  [
    'id' => 4,
    'name' => 'Lowest - Heighest'
  ]
];

$sql = "SELECT * from teams where status = '1' order by id "; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $key=0;
  while($row = $result->fetch_assoc()) {
    $data['teams'][$key] = $row;
    if($row['id'] == $_POST['team']) {
      $data['selectedTeam'] = $row['name'];
    }
    if($row['id'] == $_POST['team_ward']) {
      $data['selectedTeamWard'] = $row['name'];
    }
    if($row['id'] == $_POST['team_staff']) {
      $data['selectedTeamStaff'] = $row['name'];
    }
    $key++;
  }
}

$whr_team = "";
if(isset($_POST['team']) && $_POST['team'] != "") {
  $filter_team = $_POST['team'];
  $whr_team = 'and team='.$filter_team;
}

$sql = "SELECT COUNT(*) total,unmeet_needs from stats_new where isOld=0 $whr_team $whr_date_new GROUP BY unmeet_needs ORDER BY unmeet_needs;";

$result = $con->query($sql);
$data['dateChartUnMeet']['un_meet'] = 0;
$data['dateChartUnMeet']['meet'] = 0;
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) { 
    if ($row['unmeet_needs']) {
      $data['dateChartUnMeet']['un_meet'] = $row['total'];
    } else {
      $data['dateChartUnMeet']['meet'] = $row['total'];
    }
  }
}


$sql = "SELECT COUNT(*) total, nc.name from stats_new s
        left join  nationalcode nc on s.nationalcode = nc.id
        where isOld=0 $whr_date_new GROUP BY s.nationalcode ORDER BY s.nationalcode;";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data['dataChartSpecialy'][] = $row;
  }
}


$sql = "SELECT * from wards where status = 1";
//sort if has
$sort_team_ward = "";
if(isset($_POST['team_ward_sort']) && $_POST['team_ward_sort'] != "") {
  switch($_POST['team_ward_sort']) {
    case 1:
      $sort_team_ward = 'ORDER BY name ASC';
      break;
    case 2:
      $sort_team_ward = 'ORDER BY name DESC';
      break;
    case 3: 
      $sort_team_ward = 'ORDER BY COUNT(*) DESC';
      break;
    case 4:
      $sort_team_ward = 'ORDER BY COUNT(*) ASC';
      break;
    default:
      break;
  }
}
if(!empty($sort_team_ward) && ($_POST['team_ward_sort'] == 1 || $_POST['team_ward_sort'] == 2)) {
  $sql = $sql." ".$sort_team_ward;
}

$result = $con->query($sql);
//filter by team
$whr_team_ward = "";
if(isset($_POST['team_ward']) && $_POST['team_ward'] != "") {
  $filter_team_ward = $_POST['team_ward'];
  $whr_team_ward = 'and team='.$filter_team_ward;
}

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $idWard = $row['id'];
    $sql2 = "SELECT COUNT(*) total,unmeet_needs from stats_new s where ward = '$idWard' and isOld=0 $whr_team_ward $whr_date_new GROUP BY unmeet_needs";
    if(!empty($sort_team_ward) && ($_POST['team_ward_sort'] == 3 || $_POST['team_ward_sort'] == 4)) {
      $sql2 = $sql2." ".$sort_team_ward;
    }
    $result2 = $con->query($sql2);
    $res = [
      'un_meet' => 0,
      'meet' => 0,
    ];
    if ($result2->num_rows > 0) {
      while ($row2 = $result2->fetch_assoc()) {
        if ($row2['unmeet_needs']) {
          $res['un_meet'] = $row2['total'];
        } else {
          $res['meet'] = $row2['total'];
        }
      }
    }
    $data['wardChart'][] = array_merge($row, $res);
  }
}

//filter by team
$whr_team_staff = "";
if(isset($_POST['team_staff']) && $_POST['team_staff'] != "") {
  $filter_team_staff = $_POST['team_staff'];
  $whr_team_staff = 'and team='.$filter_team_staff;
}

//sort if has
$sort_team_staff = "";
if(isset($_POST['team_staff_sort']) && $_POST['team_staff_sort'] != "") {
  switch($_POST['team_staff_sort']) {
    case 1:
      $sort_team_staff = 'ORDER BY clinicians_initials ASC';
      break;
    case 2:
      $sort_team_staff = 'ORDER BY clinicians_initials DESC';
      break;
    case 3: 
      $sort_team_staff = 'ORDER BY COUNT(clinicians_initials) DESC';
      break;
    case 4:
      $sort_team_staff = 'ORDER BY COUNT(clinicians_initials) ASC';
      break;
    default:
      break;
  }
}

$sql = "SELECT COUNT(clinicians_initials) as total, clinicians_initials as name 
        FROM `stats_new` s
        WHERE isOld = 0 $whr_team_staff $whr_date_new
        GROUP BY clinicians_initials";
if (!empty($sort_team_staff)) {
  $sql = $sql." ".$sort_team_staff;
}
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data['dataChartStaffActivity'][] = $row;
  }
}

// echo '<pre>'; print_r($data); exit;
$con->close();

?>
