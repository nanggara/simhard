<div id="modal-form-kewirausahaan" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-6 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">Data Kewirausahaan</h3></td>
	                				<td class="td_progressbar">
	                					<img id="progressBarkewirausahaan" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif">                					 
	                				</td>
	                			</tr>
	                		</table>
							<p>Silahkan Isi Data Kewirausahaan dibawah ini</p>
							<div id="alertMsgkewirausahaan" class="alert alert-warning alert-dismissable hide">
	                          	<button id="alertClosekewirausahaan" aria-hidden="true" class="close" type="button" onclick="kewirausahaan_alert_close()">
	                            	<i class="fa fa-times"></i>
	                           	</button>
	                            <small id="alertTextkewirausahaan">Data telah disimpan.</small>
	                        </div>   
	                        <div class="form-group">
	                        <input type="hidden" id="txt_kodekwu" name="txt_kodekwu"  class="form-control">	                        	
	                        	<input type="text" id="txt_namausaha" name="txt_namausaha" placeholder="Input Nama Usaha" class="form-control">
	                        </div> 
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_bidangusaha" name="txt_bidangusaha" placeholder="Input Bidang Usaha" class="form-control">
	                        </div>                      
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunmulai" name="txt_tahunmulai" placeholder="Input Tahun Mulai" class="form-control">
	                        </div>
	                        <div class="form-group">	                        	
	                        	<input type="text" id="txt_tahunakhir" name="txt_tahunakhir" placeholder="Input Tahun Akhir" class="form-control">
	                        </div> 
                           <div class="form-group">	                        	
	                        	<input type="text" id="txt_jabatan" name="txt_jabatan" placeholder="Input Jabatan" class="form-control">
	                        </div>  
                            
	                        
	                        <div>
	                            <button id="btnSave" class="btn btn-sm btn-primary m-t-n-xs" type="button" onclick="kewirausahaan_save()"><strong>Save Change</strong></button>
	                            <button id="btnCancel" class="btn btn-sm btn-default m-t-n-xs" type="button" onclick="kewirausahaan_cancel()"><strong>Cancel</strong></button>
	                        </div> 
	                   	</div>
	                    <div class="col-sm-6"> 
	                    	<div class="col-sm-5">
	                            <h4>Browse Data</h4>
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-kewirausahaan" name="txt_search-kewirausahaan" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchkewirausahaan" class="btn btn-sm btn-primary" onclick="kewirausahaan_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentkewirausahaan" class="table-responsive">
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
