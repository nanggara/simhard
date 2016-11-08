$(document).ready(function () { 
	$('#progressBaranak').hide();
	convert_paging_anak("#contentanak"); 
}); 
function anak_alert_close(){ 
	$('#alertMsganak').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextanak').html('');
}
function anak_alert_show(pesan){	
	$('#alertMsganak').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextanak').html(pesan);
}
function anak_init(){
	$('#txt_kodeanak').val('');
	$('#txt_namaanak').val('');
	$('#txt_tempatlahiranak').val('');
	$('#txt_tgllahiranak').val('');
	$('#txt_pendidikananak').val('');
	$('#txt_pekerjaananak').val('');
	$('#txt_alamatanak').val('');
	$('#txt_teleponanak').val('');
	$('#rad_lakianak').attr('checked','checked');
	$('#rad_perempuananak').removeAttr('checked');
	$('#rad_belumanak').attr('checked','checked');
	$('#rad_menikahanak').removeAttr('checked');
	$('#rad_dudaanak').removeAttr('checked');
	$('#rad_hidupanak').attr('checked','checked');
	$('#rad_meninggalanak').removeAttr('checked');
	$('#rad_kandunganak').attr('checked','checked');
	$('#rad_angkatanak').removeAttr('checked');
	$('#rad_tirianak').removeAttr('checked');
	$('#div_agamaanak').val('-');
}
function anak_cancel(){
	anak_init();
	form_get_anak($("#txt_regid").val());
	$('#modal-form-anak').modal('hide');
}
function anak_save(){
	if(anak_validate()==false){return;}
	$('#progressBaranak').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/anak_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			anak_alert_show(obj.message);
 			anak_init();
 			anak_search();
 			$('#progressBaranak').hide(); 			 
 		}
 	});
}
function anak_validate(){
	var nama = $('#txt_namaanak').val();
	var status = $('#div_statusanak').val();
	if(nama.length==0){ 
		$('#alertMsganak').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextanak').html('Silahkan isi nama');
		return false;
	}else if(status=='-'){
		$('#alertMsganak').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextanak').html('Silahkan pilih status');
		return false; 
	}else{
		$('#alertMsganak').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextanak').html('');
		return true;
	}
}
function anak_search(){ 
	$('#progressBaranak').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/anak_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBaranak').hide();
 			$('#contentanak').html(response);		 
 		}
 	});
}
function anak_select_row(kode){  
	$('#progressBaranak').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/anak_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				anak_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodeanak').val(obj.kodeanak);
 				$('#txt_namaanak').val(obj.namaanak);
 				$('#txt_tempatlahiranak').val(obj.tempatlahiranak);
 				$('#txt_tgllahiranak').val(obj.tgllahiranak);
 				$('#txt_pendidikananak').val(obj.pendidikananak);
 				$('#txt_pekerjaananak').val(obj.pekerjaananak);
 				$('#txt_alamatanak').val(obj.alamatanak);
 				$('#txt_teleponanak').val(obj.teleponanak);
 				$('#div_agamaanak').val(obj.agamaanak);
 				if(obj.jkanak==0){ 
 					$("#rad_lakianak").prop("checked", true);
 				}else{
 					$("#rad_perempuananak").prop("checked", true);
 				}
 				if(obj.statkawinanak==0){ 
 					$("#rad_belumanak").prop("checked", true);
 				}else if(obj.statuskawin==1){
 					$("#rad_menikahanak").prop("checked", true);
 				}else{
 					$("#rad_dudaanak").prop("checked", true);
 				}
 				if(obj.stathidupanak==0){ 
 					$("#rad_hidupanak").prop("checked", true);
 				}else{
 					$("#rad_meninggalanak").prop("checked", true);
 				}
 				if(obj.statanak==0){ 
 					$("#rad_kandunganak").prop("checked", true);
 				}else if(obj.statuskawin==1){
 					$("#rad_angkatanak").prop("checked", true);
 				}else{
 					$("#rad_tirianak").prop("checked", true);
 				}
 			}
 			
 			$('#progressBaranak').hide(); 			 
 		}
 	}); 
}


function anak_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBaranak').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/anak_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			anak_alert_show(response) 	
 			anak_search();
 			$('#progressBaranak').hide(); 			 
 		}
 	}); 
}