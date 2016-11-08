$(document).ready(function () {  
		convert_paging_goldar("#contentgoldar"); 
});
function convert_paging_goldar(domId){ 
	$("#paginggoldar").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_goldar(thisHref,domId);
	    return false;
	});
	});
}
function load_url_goldar(theurl,div){
	$('#progressBar-goldar').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-goldar').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 