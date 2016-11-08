$(document).ready(function () { 
	$('#progressBarorganisasi').hide();
	convert_paging_organisasi("#contentorganisasi"); 
}); 
function organisasi_alert_close(){ 
	$('#alertMsgorganisasi').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextorganisasi').html('');
}
function organisasi_alert_show(pesan){	
	$('#alertMsgorganisasi').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextorganisasi').html(pesan);
}
function organisasi_init(){
	$('#txt_kodeorganisasi').val('');
	$('#txt_namaorganisasi').val('');
	$('#txt_jabatanorganisasi').val('');
	$('#txt_tahunorganisasi').val('');
	$('#txt_tempatorganisasi').val('');
}
function organisasi_cancel(){
	organisasi_init();
	form_get_organisasi($("#txt_regid").val());
	$('#modal-form-organisasi').modal('hide');
}
function organisasi_save(){
	if(organisasi_validate()==false){return;}
	$('#progressBarorganisasi').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/organisasi_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			organisasi_alert_show(obj.message);
 			organisasi_init();
 			organisasi_search();
 			$('#progressBarorganisasi').hide(); 			 
 		}
 	});
}
function organisasi_validate(){
	var nama = $('#txt_namaorganisasi').val(); 
	if(nama.length==0){ 
		$('#alertMsgorganisasi').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextorganisasi').html('Silahkan isi Nama Organisasi');
		return false; 
	}else{
		$('#alertMsgorganisasi').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextorganisasi').html('');
		return true;
	}
}
function organisasi_search(){ 
	$('#progressBarorganisasi').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/organisasi_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarorganisasi').hide();
 			$('#contentorganisasi').html(response);		 
 		}
 	});
}
function organisasi_select_row(kode){  
	$('#progressBarorganisasi').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/organisasi_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				organisasi_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodeorganisasi').val(obj.kodeorganisasi);
 				$('#txt_namaorganisasi').val(obj.namaorganisasi);
 				$('#txt_jabatanorganisasi').val(obj.jabatan);
 				$('#txt_tahunorganisasi').val(obj.tahun);
 				$('#txt_tempatorganisasi').val(obj.tempat);
 			}
 			$('#progressBarorganisasi').hide(); 			 
 		}
 	}); 
}
function organisasi_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarorganisasi').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/organisasi_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			organisasi_alert_show(response) 	
 			organisasi_search();
 			$('#progressBarorganisasi').hide(); 			 
 		}
 	}); 
}