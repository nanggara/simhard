$(document).ready(function () {  
		convert_paging_jabatan("#contentjabatan"); 
});
function convert_paging_jabatan(domId){ 
	$("#pagingjabatan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_jabatan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_jabatan(theurl,div){
	$('#progressBar-jabatan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBar-jabatan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 