$(document).ready(function () {  
		convert_paging_prestasi("#contentprestasi"); 
});
function convert_paging_prestasi(domId){ 
	$("#pagingprestasi").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_prestasi(thisHref,domId);
	    return false;
	});
	});
}
function load_url_prestasi(theurl,div){
	$('#progressBarprestasi').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarprestasi').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
}