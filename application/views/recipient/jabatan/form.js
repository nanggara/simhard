$(document).ready(function () { 
	$('#progressBar-jabatan').hide();
	convert_paging_jabatan("#contentjabatan"); 
}); 
function jabatan_alert_close(){ 
	$('#alertMsgjabatan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextjabatan').html('');
}
function jabatan_alert_show(pesan){	
	$('#alertMsgjabatan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextjabatan').html(pesan);
}
function jabatan_init(){
	$('#txt_kodejabatan').val('');
	$('#txt_jabatanmodal').val('');	
}
function jabatan_save(){
	if(jabatan_validate()==false){return;} 
	$('#progressBar-jabatan').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/jabatan_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			jabatan_alert_show(obj.message);
 			jabatan_init(); 
 			jabatan_search();
 			$('#progressBar-jabatan').hide(); 			 
 		}
 	}); 
}
function jabatan_validate(){ 
	var jabatan = $('#txt_jabatanmodal').val();  
	if(jabatan.length==0){ 
		$('#alertMsgjabatan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextjabatan').html('Input jabatan');
		return false;
	}else{
		$('#alertMsgjabatan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextjabatan').html('');
		return true;
	}
}
function jabatan_search(){
	$('#progressBar-jabatan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/jabatan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-jabatan').hide();
 			$('#contentjabatan').html(response);		 
 		}
 	});
}
function jabatan_select_row(kode){  
	$('#progressBar-jabatan').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/jabatan_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				jabatan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodejabatan').val(obj.kodejabatan);
 				$('#txt_jabatanmodal').val(obj.jabatan); 
 			}
 			
 			$('#progressBar-jabatan').hide(); 			 
 		}
 	}); 
}
function jabatan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-jabatan').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/jabatan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			jabatan_alert_show(response) 	
 			jabatan_search();
 			$('#progressBar-jabatan').hide(); 			 
 		}
 	}); 
}