$(document).ready(function () { 
	$('#progressBarprestasi').hide();
	convert_paging_prestasi("#contentprestasi"); 
}); 
function prestasi_alert_close(){ 
	$('#alertMsgprestasi').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextprestasi').html('');
}
function prestasi_alert_show(pesan){	
	$('#alertMsgprestasi').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextprestasi').html(pesan);
}
function prestasi_init(){
	$('#txt_kodeprestasi').val('');
	$('#txt_bidangprestasi').val('');
	$('#txt_peringkatprestasi').val('');
	$('#txt_tahunprestasi').val('');
	$('#txt_tingkatprestasi').val('');
	$('#txt_penyelenggaraprestasi').val('');
}
function prestasi_cancel(){
	prestasi_init();
	form_get_prestasi($("#txt_regid").val());
	$('#modal-form-prestasi').modal('hide');
}
function prestasi_save(){
	if(prestasi_validate()==false){return;}
	$('#progressBarprestasi').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/prestasi_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			prestasi_alert_show(obj.message);
 			prestasi_init();
 			prestasi_search();
 			$('#progressBarprestasi').hide(); 			 
 		}
 	});
}
function prestasi_validate(){
	var nama = $('#txt_bidangprestasi').val(); 
	if(nama.length==0){ 
		$('#alertMsgprestasi').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextprestasi').html('Silahkan isi Bidang');
		return false; 
	}else{
		$('#alertMsgprestasi').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextprestasi').html('');
		return true;
	}
}
function prestasi_search(){ 
	$('#progressBarprestasi').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/prestasi_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarprestasi').hide();
 			$('#contentprestasi').html(response);		 
 		}
 	});
}
function prestasi_select_row(kode){  
	$('#progressBarprestasi').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/prestasi_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				prestasi_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodeprestasi').val(obj.kodeprestasi);
 				$('#txt_bidangprestasi').val(obj.bidang);
 				$('#txt_peringkatprestasi').val(obj.peringkat);
 				$('#txt_tahunprestasi').val(obj.tahun);
 				$('#txt_tingkatprestasi').val(obj.tingkat);
 				$('#txt_penyelenggaraprestasi').val(obj.penyelenggara);
 			}
 			$('#progressBarprestasi').hide(); 			 
 		}
 	}); 
}
function prestasi_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarprestasi').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/prestasi_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			prestasi_alert_show(response) 	
 			prestasi_search();
 			$('#progressBarprestasi').hide(); 			 
 		}
 	}); 
}