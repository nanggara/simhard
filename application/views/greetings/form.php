<!-- FORM -->
<form id="myForm" name="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">	
    <div class="form-group"><label class="col-sm-2 control-label">Judul Greeting</label>
		<div class="col-sm-10"><input type="text" id="txt_judul" name="txt_judul" class="form-control"></div>
	</div>
	
	<div class="form-group"><label class="col-sm-2 control-label">From</label>
		<div class="col-sm-10"><input type="text" id="txt_from" name="txt_from" class="form-control"></div>
	</div>
	
	<div class="form-group"><label class="col-sm-2 control-label">Bcc</label>
		<div class="col-sm-10"><input type="text" id="txt_bcc" name="txt_bcc" class="form-control"></div>
	</div> 
	
	<div class="form-group"><label class="col-sm-2 control-label">Status</label>
		<div class="col-sm-10">
			<select id="chk_aktif" name="chk_aktif" class="form-control"> 
			 <option value="1">Aktif</option>
			 <option value="0">Non Aktif</option> 			
			</select> 
		</div>
	</div> 
	
	<div class="form-group">
			<div class="col-lg-2">&nbsp;</div>			
			<div class="col-sm-10"> 
					<div id="uploadFile_div" style="position:relative;">
						<a class='btn btn-xs btn-warning' href='javascript:;'>
							Attachment
							<input type="file" name="fileToUploadPh" id="fileToUploadPh" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
						</a> 
						<span class='label label-default' id="upload-file-info"></span>
					</div>							
			</div>		
	</div>									    
	<div class="form-group">  			
			<div class="col-lg-12">
				    <script type="text/javascript" src="<?php echo base_url();?>assets/library/tinymce/js/tinymce/tinymce.min.js"></script>
					<input type="hidden" id="txt_regid" name="txt_regid" class="form-control">
					<input type="hidden" id="txt_area" name="txt_area" class="form-control">
					<textarea id="elm1" name="input_area"></textarea>
			</div>  				
	</div>  
					
	<div class="form-group">
		<div class="col-sm-12">					
			<button class="btn btn-primary" type="button" onclick="form_on_upload()">Save Greeting</button>
		</div>				   
	</div>
			 
</form>
<!-- END FORM -->
<script>
<?php include("form.js");?>
</script>

 
