$(document).ready(function () {  
		convert_paging_anak("#contentanak"); 
});
function convert_paging_anak(domId){ 
	$("#paginganak").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_anak(thisHref,domId);
	    return false;
	});
	});
}
function load_url_anak(theurl,div){
	$('#progressBaranak').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBaranak').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 