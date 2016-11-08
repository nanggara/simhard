<div id="modal-form-pekerjaan" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Pekerjaan</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBar-pekerjaan" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi pekerjaan dibawah ini</p>
							<div id="alertMsgpekerjaan" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosepekerjaan" aria-hidden="true" class="close" type="button" onclick="pekerjaan_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextpekerjaan">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<input type="hidden" id="txt_kodepekerjaan" name="txt_kodepekerjaan" class="form-control">	                        	
	                        </div>                            
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_pekerjaanmodal" name="txt_pekerjaanmodal" placeholder="Input pekerjaan" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="pekerjaan_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="pekerjaan_init();form_get_pekerjaan();$('#modal-form-pekerjaan').modal('hide');"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-pekerjaan" name="txt_search-pekerjaan" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchpekerjaan" class="btn btn-sm btn-primary" onclick="pekerjaan_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentpekerjaan" class="table-responsive">
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
