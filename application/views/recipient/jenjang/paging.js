$(document).ready(function () {  
		convert_paging_jenjang("#contentjenjang"); 
});
function convert_paging_jenjang(domId){ 
	$("#pagingjenjang").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_jenjang(thisHref,domId);
	    return false;
	});
	});
}
function load_url_jenjang(theurl,div){
	$('#progressBar-jenjang').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-jenjang').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 