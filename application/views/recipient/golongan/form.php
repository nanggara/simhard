<div id="modal-form-golongan" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Golongan</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBargolongan" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Golongan dibawah ini</p>
							<div id="alertMsggolongan" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosegolongan" aria-hidden="true" class="close" type="button" onclick="golongan_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextgolongan">Data telah disimpan.</small>
	                        </div> 
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodegolongan" name="txt_kodegolongan"  class="form-control">	                        	
	                        	<input type="text" id="txt_namagolongan" name="txt_namagolongan" placeholder="Input Nama golongan" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tmtgolongan" name="txt_tmtgolongan" placeholder="TMT" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunmasagolongan" name="txt_tahunmasagolongan" placeholder="Masa Kerja Tahun" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_bulanmasagolongan" name="txt_bulanmasagolongan" placeholder="Masa Kerja Bulan" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_noskgolongan" name="txt_noskgolongan" placeholder="No. SK" class="form-control">
	                        </div>  
	                                              
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_nobkngolongan" name="txt_nobkngolongan" placeholder="No. Persetujuan BKN" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="golongan_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="golongan_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-golongan" name="txt_search-golongan" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchgolongan" class="btn btn-sm btn-primary" onclick="golongan_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentgolongan" class="table-responsive">
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
