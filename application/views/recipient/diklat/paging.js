$(document).ready(function () {  
		convert_paging_diklat("#contentdiklat"); 
});
function convert_paging_diklat(domId){ 
	$("#pagingdiklat").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_diklat(thisHref,domId);
	    return false;
	});
	});
}
function load_url_diklat(theurl,div){
	$('#progressBardiklat').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBardiklat').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 