<?php error_reporting(0);

session_start(); 
if(isset($_SESSION['statsuser']) && $_SESSION['statsuser'] == true){
}else{ 
    header('Location: '.'login.php');
}



require_once("statsdata.php"); 
require_once("inc/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
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
			<!-- <div class="col-sm-3 col-md-2 sidebar">
				<?php 
				if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == '1'){
                
				    include_once("widgets/sidebar.php");
				} 
				?> -->
			</div>
        <div class="col-sm-12 main">
			<div class="row">
				<div class="col-md-3 p-0">
					<h1 class="page-header">WARD STATS </h1>
				</div>  
			</div>
			<div class="row">
				<div class="col-md-12 p-0">
					<div class="panel panel-table">
						<!-- <div class="panel-heading">
							<div class="row">
								<div class="col-md-3">
								<form class="form-inline table-inline-filter"> 
										 
										<div class="form-group" id="data_tables_buttons">
											
										</div>
									</form>
								</div> 
							</div>
							
						</div> -->
						<div class="panel-body p-0">
						<?php if(isset($_GET['id']) || isset($_GET['stats'])) { ?>
							<form action="<?php echo URL; ?>allstats.php?stats=add" method="POST" id="form-stats">
							
								<input type="hidden" name="idget" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];  }?>">
								<div class="row top-form">
								    <div class="col-md-12 p-xs-0">
										<div class="form-group">
											<label for="email" style="color: #0073c7; font-size: medium;">SIGN IN</label>
 										</div>
									</div>
									<div class="col-md-4 col-xs-4 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Clinician Initial</label> -->
												<input type="text" placeholder="Clinician Initial" class="form-control" id="clinicians_initials" name="clinicians_initials" value="<?php 
												if(isset($_SESSION['stats_form_data']['clinicians_initials'])){ echo $_SESSION['stats_form_data']['clinicians_initials'];  }
												if(isset($info['clinicians_initials'])){ echo $info['clinicians_initials'];  }?>" required>
										</div>
									</div>

									<div class="col-md-4 col-xs-8 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Date</label> -->
												<input type="text" placeholder="Date" class="form-control date-picker valid" id="mdate" name="date" value="<?php if(isset($info['date'])){ echo $info['date'];  }?>" autocomplete="off" required>
										</div>
									</div>
									
									<div class="col-md-4 col-xs-4 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Discipline</label> -->
											<select class="form-control minimal" id="discipline" name="discipline" required placeholder="Discipline?">
												<option value="" selected="selected" disabled class="hide-option">Discipline? 
													<svg viewBox='0 0 140 140' width='24' height='24' xmlns='http://www.w3.org/2000/svg'><g>
														<path d='m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z' fill='white'/></g>
													</svg>
												</option>
												<?php foreach ($data['disciplines'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" 
													<?php 
													if(isset($_SESSION['stats_form_data']['discipline']) && $_SESSION['stats_form_data']['discipline'] == $v['id'] ){ echo "selected"; }
													if(isset($info['discipline']) && $info['discipline'] == $v['id'] ){ echo "selected"; } 
													?> ><?php echo $v['name']; 
													?>
													</option> 
												<?php }?> 
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-4 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Band</label> -->
											<select class="form-control" id="band" name="band" required placeholder="Band?">
												<!-- <option value="0">--Please Select--</option> -->
												<option value="" selected="selected" disabled class="hide-option">Band?</option>
												<?php foreach ($data['bands'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" <?php 
													if(isset($_SESSION['stats_form_data']['band']) && $_SESSION['stats_form_data']['band'] == $v['id'] ){ echo "selected"; }
													if(isset($info['band']) && $info['band'] == $v['id'] ){ echo "selected"; } 
													?> ><?php echo $v['name']; ?></option> 
												<?php }?> 
											</select>
										</div>
									</div>
									
									<div class="col-md-4 col-xs-4 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Team</label> -->
											<select class="form-control" id="team" name="team" required placeholder="Team?">
												<!-- <option value="0">--Please Select--</option> -->
												<option value="" selected="selected" disabled class="hide-option">Team?</option>
												<?php foreach ($data['teams'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" <?php 
													if(isset($_SESSION['stats_form_data']['team']) && $_SESSION['stats_form_data']['team'] == $v['id'] ){ echo "selected"; }
													if(isset($info['team']) && $info['team'] == $v['id'] ){ echo "selected"; } 
													?> ><?php echo $v['name']; ?></option> 
												<?php }?> 
											</select>
										</div>
									</div>
								</div>
														
								<div class="row body-form-submit">
								    <div class="col-md-12 p-xs-0">
										<div class="form-group">
											<label for="email" style="color: #0073c7; font-size: medium;">PATIENT DETAILS</label>
 										</div>
									</div>
								    <div class="col-md-4 col-xs-6 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Ward</label> -->
											<select class="form-control" id="ward" name="ward" required>
												<option value="" selected="selected" disabled class="hide-option">Ward?</option>
												<?php foreach ($data['wards'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" <?php 
													if(isset($_SESSION['stats_form_data']['ward']) && $_SESSION['stats_form_data']['ward'] == $v['id'] ){ echo "selected"; }
													if(isset($info['ward']) && $info['ward'] == $v['id'] ){ echo "selected"; } 
													?> ><?php echo $v['name']; ?></option> 
												<?php }?> 
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6 p-xs-0" >
										<div class="form-group">
											<!-- <label for="email">Main Speciality</label> -->
											<select class="form-control nationalcode" id="national-code" name="nationalcode">
												<option class="hide-option" value="" selected="selected" disabled hidden>Main Speciality?</option>

												<?php foreach ($data['nationalcodes'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" <?php 
													if(isset($_SESSION['stats_form_data']['nationalcode']) && $_SESSION['stats_form_data']['nationalcode'] == $v['id'] ){ echo "selected"; }
													if(isset($info['nationalcode']) && $info['nationalcode'] == $v['id'] ){ echo "selected"; } 
													?> ><?php echo $v['name']; ?></option> 
												<?php }?> 
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6 p-xs-0" id="new-patient">
										<div class="form-group form-checkbox"> 
												<input type="checkbox" id="newpatient" name="newpatient" value="<?php if(isset($info['newpatient'])){ echo $info['newpatient'];  }else{ echo "0";}?>" <?php if(isset($info['newpatient']) && $info['newpatient'] == '1'){ echo 'checked';  } ?> >
												<label for="newpatient">New Patient</label>
										</div>
									</div>
									<div class="col-md-2 col-xs-6 p-xs-0 hide" id="responsetimediv">
										<div class="form-group">
											<!-- <label for="email">Response</label> -->
											<select class="form-control " id="response" name="response">
												<!-- <option value="0">--Please Select--</option> -->
												<option class="hide-option" value="" selected="selected" disabled hidden>Response?</option>
												<?php foreach ($data['responsetime'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" <?php if(isset($info['response']) && $info['response'] == $v['id'] ){ echo "selected"; } ?> ><?php echo $v['name']; ?></option> 
												<?php }?> 
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6 p-xs-0" id="unmeet-needs">
										<div class="form-group form-checkbox"> 
												<input type="checkbox" id="unmeet_needs" name="unmeet_needs" value="<?php if(isset($info['unmeet_needs'])){ echo $info['unmeet_needs'];  }else{ echo "0";}?>" <?php if(isset($info['unmeet_needs']) && $info['unmeet_needs'] == '1'){ echo 'checked';  } ?>>
												<label for="unmeet_needs">Unmet Need</label>
										</div>
									</div>

									

									<div class="col-md-4 col-xs-6 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">F:F units of 10 mins inc notes</label> -->
											<input placeholder="F:F units of 10 mins inc notes" type="number" class="form-control" id="ff" name="ff" value="<?php if(isset($info['ff'])){ echo $info['ff'];  }?>">
										</div>
									</div>
									<div class="col-md-4 col-xs-6 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Non F:F units of 10 mins</label> -->
											<input placeholder="Non F:F units of 10 mins" type="number" class="form-control" id="nonff" name="nonff" value="<?php if(isset($info['nonff'])){ echo $info['nonff'];  }?>">
										</div>
									</div>
									<div class="col-md-4 col-xs-6 p-xs-0" >
										<div class="form-group form-checkbox"> 
												<input type="checkbox" id="direct_contacts" name="direct_contacts" value="<?php if(isset($info['direct_contacts'])){ echo $info['direct_contacts'];  }else{ echo "0";}?>" <?php if(isset($info['direct_contacts']) && $info['direct_contacts'] == '1'){ echo 'checked';  } ?>>
												<label for="direct_contacts">Direct Contacts</label>
										</div>
									</div>
									<div class="col-md-4 col-xs-6 p-xs-0 hide" id="direct-contacts">
										<div class="form-group">
											<select class="form-control" id="dc_id" name="dc_id">
												<option class="hide-option" value="" selected="selected" disabled hidden>Direct Contact?</option>
												<?php foreach ($data['directcontacts'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" <?php if(isset($info['dc_id']) && $info['dc_id'] == $v['id'] ){ echo "selected"; } ?> ><?php echo $v['name']; ?></option> 
												<?php }?> 
											</select>
										</div>
									</div>
								</div>		
								
								 

								<div class="row bottom-form"> 
								    <div class="col-md-12 p-xs-0">
										<div class="form-group">
											<label for="email" style="color: #0073c7; font-size: medium;">DISCHARGE & OUTCOMES ( where applicable ) </label>
 										</div>
									</div>
									<div class="col-md-4 col-xs-6 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Period of Therapy</label> -->
											<select class="form-control" id="periodeoftherapy" name="periodeoftherapy">
												<!-- <option value="0">--Please Select--</option> -->
												<option class="hide-option" value="" selected="selected" disabled hidden>Period of Therapy?</option>
												<?php foreach ($data['periodoftherapy'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" <?php if(isset($info['periodeoftherapy']) && $info['periodeoftherapy'] == $v['id'] ){ echo "selected"; } ?> ><?php echo $v['name']; ?></option> 
												<?php }?> 
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6 p-xs-0">
										<div class="form-group">
											<!-- <label for="email">Discharge DISCHARGE $ OUTCOMESOutcome</label> -->
											<select class="form-control" id="discharge_outcomes" name="discharge_outcomes">
												<!-- <option value="0">--Please Select--</option> -->
												<option class="hide-option" value="" selected="selected" disabled hidden>Discharge Outcome?</option>
												<?php foreach ($data['dischargeoutcomes'] as $k => $v) { ?>
													<option value="<?php echo $v['id']; ?>" <?php if(isset($info['discharge_outcomes']) && $info['discharge_outcomes'] == $v['id'] ){ echo "selected"; } ?> ><?php echo $v['name']; ?></option> 
												<?php }?> 
											</select>
										</div>
									</div>
									
								</div>

								
							<div class="row">		
								<div class="col-md-12">
										<div class="form-group btn-submit-form">
										    <!--<button type="button" id="reset-form" name="editentry" class="btn btn-warning pull-right btn-submit-form mr-3">Clear</button>-->
										    <button type="button" id="reset-form" name="editentry" class="btn btn-warning pull-right btn-submit-form mr-3">Sign out</button>
											<button type="submit" name="editentry" class="btn btn-success pull-right btn-submit-form">Submit </button>
										</div>
									</div>
								</div>
							</div>
								 
							</form>
						<?php }else{ ?>
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Date</th> 
									<th>Username</th> 
									<th>Band</th>
									<th>Team</th>
									<th>Discipline</th>
									<th>Ward</th>
									<th>Code</th>
									<th>F:F</th>
									<th>Non F:F</th>
									<th>Unmeet Need</th>
									<th>New Patient</th>
									<th>Direct Contact</th>
									<th>Actions</th> 
								</tr>
							</thead>
							<tbody>
							<?php   
									foreach($data['list']  as $k=>$v){  ?>
							  <tr>
								<td><?php echo $v['date']; ?></td>
								<td><?php echo $v['username']; ?></td>
								<td><?php echo $v['band']; ?></td>
								<td><?php echo $v['team']; ?></td> 
								<td><?php echo $v['discipline']; ?></td> 
								<td><?php echo $v['ward']; ?></td> 
								<td><?php echo $v['nationalcode']; ?></td> 
								<td><?php echo $v['ff']; ?></td> 
								<td><?php echo $v['nonff']; ?></td> 
								<td><?php echo $v['unmeet_needs'] == "1" ? "Yes" : "No" ; ?></td> 
								<td><?php echo $v['newpatient'] == "1" ? "Yes" : "No" ; ?></td> 
								<td><?php echo $v['direct_contacts'] == "1" ? "Yes" : "No" ;?></td> 
								<td>
									<button type="button" onClick="deleteEntry(<?php echo $v['id']; ?>);" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
									<!-- <button type="button" onClick="editEntry(<?php echo $v['id']; ?>);" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button> -->
									<a href="<?php echo URL; ?>allstats.php?id=<?php echo $v['id'];?>" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>

								</td>
							  </tr>
							<?php }  ?>  

							
							</tbody> 
						</table>
							<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
								<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
							</div>
								<ul class="pagination">
									<?php if($page_no > 1){
										echo "<li><a href='?page_no=1'>First Page</a></li>";
									} ?>
									 
									<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
									<a <?php if($page_no > 1){
										echo "href='?page_no=$previous_page'";
									} ?>>Previous</a>
									</li>
											
									<li <?php if($page_no >= $total_no_of_pages){
										echo "class='disabled'";
									} ?>>
									<a <?php if($page_no < $total_no_of_pages) {
										echo "href='?page_no=$next_page'";
									} ?>>Next</a>
									</li>
									
									<?php if($page_no < $total_no_of_pages){
										echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
									} ?>

								</ul>
						<?php } ?>
 
						</div>
					</div>	
				</div>
			</div> 
        </div>
      </div>
    </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="opacity: 0;" id="launchmodal" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Stats</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?php echo  $datainserted; ?>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="logoutButtonClicked();">Logout</button> -->
        <button type="button" class="btn btn-primary "  data-dismiss="modal" aria-label="Close" >OK</button>
		
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
function deleteEntry(id){
 	var r = confirm("Are You sure You want to delete this Stats???");
  if (r == true) {
    $.ajax({
			url: "<?php echo URL; ?>listing/delete.php",
			type: "POST",
		  data: {id : id,cat:'stats_new'},
			cache: false,
			success: function(response){
				 console.log(response);
				 setTimeout(() => {
					 location.reload();
					 
				 }, 500);
			}
		});
  } 
}

function editEntry(id){
}
    function logoutButtonClicked() {
       window.location.replace("<?php echo URL; ?>login.php"); 
    }
     function addMoreStatsClicked() {
       window.location.replace("<?php echo URL; ?>allstats.php?stats=add"); 
    }
   
$(document).ready(function() {
	
	<?php if($datainserted != ""){ ?>
	     $('#launchmodal').trigger('click');
	<?php } ?>    
    
    
	$("#newpatient").change(function() {
		if(this.checked) {
			$('#responsetimediv').removeClass('hide');
			$('#responsetimediv').removeClass('col-xs-6');
			$('#responsetimediv').addClass('col-xs-4');

			$('#new-patient').removeClass('col-xs-6');
			$('#new-patient').addClass('col-xs-4');
			$('#new-patient').removeClass('col-md-4');
			$('#new-patient').addClass('col-md-2');

			$('#unmeet-needs').removeClass('col-xs-6');
			$('#unmeet-needs').addClass('col-xs-4');
		$("#newpatient").val(1);
		}else{
			$('#responsetimediv').addClass('hide');

			$('#responsetimediv').removeClass('col-xs-4');
			$('#responsetimediv').addClass('col-xs-6');

			$('#new-patient').removeClass('col-xs-4');
			$('#new-patient').addClass('col-xs-6');
			$('#new-patient').removeClass('col-md-2');
			$('#new-patient').addClass('col-md-4');

			$('#unmeet-needs').removeClass('col-xs-4');
			$('#unmeet-needs').addClass('col-xs-6');
			$("#newpatient").val(0);
		}
	});
	$("#unmeet_needs").change(function() {
		if(this.checked) { 
		$("#unmeet_needs").val(1);
		}else{ 
		$("#unmeet_needs").val(0);
			}
	});
	$("#direct_contacts").change(function() {
		if(this.checked) { 
			$('#direct-contacts').removeClass('hide');
		$("#direct_contacts").val(1);
		}else{ 
			$('#direct-contacts').addClass('hide');
		$("#direct_contacts").val(0);
			}
	});

  	var table = $('#example').DataTable({
		"searching": true,
		"lengthChange": false,
		"order":  [],
		"scrollX": true,
		"pageLength": 100,
		"paging": true,
		"bInfo": false,
		"columnDefs": [
		{ "orderable": false, "targets": 0 }
			]
	}); 
	
//  	var buttons = new $.fn.dataTable.Buttons(table, {
// 	buttons: [
// 					{
// 							extend:    'excelHtml5',
// 							text:      '<i class="fa fa-file-excel-o"></i>',
// 							titleAttr: 'Excel'
// 					},
// 					{
// 							extend:    'csvHtml5',
// 							text:      '<i class="fa fa-file-text-o"></i>',
// 							titleAttr: 'CSV'
// 					},
// 					{
// 							extend:    'pdfHtml5',
// 							text:      '<i class="fa fa-file-pdf-o"></i>',
// 							titleAttr: 'PDF'
// 					}
//        ]
// }).container().appendTo($('#data_tables_buttons')); 

	$('.date-picker').datepicker({
	    "setDate": new Date(),
		format: 'dd-mm-yyyy'
	}); 
    
    $('#mdate').datepicker('setDate', 'now');

    $('#reset-form').click(function() {
        <?php unset($_SESSION['stats_form_data']); ?>
		document.getElementById("form-stats").reset();
		$('#clinicians_initials').val('');
		$('#discipline').val('');
		$('#band').val('');
		$('#team').val('');
		$('#ward').val('');
		$('#national-code').val('');
//         $('#newpatient').prop('checked', false);;
// 		$('#response').val('');
// 		$('#unmeet_needs').prop('checked', false);;
// 		$('#ff').val('');
// 		$('#nonff').val('');
// 		$('#direct_contacts').prop('checked', false);;
// 		$('#dc_id').val('');
// 		$('#periodeoftherapy').val('');
// 		$('#discharge_outcomes').val('');
		$('#mdate').datepicker('setDate', 'now');
	})

});
</script>
</body>
</html>