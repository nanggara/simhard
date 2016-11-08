<div id="modal-form-prestasi" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Prestasi</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarprestasi" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Prestasi dibawah ini</p>
							<div id="alertMsgprestasi" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertCloseprestasi" aria-hidden="true" class="close" type="button" onclick="prestasi_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextprestasi">Data telah disimpan.</small>
	                        </div> 
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodeprestasi" name="txt_kodeprestasi"  class="form-control">	                        	
	                        	<input type="text" id="txt_bidangprestasi" name="txt_bidangprestasi" placeholder="Input Bidang" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_peringkatprestasi" name="txt_peringkatprestasi" placeholder="Input Peringkat" class="form-control">
	                        </div>  
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunprestasi" name="txt_tahunprestasi" placeholder="Input Tahun" class="form-control">
	                        </div>                      
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tingkatprestasi" name="txt_tingkatprestasi" placeholder="Input Tingkat" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_penyelenggaraprestasi" name="txt_penyelenggaraprestasi" placeholder="Input Penyelenggara" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="prestasi_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="prestasi_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-prestasi" name="txt_search-prestasi" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchprestasi" class="btn btn-sm btn-primary" onclick="prestasi_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentprestasi" class="table-responsive">
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