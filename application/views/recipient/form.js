var myVarTimer;

$(document).ready(function () {  
	myVarTimer = setTimeout(function(){
		if($("#txt_regid").val().length>0){
			form_select_row($("#txt_regid").val());
		} 
		clearTimeout(myVarTimer);
	}, 1500);
	
	$('#txt_tglmasukanggota').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tanggallahir').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tmtcpns').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tmtpns').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tmteseleon').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tmtjafung').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tmtjafungumum').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tmtgolawal').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tmtgolakhir').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tgldiklat1').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tgldiklat2').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tgldiklat3').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tgldiklat4').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tgldiklat5').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_lulusawal').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_lulusakhir').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tglaktalahir').datepicker({
		format: 'dd-mm-yyyy'
	});
	$('#txt_tglnpwp').datepicker({
		format: 'dd-mm-yyyy'
	});

	form_convert_paging("#formcontent"); 
}); 
function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};
function form_alert_close(){ 
	$('#alertMsgForm').attr('class','alert alert-info alert-dismissable hide');
	$('#alertTextForm').html('');
	$('#modal-progress').modal('hide');
}
function form_alert_show(pesan){	
	$('#alertMsgForm').attr('class','alert alert-info alert-dismissable');
	$('#alertTextForm').html(pesan);
}
function form_add_phone(){ 
	var jml = parseInt($("#txt_count_telepon").val())+1;	
	$("#txt_count_telepon").val(jml);
	var konten = '<div id="form-group-'+jml+'" class="form-group"><label class="col-sm-2 control-label">Nomor Telepon '+jml+'</label><div class="col-sm-9"><input type="text" name="txt_telepon[]" class="form-control"></div><div class="col-sm-1"><button class="btn btn-danger btn-sm" type="button" onclick="form_del_phone('+jml+')">-</button></div></div> ';
	$('#div_telepon').append(konten);
} 
function form_del_phone(index){
	var jml = parseInt($("#txt_count_telepon").val())-1;
	$("#txt_count_telepon").val(jml);
	$("#form-group-"+index).remove();
} 
function form_add_email(){
	var jml = parseInt($("#txt_count_email").val())+1;	
	$("#txt_count_email").val(jml);
	var konten = '<div id="form-group-email-'+jml+'" class="form-group"><label class="col-sm-2 control-label">Email '+jml+'</label><div class="col-sm-9"><input type="text" name="txt_email[]" class="form-control"></div><div class="col-sm-1"><button class="btn btn-danger btn-sm" type="button" onclick="form_del_email('+jml+')">-</button></div></div> ';
	$('#div_email').append(konten);
}
function form_del_email(index){
	var jml = parseInt($("#txt_count_email").val())-1;
	$("#txt_count_email").val(jml);
	$("#form-group-email-"+index).remove();
}  
function form_reset(){
	$('#myForm')[0].reset(); 
	$('#txt_regid').val(''); 
	$('#txt_nipbaru').val('');
	$('#txt_niplama').val('');
	$("#div_attachment_list").html("");
	var div_telepon = '<div id="form-group-1" class="form-group"><label class="col-sm-2 control-label">Nomor Telepon 1</label><div class="col-sm-9"><input type="hidden" id="txt_count_telepon" name="txt_count_telepon" value="1"><input type="text" name="txt_telepon[]" class="form-control"></div><div class="col-sm-1"> <button class="btn btn-primary btn-sm" type="button" onclick="form_add_phone()">+</button> </div></div>';
	$('#div_telepon').html(div_telepon);
	var div_email = '<div id="form-group-email-1" class="form-group"><label class="col-sm-2 control-label">Email</label><div class="col-sm-9"><input type="hidden" id="txt_count_email" name="txt_count_email" value="1"><input type="text" name="txt_email[]" class="form-control"></div><div class="col-sm-1"><button class="btn btn-primary btn-sm" type="button" onclick="form_add_email()">+</button></div></div> ';
	$('#div_email').html(div_email);
	$('#rad_jkl').attr('checked','checked');
	$('#rad_jkp').removeAttr('checked');
	$("#btnUpload").attr("disabled","disabled");
	$("#div_photo").html('<img id="img_profil" alt="image" src="<?php echo base_url();?>assets/themes/inspinia/images/photo.jpg" style="width:70%;min-height:20%;border-radius:5px;border:solid 1px #e5e6e7;">');
	form_get_keluarga(0);
	form_get_pendidikan(0);
	form_get_pendidikannonformal(0);
	form_get_kewirausahaan(0);
	form_get_organisasi(0);
	form_get_golongan(0);
	form_get_rwytjabatan(0);
	form_get_diklat(0);
	form_get_kursus(0);
	form_get_penghargaan(0);
	form_get_kerja(0);
	form_get_volunteer(0);
	form_get_prestasi(0);
	form_get_jenjang(0);
	form_get_pekerjaan(0);
	$("#loadingmain").show();
}
function form_save(){			var data=$('#form').val();        $.ajax({            type: "POST",            url: "<?php echo base_url('recipient/form_save/'); ?>",            data: {"form":data},            success: function(resp){                    $("#hasil").html(resp);			form_search(); 			var obj = jQuery.parseJSON(response);  			form_alert_show(obj.pesan); 			$("#loadingmain").hide(); 			if(obj.status==true){	 			$("#txt_regid").val(obj.id);	 			$("#txt_noanggota").val(obj.noanggota);	 			$("#btnUpload").removeAttr("disabled");            },            error:function(event, textStatus, errorThrown) {               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);            }        });    }
	//$("#loadingmain").show();
	//$('#modal-progress').modal('show');
	//var data = $("form").serialize();  
    //$.ajax({
 		//type: "POST",
 		//url : "<?php echo base_url('recipient/form_save/')?>",
 		//data: data,
 		//success: function(response){
 			//form_search();
 			//var obj = jQuery.parseJSON(response); 
 			//form_alert_show(obj.pesan);
 			//$("#loadingmain").hide();
 			//if(obj.status==true){
	 			//$("#txt_regid").val(obj.id);
	 			//$("#txt_noanggota").val(obj.noanggota);
	 			//$("#btnUpload").removeAttr("disabled");	 			
 			//}			 //error:function(event, textStatus, errorThrown) {               //alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
 		//}
 	//}); 
	//} //}
