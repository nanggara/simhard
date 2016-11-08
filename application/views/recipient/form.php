<!-- FORM -->
<!-- layout receipent -->
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
							<div class="form-group"><label class="col-sm-3 control-label">ID</label>
								<div class="col-sm-4">								
									<input type="hidden" id="txt_regid" name="txt_regid" class="form-control" value="<?php echo $regidrec;?>">
									<input type="hidden" id="txt_photoprofil" name="txt_photoprofil" class="form-control" value="">
									<input type="text" id="txt_noanggota" name="txt_noanggota" class="form-control" readonly="readonly">
								</div> 
							</div> 
							<div class="form-group"><label class="col-sm-3 control-label">NIP BARU</label>
								<div class="col-sm-9">
									<input type="text" id="txt_nipbaru" name="txt_nipbaru" class="form-control">
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">NIP LAMA</label>
								<div class="col-sm-9">
									<input type="text" id="txt_niplama" name="txt_niplama" class="form-control">
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">NAMA</label>
								<div class="col-sm-9">
									<input type="text" id="txt_namalengkap" name="txt_namalengkap" class="form-control">
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">GELAR DEPAN</label>
								<div class="col-sm-3"> 
									<input type="text" id="txt_gelardpn" name="txt_gelardpn" class="form-control">
								</div>
								<div class="col-sm-3"> 
									<label class="col-sm-12 control-label">GELAR BELAKANG</label>
								</div>
								<div class="col-sm-3"> 
									<input type="text" id="txt_gelarblkg" name="txt_gelarblkg" class="form-control">
								</div>
							</div> 
							<div class="form-group"><label class="col-sm-3 control-label">TEMPAT LAHIR</label>
								<div class="col-sm-3"> 
									<input type="text" id="txt_tempatlahir" name="txt_tempatlahir" class="form-control">
								</div>
								<div class="col-sm-3"> 
									<label class="col-sm-12 control-label">TANGGAL LAHIR</label>
								</div>
								<div class="col-sm-3"> 
									<input type="text" id="txt_tanggallahir" name="txt_tanggallahir" class="form-control" value="">
								</div>
							</div>
							<div class="form-group"><label class="col-sm-3 control-label">AGAMA</label>
								<div class="col-sm-8">
									<select id="div_agama" name="div_agama" class="form-control" onchange="form_institusi_change(this);">
							    		<option value="0">Pilih Agama</option>
							    		<?php foreach($ddl_dataagama->result() as $kelIns) {?>
							        		<option value="<?php echo $kelIns->kodeagama;?>"><?php echo $kelIns->agama;?></option> 
							           	<?php }?>
							      	</select> 
								</div>
								<div class="col-sm-1"> 
									<button class="btn btn-primary btn-sm" type="button" onclick="on_agama_click()">+</button> 
								</div>
							</div>		     
					</div>
				</div>
				<div class="form-group"> 
					&nbsp;
				</div>
				<div class="form-group"><label class="col-sm-2 control-label">JENIS KELAMIN</label>
					<div class="col-sm-4"> 
						<input type="radio" id="rad_jkl" name="rad_jk" value="1" checked="checked">Laki-Laki  &nbsp;
						<input type="radio" id="rad_jkp" name="rad_jk"  value="0">Perempuan
					</div>
					<div class="col-sm-2"> 
						<label class="col-sm-12 control-label">Usia</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_usia" name="txt_usia" class="form-control" value="">
					</div> 
				</div>	

				<!-- menikah -->
				<div class="form-group"><label class="col-sm-2 control-label">Status Menikah</label>
					<div class="col-sm-9">
						<select id="div_kawin" name="div_kawin" class="form-control">
				    		<option value="0">Pilih Status</option>
				    		<?php foreach($ddl_datakawin->result() as $kwnrow) {?>
				        		<option value="<?php echo $kwnrow->kodekawin;?>"><?php echo $kwnrow->kawin;?></option> 
				           	<?php }?>
				      	</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_kawin_click()">+</button> 
					</div>
				</div>
				<!-- End menikah -->

				<!-- alamat -->
				<div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-9"><input type="text" id="txt_alamat" name="txt_alamat" class="form-control"></div>
				</div>
				<!-- end alamat -->

				<!-- kode pos -->
				<div class="form-group"><label class="col-sm-2 control-label">Kode Pos</label>
					<div class="col-sm-9"><input type="text" id="txt_pos" name="txt_pos" class="form-control"></div>
				</div>
				<!-- end kode pos -->

				<!-- jenis kepegawaian -->
				<div class="form-group"><label class="col-sm-2 control-label">Jenis Kepegawaian</label>
					<div class="col-sm-9"><input type="text" id="txt_jnspeg" name="txt_jnspeg" class="form-control"></div>
				</div>
				<!-- end jenis kepegawaian -->

				<!-- kedudukan PNS -->
				<div class="form-group"><label class="col-sm-2 control-label">Kedudukan PNS</label>
					<div class="col-sm-9">
						<select id="div_kedudukan" name="div_kedudukan" class="form-control">
				    		<option value="0">Pilih Kedudukan</option>
				    		<?php foreach($ddl_datakedudukan->result() as $kwnrow) {?>
				        		<option value="<?php echo $kwnrow->kodekedudukan;?>"><?php echo $kwnrow->kedudukan;?></option> 
				           	<?php }?>
				      	</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_kedudukan_click()">+</button> 
					</div>
				</div>
				<!-- kedudukan PNS -->

				<!-- status pegawai -->
				<div class="form-group"><label class="col-sm-2 control-label">Status Pegawai</label>
					<div class="col-sm-9"> 
						<input type="radio" id="rad_cpns" name="rad_stat" value="1" checked="checked">PNS  &nbsp;
						<input type="radio" id="rad_pns" name="rad_stat"  value="0">CPNS
					</div>
				</div>
				<!-- end status pegawai -->

				<!-- tanggal tamatan -->
				<div class="form-group"><label class="col-sm-2 control-label">Tamat CPNS</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tmtcpns" name="txt_tmtcpns" class="form-control" value="">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">Tamat PNS</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tmtpns" name="txt_tmtpns" class="form-control" value="">
					</div>
				</div>
				<!-- end tanggal tamatan --> 	

				<!-- tamatan cpns awal  -->
				<div class="form-group"><label class="col-sm-2 control-label">Tahun Lulus Pendidikan Awal</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_lulusawal" name="txt_lulusawal" class="form-control" value="">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">Tingkat Pendidikan Awal</label>
					</div>
					<div class="col-sm-3">
						<select id="div_jenjangawal" name="div_jenjangawal" class="form-control"> 
							<?php foreach($ddl_datajenjang->result() as $jnjRow) {?>
								<option value="<?php echo $jnjRow->kodejenjang;?>"><?php echo $jnjRow->jenjang;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_jenjang_click()">+</button>  
					</div>
				</div>
				<!-- end tamatan cpns awal -->

				<!-- tamatan pns akhir  -->
				<div class="form-group"><label class="col-sm-2 control-label">Tahun Lulus Pendidikan Akhir</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_lulusakhir" name="txt_lulusakhir" class="form-control" value="">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">Tingkat Pendidikan Akhir</label>
					</div>
					<div class="col-sm-3">
						<select id="div_jenjangakhir" name="div_jenjangakhir" class="form-control"> 
							<?php foreach($ddl_datajenjang->result() as $jnjRow) {?>
								<option value="<?php echo $jnjRow->kodejenjang;?>"><?php echo $jnjRow->jenjang;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_jenjang_click()">+</button>  
					</div>
				</div>
				<!-- end tamatan pns akhir -->

				<!-- Diklat Struktural SEPADA & SEPALA-->
				<div class="form-group"><label class="col-sm-2 control-label">Diklat Struktural SEPADA</label>
					<div class="col-sm-3">
						<input type="text" id="txt_tgldiklat1" name="txt_tgldiklat1" class="form-control" value="">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">Diklat Struktural SEPALA</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tgldiklat2" name="txt_tgldiklat2" class="form-control" value="">
					</div>
				</div> 				
				<!-- end Diklat Struktural SEPADA & SEPALA-->

				<!-- Diklat Struktural SEPADYA & SPAMEN -->
				<div class="form-group"><label class="col-sm-2 control-label">Diklat Struktural SEPADYA</label>
					<div class="col-sm-3">
						<input type="text" id="txt_tgldiklat3" name="txt_tgldiklat3" class="form-control" value="">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">Diklat Struktural SPAMEN</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tgldiklat4" name="txt_tgldiklat4" class="form-control" value="">
					</div>
				</div> 				
				<!-- end Diklat Struktural SEPADYA & SPAMEN -->

				<!-- Diklat Struktural SEPATI -->
				<div class="form-group"><label class="col-sm-2 control-label">Diklat Struktural SEPATI</label>
					<div class="col-sm-9">
						<input type="text" id="txt_tgldiklat5" name="txt_tgldiklat5" class="form-control" value="">
					</div>
				</div> 				
				<!-- end Diklat Struktural SEPATI -->

				<!-- Unit Organisasi -->
				<div class="form-group"><label class="col-sm-2 control-label">Unit Organisasi</label>
					<div class="col-sm-9"><input type="text" id="txt_unitorg" name="txt_unitorg" class="form-control"></div>
				</div>
				<!-- end Unit Organisasi -->

				<!-- Jenis Jabatan -->
				<div class="form-group"><label class="col-sm-2 control-label">Jenis Jabatan</label>
					<div class="col-sm-9">
						<select id="div_jabatan" name="div_jabatan" class="form-control"> 
							<?php foreach($ddl_datajabatan->result() as $jbtRow) {?>
								<option value="<?php echo $jbtRow->kodejabatan;?>"><?php echo $jbtRow->jabatan;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_jabatan_click()">+</button>  
					</div>
				</div>
				<!-- End Jenis Jabatan -->

				<!-- Jabatan Struktural -->
				<div class="form-group"><label class="col-sm-2 control-label">Jabatan Struktural</label>
					<div class="col-sm-9"><input type="text" id="txt_jabstruk" name="txt_jabstruk" class="form-control"></div>
				</div>
				<!-- end Jabatan Struktural -->

				<!-- Eseleon -->
				<div class="form-group"><label class="col-sm-2 control-label">Eseleon</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_eseleon" name="txt_eseleon" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">TMT Eseleon</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tmteseleon" name="txt_tmteseleon" class="form-control" value="">
					</div>
				</div>
				<!-- end Eseleon -->

				<!-- Jafung -->
				<div class="form-group"><label class="col-sm-2 control-label">Ja. Fungsional Tertentu</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_jafung" name="txt_jafung" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">TMT Ja. Fung</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tmtjafung" name="txt_tmtjafung" class="form-control" value="">
					</div>
				</div>
				<!-- end Jafung -->

				<!-- Jafung Umum-->
				<div class="form-group"><label class="col-sm-2 control-label">Ja. Fungsional Umum</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_jafungumum" name="txt_jafungumum" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">TMT Ja.Fung Umum</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tmtjafungumum" name="txt_tmtjafungumum" class="form-control" value="">
					</div>
				</div>
				<!-- end Jafung -->

				<!-- Golongan awal-->
				<div class="form-group"><label class="col-sm-2 control-label">Golongan Awal</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_golawal" name="txt_golawal" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">TMT Gol. Awal</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tmtgolawal" name="txt_tmtgolawal" class="form-control" value="">
					</div>
				</div>
				<!-- end Golongan awal -->

				<!-- Golongan akhir-->
				<div class="form-group"><label class="col-sm-2 control-label">Golongan Akhir</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_golakhir" name="txt_golakhir" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">TMT Gol. Akhir</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tmtgolakhir" name="txt_tmtgolakhir" class="form-control" value="">
					</div>
				</div>
				<!-- end Golongan akhir -->

				<!-- Gaji Pokok -->
				<div class="form-group"><label class="col-sm-2 control-label">Gaji Pokok</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_gajipokok" name="txt_gajipokok" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">Golongan Darah</label>
					</div>
					<div class="col-sm-3">
						<select id="div_goldar" name="div_goldar" class="form-control"> 
							<?php foreach($ddl_datagoldar->result() as $gldRow) {?>
								<option value="<?php echo $gldRow->kodegoldar;?>"><?php echo $gldRow->goldar;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_goldar_click()">+</button>  
					</div>
				</div>
				<!-- end Gaji Pokok -->

				<!-- Kartu Pegawai & KARIS -->
				<div class="form-group"><label class="col-sm-2 control-label">No. Seri KARPEG</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_nokarpeg" name="txt_nokarpeg" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">No. Seri KARIS</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_nokaris" name="txt_nokaris" class="form-control">
					</div>
				</div>
				<!-- end Kartu Pegawai & KARIS -->

				<!-- Akta Lahir -->
				<div class="form-group"><label class="col-sm-2 control-label">No. Akta Kelahiran</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_noaktalahir" name="txt_noaktalahir" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">Tanggal</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tglaktalahir" name="txt_tglaktalahir" class="form-control" value="">
					</div>
				</div>
				<!-- end Akta Lahir -->

				<!-- ASKES & TASPEN -->
				<div class="form-group"><label class="col-sm-2 control-label">No. ASKES</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_noaskes" name="txt_noaskes" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">No. TASPEN</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_notaspen" name="txt_notaspen" class="form-control">
					</div>
				</div>
				<!-- end ASKES & TASPEN -->

				<!-- NPWP -->
				<div class="form-group"><label class="col-sm-2 control-label">No. NPWP</label>
					<div class="col-sm-3"> 
						<input type="text" id="txt_nonpwp" name="txt_nonpwp" class="form-control">
					</div>
					<div class="col-sm-3"> 
						<label class="col-sm-12 control-label">Tanggal NPWP</label>
					</div>
					<div class="col-sm-3"> 
						<input type="text" id="txt_tglnpwp" name="txt_tglnpwp" class="form-control" value="">
					</div>
				</div>
				<!-- end NPWP -->

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
				<!-- <div class="form-group"><label class="col-sm-2 control-label">Tgl. Masuk</label>
					<div class="col-sm-9">
						<input type="text" id="txt_tglmasukanggota" name="txt_tglmasukanggota" class="form-control" value="<?php echo date('d-m-Y');?>">
					</div>
				</div>  -->
				<!-- <div class="form-group"><label class="col-sm-2 control-label">Panggilan</label>
					<div class="col-sm-9"><input type="text" id="txt_panggilan" name="txt_panggilan" class="form-control"></div>
				</div> -->                         
				<!-- <div class="form-group"><label class="col-sm-2 control-label">Kelompok</label>
					<div class="col-sm-9">
						<select id="div_kelompok" name="div_kelompok" class="form-control"> 
							<?php foreach($ddl_datakelompok->result() as $kelRow) {?>
								<option value="<?php echo $kelRow->kodekelompok;?>"><?php echo $kelRow->kelompok;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_kelompok_click()">+</button>  
					</div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label">Universitas</label>
					<div class="col-sm-9">
						<select id="div_universitas" name="div_universitas" class="form-control"> 
							<?php foreach($ddl_datauniversitas->result() as $kelRow) {?>
								<option value="<?php echo $kelRow->kodeuniversitas;?>"><?php echo $kelRow->universitas;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_universitas_click()">+</button>  
					</div>
				</div> -->
				<!-- <div class="form-group"><label class="col-sm-2 control-label">Jenjang</label>
					<div class="col-sm-9">
						<select id="div_jenjang" name="div_jenjang" class="form-control"> 
							<?php foreach($ddl_datajenjang->result() as $jnjRow) {?>
								<option value="<?php echo $jnjRow->kodejenjang;?>"><?php echo $jnjRow->jenjang;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_jenjang_click()">+</button>  
					</div>
				</div> -->
				<!-- <div class="form-group"><label class="col-sm-2 control-label">Fakultas</label>
					<div class="col-sm-9"><input type="text" id="txt_fakultas" name="txt_fakultas" class="form-control"></div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label">Program Studi</label>
					<div class="col-sm-9"><input type="text" id="txt_programstudi" name="txt_programstudi" class="form-control"></div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label">Jurusan</label>
					<div class="col-sm-9"><input type="text" id="txt_jurusan" name="txt_jurusan" class="form-control"></div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label">IPK</label>
					<div class="col-sm-9"><input type="text" id="txt_ipk" name="txt_ipk" class="form-control"></div>
				</div> -->
				<!-- <div class="form-group"><label class="col-sm-2 control-label">Pekerjaan</label>
					<div class="col-sm-9">
						<select id="div_pekerjaan" name="div_pekerjaan" class="form-control"> 
							<?php foreach($ddl_datapekerjaan->result() as $pkjRow) {?>
								<option value="<?php echo $pkjRow->kodepekerjaan;?>"><?php echo $pkjRow->pekerjaan;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_pekerjaan_click()">+</button>  
					</div>
				</div>
				<div class="form-group" ><label class="col-sm-2 control-label">Instansi</label>
					<div class="col-sm-9">
						<select id="div_instansi" name="div_instansi" class="form-control">
							<option value="0">Pilih Instansi</option>
							<?php foreach($ddl_datainstansi->result() as $kelRow) {?>
								<option value="<?php echo $kelRow->kodeinstansi;?>"><?php echo $kelRow->instansi;?></option> 
							<?php }?>
						</select> 
					</div>
					<div class="col-sm-1"> 
						<button class="btn btn-primary btn-sm" type="button" onclick="on_instansi_click()">+</button>  
					</div>
				</div> -->
				<!-- <div class="form-group"><label class="col-sm-2 control-label">Suku Bangsa</label>
					<div class="col-sm-9"><input type="text" id="txt_sukubangsa" name="txt_sukubangsa" class="form-control"></div>
				</div> --> 
				<!-- <div class="form-group"><label class="col-sm-2 control-label">Akun LinkedIn</label>
					<div class="col-sm-9"><input type="text" id="txt_linkedin" name="txt_linkedin" class="form-control"></div>
				</div>                          
				<div class="form-group"><label class="col-sm-2 control-label">Web Site</label>
					<div class="col-sm-9"><input type="text" id="txt_website" name="txt_website" class="form-control"></div>
				</div>                          
				<div class="form-group"><label class="col-sm-2 control-label">FB</label>
					<div class="col-sm-9"><input type="text" id="txt_fb" name="txt_fb" class="form-control"></div>
				</div>                         
				<div class="form-group"><label class="col-sm-2 control-label">Twitter</label>
					<div class="col-sm-9"><input type="text" id="txt_twitter" name="txt_twitter" class="form-control"></div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label">Catatan</label>
					<div class="col-sm-9"><input type="text" id="txt_catatan" name="txt_catatan" class="form-control"></div>
				</div>  -->
				<div class="form-group"><label class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
				   		<?php include("datalanjutan.php");?>
					</div>
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
			</div>
		</div> 
	</div>
</form>
<!-- END FORM -->
<script>
<?php include("form.js");?>
</script>
