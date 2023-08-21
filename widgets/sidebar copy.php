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

		<li><a id="submenu-view-3" href="javascript:void(0);"><i class="material-icons">rowing</i> Activity By <span class="fa fa-caret-right more-icon"></span></a>
			
		<!-- <ul class="nav nav-sidebar">
			<li class="<?php //if($myurl == 'allstats.php'){ echo "active"; } ?>" ><a href="<?php //echo URL; ?>allstats.php"><i class="material-icons">done_all</i> Input Stats</a></li> 
		</ul> -->
		
		</li>

		<li><a id="submenu-view-4" href="javascript:void(0);"><i class="material-icons">euro_symbol</i> Cost By <span class="fa fa-caret-right more-icon"></span></a></li>

		<li><a id="submenu-view-5" href="javascript:void(0);"><i class="material-icons">speed</i> Benchmarking Data <span class="fa fa-caret-right more-icon"></span></a></li>
		<!-- <li class=""><a href="<?php //echo URL; ?>"><i class="material-icons">dashboard</i> Activity by Ward</a></li> -->
		<!-- <li class=""><a href="<?php //echo URL; ?>wardcodestates.php"><i class="material-icons">dashboard</i> Activity by Code</a></li> -->
		<!-- <li class=""><a href="<?php //echo URL; ?>costbymedicalcode.php"><i class="material-icons">dashboard</i> Cost By Medical Code</a></li> -->
		<!-- <li class=""><a href="<?php //echo URL; ?>activitylevels.php"><i class="material-icons">dashboard</i> Activity by Team</a></li> -->
		<!-- <li class=""><a href="<?php //echo URL; ?>activitybybands.php"><i class="material-icons">dashboard</i> Activity by Band</a></li> -->
		<!-- <li class=""><a href="<?php //echo URL; ?>newpatients.php"><i class="material-icons">dashboard</i> New Patient activity</a></li>  -->
		<!-- <li class=""><a href="<?php //echo URL; ?>directcontacts.php"><i class="material-icons">dashboard</i> Benchmarking Activity</a></li> -->
		<!-- <li class=""><a href="<?php //echo URL; ?>activitybyserviceline.php"><i class="material-icons">dashboard</i> Activity by Service lines</a></li> -->
		<!-- <li class=""><a href="<?php //echo URL; ?>dischargeandoutcomes.php"><i class="material-icons">dashboard</i> Discharge and Outcomes</a></li>  -->
		<li class="<?php if($myurl == 'exceldata.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>exceldata.php"><i class="material-icons">description</i> Raw Data Log</a></li> 
		<li><a id="submenu-view-2" href="javascript:void(0);"><i class="material-icons">settings</i> Setting <span class="fa fa-caret-right more-icon"></span></a></li>
	</ul>
	 

	<div class="submenu-div-2 <?php if(in_array($myurl, array('disciplines.php','bands.php','teams.php','wards.php','nationalcode.php','periodoftherapy.php','dischargeoutcomes.php'))){ echo "open"; } ?>">
		<a href="javascript:void(0);" class="back-icon" id="back_main_menu_2"><i class="material-icons">arrow_back</i> Back</a>
		<ul class="nav nav-sidebar">
			<!-- <li class="active"><a href="<?php //echo URL; ?>"><i class="fa fa-circle"></i> Stats App</a></li> -->
			<!-- <li><a href="<?php //echo URL; ?>mobility/mobility.php"><i class="fa fa-circle"></i> Millbrook App</a></li> -->
			<!-- <li><a href="<?php //echo URL; ?>orthopaedic/ortho.php"><i class="fa fa-circle"></i> Orthotics app</a></li>  -->
			<li  class="<?php if($myurl == 'disciplines.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/disciplines.php"><i class="fa fa-circle"></i> Discipline</a></li> 
			<li class="<?php if($myurl == 'bands.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/bands.php"><i class="fa fa-circle"></i> Band</a></li> 
			<li class="<?php if($myurl == 'teams.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/teams.php"><i class="fa fa-circle"></i> Team</a></li> 
			<li class="<?php if($myurl == 'wards.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/wards.php"><i class="fa fa-circle"></i> Ward</a></li> 
			<li class="<?php if($myurl == 'nationalcode.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/nationalcode.php"><i class="fa fa-circle"></i> Main Speciality Code</a></li> 
			<li class="<?php if($myurl == 'periodoftherapy.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/periodoftherapy.php"><i class="fa fa-circle"></i> Period of Therapy</a></li> 
			<li class="<?php if($myurl == 'dischargeoutcomes.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>listing/dischargeoutcomes.php"><i class="fa fa-circle"></i> Discharge Outcomes</a></li> 
		</ul>
	</div>	

	<div class="submenu-div-3 <?php if(in_array($myurl, array('activitylevels.php','activitybybands.php','wardcodestates.php','activitybyserviceline.php')) || $myurl == ""){ echo "open"; } ?>">
		<a href="javascript:void(0);" class="back-icon" id="back_main_menu_3"><i class="material-icons">arrow_back</i> Back</a>
		<ul class="nav nav-sidebar"> 
			<li class="<?php if($myurl == ''){ echo "active"; } ?>"><a href="<?php echo URL; ?>"><i class="fa fa-circle"></i> Ward</a></li> 
			<li class="<?php if($myurl == 'activitylevels.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>activitylevels.php"><i class="fa fa-circle"></i> Team</a></li> 
			<li class="<?php if($myurl == 'activitybybands.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>activitybybands.php"><i class="fa fa-circle"></i> Band</a></li> 
			<li class="<?php if($myurl == 'wardcodestates.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>wardcodestates.php"><i class="fa fa-circle"></i> Main Speciality Code</a></li> 
			<li  class="<?php if($myurl == 'activitybyserviceline.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>activitybyserviceline.php"><i class="fa fa-circle"></i> Service line</a></li> 
		</ul>
	</div>	

	<div class="submenu-div-4 <?php if(in_array($myurl, array('costbymedicalcode.php'))){ echo "open"; } ?>">
		<a href="javascript:void(0);" class="back-icon" id="back_main_menu_4"><i class="material-icons">arrow_back</i> Back</a>
		<ul class="nav nav-sidebar"> 
			<li class="<?php if($myurl == 'costbymedicalcode.php'){ echo "active"; } ?>" ><a href="<?php echo URL; ?>costbymedicalcode.php"><i class="fa fa-circle"></i> Medical Code</a></li> 
			<li><a href="#"><i class="fa fa-circle"></i> Service Line</a></li>  
		</ul>
	</div>	

	<div class="submenu-div-5 <?php if(in_array($myurl, array('newpatients.php','directcontacts.php','dischargeandoutcomes.php'))){ echo "open"; } ?>">
		<a href="javascript:void(0);" class="back-icon" id="back_main_menu_5"><i class="material-icons">arrow_back</i> Back</a>
		<ul class="nav nav-sidebar"> 
			<li class="<?php if($myurl == 'newpatients.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>newpatients.php"><i class="fa fa-circle"></i> New Patient info</a></li> 
			<li class="<?php if($myurl == 'directcontacts.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>directcontacts.php"><i class="fa fa-circle"></i> Direct and Indirect contacts</a></li>  
			<li class="<?php if($myurl == 'dischargeandoutcomes.php'){ echo "active"; } ?>"><a href="<?php echo URL; ?>dischargeandoutcomes.php"><i class="fa fa-circle"></i> Discharge and Outcomes</a></li>  
		</ul>
	</div>	

</div>
