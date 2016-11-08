$(document).ready(function () { 
	$('#progressBargolongan').hide();
	convert_paging_golongan("#contentgolongan"); 
}); 
function golongan_alert_close(){ 
	$('#alertMsggolongan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextgolongan').html('');
}
function golongan_alert_show(pesan){	
	$('#alertMsggolongan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextgolongan').html(pesan);
}
function golongan_init(){
	$('#txt_kodegolongan').val('');
	$('#txt_namagolongan').val('');
	$('#txt_tmtgolongan').val('');
	$('#txt_tahunmasagolongan').val('');
	$('#txt_bulanmasagolongan').val('');
	$('#txt_noskgolongan').val('');
	$('#txt_nobkngolongan').val('');
}
function golongan_cancel(){
	golongan_init();
	form_get_golongan($("#txt_regid").val());
	$('#modal-form-golongan').modal('hide');
}
function golongan_save(){
	if(golongan_validate()==false){return;}
	$('#progressBargolongan').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/golongan_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			golongan_alert_show(obj.message);
 			golongan_init();
 			golongan_search();
 			$('#progressBargolongan').hide(); 			 
 		}
 	});
}
function golongan_validate(){
	var nama = $('#txt_namagolongan').val(); 
	if(nama.length==0){ 
		$('#alertMsggolongan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextgolongan').html('Silahkan isi Nama Golongan');
		return false; 
	}else{
		$('#alertMsggolongan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextgolongan').html('');
		return true;
	}
}
function golongan_search(){ 
	$('#progressBargolongan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/golongan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBargolongan').hide();
 			$('#contentgolongan').html(response);		 
 		}
 	});
}
function golongan_select_row(kode){  
	$('#progressBargolongan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/golongan_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				golongan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodegolongan').val(obj.kodegolongan);
 				$('#txt_namagolongan').val(obj.namagolongan);
				$('#txt_tmtgolongan').val(obj.tmtgolongan);
				$('#txt_tahunmasagolongan').val(obj.tahunmasagolongan);
				$('#txt_bulanmasagolongan').val(obj.bulanmasagolongan);
				$('#txt_noskgolongan').val(obj.noskgolongan);
				$('#txt_nobkngolongan').val(obj.nobkngolongan);
 			}
 			$('#progressBargolongan').hide(); 			 
 		}
 	}); 
}
function golongan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBargolongan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/golongan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			golongan_alert_show(response) 	
 			golongan_search();
 			$('#progressBargolongan').hide(); 			 
 		}
 	}); 
}