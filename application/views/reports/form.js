function on_buka(){
	if($("#txt_tahun1").val().length==0){
		alert("Tolong Input Tahun Periode pertama")
	}else if($("#txt_tahun2").val().length==0){
		alert("Tolong Input Tahun Periode kedua")
	}else{
		$("#myForm").submit();
	}
}
function on_print(){
	var hdn_periode1 = $("#hdn_periode1").val();
	var hdn_periode2 = $("#hdn_periode2").val();
	var hdn_kelompok = $("#hdn_kelompok").val();
	var hdn_universitas = $("#hdn_universitas").val();
	
	var url = "<?php echo site_url('reports/print_laporan/"+hdn_periode1+"/"+hdn_periode2+"/"+hdn_kelompok+"/"+hdn_universitas+"');?>";
	window.open(url, '_blank');
}