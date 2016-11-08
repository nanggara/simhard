$(document).ready(function () { 
	$('#progressBar-jenjang').hide();
	convert_paging_jenjang("#contentjenjang"); 
}); 
function jenjang_alert_close(){ 
	$('#alertMsgjenjang').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextjenjang').html('');
}
function jenjang_alert_show(pesan){	
	$('#alertMsgjenjang').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextjenjang').html(pesan);
}
function jenjang_init(){
	$('#txt_kodejenjang').val('');
	$('#txt_jenjangmodal').val('');	
}
function jenjang_save(){
	if(jenjang_validate()==false){return;} 
	$('#progressBar-jenjang').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/jenjang_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			jenjang_alert_show(obj.message);
 			jenjang_init(); 
 			jenjang_search();
 			$('#progressBar-jenjang').hide(); 			 
 		}
 	}); 
}
function jenjang_validate(){ 
	var jenjang = $('#txt_jenjangmodal').val();  
	if(jenjang.length==0){ 
		$('#alertMsgjenjang').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextjenjang').html('Input jenjang');
		return false;
	}else{
		$('#alertMsgjenjang').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextjenjang').html('');
		return true;
	}
}
function jenjang_search(){
	$('#progressBar-jenjang').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/jenjang_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-jenjang').hide();
 			$('#contentjenjang').html(response);		 
 		}
 	});
}
function jenjang_select_row(kode){  
	$('#progressBar-jenjang').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/jenjang_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				jenjang_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodejenjang').val(obj.kodejenjang);
 				$('#txt_jenjangmodal').val(obj.jenjang); 
 			}
 			
 			$('#progressBar-jenjang').hide(); 			 
 		}
 	}); 
}
function jenjang_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-jenjang').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/jenjang_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			jenjang_alert_show(response) 	
 			jenjang_search();
 			$('#progressBar-jenjang').hide(); 			 
 		}
 	}); 
}