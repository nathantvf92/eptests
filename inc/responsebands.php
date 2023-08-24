<?php
require("connectDatabase.php");
$data = array();
$count = 0;
// $sql = "SELECT * FROM stats WHERE	 team != '' and team !='Team...' and team= '$selectedteam' GROUP BY team";
$sql = "SELECT s.* FROM stats_new_view s WHERE	team= '$selectedteam' GROUP BY team";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data['activitybybands'][$count] = $row;
    $team = $row['team'];
    // $sql2 = "SELECT
    //         sum( CASE when team = '$team' and band = '2' THEN f2f ELSE 0 END) as totalsumteamf2fband2,
    //         sum( CASE when team = '$team' and band = '2' THEN nonF2F ELSE 0 END) as totalsumteamnonf2fband2,

    //         sum( CASE when team = '$team' and band = '3' THEN f2f ELSE 0 END) as totalsumteamf2fband3,
    //         sum( CASE when team = '$team' and band = '3' THEN nonF2F ELSE 0 END) as totalsumteamnonf2fband3,

    //         sum( CASE when team = '$team' and band = '4' THEN f2f ELSE 0 END) as totalsumteamf2fband4,
    //         sum( CASE when team = '$team' and band = '4' THEN nonF2F ELSE 0 END) as totalsumteamnonf2fband4,

    //         sum( CASE when team = '$team' and band = '5' THEN f2f ELSE 0 END) as totalsumteamf2fband5,
    //         sum( CASE when team = '$team' and band = '5' THEN nonF2F ELSE 0 END) as totalsumteamnonf2fband5,

    //         sum( CASE when team = '$team' and band = '6' THEN f2f ELSE 0 END) as totalsumteamf2fband6,
    //         sum( CASE when team = '$team' and band = '6' THEN nonF2F ELSE 0 END) as totalsumteamnonf2fband6,

    //         sum( CASE when team = '$team' and band = '7' THEN f2f ELSE 0 END) as totalsumteamf2fband7,
    //         sum( CASE when team = '$team' and band = '7' THEN nonF2F ELSE 0 END) as totalsumteamnonf2fband7
    //         FROM stats";

    $sql2 = "SELECT
              sum( CASE when team = '$team' and band = '2' THEN ff ELSE 0 END) as totalsumteamf2fband2,
              sum( CASE when team = '$team' and band = '2' THEN nonff ELSE 0 END) as totalsumteamnonf2fband2,

              sum( CASE when team = '$team' and band = '3' THEN ff ELSE 0 END) as totalsumteamf2fband3,
              sum( CASE when team = '$team' and band = '3' THEN nonff ELSE 0 END) as totalsumteamnonf2fband3,

              sum( CASE when team = '$team' and band = '4' THEN ff ELSE 0 END) as totalsumteamf2fband4,
              sum( CASE when team = '$team' and band = '4' THEN nonff ELSE 0 END) as totalsumteamnonf2fband4,

              sum( CASE when team = '$team' and band = '5' THEN ff ELSE 0 END) as totalsumteamf2fband5,
              sum( CASE when team = '$team' and band = '5' THEN nonff ELSE 0 END) as totalsumteamnonf2fband5,

              sum( CASE when team = '$team' and band = '6' THEN ff ELSE 0 END) as totalsumteamf2fband6,
              sum( CASE when team = '$team' and band = '6' THEN nonff ELSE 0 END) as totalsumteamnonf2fband6,

              sum( CASE when team = '$team' and band = '7' THEN ff ELSE 0 END) as totalsumteamf2fband7,
              sum( CASE when team = '$team' and band = '7' THEN nonff ELSE 0 END) as totalsumteamnonf2fband7
              FROM stats_new_view";

    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) {
      while ($row2 = $result2->fetch_assoc()) {
        $data['activitybybands'][$count]['teamwise'] = $row2;
      }
    }
    $count++;
  }
}
// echo '<pre>'; print_r($data); exit;
$sql = "SELECT * from teams where status = '1' ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data['teamslist'][] = $row;
  }
}
/*update chart new*/
$sql = "SELECT COUNT(*) total,unmeet_needs from stats_new where isOld=0 GROUP BY unmeet_needs ORDER BY unmeet_needs;";
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

$sql = "SELECT COUNT(*) total, nc.name from stats_new sn
        left join  nationalcode nc on sn.nationalcode = nc.id
        where isOld=0 GROUP BY sn.nationalcode ORDER BY sn.nationalcode;";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data['dataChartSpecialy'][] = $row;
  }
}


$sql = "SELECT * from wards where status = 1";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $idWard = $row['id'];
    $sql2 = "SELECT COUNT(*) total,unmeet_needs from stats_new where ward = '$idWard' and isOld=0 GROUP BY unmeet_needs ORDER BY unmeet_needs;";
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


$sql = "SELECT COUNT(clinicians_initials) as total, clinicians_initials as name 
        FROM `stats_new` 
        WHERE isOld = 0
        GROUP BY clinicians_initials";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data['dataChartStaffActivity'][] = $row;
  }
}
$con->close();
// echo '<pre>'; print_r($data); exit;

?>