$(document).ready(function () {  
		convert_paging_volunteer("#contentvolunteer"); 
});
function convert_paging_volunteer(domId){ 
	$("#pagingvolunteer").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_volunteer(thisHref,domId);
	    return false;
	});
	});
}
function load_url_volunteer(theurl,div){
	$('#progressBarvolunteer').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarvolunteer').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
}