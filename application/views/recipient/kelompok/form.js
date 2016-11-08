$(document).ready(function () { 
	$('#progressBar-Kelompok').hide();
	convert_paging("#content"); 
}); 
function kelompok_alert_close(){ 
	$('#alertMsg').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertText').html('');
}
function kelompok_alert_show(pesan){	
	$('#alertMsg').attr('class','alert alert-warning alert-dismissable');
	$('#alertText').html(pesan);
}
function kelompok_init(){
	$('#txt_kode').val('');
	$('#txt_kelompokmodal').val('');
	$('#txt_kelompoksingkatan').val(''); 
}
function kelompok_save(){
	if(kelompok_validate()==false){return;} 
	$('#progressBar-Kelompok').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kelompok_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			kelompok_alert_show(obj.message);
 			kelompok_init(); 
 			kelompok_search();
 			$('#progressBar-Kelompok').hide(); 			 
 		}
 	}); 
}
function kelompok_validate(){
	var singkatan = $('#txt_kelompoksingkatan').val();  
	var kelompok = $('#txt_kelompokmodal').val();  
	if(singkatan.length==0){ 
		$('#alertMsg').attr('class','alert alert-warning alert-dismissable');
		$('#alertText').html('Input Singkatan Kelompok');
		return false;
	}else if(kelompok.length==0){ 
		$('#alertMsg').attr('class','alert alert-warning alert-dismissable');
		$('#alertText').html('Input kelompok');
		return false;
	}else{
		$('#alertMsg').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertText').html('');
		return true;
	}
}
function kelompok_search(){
	$('#progressBar-Kelompok').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kelompok_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBar-Kelompok').hide();
 			$('#content').html(response);		 
 		}
 	});
}
function kelompok_select_row(kode){  
	$('#progressBar-Kelompok').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kelompok_select_row/')?>",
 		data: data,
 		success: function(response){
 			if(response=='[]'){
 				kelompok_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kode').val(obj.kodekelompok);
 				$('#txt_kelompokmodal').val(obj.kelompok);
 				$('#txt_kelompoksingkatan').val(obj.singkatan);
 			}
 			
 			$('#progressBar-Kelompok').hide(); 			 
 		}
 	}); 
}
function kelompok_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBar-Kelompok').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('recipient/kelompok_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			kelompok_alert_show(response) 	
 			kelompok_search();
 			$('#progressBar-Kelompok').hide(); 			 
 		}
 	}); 
}