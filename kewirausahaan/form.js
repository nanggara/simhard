$(document).ready(function () { 
	$('#progressBarkewirausahaan').hide();
	convert_paging_kewirausahaan("#contentkewirausahaan"); 
}); 
function kewirausahaan_alert_close(){ 
	$('#alertMsgkewirausahaan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextkewirausahaan').html('');
}
function kewirausahaan_alert_show(pesan){	
	$('#alertMsgkewirausahaan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextkewirausahaan').html(pesan);
}
function kewirausahaan_init(){
	$('#txt_kodekwu').val('');
	$('#txt_namausaha').val('');
	$('#txt_bidangusaha').val('');
	$('#txt_tahunmulai').val('');
	$('#txt_tahunakhir').val('');
	$('#txt_jabatan').val('');
}
function kewirausahaan_cancel(){
	kewirausahaan_init();
	form_get_kewirausahaan($("#txt_regid").val());
	$('#modal-form-kewirausahaan').modal('hide');
}
function kewirausahaan_save(){
	if(kewirausahaan_validate()==false){return;}
	$('#progressBarkewirausahaan').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kewirausahaan_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			kewirausahaan_alert_show(obj.message);
 			kewirausahaan_init();
 			kewirausahaan_search();
 			$('#progressBarkewirausahaan').hide(); 			 
		}
 	});
}
function kewirausahaan_validate(){
	var namausaha = $('#txt_namausaha').val();
	if(namausaha.length==0){ 
		$('#alertMsgkewirausahaan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextkewirausahaan').html('Silahkan isi nama usaha');
		return false;
	}else{
		$('#alertMsgkewirausahaan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextkewirausahaan').html('');
		return true;
	}
}
function kewirausahaan_search(){ 
	$('#progressBarkewirausahaan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kewirausahaan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarkewirausahaan').hide();
 			$('#contentkewirausahaan').html(response);		 
 		}
 	});
}
function kewirausahaan_select_row(kode){  
	$('#progressBarkewirausahaan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kewirausahaan_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				kewirausahaan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodekwu').val(obj.kodekwu);
 				$('#txt_namausaha').val(obj.namausaha);
				$('#txt_bidangusaha').val(obj.bidangusaha);
 				$('#txt_tahunmulai').val(obj.tahunmulai);
 				$('#txt_tahunakhir').val(obj.tahunakhir);
 				$('#txt_jabatan').val(obj.jabatan);
 			}
 			
 			$('#progressBarkewirausahaan').hide(); 			 
 		}
 	}); 
}
function kewirausahaan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarkewirausahaan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kewirausahaan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			kewirausahaan_alert_show(response) 	
 			kewirausahaan_search();
 			$('#progressBarkewirausahaan').hide(); 			 
 		}
 	}); 
}