<!-- FORM -->
<form id="myForm" name="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">	
	<div class="panel-heading"> 
		<div class="panel-options">						
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i>Entri</a></li>
				<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-th"></i>Browse</a></li>
			</ul>
		</div>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="tab-1" class="tab-pane active">
				<div class="form-group text-left">  
					<div class="col-sm-4 text-center"> 
						<div id="div_photo" style="margin-bottom: 5px;">
							<img id="img_profil" alt="image" src="<?php echo base_url();?>assets/themes/inspinia/images/photo.jpg" style="width:70%;min-height:20%;border-radius:5px;border:solid 1px #e5e6e7;">
						</div>	 
					    <button id="btnUpload" type="button" class="btn btn-primary btn-xs" onclick="on_upload()">Upload Photo</button> 					   
					</div>
					<div class="col-sm-8"> 
							<div class="form-group"><label class="col-sm-3 control-label">Nama Lengkap</label>
								<div class="col-sm-9"> 
									<input type="hidden" id="txt_regid" name="txt_regid" class="form-control" value="<?php echo $regidrec;?>">
									<input type="text" id="txt_nama" name="txt_nama" class="form-control">
								</div>
							</div>  
							<div class="form-group"><label class="col-sm-3 control-label">Tgl. Masuk</label>
								<div class="col-sm-9">
									<input type="text" id="txt_tglmasukanggota" name="txt_tglmasukanggota" class="form-control" value="<?php echo date('d-m-Y');?>">
								</div>
							</div> 
							<div class="form-group"><label class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="col-sm-9">
									<input type="radio" id="rad_jkl" name="rad_jk" value="1" checked="checked">Laki-Laki  &nbsp;
									<input type="radio" id="rad_jkp" name="rad_jk"  value="0">Perempuan
								</div>
							</div>		
							<div class="form-group"><label class="col-sm-3 control-label">Tempat Lahir</label>
								<div class="col-sm-3"> 
									<input type="text" id="txt_tempatlahir" name="txt_tempatlahir" class="form-control">
								</div>
								<div class="col-sm-3"> 
									<label class="col-sm-12 control-label">Tgl. Lahir</label>
								</div>
								<div class="col-sm-3"> 
									<input type="text" id="txt_tanggallahir" name="txt_tanggallahir" class="form-control" value="">
								</div>
							</div> 				                                
							<div class="form-group"><label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-9"><input type="text" id="txt_alamat" name="txt_alamat" class="form-control"></div>
							</div>   
							<div class="form-group"><label class="col-sm-3 control-label">Nama Institusi</label>
								<div class="col-sm-8">
									<select id="div_institusi" name="div_institusi" class="form-control" onchange="form_institusi_change(this);">
							    		<option value="0">Pilih Institusi</option>
							    		<?php foreach($ddl_datainstitusi->result() as $kelIns) {?>
							        		<option value="<?php echo $kelIns->kodeinstitusi;?>"><?php echo $kelIns->institusi;?></option> 
							           	<?php }?>
							      	</select> 
								</div>
								<div class="col-sm-1"> 
									<button class="btn btn-primary btn-sm" type="button" onclick="on_institusi_click()">+</button> 
								</div>
							</div> 
							<div class="form-group"><label class="col-sm-3 control-label">Alamat Institusi</label>
								<div class="col-sm-9">
									<input type="text" id="txt_alamatinstitusi" name="txt_alamatinstitusi" class="form-control" readonly="readonly">
								</div>
							</div>
					</div>
				</div>
				<div class="form-group"> 
					&nbsp;
				</div>                         
				<div class="form-group"><label class="col-sm-2 control-label">Jabatan</label>
					<div class="col-sm-10"><input type="text" id="txt_jabatan" name="txt_jabatan" class="form-control"></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Kelompok</label>
				    <div class="col-sm-9">
				    	<select id="div_kelompok" name="div_kelompok" class="form-control"> 
				    		<?php foreach($ddl_datakelompok->result() as $kelRow) {?>
				        		<option value="<?php echo $kelRow->kodekelompok;?>"><?php echo $kelRow->kelompok;?></option> 
				           	<?php }?>
				      	</select> 
				 	</div>
				 	<div class="col-sm-1"> 
							<button class="btn btn-primary btn-sm" type="button" onclick="on_email_click()">+</button> 
					</div>
				</div>
				
				<div id="div_telepon">                                
					<div id="form-group-1" class="form-group"><label class="col-sm-2 control-label">Nomor Telepon 1</label>
						<div class="col-sm-9">
							<input type="hidden" id="txt_count_telepon" name="txt_count_telepon" value="1">
							<input type="text" name="txt_telepon[]" class="form-control">
						</div>
						<div class="col-sm-1"> 
							<button class="btn btn-primary btn-sm" type="button" onclick="form_add_phone()">+</button> 
						</div>
					</div>  
				</div>      
				<div id="div_email">                  
					<div id="form-group-email-1" class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9">
							<input type="hidden" id="txt_count_email" name="txt_count_email" value="1">
							<input type="text" name="txt_email[]" class="form-control">
						</div>
						<div class="col-sm-1">
							<button class="btn btn-primary btn-sm" type="button" onclick="form_add_email()">+</button>
						</div>
					</div>            
				</div>             
				<div class="form-group"><label class="col-sm-2 control-label">Akun LinkedIn</label>
					<div class="col-sm-10"><input type="text" id="txt_linkedin" name="txt_linkedin" class="form-control"></div>
				</div>                          
				<div class="form-group"><label class="col-sm-2 control-label">Web Site</label>
					<div class="col-sm-10"><input type="text" id="txt_website" name="txt_website" class="form-control"></div>
				</div>                          
				<div class="form-group"><label class="col-sm-2 control-label">FB</label>
					<div class="col-sm-10"><input type="text" id="txt_fb" name="txt_fb" class="form-control"></div>
				</div>                         
				<div class="form-group"><label class="col-sm-2 control-label">Twitter</label>
					<div class="col-sm-10"><input type="text" id="txt_twitter" name="txt_twitter" class="form-control"></div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label">Catatan</label>
					<div class="col-sm-10"><input type="text" id="txt_catatan" name="txt_catatan" class="form-control"></div>
				</div>
				<div id="div_attachment">
					<div id="form-group-attachment-1" class="form-group">
						<label class="col-sm-2 control-label">
							<input type="hidden" id="txt_count_email" name="txt_count_email" value="1">
							Attachment
						</label>
						<div class="col-sm-2"> 
							<div style="position:relative;">
								<a class='btn btn-success btn-sm col-sm-12' href='javascript:;'>
									Pilih File
									<input type="file" name="fileToUploadAtt" id="fileToUploadAtt" width="10" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" onchange='$("#txt_attachment").val($(this).val());'>
								</a> 
							</div>
						</div>
						<div class="col-sm-6">
							<input type="text" id="txt_attachment" name="txt_attachment" class="form-control" readonly="readonly">
						</div>
						<div class="col-sm-1">
							<button class="btn btn-primary btn-sm" type="button" onclick="form_upload_att()">+</button>
						</div>
					</div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
						<div class="ibox float-e-margins"> 
		                    <div class="no-padding">
		                        <ul id="div_attachment_list" class="list-group"> 
		                            
		                        </ul>
		                    </div>
                		</div>
					</div>
				</div>  
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">					
				        <button class="btn btn-primary" type="button" onclick="form_save()">Save</button> 
				    	<button class="btn btn-white" type="button" onclick="form_reset()">Cancel</button> 
				   	</div>
				</div>
			</div> 
			<div id="tab-2" class="tab-pane">
				<div class="col-sm-7  pull-right">
	                <div class="input-group">
	                	<input type="text" id="txt_search" name="txt_search" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                    <button type="button" id="btnSearch" class="btn btn-sm btn-primary" onclick="form_search()"> Go!</button> </span>
	               	</div>
	          	</div>
	            <div class="col-lg-12">&nbsp;</div>            
				<div id="formcontent" class="col-lg-12 table-responsive">
					<?php include("datatable.php");?> 
				</div>  
			</div>
		</div> 
	</div>
</form>
<!-- END FORM -->
<script>
<?php include("form.js");?>
</script>
