$(document).ready(function () { 
	$('#progressBarpendidikan').hide();
	convert_paging_pendidikan("#contentpendidikan"); 
}); 
function pendidikan_alert_close(){ 
	$('#alertMsgpendidikan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextpendidikan').html('');
}
function pendidikan_alert_show(pesan){	
	$('#alertMsgpendidikan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextpendidikan').html(pesan);
}
function pendidikan_init(){
	$('#txt_kodependidikan').val('');
	$('#div_sekolahpendidikan').val('-');
	$('#txt_namasekolahpendidikan').val('');
	$('#txt_tahunpendidikan').val('');
	$('#txt_jurusanpendidikan').val('');
	$('#txt_nilaiakhirpendidikan').val('');
}
function pendidikan_cancel(){
	pendidikan_init();
	form_get_pendidikan($("#txt_regid").val());
	$('#modal-form-pendidikan').modal('hide');
}
function pendidikan_save(){
	if(pendidikan_validate()==false){return;}
	$('#progressBarpendidikan').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pendidikan_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			pendidikan_alert_show(obj.message);
 			pendidikan_init();
 			pendidikan_search();
 			$('#progressBarpendidikan').hide(); 			 
 		}
 	});
}
function pendidikan_validate(){
	var nama = $('#txt_namasekolahpendidikan').val();
	var status = $('#div_sekolahpendidikan').val(); 
	if(nama.length==0){ 
		$('#alertMsgpendidikan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextpendidikan').html('Silahkan isi nama');
		return false;
	}else if(status=='-'){
		$('#alertMsgpendidikan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextpendidikan').html('Silahkan pilih status');
		return false; 
	}else{
		$('#alertMsgpendidikan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextpendidikan').html('');
		return true;
	}
}
function pendidikan_search(){ 
	$('#progressBarpendidikan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pendidikan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarpendidikan').hide();
 			$('#contentpendidikan').html(response);		 
 		}
 	});
}
function pendidikan_select_row(kode){  
	$('#progressBarpendidikan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pendidikan_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				pendidikan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodependidikan').val(obj.kodependidikan); 
 				$('#div_sekolahpendidikan').val(obj.sekolah);
 				$('#txt_namasekolahpendidikan').val(obj.namasekolah);
 				$('#txt_tahunpendidikan').val(obj.tahun);
 				$('#txt_jurusanpendidikan').val(obj.jurusan);
 				$('#txt_nilaiakhirpendidikan').val(obj.nilaiakhir);
 			}
 			$('#progressBarpendidikan').hide(); 			 
 		}
 	}); 
}
function pendidikan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarpendidikan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pendidikan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			pendidikan_alert_show(response) 	
 			pendidikan_search();
 			$('#progressBarpendidikan').hide(); 			 
 		}
 	}); 
}