$(document).ready(function () { 
	form_convert_paging("#formcontent"); 
	document.onkeypress = stopRKey;
	$("#loading_data").hide();
	$("#contentadvancesearch").hide();
	form_reset(); 
});  
function stopRKey(evt) { 
	  var evt = (evt) ? evt : ((event) ? event : null); 
	  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
	  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 
function form_reset(){
	$('#myForm')[0].reset();	 
}   
function on_form_search(){
	$("#loading_data").show();
	var data = $("form").serialize(); 
    $.ajax({
 		type: "POST",
 		url : "<?php echo site_url('search/form_pagging/')?>",
 		data: data,
 		success: function(response){
 			$('#formcontent').html(response);
 			$("#loading_data").hide();
 		}
 	});
}
function on_print_search(){
	$("#loading_data").show(); 
	var search = $("#txt_search").val();
	
	var url = "<?php echo site_url('search/on_print_pdf/"+search+"');?>";
	window.open(url, "_blank");
	$("#loading_data").hide(); 
}
function on_print_cv(noanggota){ 
	$("#loading_data").show();
	var search = noanggota;
	var url = "<?php echo site_url('search/on_print_cv/"+search+"');?>";
	window.open(url, "_blank");
	$("#loading_data").hide(); 
}
function on_print_excel(){
	$("#loading_data").show();
	var search = $("#txt_search").val();
	var url = "<?php echo site_url('search/on_print_excel/"+search+"');?>";
	window.open(url, "_blank");
	$("#loading_data").hide(); 
}

function on_advancesearch(){
	var adv = $("#hdn_search").val();
	if(adv.length==0){
		$("#contentadvancesearch").show();
		$("#hdn_search").val('advance');
		$("#txt_search").attr("readonly","readonly");
	}else{
		$("#contentadvancesearch").hide();
		$("#hdn_search").val('');
		$("#txt_search").removeAttr("readonly");
	}
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 13) {
    	on_form_search();
    	return true;
    }
    return false;
}