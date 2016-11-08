$(document).ready(function () {  
		convert_paging_orangtua("#contentorangtua"); 
});
function convert_paging_orangtua(domId){ 
	$("#pagingorangtua").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_orangtua(thisHref,domId);
	    return false;
	});
	});
}
function load_url_orangtua(theurl,div){
	$('#progressBarorangtua').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarorangtua').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 