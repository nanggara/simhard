$(document).ready(function () { 
	$('#progressBardiklat').hide();
	convert_paging_diklat("#contentdiklat"); 
}); 
function diklat_alert_close(){ 
	$('#alertMsgdiklat').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextdiklat').html('');
}
function diklat_alert_show(pesan){	
	$('#alertMsgdiklat').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextdiklat').html(pesan);
}
function diklat_init(){
	$('#txt_kodediklat').val('');
	$('#txt_namadiklat').val('');
	$('#txt_nosertifikat').val('');
	$('#txt_tanggal').val('');
	$('#txt_jumlahjam').val('');
}
function diklat_cancel(){
	diklat_init();
	form_get_diklat($("#txt_regid").val());
	$('#modal-form-diklat').modal('hide');
}
function diklat_save(){
	if(diklat_validate()==false){return;}
	$('#progressBardiklat').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/diklat_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			diklat_alert_show(obj.message);
 			diklat_init();
 			diklat_search();
 			$('#progressBardiklat').hide(); 			 
 		}
 	});
}
function diklat_validate(){
	var nama = $('#txt_namadiklat').val(); 
	if(nama.length==0){ 
		$('#alertMsgdiklat').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextdiklat').html('Silahkan isi Nama Diklat');
		return false; 
	}else{
		$('#alertMsgdiklat').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextdiklat').html('');
		return true;
	}
}
function diklat_search(){ 
	$('#progressBardiklat').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/diklat_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBardiklat').hide();
 			$('#contentdiklat').html(response);		 
 		}
 	});
}
function diklat_select_row(kode){  
	$('#progressBardiklat').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/diklat_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				diklat_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodediklat').val(obj.kodediklat);
 				$('#txt_namadiklat').val(obj.namadiklat);
				$('#txt_nosertifikat').val(obj.nosertifikat);
				$('#txt_tanggal').val(obj.tanggal);
				$('#txt_jumlahjam').val(obj.jumlahjam);
 			}
 			$('#progressBardiklat').hide(); 			 
 		}
 	}); 
}
function diklat_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBardiklat').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/diklat_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			diklat_alert_show(response) 	
 			diklat_search();
 			$('#progressBardiklat').hide(); 			 
 		}
 	}); 
}