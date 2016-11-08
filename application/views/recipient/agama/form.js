$(document).ready(function () { 
	$('#progressBar-Agama').hide();
	convert_paging_agama("#contentagama"); 
}); 
function agama_alert_close(){ 
	$('#alertMsgagama').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextagama').html('');
}
function agama_alert_show(pesan){	
	$('#alertMsgagama').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextagama').html(pesan);
}
function agama_init(){
	$('#txt_kodeagama').val('');
	$('#txt_agamamodal').val(''); 	
}
function agama_save(){
	if(agama_validate()==false){return;} 
	$('#progressBar-Agama').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/agama_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			agama_alert_show(obj.message);
 			agama_init(); 
 			agama_search();
 			$('#progressBar-Agama').hide(); 			 
 		}
 	}); 
}
function agama_validate(){
	var agama = $('#txt_agamamodal').val();  
	if(agama.length==0){ 
		$('#alertMsgagama').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextagama').html('Please Enter kelompok');
		return false;
	}else{
		$('#alertMsgagama').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextagama').html('');
		return true;
	}
}
function agama_search(){
	$('#progressBar-Agama').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/agama_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-Agama').hide();
 			$('#contentagama').html(response);		 
 		}
 	});
}
function agama_select_row(kode){  
	$('#progressBar-Agama').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/agama_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				agama_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodeagama').val(obj.kodeagama);
 				$('#txt_agamamodal').val(obj.agama);
 			}
 			
 			$('#progressBar-Agama').hide(); 			 
 		}
 	}); 
}
function agama_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-Agama').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/agama_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			agama_alert_show(response) 	
 			agama_search();
 			$('#progressBar-Agama').hide(); 			 
 		}
 	}); 
}