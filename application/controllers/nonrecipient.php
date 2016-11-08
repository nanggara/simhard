<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nonrecipient extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 10;
	var $page = 'nonrecipient';
	var $mod_app = 'page_nonrecipient';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_nonrecipient");
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
		$config = $this->config_pagination_all(site_url('nonrecipient/kelompok_pagging'),$totalRows,$this->perpage,'paging');		  
		$this->pagination->initialize($config);  
		$data['paging'] =  $this->pagination->create_links();
		$data['datakelompok'] = $this->mdl_kelompok->kelompok_get_all(false,0,$this->perpage,"",$this->page);
		$data['ddl_datakelompok'] = $this->mdl_kelompok->kelompok_select_all($this->page);
		
		$totalRowsInstitusi = $this->mdl_institusi->institusi_get_all(true,0,0,"")->num_rows();
		$config_institusi = $this->config_pagination_all(site_url('nonrecipient/institusi_pagging'),$totalRowsInstitusi,$this->perpage,'institusi_paging');
		$this->pagination->initialize($config_institusi);
		$data['institusi_paging'] =  $this->pagination->create_links();
		$data['datainstitusi'] = $this->mdl_institusi->institusi_get_all(false,0,$this->perpage,"");
		$data['ddl_datainstitusi'] = $this->mdl_institusi->institusi_select_all();
		 
		$totalRowsForm = $this->mdl_nonrecipient->form_get_all(true,0,0,"")->num_rows();
		$form_config = $this->config_pagination_all(site_url('nonrecipient/form_pagging'),$totalRowsForm,$this->form_perpage,'form_paging');
		$this->pagination->initialize($form_config);
		$data['form_paging'] =  $this->pagination->create_links();
		$data['dataform'] = $this->mdl_nonrecipient->form_get_all(false,0,$this->form_perpage,"");
		 
		if (isset($_GET['idmembership'])) {
			$data['regidrec']   = $_GET['idmembership'];
		}else{
			$data['regidrec']   = "";
		}
		
		$this->load->view('nonrecipient/index',$data);
	}
	
	
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
		$config = $this->config_pagination_all(site_url('nonrecipient/institusi_pagging'),$totalRows,$this->perpage,'institusi_paging');
	
		$this->pagination->initialize($config);
		$data['institusi_paging'] =  $this->pagination->create_links();
	
		$data['datainstitusi'] = $this->mdl_institusi->institusi_get_all(false,$id,$this->perpage,$txt_search);
		$this->load->view('nonrecipient/institusi/datatable',$data);
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
	
	
	public function kelompok_save(){
		$kode  = $this->input->post("txt_kode");
		$data['kelompok'] = $this->input->post("txt_kelompokmodal");
		$data['singkatan'] = $this->input->post("txt_kelompoksingkatan");
		$data['page'] = $this->page;
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
		$config = $this->config_pagination_all(site_url('nonrecipient/kelompok_pagging'),$totalRows,$this->perpage,'paging');
		
		$this->pagination->initialize($config);
		$data['paging'] =  $this->pagination->create_links();
		
		$data['datakelompok'] = $this->mdl_kelompok->kelompok_get_all(false,$id,$this->perpage,$txt_search,$this->page);
		$this->load->view('nonrecipient/kelompok/datatable',$data);
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
		$totalRows = $this->mdl_nonrecipient->form_get_all(true,0,0,$txt_search)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('nonrecipient/form_pagging'),$totalRows,$this->form_perpage,'form_paging');
	
		$this->pagination->initialize($config);
		$data['form_paging'] =  $this->pagination->create_links();
	
		$data['dataform'] = $this->mdl_nonrecipient->form_get_all(false,$id,$this->form_perpage,$txt_search);
		$this->load->view('nonrecipient/datatable',$data);
	}
	
	public function form_select_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_nonrecipient->form_get_byid($kode);
		echo json_encode($rst->first_row());
	}
	
	public function form_delete_row(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_nonrecipient->form_delete($kode);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	
	public function form_get_telepon(){
		$kode = $this->input->post("kode");
		$rst = $this->mdl_referensi->form_telepon_selectbyid($kode,'nonrecipient');
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
		$rst = $this->mdl_referensi->form_email_selectbyid($kode,'nonrecipient');
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
		$data['namalengkap'] = $this->input->post("txt_nama");
		$data['tglmasukanggota'] = date('Y-m-d',strtotime($tglmasuk));
		$data['jeniskelamin'] = $this->input->post("rad_jk");
		$data['alamat'] = $this->input->post("txt_alamat");
		$data['kodeinstitusi'] = $this->input->post("div_institusi");
		$data['kodekelompok'] = $this->input->post("div_kelompok");
		$data['jabatan'] = $this->input->post("txt_jabatan");
		$data['linkedin'] = $this->input->post("txt_linkedin");
		$data['website'] = $this->input->post("txt_website");
		$data['fb'] = $this->input->post("txt_fb");
		$data['twitter'] = $this->input->post("txt_twitter");
		$data['catatan'] = $this->input->post("txt_catatan");
		$data['tipekeanggotaan'] = "nonrecipient";
		$data['tempatlahir'] = $this->input->post("txt_tempatlahir");
		$data['tanggallahir'] = date('Y-m-d',strtotime($this->input->post("txt_tanggallahir")));
		$aff = $this->mdl_nonrecipient->form_save($data,$id);
		if($aff==1){ 
			if($id==""){$id = $this->db->insert_id();}
			
			$str_telepon = "";
			$telepon = $this->input->post("txt_telepon"); 
			foreach($telepon as $tel){
				$str_telepon .= "'".trim($tel)."',";				
			}
			$str_telepon = substr($str_telepon, 0,strlen($str_telepon)-1);
			$this->mdl_referensi->form_delete_telepon($id,$str_telepon,'nonrecipient');			
			foreach($telepon as $tel){			
				$this->mdl_referensi->form_telepon($id,trim($tel),'nonrecipient');
			}
			
			$str_email = "";
			$email = $this->input->post("txt_email");
			foreach($email as $mail){
				$str_email .= "'".trim($mail)."',";
			}
			$str_email = substr($str_email, 0,strlen($str_email)-1);
			$this->mdl_referensi->form_delete_email($id,$str_email,'nonrecipient');
			foreach($email as $mail){
				$this->mdl_referensi->form_email($id,trim($mail),'nonrecipient');
			}
			
			$response['status'] = true;
			$response['id'] = $id;
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
		if ($_FILES["fileToUploadPh"]["size"] > 500000) {
			echo "ER1";
			return;
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
			
			$aff = $this->mdl_nonrecipient->update_profil_photo($txt_regid,$newfilename);
			echo $filename;
		} else {
			echo "ER3";
		} 
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
		if ($_FILES["fileToUploadAtt"]["size"] > 500000) {
			echo "Maaf ukuran file terlalu besar.";
			return;
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */