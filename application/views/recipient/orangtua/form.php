<div id="modal-form-orangtua" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Orangtua</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarorangtua" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Orangtua dibawah ini</p>
							<div id="alertMsgorangtua" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertCloseorangtua" aria-hidden="true" class="close" type="button" onclick="orangtua_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextorangtua">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<select id="div_statusorangtua" name="div_statusorangtua" class="form-control">
									<option value="-">Pilih Status</option>
									<option value="Ayah">Ayah</option>
									<option value="Ibu">Ibu</option>
								</select>
	                        </div>  
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodeorangtua" name="txt_kodeorangtua"  class="form-control">	                        	
	                        	<input type="text" id="txt_namaorangtua" name="txt_namaorangtua" placeholder="Input Nama" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_gelardpnortu" name="txt_gelardpnortu" placeholder="Gelar Depan" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_gelarblkortu" name="txt_gelarblkortu" placeholder="Gelar Belakang" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tempatlahirortu" name="txt_tempatlahirortu" placeholder="Tempat Lahir" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tgllahirortu" name="txt_tgllahirortu" placeholder="Tanggal Lahir" class="form-control">
	                        </div>
	                        <div class="form-group">
	                        	<select id="div_agamaorangtua" name="div_agamaorangtua" class="form-control">
									<option value="-">Pilih Agama</option>
									<option value="Ayah">Islam</option>
									<option value="Ibu">Protestan</option>
									<option value="Ibu">Katolik</option>
									<option value="Ibu">Hindu</option>
									<option value="Ibu">Budha</option>
								</select>
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_emailortu" name="txt_emailortu" placeholder="Email" class="form-control">
	                        </div>
	                        <div class="form-group">
	                       		<input type="radio" id="rad_menikah" name="rad_statuskawinortu" value="0" checked="checked">Menikah  &nbsp;
								<input type="radio" id="rad_dudajanda" name="rad_statuskawinortu"  value="1">Duda / Janda &nbsp;
								<input type="radio" id="rad_belum" name="rad_statuskawinortu"  value="2">Belum Menikah
	                        </div>
	                        <div class="form-group">
	                       		<input type="radio" id="rad_hidup" name="rad_statushiduportu" value="0" checked="checked">Hidup  &nbsp;
								<input type="radio" id="rad_meninggal" name="rad_statushiduportu"  value="1">Meninggal
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_noteleponortu" name="txt_noteleponortu" placeholder="No. Telepon / HP" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_alamatortu" name="txt_alamatortu" placeholder="Alamat" class="form-control">
	                        </div>
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="orangtua_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="orangtua_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-orangtua" name="txt_search-orangtua" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchorangtua" class="btn btn-sm btn-primary" onclick="orangtua_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentorangtua" class="table-responsive">
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
