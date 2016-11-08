<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class recipient extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 20;
	var $page = 'recipient';
	var $mod_app = 'page_recipient';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_recipient");
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
		
		$totalRows = $this->mdl_kelompok->kelompok_get_all(true,0,0,"",$this->page)->num_rows();		
		$config = $this->config_pagination_all(site_url('recipient/kelompok_pagging'),$totalRows,$this->perpage,'paging');		  
		$this->pagination->initialize($config);  
		$data['paging'] =  $this->pagination->create_links();
		$data['datakelompok'] = $this->mdl_kelompok->kelompok_get_all(false,0,$this->perpage,"",$this->page);
		$data['ddl_datakelompok'] = $this->mdl_kelompok->kelompok_select_all($this->page);
		
		$totalRowsAgama = $this->mdl_referensi->agama_get_all(true,0,0,"")->num_rows();
		$config_agama = $this->config_pagination_all(site_url('recipient/agama_pagging'),$totalRowsAgama,$this->perpage,'pagingagama');
		$this->pagination->initialize($config_agama);
		$data['pagingagama'] =  $this->pagination->create_links();
		$data['dataagama'] = $this->mdl_referensi->agama_get_all(false,0,$this->perpage,"");
		$data['ddl_dataagama'] = $this->mdl_referensi->agama_select_all();
		
		$totalRowsInstitusi = $this->mdl_institusi->institusi_get_all(true,0,0,"")->num_rows();
		$config_institusi = $this->config_pagination_all(site_url('recipient/institusi_pagging'),$totalRowsInstitusi,$this->perpage,'institusi_paging');
		$this->pagination->initialize($config_institusi);
		$data['institusi_paging'] =  $this->pagination->create_links();
		$data['datainstitusi'] = $this->mdl_institusi->institusi_get_all(false,0,$this->perpage,"");
		$data['ddl_datainstitusi'] = $this->mdl_institusi->institusi_select_all();
		
		$totalRowsUniversitas = $this->mdl_referensi->universitas_get_all(true,0,0,"")->num_rows();
		$config_agama = $this->config_pagination_all(site_url('recipient/universitas_pagging'),$totalRowsUniversitas,$this->perpage,'paginguniversitas');
		$this->pagination->initialize($config_agama);
		$data['paginguniversitas'] =  $this->pagination->create_links();
		$data['datauniversitas'] = $this->mdl_referensi->universitas_get_all(false,0,$this->perpage,"");
		$data['ddl_datauniversitas'] = $this->mdl_referensi->universitas_select_all();
		
		$totalRowsJenjang = $this->mdl_referensi->jenjang_get_all(true,0,0,"")->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/jenjang_pagging'),$totalRowsJenjang,$this->perpage,'pagingjenjang');
		$this->pagination->initialize($config);
		$data['pagingjenjang'] =  $this->pagination->create_links();
		$data['datajenjang'] = $this->mdl_referensi->jenjang_get_all(false,0,$this->perpage,"");
		$data['ddl_datajenjang'] = $this->mdl_referensi->jenjang_select_all();
		
		$totalRowsPekerjaan = $this->mdl_referensi->pekerjaan_get_all(true,0,0,"")->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/pekerjaan_pagging'),$totalRowsPekerjaan,$this->perpage,'pagingpekerjaan');
		$this->pagination->initialize($config);
		$data['pagingpekerjaan'] =  $this->pagination->create_links();
		$data['datapekerjaan'] = $this->mdl_referensi->pekerjaan_get_all(false,0,$this->perpage,"");
		$data['ddl_datapekerjaan'] = $this->mdl_referensi->pekerjaan_select_all();
		
		$totalRowsInstansi = $this->mdl_referensi->instansi_get_all(true,0,0,"")->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/universitas_pagging'),$totalRowsInstansi,$this->perpage,'paginginstansi');
		$this->pagination->initialize($config);
		$data['paginginstansi'] =  $this->pagination->create_links();
		$data['datainstansi'] = $this->mdl_referensi->instansi_get_all(false,0,$this->perpage,"");
		$data['ddl_datainstansi'] = $this->mdl_referensi->instansi_select_all();
		
		$totalRowsKeluarga = $this->mdl_referensi->keluarga_get_all(true,0,0,"",0)->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/universitas_pagging'),$totalRowsKeluarga,$this->perpage,'pagingkeluarga');
		$this->pagination->initialize($config);
		$data['pagingkeluarga'] =  $this->pagination->create_links();
		$data['datakeluarga'] = $this->mdl_referensi->keluarga_get_all(false,0,$this->perpage,"",0);
		$data['ddl_datakeluarga'] = $this->mdl_referensi->keluarga_get_byanggota(0);
 
		$totalRowsPendidikan = $this->mdl_referensi->pendidikan_get_all(true,0,0,"",0)->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/pendidikan_pagging'),$totalRowsPendidikan,$this->perpage,'pagingpendidikan');
		$this->pagination->initialize($config);
		$data['pagingpendidikan'] =  $this->pagination->create_links();
		$data['datapendidikan'] = $this->mdl_referensi->pendidikan_get_all(false,0,$this->perpage,"",0);
		$data['ddl_datapendidikan'] = $this->mdl_referensi->pendidikan_get_byanggota(0);
		
		$totalRows = $this->mdl_referensi->pendidikannonformal_get_all(true,0,0,"",0)->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/pendidikannonformal_pagging'),$totalRows,$this->perpage,'pagingpendidikannonformal');
		$this->pagination->initialize($config);
		$data['pagingpendidikannonformal'] =  $this->pagination->create_links();
		$data['datapendidikannonformal'] = $this->mdl_referensi->pendidikannonformal_get_all(false,0,$this->perpage,"",0);
		$data['ddl_datapendidikannonformal'] = $this->mdl_referensi->pendidikannonformal_get_byanggota(0);
		
		$totalRows = $this->mdl_referensi->organisasi_get_all(true,0,0,"",0)->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/organisasi_pagging'),$totalRows,$this->perpage,'pagingorganisasi');
		$this->pagination->initialize($config);
		$data['pagingorganisasi'] =  $this->pagination->create_links();
		$data['dataorganisasi'] = $this->mdl_referensi->organisasi_get_all(false,0,$this->perpage,"",0);
		$data['ddl_dataorganisasi'] = $this->mdl_referensi->organisasi_get_byanggota(0);
		
		$totalRows = $this->mdl_referensi->kerja_get_all(true,0,0,"",0)->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/kerja_pagging'),$totalRows,$this->perpage,'pagingkerja');
		$this->pagination->initialize($config);
		$data['pagingkerja'] =  $this->pagination->create_links();
		$data['datakerja'] = $this->mdl_referensi->kerja_get_all(false,0,$this->perpage,"",0);
		$data['ddl_datakerja'] = $this->mdl_referensi->kerja_get_byanggota(0);
		
		$totalRows = $this->mdl_referensi->volunteer_get_all(true,0,0,"",0)->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/volunteer_pagging'),$totalRows,$this->perpage,'pagingvolunteer');
		$this->pagination->initialize($config);
		$data['pagingvolunteer'] =  $this->pagination->create_links();
		$data['datavolunteer'] = $this->mdl_referensi->volunteer_get_all(false,0,$this->perpage,"",0);
		$data['ddl_datavolunteer'] = $this->mdl_referensi->volunteer_get_byanggota(0);
		
		$totalRows = $this->mdl_referensi->prestasi_get_all(true,0,0,"",0)->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/prestasi_pagging'),$totalRows,$this->perpage,'pagingprestasi');
		$this->pagination->initialize($config);
		$data['pagingprestasi'] =  $this->pagination->create_links();
		$data['dataprestasi'] = $this->mdl_referensi->prestasi_get_all(false,0,$this->perpage,"",0);
		$data['ddl_dataprestasi'] = $this->mdl_referensi->prestasi_get_byanggota(0);
		
		$totalRowsForm = $this->mdl_recipient->form_get_all(true,0,0,"")->num_rows();
		$form_config = $this->config_pagination_all(site_url('recipient/form_pagging'),$totalRowsForm,$this->form_perpage,'form_paging');
		$this->pagination->initialize($form_config);
		$data['form_paging'] =  $this->pagination->create_links();
		$data['dataform'] = $this->mdl_recipient->form_get_all(false,0,$this->form_perpage,"");
		
		if (isset($_GET['idmembership'])) {
			$data['regidrec']   = $_GET['idmembership'];
		}else{
			$data['regidrec']   = "";
		}
		
		$this->load->view('recipient/index',$data);
	}
	
	/****************************************INSTITUSI************************************/
	public function institusi_save(){
		$kode  = $this->input->post("txt_kodeinstitusi");
		$data['institusi'] = $this->input->post("txt_institusimodal");
		$data['alamat'] = $this->input->post("txt_alamatinstitusimodal");
		$rst = $this->mdl_institusi->institusi_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf Institusi tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	} 
	public function institusi_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_searchinstitusi");
		$totalRows = $this->mdl_institusi->institusi_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/institusi_pagging'),$totalRows,$this->perpage,'institusi_paging');
	
		$this->pagination->initialize($config);
		$data['institusi_paging'] =  $this->pagination->create_links();
	
		$data['datainstitusi'] = $this->mdl_institusi->institusi_get_all(false,$id,$this->perpage,$txt_search);
		$this->load->view('recipient/institusi/datatable',$data);
	}
	public function institusi_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_institusi->institusi_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	public function institusi_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_institusi->institusi_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	public function form_get_institusi(){
		$institusi = '<option value="0">Pilih Institusi</option>';
		$ddl_datainstitusi= $this->mdl_institusi->institusi_select_all();
		foreach($ddl_datainstitusi->result() as $kelIns) {
			$institusi .= '<option value="'.$kelIns->kodeinstitusi.'">'.$kelIns->institusi.'</option>';
		}
		echo $institusi;
	}
	public function form_institusi_change(){
		$institusi = '';
		$ddl_datainstitusi= $this->mdl_institusi->institusi_get_byid($this->input->post("kode"));
		if($ddl_datainstitusi->num_rows()){
			$institusi = $ddl_datainstitusi->first_row()->alamat;
		} 
		echo $institusi;
	}
	/****************************************END INSTITUSI************************************/
	
	/****************************************KELOMPOK*****************************************/
	public function kelompok_save(){
		$kode  = $this->input->post("txt_kode");
		$data['kelompok'] = $this->input->post("txt_kelompokmodal");
		$data['singkatan'] = $this->input->post("txt_kelompoksingkatan");
		$data['page']=$this->page;
		$rst = $this->mdl_kelompok->kelompok_save($data,$kode,$this->page);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf kelompok tersebut sudah terdaftar";
			echo json_encode($response); 
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response); 
		}
	}
	public function kelompok_pagging($id=0)
	{	
		$txt_search = $this->input->post("txt_search-kelompok"); 
		$totalRows = $this->mdl_kelompok->kelompok_get_all(true,0,0,$txt_search,$this->page)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/kelompok_pagging'),$totalRows,$this->perpage,'paging');
		
		$this->pagination->initialize($config);
		$data['paging'] =  $this->pagination->create_links();
		
		$data['datakelompok'] = $this->mdl_kelompok->kelompok_get_all(false,$id,$this->perpage,$txt_search,$this->page);
		$this->load->view('recipient/kelompok/datatable',$data);
	} 
	public function kelompok_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_kelompok->kelompok_get_byid($kode,$this->page);
		echo json_encode($rst->first_row()); 
	} 
	public function kelompok_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_kelompok->kelompok_delete($kode,$this->page);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	public function form_get_kelompok(){
		$kelompok = '<option value="0">Pilih Kelompok</option>';
		$ddl_datakelompok= $this->mdl_kelompok->kelompok_select_all($this->page);
		foreach($ddl_datakelompok->result() as $kelRow) {
			$kelompok .= '<option value="'.$kelRow->kodekelompok.'">'.$kelRow->kelompok.'</option>';
		} 
		echo $kelompok;
	}
	/****************************************END KELOMPOK************************************/
	
	/****************************************AGAMA*****************************************/
	public function agama_save(){
		$kode  = $this->input->post("txt_kodeagama");
		$data['agama'] = $this->input->post("txt_agamamodal");		
		$rst = $this->mdl_referensi->agama_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf Agama tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function agama_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_search-agama");
		$totalRows = $this->mdl_referensi->agama_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/agama_pagging'),$totalRows,$this->perpage,'pagingagama');
	
		$this->pagination->initialize($config);
		$data['pagingagama'] =  $this->pagination->create_links();
	
		$data['dataagama'] = $this->mdl_referensi->agama_get_all(false,$id,$this->perpage,$txt_search);
		$this->load->view('recipient/agama/datatable',$data);
	}
	public function agama_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->agama_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	public function agama_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->agama_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	public function form_get_agama(){
		$agama = '<option value="0">Pilih Agama</option>';
		$ddl_dataagama= $this->mdl_referensi->agama_select_all();
		foreach($ddl_dataagama->result() as $kelRow) {
			$agama .= '<option value="'.$kelRow->kodeagama.'">'.$kelRow->agama.'</option>';
		}
		echo $agama;
	}
	/****************************************END AGAMA************************************/
	
	/****************************************UNIVERSITAS*****************************************/
	public function universitas_save(){		
		$kode  = $this->input->post("txt_kodeuniversitas");
	    $singkatan = $this->input->post("txt_universitassingkatan");
	    $data['universitas'] = $this->input->post("txt_universitasmodal");
	    $data['singkatan'] = $singkatan;
	   
	    if(isset($_FILES["fileToUploadUni"])){
		    $target_dir = "uploads/photo/universitas/";
		    $imageFileType = pathinfo($target_dir.basename($_FILES["fileToUploadUni"]["name"]),PATHINFO_EXTENSION);
		    $filename    = $singkatan.".".$imageFileType;
		    $target_file = $target_dir.$filename;
		    $data['photo']    = $target_file;		   
	    }
	    
	    $rst = $this->mdl_referensi->universitas_save($data,$kode);
	    if($rst==""){
	    	$response["success"] = FALSE;
	    	$response["message"] = "Maaf Universitas tersebut sudah terdaftar";
	    	echo json_encode($response);
	    }else{
			
	    	$pesanupload = "";	    		    
	    	if(isset($_FILES["fileToUploadUni"])){
		    	if (file_exists($target_file)) {
		    		unlink($target_file);
		    	}
		    	if ($_FILES["fileToUploadUni"]["size"] > 500000) {
		    		$pesanupload . "Maaf ukuran file terlalu besar.";	    		
		    	}else{
			    	if (move_uploaded_file($_FILES["fileToUploadUni"]["tmp_name"], $target_file)) {
			    		$pesanupload .=  "Photo disimpan ";
			    	} else {
			    		$pesanupload .= "Maaf tidak dapat melakukan upload photo, ulangi lagi.";
			    	}
		    	}
	    	}
	    	
	    	$response["success"] = true;
	    	$response["message"] = "Berhasil, data telah disimpan.".$pesanupload;
	    	echo json_encode($response);
	    }
	    
		
		 
	}
	public function universitas_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_search-universitas");
		$totalRows = $this->mdl_referensi->universitas_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/universitas_pagging'),$totalRows,$this->perpage,'paginguniversitas');
	
		$this->pagination->initialize($config);
		$data['paginguniversitas'] =  $this->pagination->create_links();
	
		$data['datauniversitas'] = $this->mdl_referensi->universitas_get_all(false,$id,$this->perpage,$txt_search);
		$this->load->view('recipient/universitas/datatable',$data);
	}
	public function universitas_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->universitas_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	public function universitas_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->universitas_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	public function form_get_universitas(){
		$universitas = '<option value="0">Pilih Universitas</option>';
		$ddl_datauniversitas= $this->mdl_referensi->universitas_select_all();
		foreach($ddl_datauniversitas->result() as $kelRow) {
			$universitas .= '<option value="'.$kelRow->kodeuniversitas.'">'.$kelRow->universitas.'</option>';
		}
		echo $universitas;
	}
	/****************************************END UNIVERSITAS************************************/
	
	/****************************************JENJANG*****************************************/
	public function jenjang_save(){
		$kode  = $this->input->post("txt_kodejenjang");
		$data['jenjang'] = $this->input->post("txt_jenjangmodal");		
		$rst = $this->mdl_referensi->jenjang_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf Jenjang tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function jenjang_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_search-jenjang");
		$totalRows = $this->mdl_referensi->jenjang_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/jenjang_pagging'),$totalRows,$this->perpage,'pagingjenjang');
	
		$this->pagination->initialize($config);
		$data['pagingjenjang'] =  $this->pagination->create_links();
	
		$data['datajenjang'] = $this->mdl_referensi->jenjang_get_all(false,$id,$this->perpage,$txt_search);
		$this->load->view('recipient/jenjang/datatable',$data);
	}
	public function jenjang_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->jenjang_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	public function jenjang_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->jenjang_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	public function form_get_jenjang(){
		$jenjang = "";
		$ddl_datajenjang= $this->mdl_referensi->jenjang_select_all();
		foreach($ddl_datajenjang->result() as $Row) {
			$jenjang .= '<option value="'.$Row->kodejenjang.'">'.$Row->jenjang.'</option>';
		}
		echo $jenjang;
	}
	/****************************************END JENJANG************************************/
	
	/****************************************PEKERJAAN*****************************************/
	public function pekerjaan_save(){
		$kode  = $this->input->post("txt_kodepekerjaan");
		$data['pekerjaan'] = $this->input->post("txt_pekerjaanmodal");
		$rst = $this->mdl_referensi->pekerjaan_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf pekerjaan tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function pekerjaan_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_search-pekerjaan");
		$totalRows = $this->mdl_referensi->pekerjaan_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/pekerjaan_pagging'),$totalRows,$this->perpage,'pagingpekerjaan');
	
		$this->pagination->initialize($config);
		$data['pagingpekerjaan'] =  $this->pagination->create_links();
	
		$data['datapekerjaan'] = $this->mdl_referensi->pekerjaan_get_all(false,$id,$this->perpage,$txt_search);
		$this->load->view('recipient/pekerjaan/datatable',$data);
	}
	public function pekerjaan_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->pekerjaan_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	public function pekerjaan_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->pekerjaan_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	public function form_get_pekerjaan(){
		$pekerjaan = "";
		$ddl_datapekerjaan= $this->mdl_referensi->pekerjaan_select_all();
		foreach($ddl_datapekerjaan->result() as $Row) {
			$pekerjaan .= '<option value="'.$Row->kodepekerjaan.'">'.$Row->pekerjaan.'</option>';
		}
		echo $pekerjaan;
	}
	/****************************************END PEKERJAAN************************************/
	
	/****************************************INSTANSI*****************************************/
	public function instansi_save(){
		$kode  = $this->input->post("txt_kodeinstansi");
		$data['instansi'] = $this->input->post("txt_instansimodal");
		$rst = $this->mdl_referensi->instansi_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf instansi tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function instansi_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_search-instansi");
		$totalRows = $this->mdl_referensi->instansi_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/instansi_pagging'),$totalRows,$this->perpage,'paginginstansi');
	
		$this->pagination->initialize($config);
		$data['paginginstansi'] =  $this->pagination->create_links();
	
		$data['datainstansi'] = $this->mdl_referensi->instansi_get_all(false,$id,$this->perpage,$txt_search);
		$this->load->view('recipient/instansi/datatable',$data);
	}
	public function instansi_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->instansi_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	public function instansi_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->instansi_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	public function form_get_instansi(){
		$instansi = '<option value="0">Pilih Instansi</option>';
		$ddl_datainstansi= $this->mdl_referensi->instansi_select_all();
		foreach($ddl_datainstansi->result() as $kelRow) {
			$instansi .= '<option value="'.$kelRow->kodeinstansi.'">'.$kelRow->instansi.'</option>';
		}
		echo $instansi;
	}
	/****************************************END INSTANSI************************************/
	
	/****************************************KELUARGA*****************************************/
	public function keluarga_save(){
		$kode  = $this->input->post("txt_kodekeluarga");
		$data['status'] = $this->input->post("div_status");
		$data['nama'] = $this->input->post("txt_namakeluarga");
		$data['usia'] = $this->input->post("txt_usiakeluarga");
		$data['pendidikanterakhir'] = $this->input->post("txt_pendidikanterakhirkeluarga");
		$data['pekerjaan'] = $this->input->post("txt_pekerjaankeluarga");
		$data['jeniskelamin'] = $this->input->post("rad_jkkeluarga");
		$data['regidrec'] = $this->input->post("txt_regid");
		
		$rst = $this->mdl_referensi->keluarga_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf nama tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function keluarga_pagging($id=0)
	{
		$txt_regid = $this->input->post("txt_regid"); 
		$txt_search = $this->input->post("txt_search-keluarga");
		$totalRows = $this->mdl_referensi->keluarga_get_all(true,0,0,$txt_search,$txt_regid)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/keluarga_pagging'),$totalRows,$this->perpage,'pagingkeluarga');
	
		$this->pagination->initialize($config);
		$data['pagingkeluarga'] =  $this->pagination->create_links();
	
		$data['datakeluarga'] = $this->mdl_referensi->keluarga_get_all(false,$id,$this->perpage,$txt_search,$txt_regid);
		$this->load->view('recipient/keluarga/datatable',$data);
	}
	public function keluarga_select_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid"); 
		$rst = $this->mdl_referensi->keluarga_get_byid($kode,$txt_regid);
		echo json_encode($rst->first_row());
	}
	public function keluarga_delete_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->keluarga_delete($kode,$txt_regid);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_get_keluarga(){
		$kode = $this->input->post("kode");
		$data['ddl_datakeluarga'] = $this->mdl_referensi->keluarga_get_byanggota($kode);
		$this->load->view("recipient/keluarga/index",$data);
	}
	/****************************************END KELUARGA************************************/
	
	/****************************************PENDIDIKAN*****************************************/
	public function pendidikan_save(){
		$kode  = $this->input->post("txt_kodependidikan");
		$data['sekolah'] = $this->input->post("div_sekolahpendidikan");
		$data['namasekolah'] = $this->input->post("txt_namasekolahpendidikan");
		$data['tahun'] = $this->input->post("txt_tahunpendidikan");
		$data['jurusan'] = $this->input->post("txt_jurusanpendidikan");
		$data['nilaiakhir'] = $this->input->post("txt_nilaiakhirpendidikan");
		$data['regidrec'] = $this->input->post("txt_regid"); 
		$rst = $this->mdl_referensi->pendidikan_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf nama tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function pendidikan_pagging($id=0)
	{
		$txt_regid = $this->input->post("txt_regid");
		$txt_search = $this->input->post("txt_search-pendidikan");
		$totalRows = $this->mdl_referensi->pendidikan_get_all(true,0,0,$txt_search,$txt_regid)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/pendidikan_pagging'),$totalRows,$this->perpage,'pagingpendidikan');
	
		$this->pagination->initialize($config);
		$data['pagingpendidikan'] =  $this->pagination->create_links();
	
		$data['datapendidikan'] = $this->mdl_referensi->pendidikan_get_all(false,$id,$this->perpage,$txt_search,$txt_regid);
		$this->load->view('recipient/pendidikan/datatable',$data);
	}
	public function pendidikan_select_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->pendidikan_get_byid($kode,$txt_regid);
		echo json_encode($rst->first_row());
	}
	public function pendidikan_delete_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->pendidikan_delete($kode,$txt_regid);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_get_pendidikan(){
		$kode = $this->input->post("kode");
		$data['ddl_datapendidikan'] = $this->mdl_referensi->pendidikan_get_byanggota($kode);
		$this->load->view("recipient/pendidikan/index",$data);
	}
	/****************************************END PENDIDIKAN************************************/
	
	/****************************************PENDIDIKAN NON FORMAL*****************************************/
	public function pendidikannonformal_save(){
		$kode  = $this->input->post("txt_kodependidikannf"); 
		$data['kompetensi'] = $this->input->post("txt_kompetensipendnf");
		$data['namalembaga'] = $this->input->post("txt_namalembagapendnf");
		$data['tahun'] = $this->input->post("txt_tahunpendnf");
		$data['spesialisasi'] = $this->input->post("txt_spesialisasipendnf");
		$data['regidrec'] = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->pendidikannonformal_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf nama tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function pendidikannonformal_pagging($id=0)
	{
		$txt_regid = $this->input->post("txt_regid");
		$txt_search = $this->input->post("txt_search-pendidikannonformal");
		$totalRows = $this->mdl_referensi->pendidikannonformal_get_all(true,0,0,$txt_search,$txt_regid)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/pendidikannonformal_pagging'),$totalRows,$this->perpage,'pagingpendidikannonformal');
	
		$this->pagination->initialize($config);
		$data['pagingpendidikannonformal'] =  $this->pagination->create_links();	
		$data['datapendidikannonformal'] = $this->mdl_referensi->pendidikannonformal_get_all(false,$id,$this->perpage,$txt_search,$txt_regid);
		$this->load->view('recipient/pendidikannf/datatable',$data);
	}
	public function pendidikannonformal_select_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->pendidikannonformal_get_byid($kode,$txt_regid);
		echo json_encode($rst->first_row());
	}
	public function pendidikannonformal_delete_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->pendidikannonformal_delete($kode,$txt_regid);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_get_pendidikannonformal(){
		$kode = $this->input->post("kode");
		$data['ddl_datapendidikannonformal'] = $this->mdl_referensi->pendidikannonformal_get_byanggota($kode);
		$this->load->view("recipient/pendidikannf/index",$data);
	}
	/****************************************END PENDIDIKAN NON FORMAL************************************/
	
	/****************************************ORGANISASI*****************************************/
	public function organisasi_save(){
		$kode  = $this->input->post("txt_kodeorganisasi"); 
		$data['namaorganisasi'] = $this->input->post("txt_namaorganisasi");
		$data['jabatan'] = $this->input->post("txt_jabatanorganisasi");
		$data['tahun'] = $this->input->post("txt_tahunorganisasi");
		$data['tempat'] = $this->input->post("txt_tempatorganisasi");
		$data['regidrec'] = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->organisasi_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf nama tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function organisasi_pagging($id=0)
	{
		$txt_regid = $this->input->post("txt_regid");
		$txt_search = $this->input->post("txt_search-organisasi");
		$totalRows = $this->mdl_referensi->organisasi_get_all(true,0,0,$txt_search,$txt_regid)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/organisasi_pagging'),$totalRows,$this->perpage,'pagingorganisasi');
	
		$this->pagination->initialize($config);
		$data['pagingorganisasi'] =  $this->pagination->create_links();
	
		$data['dataorganisasi'] = $this->mdl_referensi->organisasi_get_all(false,$id,$this->perpage,$txt_search,$txt_regid);
		$this->load->view('recipient/organisasi/datatable',$data);
	}
	public function organisasi_select_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->organisasi_get_byid($kode,$txt_regid);
		echo json_encode($rst->first_row());
	}
	public function organisasi_delete_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->organisasi_delete($kode,$txt_regid);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_get_organisasi(){
		$kode = $this->input->post("kode");
		$data['ddl_dataorganisasi'] = $this->mdl_referensi->organisasi_get_byanggota($kode);
		$this->load->view("recipient/organisasi/index",$data);
	}
	/****************************************END ORGANISASI************************************/
	
	/****************************************KERJA*****************************************/
	public function kerja_save(){
		$kode  = $this->input->post("txt_kodekerja");
		$data['namalembaga'] = $this->input->post("txt_namalembaga");
		$data['jabatan'] = $this->input->post("txt_jabatankerja");
		$data['tahun'] = $this->input->post("txt_tahunkerja");
		$data['tempat'] = $this->input->post("txt_tempatkerja");
		$data['regidrec'] = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->kerja_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf nama tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function kerja_pagging($id=0)
	{ 
		$txt_regid = $this->input->post("txt_regid");
		$txt_search = $this->input->post("txt_search-kerja"); 
		$totalRows = $this->mdl_referensi->kerja_get_all(true,0,0,$txt_search,$txt_regid)->num_rows();
		
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/kerja_pagging'),$totalRows,$this->perpage,'pagingkerja');
	
		$this->pagination->initialize($config);
		$data['pagingkerja'] =  $this->pagination->create_links();
		$data['datakerja'] = $this->mdl_referensi->kerja_get_all(false,$id,$this->perpage,$txt_search,$txt_regid);
		$this->load->view('recipient/kerja/datatable',$data);
	}
	public function kerja_select_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->kerja_get_byid($kode,$txt_regid);
		echo json_encode($rst->first_row());
	}
	public function kerja_delete_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->kerja_delete($kode,$txt_regid);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_get_kerja(){
		$kode = $this->input->post("kode");
		$data['ddl_datakerja'] = $this->mdl_referensi->kerja_get_byanggota($kode);
		$this->load->view("recipient/kerja/index",$data);
	}
	/****************************************END KERJA************************************/
	
	/****************************************VOLUNTEER*****************************************/
	public function volunteer_save(){
		$kode  = $this->input->post("txt_kodevolunteer");
		$data['namakegiatan'] = $this->input->post("txt_namakegiatanvolunteer");
		$data['jabatan'] = $this->input->post("txt_jabatanvolunteer");
		$data['tahun'] = $this->input->post("txt_tahunvolunteer");
		$data['tempat'] = $this->input->post("txt_tempatvolunteer");
		$data['regidrec'] = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->volunteer_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf nama tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function volunteer_pagging($id=0)
	{
		$txt_regid = $this->input->post("txt_regid");
		$txt_search = $this->input->post("txt_search-kerja");
		$totalRows = $this->mdl_referensi->volunteer_get_all(true,0,0,$txt_search,$txt_regid)->num_rows();
	
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/volunteer_pagging'),$totalRows,$this->perpage,'pagingvolunteer');
	
		$this->pagination->initialize($config);
		$data['pagingvolunteer'] =  $this->pagination->create_links();
		$data['datavolunteer'] = $this->mdl_referensi->volunteer_get_all(false,$id,$this->perpage,$txt_search,$txt_regid);
		$this->load->view('recipient/volunteer/datatable',$data);
	}
	public function volunteer_select_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->volunteer_get_byid($kode,$txt_regid);
		echo json_encode($rst->first_row());
	}
	public function volunteer_delete_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->volunteer_delete($kode,$txt_regid);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_get_volunteer(){
		$kode = $this->input->post("kode");
		$data['ddl_datavolunteer'] = $this->mdl_referensi->volunteer_get_byanggota($kode);
		$this->load->view("recipient/volunteer/index",$data);
	}
	/****************************************END VOLUNTEER************************************/
	
	/****************************************PRESTASI*****************************************/
	public function prestasi_save(){
		$kode  = $this->input->post("txt_kodeprestasi");
		$data['bidang'] = $this->input->post("txt_bidangprestasi");
		$data['peringkat'] = $this->input->post("txt_peringkatprestasi"); 
		$data['tahun'] = $this->input->post("txt_tahunprestasi");
		$data['tingkat'] = $this->input->post("txt_tingkatprestasi");
		$data['penyelenggara'] = $this->input->post("txt_penyelenggaraprestasi");
		$data['regidrec'] = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->prestasi_save($data,$kode);
		if($rst==""){
			$response["success"] = FALSE;
			$response["message"] = "Maaf nama tersebut sudah terdaftar";
			echo json_encode($response);
		}else{
			$response["success"] = true;
			$response["message"] = "Berhasil, data telah disimpan";
			echo json_encode($response);
		}
	}
	public function prestasi_pagging($id=0)
	{
		$txt_regid = $this->input->post("txt_regid");
		$txt_search = $this->input->post("txt_search-prestasi");
		$totalRows = $this->mdl_referensi->prestasi_get_all(true,0,0,$txt_search,$txt_regid)->num_rows();
	
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/prestasi_pagging'),$totalRows,$this->perpage,'pagingprestasi');
	
		$this->pagination->initialize($config);
		$data['pagingprestasi'] =  $this->pagination->create_links();
		$data['dataprestasi'] = $this->mdl_referensi->prestasi_get_all(false,$id,$this->perpage,$txt_search,$txt_regid);
		$this->load->view('recipient/prestasi/datatable',$data);
	}
	public function prestasi_select_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->prestasi_get_byid($kode,$txt_regid);
		echo json_encode($rst->first_row());
	}
	public function prestasi_delete_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->prestasi_delete($kode,$txt_regid);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_get_prestasi(){
		$kode = $this->input->post("kode");
		$data['ddl_dataprestasi'] = $this->mdl_referensi->prestasi_get_byanggota($kode);
		$this->load->view("recipient/prestasi/index",$data);
	}
	/****************************************END PRESTASI************************************/
	
	public function config_pagination_all($baseurl,$rows,$perpage,$divid){
		$config['base_url'] = $baseurl;
		$config['total_rows'] = $rows;
		$config['per_page'] = $perpage;
		$config['num_links'] = 1;
		$config['full_tag_open'] = '<div id="'.$divid.'" class="btn-group pull-right">';
		$config['full_tag_close'] = '</div>';
			
		$config['cur_tag_open'] = '<div class="btn btn-sm btn-white  active">';
		$config['cur_tag_close'] = '</div>';
	
		$config['num_tag_open'] = '<div class="btn btn-sm  btn-white">';
		$config['num_tag_close'] = '</div>';
	
		$config['next_link'] = '<i class="fa fa-chevron-right"></i>';
		$config['next_tag_open'] = '<div class="btn btn-white btn-sm ">';
		$config['next_tag_close'] = '</div>';
	
		$config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
		$config['prev_tag_open'] = '<div class="btn btn-white btn-sm ">';
		$config['prev_tag_close'] = '</div>';
	
		$config['last_link'] = '<i class="fa fa-step-forward"></i>';
		$config['last_tag_open'] = '<div class="btn btn-white btn-sm ">';
		$config['last_tag_close'] = '</div>';
	
		$config['first_link'] = '<i class="fa fa-step-backward"></i>';
		$config['first_tag_open'] = '<div class="btn btn-white btn-sm ">';
		$config['first_tag_close'] = '</div>';
		return $config;
	}
	
	public function form_pagging($id=0)
	{
		$txt_search = $this->input->post("txt_search");
		 
		$totalRows = $this->mdl_recipient->form_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('recipient/form_pagging'),$totalRows,$this->form_perpage,'form_paging');
	
		$this->pagination->initialize($config);
		$data['form_paging'] =  $this->pagination->create_links();
	
		$data['dataform'] = $this->mdl_recipient->form_get_all(false,$id,$this->form_perpage,$txt_search);
		$this->load->view('recipient/datatable',$data);
	}
	
	public function form_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_recipient->form_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	
	public function form_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_recipient->form_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	
	public function form_get_telepon(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->form_telepon_selectbyid($kode,'recipient');
		$tmp = "";
		$intLop = 1;
		foreach($rst->result() as $item){ 
			$button = '<button class="btn btn-danger btn-sm" type="button" onclick="form_del_phone('.$intLop.')">-</button>';
			if($intLop==1){
				$button = '<button class="btn btn-primary btn-sm" type="button" onclick="form_add_phone()">+</button>';
			}
			$tmp .= '<div id="form-group-'.$intLop.'" class="form-group"><label class="col-sm-2 control-label">Nomor Telepon '.$intLop.'</label>
							<div class="col-sm-9"> 
								<input type="text" name="txt_telepon[]" class="form-control" value="'.$item->telepon.'">
							</div>
							<div class="col-sm-1">
							'.$button.'
							</div>
					 </div>'; 
			$intLop++;
		}
		$intLop = $intLop-1;
		$tmp .= '<input type="hidden" id="txt_count_telepon" name="txt_count_telepon" value="'.$intLop.'">';
		echo $tmp;
	}
	
	public function form_get_email(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->form_email_selectbyid($kode,'recipient');
		$tmp = "";
		$intLop = 1;
		foreach($rst->result() as $item){ 
			$button = '<button class="btn btn-danger btn-sm" type="button" onclick="form_del_email('.$intLop.')">-</button>';
			if($intLop==1){
				$button = '<button class="btn btn-primary btn-sm" type="button" onclick="form_add_email()">+</button>';
			}
			$tmp .= '<div id="form-group-email-'.$intLop.'" class="form-group"><label class="col-sm-2 control-label">Email '.$intLop.'</label>
							<div class="col-sm-9"> 
								<input type="text" name="txt_email[]" class="form-control" value="'.$item->email.'">
							</div>
							<div class="col-sm-1">
							'.$button.'
							</div>
					 </div>'; 
			$intLop++;
		}
		$intLop = $intLop-1;
		$tmp .= '<input type="hidden" id="txt_count_email" name="txt_count_email" value="'.$intLop.'">';
		echo $tmp;
	}
	
	function form_save(){ 
		$id = $this->input->post("txt_regid");
		$tglmasuk = $this->input->post("txt_tglmasukanggota");
		$kode_kelompok = $this->input->post("div_kelompok");
		$kode_universitas = $this->input->post("div_universitas");		
		$nomoranggota = $this->input->post("txt_noanggota");
		 
		if(strlen($nomoranggota)==0){			
			$kel_rows = $this->mdl_kelompok->kelompok_get_byid($kode_kelompok,$this->page);
			if($kel_rows->num_rows()==0){
				$response['status'] = true;
				$response['id'] = 0;
				$response['pesan'] = "Kelompok belum disetting, hubungi administrator";
				echo json_encode($response);
				return;
			}
			$kel_singkatan = $kel_rows->first_row()->singkatan; 
			$uni_rows = $this->mdl_referensi->universitas_get_byid($kode_universitas);
			if($uni_rows->num_rows()==0){
				$response['status'] = true;
				$response['id'] = 0;
				$response['pesan'] = "Universitas belum disetting, hubungi administrator";
				echo json_encode($response);
				return;
			}
			 
			$uni_singkatan = $uni_rows->first_row()->singkatan;								
			$noanggota = $kel_singkatan.date('y',strtotime($tglmasuk)).$uni_singkatan; 
			$newnoanggota = $noanggota.$this->mdl_recipient->generate_number($noanggota); 
			$data['noanggota'] = $newnoanggota;
			$nomoranggota      = $newnoanggota;
		}else{
			$data['noanggota'] = $this->input->post("txt_noanggota");
			$nomoranggota      = $data['noanggota']; 
		}	
		
		$data['tglmasukanggota'] = date('Y-m-d',strtotime($tglmasuk));
		$data['namalengkap'] = $this->input->post("txt_namalengkap");
		$data['panggilan'] = $this->input->post("txt_panggilan");
		$data['tempatlahir'] = $this->input->post("txt_tempatlahir");
		$data['tanggallahir'] = date('Y-m-d',strtotime($this->input->post("txt_tanggallahir")));
		$data['jeniskelamin'] = $this->input->post("rad_jk");
		$data['usia'] = $this->input->post("txt_usia");
		$data['kodeagama'] = $this->input->post("div_agama");
		$data['kodekelompok'] = $kode_kelompok;
		$data['kodeuniversitas'] = $kode_universitas;
		$data['kodejenjang'] = $this->input->post("div_jenjang");
		$data['fakultas'] = $this->input->post("txt_fakultas");
		$data['programstudi'] = $this->input->post("txt_programstudi");
		$data['jurusan'] = $this->input->post("txt_jurusan");
		$data['kodepekerjaan'] = $this->input->post("div_pekerjaan");
		$data['kodeinstansi'] = $this->input->post("div_instansi");
		$data['sukubangsa'] = $this->input->post("txt_sukubangsa");
		$data['linkedin'] = $this->input->post("txt_linkedin");
		$data['website'] = $this->input->post("txt_website");
		$data['fb'] = $this->input->post("txt_fb");
		$data['twitter'] = $this->input->post("txt_twitter");
		$data['catatan'] = $this->input->post("txt_catatan");
		$data['tipekeanggotaan'] = "recipient";
		$data['ipk'] = $this->input->post("txt_ipk");
		$aff = $this->mdl_recipient->form_save($data,$id);
		if($aff==1){ 
			if($id==""){$id = $this->db->insert_id();}
			
			$str_telepon = "";
			$telepon = $this->input->post("txt_telepon"); 
			foreach($telepon as $tel){
				$str_telepon .= "'".trim($tel)."',";				
			}
			$str_telepon = substr($str_telepon, 0,strlen($str_telepon)-1);
			$this->mdl_referensi->form_delete_telepon($id,$str_telepon,'recipient');			
			foreach($telepon as $tel){			
				$this->mdl_referensi->form_telepon($id,trim($tel),'recipient');
			}
			
			$str_email = "";
			$email = $this->input->post("txt_email");
			foreach($email as $mail){
				$str_email .= "'".trim($mail)."',";
			}
			$str_email = substr($str_email, 0,strlen($str_email)-1);
			$this->mdl_referensi->form_delete_email($id,$str_email,'recipient');
			foreach($email as $mail){
				$this->mdl_referensi->form_email($id,trim($mail),'recipient');
			}
			
			$response['status'] = true;
			$response['id'] = $id; 
			$response['noanggota'] = $nomoranggota; 
			$response['pesan'] = "Data berhasil disimpan";
			echo json_encode($response);
		} 
	} 
	function form_profil_change(){
		$kode = $this->input->post("kode");
		$path = 'uploads/photo/'.$kode;
		$string = file_exists($path);
		if(strlen($kode)>0){ 
			if(strlen($string) > 0){
				echo '<img id="img_profil" alt="image" src="'.base_url().'uploads/photo/'.$kode.'" style="width:70%;min-height:20%;border-radius:5px;border:solid 1px #e5e6e7;">';							
			}else{
				echo '<img id="img_profil" alt="image" src="'.base_url().'assets/themes/inspinia/images/photo.jpg" style="width:70%;min-height:20%;border-radius:5px;border:solid 1px #e5e6e7;">';
			}
		}else{
			echo '<img id="img_profil" alt="image" src="'.base_url().'assets/themes/inspinia/images/photo.jpg" style="width:70%;min-height:20%;border-radius:5px;border:solid 1px #e5e6e7;">';
		}
	}
	function attachment_select_byid(){
		$konten = "";
		$i=1;
		$id = $this->input->post("regid");
		$rst  = $this->mdl_referensi->attachment_get_byid($id);
		foreach($rst->result() as $row){
			$konten .= '<li class="list-group-item">
		                 <span class="badge badge-danger" style="cursor: pointer;" onclick=on_delete_attachment("'.$row->urut.'","'.$row->filename.'")><i class="fa fa-trash-o"></i></span>
		                 <b>'.$i.')</b>  <a href="'.base_url().'uploads/photo/'.$row->filename.'" target="_blank">'.$row->filename.'</a>
		                </li> ';
			$i++;
		}
		echo $konten;
	}
	function on_delete_attachment(){
		$urut = $this->input->post("urut");
		$filename = $this->input->post("filename");
		$target_dir = "uploads/photo/";
		$target_file = $target_dir.$filename;
		
		if (file_exists($target_file)) {
			unlink($target_file);
		}
		
		$aff = $this->mdl_referensi->attachment_delete($urut);
		echo "File attachment telah dihapus!";
	}
	function form_upload_att(){
		$pesan = "";
		$txt_regid = $this->input->post("txt_regid");

		$filenametmp = $_FILES["fileToUploadAtt"]["name"];
		$filenametmp = str_replace(" ", "", $filenametmp);
		$filenametmp = str_replace("-", "", $filenametmp);
		$filenametmp = str_replace("_", "", $filenametmp);
		$filenametmp = $txt_regid.$filenametmp;
		
		$target_dir = "uploads/photo/"; 
		$target_file = $target_dir.$filenametmp;
	
		if (file_exists($target_file)) {
			unlink($target_file);
		}
		  
		if (move_uploaded_file($_FILES["fileToUploadAtt"]["tmp_name"], $target_file)) {
			$data["regid"] = $txt_regid;
			$data["filename"] = $filenametmp;
			$aff = $this->mdl_recipient->save_attachment($data);
			echo "File ". basename( $_FILES["fileToUploadAtt"]["name"]). " berhasil di upload";
		} else {
			echo "Maaf tidak dapat melakukan upload photo, ulangi lagi.";
		}
	}
	function form_upload(){ 
		$this->load->library('image_lib');
		
		$pesan = "";
		$txt_regid = $this->input->post("txt_regid");
		
		$target_dir = "uploads/photo/";				
		$imageFileType = pathinfo($target_dir.basename($_FILES["fileToUploadPh"]["name"]),PATHINFO_EXTENSION);
		$filename    = $txt_regid.".".$imageFileType;
		$target_file = $target_dir.$filename;
		
		if (file_exists($target_file)) {
			unlink($target_file);
		} 
		 
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
			echo "ER2";
			return;
		}
		if (move_uploaded_file($_FILES["fileToUploadPh"]["tmp_name"], $target_file)) {
			$newfilename = $txt_regid.rand().".".$imageFileType;
			
			//$this->load->library("resizeimage");
			//$resizeObj = new $this->resizeimage($target_file);
			//$resizeObj -> resizeImage(200, 200, 'crop');
			//$resizeObj -> saveImage($target_dir.$newfilename, 100);
			
			//if (file_exists($target_file)) {
			//	unlink($target_file);
			//}
			
			/*CREATE THUMBS*/
			$config = array(
					'source_image' => $target_file,
					'new_image' => $target_dir.$newfilename,
					'maintain_ration' => true,
					'width' => 250,
					'height' => 250
			);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			 
			$aff = $this->mdl_recipient->update_profil_photo($txt_regid,$newfilename);
			echo $filename;
		} else {
			echo "ER3";
		} 
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */