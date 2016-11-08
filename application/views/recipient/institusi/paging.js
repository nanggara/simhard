$(document).ready(function () {  
		convert_paging_institusi("#contentinstitusi"); 
});
function convert_paging_institusi(domId){ 
	$("#institusi_paging").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_institusi(thisHref,domId);
	    return false;
	});
	});
}
function load_url_institusi(theurl,div){
	$('#progressBarinstitusi').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarinstitusi').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 