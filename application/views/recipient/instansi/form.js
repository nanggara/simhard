$(document).ready(function () { 
	$('#progressBar-instansi').hide();
	convert_paging_instansi("#contentinstansi"); 
}); 
function instansi_alert_close(){ 
	$('#alertMsginstansi').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextinstansi').html('');
}
function instansi_alert_show(pesan){	
	$('#alertMsginstansi').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextinstansi').html(pesan);
}
function instansi_init(){
	$('#txt_kodeinstansi').val('');
	$('#txt_instansimodal').val(''); 	
}
function instansi_save(){
	if(instansi_validate()==false){return;} 
	$('#progressBar-instansi').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/instansi_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			instansi_alert_show(obj.message);
 			instansi_init(); 
 			instansi_search();
 			$('#progressBar-instansi').hide(); 			 
 		}
 	}); 
}
function instansi_validate(){
	var instansi = $('#txt_instansimodal').val();  
	if(instansi.length==0){ 
		$('#alertMsginstansi').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextinstansi').html('Please Enter kelompok');
		return false;
	}else{
		$('#alertMsginstansi').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextinstansi').html('');
		return true;
	}
}
function instansi_search(){
	$('#progressBar-instansi').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/instansi_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-instansi').hide();
 			$('#contentinstansi').html(response);		 
 		}
 	});
}
function instansi_select_row(kode){  
	$('#progressBar-instansi').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/instansi_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				instansi_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodeinstansi').val(obj.kodeinstansi);
 				$('#txt_instansimodal').val(obj.instansi);
 			}
 			
 			$('#progressBar-instansi').hide(); 			 
 		}
 	}); 
}
function instansi_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-instansi').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/instansi_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			instansi_alert_show(response) 	
 			instansi_search();
 			$('#progressBar-instansi').hide(); 			 
 		}
 	}); 
}