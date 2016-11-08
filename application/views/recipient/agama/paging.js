$(document).ready(function () {  
		convert_paging_agama("#contentagama"); 
});
function convert_paging_agama(domId){ 
	$("#pagingagama").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_agama(thisHref,domId);
	    return false;
	});
	});
}
function load_url_agama(theurl,div){
	$('#progressBar-Agama').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-Agama').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 