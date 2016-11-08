<!-- FORM -->
<!-- layout receipent -->
<form id="myForm" name="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">	
	<div class="panel-heading"> 
		<div class="panel-options">						
			<ul class="nav nav-tabs">				<li class="active"><a data-toggle="tab" href="#tab-3"><i class="fa fa-th"></i>Komponen Gaji</a></li>
			</ul>
		</div>
	</div>
	<div class="panel-body">
		<div class="tab-content">			<div id="tab-3" class="tab-pane active">				<div id="formcontent" class="col-lg-12 table-responsive">					<?php include("komponen.php");?> 				</div>  
			</div>
		</div> 
	</div>
</form>
<!-- END FORM -->
<script>
<?php include("form.js");?>
</script>
