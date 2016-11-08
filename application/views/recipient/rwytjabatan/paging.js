$(document).ready(function () {  
		convert_paging_rwytjabatan("#contentrwytjabatan"); 
});
function convert_paging_rwytjabatan(domId){ 
	$("#pagingrwytjabatan").find("a").each(function(i){
	var thisHref = $(this).attr("href");
	$(this).prop('href','javascript:void(0)');
	$(this).prop('rel',thisHref); 
	$(this).bind('click', function(){
		load_url_rwytjabatan(thisHref,domId);
	    return false;
	});
	});
}
function load_url_rwytjabatan(theurl,div){
	$('#progressBarrwytjabatan').show();
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){
		$('#progressBarrwytjabatan').hide();
	    $(div).html(response);
	},
	dataType:"html"     
	});
	return false;
} 