<!-- FORM -->
<form id="myForm" name="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">	
	<div class="panel-heading"> 
		<div class="panel-options">						
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i>Entri</a></li>
				<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-th"></i>Browse</a></li>
			</ul>
		</div>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="tab-1" class="tab-pane active">
				 	<div class="form-group"><label class="col-sm-2 control-label">Judul Template</label>
						<div class="col-sm-10"><input type="text" id="txt_judul" name="txt_judul" class="form-control"></div>
					</div>
					<div class="form-group"> 
					 	<script type="text/javascript" src="<?php echo base_url();?>assets/library/tinymce/js/tinymce/tinymce.min.js"></script>
						<script>
						tinymce.init({
						    selector: "textarea#elm1",
						    theme: "modern", 
						    height: 300,
						    plugins: [
						         "advlist autolink link jwifm image lists charmap print preview hr anchor pagebreak spellchecker",
						         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
						         "save table contextmenu directionality emoticons template paste textcolor"
						   ],
						   content_css: "css/content.css",
						   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link  | print preview media fullpage | forecolor backcolor emoticons | jwifm", 
						   style_formats: [
						        {title: 'Bold text', inline: 'b'},
						        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
						        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
						        {title: 'Example 1', inline: 'span', classes: 'example1'},
						        {title: 'Example 2', inline: 'span', classes: 'example2'},
						        {title: 'Table styles'},
						        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
						    ]
						 }); 
						</script>
						
						<!-- place in body of your html document -->
						<div class="col-lg-12">
							<input type="hidden" id="txt_regid" name="txt_regid" class="form-control">
							<input type="hidden" id="txt_area" name="txt_area" class="form-control">
							<textarea id="elm1" name="input_area"></textarea>
						</div>  
					</div>  
					<div class="form-group">
					<div class="col-sm-12">					
				        <button class="btn btn-primary" type="button" onclick="form_save()">Save Template</button> 
				    	<button class="btn btn-white" type="button" onclick="form_reset()">Cancel</button> 
				   	</div>
				</div>
			</div> 
			<div id="tab-2" class="tab-pane">
				 <div class="col-sm-7  pull-right">
	                <div class="input-group">
	                	<input type="text" id="txt_search" name="txt_search" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                    <button type="button" id="btnSearch" class="btn btn-sm btn-primary" onclick="form_search()"> Go!</button> </span>
	               	</div>
	          	</div>
	                        
				<div id="formcontent" class="col-lg-12 table-responsive">
					<?php include("datatable.php");?> 
				</div>  
			</div>
		</div> 
	</div>
</form>
<!-- END FORM -->
<script>
<?php include("form.js");?>
</script>

 
