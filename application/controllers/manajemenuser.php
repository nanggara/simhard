<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manajemenuser extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 10;
	var $page = 'manajemenuser';
	var $mod_app = 'page_manajemenuser';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_manajemenuser");
		$this->load->model("mdl_kelompok");
		$this->load->model("mdl_institusi");
		$this->load->model("mdl_referensi");
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
		 
		$totalRowsForm = $this->mdl_manajemenuser->form_get_all(true,0,0,"")->num_rows();
		$form_config = $this->config_pagination_all(site_url('manajemenuser/form_pagging'),$totalRowsForm,$this->form_perpage,'form_paging');
		$this->pagination->initialize($form_config);
		$data['form_paging'] =  $this->pagination->create_links();
		$data['dataform'] = $this->mdl_manajemenuser->form_get_all(false,0,$this->form_perpage,""); 
		$data['ddl_datazgrup'] = $this->mdl_manajemenuser->zgrup_select_all(); 
		$this->load->view('manajemenuser/index',$data);
	} 
	public function config_pagination_all($baseurl,$rows,$perpage,$divid){
		$config['base_url'] = $baseurl;
		$config['total_rows'] = $rows;
		$config['per_page'] = $perpage;
		$config['num_links'] = 1;
		$config['full_tag_open'] = '<div id="'.$divid.'" class="btn-group pull-right">';
		$config['full_tag_close'] = '</div>';
			
		$config['cur_tag_open'] = '<div class="btn btn-white  active">';
		$config['cur_tag_close'] = '</div>';
	
		$config['num_tag_open'] = '<div class="btn btn-white">';
		$config['num_tag_close'] = '</div>';
	
		$config['next_link'] = '<i class="fa fa-chevron-right"></i>';
		$config['next_tag_open'] = '<div class="btn btn-white">';
		$config['next_tag_close'] = '</div>';
	
		$config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
		$config['prev_tag_open'] = '<div class="btn btn-white">';
		$config['prev_tag_close'] = '</div>';
	
		$config['last_link'] = '<i class="fa fa-step-forward"></i>';
		$config['last_tag_open'] = '<div class="btn btn-white">';
		$config['last_tag_close'] = '</div>';
	
		$config['first_link'] = '<i class="fa fa-step-backward"></i>';
		$config['first_tag_open'] = '<div class="btn btn-white">';
		$config['first_tag_close'] = '</div>';
		return $config;
	}
	
	public function form_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_search");
		$totalRows = $this->mdl_manajemenuser->form_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('manajemenuser/form_pagging'),$totalRows,$this->form_perpage,'form_paging');
	
		$this->pagination->initialize($config);
		$data['form_paging'] =  $this->pagination->create_links();
	
		$data['dataform'] = $this->mdl_manajemenuser->form_get_all(false,$id,$this->form_perpage,$txt_search);
		$this->load->view('manajemenuser/datatable',$data);
	}
	
	public function form_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_manajemenuser->form_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	
	public function form_delete_row(){
		$kode = $this->input->post("kode");
		
		$rst = $this->mdl_manajemenuser->form_get_byid($kode);
		if($rst->num_rows()){
			$rstdel = $this->mdl_manajemenuser->form_delete($kode,$rst->first_row()->grupid);
			if($rstdel==true){
				echo "Data sudah dihapus!";
			}else{
				echo "Gagal menghapus data, ulangi beberapa saat lagi";
			}
		}else{
			echo "Gagal menghapus data, data tidak ada!";
		}
		 
	} 
	function form_save(){ 
		$id = $this->input->post("txt_userid");
		$grup = $this->input->post("div_grup");
		
		$data['username'] = $this->input->post("txt_namauser");
		$data['password'] = md5($this->input->post("txt_password"));
		$data['email'] = $this->input->post("txt_email");		
		$aff = $this->mdl_manajemenuser->form_save($data,$id);
		if($aff==1){ 
			if($id==""){$id = $this->db->insert_id();}
			
			$this->mdl_manajemenuser->ztrustee_select_all_by($id,$grup);
			
			$response['status'] = true;
			$response['id'] = $id;
			$response['pesan'] = "Data berhasil disimpan";
			echo json_encode($response);
		} 
	} 
	function ganti_background(){
		$this->load->library('upload'); 
		if (!empty($_FILES['fileToUpload']['name']))
		{ 
			$filename = str_replace(" ", "", $_FILES['fileToUpload']['name']);
			$filename = str_replace(":", "", $filename);
			$filename = str_replace("-", "", $filename);
				
			$uploaddir = 'uploads/';
			$uploadfile = $uploaddir . $filename;
				 
			
			if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) { 
				try {
						
					$sql = "update appconfig set isi='".$uploadfile."' where nama='bg'";
					$rst = $this->db->query($sql);
					echo "Sukses Upload";
	
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */