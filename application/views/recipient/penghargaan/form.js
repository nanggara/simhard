$(document).ready(function () { 
	$('#progressBarpenghargaan').hide();
	convert_paging_penghargaan("#contentpenghargaan"); 
}); 
function penghargaan_alert_close(){ 
	$('#alertMsgpenghargaan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextpenghargaan').html('');
}
function penghargaan_alert_show(pesan){	
	$('#alertMsgpenghargaan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextpenghargaan').html(pesan);
}
function penghargaan_init(){
	$('#txt_kodepenghargaan').val('');
	$('#txt_namapenghargaan').val('');
	$('#txt_nokeputusan').val('');
	$('#txt_tglkeputusan').val('');
	$('#txt_pemberipenghargaan').val('');
}
function penghargaan_cancel(){
	penghargaan_init();
	form_get_penghargaan($("#txt_regid").val());
	$('#modal-form-penghargaan').modal('hide');
}
function penghargaan_save(){
	if(penghargaan_validate()==false){return;}
	$('#progressBarpenghargaan').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/penghargaan_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			penghargaan_alert_show(obj.message);
 			penghargaan_init();
 			penghargaan_search();
 			$('#progressBarpenghargaan').hide(); 			 
 		}
 	});
}
function penghargaan_validate(){
	var nama = $('#txt_namapenghargaan').val(); 
	if(nama.length==0){ 
		$('#alertMsgpenghargaan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextpenghargaan').html('Silahkan isi Nama penghargaan');
		return false; 
	}else{
		$('#alertMsgpenghargaan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextpenghargaan').html('');
		return true;
	}
}
function penghargaan_search(){ 
	$('#progressBarpenghargaan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/penghargaan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarpenghargaan').hide();
 			$('#contentpenghargaan').html(response);		 
 		}
 	});
}
function penghargaan_select_row(kode){  
	$('#progressBarpenghargaan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/penghargaan_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				penghargaan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodepenghargaan').val(obj.kodepenghargaan);
 				$('#txt_namapenghargaan').val(obj.namapenghargaan);
				$('#txt_nokeputusan').val(obj.nokeputusan);
				$('#txt_tglkeputusan').val(obj.tglkeputusan);
				$('#txt_pemberipenghargaan').val(obj.pemberipenghargaan);
 			}
 			$('#progressBarpenghargaan').hide(); 			 
 		}
 	}); 
}
function penghargaan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarpenghargaan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/penghargaan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			penghargaan_alert_show(response) 	
 			penghargaan_search();
 			$('#progressBarpenghargaan').hide(); 			 
 		}
 	}); 
}