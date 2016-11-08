var myVarTimer;

$(document).ready(function () {  
	$("#loadingUpload").hide();
	myVarTimer = setTimeout(function(){
		form_reset();
		clearTimeout(myVarTimer);
	}, 1500);
	 
	form_convert_paging("#form_content"); 
	
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
	$('#txt_userid').val('');	
}
function form_save(){
	if($('#txt_namauser').val().length==0){
		alert("Mohon Isi Nama User");
		return;
	}else if($('#txt_password').val().length==0){
		alert("Mohon Isi Password");
		return;
	}
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('manajemenuser/form_save/')?>",
 		data: data,
 		success: function(response){ 
 			form_search();
 			var obj = jQuery.parseJSON(response); 
 			form_alert_show(obj.pesan);
 			$("#loadingmain").hide();
 			if(obj.status==true){
	 			$("#txt_userid").val(obj.id); 			
 			}
 		}
 	}); 
}
function form_select_row(kode){   
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('manajemenuser/form_select_row/')?>",
 		data: data,
 		success: function(response){  
 			if(response=='[]'){
 				email_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_userid').val(obj.userid);
 				$('#txt_namauser').val(obj.username); 
 				$('#txt_password').val('');
 				$('#txt_email').val(obj.email);
 				$('#div_grup').val(obj.grupid); 
 				activaTab('tab-1'); 
 				$('#modal-progress').modal('hide');
 			}
 		}
 	}); 
} 
function form_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#modal-progress').modal('show');
	$("#loadingmain").show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('manajemenuser/form_delete_row/')?>",
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
 		url : "<?php echo site_url('manajemenuser/form_pagging/')?>",
 		data: data,
 		success: function(response){ 			
 			$('#formcontent').html(response); 
 		}
 	});
}
  
function form_on_upload() {      
	if($("#fileToUpload").val().length==0){
		alert("Tolong Pilih File background.");
		return;
	}	 
	$("#btnMulaiUpload").html("Sedang Upload Background. tunggu");
	$("#loadingUpload").show();
    var fd = new FormData(); 
    fd.append("fileToUpload", document.getElementById('fileToUpload').files[0]);  
    var xhr = new XMLHttpRequest(); 
    xhr.addEventListener("load", uploadCompletePhotoN, false);
    xhr.addEventListener("error", uploadFailedPhotoN, false);
    xhr.addEventListener("abort", uploadCanceledPhotoN, false);
    xhr.open("POST", "<?php echo site_url('manajemenuser/ganti_background/')?>");
    xhr.send(fd);
} 
function uploadCompletePhotoN(evt) {   
	$("#btnMulaiUpload").html("Selesai Upload");
	$("#loadingUpload").hide();
	var response = evt.target.responseText;	 
	alert(response);
} 
function uploadFailedPhotoN(evt) {
	$("#btnMulaiUpload").html("Selesai Upload");
	$("#loadingUpload").hide();
	alert(evt.target.responseText);   
} 
function uploadCanceledPhotoN(evt) {  
	$("#btnMulaiUpload").html("Selesai Upload");
	$("#loadingUpload").hide();
	alert(evt.target.responseText);   
} 
