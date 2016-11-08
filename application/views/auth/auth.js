function login_alert_close(){ 
	$('#alertMsgLogin').attr('class','alert alert-danger alert-dismissable hide');
	$('#alertTextLogin').html('');
}
function login_alert_show(pesan){	
	$('#alertMsgLogin').attr('class','alert alert-danger alert-dismissable');
	$('#alertTextLogin').html(pesan);
}
function on_login(){ 
	var data = $("form").serialize();
	$.ajax({
		type: "POST",
	    url : "<?php echo site_url('auth/do_login/')?>",
	    data: data,
	    success: function(response){ 		 	    	
	    	if(response=='Selamat datang'){
	    		var url = "<?php echo site_url('search');?>"; 
	    		window.location = url;
	    	}else{
	    		login_alert_show(response);  
	    	}
	    }
	});	
} 