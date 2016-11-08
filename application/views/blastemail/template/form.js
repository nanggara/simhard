$(document).ready(function () { 
	$('#progressBar-template').hide();
	convert_paging_template("#contenttemplate"); 
}); 
function template_alert_close(){ 
	$('#alertMsgtemplate').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTexttemplate').html('');
}
function template_alert_show(pesan){	
	$('#alertMsgtemplate').attr('class','alert alert-warning alert-dismissable');
	$('#alertTexttemplate').html(pesan);
}
function template_init(){
	$('#txt_kodetemplate').val('');
	$('#txt_templatemodal').val(''); 	
}  
function template_search(){
	$('#progressBar-template').show(); 
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('blastemail/template_paging/')?>",
 		data: data,
 		success: function(response){
 			$('#progressBar-template').hide();
 			$('#contenttemplate').html(response);		 
 		}
 	});
}
function template_select_row(kode){  
	$('#progressBar-template').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('emailtemplate/form_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				email_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response); 
 				tinymce.get('elm1').setContent(obj.template); 
 				$('#modal-form-template').modal('hide');
 			}
 			$('#progressBar-template').hide(); 			 
 		}
 	}); 
}