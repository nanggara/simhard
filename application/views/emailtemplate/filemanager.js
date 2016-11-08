/*!
 * FileManager.Js Library v1.0.0
 * http://jasawebid.com/
 * Copyright 2013 www.JasaWebId.com
 * 
 * Released under the MIT license
 * Do not use without our permissions  
 * Date: 2013-11-25
*/ 
var gfolder = '';
var gimage_path = '';
var gimage_path_thumb = '';
 
$('#btn_pilih').hide();
$('#btn_hapus').hide();
$('#file_loading').hide();
$('#alert_filemanager').hide();

function alertbox_file(state,type,message){
	$('body').removeClass('modal-open'); 	 
	$('#alert_filemanager').attr('class','alert alert-'+type);
	if(state){
		$('#alert_filemanager').show();
		$('#lbl_modal_alert').html(message);
	}else{
		$('#alert_filemanager').hide();
		$('#lbl_modal_alert').html('');
	}
} 
function select_folder(folder){
	$('#file_loading').show();
	$('#btn_pilih').hide();
	$('#btn_hapus').hide();
	gfolder = folder;
	$('#address').html("<li><a href='#'>Uploads</a></li><li><a href='#'>"+folder+"</a></li>");	
	$.ajax({	
		type: 'post',
		cache: false,
		url: "<?php echo  site_url('emailtemplate/file_manager');?>", 
		data: "path="+folder,
		success: function(res) 
		{  
			 $('#file_list').html(res);
			 $('#file_loading').hide(); 
		}
	});
}
function select_file(filename,thumb){ 
	$('#address').html("<li><a href='#'>Uploads</a></li><li><a href='#'>"+gfolder+"</a></li><li><a href='#'>"+filename+"</a></li>");
	gimage_path = 'uploads/'+gfolder+"/"+filename;
	gimage_path_thumb = 'uploads/'+gfolder+"/"+thumb;
	$('#btn_pilih').show();
	$('#btn_hapus').show();
}
function new_folder(){
	$('#file_loading').show();
	$.ajax({	
		type: 'post',
		cache: false,
		url: "<?php echo  site_url('emailtemplate/new_folder');?>", 
		data: "foldername="+$('#input_newfolder').val(),
		success: function(res) 
		{  
			 if(res==1){
				 open_folder();
				 $('#file_loading').hide();
			 }
		}
	});
}
function open_folder(){ 
	$.ajax({	
		type: 'post',
		cache: false,
		url: "<?php echo  site_url('emailtemplate/open_folder');?>", 
		data: "request=open",
		success: function(res) 
		{  
			 $('#folder_list').html(res);
			 $('#input_newfolder').val('');
		}
	});
}
function delete_folder(){
	$('#file_loading').show();
	$.ajax({	
		type: 'post',
		cache: false,
		url: "<?php echo  site_url('emailtemplate/delete_folder');?>", 
		data: "foldername="+gfolder,
		success: function(res) 
		{   
			 if(res==1){
				 open_folder();
				 alertbox_file(true,'success','Folder telah dihapus!');
			 }else{ 
				 alertbox_file(true,'danger','Gagal menghapus Folder, Mungkin Folder berisi file');
			 }
			 $('#file_loading').hide();
		}
	}); 
}
function delete_file(){
	$('#file_loading').show();
	$.ajax({	
		type: 'post',
		cache: false,
		url: "<?php echo  site_url('emailtemplate/delete_file');?>", 
		data: "foldername="+gimage_path+"&foldername_thumb="+gimage_path_thumb,
		success: function(res) 
		{   			
			 if(res==1){
				 alertbox_file(true,'success','File telah dihapus!');
				 select_folder(gfolder);
			 }else{ 
				 alertbox_file(true,'danger','Gagal menghapus File');
			 }
			 $('#file_loading').hide();
		}
	}); 
}
function on_insert_image(){				         
  	 tinyMCE.execCommand('mceInsertContent',false,'<img style="float:left;padding-right:10px;padding-bottom:10px;" src="<?php echo base_url();?>'+gimage_path+'">');
  	 $('#ModalFileManager').modal('hide');
}

function uploadFile() {
	$('#file_loading').show(); 
    var fd = new FormData();
    fd.append("fileToUpload", document.getElementById('fileToUpload').files[0]);
    fd.append("filepath", gfolder);
    var xhr = new XMLHttpRequest();
    xhr.upload.addEventListener("progress", uploadProgress, false);
    xhr.addEventListener("load", uploadComplete, false);
    xhr.addEventListener("error", uploadFailed, false); 
    xhr.open("POST", "<?php echo site_url('emailtemplate/upload_file/')?>");
    xhr.send(fd); 
}
function uploadProgress(evt) {
	$('#file_loading').show();
}
function uploadComplete(evt) {   
	alertbox_file(true,'success',evt.target.responseText); 
	select_folder(gfolder);
	$('#file_loading').hide();
} 
function uploadFailed(evt) {   
	alertbox_file(true,'danger',evt.target.responseText);   
} 