function on_delete_attachment(urut,filename){ 
	if (confirm("Yakin akan menghapus file Attachment!") == false) {
	    return;
	} 
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
	var data = "urut="+urut+"&filename="+filename;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/on_delete_attachment/')?>",
 		data: data,
 		success: function(response){
 			form_alert_show(response);
 			$("#loadingmain").hide();	
 			attachment_select_byid();
 		}
 	}); 
}
function form_upload_att() {
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Simpan atau Pilih data Anggota terlebih dahulu!");
		return;
	}
	
	if($("#fileToUploadAtt").val().length==0){
		alert("Tolong Pilih File Attachment.");
		return;
	}	 
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
    var fd = new FormData(); 
    fd.append("fileToUploadAtt", document.getElementById('fileToUploadAtt').files[0]);  
    fd.append("txt_regid", $('#txt_regid').val()); 
    var xhr = new XMLHttpRequest(); 
    xhr.addEventListener("load", uploadComplete, false);
    xhr.addEventListener("error", uploadFailed, false); 
    xhr.open("POST", "<?php echo site_url('recipient/form_upload_att/')?>");
    xhr.send(fd);
} 
function uploadComplete(evt) {   	
	attachment_select_byid();
	$("#fileToUploadAtt").val(""); 
	$("#txt_attachment").val(""); 
	form_alert_show(evt.target.responseText);
	$("#loadingmain").hide();	
} 
function uploadFailed(evt) { 
	form_alert_show(evt.target.responseText);   
	$("#loadingmain").hide();
} 
function form_select_row(kode){  
	form_reset();
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				email_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_regid').val(obj.regidrec);
 				$('#txt_noanggota').val(obj.noanggota);
 				$('#txt_tglmasukanggota').val(obj.tglmasukanggotafrm);
 				$('#txt_namalengkap').val(obj.namalengkap);
 				$('#txt_nipbaru').val(obj.nipbaru);
 				$('#txt_niplama').val(obj.niplama);
 				$('#txt_gelardpn').val(obj.gelardpn);
 				$('#txt_gelarblkg').val(obj.gelarblk);
 				$('#txt_alamat').val(obj.alamat);
 				$('#txt_pos').val(obj.kodepos);
 				$('#txt_unitorg').val(obj.unitorganisasi);
 				$('#txt_gajipokok').val(obj.gajipokokbaru);
 				$('#txt_jabstruk').val(obj.jabstruk);
 				$('#txt_eseleon').val(obj.eseleon);
 				$('#txt_jafung').val(obj.jafung);
 				$('#txt_jafungumum').val(obj.jafungumum);
 				$('#txt_golawal').val(obj.golawal);
 				$('#txt_golakhir').val(obj.golakhir);
 				$('#txt_jnspeg').val(obj.jns_kepeg);
 				$('#txt_nokarpeg').val(obj.nokarpeg);
 				$('#txt_nokaris').val(obj.nokaris);
 				$('#txt_noaktalahir').val(obj.noaktalahir);
 				$('#txt_noaskes').val(obj.noaskes);
 				$('#txt_notaspen').val(obj.notaspen);
 				$('#txt_nonpwp').val(obj.nonpwp);
 				$('#txt_panggilan').val(obj.panggilan);
 				$('#txt_tempatlahir').val(obj.tempatlahir);
 				$('#div_jenjangawal').val(obj.kodejenjangawl);
 				$('#div_jenjangakhir').val(obj.kodejenjangakh);
 				$('#txt_tanggallahir').val(obj.tanggallahirfrm);
 				$('#txt_tmtcpns').val(obj.tmtcpnsfrm);
 				$('#txt_tmtpns').val(obj.tmtpnsfrm);
 				$('#txt_tgldiklat1').val(obj.diklatstruktural1frm);
 				$('#txt_tgldiklat2').val(obj.diklatstruktural2frm);
 				$('#txt_tgldiklat3').val(obj.diklatstruktural3frm);
 				$('#txt_tgldiklat4').val(obj.diklatstruktural4frm);
 				$('#txt_tgldiklat5').val(obj.diklatstruktural5frm);
 				$('#txt_lulusawal').val(obj.lulusawalfrm);
				$('#txt_lulusakhir').val(obj.lulusakhirfrm);
 				$('#txt_tmteseleon').val(obj.tmteseleonfrm);
 				$('#txt_tmtjafung').val(obj.tmtjafungfrm);
 				$('#txt_tmtjafungumum').val(obj.tmtjafungumumfrm); 
 				$('#txt_tmtgolawal').val(obj.tmtgolawalfrm);
 				$('#txt_tmtgolakhir').val(obj.tmtgolakhirfrm);
 				$('#txt_tglnpwp').val(obj.tglnpwpfrm);
 				$('#txt_tglaktalahir').val(obj.tglaktalahirfrm); 				 										
 				if(obj.jeniskelamin==0){ 
 					$("#rad_jkp").prop("checked", true);
 				}else{
 					$("#rad_jkl").prop("checked", true);
 				}
 				$('#txt_usia').val(obj.usia);
 				$('#div_agama').val(obj.kodeagama);
 				$('#div_kawin').val(obj.kodekawin);
 				$('#div_kedudukan').val(obj.kodekedudukan);
 				$('#txt_jabatan').val(obj.jabatan);
 				$('#div_jabatan').val(obj.kodejabatan);
 				$('#txt_goldar').val(obj.goldar);
 				$('#div_goldar').val(obj.kodegoldar);
 				// $('#txt_jenjang').val(obj.jenjang);
 				// $('#div_jenjang').val(obj.kodejenjang); 				
 				// $('#div_kelompok').val(obj.kodekelompok);
 				// $('#div_universitas').val(obj.kodeuniversitas); 
 				// $('#div_pekerjaan').val(obj.kodepekerjaan);
 				// $('#div_instansi').val(obj.kodeinstansi);
 				// $('#txt_sukubangsa').val(obj.sukubangsa);
 				// $('#txt_fakultas').val(obj.fakultas);
 				// $('#txt_programstudi').val(obj.programstudi);
 				// $('#txt_jurusan').val(obj.jurusan);
 				// $('#txt_ipk').val(obj.ipk); 				
 				// $('#txt_linkedin').val(obj.linkedin);
 				// $('#txt_website').val(obj.website);
 				// $('#txt_fb').val(obj.fb);
 				// $('#txt_twitter').val(obj.twitter);
 				// $('#txt_catatan').val(obj.catatan);
 				$('#txt_photoprofil').val(obj.photoprofil);
 				
 				$("#btnUpload").removeAttr("disabled");
 				activaTab('tab-1');
 				form_get_telepon(kode);
 				form_get_email(kode);
 				form_profil_change(obj.photoprofil);
 				form_institusi_change('#div_institusi');
 				form_get_keluarga(kode);
 				form_get_pendidikan(kode);
 				form_get_pendidikannonformal(kode);
				form_get_kewirausahaan(kode);
 				form_get_organisasi(kode);
 				form_get_golongan(kode);
 				form_get_rwytjabatan(kode);
 				form_get_diklat(kode);
 				form_get_kursus(kode);
 				form_get_penghargaan(kode);
 				form_get_orangtua(kode);
 				form_get_pasangan(kode);
 				form_get_anak(kode);
 				form_get_kerja(kode);
 				form_get_volunteer(kode);
 				form_get_prestasi(kode);
 				attachment_select_byid();
 				$('#modal-progress').modal('hide'); 				
 			}
 		}
 	}); 
} 
function form_profil_change(kode){
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		data: data,
 		url : "<?php echo site_url('recipient/form_profil_change/')?>", 
 		success: function(response){ 
 			$("#div_photo").html(response);			 
 		}
 	}); 
}
function form_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_delete_row/')?>",
 		data: data,
 		success: function(response){  			
 			form_alert_show(response) 	
 			form_search(); 			 
 		}
 	}); 
}
function form_get_telepon(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_telepon/')?>",
 		data: data,
 		success: function(response){
 			if(response=='<input type="hidden" id="txt_count_telepon" name="txt_count_telepon" value="0">'){
 				
 			}else{
 				$('#div_telepon').html(response);
 			}		 
 		}
 	}); 
}
function form_get_email(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_email/')?>",
 		data: data,
 		success: function(response){
 			if(response=='<input type="hidden" id="txt_count_email" name="txt_count_email" value="0">'){
 				
 			}else{
 				$('#div_email').html(response);
 			}			 
 		}
 	}); 
}
function form_get_kelompok(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_kelompok/')?>", 
 		success: function(response){
 			$('#div_kelompok').html(response); 			 
 		}
 	}); 
}
function form_get_institusi(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_institusi/')?>", 
 		success: function(response){
 			$('#div_institusi').html(response); 			 
 		}
 	}); 
}
function form_get_agama(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_agama/')?>", 
 		success: function(response){
 			$('#div_agama').html(response); 			 
 		}
 	}); 
}
function form_get_kawin(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_kawin/')?>", 
 		success: function(response){
 			$('#div_kawin').html(response); 			 
 		}
 	}); 
}
function form_get_kedudukan(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_kedudukan/')?>", 
 		success: function(response){
 			$('#div_kedudukan').html(response); 			 
 		}
 	}); 
}
function form_get_universitas(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_universitas/')?>", 
 		success: function(response){
 			$('#div_universitas').html(response); 			 
 		}
 	}); 
}
function form_get_jenjang(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_jenjang/')?>", 
 		success: function(response){
 			$('#div_jenjang').html(response); 			 
 		}
 	}); 
}
function form_get_jabatan(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_jabatan/')?>", 
 		success: function(response){
 			$('#div_jabatan').html(response); 			 
 		}
 	}); 
}
function form_get_goldar(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_goldar/')?>", 
 		success: function(response){
 			$('#div_goldar').html(response); 			 
 		}
 	}); 
}
function form_get_pekerjaan(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_pekerjaan/')?>", 
 		success: function(response){
 			$('#div_pekerjaan').html(response); 			 
 		}
 	}); 
}
function form_get_instansi(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_instansi/')?>", 
 		success: function(response){
 			$('#div_instansi').html(response); 			 
 		}
 	}); 
}
function form_get_keluarga(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_keluarga/')?>",
 		data: data,
 		success: function(response){ 
 			$('#div_data_keluarga').html(response); 			 
 		}
 	}); 
}
function form_get_pendidikan(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_pendidikan/')?>",
 		data: data,
 		success: function(response){ 
 			$('#div_data_pendidikan').html(response); 			 
 		}
 	}); 
}
function form_get_pendidikannonformal(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_pendidikannonformal/')?>",
 		data: data,
 		success: function(response){ 
 			$('#div_data_pendidikannonformal').html(response); 			 
 		}
 	}); 
}
function form_get_kewirausahaan(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_kewirausahaan/')?>",
 		data: data,
 		success: function(response){ 
 			$('#div_data_kewirausahaan').html(response); 			 
 		}
 	}); 
}

