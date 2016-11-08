$(document).ready(function () {  
		convert_paging_kerja("#contentkerja"); 
});
function convert_paging_kerja(domId){ 
	$("#pagingkerja").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_kerja(thisHref,domId);
	    return false;
	});
	});
}
function load_url_kerja(theurl,div){
	$('#progressBarkerja').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarkerja').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 