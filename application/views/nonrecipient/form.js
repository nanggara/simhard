var myVarTimer;

$(document).ready(function () {  
	$('#txt_tanggallahir').datepicker({
		format: 'dd-mm-yyyy'
	});
	myVarTimer = setTimeout(function(){
		if($("#txt_regid").val().length>0){
			form_select_row($("#txt_regid").val());
		}
		clearTimeout(myVarTimer);
	}, 1500);
	$('#txt_tglmasukanggota').datepicker({
		format: 'dd-mm-yyyy'
	});
	form_convert_paging("#form_content"); 
	form_reset(); 
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
	$("#loadingmain").show();
	$("#div_attachment_list").html("");
	$('#txt_regid').val('');
	var div_telepon = '<div id="form-group-1" class="form-group"><label class="col-sm-2 control-label">Nomor Telepon 1</label><div class="col-sm-9"><input type="hidden" id="txt_count_telepon" name="txt_count_telepon" value="1"><input type="text" name="txt_telepon[]" class="form-control"></div><div class="col-sm-1"> <button class="btn btn-primary btn-sm" type="button" onclick="form_add_phone()">+</button> </div></div>';
	$('#div_telepon').html(div_telepon);
	var div_email = '<div id="form-group-email-1" class="form-group"><label class="col-sm-2 control-label">Email</label><div class="col-sm-9"><input type="hidden" id="txt_count_email" name="txt_count_email" value="1"><input type="text" name="txt_email[]" class="form-control"></div><div class="col-sm-1"><button class="btn btn-primary btn-sm" type="button" onclick="form_add_email()">+</button></div></div> ';
	$('#div_email').html(div_email);
	$('#rad_jkl').attr('checked','checked');
	$('#rad_jkp').removeAttr('checked');
	$("#btnUpload").attr("disabled","disabled");
	$("#div_photo").html('<img id="img_profil" alt="image" src="<?php echo base_url();?>assets/themes/inspinia/images/photo.jpg" style="width:70%;min-height:20%;border-radius:5px;border:solid 1px #e5e6e7;">');	
}
function form_save(){
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('nonrecipient/form_save/')?>",
 		data: data,
 		success: function(response){ 
 			form_search();
 			var obj = jQuery.parseJSON(response); 
 			form_alert_show(obj.pesan);
 			$("#loadingmain").hide();
 			if(obj.status==true){
	 			$("#txt_regid").val(obj.id);
	 			$("#btnUpload").removeAttr("disabled");	 			
 			}
 		}
 	}); 
}
function form_select_row(kode){   
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('nonrecipient/form_select_row/')?>",
 		data: data,
 		success: function(response){  
 			if(response=='[]'){
 				email_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_regid').val(obj.regidrec);
 				$('#txt_nama').val(obj.namalengkap); 
 				$('#txt_tglmasukanggota').val(obj.tglmasukanggotafrm);
 				if(obj.jeniskelamin==0){ 
 					$("#rad_jkp").prop("checked", true);
 				}else{
 					$("#rad_jkl").prop("checked", true);
 				}
 				$('#txt_alamat').val(obj.alamat);
 				$('#div_institusi').val(obj.kodeinstitusi);
 				$('#div_kelompok').val(obj.kodekelompok);
 				$('#txt_jabatan').val(obj.jabatan);
 				$('#txt_linkedin').val(obj.linkedin);
 				$('#txt_website').val(obj.website);
 				$('#txt_fb').val(obj.fb);
 				$('#txt_twitter').val(obj.twitter);
 				$('#txt_catatan').val(obj.catatan);
 				$('#txt_tempatlahir').val(obj.tempatlahir);
 				$('#txt_tanggallahir').val(obj.tanggallahirfrm);
 				$("#btnUpload").removeAttr("disabled");
 				activaTab('tab-1');
 				form_get_telepon(kode);
 				form_get_email(kode);
 				form_profil_change(obj.photoprofil);
 				attachment_select_byid();
 				form_institusi_change('#div_institusi');
 				$('#modal-progress').modal('hide');
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
 		url : "<?php echo site_url('nonrecipient/on_delete_attachment/')?>",
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
    xhr.open("POST", "<?php echo site_url('nonrecipient/form_upload_att/')?>");
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
function form_profil_change(kode){ 
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		data: data,
 		url : "<?php echo site_url('nonrecipient/form_profil_change/')?>", 
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
 		url : "<?php echo site_url('nonrecipient/form_delete_row/')?>",
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
 		url : "<?php echo site_url('nonrecipient/form_get_telepon/')?>",
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
 		url : "<?php echo site_url('nonrecipient/form_get_email/')?>",
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
 		url : "<?php echo site_url('nonrecipient/form_get_kelompok/')?>", 
 		success: function(response){
 			$('#div_kelompok').html(response); 			 
 		}
 	}); 
}
function form_get_institusi(){   
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('nonrecipient/form_get_institusi/')?>", 
 		success: function(response){
 			$('#div_institusi').html(response); 			 
 		}
 	}); 
}
function form_institusi_change(kode){ 
	var data = "kode="+$(kode).val();
    $.ajax({
 		type: "POST",
 		data: data,
 		url : "<?php echo site_url('nonrecipient/form_institusi_change/')?>", 
 		success: function(response){ 			
 			$('#txt_alamatinstitusi').val(response); 			 
 		}
 	}); 
}
function form_search(){ 
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('nonrecipient/form_pagging/')?>",
 		data: data,
 		success: function(response){ 			
 			$('#formcontent').html(response); 
 		}
 	});
}
function on_upload(){
	$("#modal-form-upload").modal("show");
}
function on_email_click(){
	$('#modal-form').modal('show');
}
function on_institusi_click(){ 
	$('#modal-forminstitusi').modal('show');
}
