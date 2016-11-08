<div id="modal-form-organisasi" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Organisasi</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarorganisasi" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Organisasi dibawah ini</p>
							<div id="alertMsgorganisasi" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertCloseorganisasi" aria-hidden="true" class="close" type="button" onclick="organisasi_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextorganisasi">Data telah disimpan.</small>
	                        </div> 
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodeorganisasi" name="txt_kodeorganisasi"  class="form-control">	                        	
	                        	<input type="text" id="txt_namaorganisasi" name="txt_namaorganisasi" placeholder="Input Nama Organisasi" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_jabatanorganisasi" name="txt_jabatanorganisasi" placeholder="Input Jabatan" class="form-control">
	                        </div>  
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunorganisasi" name="txt_tahunorganisasi" placeholder="Input Tahun" class="form-control">
	                        </div>                      
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tempatorganisasi" name="txt_tempatorganisasi" placeholder="Input Tempat" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="organisasi_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="organisasi_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-organisasi" name="txt_search-organisasi" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchorganisasi" class="btn btn-sm btn-primary" onclick="organisasi_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentorganisasi" class="table-responsive">
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
