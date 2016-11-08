$(document).ready(function () {  
		convert_paging_penghargaan("#contentpenghargaan"); 
});
function convert_paging_penghargaan(domId){ 
	$("#pagingpenghargaan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_penghargaan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_penghargaan(theurl,div){
	$('#progressBarpenghargaan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarpenghargaan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 