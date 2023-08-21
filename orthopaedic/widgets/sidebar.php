<?php 
	$req = explode('/',$_SERVER['REQUEST_URI']);
	$orthotics = '';
	$mobility = '';
	$report = '';
	$itemisedreport = '';
	$exceldata = '';
	if(isset($req[2]) && $req[2] === 'ortho.php'){
		$mobility = 'active';
	}elseif(isset($req[2]) && $req[2] === 'itemisedreport.php'){
		$itemisedreport = 'active';
	}elseif(isset($req[2]) && $req[2] === 'orthotics.php'){
		$orthotics = 'active';
	}elseif(isset($req[2]) && $req[2] === 'exceldata.php'){
		$exceldata = 'active';
	}else{
		$report = 'active';
	}
?>
<button type="button" id="close-sidebarmenu" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">cancel</i></button>

<a class="navbar-brand" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>assets/images/orthotics.jpg" alt="New | Clinic" /></a>
				<div class="clearfix"></div>
<div class="sidebar-wrapper">
	<ul class="nav nav-sidebar">
		<!-- <li class=""><a href="<?php echo URL; ?>"><i class="material-icons">dashboard</i> Activity by Ward</a></li> -->
		<li class="<?php echo $orthotics; ?>"><a href="<?php echo URL; ?>orthopaedic/orthotics.php"><i class="material-icons">dashboard</i> Orthotics Issued</a></li>


		<li class="<?php echo $report; ?>"><a href="<?php echo URL; ?>orthopaedic/weeklyreport.php"><i class="material-icons">description</i> Weekly Report</a></li>
		
		<li class="<?php echo $itemisedreport; ?>"><a href="<?php echo URL; ?>orthopaedic/itemisedreport.php"><i class="material-icons">description</i> Itemised Report</a></li> 

		<li class="<?php echo $exceldata; ?>"><a href="<?php echo URL; ?>orthopaedic/exceldata.php"><i class="material-icons">dashboard</i> Excel Data</a></li>
		
		<li><a id="submenu-view-2" href="javascript:void(0);"><i class="material-icons">group</i> Setting <span class="fa fa-caret-right more-icon"></span></a></li>

	</ul>
		<div class="submenu-div-2">
	
		<a href="javascript:void(0);" class="back-icon" id="back_main_menu_2"><i class="material-icons">arrow_back</i> Back</a>
		<ul class="nav nav-sidebar">
			<li><a href="<?php echo URL; ?>"><i class="fa fa-circle"></i> Stats App</a></li>
			<li><a href="<?php echo URL; ?>mobility/mobility.php"><i class="fa fa-circle"></i> Millbrook App</a></li>
			<li class="active"><a href="<?php echo URL; ?>orthopaedic/ortho.php"><i class="fa fa-circle"></i> Orthotics app</a></li> 
			
			<li class="<?php echo $mobility; ?>"><a href="<?php echo URL; ?>orthopaedic/ortho.php"><i class="material-icons">dashboard</i> Orthopaedic Products</a></li>
		
		</ul>
	</div>	
</div>
