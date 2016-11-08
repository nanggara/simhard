<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class emailtemplate extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 10;
	var $page = 'search';
	var $mod_app = 'page_emailtemplate';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_emailtemplate");
		$this->load->model("mdl_auth");
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$userid = $this->session->userdata('userid');
		$trustee = $this->mdl_auth->trustee($userid,$this->mod_app);
		if(strlen($trustee)==0){
			$data["pesan"] = "Mohon Maaf anda tidak diperkenankan mengakses halaman ini.";
			$this->load->view('deniedpage/index',$data);
			return;
		}
		
		$this->load->library('pagination');
		 
		$totalRowsForm = $this->mdl_emailtemplate->form_get_all(true,0,0,$this->init_filter())->num_rows();
		$form_config = $this->config_pagination_all(site_url('emailtemplate/form_pagging'),$totalRowsForm,$this->form_perpage,'form_paging');
		$this->pagination->initialize($form_config);
		$data['form_paging'] =  $this->pagination->create_links(); 
		$data['dataform'] = $this->mdl_emailtemplate->form_get_all(false,0,$this->form_perpage,$this->init_filter());
		
		$data['file_manager'] = $this->file_manager();
		$data['open_folder']  = $this->open_folder();
		
		$this->load->view('emailtemplate/index',$data);
	} 
 
	public function init_filter(){ 
		$filter['txt_search']	   = "";
		return $filter;
	}

	public function form_pagging($id=0)
	{  
		$filter['txt_search']	   = $this->input->post("txt_search");
		 
		$txt_search = $this->input->post("txt_search");
		$totalRows = $this->mdl_emailtemplate->form_get_all(true,0,0,$filter)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('emailtemplate/form_pagging'),$totalRows,$this->form_perpage,'form_paging');	
		$this->pagination->initialize($config);
		$data['form_paging'] =  $this->pagination->create_links(); 
		$data['dataform'] = $this->mdl_emailtemplate->form_get_all(false,$id,$this->form_perpage,$filter); 
		
		$this->load->view('emailtemplate/datatable',$data);
	}
	
	public function config_pagination_all($baseurl,$rows,$perpage,$divid){
		$config['base_url'] = $baseurl;
		$config['total_rows'] = $rows;
		$config['per_page'] = $perpage;
		$config['num_links'] = 1;
		$config['full_tag_open'] = '<div id="'.$divid.'" class="btn-group">';
		$config['full_tag_close'] = '</div>';
			
		$config['cur_tag_open'] = '<div class="btn btn-white  active">';
		$config['cur_tag_close'] = '</div>';
	
		$config['num_tag_open'] = '<div class="btn btn-white">';
		$config['num_tag_close'] = '</div>';
	
		$config['next_link'] = '<i class="fa fa-chevron-right"></i>';
		$config['next_tag_open'] = '<div class="btn btn-white" style="padding:9px;">';
		$config['next_tag_close'] = '</div>';
	
		$config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
		$config['prev_tag_open'] = '<div class="btn btn-white" style="padding:9px;">';
		$config['prev_tag_close'] = '</div>';
	
		$config['last_link'] = '<i class="fa fa-step-forward"></i>';
		$config['last_tag_open'] = '<div class="btn btn-white" style="padding:9px;">';
		$config['last_tag_close'] = '</div>';
	
		$config['first_link'] = '<i class="fa fa-step-backward"></i>';
		$config['first_tag_open'] = '<div class="btn btn-white" style="padding:9px;">';
		$config['first_tag_close'] = '</div>';
		return $config;
	}
	
	function form_save(){ 
		$id = $this->input->post("txt_regid");
		$data['judul'] = $this->input->post("txt_judul");
		$data['template'] = $this->input->post("txt_area"); 
		$aff = $this->mdl_emailtemplate->form_save($data,$id);
		if($aff==1){ 
			$response['status'] = true;
			$response['id'] = $id;
			$response['pesan'] = "Data berhasil disimpan";
			echo json_encode($response);
		}
	}
	public function form_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_emailtemplate->form_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	public function form_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_emailtemplate->form_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	
	
	/* FILE MANAGER FUNCTION */
	function file_manager(){
		$path = $this->input->post("path");
		if(strlen($path)==0){
			$path = 'uploads';
		}else{
			$path = 'uploads/'.$path;
		}
		$filecontent = '';
		$server_path = "./";
		$folder_path = $path;
		if ($handle = opendir($server_path.$folder_path)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					
					if(preg_match("/.thumb/i", $entry)){ 
						$image_path = base_url().$folder_path."/".$entry;
						if(!is_dir($folder_path."/".$entry)){
							if(!preg_match("/.mp4/i", $entry)){
								$filecontent .= "<div class='col-lg-4' style='padding:10px;' onclick=select_file('".str_replace(".thumb_", "", $entry)."','".$entry."')>
													<a href='javascript:;'>
													<img src='".$image_path."' class='col-lg-10'><br>
													<h6>".substr(str_replace(".thumb_", "", $entry), 0,15)."</h6>
													</a>
												 </div>";
							}
						}
					}else if(preg_match("/.mp4/i", $entry)){
						$filecontent .= "<div class='col-lg-4' style='padding:10px;' onclick=select_file('".str_replace(".thumb_", "", $entry)."','.thumb_".$entry.".jpg')>
												<a href='javascript:;'>
												<img src='".base_url()."assets/images/video.png' class='col-lg-10'><br>
												<h6>".substr(str_replace(".thumb_", "", $entry), 0,15)."</h6>
												</a>
										</div>";
					}
					
				}
			}
			closedir($handle);
		}
		echo $filecontent;
	}
	function open_folder(){
		$folders = '';
		$server_path = "./";
		$folder_path = 'uploads';
		if ($handle = opendir($server_path.$folder_path)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					$image_path = base_url().$folder_path."/".$entry;
					if($entry=="cv" || $entry=="photo"){
						
					}else{
						$folders .= "<a href='javascript:;' onclick=select_folder('".$entry."')>
									  <p><img src='".base_url()."assets/images/folder.png'>&nbsp;".substr($entry, 0,15)."</p>
									 </a>";
					}
				}
			}
			closedir($handle);
		}
		$request = $this->input->post("request");
		if(strlen($request)==0){
			return $folders;
		}else{
			echo $folders;
		}
	}
	function delete_folder(){
		$foldername = $this->input->post("foldername");
		$rst = rmdir('uploads/'.$foldername);
		echo $rst;
	}
	function delete_file(){
		$foldername = $this->input->post("foldername");
		$foldername_thumb = $this->input->post("foldername_thumb");
	 
		$rst = unlink($foldername);
		if(strstr($foldername, ".mp4")==false){
			$rst = unlink($foldername_thumb);
		}
	
		echo $rst;
	}
	function new_folder(){
		$foldername = $this->input->post("foldername");
		$rst = mkdir('uploads/'.$foldername, 0744);
		echo $rst;
	}
	function upload_file(){
		$this->load->library('upload');
		$this->load->library('image_lib');
	 
		if (!empty($_FILES['fileToUpload']['name']))
		{

			$filename = str_replace(" ", "", $_FILES['fileToUpload']['name']);
			$filename = str_replace(":", "", $filename);
			$filename = str_replace("-", "", $filename);
			
			$uploaddir = 'uploads/'.$this->input->post("filepath")."/"; 
			$uploadfile = $uploaddir . $filename;
			
			if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
				//chmod($uploadfile, 0755);
				try { 
					
					if(strstr($filename, ".mp4")){ 
						$video = $_SERVER["DOCUMENT_ROOT"]."/rnd/".$uploadfile;
						$thumbnail = $_SERVER["DOCUMENT_ROOT"]."/rnd/".$uploaddir.".thumb_".$filename.'.jpg';
					    exec('ffmpeg -i '.$video.' -deinterlace -an -ss 1 -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg '.$thumbnail.' 2>&1');
					}else{					
						$config = array(
								'source_image' => $uploadfile,
								'new_image' => $uploaddir."/".".thumb_".$filename,
								'maintain_ration' => true,
								'width' => 100,
								'height' => 80
						);
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
						$this->image_lib->clear();
					}
				
				} catch (Exception $e) {
					echo '[SL01] Caught exception Resize: ',  $e->getMessage(), "\n";
				}
				echo "Sukses Upload file";
			} else {
				echo "Possible file upload attack!\n";
			} 
		}else{
			echo "pilih file!";
		}
	}
	/* FILE MANAGER FUNCTION */
}
 