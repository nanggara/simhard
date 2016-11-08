$(document).ready(function () {  
		convert_paging_kawin("#contentkawin"); 
});
function convert_paging_kawin(domId){ 
	$("#pagingkawin").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_kawin(thisHref,domId);
	    return false;
	});
	});
}
function load_url_kawin(theurl,div){
	$('#progressBar-Kawin').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-Kawin').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 