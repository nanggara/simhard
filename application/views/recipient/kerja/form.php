<div id="modal-form-kerja" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Pengalaman Kerja</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarkerja" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Pengalaman Kerja dibawah ini</p>
							<div id="alertMsgkerja" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosekerja" aria-hidden="true" class="close" type="button" onclick="kerja_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextkerja">Data telah disimpan.</small>
	                        </div> 
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodekerja" name="txt_kodekerja"  class="form-control">	                        	
	                        	<input type="text" id="txt_namalembaga" name="txt_namalembaga" placeholder="Input Nama Lembaga" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_jabatankerja" name="txt_jabatankerja" placeholder="Input Jabatan" class="form-control">
	                        </div>  
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunkerja" name="txt_tahunkerja" placeholder="Input Tahun" class="form-control">
	                        </div>                      
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tempatkerja" name="txt_tempatkerja" placeholder="Input Tempat" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="kerja_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="kerja_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-kerja" name="txt_search-kerja" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchkerja" class="btn btn-sm btn-primary" onclick="kerja_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentkerja" class="table-responsive">
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