function form_get_organisasi(kode){ 
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_organisasi/')?>",
 		data: data,
 		success: function(response){  
 			$('#div_data_organisasi').html(response); 			 
 		}
 	}); 
}
function form_get_golongan(kode){ 
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_golongan/')?>",
 		data: data,
 		success: function(response){  
 			$('#div_data_golongan').html(response); 			 
 		}
 	}); 
}
function form_get_rwytjabatan(kode){ 
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_rwytjabatan/')?>",
 		data: data,
 		success: function(response){  
 			$('#div_data_rwytjabatan').html(response); 			 
 		}
 	}); 
}
function form_get_diklat(kode){ 
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_diklat/')?>",
 		data: data,
 		success: function(response){  
 			$('#div_data_diklat').html(response); 			 
 		}
 	}); 
}
function form_get_kursus(kode){ 
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_kursus/')?>",
 		data: data,
 		success: function(response){  
 			$('#div_data_kursus').html(response); 			 
 		}
 	}); 
}
function form_get_penghargaan(kode){ 
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_penghargaan/')?>",
 		data: data,
 		success: function(response){  
 			$('#div_data_penghargaan').html(response); 			 
 		}
 	}); 
}
function form_get_orangtua(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_orangtua/')?>",
 		data: data,
 		success: function(response){ 
 			$('#div_data_orangtua').html(response); 			 
 		}
 	}); 
}
function form_get_pasangan(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_pasangan/')?>",
 		data: data,
 		success: function(response){ 
 			$('#div_data_pasangan').html(response); 			 
 		}
 	}); 
}
function form_get_anak(kode){   
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_anak/')?>",
 		data: data,
 		success: function(response){ 
 			$('#div_data_anak').html(response); 			 
 		}
 	}); 
}
function form_get_kerja(kode){ 
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_kerja/')?>",
 		data: data,
 		success: function(response){  
 			$('#div_data_kerja').html(response); 			 
 		}
 	}); 
}
function form_get_volunteer(kode){ 
	var data = "kode="+kode; 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_volunteer/')?>",
 		data: data,
 		success: function(response){
 			$('#div_data_volunteer').html(response); 			 
 		}
 	}); 
}
function form_get_prestasi(kode){ 
	var data = "kode="+kode; 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_get_prestasi/')?>",
 		data: data,
 		success: function(response){
 			$('#div_data_prestasi').html(response); 			 
 		}
 	}); 
}
function form_institusi_change(kode){ 
	var data = "kode="+$(kode).val();
    $.ajax({
 		type: "POST",
 		data: data,
 		url : "<?php echo site_url('recipient/form_institusi_change/')?>", 
 		success: function(response){ 			
 			$('#txt_alamatinstitusi').val(response); 			 
 		}
 	}); 
}
function form_search(){ 
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_pagging/')?>",
 		data: data,
 		success: function(response){
 			$('#formcontent').html(response); 
 		}
 	});
}
function attachment_select_byid(){ 
	var data = "regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		data: data,
 		url : "<?php echo site_url('recipient/attachment_select_byid/')?>", 
 		success: function(response){ 			
 			$("#div_attachment_list").html(response);			 
 		}
 	}); 
}
function on_upload(){
	$("#modal-form-upload").modal("show");
}
function on_kelompok_click(){
	$('#modal-form').modal('show');
}
function on_agama_click(){
	$('#modal-form-agama').modal('show');
}
function on_kawin_click(){
	$('#modal-form-kawin').modal('show');
}
function on_kedudukan_click(){
	$('#modal-form-kedudukan').modal('show');
}
function on_universitas_click(){
	$('#modal-form-universitas').modal('show');
}
function on_jenjang_click(){ 
	$('#modal-form-jenjang').modal('show');
}
function on_jabatan_click(){ 
	$('#modal-form-jabatan').modal('show');
}
function on_goldar_click(){ 
	$('#modal-form-goldar').modal('show');
}
function on_pekerjaan_click(){ 
	$('#modal-form-pekerjaan').modal('show');
}
function on_instansi_click(){
	$('#modal-form-instansi').modal('show');
}
function on_keluarga_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-keluarga').modal('show');
		keluarga_search();
		keluarga_alert_close();
	}
}
function on_pendidikan_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-pendidikan').modal('show');
		pendidikan_search();
		pendidikan_alert_close();
	}
}
function on_kewirausahaan_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-kewirausahaan').modal('show');
		kewirausahaan_search();
		kewirausahaan_alert_close();
	}
}

