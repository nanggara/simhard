$(document).ready(function () { 
	$('#progressBar-newsletter').hide();
	convert_paging_newsletter("#contentnewsletter"); 
}); 
function newsletter_alert_close(){ 
	$('#alertMsgnewsletter').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextnewsletter').html('');
}
function newsletter_alert_show(pesan){	
	$('#alertMsgnewsletter').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextnewsletter').html(pesan);
}
function newsletter_init(){
	$('#txt_kodenewsletter').val('');
	$('#txt_newslettermodal').val(''); 	
}  
function newsletter_search(){
	$('#progressBar-newsletter').show(); 
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('blastemail/newsletter_paging/')?>",
 		data: data,
 		success: function(response){
 			$('#progressBar-newsletter').hide();
 			$('#contentnewsletter').html(response);		 
 		}
 	});
}
function newsletter_select_row(kode){  
	$('#progressBar-newsletter').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('newsletter/form_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				email_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response); 
 				tinymce.get('elm1').setContent(obj.newsletter); 
 				$('#modal-form-newsletter').modal('hide');
 			}
 			$('#progressBar-newsletter').hide(); 			 
 		}
 	}); 
}