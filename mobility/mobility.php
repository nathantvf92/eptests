<?php 
session_start(); 
if(isset($_SESSION['statsuser']) && $_SESSION['statsuser'] == true){
}else{ 
    header('Location: '.'login.php');
}

require_once("mobilitydata.php"); 
require_once("../inc/config.php"); ?>
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
				<div class="col-md-3">
					<h1 class="page-header">Mobility </h1>
				</div> 
					<!-- <div class="col-md-9 text-right">
					<form class="form-inline page-inline-filter">
					
						<a type="button" href="<?php //echo URL; ?>/mobility/addproduct.php" class="btn btn-primary"><i class="material-icons">add</i>Add Product</a>
				 
					</form>
				</div> -->
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
								<!-- <div class="col-md-9 text-right">
									<form class="form-inline table-inline-filter" method="POST" action="dailyreport.php">
										<div class="form-group">
											<input type="text" class="form-control date-picker valid" id="date" name="date" value="<?php //if($selected_from != ""){ echo $selected_from;  }?>">
										</div> 
										<div class="form-group">
											<input type="text" class="form-control date-picker valid" id="dateto" name="dateto" value="<?php //if($selected_to != ""){ echo $selected_to;  }?>">
										</div> 
										<div class="form-group">
											<div class="btn-group">
											  <button type="submit" class="btn btn-info">Submit</button> 
											</div>
										</div>
									</form>
									
								</div> -->
							</div>
							
						</div>
						<div class="panel-body p-t-0">
						<?php if(isset($_GET['id'])){ ?>
							<form action="<?php echo URL; ?>/mobility/mobility.php" method="POST">
							
								<input type="hidden" name="idget" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];  }?>">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Clinician Initial</label>
												<input type="text" class="form-control" id="clinicians_initials" name="clinicians_initials" value="<?php if(isset($info['clinicians_initials'])){ echo $info['clinicians_initials'];  }?>">
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Date</label>
												<input type="text" class="form-control date-picker valid" id="network_date" name="network_date" value="<?php if(isset($info['network_date'])){ echo $info['network_date'];  }?>">
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Ward</label>
												  <select class="form-control" id="ward" name="ward">
														<option>--Please Select--</option>
														<?php foreach ($wards as $k => $v) { ?>
															<option value="<?php echo $v['id']; ?>" <?php if(isset($info['ward']) && $info['ward'] == $v['id'] ){ echo "selected"; } ?> ><?php echo $v['name']; ?></option> 
														<?php }?> 
													</select>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Patient Last Name</label>
												<input type="text" class="form-control" id="patient_last_name" name="patient_last_name" value="<?php if(isset($info['patient_last_name'])){ echo $info['patient_last_name'];  }?>">
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Patient Hospital No</label>
												<input type="text" class="form-control" id="patient_hospital_no" name="patient_hospital_no" value="<?php if(isset($info['patient_hospital_no'])){ echo $info['patient_hospital_no'];  }?>">
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Patient Gender</label> 

												<select class="form-control" id="patient_gender" name="patient_gender">
														<option>--Please Select--</option> 
															<option value="male" <?php if(isset($info['patient_gender']) && $info['patient_gender'] == 'male' ){ echo "selected"; } ?> >Male</option> 

															<option value="female" <?php if(isset($info['patient_gender']) && $info['patient_gender'] == 'female' ){ echo "selected"; } ?> >Female</option> 
 
													</select>


										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Product Item</label>
												<select class="form-control" id="product_item" name="product_item">
														<option>--Please Select--</option>
														<?php foreach ($products as $k => $v) { ?>
															<option value="<?php echo $v['id']; ?>" <?php if(isset($info['product_item']) && $info['product_item'] == $v['id'] ){ echo "selected"; } ?> ><?php echo $v['name']; ?></option> 

														<?php }?> 
													</select>
										</div>
									</div>
								
									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Product Puk Code</label>
												<input type="text" class="form-control" id="product_puk_no" name="product_puk_no" value="<?php if(isset($info['product_puk_no'])){ echo $info['product_puk_no'];  }?>">
										</div>
									</div> 

									<div class="col-md-4">
										<div class="form-group">
											<label for="email">Product Amount</label>
												<input type="number" class="form-control" id="product_amount" name="product_amount" value="<?php if(isset($info['product_amount'])){ echo $info['product_amount'];  }?>">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<button type="submit" name="editentry" class="btn btn-success pull-right">Submit</button>
										</div>
									</div>
								</div>
								 
							</form>
						<?php }else{ ?>
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Date</th> 
									<th>Patient Gender</th> 
									<th>Clinician Initials</th>
									<th>Puk Code</th>
									<th>Item</th>
									<th>Last Name</th>
									<th>Ward</th>
									<th>Hospital No.</th>
									<th>Amount</th> 
									<th>Actions</th> 
								</tr>
							</thead>
							<tbody>
							<?php   
									foreach($data  as $k=>$v){  ?>
							  <tr>
								<td><?php echo $v['network_date']; ?></td>
								<td><?php echo ucfirst($v['patient_gender']); ?></td>
								<td><?php echo $v['clinicians_initials']; ?></td>
								<td><?php echo $v['product_puk_no']; ?></td> 
								<td><?php echo $v['productname']; ?></td> 
								<td><?php echo $v['patient_last_name']; ?></td> 
								<td><?php echo $v['wardname']; ?></td> 
								<td><?php echo $v['patient_hospital_no']; ?></td> 
								<td><?php echo $v['product_amount']; ?></td> 
								<td>
								
								<?php if($v['deleted'] == 1){ ?>

									<button type="button" onClick="deleteEntry(<?php echo $v['id']; ?>);" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
									<!-- <button type="button" onClick="editEntry(<?php echo $v['id']; ?>);" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button> -->
									<a href="<?php echo URL; ?>/mobility/mobility.php?id=<?php echo $v['id'];?>" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<?php }else{
									echo "Deleted";
								} ?>	
								</td>
							  </tr>
							<?php }  ?>  

							
							</tbody> 
						</table>

						<?php } ?>
 
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
function deleteEntry(id){
 	var r = confirm("Are You sure You want to delete this Item???");
  if (r == true) {
    $.ajax({
			url: "delete.php",
			type: "POST",
		  data: {id : id},
			cache: false,
			success: function(response){
				//  console.log(response);
				location.reload();
			}
		});
  } 
}

function editEntry(id){
}
$(document).ready(function() {


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
		format: 'dd-mm-yyyy'
	}); 
 

});
</script>
</body>
</html>