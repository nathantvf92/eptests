<?php 

require_once("inc/response2.php"); 
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
<link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" type='text/css' />
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
<?php include_once("widgets/navbar.php"); ?>
<?php //include_once("inc/response.php"); ?> 
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<?php include_once("widgets/sidebar.php");?>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">  
			<div class="row"> 
				<div class="col-md-12">
					<div class="panel panel-chart">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-3"> 
								</div> 
									<div class="col-md-9 text-right">
										<form class="form-inline table-inline-filter" method="POST" action="index.php">
											<div class="form-group">
												<input type="text" class="form-control date-picker valid" id="date" name="date" placeholder="">
											</div> 
											<div class="form-group">
												<input type="text" class="form-control date-picker valid" id="dateto" name="dateto" placeholder="">
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
						<div class="panel-body"> 
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div id="col-chart-1" style="height: 250px; min-width:90px; width:100%; margin:0px auto;"></div> 
								</div> 
							</div> 
						</div>
					</div>
				</div>
			</div> 	 
        </div>
      </div>
		<div class="row"> 
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">  
			<div class="row"> 
				<div class="col-md-12">
					<div class="panel panel-chart">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-12 col-sm-12  col-xs-3">
									<h3 class="panel-title"></h3>
								</div> 
							</div>
						</div>
						<div class="panel-body"> 
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div id="col-chart-2" style="height: 240px; min-width:240px; margin:0px auto;"></div>
								</div> 
							</div> 
						</div>
					</div>
				</div>
			</div> 	 
        </div>
      </div>   	  
    </div>
 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo URL; ?>assets/js/jquery.min.js"></script> 
<script src="<?php echo URL; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/modernizr.js"></script>

<!-- plugins -->
<script src="<?php echo URL; ?>assets/plugins/highcharts/highcharts.js"></script>
<script src="<?php echo URL; ?>assets/plugins/highcharts/modules/exporting.js"></script>

<script src="<?php echo URL; ?>assets/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- custom -->
<script src="<?php echo URL; ?>assets/js/app.js"></script>
 
<script>
 

$(function () {
	$('.date-picker').datepicker({
		format: 'dd-mm-yyyy'
	});
	
	Highcharts.setOptions({
		chart: {
			style: {
				fontFamily: "'Roboto', sans-serif"
			}
		}
	}); 
	 
	
 
	Highcharts.chart('col-chart-1', {
	colors: ['#2196f3', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Physio By Ward'
    },
    xAxis: {
        categories: [ <?php foreach($wards as $k=>$v){ 
				echo "'".$v."',";
		}?>
		],
        crosshair: true
    },
    yAxis: {
        min: 0,
		gridLineWidth: 1,
  minorGridLineWidth: 1,
  gridLineDashStyle: 'longdash',
        title: {
            text: false
        }
    },
    exporting: {
            enabled: true
        },
		credits: {
            enabled: false
        },
	legend: {
            enabled: true
        },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
			dataLabels: {
                enabled: true,
                crop: false,
                overflow: 'none'
            }
        }
    },
    series: [{
        name: 'F:F',
        data: [<?php foreach($data['actvitybyward'] as $k=>$v){ 
					echo ($v['physio']['f2f'] == "")? '0'.',' : $v['physio']['f2f'].','; 
			} ?>]

    },{
        name: 'NON F:F',
        data: [<?php foreach($data['actvitybyward'] as $k=>$v){ 
					echo ($v['physio']['nonf2f'] == "")? '0'.',' : $v['physio']['nonf2f'].','; 
			} ?>]

    }]
});
	
	Highcharts.chart('col-chart-2', {
	colors: ['#2196f3', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'OT by Ward'
    },
    xAxis: {
        categories: [ <?php foreach($wards as $k=>$v){ 
				echo "'".$v."',";
		}?>
		],
        crosshair: true
    },
    yAxis: {
        min: 0,
		gridLineWidth: 1,
  minorGridLineWidth: 1,
  gridLineDashStyle: 'longdash',
        title: {
            text: false
        }
    },
    exporting: {
            enabled: true
        },
		credits: {
            enabled: false
        },
legend: {
            enabled: true
        },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
			dataLabels: {
                enabled: true,
                crop: false,
                overflow: 'none'
            }
        }
    },
    series: [{
        name: 'F:F',
        data: [<?php foreach($data['actvitybyward'] as $k=>$v){ 
					echo ($v['ot']['f2f'] == "")? '0'.',' : $v['ot']['f2f'].','; 
			} ?>]

    },{
        name: 'NON F:F',
        data: [<?php foreach($data['actvitybyward'] as $k=>$v){ 
					echo ($v['ot']['nonf2f'] == "")? '0'.',' : $v['ot']['nonf2f'].','; 
			} ?>]

    }]
});
	 

});	
</script>
</body>
</html>