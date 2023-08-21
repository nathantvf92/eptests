<?php 

require_once("inc/response.php"); 
require_once("inc/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title> NEW | CLINIC</title>
<link rel="icon" href="<?php echo URL; ?>assets/icon/favicon.ico">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" type='text/css' />

<!-- plugins CSS -->
<link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/DataTables/Buttons/css/buttons.dataTables.min.css" type='text/css' />
<link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/DataTables/dist/css/dataTables.bootstrap.min.css" type='text/css' />
<link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" type='text/css' />
<link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/sumoselect/sumoselect.css" type='text/css' />



<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/style.css" type="text/css" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="<?php echo URL; ?>assets/js/html5shiv.min.js"></script>
          <script src="<?php echo URL; ?>assets/js/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<?php include_once("widgets/navbar.php");?>

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<?php include_once("widgets/sidebar.php");?>
			</div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-7">
					<h1 class="page-header">Report</h1>
				</div> 
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-table">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-3">
								<form class="form-inline table-inline-filter"> 
										 
										<div class="form-group" id="data_tables_buttons">
											
										</div>
									</form>
								</div>
								<div class="col-md-9 text-right">
									<form class="form-inline table-inline-filter" method="POST" action="dailyreport.php">
										<div class="form-group">
											<input type="text" class="form-control date-picker valid" id="date" name="date" value="<?php if($selected_from != ""){ echo $selected_from;  }?>">
										</div> 
										<div class="form-group">
											<input type="text" class="form-control date-picker valid" id="dateto" name="dateto" value="<?php if($selected_to != ""){ echo $selected_to;  }?>">
										</div> 
										<div class="form-group">
											<div class="btn-group">
											  <button type="submit" class="btn btn-info">Submit</button> 
											</div>
										</div>
									</form>
									
								</div>
							</div>
							
						</div>
						<div class="panel-body p-t-0">
						
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Date</th> 
									<th>Ward</th> 
									<th>Awaiting Stats from</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							
							//echo '<pre>'; print_r($_POST); exit;
							//$codesarr = array('300','320','340','370','430','100','101','103','104','107','120','190','520','400a','400b','110a','110b','420','171','180' );
							$codesarr = array('Arnold Whitchurch','CCC','CCU','Elizabeth','Godber','Harpur','Howard','Navigation/AAU','Orchard','Pilgrim','Reginald Hart','Richard Wells','Russell','SAU/SWW','Shand','Shuttleworth (Trauma)','Whitbread' );
							$count = 1;  
							$alldates = array();
							$allcodes = array();
							if(isset($_POST) && !empty($_POST) ){
								$period = new DatePeriod(
									 new DateTime($_POST['date']),
									 new DateInterval('P1D'),
									 new DateTime($_POST['dateto'])
								);
							}else{
								$period = new DatePeriod(
									 new DateTime('2019-02-21'),
									 new DateInterval('P1D'),
									 new DateTime(date("Y-m-d"))
								);
							}

							
 
							//echo '<tr>';
							foreach ($period as $key => $value) {
							
								

								foreach($codesarr as $c){
								  #echo  $value->format('d-M-Y');  echo '<br>';
								  $physio = '';
								  $ot = '';
								  $tech = '';
								  $countt = 0; $pdis = true; $odis = true; $tdis = true; 
								  foreach($response as $k=>$v){
									$excode = explode("-",$v->code);  $switch = false; 
									$code = $excode[0];  
									$ward = $excode[1]; 
									//echo $value->format('d-M-Y').'--'.$v->date.'--'.$v->ward.'--'.$c.'--'.$v->discipline; echo '<br>';//exit; 
										if($c == $v->ward && $v->date == $value->format('d-M-Y') && $v->discipline == 'Physio'){
											$switch = true;
											$physio = 'Physio';
										}
										if($c == $v->ward && $v->date == $value->format('d-M-Y') && $v->discipline == 'OT'){
											$switch = true;
											$ot = 'OT';
										}
										if($c == $v->ward && $v->date == $value->format('d-M-Y') && $v->discipline == 'Tech'){
											$switch = true;
											$tech = 'Tech';
										}	
										/* if($switch && $v->discipline == 'Physio'){
											$countt++;
											echo $physio = 'Physio';
											echo '<br>';
											$pdis = false;
										}	
										if($switch && $v->discipline == 'OT'){
											$countt++;
											echo $ot = 'OT';
											echo '<br>';
											$odis = false;
										}	
										if($switch && $v->discipline == 'Tech'){
											$countt++;
											echo $tech = 'Tech';
											echo '<br>';
											$tdis = false;
										}	 */			
								   }
								  // echo "------------------------------------"; echo '<br>';
								   $rowspan=4;
								   if($physio != ''){
									   $rowspan= $rowspan - 1;
								   }
								   if($ot != ''){
									   $rowspan= $rowspan - 1;
								   }
								   if($tech != ''){
									   $rowspan= $rowspan - 1;
								   } 
								   $aa = true;
								   $bb = true;
								   $cc = true;
								   if(/* $switch */ $physio != '' || $ot != '' || $tech != ''  ){ ?> 
									   <tr>
											<td rowspan="<?php echo  $rowspan;?>"><?php echo $value->format('d-M-Y'); ?></td>
											<td rowspan="<?php echo  $rowspan;?>"><?php echo $c; ?></td> 
									   <?php if($physio == '' || $ot == '' || $tech == ''){ ?>	
									   </tr>
									   <?php } ?>
									   
									   <?php if($physio == ''){ $a=false; ?>
									   <tr> 
											<td>Physio</td>
									   </tr>
									   <?php } ?>
									   <?php if($ot == ''){ $b=false; ?>
									   <tr>
											<td>OT</td>
									   </tr>
									   <?php } ?>
									   <?php if($tech == ''){ $c=false; ?>
									   <tr>
											<td>Tech</td>
									   </tr>
									   <?php } ?>
									  <?php if($aa || $bb || $cc){ ?>
										  <td> </td>
										  </tr>
									  <?php } ?>
								   <?php }else{ ?>
									   <tr>
											<td rowspan="<?php echo  $rowspan;?>"><?php echo $value->format('d-M-Y'); ?></td>
											<td rowspan="<?php echo  $rowspan;?>"><?php echo $c; ?></td>  
									   </tr>
									   <tr> 
											<td>Physio</td>
									   </tr>
									   <tr>
											<td>OT</td>
									   </tr> 
									   <tr>
											<td>Tech</td>
									   </tr> 
								   <?php }
								}
							} 
							 
							?>
							<!--</tr> -->
							</tbody> 
						</table>
						</div>
					</div>	
				</div>
			</div> 
        </div>
      </div>
    </div>

<!-- Bootstrap core JavaScript
        ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo URL; ?>assets/js/jquery.min.js"></script> 
<script src="<?php echo URL; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/modernizr.js"></script>

<!-- plugins -->


<script src="<?php echo URL; ?>assets/plugins/DataTables/dist/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/DataTables/Buttons/js/dataTables.buttons.min.js"></script>


<script src="<?php echo URL; ?>assets/plugins/DataTables/jszip/jszip.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/DataTables/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/DataTables/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo URL; ?>assets/plugins/DataTables/Buttons/js/buttons.print.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/DataTables/Buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/DataTables/dist/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo URL; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/sumoselect/jquery.sumoselect.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo URL; ?>assets/plugins/jquery-validate/jquery.validate.min.js"></script>

<!-- custom -->
<script src="<?php echo URL; ?>assets/js/app.js"></script>
<script>
$(document).ready(function() {
	
   /*  var table = $('#example').DataTable({
	"searching": false,
	"lengthChange": false,
	"order":  [],
	"scrollX": true,
	"pageLength": 100,
	"columnDefs": [
    { "orderable": false, "targets": 0 }
		]
	}); */ 
	
/* 	var buttons = new $.fn.dataTable.Buttons(table, {
	buttons: [
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ]
}).container().appendTo($('#data_tables_buttons'));*/

	$('.date-picker').datepicker({
		format: 'dd-mm-yyyy'
	}); 
});
</script>
</body>
</html>