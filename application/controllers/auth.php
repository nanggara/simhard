<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {
  
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_auth");
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{ 
		$data['web_title']  = "Aplikasi";
		$this->load->view('auth/index',$data);
	}
	
	function do_login(){
		$username  = $this->input->post("txt_username");
		$password  = $this->input->post("txt_password");
	
		$datalogin = $this->mdl_auth->login_user($username,$password);
		$loginid   = '';
		$loginuser = '';
		$namagrup  = '';
		foreach($datalogin->result() as $row){
			$loginid   = $row->userid;
			$loginuser = $row->username;
			$namagrup  = $row->namagrup;
		}
		if(strlen($loginuser)>0){
			$arrlogin = array(
					"username" => $loginuser,
					"userid" => $loginid,
					"namagrup" => $namagrup
			);
			$this->session->set_userdata($arrlogin);
			echo "Selamat datang";
		}else{
			echo "Gagal melakukan login!. Pastikan Nama User dan Password anda benar!";
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url("auth"));
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */