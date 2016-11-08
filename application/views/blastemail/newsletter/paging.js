$(document).ready(function () {
	convert_paging_newsletter("#contentnewsletter"); 
});
function convert_paging_newsletter(domId){ 
	$("#newsletter_paging").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_newsletter(thisHref,domId);
	    return false;
	});
	});
}
function load_url_newsletter(theurl,div){
	$('#progressBar-newsletter').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-newsletter').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 