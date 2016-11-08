var myVar;

$(document).ready(function () { 
	$("#txt_to").tokenInput("<?php echo base_url()?>assets/ext/getsms.php", {
		theme: "facebook"
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
function form_reset(){
	$('#myForm')[0].reset();
	$("#txt_to").tokenInput("clear");
	$("#loadingmain").show();
	$("#upload-file-info").html('');
	clearFileInputField('uploadFile_div');
}
function form_save(){ 
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
	$("#txt_area").val(tinymce.get('elm1').getContent());
	
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('blastemail/form_save/')?>",
 		data: data,
 		success: function(response){
 			$("#txt_subject").val(response);
 			alert(response);
 			var obj = jQuery.parseJSON(response); 
 			form_alert_show(obj.message);
 			form_search();
 			$("#loadingmain").hide();
 		}
 	}); 
} 
function form_delete_row(kode){    
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('blastemail/form_delete_row/')?>",
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
 		url : "<?php echo site_url('blastemail/form_pagging/')?>",
 		data: data,
 		success: function(response){  
 			$('#formcontent').html(response); 
 		}
 	});
}
function on_template_click(){
	$('#modal-form-template').modal('show');
}
function check_out(){
	$.ajax({
 		type: "POST",
 		url : "<?php echo site_url('blastemail/check_out/')?>", 
 		success: function(response){  
 			if(response==0){
 				$('#lblprogres').html("Count blast email.");
 				$("#loadingmain").hide(); 
 				$('#modal-progress').modal('hide');
 				window.clearInterval(myVar);
 			}else{
 				$('#lblprogres').html(response+" Email in Queue");
 			}
 		}
 	});
}
function form_on_upload() { 
	$("#loadingmain").show(); 
	$("#txt_area").val(tinymce.get('elm1').getContent());
	
	if($('#txt_area').val().length==0){
		alert("Mohon Isi email terlebih dahulu");
		$("#loadingmain").hide();
	}else{
		$('#modal-progress').modal('show');
		
		var myVar=setInterval(function () {check_out()}, 1000);
		
	    var fd = new FormData(); 
	    fd.append("txt_to", $("#txt_to").val());
	    fd.append("txt_subject", $("#txt_subject").val()); 
	    fd.append("txt_area", $("#txt_area").val());
	    
	    fd.append("fileToUploadPh", document.getElementById('fileToUploadPh').files[0]);  
	    var xhr = new XMLHttpRequest(); 
	    xhr.addEventListener("load", uploadComplete, false);
	    xhr.addEventListener("error", uploadFailed, false);
	    xhr.addEventListener("abort", uploadCanceled, false);
	    xhr.open("POST", "<?php echo site_url('blastemail/form_upload/')?>");
	    xhr.send(fd);
	}
} 
function uploadComplete(evt) {  
	form_reset();
	form_search();
	alert(evt.target.responseText); 
	//$("#loadingmain").hide(); 
	//$('#modal-progress').modal('hide');
} 
function uploadFailed(evt) {  
	$("#loadingmain").hide();
	$('#modal-progress').modal('hide');
	alert(evt.target.responseText);   
} 
function uploadCanceled(evt) {  
	$("#loadingmain").hide();
	$('#modal-progress').modal('hide');
	alert(evt.target.responseText);  
}
function clearFileInputField(tagId) {
    document.getElementById(tagId).innerHTML = document.getElementById(tagId).innerHTML;
}
