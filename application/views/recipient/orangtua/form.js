$(document).ready(function () { 
	$('#progressBarorangtua').hide();
	convert_paging_orangtua("#contentorangtua"); 
}); 
function orangtua_alert_close(){ 
	$('#alertMsgorangtua').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextorangtua').html('');
}
function orangtua_alert_show(pesan){	
	$('#alertMsgorangtua').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextorangtua').html(pesan);
}
function orangtua_init(){
	$('#txt_kodeorangtua').val('');
	$('#div_statusorangtua').val('-');
	$('#txt_namaorangtua').val('');
	$('#txt_gelardpnortu').val('');
	$('#txt_gelarblkortu').val('');
	$('#txt_tempatlahirortu').val('');
	$('#txt_tgllahirortu').val('');
	$('#div_agamaorangtua').val('-');
	$('#txt_emailortu').val('');
	$('#rad_menikah').attr('checked','checked');
	$('#rad_dudajanda').removeAttr('checked'); 
	$('#rad_belum').removeAttr('checked'); 
	$('#txt_noteleponortu').val('');
	$('#txt_alamatortu').val('');
	
}
function orangtua_cancel(){
	orangtua_init();
	form_get_orangtua($("#txt_regid").val());
	$('#modal-form-orangtua').modal('hide');
}
function orangtua_save(){
	if(orangtua_validate()==false){return;}
	$('#progressBarorangtua').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/orangtua_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			orangtua_alert_show(obj.message);
 			orangtua_init();
 			orangtua_search();
 			$('#progressBarorangtua').hide(); 			 
 		}
 	});
}
function orangtua_validate(){
	var nama = $('#txt_namaorangtua').val();
	var status = $('#div_statusorangtua').val();
	if(nama.length==0){ 
		$('#alertMsgorangtua').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextorangtua').html('Silahkan isi nama');
		return false;
	}else if(status=='-'){
		$('#alertMsgorangtua').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextorangtua').html('Silahkan pilih status');
		return false;
	}else{
		$('#alertMsgorangtua').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextorangtua').html('');
		return true;
	}
}
function orangtua_search(){ 
	$('#progressBarorangtua').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/orangtua_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarorangtua').hide();
 			$('#contentorangtua').html(response);		 
 		}
 	});
}
function orangtua_select_row(kode){  
	$('#progressBarorangtua').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/orangtua_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				orangtua_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodeorangtua').val(obj.kodeorangtua);
 				$('#div_statusorangtua').val(obj.status);
 				$('#txt_namaorangtua').val(obj.namaorangtua);
 				$('#txt_gelardpnortu').val(obj.gelardpn);
 				$('#txt_gelarblkortu').val(obj.gelarblk);
 				$('#txt_tempatlahirortu').val(obj.tempatlahir);
 				$('#txt_tgllahirortu').val(obj.tgllahir);
 				$('#div_agamaorangtua').val(obj.agama);
 				$('#txt_emailortu').val(obj.email);
 				if(obj.statuskawin==0){ 
 					$("#rad_menikah").prop("checked", true);
 				}else if(obj.statuskawin==1){
 					$("#rad_dudajanda").prop("checked", true);
 				}else{
 					$("#rad_belum").prop("checked", true);
 				}
 				$('#txt_noteleponortu').val(obj.notelepon);
 				$('#txt_alamatortu').val(obj.alamat);
 			}
 			
 			$('#progressBarorangtua').hide(); 			 
 		}
 	}); 
}

function orangtua_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarorangtua').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/orangtua_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			orangtua_alert_show(response) 	
 			orangtua_search();
 			$('#progressBarorangtua').hide(); 			 
 		}
 	}); 
}