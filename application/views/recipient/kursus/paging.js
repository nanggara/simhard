$(document).ready(function () {  
		convert_paging_kursus("#contentkursus"); 
});
function convert_paging_kursus(domId){ 
	$("#pagingkursus").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_kursus(thisHref,domId);
	    return false;
	});
	});
}
function load_url_kursus(theurl,div){
	$('#progressBarkursus').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarkursus').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 