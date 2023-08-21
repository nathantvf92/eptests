<?php
session_start();
if(isset($_SESSION['statsuser']) && $_SESSION['statsuser'] == true){
}else{ 
    header('Location: '.'login.php');
}
require_once("inc/responsecostbymedicalcode.php");
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
								<div class="col-md-3">
									<h3 class="panel-title"></h3>
								</div>
								<div class="col-md-9 text-right">
									<form class="form-inline table-inline-filter" method="POST" action="costbymedicalcode.php">
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
									</form>
								</div>
							</div> 
						</div> 
					</div>
				</div>
			</div>
			
        </div>
      </div>

      <div>
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <div class="row"  id="chartrows">
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
<?php foreach ($data['costbymedicalcode'] as $k => $v) { ?>
  
  $('#chartrows').append(` 
              <div class="col-md-6">
                <div class="panel panel-chart">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-md-12 col-sm-12  col-xs-3">
                        <h3 class="panel-title"></h3>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="row" >
                      <div class="col-md-12 col-sm-12 text-center">
                        <div id="donut-chart-<?php echo $v['id'];?>" style="height: 500px; min-width:90px; width:100%; margin:0px auto;"></div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div> `) 

  drawChart(<?php echo $v['id']; ?>, <?php echo json_encode($v); ?>)
<?php } ?>  
// drawChart(2)

  function drawChart(chartid, mData){
    // console.log(mData);
		$('#donut-chart-'+chartid).highcharts({
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
			text: mData.name
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
					['Band 1',   parseFloat(mData.band1)], 
					['Band 2',   parseFloat(mData.band2)], 
					['Band 3',   parseFloat(mData.band3)], 
					['Band 4',   parseFloat(mData.band4)], 
					['Band 5',   parseFloat(mData.band5)], 
					['Band 6',   parseFloat(mData.band6)], 
					['Band 7',   parseFloat(mData.band7)], 
					['Band 8',   parseFloat(mData.band8)], 

	      ]
	    }]
	});  
  }
});
</script>
</body>
</html>
