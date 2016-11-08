$(document).ready(function () { 
	$('#progressBarpendidikannonformal').hide();
	convert_paging_pendidikannonformal("#contentpendidikannonformal"); 
}); 
function pendidikannonformal_alert_close(){ 
	$('#alertMsgpendidikannonformal').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextpendidikannonformal').html('');
}
function pendidikannonformal_alert_show(pesan){	
	$('#alertMsgpendidikannonformal').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextpendidikannonformal').html(pesan);
}
function pendidikannonformal_init(){
	$('#txt_kodependidikannf').val('');
	$('#txt_kompetensipendnf').val('');
	$('#txt_namalembagapendnf').val('');
	$('#txt_tahunpendnf').val('');
	$('#txt_spesialisasipendnf').val('');
}
function pendidikannonformal_cancel(){
	pendidikannonformal_init();
	form_get_pendidikannonformal($("#txt_regid").val());
	$('#modal-form-pendidikannonformal').modal('hide');
}
function pendidikannonformal_save(){
	if(pendidikannonformal_validate()==false){return;}
	$('#progressBarpendidikannonformal').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pendidikannonformal_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			pendidikannonformal_alert_show(obj.message);
 			pendidikannonformal_init();
 			pendidikannonformal_search();
 			$('#progressBarpendidikannonformal').hide(); 			 
 		}
 	});
}
function pendidikannonformal_validate(){
	var kompetensi = $('#txt_kompetensipendnf').val();
	var namalembaga = $('#txt_namalembagapendnf').val(); 
	if(kompetensi.length==0){ 
		$('#alertMsgpendidikannonformal').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextpendidikannonformal').html('Silahkan isi Kompetensi');
		return false;
	}else if(namalembaga==''){
		$('#alertMsgpendidikannonformal').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextpendidikannonformal').html('Silahkan isi Nama Lembaga');
		return false; 
	}else{
		$('#alertMsgpendidikannonformal').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextpendidikannonformal').html('');
		return true;
	}
}
function pendidikannonformal_search(){ 
	$('#progressBarpendidikannonformal').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pendidikannonformal_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarpendidikannonformal').hide();
 			$('#contentpendidikannonformal').html(response);		 
 		}
 	});
}
function pendidikannonformal_select_row(kode){  
	$('#progressBarpendidikannonformal').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pendidikannonformal_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				pendidikannonformal_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodependidikannf').val(obj.kodependidikannf);
 				$('#txt_kompetensipendnf').val(obj.kompetensi);
 				$('#txt_namalembagapendnf').val(obj.namalembaga);
 				$('#txt_tahunpendnf').val(obj.tahun);
 				$('#txt_spesialisasipendnf').val(obj.spesialisasi);
 			}
 			$('#progressBarpendidikannonformal').hide(); 			 
 		}
 	}); 
}
function pendidikannonformal_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarpendidikannonformal').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pendidikannonformal_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			pendidikannonformal_alert_show(response) 	
 			pendidikannonformal_search();
 			$('#progressBarpendidikannonformal').hide(); 			 
 		}
 	}); 
}