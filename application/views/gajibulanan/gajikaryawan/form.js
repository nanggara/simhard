$(document).ready(function () { 
	$('#progressBargajikaryawan').hide();
	convert_paging_gajikaryawan("#contentgajikaryawan"); 
}); 
function gajikaryawan_alert_close(){ 
	$('#alertMsggajikaryawan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextgajikaryawan').html('');
}
function gajikaryawan_alert_show(pesan){	
	$('#alertMsggajikaryawan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextgajikaryawan').html(pesan);
}
function gajikaryawan_init(){
	$('#txt_kodegajikaryawan').val('');
	$('#div_komponen').val('0');
	$('#txt_jumlah').val('');
}
function gajikaryawan_cancel(){
	gajikaryawan_init();
	form_get_gajikaryawan($("#txt_regid").val());
	$('#modal-form-gajikaryawan').modal('hide');
}
function gajikaryawan_save(){
	if(gajikaryawan_validate()==false){return;}
	$('#progressBargajikaryawan').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/gajikaryawan_save/')?>",
 		data: data,
 		success: function(response){	
 			var obj = jQuery.parseJSON(response); 
 			gajikaryawan_alert_show(obj.message);
 			gajikaryawan_init();
 			gajikaryawan_search();
 			$('#progressBargajikaryawan').hide(); 			 
 		}
 	});
}
function gajikaryawan_validate(){
	var komponen = $('#div_komponen').val();
	var jumlah = $('#txt_jumlah').val(); 
	if(komponen=='0'){ 
		$('#alertMsggajikaryawan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextgajikaryawan').html('Silahkan Masukan Komponen');
		return false;
	}else if(jumlah==0){
		$('#alertMsggajikaryawan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextgajikaryawan').html('Silahkan masukan jumlah');
		return false; 
	}else{
		$('#alertMsggajikaryawan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextgajikaryawan').html('');
		return true;
	}
}
function gajikaryawan_search(){ 
	$('#progressBargajikaryawan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/gajikaryawan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBargajikaryawan').hide();
 			$('#contentgajikaryawan').html(response);		 
 		}
 	});
}
function gajikaryawan_select_row(kode){  
	$('#progressBargajikaryawan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/gajikaryawan_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				gajikaryawan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodegajikaryawan').val(obj.kodegajikaryawan); 				$('#div_komponen').val(obj.kodekomponengaji); 				$('#txt_jumlah').val(obj.jumlah);
 			}
 			
 			$('#progressBargajikaryawan').hide(); 			 
 		}
 	}); 
}
function gajikaryawan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBargajikaryawan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/gajikaryawan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			gajikaryawan_alert_show(response) 	
 			gajikaryawan_search();
 			$('#progressBargajikaryawan').hide(); 			 
 		}
 	}); 
}