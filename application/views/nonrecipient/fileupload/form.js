$(document).ready(function () {  
	$("#loading-dialog").hide();
}); 
function form_on_upload() {   
	show_alert_dialog("");
	$("#loading-dialog").show();	 
	if($("#fileToUploadPh").val().length==0){
		show_alert_dialog("Tolong Pilih File Photo.");
		return;
	}	 
    var fd = new FormData(); 
    fd.append("fileToUploadPh", document.getElementById('fileToUploadPh').files[0]);  
    fd.append("txt_regid", $('#txt_regid').val()); 
    var xhr = new XMLHttpRequest(); 
    xhr.addEventListener("load", uploadCompletePhotoN, false);
    xhr.addEventListener("error", uploadFailedPhotoN, false);
    xhr.addEventListener("abort", uploadCanceledPhotoN, false);
    xhr.open("POST", "<?php echo site_url('nonrecipient/form_upload/')?>");
    xhr.send(fd);
} 
function uploadCompletePhotoN(evt) {   
	var response = evt.target.responseText;	
	if(response=='ER1'){
		alert("Maaf ukuran photo terlalu besar!");
	}else if(response=='ER2'){
		alert("Maaf, hanya gambar dengan format JPG, JPEG, PNG & GIF yang diizinkan.");	
	}else if(response=='ER3'){
		alert("Maaf tidak dapat melakukan upload photo, ulangi lagi.");
	}else{ 
		form_select_row($("#txt_regid").val());
		alert("Photo telah diupload.");
		$("#modal-form-upload").modal("hide");
	} 
	$("#loading-dialog").hide();
} 
function uploadFailedPhotoN(evt) { 
	$("#loading-dialog").hide();
	alert(evt.target.responseText);   
} 
function uploadCanceledPhotoN(evt) { 
	$("#loading-dialog").hide();
	alert(evt.target.responseText);   
}
function show_alert_dialog(pesan){	
	$("#loading-dialog").hide();
	if(pesan.length>0){ 
		$("#alertMsgDialog").attr("class","alert alert-warning alert-dismissable text-left");
		form_select_row($('#txt_regid').val());
	}else{
		$("#alertMsgDialog").attr("class","alert alert-warning alert-dismissable text-left hide");
	}
	$("#alertTextDialog").html(pesan);
}