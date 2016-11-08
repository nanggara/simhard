<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

</style>


<div id="ModalFileManager" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row">
	                	<div class="col-sm-4 b-r">
	                		<table cellspacing="2" class="table_fullwidth">
	                			<tr>
	                				<td><h3 class="m-t-none m-b">File Manager</h3></td>
	                				<td class="td_progressbar">
	                					<img id="file_loading" src="<?php echo base_url();?>assets/themes/inspinia/images/724.GIF" width="22" height="22">                					 
	                				</td>
	                			</tr>
	                		</table> 
	                		<div class="col-lg-12 ">
								<div id="alert_filemanager" class="alert alert-danger alert-dismissable" style="border-radius:0px;">
								  <button type="button" class="close" onclick="$('#alert_filemanager').hide()">&times;</button>
								  <strong>Warning!</strong> <p id="lbl_modal_alert"></p>
								</div>
							</div>
							<!-- LEFT SIDE -->
						    <div class="col-lg-12">		  	  			  	  	
								<div class="panel panel-default">
									<div class="panel-heading">
									  <h3 class="panel-title">Folders</h3>
									</div>
									<div class="panel-body text-left" style="padding:0px;">
									   <div id="folder_list" style="height:100px;overflow: auto;padding:10px;">
									     <?php echo $open_folder;?> 
									   </div>
								    </div>
									<div class="panel-footer">
									 	<div class="input-group">
									      <input type="text" id="input_newfolder" class="form-control">
									      <span class="input-group-btn">
									         <button type="button" class="btn btn-primary" type="button" onclick="new_folder()">+</button>
									         <button type="button" class="btn btn-warning" type="button" onclick="delete_folder()">-</button>
									      </span>
									    </div> 
									</div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-heading">
								    <h3 class="panel-title">Upload</h3>
								  </div>
								  <div class="panel-body"> 
									  <form id="form" enctype="multipart/form-data" method="post">
										  <div class="form-group"> 
										    <span class="input-group-btn">
										    <span class="btn btn-primary btn-file col-lg-8">
											    Browse <input type="file" id="fileToUpload" name="fileToUpload">
											</span> 
											<button type="button" class="btn btn-white col-lg-4" onclick="uploadFile()">Upload</button>
											</span>
										  </div> 
									  </form> 
								  </div>
								</div>
								 
							</div>
							<!-- END LEFT SIDE --> 
	                   	</div>
	                    <div class="col-sm-8"> 
	                    	<div class="col-sm-12">
	                            <h4>Browse File</h4>
	                        </div>  
	                    	<!-- RIGHT SIDE --> 	 
							<div class="col-lg-12 file-manager text-left"> 
								<div class="panel panel-default">
									<div class="panel-heading"> 
										<ol id="address" class="breadcrumb text-left" style="border-radius:0px;background:#f5f5f5;" >
											<li><a href="#">Uploads</a></li>  
										</ol> 
									</div>
									<div class="panel-body text-left" style="height:240px;overflow: auto;">
									   <div id="file_list" class="text-center">			
											<?php echo $file_manager;?> 
									   </div>
								    </div>
									<div class="panel-footer">   
									    <button type="button" class="btn btn-primary" id="btn_pilih" onclick="on_insert_image()">Pilih File</button>
								        <button type="button" class="btn btn-danger" id="btn_hapus" onclick="delete_file()">Hapus File</button>  
								        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button> 
									</div>
								</div> 
							</div> 
						   <!-- END RIGHT SIDE -->
						  
						</div>
	               	</div>
               	</form>
        	</div>
		</div>
	</div>
</div>

<div id="ModalFileManager2" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">File Manager</h4>
      </div>
      
      <div class="modal-body">
        
        <div class="row"> 
      	<div class="col-lg-12 ">
			<div id="alert_filemanager" class="alert alert-danger alert-dismissable" style="border-radius:0px;">
			  <button type="button" class="close" onclick="$('.alert').hide()">&times;</button>
			  <strong>Warning!</strong> <p id="lbl_modal_alert"></p>
			</div>		
			<ol id="address" class="breadcrumb text-left">
				<li><a href="#">Uploads</a></li>  
			</ol>		
			<div id="file_loading" class="text-center">
				<img src="<?php echo base_url()?>assets/themes/inspinia/images/724.GIF" style="margin-top:100px;">
			</div>
		</div>
         
         <div class="col-lg-12"><br></div>
         
         <!-- LEFT SIDE -->
      <div class="col-lg-4">		  	  			  	  	
		<div class="panel panel-default">
			<div class="panel-heading">
			  <h3 class="panel-title">Folders</h3>
			</div>
			<div class="panel-body text-left" style="padding:0px;">
			   <div id="folder_list" style="height:100px;overflow: auto;padding:10px;">
			     <?php echo $open_folder;?> 
			   </div>
		    </div>
			<div class="panel-footer">
			 	<div class="input-group">
			      <input type="text" id="input_newfolder" class="form-control">
			      <span class="input-group-btn">
			         <button type="button" class="btn btn-primary" type="button" onclick="new_folder()">+</button>
			         <button type="button" class="btn btn-warning" type="button" onclick="delete_folder()">-</button>
			      </span>
			    </div> 
			</div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Upload</h3>
		  </div>
		  <div class="panel-body"> 
			  <form id="form" enctype="multipart/form-data" method="post">
				  <div class="form-group"> 
				    <span class="btn btn-primary btn-file col-lg-12">
					    Browse <input type="file" id="fileToUpload" name="fileToUpload">
					</span> 
				  </div> 
				  <button type="button" class="btn btn-default col-lg-12" onclick="uploadFile()" style="margin-top: 10px;">Upload</button>
			  </form> 
		  </div>
		</div>
	</div>
	<!-- END LEFT SIDE --> 
	
	<!-- RIGHT SIDE --> 	 
	<div class="col-lg-8 file-manager text-left"> 
		<div class="panel panel-default">
			<div class="panel-heading">
			  <h3 class="panel-title">Files</h3>
			</div>
			<div class="panel-body text-left" style="height:314px;overflow: auto;">
			   <div id="file_list" class="text-center">			
					<?php echo $file_manager;?> 
			   </div>
		    </div>
			<div class="panel-footer">
			 	 
			</div>
		</div> 
	</div> 
   <!-- END RIGHT SIDE -->
   
	</div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_pilih" onclick="on_insert_image()">Pilih File</button>
        <button type="button" class="btn btn-danger" id="btn_hapus" onclick="delete_file()">Hapus File</button>  
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>      
      </div>
    </div> 
  </div> 
</div> 
 

<!-- FILEMANAGER.JS -->
<script>
	<?php include("filemanager.js");?>
</script>