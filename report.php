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
<title>NEW | CLINIC</title>
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
									<h3 class="panel-title"> List</h3>
								</div>
								<div class="col-md-9 text-right">
									<form class="form-inline table-inline-filter"> 
										 
										<div class="form-group" id="data_tables_buttons">
											
										</div>
									</form>
								</div>
							</div>
							
						</div>
						<div class="panel-body p-t-0">
						
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>S.No</th>
									<th>bay</th>
									<th>bed</th>
									<th>code</th>
									<th>date</th>
									<th>discipline</th>
									<th>f2f</th>
									<th>new_patient</th>
									<th>nonF2F</th>
									<th>unmeet_Need</th>
									<th>ward</th>
									
								</tr>
							</thead>
							<tbody>
							<?php $count = 1; 
								foreach($response as $k=>$v){ ?>
								<tr>
									<td><?php echo $count;?></td>
									<td><?php echo $v->bay ;?></td>
									<td><?php echo $v->bed ;?></td>
									<td><?php echo $v->code ;?></td>
									<td><?php echo $v->date ;?></td>
									<td><?php echo $v->discipline ;?></td>
									<td><?php echo $v->f2f ;?></td>
									<td><?php echo $v->new_patient ;?></td>
									<td><?php echo $v->nonF2F ;?></td>
									<td><?php echo $v->unmeet_Need ;?></td> 
									<td><?php echo $v->ward ;?></td>  
								</tr> 
							<?php
							$count++;	
							} ?>
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
	
    var table = $('#example').DataTable({
	"searching": true,
	"lengthChange": false,
	"order": [],
	"scrollX": true,
	"columnDefs": [
    { "orderable": false, "targets": 0 }
		]
	});
	
	var buttons = new $.fn.dataTable.Buttons(table, {
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
}).container().appendTo($('#data_tables_buttons'));

		
		$('.date-picker').datepicker();
		$('.sumoselect-multi').SumoSelect({
			up : 'false',
			search: true, 
			searchText: 'Enter here.',
			selectAll: true,
			placeholder: 'Select District'
		});

		
		
		$( "#addform" ).validate( {
				rules: {
					fullname: "required",
					loginname: {
						required: true,
						minlength: 2
					},
					password: {
						required: true,
						minlength: 5
					},
					email: {
						required: true,
						email: true
					}
				},
				messages: {
					fullname: "Please enter your full name",
					loginname: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					email: "Please enter a valid email address"
				}
			} );

		
	});
</script>
</body>
</html>