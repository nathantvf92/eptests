<?php 
   session_start(); 
   if(isset($_SESSION['statsuser']) && $_SESSION['statsuser'] == true){
   }else{ 
       header('Location: '.'login.php');
   }
   
   require_once("inc/responsemedicalcost.php");
   require_once("inc/config.php"); ?>
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
      <style>
         .tableFixHead          { overflow: auto; height: 500px; }
         .tableFixHead thead th { position: sticky; top: 0; z-index: 1; }
         /* Just common table stuff. Really. */
         table  { border-collapse: collapse; width: 100%; }
         th, td { padding: 8px 16px; }
         th     { background:#eee; }
      </style>
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
                  <h1 class="page-header">Cost By Medical Code</h1>
               </div>
               <div class="col-md-9 text-right">
                  <form class="form-inline " method="POST" action="medicalcost.php">
                     <div class="form-group">
                        <select name="discipline" class="form-control">
                           <option value="all"  <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "all"){ echo "selected";  } ?> >ALL (PHYSIO+OT+TECH-OT+TECH-PT)</option>
                           <option value="physiopttech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "physiopttech"){ echo "selected";  } ?> >PHYSIO + PT TECH</option>
                           <option value="otottech" <?php if(isset($_POST['discipline']) && $_POST['discipline'] == "otottech"){ echo "selected";  } ?>>OT + OT TECH</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control date-picker valid" id="date" name="date" value="<?php if(isset($_POST['date']) && $_POST['date'] != ""){ echo $_POST['date'];  } ?>"  autocomplete="off">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control date-picker valid" id="dateto" name="dateto" value="<?php if(isset($_POST['date']) && $_POST['dateto'] != ""){ echo $_POST['dateto'];  } ?>"  autocomplete="off">
                     </div>
                     <div class="form-group">
                        <div class="btn-group">
                           <button type="submit" class="btn btn-info">Submit</button> 
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="row hide">
               <div class="col-md-3">
                  <div class="card statistic-card">
                     <h4>959/1137</h4>
                     <p>Staff Overview</p>
                     <div class="tab-chart-wrapper">
                        <span data-percent="84" class="tab-chart"><span class="percent">84</span></span>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card statistic-card">
                     <h4>121</h4>
                     <p>Coverage</p>
                     <div class="tab-chart-wrapper">
                        <span data-percent="8" class="tab-chart"><span class="percent">8</span></span>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card statistic-card">
                     <h4>458</h4>
                     <p>Medicine</p>
                     <div class="tab-chart-wrapper">
                        <span data-percent="67" class="tab-chart"><span class="percent">67</span></span>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card statistic-card">
                     <h4>875</h4>
                     <p>Equipment</p>
                     <div class="tab-chart-wrapper">
                        <span data-percent="49" class="tab-chart"><span class="percent">49</span></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <ul class="nav nav-tabs">
                     <li role="presentation" class="active"><a href="#costbymedicalcode" data-toggle="tab">Cost by Medical Code </a></li>
                     <li role="presentation"><a href="#costbyserviceline" data-toggle="tab">Cost by Service Line</a></li>
                     <li role="presentation"><a href="#overallcost" data-toggle="tab">Charts Showing overall Cost</a></li>
                  </ul>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myTabContent" class="tab-content">
                     <div class="tab-pane fade active in" id="costbymedicalcode">
                        <div class="panel panel-table">
                           <div class="panel-heading">
                              <div class="row">
                                 <div class="col-md-3">
                                    <form class="form-inline table-inline-filter">
                                       <div class="form-group" id="data_tables_buttons">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="panel-body p-t-0">
                                    <!-- <div class="tableFixHead"> -->
                                    <table id="2" class="table table-striped table-bordered" style="width:100%">
                                       <thead>
                                          <tr>
                                             <th colspan="5"></th>
                                             <th >Current AFC hourly pay scales £</th>
                                             <th colspan="3"></th>
                                          </tr>
                                          <tr>
                                             <th></th>
                                             <th>F:F units</th>
                                             <th>Non F:F units</th>
                                             <th>Total time in minutes (units x 10)</th>
                                             <th>Total time in hours</th>
                                             <th>Pay</th>
                                             <th>Pay + On-costs</th>
                                             <th>Cost per band using Pay</th>
                                             <th>Cost per Band using Pay and On costs </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php foreach($data['costbymedicalcode'] as $k=>$v){ 
                                             $sumpay = 0;
                                             $sumpaycost = 0;
                                             $sumcostofactivity = 0;
                                             $sumcostofactivitycost = 0;
                                             ?>
                                          <tr>
                                             <td colspan="9"><strong><?php echo $v['name']; ?></strong></td>
                                          </tr>
                                          <?php foreach($v['bands'] as $bk=>$bv){ 
                                             //$sumpay = $sumpay + $bv['pay'];
                                             // $sumpaycost = $sumpaycost + $bv['payoncost'];
                                             $sumcostofactivity = $sumcostofactivity + $bv['costofactivity'];
                                             $sumcostofactivitycost = $sumcostofactivitycost + $bv['costofactivitypayoncost'];
                                             ?>
                                          <tr>
                                             <td>Band <?php echo $bv['name']; ?></td>
                                             <td> <?php echo $bv['ffunits']; ?> </td>
                                             <td> <?php echo $bv['nonffunits']; ?> </td>
                                             <td> <?php echo $bv['totalunitsof10']; ?> </td>
                                             <td> <?php echo $bv['totaltimeinhours']; ?> </td>
                                             <td> <?php echo $bv['pay']; ?> </td>
                                             <td> <?php echo $bv['payoncost']; ?> </td>
                                             <td> <?php echo $bv['costofactivity']; ?> </td>
                                             <td> <?php echo $bv['costofactivitypayoncost']; ?> </td>
                                          </tr>
                                          <?php } ?>
                                          <tr>
                                             <td colspan="5" > <strong>Total</strong> </td>
                                             <td><?php //echo $sumpay; ?></td>
                                             <td><?php //echo $sumpaycost; ?></td>
                                             <td><?php echo $sumcostofactivity; ?></td>
                                             <td><?php echo $sumcostofactivitycost; ?></td>
                                          </tr>
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                    <!-- </div> -->
                                 </div>
                              </div>
                              <div class="col-md-4" style="margin-top: 141px;">
                                 <div class="panel-body p-t-0">
                                    <!-- <div class="tableFixHead"> --> 
                                    <div class="row"  id="chartrows">
                                       <!-- </div> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="costbyserviceline">
                        <div class="panel panel-table">
                           <div class="panel-heading">
                              <div class="row">
                                 <div class="col-md-3">
                                    <form class="form-inline table-inline-filter">
                                       <div class="form-group" id="data_tables_buttons">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="panel-body p-t-0">
                                    <!-- <div class="tableFixHead"> -->
                                    <table id="examplea" class="table table-striped table-bordered" style="width:100%">
                                       <thead>
                                          <tr>
                                             <th colspan="5"></th>
                                             <th >Current AFC hourly pay scales £</th>
                                             <th colspan="3"></th>
                                          </tr>
                                          <tr>
                                             <th></th>
                                             <th>F:F units</th>
                                             <th>Non F:F units</th>
                                             <th>Total time in minutes (units x 10)</th>
                                             <th>Total time in hours</th>
                                             <th>Pay</th>
                                             <th>Pay + On-costs</th>
                                             <th>Cost per band using Pay</th>
                                             <th>Cost per Band using Pay and On costs </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php foreach($data['costbyserviceline'] as $k=>$v){ 
                                             $sumpay = 0;
                                             $sumpaycost = 0;
                                             $sumcostofactivity = 0;
                                             $sumcostofactivitycost = 0;
                                             ?>
                                          <tr>
                                             <td colspan="9"><strong><?php echo $v['name']; ?></strong></td>
                                          </tr>
                                          <?php foreach($v['bands'] as $bk=>$bv){ 
                                             //$sumpay = $sumpay + $bv['pay'];
                                             // $sumpaycost = $sumpaycost + $bv['payoncost'];
                                             $sumcostofactivity = $sumcostofactivity + $bv['costofactivity'];
                                             $sumcostofactivitycost = $sumcostofactivitycost + $bv['costofactivitypayoncost'];
                                             ?>
                                          <tr>
                                             <td>Band <?php echo $bv['name']; ?></td>
                                             <td> <?php echo $bv['ffunits']; ?> </td>
                                             <td> <?php echo $bv['nonffunits']; ?> </td>
                                             <td> <?php echo $bv['totalunitsof10']; ?> </td>
                                             <td> <?php echo $bv['totaltimeinhours']; ?> </td>
                                             <td> <?php echo $bv['pay']; ?> </td>
                                             <td> <?php echo $bv['payoncost']; ?> </td>
                                             <td> <?php echo $bv['costofactivity']; ?> </td>
                                             <td> <?php echo $bv['costofactivitypayoncost']; ?> </td>
                                          </tr>
                                          <?php } ?>
                                          <tr>
                                             <td colspan="5" > <strong>Total</strong> </td>
                                             <td><?php //echo $sumpay; ?></td>
                                             <td><?php //echo $sumpaycost; ?></td>
                                             <td><?php echo $sumcostofactivity; ?></td>
                                             <td><?php echo $sumcostofactivitycost; ?></td>
                                          </tr>
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                    <!-- </div> -->
                                 </div>
                              </div>
                              <div class="col-md-4" style="margin-top: 141px;">
                                 <div class="panel-body p-t-0">
                                    <!-- <div class="tableFixHead"> --> 
                                    <div class="row"  id="chartrowsserviceline">
                                       <!-- </div> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="overallcost">
                        <div class="panel panel-table">
                           <div class="panel-heading">
                              <div class="row">
                                 <div class="col-md-3">
                                    <form class="form-inline table-inline-filter">
                                       <div class="form-group" id="data_tables_buttons">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                           
                              <div class="col-md-6" style="margin-top: 141px;">
                                 <div class="panel-body p-t-0">
                                    <!-- <div class="tableFixHead"> --> 
                                    <div class="row"  id="chartrowsoverall">
                                       <!-- </div> -->
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6" style="margin-top: 141px;">
                                 <div class="panel-body p-t-0">
                                    <!-- <div class="tableFixHead"> --> 
                                    <div class="row"  id="chartrowsoverallserviceline">
                                       <!-- </div> -->
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="panel-body p-t-0">
                                    <!-- <div class="tableFixHead"> -->
                                    <table id="examplea" class="table table-striped table-bordered" style="width:100%">
                                       <thead> 
                                          <tr>
                                             <th></th> 
                                             <th>Total time in minutes (units x 10)</th> 
                                             <th>Total Cost </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php foreach($data['overall'] as $k=>$v){ 
                                             $sumpay = 0;
                                             $sumpaycost = 0;
                                             $sumcostofactivity = 0;
                                             $sumcostofactivitycost = 0;
                                             ?>
                                          <tr>
                                             <td colspan="3"><strong><?php echo $v['name']; ?></strong></td>
                                          </tr>
                                          <?php foreach($v['bands'] as $bk=>$bv){  
                                             $sumcostofactivitycost = $sumcostofactivitycost + $bv['costofactivitypayoncost'];
                                             ?>
                                          <tr>
                                             <td> <?php echo $bv['name']; ?></td> 
                                             <td> <?php echo $bv['totalunitsof10']; ?> </td> 
                                             <td> <?php echo $bv['costofactivitypayoncost']; ?> </td>
                                          </tr>
                                          <?php } ?>
                                          <tr>
                                             <td colspan="2" > <strong>Total</strong> </td> 
                                             <td><?php echo $sumcostofactivitycost; ?></td>
                                          </tr>
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                    <!-- </div> -->
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="panel-body p-t-0">
                                    <!-- <div class="tableFixHead"> -->
                                    <table id="examplea" class="table table-striped table-bordered" style="width:100%">
                                       <thead> 
                                          <tr>
                                             <th></th> 
                                             <th>Total time in minutes (units x 10)</th> 
                                             <th>Total Cost </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php //foreach($data['overallServiceLine'] as $k=>$v){ 
                                             $sumpay = 0;
                                             $sumpaycost = 0;
                                             $sumcostofactivity = 0;
                                             $sumcostofactivitycost = 0;
                                             ?>
                                          <tr>
                                             <td colspan="3"><strong> Service Line</strong></td>
                                          </tr>
                                          <?php foreach($data['overallServiceLine'] as $bk=>$bv){ 
                                             $sumcostofactivitycost = $sumcostofactivitycost + $bv['costofactivitypayoncost'];
                                             ?>
                                          <tr>
                                             <td> <?php echo $bv['name']; ?></td> 
                                             <td> <?php echo $bv['totalunitsof10']; ?> </td> 
                                             <td> <?php echo $bv['costofactivitypayoncost']; ?> </td>
                                          </tr>
                                          <?php } ?>
                                          <tr>
                                             <td colspan="2" > <strong>Total</strong> </td>  
                                             <td><?php echo $sumcostofactivitycost; ?></td>
                                          </tr>
                                          <?php //} ?>
                                       </tbody>
                                    </table>
                                    <!-- </div> -->
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
      <script src="<?php echo URL; ?>assets/plugins/highcharts/highcharts.js"></script>
      <script src="<?php echo URL; ?>assets/plugins/highcharts/modules/exporting.js"></script>
      <!-- custom -->
      <script src="<?php echo URL; ?>assets/js/app.js"></script>
      <script>
         $(function () {
         <?php foreach ($data['costbymedicalcode'] as $k => $v) { ?>
           
           $('#chartrows').append(` 
         		<div class="col-md-12">
         			<div class="panel panel-chart"> 
         				<div class="panel-body">
         					<div class="row" >
         						<div class="col-md-12 col-sm-12 text-center">
         							<div id="donut-chart-<?php echo $k+1;?>" style="height: 440px; min-width:90px; width:100%; margin:0px auto;"></div>
         						</div>  
         					</div>
         				</div>
         				<div class="panel-heading">
         					<div class="row">
         						<div class="col-md-12 col-sm-12  col-xs-3">
         							<h3 class="panel-title" id="sumofactivity<?php echo $k+1;?>"></h3>
         						</div>
         					</div>
         				</div>
         			</div>
         		</div> `) 
         
          drawChart(<?php echo $k+1; ?>, <?php echo json_encode($v['bands']); ?>)
         <?php } ?>  

         <?php foreach ($data['costbyserviceline'] as $k => $v) { ?>
           
           $('#chartrowsserviceline').append(` 
         		<div class="col-md-12">
         			<div class="panel panel-chart"> 
         				<div class="panel-body">
         					<div class="row" >
         						<div class="col-md-12 col-sm-12 text-center">
         							<div id="donut-chart-service-<?php echo $k+1;?>" style="height: 440px; min-width:90px; width:100%; margin:0px auto;"></div>
         						</div>  
         					</div>
         				</div>
         				<div class="panel-heading">
         					<div class="row">
         						<div class="col-md-12 col-sm-12  col-xs-3">
         							<h3 class="panel-title" id="sumofactivityservice<?php echo $k+1;?>"></h3>
         						</div>
         					</div>
         				</div>
         			</div>
         		</div> `) 
         
          drawChartService(<?php echo $k+1; ?>, <?php echo json_encode($v['bands']); ?>)
         <?php } ?>  

         <?php foreach ($data['overall'] as $k => $v) { ?>
           
           $('#chartrowsoverall').append(` 
         		<div class="col-md-12">
         			<div class="panel panel-chart"> 
         				<div class="panel-body">
         					<div class="row" >
         						<div class="col-md-12 col-sm-12 text-center">
         							<div id="donut-chart-overall-<?php echo $k+1;?>" style="height: 640px; min-width:90px; width:100%; margin:0px auto;"></div>
         						</div>  
         					</div>
         				</div>
         				<div class="panel-heading">
         					<div class="row">
         						<div class="col-md-12 col-sm-12  col-xs-3">
         							<h3 class="panel-title" id="sumofactivityoverall<?php echo $k+1;?>"></h3>
         						</div>
         					</div>
         				</div>
         			</div>
         		</div> `) 
         
          drawChartOverall(<?php echo $k+1; ?>, <?php echo json_encode($v['bands']); ?>)
         <?php } ?>  

         <?php //foreach ($data['overallServiceLine'] as $k => $v) { ?>
           
           $('#chartrowsoverallserviceline').append(` 
         		<div class="col-md-12">
         			<div class="panel panel-chart"> 
         				<div class="panel-body">
         					<div class="row" >
         						<div class="col-md-12 col-sm-12 text-center">
         							<div id="donut-chart-overallserviceline-1" style="height: 640px; min-width:90px; width:100%; margin:0px auto;"></div>
         						</div>  
         					</div>
         				</div>
         				<div class="panel-heading">
         					<div class="row">
         						<div class="col-md-12 col-sm-12  col-xs-3">
         							<h3 class="panel-title" id="sumofactivityoverallserviceline1"></h3>
         						</div>
         					</div>
         				</div>
         			</div>
         		</div> `) 
         
          drawChartOverallServiceLine(1, <?php echo json_encode($data['overallServiceLine']); ?>)
         <?php //} ?>  

         });
         
         function drawChart(chartid, mData){
             // console.log(mData[1].costofactivity);
         		let sum = mData.reduce(function(acc, curr){ 
            		return acc + parseFloat(curr.costofactivitypayoncost);
         		}, 0);			 
         		$('#sumofactivity'+chartid).text("Pay + On Cost = "+sum);
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
         			 showInLegend: false
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
         					['Band 1',   parseFloat(mData[0].totalunitsof10)], 
         					['Band 2',   parseFloat(mData[1].totalunitsof10)], 
         					['Band 3',   parseFloat(mData[2].totalunitsof10)], 
         					['Band 4',   parseFloat(mData[3].totalunitsof10)], 
         					['Band 5',   parseFloat(mData[4].totalunitsof10)], 
         					['Band 6',   parseFloat(mData[5].totalunitsof10)], 
         					['Band 7',   parseFloat(mData[6].totalunitsof10)], 
         					['Band 8',   parseFloat(mData[7].totalunitsof10)], 
         
         	      ]
         	    }]
         	});  
         }

         function drawChartService(chartid, mData){
             // console.log(mData[1].costofactivity);
         		let sum = mData.reduce(function(acc, curr){ 
            		return acc + parseFloat(curr.costofactivitypayoncost);
         		}, 0);			 
               let mDataNew = mData.map(function(ele){
                  return [ele.name, parseFloat(ele.totalunitsof10)]
               });
         		$('#sumofactivityservice'+chartid).text("Pay + On Cost = "+sum);
         		$('#donut-chart-service-'+chartid).highcharts({
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
         			 showInLegend: false
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
         	        data: mDataNew
         	    }]
         	});  
         }

         function drawChartOverall(chartid, mData){ 
               let mDataNew = mData.map(function(ele){
                  return [ele.name, parseFloat(ele.totalunitsof10)]
               });
               
         		let sum = mData.reduce(function(acc, curr){ 
            		return acc + parseFloat(curr.costofactivitypayoncost);
         		}, 0);			 
         		$('#sumofactivityoverall'+chartid).text("Pay + On Cost = "+sum);
         		$('#donut-chart-overall-'+chartid).highcharts({
         		colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
         	    chart: {
         	        type: 'pie'
         	    },
         
         	    plotOptions: {
         	        pie: {
         	            //innerSize: '70%',
         				cursor: 'pointer',
         				dataLabels: {
         					enabled: false,
         					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
         
         				},
            			 showInLegend: true
         	        }
         	    },
         
                 title: {
         			text: 'Total Cost'
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
         	        data:  mDataNew 
         	    }]
         	});  
         }

         function drawChartOverallServiceLine(chartid, mData){ 
               let mDataNew = mData.map(function(ele){
                  return [ele.name, parseFloat(ele.totalunitsof10)]
               });
         		let sum = mData.reduce(function(acc, curr){ 
            		return acc + parseFloat(curr.costofactivitypayoncost);
         		}, 0);			 
         		$('#sumofactivityoverallserviceline'+chartid).text("Pay + On Cost = "+sum);
         		$('#donut-chart-overallserviceline-'+chartid).highcharts({
         		colors: ['#2196f3', '#8bc34a', '#ffc107', '#37474f', '#c5dfdf', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'],
         	    chart: {
         	        type: 'pie'
         	    },
         
         	    plotOptions: {
         	        pie: {
         	            //innerSize: '70%',
         				cursor: 'pointer',
         				dataLabels: {
         					enabled: false,
         					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
         
         				},
            			 showInLegend: true
         	        }
         	    },
         
                 title: {
         			text: 'Total Cost by Service Line'
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
         	        data: mDataNew
         	    }]
         	});  
         }
         
         
         function deleteEntry(id){
          	var r = confirm("Are You sure You want to delete this Stats???");
           if (r == true) {
             $.ajax({
         			url: "<?php echo URL; ?>listing/delete.php",
         			type: "POST",
         		  data: {id : id,cat:'stats_new'},
         			cache: false,
         			success: function(response){
         				 console.log(response);
         				 setTimeout(() => {
         					 location.reload();
         					 
         				 }, 500);
         			}
         		});
           } 
         }
         
         function editEntry(id){
         }
         $(document).ready(function() {
         $("#newpatient").change(function() {
             if(this.checked) {
         			// $('#responsetimediv').removeClass('hide');
               $("#newpatient").val(1);
             }else{
         			// $('#responsetimediv').addClass('hide');
               $("#newpatient").val(0);
         		}
         });
         $("#unmeet_needs").change(function() {
             if(this.checked) { 
               $("#unmeet_needs").val(1);
             }else{ 
               $("#unmeet_needs").val(0);
         		}
         });
         $("#direct_contacts").change(function() {
             if(this.checked) { 
               $("#direct_contacts").val(1);
             }else{ 
               $("#direct_contacts").val(0);
         		}
         });
         
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