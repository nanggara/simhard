$(document).ready(function () {  
		convert_paging_kedudukan("#contentkedudukan"); 
});
function convert_paging_kedudukan(domId){ 
	$("#pagingkedudukan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_kedudukan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_kedudukan(theurl,div){
	$('#progressBar-Kedudukan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-Kedudukan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 