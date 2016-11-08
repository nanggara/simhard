$(document).ready(function () {  
		convert_paging_kewirausahaan("#contentkewirausahaan"); 
});
function convert_paging_kewirausahaan(domId){ 
	$("#pagingkewirausahaan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_kewirausahaan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_kewirausahaan(theurl,div){
	$('#progressBarkewirausahaan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarkewirausahaan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 