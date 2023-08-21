<?php
require ("connectDatabase.php");
$whrdate =  "";
if(isset($_POST['date']) && $_POST['date'] != "") {
  
  $ddate = date_format(date_create($_POST['date']),"Y-m-d");  
  $ddateto = date_format(date_create($_POST['dateto']),"Y-m-d");   

  $whrdate =  ' AND s.date between "'.$ddate.'" and "'.$ddateto.'" '; 
}

if(isset($_POST['discipline']) && $_POST['discipline'] != "" && $_POST['discipline'] != "all") {
  if($_POST['discipline'] == 'physiopttech'){
    $whrdate.= " AND s.discipline in ('1', '4')"; 
  }

  if($_POST['discipline'] == 'otottech'){
    $whrdate.= " AND s.discipline in ('2', '3')"; 
  }
}
// print_r($_POST); echo $whrdate; exit;
 
$data = array();  
$count = 0;  
$sql = "SELECT * FROM nationalcode";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['costbymedicalcode'][] = $row;  
      $nc = $row['id']; 
      
      $innersql = "SELECT
                      b.id,
                      b.name,
                      sum( COALESCE(s.ff, 0) ) as ffunits,
                      sum( COALESCE(s.nonff,0) ) as nonffunits,
                      sum( COALESCE(s.ff + s.nonff, 0) )*10 as totalunitsof10,
                      round(sum( COALESCE(s.ff + s.nonff, 0) )*10 / 60, 2) as totaltimeinhours,
                      bp.pay,
                      bp.payoncost,
                      round((sum( COALESCE(s.ff + s.nonff, 0) )*10 / 60)*bp.pay,2)  as costofactivity,
                      round((sum( COALESCE(s.ff + s.nonff, 0) )*10 / 60)*bp.payoncost,2)  as costofactivitypayoncost
                    FROM
                      bands b
                      LEFT JOIN stats_new_view s ON s.band = b.id and s.nationalcode = $nc $whrdate
                      LEFT JOIN bandpay bp ON b.id = bp.idband
                    WHERE b.status = 1
                    GROUP BY
                      b.id 
                    ORDER BY
                      b.id"; 
      $innerres = $con->query($innersql);

      if ($innerres->num_rows > 0) {
        while($innerrow = $innerres->fetch_assoc()) {
          $data['costbymedicalcode'][$count]['bands'][] = $innerrow;
        }
      }
     $count++;
    }
}
// echo '<pre>'; print_r($data['costbymedicalcode']); exit;

$count = 0;  
$sql = "SELECT * FROM servicelines";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data['costbyserviceline'][] = $row;  
      $codes = $row['codes']; 
      
      $innersql = "SELECT
                      b.id,
                      b.name,
                      sum( COALESCE(s.ff, 0) ) as ffunits,
                      sum( COALESCE(s.nonff,0) ) as nonffunits,
                      sum( COALESCE(s.ff + s.nonff, 0) )*10 as totalunitsof10,
                      round(sum( COALESCE(s.ff + s.nonff, 0) )*10 / 60, 2) as totaltimeinhours,
                      bp.pay,
                      bp.payoncost,
                      round((sum( COALESCE(s.ff + s.nonff, 0) )*10 / 60)*bp.pay,2)  as costofactivity,
                      round((sum( COALESCE(s.ff + s.nonff, 0) )*10 / 60)*bp.payoncost,2)  as costofactivitypayoncost
                    FROM
                      bands b
                      LEFT JOIN stats_new_view s ON s.band = b.id and s.nationalcode IN ($codes) $whrdate
                      LEFT JOIN bandpay bp ON b.id = bp.idband
                    WHERE b.status = 1
                    GROUP BY
                      b.id 
                    ORDER BY
                      b.id";  
      $innerres = $con->query($innersql);

      if ($innerres->num_rows > 0) {
        while($innerrow = $innerres->fetch_assoc()) {
          $data['costbyserviceline'][$count]['bands'][] = $innerrow;
        }
      }
     $count++;
    }
} 
$data['overallServiceLine'] = array();

foreach ($data['costbyserviceline'] as $k => $v) {
  $sumArray = array();
  $sumArray[$v['id']] = $v['id'];
  $sumArray['name'] = $v['name'];
  $sumArray['totalunitsof10'] = array_sum(array_column($v['bands'], 'totalunitsof10')); 
  $sumArray['costofactivitypayoncost'] = array_sum(array_column($v['bands'], 'costofactivitypayoncost')); 
  array_push($data['overallServiceLine'],$sumArray);
}

// echo '<pre>'; print_r($data['overallServiceLine']); exit;

$data['overall'] = array();
$count = 0;
$innersql = "SELECT
              n.id,
              n.name, 
              round(SUM(ffunits),2) ffunits,
              round(SUM(nonffunits),2) nonffunits,
              round(SUM(totalunitsof10),2) totalunitsof10,
              SUM(totaltimeinhours) totaltimeinhours,
              (SELECT round(sum(pay),2) from bandpay ) as pay, 
              (SELECT round(sum(payoncost),2) from bandpay ) as payoncost,
              SUM(costofactivity) costofactivity,
              SUM(costofactivitypayoncost) costofactivitypayoncost
            FROM
              bands b
              LEFT JOIN (
              SELECT
                s.nationalcode,
                s.band,
                sum( COALESCE ( s.ff, 0 ) ) AS ffunits,
                sum( COALESCE ( s.nonff, 0 ) ) AS nonffunits,
                sum( COALESCE ( s.ff + s.nonff, 0 ) )* 10 AS totalunitsof10,
                round( sum( COALESCE ( s.ff + s.nonff, 0 ) )* 10 / 60, 2 ) AS totaltimeinhours,
                round(( sum( COALESCE ( s.ff + s.nonff, 0 ) )* 10 / 60 )* bp.pay, 2 ) AS costofactivity,
                round(( sum( COALESCE ( s.ff + s.nonff, 0 ) )* 10 / 60 )* bp.payoncost, 2 ) AS costofactivitypayoncost 
                FROM stats_new_view s
                LEFT JOIN bandpay bp ON s.band = bp.idband 
                WHERE 1=1  $whrdate
                GROUP BY s.nationalcode, s.band
                order by s.nationalcode, s.band
              )  s ON s.band = b.id
              LEFT JOIN nationalcode n ON n.id = s.nationalcode
            WHERE
              b.STATUS = 1  and n.id is not null 
            GROUP BY n.id
            ORDER BY n.id";  
$innerres = $con->query($innersql);

if ($innerres->num_rows > 0) {
  while($innerrow = $innerres->fetch_assoc()) {
    $data['overall'][$count]['name'] = "Overall";
    $data['overall'][$count]['bands'][] = $innerrow;
  }
}


// echo '<pre>'; print_r($data); exit; 
$con->close();

?>
