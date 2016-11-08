<div id="modal-form-upload" class="modal fade" aria-hidden="true"  enctype="multipart/form-data">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-12">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b"><i class="fa fa-user"></i>&nbsp;Photo Profil</h3></td> 
	                			</tr>
	                		</table>
							<p>Silahkan pilih photo profil anda.</p> 
							<div style="padding-top:10px;">
							    <div style="position:relative;">
									<a class='btn btn-success btn-sm' href='javascript:;'>
										Pilih Photo
										<input type="file" name="fileToUploadPh" id="fileToUploadPh" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
									</a>
									<br><br>
									<span class='label label-default' id="upload-file-info"></span>
								</div>
							</div>
	                   	</div>
	                    <!-- <div class="col-sm-6"> 
	                    	<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b"><i class="fa fa-file"></i>&nbsp;Upload CV</h3></td> 
	                			</tr>
	                		</table>
							<p>Silahkan pilih CV anda.</p> 
							<div style="padding-top:10px;">
							    <div style="position:relative;">
									<a class='btn btn-warning btn-sm' href='javascript:;'>
										Pilih Photo
										<input type="file" name="fileToUploadCv" id="fileToUploadCv" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info-cv").html($(this).val());'>
									</a>
									<br><br>
									<span class='label label-default' id="upload-file-info-cv"></span>
								</div>
							</div>
						</div>
						 -->
	               	</div>
               	</form>
        	</div>
        	<div class="modal-footer">	  
        		<div class="col-lg-6 text-left">     
	        		<img id="loading-dialog" src="<?php echo base_url();?>assets/themes/inspinia/images/ajax-loader.gif"> 
		        	<div id="alertMsgDialog" class="alert alert-warning alert-dismissable text-left hide">	                 
		               	<i class="fa fa-bullhorn"></i>
		               	<small id="alertTextDialog">Data telah disimpan.</small>
		           	</div>  
	        	</div>
	        	<div class="col-lg-6">
		        	<button type="button" class="btn btn-primary" onclick="form_on_upload()">Mulai Upload</button>
		        	<button type="button" class="btn btn-default" onclick='show_alert_dialog("");$("#modal-form-upload").modal("hide");'>Close</button>
	        	</div>
	     	</div>
		</div>
	</div>
</div>
<script>
 <?php include("form.js");?> 
</script>
