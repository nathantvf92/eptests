<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://clinics-92d08.firebaseio.com/Patient Record.json?auth=tBTGWM4xOtu8hhLzDo7boGvX0RuOzoggkttyHwI0",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: 17d790a1-1feb-48bf-9075-c4acb1d4eee0",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
#echo '<pre>'; print_r($response); exit;
curl_close($curl);
$data = array();
//$data['medical']['ftof']['physio'] = 0;
//$data['medical']['ftof']['ot'] = 0;
$wards = array();
$dates = array();
$selected_from = "";
$selected_to = "";
$totaldates = array();
if(isset($_POST) && !empty($_POST)){
	$selected_from = $_POST['date'];
	$selected_to = $_POST['dateto'];

	$period = new DatePeriod(
		 new DateTime($selected_from),
		 new DateInterval('P1D'),
		 new DateTime($selected_to)
	);
	foreach ($period as $key => $value) {
	  $totaldates[] = $value->format('d-M-Y');    
	}	 
}

if ($err) {
  echo "cURL Error #:" . $err;  exit;
} else {
	$response = json_decode($response);
	$data['teamactivitylevels']['medical']['physio']['total'] = 0; 
	$data['teamactivitylevels']['medical']['ot']['total'] = 0;  
	$data['teamactivitylevels']['surgical']['physio']['total'] = 0; 
	$data['teamactivitylevels']['surgical']['ot']['total'] = 0;  
	$data['teamactivitylevels']['neuro']['physio']['total'] = 0; 
	$data['teamactivitylevels']['neuro']['ot']['total'] = 0;   
	$data['teamactivitylevels']['orthopaedic']['physio']['total'] = 0; 
	$data['teamactivitylevels']['orthopaedic']['ot']['total'] = 0;  
	$data['teamactivitylevels']['others']['physio']['total'] = 0; 
	$data['teamactivitylevels']['others']['ot']['total'] = 0;   
	$data['totalsumphysio'] = 0; 
	$data['totalsumot'] = 0;  
	$data['wardcodestates']['300']['f2f'] = 0;  
	$data['wardcodestates']['300']['nonf2f'] = 0;  
	$data['wardcodestates']['300']['unmeet'] = 0;  
	$data['wardcodestates']['300']['newpatient'] = 0;  
	
	$data['wardcodestates']['320']['f2f'] = 0;  
	$data['wardcodestates']['320']['nonf2f'] = 0; 
	$data['wardcodestates']['320']['unmeet'] = 0;  
	$data['wardcodestates']['320']['newpatient'] = 0;  
	
	$data['wardcodestates']['340']['f2f'] = 0;  
	$data['wardcodestates']['340']['nonf2f'] = 0;
	$data['wardcodestates']['340']['unmeet'] = 0;  
	$data['wardcodestates']['340']['newpatient'] = 0;  	
	
	$data['wardcodestates']['370']['f2f'] = 0;  
	$data['wardcodestates']['370']['nonf2f'] = 0; 
	$data['wardcodestates']['370']['unmeet'] = 0;  
	$data['wardcodestates']['370']['newpatient'] = 0;  
	
	$data['wardcodestates']['430']['f2f'] = 0;  
	$data['wardcodestates']['430']['nonf2f'] = 0;  
	$data['wardcodestates']['430']['unmeet'] = 0;  
	$data['wardcodestates']['430']['newpatient'] = 0;  
	
	$data['wardcodestates']['100']['f2f'] = 0;  
	$data['wardcodestates']['100']['nonf2f'] = 0;  
	$data['wardcodestates']['100']['unmeet'] = 0;  
	$data['wardcodestates']['100']['newpatient'] = 0;  
	
	$data['wardcodestates']['101']['f2f'] = 0;  
	$data['wardcodestates']['101']['nonf2f'] = 0;  
	$data['wardcodestates']['101']['unmeet'] = 0;  
	$data['wardcodestates']['101']['newpatient'] = 0;  
	
	$data['wardcodestates']['103']['f2f'] = 0;  
	$data['wardcodestates']['103']['nonf2f'] = 0; 
	$data['wardcodestates']['103']['unmeet'] = 0;  
	$data['wardcodestates']['103']['newpatient'] = 0;  
	
	$data['wardcodestates']['104']['f2f'] = 0;  
	$data['wardcodestates']['104']['nonf2f'] = 0;  
	$data['wardcodestates']['104']['unmeet'] = 0;  
	$data['wardcodestates']['104']['newpatient'] = 0;  
	
	$data['wardcodestates']['107']['f2f'] = 0;  
	$data['wardcodestates']['107']['nonf2f'] = 0; 
	$data['wardcodestates']['107']['unmeet'] = 0;  
	$data['wardcodestates']['107']['newpatient'] = 0;  
	
	$data['wardcodestates']['120']['f2f'] = 0;  
	$data['wardcodestates']['120']['nonf2f'] = 0;  
	$data['wardcodestates']['120']['unmeet'] = 0;  
	$data['wardcodestates']['120']['newpatient'] = 0;  
	
	$data['wardcodestates']['190']['f2f'] = 0;  
	$data['wardcodestates']['190']['nonf2f'] = 0;  
	$data['wardcodestates']['190']['unmeet'] = 0;  
	$data['wardcodestates']['190']['newpatient'] = 0;  

	
	$data['wardcodestates']['520']['f2f'] = 0;  
	$data['wardcodestates']['520']['nonf2f'] = 0;  
	$data['wardcodestates']['520']['unmeet'] = 0;  
	$data['wardcodestates']['520']['newpatient'] = 0;  
	
	$data['wardcodestates']['400a']['f2f'] = 0;  
	$data['wardcodestates']['400a']['nonf2f'] = 0;  
	$data['wardcodestates']['400a']['unmeet'] = 0;  
	$data['wardcodestates']['400a']['newpatient'] = 0;  
	
	$data['wardcodestates']['400b']['f2f'] = 0;  
	$data['wardcodestates']['400b']['nonf2f'] = 0;  
	$data['wardcodestates']['400b']['unmeet'] = 0;  
	$data['wardcodestates']['400b']['newpatient'] = 0;  
	
	$data['wardcodestates']['110a']['f2f'] = 0;  
	$data['wardcodestates']['110a']['nonf2f'] = 0;  
	$data['wardcodestates']['110a']['unmeet'] = 0;  
	$data['wardcodestates']['110a']['newpatient'] = 0;  
	
	$data['wardcodestates']['110b']['f2f'] = 0;  
	$data['wardcodestates']['110b']['nonf2f'] = 0; 
	$data['wardcodestates']['110b']['unmeet'] = 0;  
	$data['wardcodestates']['110b']['newpatient'] = 0;   
	
	$data['wardcodestates']['420']['f2f'] = 0;  
	$data['wardcodestates']['420']['nonf2f'] = 0;  
	$data['wardcodestates']['420']['unmeet'] = 0;  
	$data['wardcodestates']['420']['newpatient'] = 0;  
	
	$data['wardcodestates']['171']['f2f'] = 0;  
	$data['wardcodestates']['171']['nonf2f'] = 0; 
	$data['wardcodestates']['171']['unmeet'] = 0;  
	$data['wardcodestates']['171']['newpatient'] = 0;  
	
	$data['wardcodestates']['180']['f2f'] = 0;  
	$data['wardcodestates']['180']['nonf2f'] = 0;  
	$data['wardcodestates']['180']['unmeet'] = 0;  
	$data['wardcodestates']['180']['newpatient'] = 0;   
   #echo '<pre>'; print_r($_POST); exit;
   foreach($response as $k=>$v){ 
	    $code = explode("-",$v->code); 
		#echo '<pre>'; print_r($code[0]); exit;
	    $code = $code[0];  
		
		 if(isset($_POST) && !empty($_POST)){
			 
			 // if($v->date == $_POST['date'] || $v->date == $_POST['dateto']){
			 if(in_array($v->date,$totaldates)){
				if($code == '300'){
					$data['wardcodestates']['300']['f2f'] = $data['wardcodestates']['300']['f2f'] + $v->f2f;
					$data['wardcodestates']['300']['nonf2f'] = $data['wardcodestates']['300']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['300']['unmeet'] = $data['wardcodestates']['300']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['300']['newpatient'] = $data['wardcodestates']['300']['newpatient'] + 1;
					} 
				}
				if($code == '320'){ 
					$data['wardcodestates']['320']['f2f'] = $data['wardcodestates']['320']['f2f'] + $v->f2f;
					$data['wardcodestates']['320']['nonf2f'] = $data['wardcodestates']['320']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['320']['unmeet'] = $data['wardcodestates']['320']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['320']['newpatient'] = $data['wardcodestates']['320']['newpatient'] + 1;
					}
				}
				if($code == '340'){ 
					$data['wardcodestates']['340']['f2f'] = $data['wardcodestates']['340']['f2f'] + $v->f2f;
					$data['wardcodestates']['340']['nonf2f'] = $data['wardcodestates']['340']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['340']['unmeet'] = $data['wardcodestates']['340']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['340']['newpatient'] = $data['wardcodestates']['340']['newpatient'] + 1;
					}
				}
				if($code == '370'){ 
					$data['wardcodestates']['370']['f2f'] = $data['wardcodestates']['370']['f2f'] + $v->f2f;
					$data['wardcodestates']['370']['nonf2f'] = $data['wardcodestates']['370']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['370']['unmeet'] = $data['wardcodestates']['370']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['370']['newpatient'] = $data['wardcodestates']['370']['newpatient'] + 1;
					}
				}
				if($code == '430'){ 
					$data['wardcodestates']['430']['f2f'] = $data['wardcodestates']['430']['f2f'] + $v->f2f;
					$data['wardcodestates']['430']['nonf2f'] = $data['wardcodestates']['430']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['430']['unmeet'] = $data['wardcodestates']['430']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['430']['newpatient'] = $data['wardcodestates']['430']['newpatient'] + 1;
					}
				}
				if($code == '100'){ 
					$data['wardcodestates']['100']['f2f'] = $data['wardcodestates']['100']['f2f'] + $v->f2f;
					$data['wardcodestates']['100']['nonf2f'] = $data['wardcodestates']['100']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['100']['unmeet'] = $data['wardcodestates']['100']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['100']['newpatient'] = $data['wardcodestates']['100']['newpatient'] + 1;
					}
				}
				if($code == '101'){ 
					$data['wardcodestates']['101']['f2f'] = $data['wardcodestates']['101']['f2f'] + $v->f2f;
					$data['wardcodestates']['101']['nonf2f'] = $data['wardcodestates']['101']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['101']['unmeet'] = $data['wardcodestates']['101']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['101']['newpatient'] = $data['wardcodestates']['101']['newpatient'] + 1;
					}
				}
				if($code == '103'){ 
					$data['wardcodestates']['103']['f2f'] = $data['wardcodestates']['103']['f2f'] + $v->f2f;
					$data['wardcodestates']['103']['nonf2f'] = $data['wardcodestates']['103']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['103']['unmeet'] = $data['wardcodestates']['103']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['103']['newpatient'] = $data['wardcodestates']['103']['newpatient'] + 1;
					}
				}
				if($code == '104'){ 
					$data['wardcodestates']['104']['f2f'] = $data['wardcodestates']['104']['f2f'] + $v->f2f;
					$data['wardcodestates']['104']['nonf2f'] = $data['wardcodestates']['104']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['104']['unmeet'] = $data['wardcodestates']['104']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['104']['newpatient'] = $data['wardcodestates']['104']['newpatient'] + 1;
					}
				}
				if($code == '107'){ 
					$data['wardcodestates']['107']['f2f'] = $data['wardcodestates']['107']['f2f'] + $v->f2f;
					$data['wardcodestates']['107']['nonf2f'] = $data['wardcodestates']['107']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['107']['unmeet'] = $data['wardcodestates']['107']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['107']['newpatient'] = $data['wardcodestates']['107']['newpatient'] + 1;
					}
				}
				if($code == '120'){ 
					$data['wardcodestates']['120']['f2f'] = $data['wardcodestates']['120']['f2f'] + $v->f2f;
					$data['wardcodestates']['120']['nonf2f'] = $data['wardcodestates']['120']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['120']['unmeet'] = $data['wardcodestates']['120']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['120']['newpatient'] = $data['wardcodestates']['120']['newpatient'] + 1;
					}
				}
				if($code == '190'){ 
					$data['wardcodestates']['190']['f2f'] = $data['wardcodestates']['190']['f2f'] + $v->f2f;
					$data['wardcodestates']['190']['nonf2f'] = $data['wardcodestates']['190']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['190']['unmeet'] = $data['wardcodestates']['190']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['190']['newpatient'] = $data['wardcodestates']['190']['newpatient'] + 1;
					}
				}
				if($code == '520'){ 
					$data['wardcodestates']['520']['f2f'] = $data['wardcodestates']['520']['f2f'] + $v->f2f;
					$data['wardcodestates']['520']['nonf2f'] = $data['wardcodestates']['520']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['520']['unmeet'] = $data['wardcodestates']['520']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['520']['newpatient'] = $data['wardcodestates']['520']['newpatient'] + 1;
					}
				}
				if($code == '400a'){ 
					$data['wardcodestates']['400a']['f2f'] = $data['wardcodestates']['400a']['f2f'] + $v->f2f;
					$data['wardcodestates']['400a']['nonf2f'] = $data['wardcodestates']['400a']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['400a']['unmeet'] = $data['wardcodestates']['400a']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['400a']['newpatient'] = $data['wardcodestates']['400a']['newpatient'] + 1;
					}
				}
				if($code == '400b'){ 
					$data['wardcodestates']['400b']['f2f'] = $data['wardcodestates']['400b']['f2f'] + $v->f2f;
					$data['wardcodestates']['400b']['nonf2f'] = $data['wardcodestates']['400b']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['400b']['unmeet'] = $data['wardcodestates']['400b']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['400b']['newpatient'] = $data['wardcodestates']['400b']['newpatient'] + 1;
					}
				}
				if($code == '110a'){ 
					$data['wardcodestates']['110a']['f2f'] = $data['wardcodestates']['110a']['f2f'] + $v->f2f;
					$data['wardcodestates']['110a']['nonf2f'] = $data['wardcodestates']['110a']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['110a']['unmeet'] = $data['wardcodestates']['110a']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['110a']['newpatient'] = $data['wardcodestates']['110a']['newpatient'] + 1;
					}
				}
				if($code == '110b'){ 
					$data['wardcodestates']['110b']['f2f'] = $data['wardcodestates']['110b']['f2f'] + $v->f2f;
					$data['wardcodestates']['110b']['nonf2f'] = $data['wardcodestates']['110b']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['110b']['unmeet'] = $data['wardcodestates']['110b']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['110b']['newpatient'] = $data['wardcodestates']['110b']['newpatient'] + 1;
					}
				}
				if($code == '420'){ 
					$data['wardcodestates']['420']['f2f'] = $data['wardcodestates']['420']['f2f'] + $v->f2f;
					$data['wardcodestates']['420']['nonf2f'] = $data['wardcodestates']['420']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['420']['unmeet'] = $data['wardcodestates']['420']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['420']['newpatient'] = $data['wardcodestates']['420']['newpatient'] + 1;
					}
				}
				if($code == '171'){ 
					$data['wardcodestates']['171']['f2f'] = $data['wardcodestates']['171']['f2f'] + $v->f2f;
					$data['wardcodestates']['171']['nonf2f'] = $data['wardcodestates']['171']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['171']['unmeet'] = $data['wardcodestates']['171']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['171']['newpatient'] = $data['wardcodestates']['171']['newpatient'] + 1;
					}
				}
				if($code == '180'){ 
					$data['wardcodestates']['180']['f2f'] = $data['wardcodestates']['180']['f2f'] + $v->f2f;
					$data['wardcodestates']['180']['nonf2f'] = $data['wardcodestates']['180']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['180']['unmeet'] = $data['wardcodestates']['180']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['180']['newpatient'] = $data['wardcodestates']['180']['newpatient'] + 1;
					}
				} 

			 }
		 }else{ 
				if($code == '300'){
					$data['wardcodestates']['300']['f2f'] = $data['wardcodestates']['300']['f2f'] + $v->f2f;
					$data['wardcodestates']['300']['nonf2f'] = $data['wardcodestates']['300']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['300']['unmeet'] = $data['wardcodestates']['300']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['300']['newpatient'] = $data['wardcodestates']['300']['newpatient'] + 1;
					} 
				}
				if($code == '320'){ 
					$data['wardcodestates']['320']['f2f'] = $data['wardcodestates']['320']['f2f'] + $v->f2f;
					$data['wardcodestates']['320']['nonf2f'] = $data['wardcodestates']['320']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['320']['unmeet'] = $data['wardcodestates']['320']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['320']['newpatient'] = $data['wardcodestates']['320']['newpatient'] + 1;
					}
				}
				if($code == '340'){ 
					$data['wardcodestates']['340']['f2f'] = $data['wardcodestates']['340']['f2f'] + $v->f2f;
					$data['wardcodestates']['340']['nonf2f'] = $data['wardcodestates']['340']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['340']['unmeet'] = $data['wardcodestates']['340']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['340']['newpatient'] = $data['wardcodestates']['340']['newpatient'] + 1;
					}
				}
				if($code == '370'){ 
					$data['wardcodestates']['370']['f2f'] = $data['wardcodestates']['370']['f2f'] + $v->f2f;
					$data['wardcodestates']['370']['nonf2f'] = $data['wardcodestates']['370']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['370']['unmeet'] = $data['wardcodestates']['370']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['370']['newpatient'] = $data['wardcodestates']['370']['newpatient'] + 1;
					}
				}
				if($code == '430'){ 
					$data['wardcodestates']['430']['f2f'] = $data['wardcodestates']['430']['f2f'] + $v->f2f;
					$data['wardcodestates']['430']['nonf2f'] = $data['wardcodestates']['430']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['430']['unmeet'] = $data['wardcodestates']['430']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['430']['newpatient'] = $data['wardcodestates']['430']['newpatient'] + 1;
					}
				}
				if($code == '100'){ 
					$data['wardcodestates']['100']['f2f'] = $data['wardcodestates']['100']['f2f'] + $v->f2f;
					$data['wardcodestates']['100']['nonf2f'] = $data['wardcodestates']['100']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['100']['unmeet'] = $data['wardcodestates']['100']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['100']['newpatient'] = $data['wardcodestates']['100']['newpatient'] + 1;
					}
				}
				if($code == '101'){ 
					$data['wardcodestates']['101']['f2f'] = $data['wardcodestates']['101']['f2f'] + $v->f2f;
					$data['wardcodestates']['101']['nonf2f'] = $data['wardcodestates']['101']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['101']['unmeet'] = $data['wardcodestates']['101']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['101']['newpatient'] = $data['wardcodestates']['101']['newpatient'] + 1;
					}
				}
				if($code == '103'){ 
					$data['wardcodestates']['103']['f2f'] = $data['wardcodestates']['103']['f2f'] + $v->f2f;
					$data['wardcodestates']['103']['nonf2f'] = $data['wardcodestates']['103']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['103']['unmeet'] = $data['wardcodestates']['103']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['103']['newpatient'] = $data['wardcodestates']['103']['newpatient'] + 1;
					}
				}
				if($code == '104'){ 
					$data['wardcodestates']['104']['f2f'] = $data['wardcodestates']['104']['f2f'] + $v->f2f;
					$data['wardcodestates']['104']['nonf2f'] = $data['wardcodestates']['104']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['104']['unmeet'] = $data['wardcodestates']['104']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['104']['newpatient'] = $data['wardcodestates']['104']['newpatient'] + 1;
					}
				}
				if($code == '107'){ 
					$data['wardcodestates']['107']['f2f'] = $data['wardcodestates']['107']['f2f'] + $v->f2f;
					$data['wardcodestates']['107']['nonf2f'] = $data['wardcodestates']['107']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['107']['unmeet'] = $data['wardcodestates']['107']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['107']['newpatient'] = $data['wardcodestates']['107']['newpatient'] + 1;
					}
				}
				if($code == '120'){ 
					$data['wardcodestates']['120']['f2f'] = $data['wardcodestates']['120']['f2f'] + $v->f2f;
					$data['wardcodestates']['120']['nonf2f'] = $data['wardcodestates']['120']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['120']['unmeet'] = $data['wardcodestates']['120']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['120']['newpatient'] = $data['wardcodestates']['120']['newpatient'] + 1;
					}
				}
				if($code == '190'){ 
					$data['wardcodestates']['190']['f2f'] = $data['wardcodestates']['190']['f2f'] + $v->f2f;
					$data['wardcodestates']['190']['nonf2f'] = $data['wardcodestates']['190']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['190']['unmeet'] = $data['wardcodestates']['190']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['190']['newpatient'] = $data['wardcodestates']['190']['newpatient'] + 1;
					}
				}
				if($code == '520'){ 
					$data['wardcodestates']['520']['f2f'] = $data['wardcodestates']['520']['f2f'] + $v->f2f;
					$data['wardcodestates']['520']['nonf2f'] = $data['wardcodestates']['520']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['520']['unmeet'] = $data['wardcodestates']['520']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['520']['newpatient'] = $data['wardcodestates']['520']['newpatient'] + 1;
					}
				}
				if($code == '400a'){ 
					$data['wardcodestates']['400a']['f2f'] = $data['wardcodestates']['400a']['f2f'] + $v->f2f;
					$data['wardcodestates']['400a']['nonf2f'] = $data['wardcodestates']['400a']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['400a']['unmeet'] = $data['wardcodestates']['400a']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['400a']['newpatient'] = $data['wardcodestates']['400a']['newpatient'] + 1;
					}
				}
				if($code == '400b'){ 
					$data['wardcodestates']['400b']['f2f'] = $data['wardcodestates']['400b']['f2f'] + $v->f2f;
					$data['wardcodestates']['400b']['nonf2f'] = $data['wardcodestates']['400b']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['400b']['unmeet'] = $data['wardcodestates']['400b']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['400b']['newpatient'] = $data['wardcodestates']['400b']['newpatient'] + 1;
					}
				}
				if($code == '110a'){ 
					$data['wardcodestates']['110a']['f2f'] = $data['wardcodestates']['110a']['f2f'] + $v->f2f;
					$data['wardcodestates']['110a']['nonf2f'] = $data['wardcodestates']['110a']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['110a']['unmeet'] = $data['wardcodestates']['110a']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['110a']['newpatient'] = $data['wardcodestates']['110a']['newpatient'] + 1;
					}
				}
				if($code == '110b'){ 
					$data['wardcodestates']['110b']['f2f'] = $data['wardcodestates']['110b']['f2f'] + $v->f2f;
					$data['wardcodestates']['110b']['nonf2f'] = $data['wardcodestates']['110b']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['110b']['unmeet'] = $data['wardcodestates']['110b']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['110b']['newpatient'] = $data['wardcodestates']['110b']['newpatient'] + 1;
					}
				}
				if($code == '420'){ 
					$data['wardcodestates']['420']['f2f'] = $data['wardcodestates']['420']['f2f'] + $v->f2f;
					$data['wardcodestates']['420']['nonf2f'] = $data['wardcodestates']['420']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['420']['unmeet'] = $data['wardcodestates']['420']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['420']['newpatient'] = $data['wardcodestates']['420']['newpatient'] + 1;
					}
				}
				if($code == '171'){ 
					$data['wardcodestates']['171']['f2f'] = $data['wardcodestates']['171']['f2f'] + $v->f2f;
					$data['wardcodestates']['171']['nonf2f'] = $data['wardcodestates']['171']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['171']['unmeet'] = $data['wardcodestates']['171']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['171']['newpatient'] = $data['wardcodestates']['171']['newpatient'] + 1;
					}
				}
				if($code == '180'){ 
					$data['wardcodestates']['180']['f2f'] = $data['wardcodestates']['180']['f2f'] + $v->f2f;
					$data['wardcodestates']['180']['nonf2f'] = $data['wardcodestates']['180']['nonf2f'] + $v->nonF2F;
					$data['wardcodestates']['180']['unmeet'] = $data['wardcodestates']['180']['unmeet'] + $v->unmeet_Need;
					if($v->new_patient == "Y"){
						$data['wardcodestates']['180']['newpatient'] = $data['wardcodestates']['180']['newpatient'] + 1;
					}
				} 
			}
		
		 if(isset($_POST) && !empty($_POST)){
			 // if($v->date == $_POST['date'] || $v->date == $_POST['dateto']){
			if(in_array($v->date,$totaldates)){
				if(in_array($code,array('300','320','340','370','430'))){
					if($v->discipline == "Physio"){
						$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
						$data['teamactivitylevels']['medical']['physio']['total'] = $data['teamactivitylevels']['medical']['physio']['total'] + $v->f2f + $v->nonF2F;
					}
					if($v->discipline == "OT"){
						$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
					   $data['teamactivitylevels']['medical']['ot']['total'] = $data['teamactivitylevels']['medical']['ot']['total'] + $v->f2f + $v->nonF2F;
					}
				}
				
				if(in_array($code,array('100','101','103','104','107','120','190','520'))){
					if($v->discipline == "Physio"){
						$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
						$data['teamactivitylevels']['surgical']['physio']['total'] = $data['teamactivitylevels']['surgical']['physio']['total'] + $v->f2f + $v->nonF2F;
					}
					if($v->discipline == "OT"){
						$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
					   $data['teamactivitylevels']['surgical']['ot']['total'] = $data['teamactivitylevels']['surgical']['ot']['total'] + $v->f2f + $v->nonF2F;
					}
				}
				
				if(in_array($code,array('400a','400b'))){
					if($v->discipline == "Physio"){
						$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
						$data['teamactivitylevels']['neuro']['physio']['total'] = $data['teamactivitylevels']['neuro']['physio']['total'] + $v->f2f + $v->nonF2F;
					}
					if($v->discipline == "OT"){
						$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
					   $data['teamactivitylevels']['neuro']['ot']['total'] = $data['teamactivitylevels']['neuro']['ot']['total'] + $v->f2f + $v->nonF2F;
					}
				}
				
				if(in_array($code,array('110a','110b'))){
					if($v->discipline == "Physio"){
						$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
						$data['teamactivitylevels']['orthopaedic']['physio']['total'] = $data['teamactivitylevels']['orthopaedic']['physio']['total'] + $v->f2f + $v->nonF2F;
					}
					if($v->discipline == "OT"){
						$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
					   $data['teamactivitylevels']['orthopaedic']['ot']['total'] = $data['teamactivitylevels']['orthopaedic']['ot']['total'] + $v->f2f + $v->nonF2F;
					}
				}
				
				if(in_array($code,array('420','171','180'))){
					if($v->discipline == "Physio"){
						$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
						$data['teamactivitylevels']['others']['physio']['total'] = $data['teamactivitylevels']['others']['physio']['total'] + $v->f2f + $v->nonF2F;
					}
					if($v->discipline == "OT"){
						$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
					   $data['teamactivitylevels']['others']['ot']['total'] = $data['teamactivitylevels']['others']['ot']['total'] + $v->f2f + $v->nonF2F;
					}
				}
			 }
		 }else{
			if(in_array($code,array('300','320','340','370','430'))){
				if($v->discipline == "Physio"){
					$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
					$data['teamactivitylevels']['medical']['physio']['total'] = $data['teamactivitylevels']['medical']['physio']['total'] + $v->f2f + $v->nonF2F;
				}
				if($v->discipline == "OT"){
					$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
				   $data['teamactivitylevels']['medical']['ot']['total'] = $data['teamactivitylevels']['medical']['ot']['total'] + $v->f2f + $v->nonF2F;
				}
			}
			
			if(in_array($code,array('100','101','103','104','107','120','190','520'))){
				if($v->discipline == "Physio"){
					$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
					$data['teamactivitylevels']['surgical']['physio']['total'] = $data['teamactivitylevels']['surgical']['physio']['total'] + $v->f2f + $v->nonF2F;
				}
				if($v->discipline == "OT"){
					$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
				   $data['teamactivitylevels']['surgical']['ot']['total'] = $data['teamactivitylevels']['surgical']['ot']['total'] + $v->f2f + $v->nonF2F;
				}
			}
			
			if(in_array($code,array('400a','400b'))){
				if($v->discipline == "Physio"){
					$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
					$data['teamactivitylevels']['neuro']['physio']['total'] = $data['teamactivitylevels']['neuro']['physio']['total'] + $v->f2f + $v->nonF2F;
				}
				if($v->discipline == "OT"){
					$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
				   $data['teamactivitylevels']['neuro']['ot']['total'] = $data['teamactivitylevels']['neuro']['ot']['total'] + $v->f2f + $v->nonF2F;
				}
			}
			
			if(in_array($code,array('110a','110b'))){
				if($v->discipline == "Physio"){
					$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
					$data['teamactivitylevels']['orthopaedic']['physio']['total'] = $data['teamactivitylevels']['orthopaedic']['physio']['total'] + $v->f2f + $v->nonF2F;
				}
				if($v->discipline == "OT"){
					$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
				   $data['teamactivitylevels']['orthopaedic']['ot']['total'] = $data['teamactivitylevels']['orthopaedic']['ot']['total'] + $v->f2f + $v->nonF2F;
				}
			}
			
			if(in_array($code,array('420','171','180'))){
				if($v->discipline == "Physio"){
					$data['totalsumphysio'] = $data['totalsumphysio'] + $v->f2f + $v->nonF2F;
					$data['teamactivitylevels']['others']['physio']['total'] = $data['teamactivitylevels']['others']['physio']['total'] + $v->f2f + $v->nonF2F;
				}
				if($v->discipline == "OT"){
					$data['totalsumot'] = $data['totalsumot'] + $v->f2f + $v->nonF2F;
				   $data['teamactivitylevels']['others']['ot']['total'] = $data['teamactivitylevels']['others']['ot']['total'] + $v->f2f + $v->nonF2F;
				}
			}
		 } 
		 
	   if(!in_array($v->ward,$wards)){
			$wards[] = $v->ward;
	   }
	   
	   if(!in_array($v->date,$dates)){
			$dates[] = $v->date;
	   }
	   
   }
  # echo '<pre>'; print_r($dates); exit;
   
   foreach($wards as $wk=>$wv){
	   $data['wardcodetotal'][$wv]['f2f'] = 0;
	   $data['actvitybyward'][$wv]['physio']['f2f'] = 0;
	   $data['actvitybyward'][$wv]['physio']['nonf2f'] = 0;
	   $data['actvitybyward'][$wv]['ot']['f2f'] = 0;
	   $data['actvitybyward'][$wv]['ot']['nonf2f'] = 0;
	   
	   foreach($response as $k=>$v){
		   if(isset($_POST) && !empty($_POST)){
			    // if($v->date == $_POST['date'] || $v->date == $_POST['dateto']){
			    if(in_array($v->date,$totaldates)){
				   if($wv == $v->ward){
						$data['wardcodetotal'][$wv]['f2f'] = $data['wardcodetotal'][$wv]['f2f'] + $v->f2f;
					   
					   if($v->discipline == "Physio"){
						   $data['actvitybyward'][$wv]['physio']['f2f'] = $data['actvitybyward'][$wv]['physio']['f2f'] + $v->f2f;
						   $data['actvitybyward'][$wv]['physio']['nonf2f'] = $data['actvitybyward'][$wv]['physio']['nonf2f'] + $v->nonF2F;
							
					   }
					   if($v->discipline == "OT"){
						   $data['actvitybyward'][$wv]['ot']['f2f'] = $data['actvitybyward'][$wv]['ot']['f2f'] + $v->f2f;
						   $data['actvitybyward'][$wv]['ot']['nonf2f'] = $data['actvitybyward'][$wv]['ot']['nonf2f'] + $v->nonF2F;
					   }
					   
				   }
				}  
		   }else{
			   if($wv == $v->ward){
					$data['wardcodetotal'][$wv]['f2f'] = $data['wardcodetotal'][$wv]['f2f'] + $v->f2f;
				   
				   if($v->discipline == "Physio"){
					   $data['actvitybyward'][$wv]['physio']['f2f'] = $data['actvitybyward'][$wv]['physio']['f2f'] + $v->f2f;
					   $data['actvitybyward'][$wv]['physio']['nonf2f'] = $data['actvitybyward'][$wv]['physio']['nonf2f'] + $v->nonF2F;
						
				   }
				   if($v->discipline == "OT"){
					   $data['actvitybyward'][$wv]['ot']['f2f'] = $data['actvitybyward'][$wv]['ot']['f2f'] + $v->f2f;
					   $data['actvitybyward'][$wv]['ot']['nonf2f'] = $data['actvitybyward'][$wv]['ot']['nonf2f'] + $v->nonF2F;
				   }
				   
			   }
		   }

	   }
   }
   
   
   
} 
#echo '<pre>'; print_r($data['wardcodestates']); exit;