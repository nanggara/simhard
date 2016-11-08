$(document).ready(function () { 
	$('#progressBarinstitusi').hide();
	convert_paging_institusi("#contentinstitusi"); 
}); 
function institusi_alert_close(){ 
	$('#alertMsginstitusi').attr('class','alert alert-warning alert-dismissable hide');
	$('#alertTextinstitusi').html('');
}
function institusi_alert_show(pesan){	
	$('#alertMsginstitusi').attr('class','alert alert-warning alert-dismissable');
	$('#alertTextinstitusi').html(pesan);
}
function institusi_init(){
	$('#txt_kodeinstitusi').val('');
	$('#txt_institusimodal').val(''); 	
	$('#txt_alamatinstitusimodal').val('');
	$('#txt_searchinstitusi').val(''); 	
}
function institusi_save(){ 
	if(institusi_validate()==false){return;}
	$('#progressBarinstitusi').show();
	var data = $("form").serialize();  
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('nonrecipient/institusi_save/')?>",
 		data: data,
 		success: function(response){  
 			var obj = jQuery.parseJSON(response); 
 			institusi_alert_show(obj.message);
 			institusi_init(); 
 			institusi_search();
 			$('#progressBarinstitusi').hide(); 			 
 		}
 	}); 
}
function institusi_validate(){
	var institusi = $('#txt_institusimodal').val(); 
	if(institusi.length==0){ 
		$('#alertMsginstitusi').attr('class','alert alert-warning alert-dismissable');
		$('#alertTextinstitusi').html('Please Enter Institusi');
		return false;
	}else{
		$('#alertMsginstitusi').attr('class','alert alert-warning alert-dismissable hide');
		$('#alertTextinstitusi').html('');
		return true;
	}
}
function institusi_search(){
	$('#progressBarinstitusi').show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('nonrecipient/institusi_pagging/')?>",
 		data: data,
 		success: function(response){ 
 			$('#progressBarinstitusi').hide();
 			$('#contentinstitusi').html(response);		 
 		}
 	});
}
function institusi_select_row(kode){  
	$('#progressBarinstitusi').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('nonrecipient/institusi_select_row/')?>",
 		data: data,
 		success: function(response){ 
 			if(response=='[]'){
 				institusi_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.")
 			}else{
 				var obj = jQuery.parseJSON(response);
 				$('#txt_kodeinstitusi').val(obj.kodeinstitusi);
 				$('#txt_institusimodal').val(obj.institusi);
 				$('#txt_alamatinstitusimodal').val(obj.alamat);
 			}
 			
 			$('#progressBarinstitusi').hide(); 			 
 		}
 	}); 
}
function institusi_delete_row(kode){  
	if(!confirm("Yakin data akan dihapus?")){return;}
	$('#progressBarinstitusi').show();
	var data = "kode="+kode;
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('nonrecipient/institusi_delete_row/')?>",
 		data: data,
 		success: function(response){ 
 			institusi_alert_show(response) 	
 			institusi_search();
 			$('#progressBarinstitusi').hide(); 			 
 		}
 	}); 
}