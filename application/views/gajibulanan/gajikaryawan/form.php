<div id="modal-form-gajikaryawan" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data gajikaryawan</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBargajikaryawan" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data komponen gaji karyawan dibawah ini</p>
							<div id="alertMsggajikaryawan" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosegajikaryawan" aria-hidden="true" class="close" type="button" onclick="gajikaryawan_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextgajikaryawan">Data telah disimpan.</small>
	                        </div> 										<div class="form-group">															<select id="div_komponen" name="div_komponen" class="form-control"> 																		<option value="0">Pilih Komponen</option>																			<?php foreach($ddl_datakomponen->result() as $kompRow) {?>										<option value="<?php echo $kompRow->kodekomponengaji;?>"><?php echo $kompRow->namakomponengaji;?></option> 									<?php }?>								</select> 	                        </div>  								
	                        <div class="form-group">								                        	<input type="hidden" id="txt_kodegajikaryawan" name="txt_kodegajikaryawan" class="form-control">
	                        	<input type="text" id="txt_jumlah" name="txt_jumlah" placeholder="Input Jumlah" class="form-control">
	                        </div> 							
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="gajikaryawan_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="gajikaryawan_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-gajikaryawan" name="txt_search-gajikaryawan" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchgajikaryawan" class="btn btn-sm btn-primary" onclick="gajikaryawan_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentgajikaryawan" class="table-responsive">
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