function on_pendidikannonformal_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-pendidikannonformal').modal('show');
		pendidikannonformal_search();
		pendidikannonformal_alert_close();
	}
}
function on_organisasi_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-organisasi').modal('show');
		organisasi_search();
		organisasi_alert_close();
	}
}
function on_golongan_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-golongan').modal('show');
		golongan_search();
		golongan_alert_close();
	}
}
function on_rwytjabatan_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-rwytjabatan').modal('show');
		rwytjabatan_search();
		rwytjabatan_alert_close();
	}
}
function on_diklat_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-diklat').modal('show');
		diklat_search();
		diklat_alert_close();
	}
}
function on_kursus_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-kursus').modal('show');
		kursus_search();
		kursus_alert_close();
	}
}
function on_penghargaan_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-penghargaan').modal('show');
		penghargaan_search();
		penghargaan_alert_close();
	}
}
function on_orangtua_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-orangtua').modal('show');
		orangtua_search();
		orangtua_alert_close();
	}
}
function on_pasangan_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-pasangan').modal('show');
		pasangan_search();
		pasangan_alert_close();
	}
}
function on_anak_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-anak').modal('show');
		anak_search();
		anak_alert_close();
	}
}
function on_kerja_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-kerja').modal('show');
		kerja_search();
		kerja_alert_close();
	}
}
function on_volunteer_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-volunteer').modal('show');
		volunteer_search();
		volunteer_alert_close();
	}
}
function on_prestasi_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-prestasi').modal('show');
		prestasi_search();
		prestasi_alert_close();
	}
}
function on_institusi_click(){ 
	$('#modal-forminstitusi').modal('show');
}
