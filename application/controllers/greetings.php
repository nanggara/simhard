<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class greetings extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 10;
	var $page = 'search';
	var $mod_app = 'page_greetings';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_greetings");
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
		 
		$totalRowsForm = $this->mdl_greetings->form_get_all(true,0,0,$this->init_filter())->num_rows();
		$form_config = $this->config_pagination_all(site_url('greetings/form_pagging'),$totalRowsForm,$this->form_perpage,'form_paging');
		$this->pagination->initialize($form_config);
		$data['form_paging'] =  $this->pagination->create_links(); 
		$data['dataform'] = $this->mdl_greetings->form_get_all(false,0,$this->form_perpage,$this->init_filter());
		 
		$data['file_manager'] = $this->file_manager();
		$data['open_folder']  = $this->open_folder();
		
		$this->load->view('greetings/index',$data);
	} 
 
	public function init_filter(){ 
		$filter['txt_search']	   = "";
		return $filter;
	}

	public function form_pagging($id=0)
	{  
		$filter['txt_search']	   = $this->input->post("txt_search");
		 
		$txt_search = $this->input->post("txt_search");
		$totalRows = $this->mdl_greetings->form_get_all(true,0,0,$filter)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('greetings/form_pagging'),$totalRows,$this->form_perpage,'form_paging');	
		$this->pagination->initialize($config);
		$data['form_paging'] =  $this->pagination->create_links(); 
		$data['dataform'] = $this->mdl_greetings->form_get_all(false,$id,$this->form_perpage,$filter); 
		
		$this->load->view('greetings/datatable',$data);
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
		$config['last_tag_open'] = '<div class="btn btn-white">';
		$config['last_tag_close'] = '</div>';
	
		$config['first_link'] = '<i class="fa fa-step-backward"></i>';
		$config['first_tag_open'] = '<div class="btn btn-white">';
		$config['first_tag_close'] = '</div>';
		return $config;
	}
	
	function form_save(){ 
		$id = $this->input->post("txt_regid");
		$data['judul'] = $this->input->post("txt_judul");
		$data['greeting'] = $this->input->post("txt_area");
		$data['fromsender'] = $this->input->post("txt_from");
		$data['bcc_email'] = $this->input->post("txt_bcc");
		$aff = $this->mdl_greetings->form_save($data,$id);
		if($aff==1){ 
			$response['status'] = true;
			$response['id'] = $id;
			$response['pesan'] = "Data berhasil disimpan";
			echo json_encode($response);
		}
	}
	public function form_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_greetings->form_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	public function form_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_greetings->form_delete($kode);
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
					if(strstr($entry, ".thumb")==true){
						$image_path = base_url().$folder_path."/".$entry;
						if(!is_dir($folder_path."/".$entry)){
							$filecontent .= "<div class='col-lg-4' style='padding:10px;' onclick=select_file('".str_replace(".thumb_", "", $entry)."','".$entry."')>
												<a href='javascript:;'>
												<img src='".$image_path."' class='col-lg-10'><br>
												<h6>".substr(str_replace(".thumb_", "", $entry), 0,15)."</h6>
												</a>
											 </div>";
						}
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
		$rst = unlink($foldername_thumb);
	
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
				
			$filepath = "uploads/".$this->input->post("filepath");
			$config['upload_path'] = $filepath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $filename;
			$config['overwrite'] = true;
				
			$path = $filepath."/".$filename;
			$string = file_exists($path);
			if(strlen($string) > 0){
				unlink($path);
			}
	
			$this->upload->initialize($config);
			if ($this->upload->do_upload('fileToUpload'))
			{
				try {
					$data = $this->upload->data();
	
					/*CREATE THUMBS*/
					$config = array(
							'source_image' => $data['full_path'],
							'new_image' => $filepath."/".".thumb_".$filename,
							'maintain_ration' => true,
							'width' => 100,
							'height' => 80
					);
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$this->image_lib->clear();
	
				} catch (Exception $e) {
					echo '[SL01] Caught exception Resize: ',  $e->getMessage(), "\n";
				}
				echo "Upload data sukses";
			}
			else
			{
				echo $this->upload->display_errors();
			}
		}else{
			echo "pilih file!";
		}
	}
	/* FILE MANAGER FUNCTION */
		
	function form_upload(){
		 
		$this->load->library('upload');
		$pesan = "";
		$txt_regid = $this->input->post("txt_regid");
	
		if (!empty($_FILES['fileToUploadPh']['name'])){
			
			$filename = $_FILES['fileToUploadPh']['name']; 
			$filename = str_replace(" ", "", $filename);
			$filename = str_replace(":", "", $filename);
			$filename = str_replace("-", "", $filename);
			
			$config['upload_path'] = 'uploads/files/';
			$config['allowed_types'] = '*';
			$path = 'uploads/files/'.$filename;
			$config['file_name'] = $filename;
			$config['overwrite'] = true;
			$string = file_exists($path);
			if(strlen($string) > 0){
				unlink($path);
			}
				
			$this->upload->initialize($config);
			if ($this->upload->do_upload('fileToUploadPh')){
	
				try {
					$data = $this->upload->data();
					 
					$id = $this->input->post("txt_regid");
					$db['judul'] = $this->input->post("txt_judul");
					$db['greeting'] = $this->input->post("txt_area");
					$db['fromsender'] = $this->input->post("txt_from");
					$db['bcc_email'] = $this->input->post("txt_bcc");
					$db['status'] = $this->input->post("chk_aktif");
					$db['attachment1'] = $filename;
					$aff = $this->mdl_greetings->form_save($db,$id);
					if($aff==1){
						$response['status'] = true;
						$response['id'] = $id;
						$response['pesan'] = "Data berhasil disimpan";
						echo json_encode($response);
					}
					 
				} catch (Exception $e) {
					$pesan .= '[SL01] Caught exception Resize: '.$e->getMessage()." ";
				}
	
			}else{
				$pesan .= $this->upload->display_errors();
			}
		}else{
			$id = $this->input->post("txt_regid");
			$db['judul'] = $this->input->post("txt_judul");
			$db['greeting'] = $this->input->post("txt_area");
			$db['fromsender'] = $this->input->post("txt_from");			
			$db['bcc_email'] = $this->input->post("txt_bcc");
			$db['status'] = $this->input->post("chk_aktif");
			$aff = $this->mdl_greetings->form_save($db,$id);
			if($aff==1){
				$response['status'] = true;
				$response['id'] = $id;
				$response['pesan'] = "Data berhasil disimpan";
				echo json_encode($response);
			}
		}
	}
	
	function sendemail(){
		require_once('assets/library/phpmailer/class.phpmailer.php');
		$mail = new PHPMailer(true);
		$query = "select * from blastemail where status=0";
		$rst = $this->db->query($query);
	
		$issukses = 0;
		$sukses = 0;
		$gagal  = 0;
		foreach($rst->result() as $row){
			$issukses = 0;
			$html='<body style="margin: 10px;">'.$row->email.'</body>';
			$path = FCPATH."uploads/files/".$row->attachment;
				
			try {
				$mail->AddAddress($row->kepada, '');
				$mail->SetFrom('egi@bha.co.id', 'Engging Saripudin');
				$mail->Subject = $row->subjek;
				$mail->AltBody = '';
				$mail->MsgHTML($html);
				if(strlen($row->attachment)>0){
					$mail->AddAttachment($path);
				}
				$mail->Send();
				$issukses = 1;
			} catch (phpmailerException $e) {
				echo $e->errorMessage();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			if($issukses==1){
				$sukses++;
				$data["status"] = 1;
				$this->db->where('kodeemail', $row->kodeemail);
				$this->db->update('blastemail', $data);
			}else{
				$gagal++;
				$data["status"] = 2;
				$this->db->where('kodeemail', $row->kodeemail);
				$this->db->update('blastemail', $data);
			}
		}
	
		$suksesmsg = "";
		$gagalmsg  = "";
		if($sukses>0){
			$suksesmsg = "Email Terkirim sebanyak ".$sukses;
		}
		if($gagal>0){
			$gagalmsg = "Email Gagal dikirim sebanyak ".$gagal;
		}
		return $suksesmsg." ".$gagalmsg;
	
	}
	function sendgreeting(){

		$qg = "SELECT * FROM  greetings ";
		$rstg = $this->db->query($qg);
		$status = $rstg->first_row()->status;
		if($status==0){
			echo "Status Greetings OFF";
			return;
		}
		
		$tgl = date ('m-d');
		$query = "SELECT r.*,e.email 
				FROM recipient r
				inner join daftaremail e on e.regid=r.regidrec  
				WHERE DATE_FORMAT(r.tanggallahir,'%m-%d') =  '".$tgl."'
				order by e.urut asc limit 0,1";
		$rst = $this->db->query($query);
		if($rst->num_rows()){
			$queryc = "select * from ultah where regidrec=".$rst->first_row()->regidrec." 
						and DATE_FORMAT(tanggallahir,'%Y-%m-%d')='".date("Y-m-d")."'";
			$rstc = $this->db->query($queryc);
			if($rstc->num_rows()==0){
				$tahun = (int)date('Y');
				$lahir = (int)date('Y',strtotime($rst->first_row()->tanggallahir));
				$selisih = $tahun-$lahir;
				 
				$judul = $rstg->first_row()->judul;
				$bcc = $rstg->first_row()->bcc_email;
				$attach = $rstg->first_row()->attachment1;
				 
				$pesan = $rstg->first_row()->greeting;
				$pesan = str_replace("{nama}", $rst->first_row()->namalengkap, $pesan);
				$pesan = str_replace("{tahun}", $selisih, $pesan);
				
				$sql_blast = " insert into blastemail(tanggal,kepada,subjek,email,status,attachment)
						    values('".date("Y-m-d H:i")."','".$rst->first_row()->email."','".$judul."','".$pesan."',0,'".$attach."')";
				$this->db->query($sql_blast);
				
				$sql_blast = " insert into blastemail(tanggal,kepada,subjek,email,status,attachment)
						    values('".date("Y-m-d H:i")."','".$bcc."','".$judul."','".$pesan."',0,'".$attach."')";
				$this->db->query($sql_blast);
				
				$sqli="insert into ultah(regidrec,tanggallahir) values(".$rst->first_row()->regidrec.",'".date("Y-m-d")."')";
				$this->db->query($sqli);
				
				echo $this->sendemail();
			}						
		}else{
			echo "Tidak ada yang ultah";
		}
	}
	
	
}
 