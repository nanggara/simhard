<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blastemail extends CI_Controller {
  
	var $form_perpage = 10;
	var $form_perpage_template = 5;
	var $page = 'search';
	var $mod_app = 'page_blastemail';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_blastemail");
		$this->load->model("mdl_emailtemplate");
		$this->load->model("mdl_newsletter");
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
		 
		$totalRowsForm = $this->mdl_blastemail->form_get_all(true,0,0,$this->init_filter())->num_rows();
		$form_config = $this->config_pagination_all(site_url('blastemail/form_pagging'),$totalRowsForm,$this->form_perpage,'form_paging');
		$this->pagination->initialize($form_config);
		$data['form_paging'] =  $this->pagination->create_links(); 
		$data['dataform'] = $this->mdl_blastemail->form_get_all(false,0,$this->form_perpage,$this->init_filter());
		 
		$totalRowsTmpl = $this->mdl_emailtemplate->form_get_all(true,0,0,$this->init_filter())->num_rows();
		$form_config = $this->config_pagination_all(site_url('blastemail/template_paging'),$totalRowsTmpl,$this->form_perpage_template,'template_paging');
		$this->pagination->initialize($form_config);
		$data['template_paging'] =  $this->pagination->create_links();
		$data['dataform_template'] = $this->mdl_emailtemplate->form_get_all(false,0,$this->form_perpage_template,$this->init_filter_agama());
		
		$totalRowsNews = $this->mdl_newsletter->form_get_all(true,0,0,$this->init_filter())->num_rows();
		$form_config = $this->config_pagination_all(site_url('blastemail/newsletter_paging'),$totalRowsNews,$this->form_perpage_template,'newsletter_paging');
		$this->pagination->initialize($form_config);
		$data['newsletter_paging'] =  $this->pagination->create_links();
		$data['dataform_newsletter'] = $this->mdl_newsletter->form_get_all(false,0,$this->form_perpage_template,$this->init_filter_agama());
		
		$data['file_manager'] = $this->file_manager();
		$data['open_folder']  = $this->open_folder();
		
		$this->load->view('blastemail/index',$data);
	} 
 
	public function init_filter(){
		$filter['txt_search']	   = "";
		return $filter;
	}
	
	public function init_filter_agama(){ 
		$filter['txt_search']	   = "";
		return $filter;
	}

	public function template_paging($id=0)
	{
		$filter['txt_search']	   = $this->input->post("txt_search-template");
		 
		$totalRows = $this->mdl_emailtemplate->form_get_all(true,0,0,$filter)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('blastemail/template_paging'),$totalRows,$this->form_perpage_template,'template_paging');
		$this->pagination->initialize($config);
		$data['template_paging'] =  $this->pagination->create_links();
		$data['dataform_template'] = $this->mdl_emailtemplate->form_get_all(false,$id,$this->form_perpage_template,$filter);
	
		$this->load->view('blastemail/template/datatable',$data);
	}
	
	public function newsletter_paging($id=0)
	{
		$filter['txt_search']	   = $this->input->post("txt_search-newsletter");
			
		$totalRows = $this->mdl_newsletter->form_get_all(true,0,0,$filter)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('blastemail/newsletter_paging'),$totalRows,$this->form_perpage_template,'newsletter_paging');
		$this->pagination->initialize($config);
		$data['newsletter_paging'] =  $this->pagination->create_links();
		$data['dataform_newsletter'] = $this->mdl_newsletter->form_get_all(false,$id,$this->form_perpage_template,$filter);
	
		$this->load->view('blastemail/newsletter/datatable',$data);
	}
	
	public function form_pagging($id=0)
	{  
		
		$filter['txt_search']	   = $this->input->post("txt_search");
		
		$totalRows = $this->mdl_blastemail->form_get_all(true,0,0,$filter)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('blastemail/form_pagging'),$totalRows,$this->form_perpage,'form_paging');	
		$this->pagination->initialize($config);
		$data['form_paging'] =  $this->pagination->create_links(); 
		$data['dataform'] = $this->mdl_blastemail->form_get_all(false,$id,$this->form_perpage,$filter); 
		
		$this->load->view('blastemail/datatable',$data);
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
	
	function form_save($filename){  
		 
		$message = "";
		$to = $this->input->post("txt_to");
		$subject = $this->input->post("txt_subject");
		$email = $this->input->post("txt_area");
		$email = str_replace("../", base_url(), $email);

		/**** START TRANSACTION *****/
		$link = mysqli_connect($this->db->hostname,$this->db->username,$this->db->password);
		mysqli_select_db($link,$this->db->database);
		mysqli_autocommit($link,false);
		 
		//mysqli_commit($link);
		//return;
		
		$arr = explode(",", $to);
		foreach ($arr as $row){
			$tipe = substr($row, 0,3);
			$kode = substr($row, 3);
		 
			/*MEMBER*/
			if($tipe=="@p@"){				
				$email_member= "";
				$sql_email = "SELECT r.*,e.email 
							  FROM recipient r
							  INNER JOIN daftaremail e ON e.regid=r.regidrec
						      WHERE e.regid = ".$kode." ORDER BY e.urut ASC LIMIT 0,1";
				$result_email = mysqli_query($link,$sql_email);
				if(mysqli_errno($link)){
					$response["success"] = 0;
					$response["message"] = "[ERR01] Terjadi kesalahan, ulangi lagi.";
					echo json_encode($response);
					mysqli_rollback($link);
					return;
				}
				if(mysqli_num_rows($result_email) == 0){
					$response["success"] = 0;
					$response["message"] = "Email belum disetting, Ulangi lagi";
					echo json_encode($response);
					mysqli_rollback($link);
					return;
				}else{ 
					$row_email		= mysqli_fetch_array($result_email);
					$email_member	= $row_email["email"];
				}
				 
				/*AMBILPARSING*/
				$query_parsing= "SELECT * FROM parsingemail";
				$result_parsing = mysqli_query($link,$query_parsing);
				if(mysqli_errno($link)){
					$response["success"] = 0;
					$response["message"] = "[ERR07] Terjadi kesalahan, ulangi lagi.";
					echo json_encode($response);
					mysqli_rollback($link);
					return;
				}
				$emailtmp=$email;
				while($row_parsing = mysqli_fetch_array($result_parsing)){					
					$emailtmp = str_replace($row_parsing["kodeparsing"], $row_email[$row_parsing["fieldparsing"]], $email);					 
				}
				/*END AMBILPARSING*/
				 
				$sql_blast = " insert into blastemail(tanggal,kepada,subjek,email,status,attachment)
						    values('".date("Y-m-d H:i")."','".$email_member."','".$subject."','".$emailtmp."',0,'".$filename."')"; 
				mysqli_query($link,$sql_blast);
				if(mysqli_errno($link)){
					$response["success"] = 0;
					$response["message"] = "[ERR02] Terjadi kesalahan saat menyimpan blast email";
					echo json_encode($response);
					mysqli_rollback($link);
					return;
				}
			}
			
			/*UNIVERSITAS*/
			if($tipe=="@u@"){
				$sql_cek_uni = "SELECT r.*,e.email 
								FROM recipient r
								INNER JOIN daftaremail e ON e.regid=r.regidrec
								WHERE r.kodeuniversitas=".$kode." 
								GROUP BY e.regid
								ORDER BY e.urut ASC";				
				$result_cek_uni = mysqli_query($link,$sql_cek_uni);
				if(mysqli_errno($link)){
					$response["success"] = 0;
					$response["message"] = "[ERR03] Terjadi kesalahan, ulangi lagi.";
					echo json_encode($response);
					mysqli_rollback($link);
					return;
				} 
				if($result_cek_uni->num_rows==0){
					$sql_uni = "select universitas from universitas where kodeuniversitas=".$kode;
					$result_uni = mysqli_query($link,$sql_uni);
					$row_uni = mysqli_fetch_array($result_uni); 
					$message .= "Tidak ada data member di universitas ".$row_uni["universitas"];
				}
				
				while ($row = mysqli_fetch_array($result_cek_uni)) {					 
					
					/*AMBILPARSING*/
					$query_parsing= "SELECT * FROM parsingemail";
					$result_parsing = mysqli_query($link,$query_parsing);
					if(mysqli_errno($link)){
						$response["success"] = 0;
						$response["message"] = "[ERR07] Terjadi kesalahan, ulangi lagi.";
						echo json_encode($response);
						mysqli_rollback($link);
						return;
					}
					$emailtmp=$email;
					while($row_parsing = mysqli_fetch_array($result_parsing)){
						$emailtmp = str_replace($row_parsing["kodeparsing"], $row[$row_parsing["fieldparsing"]], $emailtmp);
					}
					/*END AMBILPARSING*/
					
					$sql_blast = " insert into blastemail(tanggal,kepada,subjek,email,status,attachment)
					    values('".date("Y-m-d H:i")."','".$row["email"]."','".$subject."','".$emailtmp."',0,'".$filename."')";					 
					mysqli_query($link,$sql_blast);
					if(mysqli_errno($link)){
						$response["success"] = 0;
						$response["message"] = "[ERR02] Terjadi kesalahan saat menyimpan blast email";
						echo json_encode($response);
						mysqli_rollback($link);
						return;
					}
				}
			}
			
			/*RECIPIENT & NONRECIPIENT*/
			if($tipe=="@r@" || $tipe=="@n@" ){
				$query = "SELECT r.*,e.email
						  FROM recipient r
						  INNER JOIN daftaremail e ON e.regid=r.regidrec
						  WHERE r.tipekeanggotaan='".strtolower($kode)."'
						  GROUP BY e.regid
						  ORDER BY e.urut ASC"; 
				$result_cek_uni = mysqli_query($link,$query);
				if(mysqli_errno($link)){
					$response["success"] = 0;
					$response["message"] = "[ERR03] Terjadi kesalahan, ulangi lagi.";
					echo json_encode($response);
					mysqli_rollback($link);
					return;
				}
				if($result_cek_uni->num_rows==0){
					$sql_uni = "select universitas from universitas where kodeuniversitas=".$kode;
					$result_uni = mysqli_query($link,$sql_uni);
					$row_uni = mysqli_fetch_array($result_uni);
					$message .= "Tidak ada data member di universitas ".$row_uni["universitas"];
				} 
				
				while ($row = mysqli_fetch_array($result_cek_uni)) {
					
					/*AMBILPARSING*/
					$query_parsing= "SELECT * FROM parsingemail";
					$result_parsing = mysqli_query($link,$query_parsing);
					if(mysqli_errno($link)){
						$response["success"] = 0;
						$response["message"] = "[ERR07] Terjadi kesalahan, ulangi lagi.";
						echo json_encode($response);
						mysqli_rollback($link);
						return;
					}
					$emailtmp=$email;
					while($row_parsing = mysqli_fetch_array($result_parsing)){
						$emailtmp = str_replace($row_parsing["kodeparsing"], $row[$row_parsing["fieldparsing"]], $emailtmp);
					}
					/*END AMBILPARSING*/
					
					$sql_blast = " insert into blastemail(tanggal,kepada,subjek,email,status,attachment)
						    values('".date("Y-m-d H:i")."','".$row["email"]."','".$subject."','".$emailtmp."',0,'".$filename."')";
					mysqli_query($link,$sql_blast);
					if(mysqli_errno($link)){
						$response["success"] = 0;
						$response["message"] = "[ERR04] Terjadi kesalahan saat menyimpan blast email";
						echo json_encode($response);
						mysqli_rollback($link);
						return;
					}
				}
			}
			
			/*KELOMPOK*/
			if($tipe=="@k@"){
				$sql_cek_uni = "SELECT r.*,e.email
								FROM recipient r
								INNER JOIN daftaremail e ON e.regid=r.regidrec
								WHERE r.kodekelompok=".$kode."
								GROUP BY e.regid
								ORDER BY e.urut ASC";
				$result_cek_uni = mysqli_query($link,$sql_cek_uni);
				if(mysqli_errno($link)){
					$response["success"] = 0;
					$response["message"] = "[ERR05] Terjadi kesalahan, ulangi lagi.";
					echo json_encode($response);
					mysqli_rollback($link);
					return;
				}
				if($result_cek_uni->num_rows==0){
					$sql_uni = "select kelompok from kelompok where kodekelompok=".$kode;
					$result_uni = mysqli_query($link,$sql_uni);
					$row_uni = mysqli_fetch_array($result_uni);
					$message .= "Tidak ada data member di Kelompok ".$row_uni["kelompok"];
				} 
				
				while ($row = mysqli_fetch_array($result_cek_uni)) {
					
					/*AMBILPARSING*/
					$query_parsing= "SELECT * FROM parsingemail";
					$result_parsing = mysqli_query($link,$query_parsing);
					if(mysqli_errno($link)){
						$response["success"] = 0;
						$response["message"] = "[ERR07] Terjadi kesalahan, ulangi lagi.";
						echo json_encode($response);
						mysqli_rollback($link);
						return;
					}
					$emailtmp=$email;
					while($row_parsing = mysqli_fetch_array($result_parsing)){
						$emailtmp = str_replace($row_parsing["kodeparsing"], $row[$row_parsing["fieldparsing"]], $emailtmp);
					}
					/*END AMBILPARSING*/
					
					$sql_blast = " insert into blastemail(tanggal,kepada,subjek,email,status,attachment)
						    values('".date("Y-m-d H:i")."','".$row["email"]."','".$subject."','".$emailtmp."',0,'".$filename."')";
					mysqli_query($link,$sql_blast);
					if(mysqli_errno($link)){
						$response["success"] = 0;
						$response["message"] = "[ERR06] Terjadi kesalahan saat menyimpan blast email";
						echo json_encode($response);
						mysqli_rollback($link);
						return;
					}
				}
			}
			
			/*TAHUN*/			
			if($tipe=="@h@"){ 
				$sql_cek_uni = "SELECT r.*,e.email
								FROM recipient r
								INNER JOIN daftaremail e ON e.regid=r.regidrec
								WHERE DATE_FORMAT(r.tglmasukanggota,'%Y')=".date('Y',strtotime($kode))." and e.email is not null
								GROUP BY e.regid
								ORDER BY e.urut ASC";
				$result_cek_uni = mysqli_query($link,$sql_cek_uni); 
				if(mysqli_errno($link)){
					$response["success"] = 0;
					$response["message"] = "[ERR05] Terjadi kesalahan, ulangi lagi.";
					echo json_encode($response);
					mysqli_rollback($link);
					return;
				}
				 
				while ($row = mysqli_fetch_array($result_cek_uni)) {						
					
					/*AMBILPARSING*/
					$query_parsing= "SELECT * FROM parsingemail";
					$result_parsing = mysqli_query($link,$query_parsing);
					if(mysqli_errno($link)){
						$response["success"] = 0;
						$response["message"] = "[ERR07] Terjadi kesalahan, ulangi lagi.";
						echo json_encode($response);
						mysqli_rollback($link);
						return;
					}
					$emailtmp=$email;
					while($row_parsing = mysqli_fetch_array($result_parsing)){
						$emailtmp = str_replace($row_parsing["kodeparsing"], $row[$row_parsing["fieldparsing"]], $emailtmp);
					}
					/*END AMBILPARSING*/
						
					$sql_blast = " insert into blastemail(tanggal,kepada,subjek,email,status,attachment)
						    values('".date("Y-m-d H:i")."','".$row["email"]."','".$subject."','".$emailtmp."',0,'".$filename."')";
					mysqli_query($link,$sql_blast);
					if(mysqli_errno($link)){
						$response["success"] = 0;
						$response["message"] = "[ERR06] Terjadi kesalahan saat menyimpan blast email";
						echo json_encode($response);
						mysqli_rollback($link);
						return;
					}
					$tes = $sql_blast;
				}
			}
			
		}
		
		mysqli_commit($link);
		
		$message .= $this->sendemail()."<br>";
		
		$response["success"] = 1;
		if(strlen($message)>0){
    		$response["message"] = "Blast Email Selesai!.".$message;
		}else{
			$response["message"] = "Blast Email Selesai!";
		}
    	echo json_encode($response);
		 
	}
	public function form_select_row(){
		$kode = $this->input->post("kode");
		echo $kode;
	}
	public function form_delete_row(){
		$kode = $this->input->post("kode");
		
		$rst = $this->mdl_blastemail->select_blast_by_kode($kode);
		$att = $rst->first_row()->attachment;
		$rst = $this->mdl_blastemail->form_delete($kode);
		if($rst==true){
			if(strlen($att)>0){
				unlink('uploads/files/'.$att);
			} 
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_upload(){

		$isemprty = empty($_FILES['fileToUploadPh']['name']);		
		if ($isemprty==1)
		{  
			$this->form_save("");
		}else{
			echo "not emp";
			$target_dir = "uploads/files/";
			$filename     			= str_replace(" ","",$_FILES['fileToUploadPh']['name']);
			$filename     			= str_replace("-","",$filename);
			$filename     			= str_replace("_","",$filename);
			$target_file			= $target_dir.$filename;
				
			if (file_exists($target_file)) {
				unlink($target_file);
			}
			if (move_uploaded_file($_FILES["fileToUploadPh"]["tmp_name"], $target_file)) {
				$this->form_save($filename);
			} else {
				echo "Maaf tidak dapat melakukan upload photo, ulangi lagi.";
			}
		}
	}
	function tes(){
		echo FCPATH;
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
						if(strpos($entry,".")==0){
							$folders .= "<a href='javascript:;' onclick=select_folder('".$entry."')>
										  <p><img src='".base_url()."assets/images/folder.png'>&nbsp;". $entry ."</p>
										 </a>";
						}
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
			$config['allowed_types'] = 'jpg|jpeg|png|gif|mp4';
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
	
	function check_out(){
		$query = "select * from blastemail where status=0";
		$rst = $this->db->query($query);
		echo $rst->num_rows();
	}
}
 