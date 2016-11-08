var myVarTimer;

$(document).ready(function () {  
	myVarTimer = setTimeout(function(){
		if($("#txt_regid").val().length>0){
			form_select_row($("#txt_regid").val());
		} 
		clearTimeout(myVarTimer);
	}, 1500);
	form_convert_paging("#formcontent"); 
}); 
function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};
function form_alert_close(){ 
	$('#alertMsgForm').attr('class','alert alert-info alert-dismissable hide');
	$('#alertTextForm').html('');
	$('#modal-progress').modal('hide');
}
function form_alert_show(pesan){	
	$('#alertMsgForm').attr('class','alert alert-info alert-dismissable');
	$('#alertTextForm').html(pesan);
}
function form_reset(){
	$('#myForm')[0].reset(); 
	$('#txt_regid').val(''); 
	$("#loadingmain").show();		$("#div_photo").html('<img id="img_profil" alt="image" src="<?php echo base_url();?>assets/themes/inspinia/images/photo.jpg" style="width:70%;min-height:20%;border-radius:5px;border:solid 1px #e5e6e7;">');		form_get_gajikaryawan(0);
}
function form_save(){
	$("#loadingmain").show();
	$('#modal-progress').modal('show');
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/komponengaji_save/')?>",
 		data: data,
 		success: function(response){
 			form_search();
 			var obj = jQuery.parseJSON(response); 
 			form_alert_show(obj.pesan);
 			$("#loadingmain").hide();
 			if(obj.status==true){
	 			$("#txt_kodekomponengaji").val(obj.id);		
 			}
 		}
 	}); 
} 
function form_select_row(kode){  	form_reset();	$('#modal-progress').modal('show');	var data = "kode="+kode;    $.ajax({ 		type: "POST", 		url : "<?php echo site_url('gajibulanan/form_select_row/')?>", 		data: data, 		success: function(response){  			if(response=='[]'){ 				email_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.") 			}else{ 				var obj = jQuery.parseJSON(response); 				$('#txt_regid').val(obj.regidrec);				 				$('#txt_noanggota').val(obj.noanggota); 				$('#txt_namalengkap').val(obj.namalengkap); 				$('#txt_gajipokok').val(obj.gajipokokbaru); 				$('#txt_jabstruk').val(obj.jabstruk); 				$('#txt_jafung').val(obj.jafung); 				$('#txt_jafungumum').val(obj.jafungumum); 				$('#div_kedudukan').val(obj.kodekedudukan); 				$('#txt_jabatan').val(obj.jabatan); 				$('#div_jabatan').val(obj.kodejabatan); 				$('#txt_photoprofil').val(obj.photoprofil); 				$("#btnUpload").removeAttr("disabled"); 				activaTab('tab-1');	 				form_profil_change(obj.photoprofil);				 				form_get_gajikaryawan(kode);				 				$('#modal-progress').modal('hide'); 				 			} 		} 	}); } 
function form_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#modal-progress').modal('show');
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/form_delete_row/')?>",
 		data: data,
 		success: function(response){  			
 			form_alert_show(response) 	
 			form_search(); 			 
 		}
 	}); 
}
function form_search(){ 
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('gajibulanan/form_pagging/')?>",
 		data: data,
 		success: function(response){
 			$('#formcontent').html(response); 
 		}
 	});
}function form_profil_change(kode){	var data = "kode="+kode;    $.ajax({ 		type: "POST", 		data: data, 		url : "<?php echo site_url('recipient/form_profil_change/')?>",  		success: function(response){  			$("#div_photo").html(response);			  		} 	}); }function form_get_gajikaryawan(kode){   	var data = "kode="+kode;    $.ajax({ 		type: "POST", 		url : "<?php echo site_url('gajibulanan/form_get_gajikaryawan/')?>", 		data: data, 		success: function(response){  			$('#div_data_gajikaryawan').html(response); 			  		} 	}); }
function on_gajikaryawan_click(){
	var txt_regid = $('#txt_regid').val();
	if(txt_regid.length==0){
		alert("Mohon Pilih data Anggota terlebih dahulu!");
	}else{
		$('#modal-form-gajikaryawan').modal('show');
		gajikaryawan_search();
		gajikaryawan_alert_close();
	}
}function form_get_komponengaji(){       $.ajax({ 		type: "POST", 		url : "<?php echo site_url('gajibulanan/form_get_komponengaji/')?>",  		success: function(response){ 			$('#div_komponengaji').html(response); 			  		} 	}); }function on_komponengaji_click(){	$('#modal-form-komponengaji').modal('show');}
