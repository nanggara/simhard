$(document).ready(function () {  
		convert_paging_komponengaji("#contentkomponengaji"); 
});
function convert_paging_komponengaji(domId){ 
	$("#pagingkomponengaji").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_komponengaji(thisHref,domId);
	    return false;
	});
	});
}
function load_url_komponengaji(theurl,div){
	$('#progressBar-Komponengaji').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-Komponengaji').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 