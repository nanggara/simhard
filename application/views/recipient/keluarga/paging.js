$(document).ready(function () {  
		convert_paging_keluarga("#contentkeluarga"); 
});
function convert_paging_keluarga(domId){ 
	$("#pagingkeluarga").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_keluarga(thisHref,domId);
	    return false;
	});
	});
}
function load_url_keluarga(theurl,div){
	$('#progressBarkeluarga').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarkeluarga').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 