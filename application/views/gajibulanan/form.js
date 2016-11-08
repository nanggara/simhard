var myVarTimer;

$(document).ready(function () {  
	myVarTimer = setTimeout(function(){
		if($("#txt_regid").val().length>0){
			form_select_row($("#txt_regid").val());
		} 
		clearTimeout(myVarTimer);
	}, 1500);
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
	$('#txt_regid').val(''); 
	$("#loadingmain").show();
}
function form_save(){
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/komponengaji_save/')?>",
 		data: data,
 		success: function(response){
 			form_search();
 			var obj = jQuery.parseJSON(response); 
 			form_alert_show(obj.pesan);
 			$("#loadingmain").hide();
 			if(obj.status==true){
	 			$("#txt_kodekomponengaji").val(obj.id);		
 			}
 		}
 	}); 
} 
function form_select_row(kode){  
function form_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/form_delete_row/')?>",
 		data: data,
 		success: function(response){  			
 			form_alert_show(response) 	
 			form_search(); 			 
 		}
 	}); 
}
function form_search(){ 
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/form_pagging/')?>",
 		data: data,
 		success: function(response){
 			$('#formcontent').html(response); 
 		}
 	});
}
function on_gajikaryawan_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-gajikaryawan').modal('show');
		gajikaryawan_search();
		gajikaryawan_alert_close();
	}
}