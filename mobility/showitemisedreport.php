<?php 
// echo "asdad"; exit;
require_once("itemisedreportdata.php"); 
require_once("../inc/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mobility</title>
    <link rel="icon" href="<?php echo URL; ?>assets/images/logo.png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" type='text/css' />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/css/style.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/DataTables/Buttons/css/buttons.dataTables.min.css" type='text/css' />
    <link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/DataTables/dist/css/dataTables.bootstrap.min.css" type='text/css' />
    <link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" type='text/css' />
    <link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/sumoselect/sumoselect.css" type='text/css' />
    <script> 
</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="<?php echo URL; ?>assets/js/html5shiv.min.js"></script>
<script src="<?php echo URL; ?>assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body style=" background: white;"> 

  <div class="container-fluid"> 
    <div class="row">
        <!-- <div class="clearfix" style="margin-top:30px;"></div>  -->
             
            <div class="col-md-1"> 
            </div>
            <div class="col-md-4">
                <ul class="list-inline   "> 
                    <li> 
                        <h2>Itemised Weekly Report</h2>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 pull-right">
                <ul class="list-inline "> 
                    <li> 
                        <img src="../assets/images/bradford.png" height="80px" border="0"> 
                    </li>
                </ul>
            </div>
        <!-- <div class="col-md-12"> -->
        <div class="col-md-10 col-md-offset-1">
              <table id="table-info" class="table table-striped table-bordered report-table-body">
                <thead>  
               
                <tr>
                  <th>S.No</th>
                  <th>Issue Date</th>
                  <th>Product Item</th>
                  <th>Amount</th>
                  <th>Last Name</th>   
                  <th>Gender</th>   
                  <th>NHS</th>   
                </tr> 
                </thead>
                <tbody>
                  <?php foreach ($data as $k => $v) { ?>
                    	<tr>
                        <td><?php echo $k+1; ?></td>
                        <td><?php echo $v['network_date']; ?></td>  
                        <td><?php echo $v['productname']; ?></td> 
                        <td><?php echo $v['product_amount']; ?></td>
                        <td><?php echo $v['pname']; ?></td>  
                        <td><?php echo ucfirst($v['patient_gender']); ?></td>  
                        <td><?php echo $v['patient_hospital_no']; ?></td>  
                      </tr> 
                  <?php }?>
									
                </tbody>
            </table>
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
	"order":  [],
	"scrollX": true,
	"pageLength": 100,
	 "paging": true,
	 "bInfo": false,
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

	$('.date-picker').datepicker({
		format: 'dd-mm-yyyy'
	}); 
 

});
</script>
</body>
</html>