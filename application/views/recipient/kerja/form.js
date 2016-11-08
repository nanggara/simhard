$(document).ready(function () { 
	$('#progressBarkerja').hide();
	convert_paging_kerja("#contentkerja"); 
}); 
function kerja_alert_close(){ 
	$('#alertMsgkerja').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextkerja').html('');
}
function kerja_alert_show(pesan){	
	$('#alertMsgkerja').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextkerja').html(pesan);
}
function kerja_init(){
	$('#txt_kodekerja').val('');
	$('#txt_namalembaga').val('');
	$('#txt_jabatankerja').val('');
	$('#txt_tahunkerja').val('');
	$('#txt_tempatkerja').val('');
}
function kerja_cancel(){
	kerja_init();
	form_get_kerja($("#txt_regid").val());
	$('#modal-form-kerja').modal('hide');
}
function kerja_save(){
	if(kerja_validate()==false){return;}
	$('#progressBarkerja').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kerja_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			kerja_alert_show(obj.message);
 			kerja_init();
 			kerja_search();
 			$('#progressBarkerja').hide(); 			 
 		}
 	});
}
function kerja_validate(){
	var nama = $('#txt_namalembaga').val(); 
	if(nama.length==0){ 
		$('#alertMsgkerja').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextkerja').html('Silahkan isi Nama Lembaga');
		return false; 
	}else{
		$('#alertMsgkerja').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextkerja').html('');
		return true;
	}
}
function kerja_search(){ 
	$('#progressBarkerja').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kerja_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarkerja').hide();
 			$('#contentkerja').html(response);		 
 		}
 	});
}
function kerja_select_row(kode){  
	$('#progressBarkerja').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kerja_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				kerja_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodekerja').val(obj.kodekerja);
 				$('#txt_namalembaga').val(obj.namalembaga);
 				$('#txt_jabatankerja').val(obj.jabatan);
 				$('#txt_tahunkerja').val(obj.tahun);
 				$('#txt_tempatkerja').val(obj.tempat);
 			}
 			$('#progressBarkerja').hide(); 			 
 		}
 	}); 
}
function kerja_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarkerja').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kerja_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			kerja_alert_show(response) 	
 			kerja_search();
 			$('#progressBarkerja').hide(); 			 
 		}
 	}); 
}