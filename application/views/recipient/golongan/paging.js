$(document).ready(function () {  
		convert_paging_golongan("#contentgolongan"); 
});
function convert_paging_golongan(domId){ 
	$("#paginggolongan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_golongan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_golongan(theurl,div){
	$('#progressBargolongan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBargolongan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 