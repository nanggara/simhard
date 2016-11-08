
$(window).bind("load", function() {
	form_select_row(1);
});

$(document).ready(function () {    
	tinymce.init({
		selector: "textarea#elm1",
		theme: "modern", 
		height: 200,
		plugins: [
			"advlist autolink link jwifm image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor"
		],
		content_css: "css/content.css",
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | preview media fullpage | forecolor backcolor emoticons | jwifm ", 
		style_formats: [
			{title: 'Bold text', inline: 'b'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			]
		});
});  
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
	$("#upload-file-info").html('');
	clearFileInputField('uploadFile_div');
}

function form_select_row(kode){    
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('greetings/form_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				email_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_regid').val(obj.idgreeting);
 				$('#txt_judul').val(obj.judul);
 				$('#txt_from').val(obj.fromsender);
 				$('#txt_bcc').val(obj.bcc_email);  
 				$('#chk_aktif').val(obj.status);
 				$("#upload-file-info").html(obj.attachment1); 
 				tinymce.get('elm1').setContent(obj.greeting); 
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
 		url : "<?php echo site_url('greetings/form_delete_row/')?>",
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
 		url : "<?php echo site_url('greetings/form_pagging/')?>",
 		data: data,
 		success: function(response){ 			
 			$('#formcontent').html(response); 
 		}
 	});
}


function form_on_upload() {  
	$("#loadingmain").show(); 
	if($('#txt_regid').val().length==0){
		alert("Mohon pilih greeting terlebih dahulu!");
		$("#loadingmain").hide();
	}else{
		$('#modal-progress').modal('show');	  
		$("#txt_area").val(tinymce.get('elm1').getContent());
		
	    var fd = new FormData(); 
	    fd.append("txt_regid", $("#txt_regid").val());
	    fd.append("txt_judul", $("#txt_judul").val());
	    fd.append("txt_from", $("#txt_from").val());
	    fd.append("txt_area", $("#txt_area").val());
	    fd.append("txt_bcc", $("#txt_bcc").val());
	    fd.append("chk_aktif", $("#chk_aktif").val());
	    
	    fd.append("fileToUploadPh", document.getElementById('fileToUploadPh').files[0]);  
	    var xhr = new XMLHttpRequest(); 
	    xhr.addEventListener("load", uploadComplete, false);
	    xhr.addEventListener("error", uploadFailed, false);
	    xhr.addEventListener("abort", uploadCanceled, false);
	    xhr.open("POST", "<?php echo site_url('greetings/form_upload/')?>");
	    xhr.send(fd);
	}
} 
function uploadComplete(evt) { 
	form_search();
	var obj = jQuery.parseJSON(evt.target.responseText); 
	form_alert_show(obj.pesan);
	$("#loadingmain").hide();
	if(obj.status==true){
		$("#txt_regid").val(obj.id); 			
	} 
} 
function uploadFailed(evt) { 
	$("#loadingmain").hide();
	alert(evt.target.responseText);   
} 
function uploadCanceled(evt) { 
	$("#loadingmain").hide();
	alert(evt.target.responseText);   
}
function clearFileInputField(tagId) {
    document.getElementById(tagId).innerHTML = document.getElementById(tagId).innerHTML;
}