$(document).ready(function () { 
	$('#progressBar-universitas').hide();
	convert_paging_universitas("#contentuniversitas"); 
}); 
function universitas_alert_close(){ 
	$('#alertMsguniversitas').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextuniversitas').html('');
}
function universitas_alert_show(pesan){	
	$('#alertMsguniversitas').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextuniversitas').html(pesan);
}
function universitas_init(){
	$('#txt_kodeuniversitas').val('');
	$('#txt_universitasmodal').val('');
	$('#txt_universitassingkatan').val(''); 	
	$("#upload-file-info-uni").html('');
}
function universitas_validate(){
	var singkatan = $('#txt_universitassingkatan').val();
	var universitas = $('#txt_universitasmodal').val();  
	if(singkatan.length==0){ 
		$('#alertMsguniversitas').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextuniversitas').html('Input Singkatan Universitas ');
		return false;
	}else if(universitas.length==0){ 
		$('#alertMsguniversitas').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextuniversitas').html('Input Universitas');
		return false;
	}else{
		$('#alertMsguniversitas').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextuniversitas').html('');
		return true;
	}
}
function universitas_search(){
	$('#progressBar-universitas').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/universitas_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-universitas').hide();
 			$('#contentuniversitas').html(response);		 
 		}
 	});
}
function universitas_select_row(kode){  
	$('#progressBar-universitas').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/universitas_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				universitas_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodeuniversitas').val(obj.kodeuniversitas);
 				$('#txt_universitasmodal').val(obj.universitas);
 				$('#txt_universitassingkatan').val(obj.singkatan);
 				$("#upload-file-info-uni").html(obj.photo);
 			}
 			
 			$('#progressBar-universitas').hide(); 			 
 		}
 	}); 
}
function universitas_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-universitas').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/universitas_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			universitas_alert_show(response) 	
 			universitas_search();
 			$('#progressBar-universitas').hide(); 			 
 		}
 	}); 
}


function universitas_save(){
	if(universitas_validate()==false){return;} 
	$('#progressBar-universitas').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/universitas_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			universitas_alert_show(obj.message);
 			universitas_init(); 
 			universitas_search();
 			$('#progressBar-universitas').hide(); 			 
 		}
 	}); 
}
function form_on_upload_universitas() {   
	if(universitas_validate()==false){return;} 
	$('#progressBar-universitas').show();
	 	 
    var fd = new FormData(); 
    fd.append("fileToUploadUni", document.getElementById('fileToUploadUni').files[0]);  
    fd.append("txt_kodeuniversitas", $('#txt_kodeuniversitas').val());
    fd.append("txt_universitassingkatan", $('#txt_universitassingkatan').val());
    fd.append("txt_universitasmodal", $('#txt_universitasmodal').val());
    var xhr = new XMLHttpRequest(); 
    xhr.addEventListener("load", uploadComplete_universitas, false);
    xhr.addEventListener("error", uploadFailed_universitas, false); 
    xhr.open("POST", "<?php echo site_url('recipient/universitas_save/')?>");
    xhr.send(fd);
} 
function uploadComplete_universitas(evt) {  
	alert(evt.target.responseText);
	var obj = jQuery.parseJSON(evt.target.responseText); 
	universitas_alert_show(obj.message);
	universitas_init(); 
	universitas_search();
	$('#progressBar-universitas').hide();  
} 
function uploadFailed_universitas(evt) { 	
	alert(evt.target.responseText);
	$('#progressBar-universitas').hide();
}