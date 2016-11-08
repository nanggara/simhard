<div id="modal-forminstitusi" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Institusi</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarinstitusi" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Institusi dibawah ini</p>
							<div id="alertMsginstitusi" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertCloseinstitusi" aria-hidden="true" class="close" type="button" onclick="institusi_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertText-institusi">Data telah disimpan.</small>
	                        </div> 
							<div class="form-group">
	                        	<input type="hidden" id="txt_kodeinstitusi" name="txt_kodeinstitusi" class="form-control">
	                        	<input type="text" id="txt_institusimodal" name="txt_institusimodal" placeholder="Input Institusi" class="form-control">	                        	
	                        </div>                            
	                        <div class="form-group">
	                        	<input type="text" id="txt_alamatinstitusimodal" name="txt_alamatinstitusimodal" placeholder="Input Alamat Institusi" class="form-control">
	                        </div>
	                        <div>
	                            <button id="btnSaveinstitusi" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="institusi_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancelinstitusi" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="institusi_init();form_get_institusi();$('#modal-forminstitusi').modal('hide');"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_searchinstitusi" name="txt_searchinstitusi" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchinstitusi" class="btn btn-sm btn-primary" onclick="institusi_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentinstitusi" class="table-responsive">
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
