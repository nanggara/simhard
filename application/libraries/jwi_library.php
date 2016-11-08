<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class jwi_library{
	function ambil_extension_file($namafile){
		$af  = explode(".", $namafile);
		return ".".$af[count($af)-1];
	}
	function fileupload($fileupload,$filename,$uploadpath,$extension) 
	{ 
		$CI =& get_instance();			
		$CI->load->library('upload');
		$CI->load->library('image_lib');
		
		if (!empty($_FILES[$fileupload]['name']))
		{
			$config['upload_path'] = $uploadpath;
			$config['allowed_types'] = "*";
			$config['file_name'] = $filename;
			$path = $uploadpath.$filename;
			$path_thumbs = $uploadpath.'thumbs_'.$filename;
		
			$string = file_exists($path);
			if(strlen($string) > 0){
				unlink($path);
			}
			
			$string_thum = file_exists($path_thumbs);
			if(strlen($string_thum) > 0){
				unlink($path_thumbs);
			}
		
			$CI->upload->initialize($config);
			if ($CI->upload->do_upload($fileupload))
			{ 
				try {
					$data = $CI->upload->data();
					 
					$config2 = array(
							'source_image' => $data['full_path'],
							'new_image' => $path,
							'maintain_ration' => true,
							'width' => 500,
							'height' => 393
					);
					$CI->image_lib->initialize($config2);
					$CI->image_lib->resize();
					$CI->image_lib->clear();
					
					$config3 = array(
							'source_image' => $data['full_path'],
							'new_image' => $path_thumbs, 
							'maintain_ration' => true,
							'width' => 200,
							'height' => 230
					);
					$CI->image_lib->initialize($config3);
					$CI->image_lib->resize();
					$CI->image_lib->clear();
					
					return "OK";
				} catch (Exception $e) {
					return "FAILED";
				} 
			}
			else
			{
				return $CI->upload->display_errors();
			}
		}else{
			return "pilih file Import terlebih dahulu!";
		}
	}
}