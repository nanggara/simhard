$(document).ready(function () { 
	$('#progressBarrwytjabatan').hide();
	convert_paging_rwytjabatan("#contentrwytjabatan"); 
}); 
function rwytjabatan_alert_close(){ 
	$('#alertMsgrwytjabatan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextrwytjabatan').html('');
}
function rwytjabatan_alert_show(pesan){	
	$('#alertMsgrwytjabatan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextrwytjabatan').html(pesan);
}
function rwytjabatan_init(){
	$('#txt_koderwytjabatan').val('');
	$('#txt_namarwytjabatan').val('');
	$('#txt_instansi').val('');
	$('#txt_unitkerja').val('');
	$('#txt_nosk').val('');
	$('#txt_tglsk').val('');
	$('#txt_tmtjabatan').val('');
	$('#txt_eseleonjabatan').val('');
}
function rwytjabatan_cancel(){
	rwytjabatan_init();
	form_get_rwytjabatan($("#txt_regid").val());
	$('#modal-form-rwytjabatan').modal('hide');
}
function rwytjabatan_save(){
	if(rwytjabatan_validate()==false){return;}
	$('#progressBarrwytjabatan').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/rwytjabatan_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			rwytjabatan_alert_show(obj.message);
 			rwytjabatan_init();
 			rwytjabatan_search();
 			$('#progressBarrwytjabatan').hide(); 			 
 		}
 	});
}
function rwytjabatan_validate(){
	var nama = $('#txt_namarwytjabatan').val(); 
	if(nama.length==0){ 
		$('#alertMsgrwytjabatan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextrwytjabatan').html('Silahkan isi Nama Jabatan');
		return false; 
	}else{
		$('#alertMsgrwytjabatan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextrwytjabatan').html('');
		return true;
	}
}
function rwytjabatan_search(){ 
	$('#progressBarrwytjabatan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/rwytjabatan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarrwytjabatan').hide();
 			$('#contentrwytjabatan').html(response);		 
 		}
 	});
}
function rwytjabatan_select_row(kode){  
	$('#progressBarrwytjabatan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/rwytjabatan_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				rwytjabatan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_koderwytjabatan').val(obj.koderwytjabatan);
 				$('#txt_namarwytjabatan').val(obj.namarwytjabatan);
				$('#txt_instansi').val(obj.instansi);
				$('#txt_unitkerja').val(obj.unitkerja);
				$('#txt_nosk').val(obj.nosk);
				$('#txt_tglsk').val(obj.tglsk);
				$('#txt_tmtjabatan').val(obj.tmtjabatan);
				$('#txt_eseleonjabatan').val(obj.eseleonjabatan);
 			}
 			$('#progressBarrwytjabatan').hide(); 			 
 		}
 	}); 
}
function rwytjabatan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarrwytjabatan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/rwytjabatan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			rwytjabatan_alert_show(response) 	
 			rwytjabatan_search();
 			$('#progressBarrwytjabatan').hide(); 			 
 		}
 	}); 
}