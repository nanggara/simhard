$(document).ready(function () {  
		convert_paging_pendidikan("#contentpendidikan"); 
});
function convert_paging_pendidikan(domId){ 
	$("#pagingpendidikan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_pendidikan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_pendidikan(theurl,div){
	$('#progressBarpendidikan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarpendidikan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 