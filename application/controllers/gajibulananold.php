<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gajibulanan extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 10;
	var $page = 'gajibulanan';
	var $mod_app = 'page_gajibulanan';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_gajibulanan");
		$this->load->model("mdl_referensi");
		$this->load->model("mdl_auth");
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$userid = $this->session->userdata('userid');
		$trustee = $this->mdl_auth->trustee($userid,$this->mod_app);
		if(strlen($trustee)!=0){
			$data["pesan"] = "Mohon Maaf anda tidak diperkenankan mengakses halaman ini.";
			$this->load->view('deniedpage/index',$data);
			return;
		}
		
		$this->load->library('pagination'); 
		 
		// $totalRowsForm = $this->mdl_manajemenuser->form_get_all(true,0,0,"")->num_rows();
		// $form_config = $this->config_pagination_all(site_url('manajemenuser/form_pagging'),$totalRowsForm,$this->form_perpage,'form_paging');
		// $this->pagination->initialize($form_config);
		$data['form_paging'] =  $this->pagination->create_links();
		$data['dataform'] = $this->mdl_gajibulanan->form_get_all(false,0,$this->form_perpage,""); 
		$this->load->view('gajibulanan/index',$data);
	} 
	public function form_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_search");
		$totalRows = $this->mdl_gajibulanan->form_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('gajibulanan/form_pagging'),$totalRows,$this->form_perpage,'form_paging');
	
		$this->pagination->initialize($config);
		$data['form_paging'] =  $this->pagination->create_links();
	
		$data['dataform'] = $this->mdl_gajibulanan->form_get_all(false,$id,$this->form_perpage,$txt_search);
		$this->load->view('gajibulanan/datatable',$data);
	}
	public function form_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_gajibulanan->form_get_byid($kode);
		if($rst->num_rows()){
			$rstdel = $this->mdl_gajibulanan->form_delete($kode,$rst->first_row()->grupid);
			if($rstdel==true){
				echo "Data sudah dihapus!";
			}else{
				echo "Gagal menghapus data, ulangi beberapa saat lagi";
			}
		}else{
			echo "Gagal menghapus data, data tidak ada!";
		}
		 
	} 
	function form_save()
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */