<?php 
session_start(); 
if(isset($_SESSION['statsuser']) && $_SESSION['statsuser'] == true){
}else{ 
    header('Location: '.'login.php');
}

require_once("orthodata.php"); 
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
				<div class="col-md-6 col-sm-6 col-xs-7">
					<h1 class="page-header">Itemised Report</h1>
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

							<form action="<?php echo URL; ?>orthopaedic/showitemisedreport.php" method="POST" target="_blank">
							 
								<div class="row"> 

									<div class="col-md-6">
										<div class="form-group">
											<label for="email">From Date</label>
												<input type="text" class="form-control date-picker valid" id="fromdate" name="fromdate" autocomplete="off">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="email">To Date</label>
												<input type="text" class="form-control date-picker valid" id="todate" name="todate" autocomplete="off" >
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<button type="submit" name="editentry" class="btn btn-success pull-right">Generate Report</button>
										</div>
									</div>
								</div>
								 
							</form>

 
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
 	var r = confirm("Are You sure You want to delete this Entry???");
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

// $('#fromdate').on('change', function(){ 
// 	  var date2 = $('#fromdate').datepicker('getDate', '+7d'); 
// 	  date2.setDate(date2.getDate()+7); 
//  	 $('#todate').datepicker('setDate', date2);

// });

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