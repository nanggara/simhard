$(document).ready(function () { 
	$('#progressBar-Kawin').hide();
	convert_paging_kawin("#contentkawin"); 
}); 
function kawin_alert_close(){ 
	$('#alertMsgkawin').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextkawin').html('');
}
function kawin_alert_show(pesan){	
	$('#alertMsgkawin').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextkawin').html(pesan);
}
function kawin_init(){
	$('#txt_kodekawin').val('');
	$('#txt_kawinmodal').val(''); 	
}
function kawin_save(){
	if(kawin_validate()==false){return;} 
	$('#progressBar-Kawin').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kawin_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			kawin_alert_show(obj.message);
 			kawin_init(); 
 			kawin_search();
 			$('#progressBar-Kawin').hide(); 			 
 		}
 	}); 
}
function kawin_validate(){
	var kawin = $('#txt_kawinmodal').val();  
	if(kawin.length==0){ 
		$('#alertMsgkawin').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextkawin').html('Please Enter kelompok');
		return false;
	}else{
		$('#alertMsgkawin').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextkawin').html('');
		return true;
	}
}
function kawin_search(){
	$('#progressBar-Kawin').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kawin_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-Kawin').hide();
 			$('#contentkawin').html(response);		 
 		}
 	});
}
function kawin_select_row(kode){  
	$('#progressBar-Kawin').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kawin_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				kawin_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodekawin').val(obj.kodekawin);
 				$('#txt_kawinmodal').val(obj.kawin);
 			}
 			
 			$('#progressBar-Kawin').hide(); 			 
 		}
 	}); 
}
function kawin_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-Kawin').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kawin_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			kawin_alert_show(response) 	
 			kawin_search();
 			$('#progressBar-Kawin').hide(); 			 
 		}
 	}); 
}