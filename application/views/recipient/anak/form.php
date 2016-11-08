<div id="modal-form-anak" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Anak</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBaranak" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Anak dibawah ini</p>
							<div id="alertMsganak" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertCloseanak" aria-hidden="true" class="close" type="button" onclick="anak_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextanak">Data telah disimpan.</small>
	                        </div>  
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodeanak" name="txt_kodeanak"  class="form-control">	                        	
	                        	<input type="text" id="txt_namaanak" name="txt_namaanak" placeholder="Input Nama" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tempatlahiranak" name="txt_tempatlahiranak" placeholder="Tempat Lahir" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tgllahiranak" name="txt_tgllahiranak" placeholder="Tanggal Lahir" class="form-control">
	                        </div>
	                        <div class="form-group">
	                       		<input type="radio" id="rad_lakianak" name="rad_jkanak" value="0" checked="checked">Laki - Laki  &nbsp;
								<input type="radio" id="rad_perempuananak" name="rad_jkanak"  value="1">Perempuan
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_pendidikananak" name="txt_pendidikananak" placeholder="Pendidikan" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_pekerjaananak" name="txt_pekerjaananak" placeholder="Pekerjaan" class="form-control">
	                        </div>
	                        <div class="form-group">
	                        	<select id="div_agamaanak" name="div_agamaanak" class="form-control">
									<option value="-">Pilih Agama</option>
									<option value="Ayah">Islam</option>
									<option value="Ibu">Protestan</option>
									<option value="Ibu">Katolik</option>
									<option value="Ibu">Hindu</option>
									<option value="Ibu">Budha</option>
								</select>
	                        </div>
	                        <div class="form-group">
	                       		<input type="radio" id="rad_belumanak" name="rad_statkawinanak" value="0" checked="checked">Belum Menikah  &nbsp;
								<input type="radio" id="rad_menikahanak" name="rad_statkawinanak"  value="1">Menikah &nbsp;
								<input type="radio" id="rad_dudaanak" name="rad_statkawinanak"  value="2">Duda / Janda
	                        </div>
	                        <div class="form-group">
	                       		<input type="radio" id="rad_hidupanak" name="rad_stathidupanak" value="0" checked="checked">Hidup  &nbsp;
								<input type="radio" id="rad_meninggalanak" name="rad_stathidupanak"  value="1">Meninggal
	                        </div>
	                        <div class="form-group">
	                       		<input type="radio" id="rad_kandunganak" name="rad_statanak" value="0" checked="checked">Kandung  &nbsp;
								<input type="radio" id="rad_angkatanak" name="rad_statanak"  value="1">Angkat &nbsp;
								<input type="radio" id="rad_tirianak" name="rad_statanak"  value="2">Tiri
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_alamatanak" name="txt_alamatanak" placeholder="Alamat" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_teleponanak" name="txt_teleponanak" placeholder="Telepon" class="form-control">
	                        </div>
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="anak_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="anak_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-anak" name="txt_search-anak" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchanak" class="btn btn-sm btn-primary" onclick="anak_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentanak" class="table-responsive">
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
