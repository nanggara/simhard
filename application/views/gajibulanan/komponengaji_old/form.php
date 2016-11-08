<div id="modal-form-komponengaji" class="modal fade" aria-hidden="true">
	<div class="modal-dialog" style="width:1000px;"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
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
							<div class="form-group">
	                        	<input type="hidden" id="txt_kodekomponengaji" name="txt_kodekomponengaji" class="form-control">
	                        	<input type="text" id="txt_komponengajimodal" name="txt_komponengajimodal" placeholder="Input Komponengaji" class="form-control">
	                        </div>                            
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="komponengaji_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="komponengaji_init();form_get_komponengaji();$('#modal-form-komponengaji').modal('hide');"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-komponengaji" name="txt_search-komponengaji" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchKelompok" class="btn btn-sm btn-primary" onclick="komponengaji_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentkomponengaji" class="table-responsive">
							 	<?php //include("datatable.php");?> 		     
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
