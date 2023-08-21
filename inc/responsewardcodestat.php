<?php
require ("connectDatabase.php");
$data = array();
$whrdate =  "";
$whrdate2 =  "";
$whrdiscipline =  "";
$whrdiscipline2 =  "";

if(isset($_POST['date']) && $_POST['date'] != "") {
  $date = date_format(date_create($_POST['date']),"Y-m-d");  
  $dateto =date_format(date_create($_POST['dateto']),"Y-m-d"); 

  $whrdate =  ' where s.date between "'.$date.'" and "'.$dateto.'" '; 
  $whrdate2 =  ' AND s.date between "'.$date.'" and "'.$dateto.'" '; 
}
// echo $_POST['discipline']; exit;
if(isset($_POST['discipline']) && $_POST['discipline'] != "") {
  if($_POST['discipline'] == 'all'){

    $whrdiscipline =  ' '; 
    $whrdiscipline2 =  ' '; 

  }else if($_POST['discipline'] == 'ptonly'){

    $whrdiscipline2 =  ' AND s.discipline IN ("1") '; 
    $whrdiscipline =  $whrdate != "" ? $whrdiscipline2 : ' where s.discipline IN ("1") '; 

  }else if($_POST['discipline'] == 'ptincludingpttech'){

    $whrdiscipline2 =  ' AND s.discipline IN ("1","4") '; 
    $whrdiscipline =  $whrdate != "" ? $whrdiscipline2 :  ' where s.discipline IN ("1","4") ';

  }else if($_POST['discipline'] == 'pttech'){

    $whrdiscipline2 =  ' AND s.discipline IN ("4") '; 
    $whrdiscipline =  $whrdate != "" ? $whrdiscipline2 :  ' where s.discipline IN ("4")  '; 

  }else if($_POST['discipline'] == 'otonly'){

    $whrdiscipline2 =  ' AND s.discipline IN ("2") '; 
    $whrdiscipline =  $whrdate != "" ? $whrdiscipline2 :  ' where s.discipline IN ("2") '; 

  }else if($_POST['discipline'] == 'otincludingottech'){

    $whrdiscipline2 =  ' AND s.discipline IN ("2", "3") '; 
    $whrdiscipline =  $whrdate != "" ? $whrdiscipline2 :  ' where s.discipline IN ("2", "3") '; 

  }else if($_POST['discipline'] == 'ottech'){

    $whrdiscipline2 =  ' AND s.discipline IN ("3") '; 
    $whrdiscipline =  $whrdate != "" ? $whrdiscipline2 :  ' where s.discipline IN ("3") '; 


  }else if($_POST['discipline'] == 'dietician'){

    $whrdiscipline2 =  ' AND s.discipline IN ("6") '; 
    $whrdiscipline =  $whrdate != "" ? $whrdiscipline2 :  ' where s.discipline IN ("6") '; 

  }
}

$sql = "SELECT nc.name as code, sum( s.ff ) AS f2f, sum( s.nonff ) AS nonf2f, sum( s.unmeet_needs ) as unmeet, sum(s.newpatient) as newpatient 
        FROM stats_new_view s 
        LEFT JOIN nationalcode nc ON nc.id = s.nationalcode
        WHERE s.nationalcode NOT IN ('11','12','13','14','17','16','9','19') $whrdate2 $whrdiscipline2 GROUP BY s.nationalcode";
//  echo $sql; exit;
$data['wardcodestates'] = array();
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['wardcodestates'][] = $row;
    }
}
 

$sql = "SELECT left(nc.name,3) as code, sum( s.ff ) AS f2f, sum( s.nonff ) AS nonf2f, sum( s.unmeet_needs ) as unmeet, sum(s.newpatient) as newpatient FROM stats_new_view s 
LEFT JOIN nationalcode nc ON nc.id = s.nationalcode $whrdate $whrdiscipline
GROUP BY left(nc.name,3)";
  // echo $sql; exit;
  $data['wardcodestates2'] = array();
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['wardcodestates2'][] = $row;
    }
}


$sql = "SELECT discipline, sum(case WHEN weekend = 'Yes' THEN 1 ELSE 0 END ) as weekend FROM stats GROUP BY discipline";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['weekendactivity'][] = $row;
    }
}

$con->close();
// echo '<pre>'; print_r($_POST); exit;

?>
