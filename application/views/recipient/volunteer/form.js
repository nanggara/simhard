$(document).ready(function () { 
	$('#progressBarvolunteer').hide();
	convert_paging_volunteer("#contentvolunteer"); 
}); 
function volunteer_alert_close(){ 
	$('#alertMsgvolunteer').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextvolunteer').html('');
}
function volunteer_alert_show(pesan){	
	$('#alertMsgvolunteer').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextvolunteer').html(pesan);
}
function volunteer_init(){
	$('#txt_kodevolunteer').val('');
	$('#txt_namakegiatanvolunteer').val('');
	$('#txt_jabatanvolunteer').val('');
	$('#txt_tahunvolunteer').val('');
	$('#txt_tempatvolunteer').val('');
}
function volunteer_cancel(){
	volunteer_init();
	form_get_volunteer($("#txt_regid").val());
	$('#modal-form-volunteer').modal('hide');
}
function volunteer_save(){
	if(volunteer_validate()==false){return;}
	$('#progressBarvolunteer').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/volunteer_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			volunteer_alert_show(obj.message);
 			volunteer_init();
 			volunteer_search();
 			$('#progressBarvolunteer').hide(); 			 
 		}
 	});
}
function volunteer_validate(){
	var nama = $('#txt_namakegiatanvolunteer').val(); 
	if(nama.length==0){ 
		$('#alertMsgvolunteer').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextvolunteer').html('Silahkan isi Nama Kegiatan');
		return false; 
	}else{
		$('#alertMsgvolunteer').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextvolunteer').html('');
		return true;
	}
}
function volunteer_search(){ 
	$('#progressBarvolunteer').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/volunteer_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarvolunteer').hide();
 			$('#contentvolunteer').html(response);		 
 		}
 	});
}
function volunteer_select_row(kode){  
	$('#progressBarvolunteer').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/volunteer_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				volunteer_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodevolunteer').val(obj.kodevolunteer);
 				$('#txt_namakegiatanvolunteer').val(obj.namakegiatan);
 				$('#txt_jabatanvolunteer').val(obj.jabatan);
 				$('#txt_tahunvolunteer').val(obj.tahun);
 				$('#txt_tempatvolunteer').val(obj.tempat);
 			}
 			$('#progressBarvolunteer').hide(); 			 
 		}
 	}); 
}
function volunteer_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarvolunteer').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/volunteer_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			volunteer_alert_show(response) 	
 			volunteer_search();
 			$('#progressBarvolunteer').hide(); 			 
 		}
 	}); 
}