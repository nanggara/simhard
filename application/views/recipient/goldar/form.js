$(document).ready(function () { 
	$('#progressBar-goldar').hide();
	convert_paging_goldar("#contentgoldar"); 
}); 
function goldar_alert_close(){ 
	$('#alertMsggoldar').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextgoldar').html('');
}
function goldar_alert_show(pesan){	
	$('#alertMsggoldar').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextgoldar').html(pesan);
}
function goldar_init(){
	$('#txt_kodegoldar').val('');
	$('#txt_goldarmodal').val('');	
}
function goldar_save(){
	if(goldar_validate()==false){return;} 
	$('#progressBar-goldar').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/goldar_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			goldar_alert_show(obj.message);
 			goldar_init(); 
 			goldar_search();
 			$('#progressBar-goldar').hide(); 			 
 		}
 	}); 
}
function goldar_validate(){ 
	var goldar = $('#txt_goldarmodal').val();  
	if(goldar.length==0){ 
		$('#alertMsggoldar').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextgoldar').html('Input goldar');
		return false;
	}else{
		$('#alertMsggoldar').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextgoldar').html('');
		return true;
	}
}
function goldar_search(){
	$('#progressBar-goldar').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/goldar_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-goldar').hide();
 			$('#contentgoldar').html(response);		 
 		}
 	});
}
function goldar_select_row(kode){  
	$('#progressBar-goldar').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/goldar_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				goldar_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodegoldar').val(obj.kodegoldar);
 				$('#txt_goldarmodal').val(obj.goldar); 
 			}
 			
 			$('#progressBar-goldar').hide(); 			 
 		}
 	}); 
}
function goldar_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-goldar').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/goldar_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			goldar_alert_show(response) 	
 			goldar_search();
 			$('#progressBar-goldar').hide(); 			 
 		}
 	}); 
}