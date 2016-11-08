$(document).ready(function () {
	convert_paging_template("#contenttemplate"); 
});
function convert_paging_template(domId){ 
	$("#template_paging").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_template(thisHref,domId);
	    return false;
	});
	});
}
function load_url_template(theurl,div){
	$('#progressBar-template').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-template').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 