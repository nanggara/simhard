$(document).ready(function () {  
		convert_paging_instansi("#contentinstansi"); 
});
function convert_paging_instansi(domId){ 
	$("#paginginstansi").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_instansi(thisHref,domId);
	    return false;
	});
	});
}
function load_url_instansi(theurl,div){
	$('#progressBar-instansi').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-instansi').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 