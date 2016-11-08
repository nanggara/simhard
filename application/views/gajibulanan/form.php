<!-- FORM -->
<!-- layout receipent -->
<form id="myForm" name="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">	
	<div class="panel-heading"> 
		<div class="panel-options">						
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i>Entri</a></li>
				<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-th"></i>Browse</a></li>				<li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-th"></i>Komponen Gaji</a></li>
			</ul>
		</div>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div id="tab-1" class="tab-pane active">
				<div class="col-sm-6 text-center"> 										<!-- ID -->					<div class="form-group"><label class="col-sm-2 control-label">ID</label>						<div class="col-sm-8">															<input type="hidden" id="txt_regid" name="txt_regid" class="form-control" value="<?php echo $regidrec;?>">							<input type="hidden" id="txt_photoprofil" name="txt_photoprofil" class="form-control" value="">							<input type="text" id="txt_noanggota" name="txt_noanggota" class="form-control" readonly="readonly">						</div> 					</div> 					<!-- END ID -->					<!-- Nama -->					<div class="form-group"><label class="col-sm-2 control-label">NAMA</label>						<div class="col-sm-8">							<input type="text" id="txt_namalengkap" name="txt_namalengkap" class="form-control" readonly="readonly">						</div>					</div>					<!-- end Nama -->
										<!-- kedudukan PNS -->
					<div class="form-group"><label class="col-sm-2 control-label">Kedudukan PNS</label>
						<div class="col-sm-8">
							<select id="div_kedudukan" name="div_kedudukan" class="form-control" readonly="readonly">
								<?php foreach($ddl_datakedudukan->result() as $kwnrow) {?>
									<option value="<?php echo $kwnrow->kodekedudukan;?>"><?php echo $kwnrow->kedudukan;?></option> 
								<?php }?>
							</select> 
						</div>
					</div>
					<!-- End kedudukan PNS -->
					<!-- Jenis Jabatan -->					
					<div class="form-group"><label class="col-sm-2 control-label">Jenis Jabatan</label>
						<div class="col-sm-8">
							<select id="div_jabatan" name="div_jabatan" class="form-control" readonly="readonly"> 
								<?php foreach($ddl_datajabatan->result() as $jbtRow) {?>
									<option value="<?php echo $jbtRow->kodejabatan;?>"><?php echo $jbtRow->jabatan;?></option> 
								<?php }?>
							</select> 
						</div> 							
					</div>
					<!-- End Jenis Jabatan -->

					<!-- Jabatan Struktural -->
					<div class="form-group"><label class="col-sm-2 control-label">Jabatan Struktural</label>
						<div class="col-sm-8"><input type="text" id="txt_jabstruk" name="txt_jabstruk" class="form-control" readonly="readonly"></div>
					</div>
					<!-- end Jabatan Struktural -->
					<!-- Jafung -->
					<div class="form-group"><label class="col-sm-2 control-label">Ja. Fungsional Tertentu</label>
						<div class="col-sm-8"> 
							<input type="text" id="txt_jafung" name="txt_jafung" class="form-control" readonly="readonly">
						</div>
					</div>
					<!-- end Jafung -->				</div>													<div class="col-sm-6 text-center"> 
					<!-- Jafung Umum-->
					<div class="form-group"><label class="col-sm-2 control-label">Ja. Fungsional Umum</label>
						<div class="col-sm-8"> 
							<input type="text" id="txt_jafungumum" name="txt_jafungumum" class="form-control" readonly="readonly">
						</div>
					</div>
					<!-- end Jafung -->
					<!-- Gaji Pokok -->
					<div class="form-group"><label class="col-sm-2 control-label">Gaji Pokok</label>
						<div class="col-sm-8"> 
							<input type="text" id="txt_gajipokok" name="txt_gajipokok" class="form-control" readonly="readonly">
						</div>
					</div>
					<!-- end Gaji Pokok -->										<!-- foto -->										<div class="col-sm-8 text-center"> 						<div id="div_photo" style=" margin-left:10%; margin-bottom: 5px;">							<img id="img_profil" alt="image" src="<?php echo base_url();?>assets/themes/inspinia/images/photo.jpg" style="width:70%;min-height:20%;border-radius:5px;border:solid 1px #e5e6e7;">						</div>	 					</div>										<!-- end foto -->									</div>
				<div class="form-group"><label class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
				   		<?php include("datalanjutan.php");?>
					</div>
				</div>
			</div> 
			<div id="tab-2" class="tab-pane">
				<div class="col-sm-7 pull-right">
	                <div class="input-group">
	                	<input type="text" id="txt_search" name="txt_search" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                    <button type="button" id="btnSearch" class="btn btn-sm btn-primary" onclick="form_search()"> Go!</button> </span>
	               	</div>
	          	</div>
	            <div class="col-lg-12">
	            	&nbsp;
	            </div>  
				<div id="formcontent" class="col-lg-12 table-responsive">
					<?php include("datatable.php");?> 
				</div>  
			</div>			<div id="tab-3" class="tab-pane">				<div id="formcontent" class="col-lg-12 table-responsive">					<?php include("komponen.php");?> 				</div>  
			</div>
		</div> 
	</div>
</form>
<!-- END FORM -->
<script>
<?php include("form.js");?>
</script>
