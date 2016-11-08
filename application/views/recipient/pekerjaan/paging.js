$(document).ready(function () {  
		convert_paging_pekerjaan("#contentpekerjaan"); 
});
function convert_paging_pekerjaan(domId){ 
	$("#pagingpekerjaan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_pekerjaan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_pekerjaan(theurl,div){
	$('#progressBar-pekerjaan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-pekerjaan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 