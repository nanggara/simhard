$(document).ready(function () { 
	$('#progressBar-Kedudukan').hide();
	convert_paging_kedudukan("#contentkedudukan"); 
}); 
function kedudukan_alert_close(){ 
	$('#alertMsgkedudukan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextkedudukan').html('');
}
function kedudukan_alert_show(pesan){	
	$('#alertMsgkedudukan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextkedudukan').html(pesan);
}
function kedudukan_init(){
	$('#txt_kodekedudukan').val('');
	$('#txt_kedudukanmodal').val(''); 	
}
function kedudukan_save(){
	if(kedudukan_validate()==false){return;} 
	$('#progressBar-Kedudukan').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kedudukan_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			kedudukan_alert_show(obj.message);
 			kedudukan_init(); 
 			kedudukan_search();
 			$('#progressBar-Kedudukan').hide(); 			 
 		}
 	}); 
}
function kedudukan_validate(){
	var kedudukan = $('#txt_kedudukanmodal').val();  
	if(kedudukan.length==0){ 
		$('#alertMsgkedudukan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextkedudukan').html('Please Enter kelompok');
		return false;
	}else{
		$('#alertMsgkedudukan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextkedudukan').html('');
		return true;
	}
}
function kedudukan_search(){
	$('#progressBar-Kedudukan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kedudukan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-Kedudukan').hide();
 			$('#contentkedudukan').html(response);		 
 		}
 	});
}
function kedudukan_select_row(kode){  
	$('#progressBar-Kedudukan').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kedudukan_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				kedudukan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodekedudukan').val(obj.kodekedudukan);
 				$('#txt_kedudukanmodal').val(obj.kedudukan);
 			}
 			
 			$('#progressBar-Kedudukan').hide(); 			 
 		}
 	}); 
}
function kedudukan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-Kedudukan').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kedudukan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			kedudukan_alert_show(response) 	
 			kedudukan_search();
 			$('#progressBar-Kedudukan').hide(); 			 
 		}
 	}); 
}