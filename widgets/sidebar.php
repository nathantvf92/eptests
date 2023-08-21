<?php 
$arryuri = explode('/',$_SERVER['REQUEST_URI']);
$myurl = end($arryuri);
// print_r(end($arryuri)); exit;
?>
<button type="button" id="close-sidebarmenu" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">cancel</i></button>

<a class="navbar-brand" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>assets/images/logo.png" alt="New | Clinic" /></a>
				<div class="clearfix"></div>
<div class="sidebar-wrapper">
	<ul class="nav nav-sidebar">
	
		<li class="<?php if($myurl == 'allstats.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>allstats.php"><i class="material-icons">done_all</i> Input Stats</a></li> 
		
		<li class="<?php if($myurl == 'medicalcost.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>medicalcost.php"><i class="material-icons">summarize</i> Cost by Medical Code Report</a></li> 

		<li><a id="#" href="javascript:void(0);"><i class="material-icons">rowing</i> Activity By: </a></li>
			<li class="<?php if($myurl == ''){ echo "active"; } ?>" title=""><a href="<?php echo URL; ?>"><i class="fa fa-minus" style="margin-left: 39px;"></i> Ward</a></li>
			<li class="<?php if($myurl == 'activitylevels.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>activitylevels.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Team</a></li> 
			<li class="<?php if($myurl == 'activitybybands.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>activitybybands.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Band</a></li> 
			<li class="<?php if($myurl == 'wardcodestates.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>wardcodestates.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Main Speciality Code</a></li>			
			<li  class="<?php if($myurl == 'activitybyserviceline.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>activitybyserviceline.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Service line</a></li>

		<li><a id="" href="javascript:void(0);"><i class="material-icons">euro_symbol</i> Cost By: </a></li>
			<li class="<?php if($myurl == 'costbymedicalcode.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>costbymedicalcode.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Medical Code</a></li> 
			<li><a href="#"><i class="fa fa-minus" style="margin-left: 39px;"></i> Service Line</a></li>  


			<li><a id="#" href="javascript:void(0);"><i class="material-icons">speed</i> Benchmarking Data: </a></li> 
			<li class="<?php if($myurl == 'newpatients.php'){ echo "active"; } ?>" title="New Patient info"><a href="<?php echo URL; ?>newpatients.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> New Patient info</a></li> 
			<li class="<?php if($myurl == 'directcontacts.php'){ echo "active"; } ?>" title="Direct and Indirect contacts"><a href="<?php echo URL; ?>directcontacts.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Direct and Indirect contacts</a></li>  
			<li class="<?php if($myurl == 'dischargeandoutcomes.php'){ echo "active"; } ?>" title="Discharge and Outcomes"><a href="<?php echo URL; ?>dischargeandoutcomes.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Discharge and Outcomes</a></li>  


		<li class="<?php if($myurl == 'exceldata.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>exceldata.php"><i class="material-icons">description</i> Raw Data Log</a></li> 
 
		<li><a id="submenu-view-2" href="javascript:void(0);"><i class="material-icons">settings:</i> Setting </a></li>
			<li  class="<?php if($myurl == 'disciplines.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/disciplines.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Discipline</a></li> 
			<li class="<?php if($myurl == 'bands.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/bands.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Band</a></li> 
			<li class="<?php if($myurl == 'teams.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/teams.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Team</a></li> 
			<li class="<?php if($myurl == 'wards.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/wards.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Ward</a></li> 
			<li class="<?php if($myurl == 'nationalcode.php'){ echo "active"; } ?>" title="Main Speciality Code" ><a href="<?php echo URL; ?>listing/nationalcode.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Main Speciality Code</a></li> 
			<li class="<?php if($myurl == 'periodoftherapy.php'){ echo "active"; } ?>" title="Period of Therapy" ><a href="<?php echo URL; ?>listing/periodoftherapy.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Period of Therapy</a></li> 
			<li class="<?php if($myurl == 'dischargeoutcomes.php'){ echo "active"; } ?>" title="Discharge Outcomes" ><a href="<?php echo URL; ?>listing/dischargeoutcomes.php"><i class="fa fa-minus" style="margin-left: 39px;"></i> Discharge Outcomes</a></li> 

	</ul>
	  

</div>
