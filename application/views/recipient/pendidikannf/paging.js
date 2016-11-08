$(document).ready(function () {  
		convert_paging_pendidikannonformal("#contentpendidikannonformal"); 
});
function convert_paging_pendidikannonformal(domId){ 
	$("#pagingpendidikannonformal").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_pendidikannonformal(thisHref,domId);
	    return false;
	});
	});
}
function load_url_pendidikannonformal(theurl,div){
	$('#progressBarpendidikannonformal').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarpendidikannonformal').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 