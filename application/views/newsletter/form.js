$(document).ready(function () {   
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
function form_reset(){
	$('#myForm')[0].reset();
	$("#loadingmain").show();
	$('#txt_regid').val('');	
	$("#upload-file-info").html('');
	clearFileInputField('uploadFile_div');
} 
function form_select_row(kode){    
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('newsletter/form_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				email_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_regid').val(obj.idnewsletter);
 				$('#txt_judul').val(obj.judul);  
 				$("#upload-file-info").html(obj.attachment1);
 				tinymce.get('elm1').setContent(obj.newsletter);
 				activaTab('tab-1'); 
 				$('#modal-progress').modal('hide');
 			}
 		}
 	}); 
}  
function form_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('newsletter/form_delete_row/')?>",
 		data: data,
 		success: function(response){  			
 			form_alert_show(response) 	
 			form_search(); 		
 			$("#loadingmain").hide();
 		}
 	}); 
} 
function form_search(){ 
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('newsletter/form_pagging/')?>",
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
function form_on_upload() {  
	$("#loadingmain").show();
	$('#modal-progress').modal('show');	  
	$("#txt_area").val(tinymce.get('elm1').getContent());
	
    var fd = new FormData(); 
    fd.append("txt_regid", $("#txt_regid").val());
    fd.append("txt_judul", $("#txt_judul").val()); 
    fd.append("txt_area", $("#txt_area").val());
    
    fd.append("fileToUploadPh", document.getElementById('fileToUploadPh').files[0]);  
    var xhr = new XMLHttpRequest(); 
    xhr.addEventListener("load", uploadComplete, false);
    xhr.addEventListener("error", uploadFailed, false);
    xhr.addEventListener("abort", uploadCanceled, false);
    xhr.open("POST", "<?php echo site_url('newsletter/form_upload/')?>");
    xhr.send(fd);
} 
function uploadComplete(evt){
	form_search();
	var obj = jQuery.parseJSON(evt.target.responseText); 
	form_alert_show(obj.pesan);
	$("#loadingmain").hide();
	if(obj.status==true){
		$("#txt_regid").val(obj.id); 			
	} 
} 
function uploadFailed(evt) { 
	$("#loadingmain").hide();
	alert(evt.target.responseText);   
} 
function uploadCanceled(evt) { 
	$("#loadingmain").hide();
	alert(evt.target.responseText);   
}
function clearFileInputField(tagId) {
    document.getElementById(tagId).innerHTML = document.getElementById(tagId).innerHTML;
}
