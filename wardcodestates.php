<?php
session_start();
if(isset($_SESSION['statsuser']) && $_SESSION['statsuser'] == true){
}else{ 
    header('Location: '.'login.php');
}

require_once("inc/responsewardcodestat.php");
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
								<!-- <div class="col-md-3">  
									<form class="form-inline" method="POST" action="wardcodestates.php" id="filtercharts">
                                        <select class="form-control" id="discipline" name="discipline" required> 
                                            <option value="all" <?php if(isset($_POST['discipline']) && $_POST['discipline'] != ""){ echo "selected";  } ?> >ALL (OT + PT+ Techs) </option>

                                            <option value="ptonly" <?php if(isset($_POST['discipline']) && $_POST['discipline'] != ""){ echo "selected";  } ?> >PT only </option>

                                            <option value="ptincludingpttech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] != ""){ echo "selected";  } ?> >PT including PT-Tech  </option>

                                            <option value="pttech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] != ""){ echo "selected";  } ?> >PT-Tech  </option>

                                            <option value="otonly" <?php if(isset($_POST['discipline']) && $_POST['discipline'] != ""){ echo "selected";  } ?> >OT only  </option>

                                            <option value="otincludingottech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] != ""){ echo "selected";  } ?> >OT including OT Tech  </option>

                                            <option value="ottech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] != ""){ echo "selected";  } ?> >OT-Tech  </option> 

                                            <option value="dietician" <?php if(isset($_POST['discipline']) && $_POST['discipline'] != ""){ echo "selected";  } ?> >Dietician  </option> 
                                        </select>
									</form>
								</div> -->
								<div class="col-md-12 ">
									<form class="form-inline " method="POST" action="wardcodestates.php" id="filtercharts">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="form-control" id="discipline" name="discipline" required> 
                                                        <option value="all" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "all"){ echo "selected";  } ?> >ALL (OT + PT+ Techs) </option>

                                                        <option value="ptonly" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "ptonly"){ echo "selected";  } ?> >PT only </option>

                                                        <option value="ptincludingpttech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "ptincludingpttech"){ echo "selected";  } ?> >PT including PT-Tech  </option>

                                                        <option value="pttech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "pttech"){ echo "selected";  } ?> >PT-Tech  </option>

                                                        <option value="otonly" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "otonly"){ echo "selected";  } ?> >OT only  </option>

                                                        <option value="otincludingottech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "otincludingottech"){ echo "selected";  } ?> >OT including OT Tech  </option>

                                                        <option value="ottech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "ottech"){ echo "selected";  } ?> >OT-Tech  </option> 

                                                        <option value="dietician" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "dietician"){ echo "selected";  } ?> >Dietician  </option> 
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-md-9 text-right">
                                                <div class="form-group">
                                                    <input type="text" class="form-control date-picker valid" id="date" name="date" value="<?php if(isset($_POST['date']) && $_POST['date'] != ""){ echo $_POST['date'];  } ?>" required autocomplete="off">
                                                </div> 
                                                <div class="form-group">
                                                    <input type="text" class="form-control date-picker valid" id="dateto" name="dateto" value="<?php if(isset($_POST['date']) && $_POST['dateto'] != ""){ echo $_POST['dateto'];  } ?>" required autocomplete="off">
                                                </div> 
                                                <div class="form-group">
                                                    <div class="btn-group">
                                                    <button type="submit" class="btn btn-info">Submit</button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
									
									</form>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12  col-xs-3">
									<h3 class="panel-title"></h3>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div id="col-chart-3" style="height: 240px; min-width:240px; margin:0px auto;"></div>
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
						<div class="panel-body ">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div id="col-chart-4" style="height: 240px; min-width:240px; margin:0px auto;"></div>
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
						<div class="panel-body ">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div id="col-chart-5" style="height: 240px; min-width:240px; margin:0px auto;"></div>
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
						<div class="panel-body ">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div id="col-chart-6" style="height: 240px; min-width:240px; margin:0px auto;"></div>
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
						<div class="panel-body ">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div id="col-chart-7" style="height: 240px; min-width:240px; margin:0px auto;"></div>
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
						<div class="panel-body ">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div id="col-chart-8" style="height: 240px; min-width:240px; margin:0px auto;"></div>
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
$('#discipline').change(function(){
    $('#filtercharts').submit();
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

	Highcharts.chart('col-chart-3', {
	colors: ['#2196f3', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Activity by Code (Medical)'
    },
    xAxis: {
        categories: [ <?php foreach($data['wardcodestates2'] as $k=>$v){
                if(in_array(substr($v['code'],0,3),array('300','320','340','370','430'))){
                    echo "'".substr($v['code'],0,3)."',";
                }
                //echo "'".$k."',";
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
        data: [<?php foreach($data['wardcodestates2'] as $k=>$v){
		if(in_array(substr($v['code'],0,3),array('300','320','340','370','430'))){
					echo $v['f2f'].',';
		}
			} ?>]

    },{
        name: 'NON F:F',
        data: [<?php foreach($data['wardcodestates2'] as $k=>$v){
		if(in_array(substr($v['code'],0,3),array('300','320','340','370','430'))){
					echo $v['nonf2f'].',';
		}
			} ?>]

    },{
        name: 'A',
        data: [<?php foreach($data['wardcodestates2'] as $k=>$v){
		if(in_array(substr($v['code'],0,3),array('300','320','340','370','430'))){
					echo $v['newpatient'].',';
		}
			} ?>]

    },{
        name: 'X',
        data: [<?php foreach($data['wardcodestates2'] as $k=>$v){
		if(in_array(substr($v['code'],0,3),array('300','320','340','370','430'))){
					echo $v['unmeet'].',';
		}
			} ?>]

    }]
});
	Highcharts.chart('col-chart-4', {
	colors: ['#2196f3', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Activity by Code (Surgical)'
    },
    xAxis: {
        categories: [ <?php foreach($data['wardcodestates'] as $k=>$v){
                    // if(in_array($v['code'],array('100-General Surgery','101','101-Urology','103','103-Breast Surgery','104','104-Colorectal Surgery','107','110a','110b','110b Trauma (Ortho)','120','190','502'))){
                        echo "'".$v['code']."',";
                    // }
								//echo "'".$k."',";
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
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		// if(in_array($v['code'],array('100','100-General surgery','101','101-Urology','103','103-Breast surgery','104','104-Colorectal Surgery','107','110a','110b','110b Trauma (Ortho)','120','190','502'))){
					echo $v['f2f'].',';
		// }
			} ?>]

    },{
        name: 'NON F:F',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		// if(in_array($v['code'],array('100','100-General surgery','101','101-Urology','103','103-Breast surgery','104','104-Colorectal Surgery','107','110a','110b','110b Trauma (Ortho)','120','190','502'))){
					echo $v['nonf2f'].',';
		// }
			} ?>]

    },{
        name: 'A',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		// if(in_array($v['code'],array('100','100-General surgery','101','101-Urology','103','103-Breast surgery','104','104-Colorectal Surgery','107','110a','110b','110b Trauma (Ortho)','120','190','502'))){
					echo $v['newpatient'].',';
		// }
			} ?>]

    },{
        name: 'X',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		// if(in_array($v['code'],array('100','100-General surgery','101','101-Urology','103','103-Breast surgery','104','104-Colorectal Surgery','107','110a','110b','110b Trauma (Ortho)','120','190','502'))){
					echo $v['unmeet'].',';
		// }
			} ?>]

    }]
});
	Highcharts.chart('col-chart-5', {
	colors: ['#2196f3', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Activity by Code (Neuro)'
    },
    xAxis: {
        categories: [ <?php foreach($data['wardcodestates'] as $k=>$v){
								if(in_array(substr($v['code'],0,4),array('400a','400b'))){
									echo "'".substr($v['code'],0,4)."',";
								}
								//echo "'".$k."',";
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
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		if(in_array(substr($v['code'],0,4),array('400a','400b'))){
					echo $v['f2f'].',';
		}
			} ?>]

    },{
        name: 'NON F:F',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		if(in_array(substr($v['code'],0,4),array('400a','400b'))){
					echo $v['nonf2f'].',';
		}
			} ?>]

    },{
        name: 'A',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		if(in_array(substr($v['code'],0,4),array('400a','400b'))){
					echo $v['newpatient'].',';
		}
			} ?>]

    },{
        name: 'X',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		if(in_array(substr($v['code'],0,4),array('400a','400b'))){
					echo $v['unmeet'].',';
		}
			} ?>]

    }]
});
	Highcharts.chart('col-chart-6', {
	colors: ['#2196f3', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Activity by Code (Orthopaedic)'
    },
    xAxis: {
        categories: [ <?php foreach($data['wardcodestates'] as $k=>$v){
								if(in_array(substr($v['code'],0,4),array('110a','110b'))){
									echo "'".substr($v['code'],0,4)."',";
								}
								//echo "'".$k."',";
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
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		if(in_array(substr($v['code'],0,4),array('110a','110b'))){
					echo $v['f2f'].',';
		}
			} ?>]

    },{
        name: 'NON F:F',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		if(in_array(substr($v['code'],0,4),array('110a','110b'))){
					echo $v['nonf2f'].',';
		}
			} ?>]

    },{
        name: 'A',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		if(in_array(substr($v['code'],0,4),array('110a','110b'))){
					echo $v['newpatient'].',';
		}
			} ?>]

    },{
        name: 'X',
        data: [<?php foreach($data['wardcodestates'] as $k=>$v){
		if(in_array(substr($v['code'],0,4),array('110a','110b'))){
			echo $v['unmeet'].',';
		}
			} ?>]

    }]
});
	Highcharts.chart('col-chart-7', {
	colors: ['#2196f3', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Activity by Code (Others)'
    },
    xAxis: {
        categories: [ <?php foreach($data['wardcodestates2'] as $k=>$v){
            if(in_array(substr($v['code'],0,3),array('420','171','180'))){
                echo "'".substr($v['code'],0,3)."',";
            }
            //echo "'".$k."',";
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
        data: [<?php foreach($data['wardcodestates2'] as $k=>$v){
      		if(in_array(substr($v['code'],0,3) ,array('420','171','180'))){
      					echo $v['f2f'].',';
      		}
			} ?>]

    },{
        name: 'NON F:F',
        data: [<?php foreach($data['wardcodestates2'] as $k=>$v){
    		if(in_array(substr($v['code'],0,3),array('420','171','180'))){
    					echo $v['nonf2f'].',';
    		}
			} ?>]

    },{
        name: 'A',
        data: [<?php foreach($data['wardcodestates2'] as $k=>$v){
    		if(in_array(substr($v['code'],0,3),array('420','171','180'))){
    					echo $v['newpatient'].',';
    		}
			} ?>]

    },{
        name: 'X',
        data: [<?php foreach($data['wardcodestates2'] as $k=>$v){
    		if(in_array(substr($v['code'],0,3),array('420','171','180'))){
    					echo $v['unmeet'].',';
    		}
			} ?>]

    }]
});
	Highcharts.chart('col-chart-8', {
	colors: ['#2196f3', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Weekend Activity'
    },
    xAxis: {
        categories: [],
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
        name: 'Physio Weekend',
        data: [<?php foreach($data['weekendactivity'] as $k=>$v){
		if(in_array($v['discipline'],array('Physio'))){
					echo $v['weekend'].',';
		}
			} ?>]

    },{
        name: 'OT Weekend',
        data: [<?php foreach($data['weekendactivity'] as $k=>$v){
		if(in_array($v['discipline'],array('ot'))){
					echo $v['weekend'].',';
		}
			} ?>]

    },{
        name: 'Tech Weekend',
        data: [<?php foreach($data['weekendactivity'] as $k=>$v){
		if(in_array($v['discipline'],array('Tech'))){
					echo $v['weekend'].',';
		}
			} ?>]

    } ]
});
 

});
</script>
</body>
</html>
