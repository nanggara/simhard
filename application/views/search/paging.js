
	form_convert_paging("#formcontent"); 

function form_convert_paging(domId){ 
	$("#form_paging").find("a").each(function(i){
		var thisHref = $(this).attr("href");	
		$(this).prop('href','javascript:void(0)');
		$(this).prop('rel',thisHref); 
		$(this).bind('click', function(){
			form_load_url(thisHref,domId);
		    return false;
		}); 
	});
}
function form_load_url(theurl,div){  
	$.ajax({
	url: theurl,
	type: "POST",
    data: $("form").serialize(),
	success: function(response){ 
	    $(div).html(response); 
	    $("#loading_data").hide();
	},
	dataType:"html"     
	});
	return false;
} 