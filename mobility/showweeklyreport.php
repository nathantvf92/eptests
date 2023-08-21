<?php 
// echo "asdad"; exit;
require_once("reportdata.php"); 
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

<body>
    <!-- <nav class="navbar navbar-fixed-top report-header">
        <div class="container-fluid">
            <div>
                <div class="row">
                    <div class="col-md-3">
                        <div id="preloader">
                            <div id="preloader-status">&nbsp;</div>
                        </div>
                        <ul class="list-inline" id="export">
                            <li>
                                <a href="javascript:" class="export" title="Excel"> <img src="../assets/images/Excel-icon.png" width="27" height="30" border="0">
                                    <label> &nbsp;Get Excel</label>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-center">
                        <h3 id="titleReportHeader"><?php //_e($report); ?></h3>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-inline pull-right">
                            <li>
                                <a href="javascript:window.close();"><img src="../assets/images/close.png" width="27" height="27" border="0"> <label>Close</label></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav> -->

  <div class="container-fluid">
      <div class="row">
        <div class="clearfix" style="margin-top:30px;"></div>
            <div class="col-md-10 col-md-offset-1" style="background: white;">
                <div class="row">
                    <div class="col-md-6">
                         
                            South Wing<br>
                            Kempston Road<br>
                            Bedford<br>MK42 9DJ <br> <br>
                            Tel: 01234 355 122 <br>
                            Fax: 01234 795855 
                         
                    </div>
                    <div class="col-md-6 pull-right">
                        <img src="../assets/images/bradford.png"  border="0"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                         
                           <?php echo date('d-M-yy');?> <br><br>
                           Dear Sir/Madam

                        
                    </div>
                    <div class="col-md-8" style="text-align: center;">
                        Millbrook Mobility Aids Issued
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="clearfix" style="margin-top:30px;"></div>
        <div class="col-md-10 col-md-offset-1">
              <table id="table-info" class="table table-striped table-bordered report-table-body">
                <thead>
                <tr class="sub-heading">
                  <td bgcolor="#dedede" colspan="8" align="right"><strong>Generated On :</strong>Dec 22, 2020</td>
                </tr>
                <tr>
                  <th>S.No</th>
                  <th>Product Item</th>
                  <th>Total Issued</th>   
                </tr> 
                </thead>
                <tbody>
                  <?php foreach ($data as $k => $v) { ?>
                    	<tr>
                        <td><?php echo $k+1; ?></td>
                        <td><?php echo $v['productname']; ?></td>
                        <td><?php echo $v['totalIssued']; ?></td>  
                      </tr> 
                  <?php }?>
									
                </tbody>
            </table>
        </div>
    </div>
      <div class="row">
        <div class="clearfix" style="margin-top:30px;"></div>
            <div class="col-md-10 col-md-offset-1" style="background: white;">
                <div class="row">
                    <div class="col-md-12"> 
                        We would be grateful if you could top up our store on the next available delivery.
                    </div>
                    <div class="col-md-12">
                        <strong>We undertake to provide all the necessary patient contact details for medical devices issued by this department during a given a period at your request. </strong>
                        <!-- <img src="../assets/images/bradford.png"  border="0">  -->
                    </div>
                </div> 
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6" style="text-align: center;"> 
                        www.bedfordhospital.nhs.uk
                    </div>
                    <div class="col-md-6" style="text-align: right;">  
                        <img src="../assets/images/bradfordfooter.png"  border="0"> 
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