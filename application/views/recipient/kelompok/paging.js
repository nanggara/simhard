$(document).ready(function () {  
		convert_paging("#content"); 
});
function convert_paging(domId){ 
	$("#paging").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url(thisHref,domId);
	    return false;
	});
	});
}
function load_url(theurl,div){
	$('#progressBar-Kelompok').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-Kelompok').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 