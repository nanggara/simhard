<div id="modal-form-universitas" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Universitas</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBar-universitas" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Kelompok dibawah ini</p>
							<div id="alertMsguniversitas" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertCloseuniversitas" aria-hidden="true" class="close" type="button" onclick="universitas_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextuniversitas">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<input type="hidden" id="txt_kodeuniversitas" name="txt_kodeuniversitas" class="form-control">
	                        	<input type="text" id="txt_universitassingkatan" name="txt_universitassingkatan" placeholder="Input singkatan universitas" class="form-control">
	                        </div>                            
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_universitasmodal" name="txt_universitasmodal" placeholder="Input universitas" class="form-control">
	                        </div> 
	                        <div class="form-group"> 
								   <div style="position:relative;">
									<a class='btn btn-success btn-sm' href='javascript:;'>
										Pilih Photo
										<input type="file" name="fileToUploadUni" id="fileToUploadUni" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info-uni").html($(this).val());'>
									</a>
									<br><br>
									<span class='label label-default' id="upload-file-info-uni"></span>
								</div> 					   
							</div>
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="form_on_upload_universitas()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="universitas_init();form_get_universitas();$('#modal-form-universitas').modal('hide');"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-universitas" name="txt_search-universitas" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchUniversitas" class="btn btn-sm btn-primary" onclick="universitas_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentuniversitas" class="table-responsive">
							 	<?php include("datatable.php");?> 		     
							</div> 
						</div>
	               	</div>
               	</form>
        	</div>
		</div>
	</div>
</div>
<script>
 <?php include("form.js");?> 
</script>
