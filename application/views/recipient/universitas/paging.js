$(document).ready(function () {  
		convert_paging_universitas("#contentuniversitas"); 
});
function convert_paging_universitas(domId){ 
	$("#paginguniversitas").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_universitas(thisHref,domId);
	    return false;
	});
	});
}
function load_url_universitas(theurl,div){
	$('#progressBar-universitas').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-universitas').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 