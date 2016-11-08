$(document).ready(function () {  
		convert_paging_organisasi("#contentorganisasi"); 
});
function convert_paging_organisasi(domId){ 
	$("#pagingorganisasi").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_organisasi(thisHref,domId);
	    return false;
	});
	});
}
function load_url_organisasi(theurl,div){
	$('#progressBarorganisasi').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarorganisasi').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 