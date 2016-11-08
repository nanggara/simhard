$(document).ready(function () { 	$('#progressBar-Komponengaji').hide();//	convert_paging_komponen("#contentkomponengaji"); }); function komponengaji_alert_close(){ 	$('#alertMsgkomponengaji').attr('class','alert alert-warning alert-dismissable hide');	$('#alertTextkomponengaji').html('');}function komponengaji_alert_show(pesan){		$('#alertMsgkomponengaji').attr('class','alert alert-warning alert-dismissable');	$('#alertTextkomponengaji').html(pesan);}function komponengaji_init(){	$('#txt_kodekomponengaji').val('');	$('#txt_namakomponengaji').val('');	$('#div_komponen').val('0');}function komponengaji_save(){	if(komponengaji_validate()==false){return;} 	$("#progressBar-Komponengaji").show();	var data = $("form").serialize();      $.ajax({ 		type: "POST", 		url : "<?php echo site_url('gajibulanan/komponengaji_save/')?>", 		data: data, 		success: function(response){ 			komponengaji_search(); 			var obj = jQuery.parseJSON(response);  			form_alert_show(obj.message); 			$("#progressBar-Komponengaji").hide(); 			if(obj.status==true){	 			$("#txt_kodekomponengaji").val(obj.id);	 			$("#txt_namakomponengaji").val(obj.namakomponengaji); 			} 		} 	}); }function komponengaji_validate(){	var komponen = $('#txt_namakomponengaji').val();	if(komponen.length==0){ 		$('#alertMsgkomponengaji').attr('class','alert alert-warning alert-dismissable');		$('#alertTextkomponengaji').html('Silahkan Masukan Komponen');		return false;	}else{		$('#alertMsgkomponengaji').attr('class','alert alert-warning alert-dismissable hide');		$('#alertTextkomponengaji').html('');		return true;	}}function komponengaji_search(){ 	$('#progressBar-Komponengaji').show();	var data = $("form").serialize();     $.ajax({ 		type: "POST", 		url : "<?php echo site_url('gajibulanan/komponengaji_pagging/')?>", 		data: data, 		success: function(response){ 			$('#progressBar-Komponengaji').hide(); 			$('#contentkomponengaji').html(response);		  		} 	});}function komponengaji_select_row(kode){  	$('#progressBar-Komponengaji').show();	var data = "kode="+kode;    $.ajax({ 		type: "POST", 		url : "<?php echo site_url('gajibulanan/komponengaji_select_row/')?>", 		data: data, 		success: function(response){ 			if(response=='[]'){ 				komponengaji_alert_show("Aksi tidak dapat dilakukan, data yang anda pilih kemungkinan telah berubah.") 			}else{ 				var obj = jQuery.parseJSON(response); 				$('#txt_kodekomponengaji').val(obj.kodekomponengaji); 				$('#txt_namakomponengaji').val(obj.namakomponengaji); 				$('#div_komponen').val(obj.kodekelompokkompgaji); 				$('#div_potongan').val(obj.potongan); 				$('#div_status').val(obj.aktif); 			} 			 			$('#progressBar-Komponengaji').hide(); 			  		} 	}); }function komponengaji_delete_row(kode){  	if(!confirm("Yakin data akan dihapus?")){return;}	$('#progressBar-Komponengaji').show();	var data = "kode="+kode;    $.ajax({ 		type: "POST", 		url : "<?php echo site_url('gajibulanan/komponengaji_delete_row/')?>", 		data: data, 		success: function(response){  			komponengaji_alert_show(response) 	 			komponengaji_search(); 			$('#progressBar-Komponengaji').hide(); 			  		} 	}); }