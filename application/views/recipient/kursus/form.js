$(document).ready(function () { 
	$('#progressBarkursus').hide();
	convert_paging_kursus("#contentkursus"); 
}); 
function kursus_alert_close(){ 
	$('#alertMsgkursus').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextkursus').html('');
}
function kursus_alert_show(pesan){	
	$('#alertMsgkursus').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextkursus').html(pesan);
}
function kursus_init(){
	$('#txt_kodekursus').val('');
	$('#txt_namakursus').val('');
	$('#txt_lamakursus').val('');
	$('#txt_nosertifikat').val('');
	$('#txt_tglsertifikat').val('');
	$('#txt_penyelenggara').val('');
}
function kursus_cancel(){
	kursus_init();
	form_get_kursus($("#txt_regid").val());
	$('#modal-form-kursus').modal('hide');
}
function kursus_save(){
	if(kursus_validate()==false){return;}
	$('#progressBarkursus').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kursus_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			kursus_alert_show(obj.message);
 			kursus_init();
 			kursus_search();
 			$('#progressBarkursus').hide(); 			 
 		}
 	});
}
function kursus_validate(){
	var nama = $('#txt_namakursus').val(); 
	if(nama.length==0){ 
		$('#alertMsgkursus').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextkursus').html('Silahkan isi Nama Kursus');
		return false; 
	}else{
		$('#alertMsgkursus').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextkursus').html('');
		return true;
	}
}
function kursus_search(){ 
	$('#progressBarkursus').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kursus_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarkursus').hide();
 			$('#contentkursus').html(response);		 
 		}
 	});
}
function kursus_select_row(kode){  
	$('#progressBarkursus').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kursus_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				kursus_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodekursus').val(obj.kodekursus);
 				$('#txt_namakursus').val(obj.namakursus);
				$('#txt_lamakursus').val(obj.lamakursus);
				$('#txt_nosertifikat').val(obj.nosertifikat);
				$('#txt_tglsertifikat').val(obj.tglsertifikat);
				$('#txt_penyelenggara').val(obj.penyelenggara);
 			}
 			$('#progressBarkursus').hide(); 			 
 		}
 	}); 
}
function kursus_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarkursus').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kursus_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			kursus_alert_show(response) 	
 			kursus_search();
 			$('#progressBarkursus').hide(); 			 
 		}
 	}); 
}