$(document).ready(function () { 
	$('#progressBarkeluarga').hide();
	convert_paging_keluarga("#contentkeluarga"); 
}); 
function keluarga_alert_close(){ 
	$('#alertMsgkeluarga').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextkeluarga').html('');
}
function keluarga_alert_show(pesan){	
	$('#alertMsgkeluarga').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextkeluarga').html(pesan);
}
function keluarga_init(){
	$('#txt_kodekeluarga').val('');
	$('#div_status').val('-');
	$('#txt_namakeluarga').val('');
	$('#txt_usiakeluarga').val('');
	$('#txt_pendidikanterakhirkeluarga').val('');
	$('#txt_pekerjaankeluarga').val('');
	$('#rad_jklkeluarga').attr('checked','checked');
	$('#rad_jkpkeluarga').removeAttr('checked'); 
}
function keluarga_cancel(){
	keluarga_init();
	form_get_keluarga($("#txt_regid").val());
	$('#modal-form-keluarga').modal('hide');
}
function keluarga_save(){
	if(keluarga_validate()==false){return;}
	$('#progressBarkeluarga').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/keluarga_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			keluarga_alert_show(obj.message);
 			keluarga_init();
 			keluarga_search();
 			$('#progressBarkeluarga').hide(); 			 
 		}
 	});
}
function keluarga_validate(){
	var nama = $('#txt_namakeluarga').val();
	var status = $('#div_status').val(); 
	if(nama.length==0){ 
		$('#alertMsgkeluarga').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextkeluarga').html('Silahkan isi nama');
		return false;
	}else if(status=='-'){
		$('#alertMsgkeluarga').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextkeluarga').html('Silahkan pilih status');
		return false; 
	}else{
		$('#alertMsgkeluarga').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextkeluarga').html('');
		return true;
	}
}
function keluarga_search(){ 
	$('#progressBarkeluarga').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/keluarga_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarkeluarga').hide();
 			$('#contentkeluarga').html(response);		 
 		}
 	});
}
function keluarga_select_row(kode){  
	$('#progressBarkeluarga').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/keluarga_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				keluarga_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodekeluarga').val(obj.kodekeluarga);
 				$('#div_status').val(obj.status);
 				$('#txt_namakeluarga').val(obj.nama);
 				$('#txt_usiakeluarga').val(obj.usia);
 				$('#txt_pendidikanterakhirkeluarga').val(obj.pendidikanterakhir);
 				$('#txt_pekerjaankeluarga').val(obj.pekerjaan);
 				if(obj.jeniskelamin==0){ 
 					$("#rad_jkpkeluarga").prop("checked", true);
 				}else{
 					$("#rad_jklkeluarga").prop("checked", true);
 				}
 			}
 			
 			$('#progressBarkeluarga').hide(); 			 
 		}
 	}); 
}
function keluarga_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarkeluarga').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/keluarga_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			keluarga_alert_show(response) 	
 			keluarga_search();
 			$('#progressBarkeluarga').hide(); 			 
 		}
 	}); 
}