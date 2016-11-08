<div id="modal-form-agama" class="modal fade" aria-hidden="true">
	<div class="modal-dialog" style="width:1000px;"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Agama</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBar-Agama" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Kelompok dibawah ini</p>
							<div id="alertMsgagama" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertCloseagama" aria-hidden="true" class="close" type="button" onclick="agama_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextagama">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<input type="hidden" id="txt_kodeagama" name="txt_kodeagama" class="form-control">
	                        	<input type="text" id="txt_agamamodal" name="txt_agamamodal" placeholder="Input Agama" class="form-control">
	                        </div>                            
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="agama_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="agama_init();form_get_agama();$('#modal-form-agama').modal('hide');"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-agama" name="txt_search-agama" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchKelompok" class="btn btn-sm btn-primary" onclick="agama_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentagama" class="table-responsive">
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
