$(document).ready(function () {  
		convert_paging_pasangan("#contentpasangan"); 
});
function convert_paging_pasangan(domId){ 
	$("#pagingpasangan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_pasangan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_pasangan(theurl,div){
	$('#progressBarpasangan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarpasangan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 