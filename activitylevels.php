<?php
session_start();
error_reporting(0);

if(isset($_SESSION['statsuser']) && $_SESSION['statsuser'] == true){
}else{ 
    header('Location: '.'login.php');
}
require_once("inc/responseactivitylevels.php");
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

        </div>
      </div>
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-chart">
							<div class="panel-heading">
								<div class="row">
									<div class="col-4"></div>
									<div class="col-md-8  col-xs-9 text-right">
										<form class="form-inline table-inline-filter" method="POST" action="activitylevels.php" id="formSubmit">
											<div class="form-group">
												<input type="text" class="form-control date-picker valid" id="date" name="date" value="<?php if(isset($_POST['date']) && $_POST['date'] != ""){ echo $_POST['date'];  } ?>" required autocomplete="off">
											</div> 
											<div class="form-group">
												<input type="text" class="form-control date-picker valid" id="dateto" name="dateto" value="<?php if(isset($_POST['date']) && $_POST['dateto'] != ""){ echo $_POST['dateto'];  } ?>" required autocomplete="off">
											</div> 
											<div class="form-group hidden">
												<input type="text" class="form-control" id="team" name="team" value="<?php if(isset($_POST['team'])){ echo $_POST['team'];  } ?>">
											</div> 
											<div class="form-group hidden">
												<input type="text" class="form-control" id="team_ward" name="team_ward" value="<?php if(isset($_POST['team_ward'])){ echo $_POST['team_ward'];  } ?>">
											</div> 
											<div class="form-group hidden">
												<input type="text" class="form-control" id="team_staff" name="team_staff" value="<?php if(isset($_POST['team_staff'])){ echo $_POST['team_staff'];  } ?>">
											</div> 
											<div class="form-group hidden">
												<input type="text" class="form-control" id="team_ward_sort" name="team_ward_sort" value="<?php if(isset($_POST['team_ward_sort'])){ echo $_POST['team_ward_sort'];  } ?>">
											</div> 
											<div class="form-group hidden">
												<input type="text" class="form-control" id="team_staff_sort" name="team_staff_sort" value="<?php if(isset($_POST['team_staff_sort'])){ echo $_POST['team_staff_sort'];  } ?>">
											</div> 
											<div class="form-group">
												<div class="btn-group">
												<button type="submit" class="btn btn-info">Submit</button> 
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- <div class="row">
									<div class="col-md-6 col-sm-6  col-xs-3">
										<h3 class="panel-title">PRE DEC 2020</h3>
									</div>
									<div class="col-md-6 col-sm-6  col-xs-9 text-right">
									</div>
								</div> -->
							</div>
							<!-- <div class="panel-body">
								<div class="row">
									<div class="col-md-6 col-sm-6 text-center">
										<div id="donut-chart-2" style="height: 250px; min-width:90px; width:100%; margin:0px auto;"></div>
									</div>
									<div class="col-md-6 col-sm-6 text-center">
										<div id="donut-chart-3" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
								</div>
							</div> -->
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
										<h3 class="panel-title">New Teams from DEC 2020</h3>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6 col-sm-6 text-center">
										<div id="donut-chart-4" style="height: 250px; min-width:90px; width:100%; margin:0px auto;"></div>
									</div>
									<div class="col-md-6 col-sm-6 text-center">
										<div id="donut-chart-5" style="height: 240px; min-width:240px; margin:0px auto;"></div>
									</div>
									<div class="col-md-6 col-sm-6 text-center">
										<div id="donut-chart-6" style="height: 240px; min-width:240px; margin:0px auto;"></div>
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
								<div class=row>
									<div class="col-12">
										<div class="col-sm-8  col-xs-12">
											<div class="text-left" style="display: flex; align-items: center;">
												<select class="form-control minimal" id="selectTeam" name="selectTeam" placeholder="Team" style="max-width: 666px">
													<?php foreach ($data['teams'] as $k => $v) { ?>
														<option value="<?php echo $v['id']; ?>" 
														<?php 
														if(isset($_POST['team']) && $_POST['team'] != "" && $_POST['team'] == $v['id']){ echo "selected"; } 
														?> ><?php echo $v['name']; 
														?>
														</option> 
													<?php }?> 
												</select>
												<label for="" class="ml-3" style="font-size: 18px;margin: 0;padding-left: 20px;font-weight: 500;">Individual Team Performance</label>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6 col-sm-6 text-center">
										<div id="donut-chart-8" style="height: 400px; min-width:400px; margin:0px auto;">
										</div>
									</div>
									<!-- <div class="col-md-4 col-sm-4 text-center">
										<div id="donut-chart-19" style="height: 240px; min-width:240px; margin:0px auto;">
										</div>
									</div> -->
									<div class="col-md-6 col-sm-6 text-center">
										<div id="donut-chart-10" style="height: 400px; min-width:400px; margin:0px auto;">
										</div>
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
										<h3 class="panel-title">
											<div class="text-center">
												<select class="form-control minimal" id="sortTeamWard" name="sortTeamWard" placeholder="Team">
													<?php foreach ($data['sortList'] as $k => $v) { ?>
														<option value="<?php echo $v['id']; ?>" 
													<?php 
													if(isset($_POST['team_ward_sort']) && $_POST['team_ward_sort'] != "" && $_POST['team_ward_sort'] == $v['id']){ echo "selected"; } 
													?> ><?php echo $v['name']; 
													?>
													</option> 
													<?php }?> 
												</select>
											</div>
										</h3>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 col-sm-12 text-center">
										<div id="donut-chart-9" style="height: 500px; min-width:240px; margin:0px auto;">
										</div>
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
										<h3 class="panel-title">
											<div class="text-center">
												<select class="form-control minimal" id="sortTeamStaff" name="sortTeamStaff" placeholder="Team">
													<?php foreach ($data['sortList'] as $k => $v) { ?>
														<option value="<?php echo $v['id']; ?>" 
													<?php 
													if(isset($_POST['team_staff_sort']) && $_POST['team_staff_sort'] != "" && $_POST['team_staff_sort'] == $v['id']){ echo "selected"; } 
													?> ><?php echo $v['name']; 
													?>
													</option> 
													<?php }?> 
												</select>
											</div>
										</h3>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 col-sm-12 text-center">
										<div id="donut-chart-11" style="height: 500px; min-width:240px; margin:0px auto;">
										</div>
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
$("#selectTeam").change(function() {
	$('#team').val($(this).val());
	$('#team_ward').val($(this).val());
	$('#team_staff').val($(this).val());
	$('#formSubmit').trigger('submit')
});
$("#selectTeamWard").change(function() {
	$('#team_ward').val($(this).val());
	$('#formSubmit').trigger('submit')
});
$("#selectTeamStaff").change(function() {
	$('#team_staff').val($(this).val());
	$('#formSubmit').trigger('submit')
});
$("#sortTeamStaff").change(function() {
	$('#team_staff_sort').val($(this).val());
	$('#formSubmit').trigger('submit')
});
$("#sortTeamWard").change(function() {
	$('#team_ward_sort').val($(this).val());
	$('#formSubmit').trigger('submit')
});
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
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Physio Weekday Total'
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
			<?php foreach($data['teamactivitylevelsNovember2020'] as $k=>$v){ if($v['teamwise']['totalsumphysio'] == 0 || $v['teamwise']['totalsumphysio'] == ""){ $v['teamwise']['totalsumphysio'] = 1; } ?>
	            ['<?php echo $v['teamname']; ?>',   <?php echo $v['teamwise']['totalsumphysioteam']/$v['teamwise']['totalsumphysio']; ?>],
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
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'OT weekday Total'
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
        <?php foreach($data['teamactivitylevelsNovember2020'] as $k=>$v){ 
					if($v['teamwise']['totalsumot'] == 0 || $v['teamwise']['totalsumot'] == ""){ $v['teamwise']['totalsumot'] = 1; } ?>

                ['<?php echo $v['teamname']; ?>',   <?php echo $v['teamwise']['totalsumotteam']/$v['teamwise']['totalsumot']; ?>],
        
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
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',

				},
			 showInLegend: true
	        }
	    },

        title: {
			text: 'Dietetics Weekday total'
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
        <?php foreach($data['teamactivitylevelsNovember2020'] as $k=>$v){ 
					if($v['teamwise']['totalsumdietician'] == 0 || $v['teamwise']['totalsumdietician'] == ""){ $v['teamwise']['totalsumdietician'] = 1; } 
					if($v['team'] == '9' || $v['team'] == '10' ){
						 
					?>
					
            ['<?php echo $v['teamname']; ?>',   <?php echo $v['teamwise']['totalsumdieticianteam']/$v['teamwise']['totalsumdietician']; ?>],
        
				<?php } } ?>
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
				text: '<?php echo $data['selectedTeam']; ?> Unmet/met'
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

					['<?php echo "Met"; ?>', <?php echo $data['dateChartUnMeet']['meet']; ?>], 

			['<?php echo "Unmet"; ?>',<?php echo $data['dateChartUnMeet']['un_meet']; ?>],
			]
		}]
	});

		Highcharts.chart('donut-chart-9', {
			colors: ['#AA4643', '#2196f3'],
			chart: {
				type: 'column'
			},
			title: {
				text: '<?php echo $data['selectedTeamWard']; ?> activity by wards',
				align: 'left'
			},
			xAxis: {
				categories: [ 
				<?php foreach ($data['wardChart'] as $k => $v) {
					echo "'" . $v['name'] . "',";
				} ?>
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
				name: 'Unmet',
				data:
					[
					<?php
					foreach ($data['wardChart'] as $k => $v) {
						echo $v['un_meet'] . ",";
					}
					?>
				],
			stack: 'Europe'
			},
			{
				name: 'Met',
				data: [
					<?php
					foreach ($data['wardChart'] as $k => $v) {
						echo $v['meet'] . ",";
					}
					?>
				],
			stack: 'Europe'
			},
		]
	});

		$('#donut-chart-10').highcharts({
			colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
			chart: {
				type: 'pie'
			},

			plotOptions: {
				pie: {
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.y:.1f} ',

					},
					showInLegend: true
				}
			},

			title: {
				text: '<?php echo $data['selectedTeamWard']; ?> Breakdown'
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

				<?php foreach ($data['dataChartSpecialy'] as $k => $v) {
					?>
						['<?php echo $v['name'] ?>',<?php echo $v['total']; ?>],
							<?php

				} ?>
			]
		}]
	});

		Highcharts.chart('donut-chart-11', {
			colors: ['#AA4643'],
			chart: {
				type: 'column'
			},
			title: {
				text: '<?php echo $data['selectedTeamStaff']; ?> Staff Activity',
				align: 'left'
			},
			xAxis: {
				categories: [ 
				<?php foreach ($data['dataChartStaffActivity'] as $k => $v) {
					echo "'" . $v['name'] . "',";
				} ?>
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
				name: 'Number of staff',
				data:
					[
						<?php
						foreach ($data['dataChartStaffActivity'] as $k => $v) {
							echo $v['total'].",";
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
