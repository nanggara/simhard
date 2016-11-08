<div id="modal-form-goldar" class="modal fade" aria-hidden="true">
	<div class="modal-dialog" style="width:40%;"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Goldar</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBar-goldar" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Goldar dibawah ini</p>
							<div id="alertMsggoldar" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosegoldar" aria-hidden="true" class="close" type="button" onclick="goldar_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextgoldar">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<input type="hidden" id="txt_kodegoldar" name="txt_kodegoldar" class="form-control">	                        	
	                        </div>                            
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_goldarmodal" name="txt_goldarmodal" placeholder="Input goldar" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="goldar_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="goldar_init();form_get_goldar();$('#modal-form-goldar').modal('hide');"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-goldar" name="txt_search-goldar" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchgoldar" class="btn btn-sm btn-primary" onclick="goldar_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentgoldar" class="table-responsive">
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
