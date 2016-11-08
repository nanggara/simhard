<div id="modal-form-keluarga" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Keluarga</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarkeluarga" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Keluarga dibawah ini</p>
							<div id="alertMsgkeluarga" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosekeluarga" aria-hidden="true" class="close" type="button" onclick="keluarga_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextkeluarga">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<select id="div_status" name="div_status" class="form-control">
									<option value="-">Pilih Status</option>
									<option value="Istri">Istri</option>
									<option value="Suami">Suami</option>
									<option value="Anak">Anak</option>
									<option value="Ayah">Ayah</option>
									<option value="Ibu">Ibu</option>
									<option value="Adik">Adik</option>
									<option value="Kakak">Kakak</option>
								</select>
	                        </div>  
	                        <div class="form-group">
								<input type="hidden" id="txt_kodekeluarga" name="txt_kodekeluarga"  class="form-control">	                        	
	                        	<input type="text" id="txt_namakeluarga" name="txt_namakeluarga" placeholder="Input Nama" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_usiakeluarga" name="txt_usiakeluarga" placeholder="Input Usia" class="form-control">
	                        </div>                      
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_pendidikanterakhirkeluarga" name="txt_pendidikanterakhirkeluarga" placeholder="Input Pendidikan Terakhir" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_pekerjaankeluarga" name="txt_pekerjaankeluarga" placeholder="Input Pekerjaan" class="form-control">
	                        </div> 
	                        <div class="form-group">
	                       		<input type="radio" id="rad_jklkeluarga" name="rad_jkkeluarga" value="1" checked="checked">Laki-Laki  &nbsp;
								<input type="radio" id="rad_jkpkeluarga" name="rad_jkkeluarga"  value="0">Perempuan
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="keluarga_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="keluarga_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-keluarga" name="txt_search-keluarga" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchkeluarga" class="btn btn-sm btn-primary" onclick="keluarga_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentkeluarga" class="table-responsive">
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
