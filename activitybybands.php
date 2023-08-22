<?php
session_start();
error_reporting(0);
if(isset($_SESSION['statsuser']) && $_SESSION['statsuser'] == true){
}else{ 
    header('Location: '.'login.php');
}

if(isset($_POST['team'])){
	$selectedteam = $_POST['team'];
}else{
	$selectedteam = '1';
}

require_once("inc/responsebands.php");
require_once("inc/config.php");


//echo $selectedteam; exit;
#echo '<pre>'; print_r($data['bands']['medical']); exit;
#echo '<pre>'; print_r($data); exit;
?>
<!DOCTYPE html>
<?php ?>
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

        </div>
      </div>
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-chart">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-3">
									<h3 class="panel-title"></h3>
								</div>
								<div class="col-md-9 text-right">
									<form class="form-inline table-inline-filter" method="POST" action="activitybybands.php">
										<!-- <div class="form-group">
											<input type="text" class="form-control date-picker valid" id="date" name="date" value="<?php //if($selected_from != ""){ echo $selected_from;  }?>">
										</div>
										<div class="form-group">
											<input type="text" class="form-control date-picker valid" id="dateto" name="dateto" value="<?php //if($selected_to != ""){ echo $selected_to;  }?>">
										</div> -->
										<div class="form-group">
											<select class="form-control" id="team" name="team" >
												<?php foreach ($data['teamslist'] as $k => $v) { ?>
													
													<option value="<?php echo $v['id']; ?>" <?php if($selectedteam == $v['id']){ echo 'selected'; } ?> ><?php echo $v['name']; ?></option>
														
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<div class="btn-group">
											  <button type="submit" class="btn btn-info">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6  col-xs-3">
									<h3 class="panel-title"></h3>
								</div>
								<div class="col-md-6 col-sm-6  col-xs-9 text-right">
								</div>
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
									<div class="col-md-4 col-sm-4  col-xs-3">
										<h3 class="panel-title"></h3>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-2" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-3" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-4" style="height: 240px; min-width:240px; margin:0px auto;"></div>
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
									<div class="col-md-4 col-sm-4  col-xs-3">
										<h3 class="panel-title"></h3>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-5" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-6" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-7" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
        	</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-chart">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-4 col-sm-4  col-xs-3">
										<h3 class="panel-title"></h3>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-8" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-19" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
									<div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-10" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-chart">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-4 col-sm-4  col-xs-3">
										<h3 class="panel-title"></h3>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 col-sm-12 text-center">
										<div id="donut-chart-9" style="height: 500px; min-width:240px; margin:0px auto;"></div>
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
$("#date").change(function() {
     //this.form.submit();
});
$(function () {
    // $('#menu-toggle').trigger('click');
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

		$('#donut-chart-2').highcharts({
		colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
	    chart: {
	        type: 'pie'
	    },

	    plotOptions: {
	        pie: {
	            //innerSize: '70%',
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.y:.1f} ',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Band 2'
        },
	    credits: {
            enabled: false
        },

		exporting: {
            enabled: true
        },
		tooltip: {
            valueSuffix: ''
        },
	    series: [{
			name: "Total",
	        data: [
			<?php foreach($data['activitybybands'] as $k=>$v){  ?>

	            ['<?php echo "f2f"; ?>', <?php echo $v['teamwise']['totalsumteamf2fband2']; ?>],

	            ['<?php echo "nonf2f"; ?>',<?php echo $v['teamwise']['totalsumteamnonf2fband2']; ?>],

			<?php } ?>
	        ]
	    }]
	});
		$('#donut-chart-3').highcharts({
		colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
	    chart: {
	        type: 'pie'
	    },

	    plotOptions: {
	        pie: {
	            //innerSize: '70%',
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.y:.1f} ',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Band 3'
        },
	    credits: {
            enabled: false
        },

		exporting: {
            enabled: true
        },
		tooltip: {
            valueSuffix: ''
        },
	    series: [{
			name: "Total",
	        data: [
						<?php foreach($data['activitybybands'] as $k=>$v){  ?>

				            ['<?php echo "f2f"; ?>', <?php echo $v['teamwise']['totalsumteamf2fband3']; ?>],

				            ['<?php echo "nonf2f"; ?>',<?php echo $v['teamwise']['totalsumteamnonf2fband3']; ?>],

						<?php } ?>
	        ]
	    }]
	});
		$('#donut-chart-4').highcharts({
		colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
	    chart: {
	        type: 'pie'
	    },

	    plotOptions: {
	        pie: {
	            //innerSize: '70%',
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.y:.1f} ',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Band 4'
        },
	    credits: {
            enabled: false
        },

		exporting: {
            enabled: true
        },
		tooltip: {
            valueSuffix: ''
        },
	    series: [{
			name: "Total",
	        data: [
						<?php foreach($data['activitybybands'] as $k=>$v){  ?>

				            ['<?php echo "f2f"; ?>', <?php echo $v['teamwise']['totalsumteamf2fband4']; ?>],

				            ['<?php echo "nonf2f"; ?>',<?php echo $v['teamwise']['totalsumteamnonf2fband4']; ?>],

						<?php } ?>
	        ]
	    }]
	});
		$('#donut-chart-5').highcharts({
		colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
	    chart: {
	        type: 'pie'
	    },

	    plotOptions: {
	        pie: {
	            //innerSize: '70%',
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.y:.1f} ',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Band 5'
        },
	    credits: {
            enabled: false
        },

		exporting: {
            enabled: true
        },
		tooltip: {
            valueSuffix: ''
        },
	    series: [{
			name: "Total",
	        data: [
						<?php foreach($data['activitybybands'] as $k=>$v){  ?>

				            ['<?php echo "f2f"; ?>', <?php echo $v['teamwise']['totalsumteamf2fband5']; ?>],

				            ['<?php echo "nonf2f"; ?>',<?php echo $v['teamwise']['totalsumteamnonf2fband5']; ?>],

						<?php } ?>
	        ]
	    }]
	});
		$('#donut-chart-6').highcharts({
		colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
	    chart: {
	        type: 'pie'
	    },

	    plotOptions: {
	        pie: {
	            //innerSize: '70%',
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.y:.1f} ',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Band 6'
        },
	    credits: {
            enabled: false
        },

		exporting: {
            enabled: true
        },
		tooltip: {
            valueSuffix: ''
        },
	    series: [{
			name: "Total",
	        data: [
						<?php foreach($data['activitybybands'] as $k=>$v){  ?>

				            ['<?php echo "f2f"; ?>', <?php echo $v['teamwise']['totalsumteamf2fband6']; ?>],

				            ['<?php echo "nonf2f"; ?>',<?php echo $v['teamwise']['totalsumteamnonf2fband6']; ?>],

						<?php } ?>
	        ]
	    }]
	});
	$('#donut-chart-7').highcharts({
		colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
	    chart: {
	        type: 'pie'
	    },

	    plotOptions: {
	        pie: {
	            //innerSize: '70%',
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.y:.1f} ',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Band 7'
        },
	    credits: {
            enabled: false
        },

		exporting: {
            enabled: true
        },
		tooltip: {
            valueSuffix: ''
        },
	    series: [{
			name: "Total",
	        data: [
						<?php foreach($data['activitybybands'] as $k=>$v){  ?>

				            ['<?php echo "f2f"; ?>', <?php echo $v['teamwise']['totalsumteamf2fband7']; ?>],

				            ['<?php echo "nonf2f"; ?>',<?php echo $v['teamwise']['totalsumteamnonf2fband7']; ?>],

						<?php } ?>
	        ]
	    }]
	});

	$('#donut-chart-8').highcharts({
		colors: ['#2196f3', '#8bc34a'],
	    chart: {
	        type: 'pie'
	    },

	    plotOptions: {
	        pie: {
	            //innerSize: '70%',
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.y:.1f} ',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Chart Unmeet/meet'
        },
	    credits: {
            enabled: false
        },

		exporting: {
            enabled: true
        },
		tooltip: {
            valueSuffix: ''
        },
	    series: [{
			name: "Total",
	        data: [

				['<?php echo "meet"; ?>', <?php echo $data['dateChartUnMeet']['meet']['total']; ?>],

				['<?php echo "unmeet"; ?>',<?php echo $data['dateChartUnMeet']['un_meet']['total']; ?>],
	        ]
	    }]
	});

	Highcharts.chart('donut-chart-9', {
		colors: ['#AA4643', '#2196f3'],
		chart: {
			type: 'column'
		},
		title: {
			text: 'Frailty activity by wards',
			align: 'left'
		},
		xAxis: {
			categories: [ 
				<?php foreach($data['wardChart'] as $k=>$v){
						echo "'".$v['name']."',";
				}?>
			]
		},
		yAxis: {
			allowDecimals: false,
			min: 0,
			title: {
				text: ''
			}
		},
		tooltip: {
			format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
				'Total: {point.stackTotal}'
		},
		plotOptions: {
			column: {
				stacking: 'normal'
			}
		},
		series: [
			{
				name: 'Unmeet',
				data: 
				[
					<?php 
						foreach($data['wardChart'] as $k=>$v){
						echo $v['un_meet'].",";
						} 
					?>
				],
				stack: 'Europe'
			}, 
			{
				name: 'Meet',
				data: [
					<?php 
						foreach($data['wardChart'] as $k=>$v){
						echo $v['meet'].",";
						} 
					?>
				],
				stack: 'Europe'
			},
		]
	});

});
</script>
</body>
</html>
