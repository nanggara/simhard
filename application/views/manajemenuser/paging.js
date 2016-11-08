$(document).ready(function () { 
	form_convert_paging("#formcontent"); 
});
function form_convert_paging(domId){ 
	$("#form_paging").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		form_load_url(thisHref,domId);
	    return false;
	});
	});
}
function form_load_url(theurl,div){
	//$('#progressBar').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		//$('#progressBar').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 