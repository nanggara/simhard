<div id="modal-form-pasangan" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Pasangan</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarpasangan" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Pasangan dibawah ini</p>
							<div id="alertMsgpasangan" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosepasangan" aria-hidden="true" class="close" type="button" onclick="pasangan_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextpasangan">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<select id="div_statuspasangan" name="div_statuspasangan" class="form-control">
									<option value="-">Pilih Status</option>
									<option value="Ayah">Suami</option>
									<option value="Ibu">Istri</option>
								</select>
	                        </div>  
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodepasangan" name="txt_kodepasangan"  class="form-control">	                        	
	                        	<input type="text" id="txt_namapasangan" name="txt_namapasangan" placeholder="Input Nama" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_gelardpnpsgn" name="txt_gelardpnpsgn" placeholder="Gelar Depan" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_gelarblkpsgn" name="txt_gelarblkpsgn" placeholder="Gelar Belakang" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tempatlahirpsgn" name="txt_tempatlahirpsgn" placeholder="Tempat Lahir" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tgllahirpsgn" name="txt_tgllahirpsgn" placeholder="Tanggal Lahir" class="form-control">
	                        </div>
	                        <div class="form-group">
	                        	<select id="div_agamapasangan" name="div_agamapasangan" class="form-control">
									<option value="-">Pilih Agama</option>
									<option value="Ayah">Islam</option>
									<option value="Ibu">Protestan</option>
									<option value="Ibu">Katolik</option>
									<option value="Ibu">Hindu</option>
									<option value="Ibu">Budha</option>
								</select>
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_emailpsgn" name="txt_emailpsgn" placeholder="Email" class="form-control">
	                        </div>
	                        <div class="form-group">
	                       		<input type="radio" id="rad_menikah" name="rad_statuskawinpsgn" value="0" checked="checked">Menikah  &nbsp;
								<input type="radio" id="rad_dudajanda" name="rad_statuskawinpsgn"  value="1">Duda / Janda &nbsp;
								<input type="radio" id="rad_belum" name="rad_statuskawinpsgn"  value="2">Belum Menikah
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_noteleponpsgn" name="txt_noteleponpsgn" placeholder="No. Telepon / HP" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_alamatpsgn" name="txt_alamatpsgn" placeholder="Alamat" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_noaktacerai" name="txt_noaktacerai" placeholder="No Akta Cerai" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tglaktacerai" name="txt_tglaktacerai" placeholder="Tgl Akta Cerai" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_noaktalahirpsgn" name="txt_noaktalahirpsgn" placeholder="No Akta Kelahiran" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tglaktalahirpsgn" name="txt_tglaktalahirpsgn" placeholder="Tgl Akta Kelahiran" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_noaktamati" name="txt_noaktamati" placeholder="No Akta Meninggal" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tglaktamati" name="txt_tglaktamati" placeholder="Tgl Akta Meninggal" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_nonpwppsgn" name="txt_nonpwppsgn" placeholder="NPWP" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tglnpwppsgn" name="txt_tglnpwppsgn" placeholder="Tanggal NPWP" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_namapns" name="txt_namapns" placeholder="Nama PNS" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_nippns" name="txt_nippns" placeholder="NIP PNS" class="form-control">
	                        </div>

	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="pasangan_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="pasangan_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-pasangan" name="txt_search-pasangan" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchpasangan" class="btn btn-sm btn-primary" onclick="pasangan_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentpasangan" class="table-responsive">
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
