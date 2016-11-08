						<div class="col-lg-10">

	                		<table cellspacing="2" class="table_fullwidth">

	                			<tr>

	                				<td><h3 class="m-t-none m-b">Data komponengaji</h3></td>

	                				<td class="td_progressbar">

	                					<img id="progressBar-Komponengaji" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 

	                				</td>

	                			</tr>

	                		</table>

							<p>Silahkan Isi Kelompok dibawah ini</p>

							<div id="alertMsgkomponengaji" class="alert alert-warning alert-dismissable hide">

	                          	<button id="alertClosekomponengaji" aria-hidden="true" class="close" type="button" onclick="komponengaji_alert_close()">

	                            	<i class="fa fa-times"></i>

	                           	</button>

	                            <small id="alertTextkomponengaji">Data telah disimpan.</small>

	                        </div> 
							
							<div class="form-group"><label class="col-sm-3 control-label">Nama Komponen Gaji</label>

								<div class="col-sm-6"> 

									<input type="hidden" id="txt_kodekomponengaji" name="txt_kodekomponengaji" class="form-control">
								
									<input type="text" id="txt_namakomponengaji" name="txt_namakomponengaji" class="form-control">

								</div>

							</div>
							
							<div class="form-group">

	                        	<input type="hidden" id="txt_kodegajikaryawan" name="txt_kodegajikaryawan" class="form-control">
								
								<label class="col-sm-3 control-label">Kelompok Komponen Gaji</label>
								
								<div class="col-sm-6"> 
								
									<select id="div_komponen" name="div_komponen" class="form-control"> 
									
											<option value="0">Pilih Komponen</option>
											
												<?php foreach($ddl_datakelompokkomponen->result() as $kompRow) {?>

											<option value="<?php echo $kompRow->kodekelompokkompgaji;?>"><?php echo $kompRow->namakelompok;?></option> 

												<?php }?>

									</select> 

								</div>
								
							</div>  

							<div class="form-group"><label class="col-sm-3 control-label">Jenis Komponen Gaji</label>

								<div class="col-sm-6">

									<select id="div_potongan" name="div_potongan" class="form-control">

										<option value="1">Potongan</option>

										<option value="2">Tunjangan</option>

									</select> 

								</div>
								
							</div>	

							<div class="form-group"><label class="col-sm-3 control-label">Status Komponen Gaji</label>

								<div class="col-sm-6">

									<select id="div_status" name="div_status" class="form-control">

										<option value="1">Aktif</option>

										<option value="2">Tidak Aktif</option>

									</select> 

								</div>
								
							</div>	

							<div class="form-group">

								<div class="col-sm-4 col-sm-offset-3">					

									<button class="btn btn-primary" type="button" onclick="komponengaji_save()">Save</button> 

									<button class="btn btn-white" type="button" onclick="form_reset()">Cancel</button> 

								</div>

							</div>

	                   	</div>
						
						<div id="formcontent" class="col-lg-12 table-responsive">

							<?php include("datatable2.php");?> 

						</div>  
	
						
<script>

<?php include("komponen.js");?>

</script>