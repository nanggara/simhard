<!-- FORM -->
<form id="myForm" name="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">	
	<div class="panel-heading"> 
		<div class="panel-options">						
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i>Entri</a></li>
				<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-th"></i>Browse</a></li>
				<li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-th"></i>Ganti Background</a></li>
			</ul>
		</div>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="tab-1" class="tab-pane active">
				<div class="form-group text-left">   
					<div class="col-sm-12"> 
							<div class="form-group"><label class="col-sm-3 control-label">Nama User</label>
								<div class="col-sm-9"> 
									<input type="hidden" id="txt_userid" name="txt_userid" class="form-control">
									<input type="text" id="txt_namauser" name="txt_namauser" class="form-control">
								</div>
							</div> 					                                
							<div class="form-group"><label class="col-sm-3 control-label">Password</label>
								<div class="col-sm-9"><input type="password" id="txt_password" name="txt_password" class="form-control"></div>
							</div>   
							<div class="form-group"><label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-9"><input type="text" id="txt_email" name="txt_email" class="form-control"></div>
							</div>  
							<div class="form-group"><label class="col-sm-3 control-label">Hak Akses</label>
								<div class="col-sm-9">
									<select id="div_grup" name="div_grup" class="form-control"> 
							    		<?php foreach($ddl_datazgrup->result() as $kelIns) {?>
							        		<option value="<?php echo $kelIns->grupid;?>"><?php echo $kelIns->namagrup;?></option> 
							           	<?php }?>
							      	</select> 
								</div> 
							</div>  
					</div>
				</div>
				 
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">					
				        <button class="btn btn-primary" type="button" onclick="form_save()">Save</button> 
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
	            <div class="col-lg-12">&nbsp;</div>            
				<div id="formcontent" class="col-lg-12 table-responsive">
					<?php include("datatable.php");?> 
				</div>  
			</div>
			<div id="tab-3" class="tab-pane"> 
					<p>Silahkan pilih gambar background.</p> 
					<div style="padding-top:10px;">
					<div style="position:relative;">
						<a class='btn btn-success btn-sm' href='javascript:;'>
							Pilih Photo
							<input type="file" name="fileToUpload" id="fileToUpload" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
						</a>
						<br><br>
						<span class='label label-default' id="upload-file-info"></span>
						</div>
					</div>
					<button id="btnMulaiUpload" type="button" class="btn btn-primary" onclick="form_on_upload()">Mulai Upload</button> 
					<img id="loadingUpload" src="<?php echo base_url()?>assets/themes/inspinia/images/ajax-loader.gif">
			</div>
		</div> 
	</div>
</form>
<!-- END FORM -->
<script>
<?php include("form.js");?>
</script>
