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
							
							<div class="form-group"><label class="col-sm-2 control-label">Periode Bulan</label>

								<div class="col-sm-5">

									<select id="slc_bulan" name="slc_bulan" class="form-control">

										<option value="0">-Pilih Bulan-</option>
										
										<option value="1">Januari</option>

										<option value="2">Februari</option>

										<option value="3">Maret</option>

										<option value="4">April</option>

										<option value="5">Mei</option>

										<option value="6">Juni</option>

										<option value="7">Juli</option>

										<option value="8">Agustus</option>

										<option value="9">September</option>

										<option value="10">Oktober</option>

										<option value="11">November</option>

										<option value="12">Desember</option> 

									</select> 

								</div>

								<label class="col-sm-2 control-label">Periode tahun</label>
								
								<div class="col-sm-3"> 

									<input type="text" placeholder="Input Tahun" id="txt_tahun" name="txt_tahun" readonly="readonly" class="form-control" value="<?php echo date('Y');?>"> 

								</div> 

							</div>  
							
							<div class="form-group">

								<div class="col-sm-9 col-sm-offset-9">					

									<button class="btn btn-primary" type="button" onclick="form_save()">Save</button> 

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