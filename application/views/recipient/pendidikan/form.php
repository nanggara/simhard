<div id="modal-form-pendidikan" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Pendidikan</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarpendidikan" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Data Pendidikan dibawah ini</p>
							<div id="alertMsgpendidikan" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosependidikan" aria-hidden="true" class="close" type="button" onclick="pendidikan_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextpendidikan">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<select id="div_sekolahpendidikan" name="div_sekolahpendidikan" class="form-control">
									<option value="-">Pilih Sekolah</option>
									<option value="TK">TK</option>
									<option value="SD">SD</option>
									<option value="SMP">SMP</option>
									<option value="SMA">SMA</option>
									<option value="Perguruan Tiggi">Perguruan Tinggi</option>
								</select>
	                        </div>  
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodependidikan" name="txt_kodependidikan"  class="form-control">	                        	
	                        	<input type="text" id="txt_namasekolahpendidikan" name="txt_namasekolahpendidikan" placeholder="Input Nama Sekolah" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunpendidikan" name="txt_tahunpendidikan" placeholder="Input Tahun" class="form-control">
	                        </div>                      
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_jurusanpendidikan" name="txt_jurusanpendidikan" placeholder="Input Jurusan" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_nilaiakhirpendidikan" name="txt_nilaiakhirpendidikan" placeholder="Input Nilai Akhir" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="pendidikan_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="pendidikan_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-pendidikan" name="txt_search-pendidikan" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchpendidikan" class="btn btn-sm btn-primary" onclick="pendidikan_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentpendidikan" class="table-responsive">
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
