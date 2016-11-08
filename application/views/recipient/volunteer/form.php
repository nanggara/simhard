<div id="modal-form-volunteer" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Pengalaman Volunteer</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarvolunteer" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Pengalaman Volunteer dibawah ini</p>
							<div id="alertMsgvolunteer" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosevolunteer" aria-hidden="true" class="close" type="button" onclick="volunteer_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextvolunteer">Data telah disimpan.</small>
	                        </div> 
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodevolunteer" name="txt_kodevolunteer"  class="form-control">	                        	
	                        	<input type="text" id="txt_namakegiatanvolunteer" name="txt_namakegiatanvolunteer" placeholder="Input Nama Kegiatan" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_jabatanvolunteer" name="txt_jabatanvolunteer" placeholder="Input Jabatan" class="form-control">
	                        </div>  
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunvolunteer" name="txt_tahunvolunteer" placeholder="Input Tahun" class="form-control">
	                        </div>                      
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tempatvolunteer" name="txt_tempatvolunteer" placeholder="Input Tempat" class="form-control">
	                        </div> 
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="volunteer_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="volunteer_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-volunteer" name="txt_search-volunteer" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchvolunteer" class="btn btn-sm btn-primary" onclick="volunteer_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentvolunteer" class="table-responsive">
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