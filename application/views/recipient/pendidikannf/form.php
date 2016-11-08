<div id="modal-form-pendidikannonformal" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Pendidikan Non Formal</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarpendidikannonformal" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Data Pendidikan Non Formal dibawah ini</p>
							<div id="alertMsgpendidikannonformal" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosependidikannonformal" aria-hidden="true" class="close" type="button" onclick="pendidikannonformal_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextpendidikannonformal">Data telah disimpan.</small>
	                        </div>  
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodependidikannf" name="txt_kodependidikannf"  class="form-control">	                        	
	                        	<input type="text" id="txt_kompetensipendnf" name="txt_kompetensipendnf" placeholder="Input Kompetensi" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_namalembagapendnf" name="txt_namalembagapendnf" placeholder="Input Nama Lembaga" class="form-control">
	                        </div>                      
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunpendnf" name="txt_tahunpendnf" placeholder="Input Tahun" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_spesialisasipendnf" name="txt_spesialisasipendnf" placeholder="Input Spesialisasi" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="pendidikannonformal_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="pendidikannonformal_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-pendidikannonformal" name="txt_search-pendidikannonformal" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchpendidikannonformal" class="btn btn-sm btn-primary" onclick="pendidikannonformal_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentpendidikannonformal" class="table-responsive">
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
