$(document).ready(function () { 
	$('#progressBarpasangan').hide();
	convert_paging_pasangan("#contentpasangan"); 
}); 
function pasangan_alert_close(){ 
	$('#alertMsgpasangan').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextpasangan').html('');
}
function pasangan_alert_show(pesan){	
	$('#alertMsgpasangan').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextpasangan').html(pesan);
}
function pasangan_init(){
	$('#txt_kodepasangan').val('');
	$('#div_statuspasangan').val('-');
	$('#txt_namapasangan').val('');
	$('#txt_gelardpnpsgn').val('');
	$('#txt_gelarblkpsgn').val('');
	$('#txt_tempatlahirpsgn').val('');
	$('#txt_tgllahirpsgn').val('');
	$('#div_agamapasangan').val('-');
	$('#txt_emailpsgn').val('');
	$('#rad_menikah').attr('checked','checked');
	$('#rad_dudajanda').removeAttr('checked'); 
	$('#rad_belum').removeAttr('checked'); 
	$('#txt_noteleponpsgn').val('');
	$('#txt_alamatpsgn').val('');
	$('#txt_noaktacerai').val('');
	$('#txt_tglaktacerai').val('');
	$('#txt_noaktalahirpsgn').val('');
	$('#txt_tglaktalahirpsgn').val('');
	$('#txt_noaktamati').val('');
	$('#txt_tglaktamati').val('');
	$('#txt_nonpwppsgn').val('');
	$('#txt_tglnpwppsgn').val('');
	$('#txt_namapns').val('');
	$('#txt_nippns').val('');
	
}
function pasangan_cancel(){
	pasangan_init();
	form_get_pasangan($("#txt_regid").val());
	$('#modal-form-pasangan').modal('hide');
}
function pasangan_save(){
	if(pasangan_validate()==false){return;}
	$('#progressBarpasangan').show();
	var data = $("form").serialize();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pasangan_save/')?>",
 		data: data,
 		success: function(response){
 			var obj = jQuery.parseJSON(response); 
 			pasangan_alert_show(obj.message);
 			pasangan_init();
 			pasangan_search();
 			$('#progressBarpasangan').hide(); 			 
 		}
 	});
}
function pasangan_validate(){
	var nama = $('#txt_namapasangan').val();
	var status = $('#div_statuspasangan').val();
	if(nama.length==0){ 
		$('#alertMsgpasangan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextpasangan').html('Silahkan isi nama');
		return false;
	}else if(status=='-'){
		$('#alertMsgpasangan').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextpasangan').html('Silahkan pilih status');
		return false;
	}else{
		$('#alertMsgpasangan').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextpasangan').html('');
		return true;
	}
}
function pasangan_search(){ 
	$('#progressBarpasangan').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pasangan_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarpasangan').hide();
 			$('#contentpasangan').html(response);		 
 		}
 	});
}
function pasangan_select_row(kode){  
	$('#progressBarpasangan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pasangan_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				pasangan_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodepasangan').val(obj.kodepasangan);
 				$('#div_statuspasangan').val(obj.status);
 				$('#txt_namapasangan').val(obj.namapasangan);
 				$('#txt_gelardpnpsgn').val(obj.gelardpn);
 				$('#txt_gelarblkpsgn').val(obj.gelarblk);
 				$('#txt_tempatlahirpsgn').val(obj.tempatlahir);
 				$('#txt_tgllahirpsgn').val(obj.tgllahir);
 				$('#div_agamapasangan').val(obj.agamapasangan);
 				$('#txt_emailpsgn').val(obj.email);
 				if(obj.statuskawin==0){ 
 					$("#rad_menikah").prop("checked", true);
 				}else if(obj.statuskawin==1){
 					$("#rad_dudajanda").prop("checked", true);
 				}else{
 					$("#rad_belum").prop("checked", true);
 				}
 				$('#txt_noteleponpsgn').val(obj.notelepon);
 				$('#txt_alamatpsgn').val(obj.alamat);
 				$('#txt_noaktacerai').val(obj.noaktacerai); 				
 				$('#txt_tglaktacerai').val(obj.tglaktacerai);
 				$('#txt_noaktalahirpsgn').val(obj.noaktalahir);
 				$('#txt_tglaktalahirpsgn').val(obj.tglaktalahir);
 				$('#txt_noaktamati').val(obj.noaktamati);
 				$('#txt_tglaktamati').val(obj.tglaktamati);
 				$('#txt_nonpwppsgn').val(obj.nonpwp);
 				$('#txt_tglnpwppsgn').val(obj.tglnpwp);
 				$('#txt_namapns').val(obj.namapns);
 				$('#txt_nippns').val(obj.nippns);
 			}
 			
 			$('#progressBarpasangan').hide(); 			 
 		}
 	}); 
}

function pasangan_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarpasangan').show();
	var data = "kode="+kode+"&txt_regid="+$("#txt_regid").val();
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/pasangan_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			pasangan_alert_show(response) 	
 			pasangan_search();
 			$('#progressBarpasangan').hide(); 			 
 		}
 	}); 
}