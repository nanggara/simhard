<div id="modal-form-penghargaan" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Penghargaan</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarpenghargaan" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Penghargaan dibawah ini</p>
							<div id="alertMsgpenghargaan" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosepenghargaan" aria-hidden="true" class="close" type="button" onclick="penghargaan_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextpenghargaan">Data telah disimpan.</small>
	                        </div> 
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodepenghargaan" name="txt_kodepenghargaan"  class="form-control">	                        	
	                        	<input type="text" id="txt_namapenghargaan" name="txt_namapenghargaan" placeholder="Input Nama penghargaan" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_nokeputusan" name="txt_nokeputusan" placeholder="No. Keputusan" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tglkeputusan" name="txt_tglkeputusan" placeholder="Tanggal keputusan" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_pemberipenghargaan" name="txt_pemberipenghargaan" placeholder="Pemberi Penghargaan" class="form-control">
	                        </div>
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="penghargaan_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="penghargaan_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-penghargaan" name="txt_search-penghargaan" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchpenghargaan" class="btn btn-sm btn-primary" onclick="penghargaan_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentpenghargaan" class="table-responsive">
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
