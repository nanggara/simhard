<div id="modal-form-rwytjabatan" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Jabatan</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarrwytjabatan" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Jabatan dibawah ini</p>
							<div id="alertMsgrwytjabatan" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertCloserwytjabatan" aria-hidden="true" class="close" type="button" onclick="rwytjabatan_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextrwytjabatan">Data telah disimpan.</small>
	                        </div> 
	                        <div class="form-group">
	                        <input type="hidden" id="txt_koderwytjabatan" name="txt_koderwytjabatan"  class="form-control">	                        	
	                        	<input type="text" id="txt_namarwytjabatan" name="txt_namarwytjabatan" placeholder="Input Nama jabatan" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_instansi" name="txt_instansi" placeholder="Instansi" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_unitkerja" name="txt_unitkerja" placeholder="Unit Kerja" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_nosk" name="txt_nosk" placeholder="No. SK" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tglsk" name="txt_tglsk" placeholder="Tanggal. SK" class="form-control">
	                        </div>  
	                                              
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tmtjabatan" name="txt_tmtjabatan" placeholder="TMT" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_eseleonjabatan" name="txt_eseleonjabatan" placeholder="Eseleon" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="rwytjabatan_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="rwytjabatan_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-rwytjabatan" name="txt_search-rwytjabatan" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchrwytjabatan" class="btn btn-sm btn-primary" onclick="rwytjabatan_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentrwytjabatan" class="table-responsive">
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
