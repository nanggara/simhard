$(document).ready(function () { 
	$('#progressBar-pekerjaan').hide();
	convert_paging_pekerjaan("#contentpekerjaan"); 
}); 
function pekerjaan_alert_close(){ 
	$('#alertMsgpekerjaan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextpekerjaan').html('');
}
function pekerjaan_alert_show(pesan){	
	$('#alertMsgpekerjaan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextpekerjaan').html(pesan);
}
function pekerjaan_init(){
	$('#txt_kodepekerjaan').val('');
	$('#txt_pekerjaanmodal').val('');	
}
function pekerjaan_save(){
	if(pekerjaan_validate()==false){return;} 
	$('#progressBar-pekerjaan').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pekerjaan_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			pekerjaan_alert_show(obj.message);
 			pekerjaan_init(); 
 			pekerjaan_search();
 			$('#progressBar-pekerjaan').hide(); 			 
 		}
 	}); 
}
function pekerjaan_validate(){ 
	var pekerjaan = $('#txt_pekerjaanmodal').val();  
	if(pekerjaan.length==0){ 
		$('#alertMsgpekerjaan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextpekerjaan').html('Input pekerjaan');
		return false;
	}else{
		$('#alertMsgpekerjaan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextpekerjaan').html('');
		return true;
	}
}
function pekerjaan_search(){
	$('#progressBar-pekerjaan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pekerjaan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-pekerjaan').hide();
 			$('#contentpekerjaan').html(response);		 
 		}
 	});
}
function pekerjaan_select_row(kode){  
	$('#progressBar-pekerjaan').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pekerjaan_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				pekerjaan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodepekerjaan').val(obj.kodepekerjaan);
 				$('#txt_pekerjaanmodal').val(obj.pekerjaan); 
 			}
 			
 			$('#progressBar-pekerjaan').hide(); 			 
 		}
 	}); 
}
function pekerjaan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-pekerjaan').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pekerjaan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			pekerjaan_alert_show(response) 	
 			pekerjaan_search();
 			$('#progressBar-pekerjaan').hide(); 			 
 		}
 	}); 
}