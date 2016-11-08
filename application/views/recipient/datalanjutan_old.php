<div class="panel-heading"> 
		<div class="panel-options">						
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab-keluarga"><i class="fa fa-th"></i>Keluarga</a></li>
				<li class=""><a data-toggle="tab" href="#tab-pendidikan"><i class="fa fa-th"></i>Pendidikan</a></li>
				<li class=""><a data-toggle="tab" href="#tab-pendidikannf"><i class="fa fa-th"></i>Pendidikan Non Formal</a></li>				
			</ul>
		</div>
</div>
<div class="panel-body">
	<div class="tab-content">
		<div id="tab-keluarga" class="tab-pane active">	
			<?php include("keluarga/index.php");?>	
		</div>
		<div id="tab-pendidikan" class="tab-pane">	
			<?php include("pendidikan/index.php");?>				
		</div>
		<div id="tab-pendidikannf" class="tab-pane">	
			<?php include("pendidikannf/index.php");?>				
		</div>
	</div>
</div>		

<div class="panel-heading"> 
		<div class="panel-options">						
			<ul class="nav nav-tabs"> 
				<li class="active"><a data-toggle="tab" href="#tab-pengalamanorg"><i class="fa fa-th"></i>Organisasi</a></li> 
				<li class=""><a data-toggle="tab" href="#tab-pengalamankrj"><i class="fa fa-th"></i>Pengalaman Kerja</a></li>
				<li class=""><a data-toggle="tab" href="#tab-volunteer"><i class="fa fa-th"></i>Volunteer</a></li>
				<li class=""><a data-toggle="tab" href="#tab-prestasi"><i class="fa fa-th"></i>Prestasi</a></li>
			</ul>
		</div>
</div>
<div class="panel-body">
	<div class="tab-content">
		<div id="tab-pengalamanorg" class="tab-pane active">	
			<?php include("organisasi/index.php");?>				
		</div>
		<div id="tab-pengalamankrj" class="tab-pane">		
			<?php include("kerja/index.php");?>		
		</div>
		<div id="tab-volunteer" class="tab-pane">	
			<?php include("volunteer/index.php");?>					
		</div>
		<div id="tab-prestasi" class="tab-pane">	
			<?php include("prestasi/index.php");?>					
		</div>
	</div>
</div>	