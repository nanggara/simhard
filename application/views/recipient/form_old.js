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
	form_get_organisasi(0);
	form_get_kerja(0);
	form_get_volunteer(0);
	form_get_prestasi(0);
	form_get_jenjang(0);
	form_get_pekerjaan(0);
	$("#loadingmain").show();
}
function form_save(){
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/form_save/')?>",
 		data: data,
 		success: function(response){
 			form_search();
 			var obj = jQuery.parseJSON(response); 
 			form_alert_show(obj.pesan);
 			$("#loadingmain").hide();
 			if(obj.status==true){
	 			$("#txt_regid").val(obj.id);
	 			$("#txt_noanggota").val(obj.noanggota);
	 			$("#btnUpload").removeAttr("disabled");	 			
 			}
 		}
 	}); 
} 
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
 				$('#txt_panggilan').val(obj.panggilan);
 				$('#txt_tempatlahir').val(obj.tempatlahir);
 				$('#txt_tanggallahir').val(obj.tanggallahirfrm);
 				if(obj.jeniskelamin==0){ 
 					$("#rad_jkp").prop("checked", true);
 				}else{
 					$("#rad_jkl").prop("checked", true);
 				}
 				$('#txt_usia').val(obj.usia);
 				$('#div_agama').val(obj.kodeagama);
 				$('#div_kelompok').val(obj.kodekelompok);
 				$('#div_universitas').val(obj.kodeuniversitas); 
 				$('#txt_jenjang').val(obj.jenjang);
 				$('#txt_fakultas').val(obj.fakultas);
 				$('#div_jenjang').val(obj.kodejenjang);
 				$('#txt_programstudi').val(obj.programstudi);
 				$('#txt_jurusan').val(obj.jurusan);
 				$('#div_pekerjaan').val(obj.kodepekerjaan);
 				$('#div_instansi').val(obj.kodeinstansi);
 				$('#txt_sukubangsa').val(obj.sukubangsa);
 				$('#txt_linkedin').val(obj.linkedin);
 				$('#txt_website').val(obj.website);
 				$('#txt_fb').val(obj.fb);
 				$('#txt_twitter').val(obj.twitter);
 				$('#txt_catatan').val(obj.catatan);
 				$('#txt_photoprofil').val(obj.photoprofil);
 				$('#txt_ipk').val(obj.ipk);
 				
 				$("#btnUpload").removeAttr("disabled");
 				activaTab('tab-1');
 				form_get_telepon(kode);
 				form_get_email(kode);
 				form_profil_change(obj.photoprofil);
 				form_institusi_change('#div_institusi');
 				form_get_keluarga(kode);
 				form_get_pendidikan(kode);
 				form_get_pendidikannonformal(kode);
 				form_get_organisasi(kode);
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
function on_universitas_click(){
	$('#modal-form-universitas').modal('show');
}
function on_jenjang_click(){ 
	$('#modal-form-jenjang').modal('show');
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
