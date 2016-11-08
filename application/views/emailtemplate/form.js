$(document).ready(function () {   
	form_convert_paging("#formcontent"); 
}); 
function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};
function form_alert_close(){ 
	$('#alertMsgForm').attr('class','alert alert-info alert-dismissable hide');
	$('#alertTextForm').html('');
	$('#modal-progress').modal('hide');
}
function form_alert_show(pesan){	
	$('#alertMsgForm').attr('class','alert alert-info alert-dismissable');
	$('#alertTextForm').html(pesan);
}  
function form_reset(){
	$('#myForm')[0].reset();
	$("#loadingmain").show();
	$('#txt_regid').val('');	
}
function form_save(){ 
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
	$("#txt_area").val(tinymce.get('elm1').getContent());
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('emailtemplate/form_save/')?>",
 		data: data,
 		success: function(response){ 
 			form_search();
 			var obj = jQuery.parseJSON(response); 
 			form_alert_show(obj.pesan);
 			$("#loadingmain").hide();
 			if(obj.status==true){
	 			$("#txt_regid").val(obj.id);
	 			$("#btnUpload").removeAttr("disabled");	 			
 			}
 		}
 	}); 
}
function form_select_row(kode){    
	$('#modal-progress').modal('show');
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
 				$('#txt_regid').val(obj.idtemplate);
 				$('#txt_judul').val(obj.judul);  
 				tinymce.get('elm1').setContent(obj.template);
 				activaTab('tab-1'); 
 				$('#modal-progress').modal('hide');
 			}
 		}
 	}); 
}  
function form_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('emailtemplate/form_delete_row/')?>",
 		data: data,
 		success: function(response){  			
 			form_alert_show(response) 	
 			form_search(); 		
 			$("#loadingmain").hide();
 		}
 	}); 
} 
function form_search(){ 
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('emailtemplate/form_pagging/')?>",
 		data: data,
 		success: function(response){ 			
 			$('#formcontent').html(response); 
 		}
 	});
}
function on_upload(){
	$("#modal-form-upload").modal("show");
}
function on_email_click(){
	$('#modal-form').modal('show');
}
function on_institusi_click(){ 
	$('#modal-forminstitusi').modal('show');
}
