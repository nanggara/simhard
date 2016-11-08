$(document).ready(function () {  
		convert_paging_gajikaryawan("#contentgajikaryawan"); 
});
function convert_paging_gajikaryawan(domId){ 
	$("#paginggajikaryawan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_gajikaryawan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_gajikaryawan(theurl,div){
	$('#progressBargajikaryawan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBargajikaryawan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 