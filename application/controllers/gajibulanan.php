<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gajibulanan extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 20;
	var $page = 'gajibulanan';
	var $mod_app = 'page_gajibulanan';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_recipient");
		$this->load->model("mdl_kelompok");						//$this->load->model("mdl_gajibulanan");
		$this->load->model("mdl_institusi");
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
		
		$totalRowsKedudukan = $this->mdl_referensi->kedudukan_get_all(true,0,0,"")->num_rows();
		$config_kedudukan = $this->config_pagination_all(site_url('recipient/kedudukan_pagging'),$totalRowsKedudukan,$this->perpage,'pagingkedudukan');
		$this->pagination->initialize($config_kedudukan);
		$data['pagingkedudukan'] =  $this->pagination->create_links();
		$data['datakedudukan'] = $this->mdl_referensi->kedudukan_get_all(false,0,$this->perpage,"");
		$data['ddl_datakedudukan'] = $this->mdl_referensi->kedudukan_select_all();
				
		$totalRowsJabatan = $this->mdl_referensi->jabatan_get_all(true,0,0,"")->num_rows();
		$config = $this->config_pagination_all(site_url('recipient/jabatan_pagging'),$totalRowsJabatan,$this->perpage,'pagingjabatan');
		$this->pagination->initialize($config);
		$data['pagingjabatan'] =  $this->pagination->create_links();
		$data['datajabatan'] = $this->mdl_referensi->jabatan_get_all(false,0,$this->perpage,"");
		$data['ddl_datajabatan'] = $this->mdl_referensi->jabatan_select_all();

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
						$totalRowsGajikaryawan = $this->mdl_referensi->gajikaryawan_get_all(true,0,0,"",0)->num_rows();		$config = $this->config_pagination_all(site_url('gajibulanan/universitas_pagging'),$totalRowsGajikaryawan,$this->perpage,'paginggajikaryawan');		$this->pagination->initialize($config);		$data['paginggajikaryawan'] =  $this->pagination->create_links();		$data['datagajikaryawan'] = $this->mdl_referensi->gajikaryawan_get_all(false,0,$this->perpage,"",0);		$data['ddl_datapotongangajikaryawan'] = $this->mdl_referensi->gajikaryawan_get_bypotongan(0);		$data['ddl_datatunjangangajikaryawan'] = $this->mdl_referensi->gajikaryawan_get_bytunjangan(0);						$totalRowsKomponengaji = $this->mdl_referensi->komponengaji_get_all(true,0,0,"")->num_rows();		$config_komponengaji = $this->config_pagination_all(site_url('gajibulanan/komponengaji_pagging'),$totalRowsKomponengaji,$this->perpage,'pagingkomponengaji');		$this->pagination->initialize($config_komponengaji);				$data['pagingkomponengaji'] =  $this->pagination->create_links();				$data['datakomponengaji'] = $this->mdl_referensi->komponengaji_get_all(false,0,$this->perpage,"",0);				$data['ddl_datakomponen'] = $this->mdl_referensi->komponengaji_select_all();		$data['ddl_datakomponenpotongan'] = $this->mdl_referensi->komponenpotongan_select_all();		$data['ddl_datakomponentunjangan'] = $this->mdl_referensi->komponentunjangan_select_all();		$data['ddl_datakelompokkomponen'] = $this->mdl_referensi->kelompokkomponen_select_all();						
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
		
		$this->load->view('gajibulanan/index',$data);
	}
		/****************************************GAJI KARYAWAN*****************************************/
	public function gajikaryawan_save(){
		$kode  = $this->input->post("txt_kodegajikaryawan");				$data['kodekomponengaji'] = $this->input->post("div_komponen");
		$data['regidrec'] = $this->input->post("txt_regid");		$data['jumlah'] = $this->input->post("txt_jumlah");		
		$rst = $this->mdl_referensi->gajikaryawan_save($data,$kode);		if($rst==""){			$response["success"] = FALSE;			$response["message"] = "Maaf komponen tersebut sudah terdaftar";			echo json_encode($response);		}else{			$response["success"] = true;			$response["message"] = "Berhasil, data telah disimpan";			echo json_encode($response);		}
	}
	public function gajikaryawan_pagging($id=0)
	{
		$txt_regid = $this->input->post("txt_regid"); 
		$txt_search = $this->input->post("txt_search-gajikaryawan");
		$totalRows = $this->mdl_referensi->gajikaryawan_get_all(true,0,0,$txt_search,$txt_regid)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('gajibulanan/gajikaryawan_pagging'),$totalRows,$this->perpage,'paginggajikaryawan');
	
		$this->pagination->initialize($config);
		$data['paginggajikaryawan'] =  $this->pagination->create_links();
	
		$data['datagajikaryawan'] = $this->mdl_referensi->gajikaryawan_get_all(false,$id,$this->perpage,$txt_search,$txt_regid);
		$this->load->view('gajibulanan/gajikaryawan/datatable',$data);
	}
	public function gajikaryawan_select_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid"); 
		$rst = $this->mdl_referensi->gajikaryawan_get_byid($kode,$txt_regid);
		echo json_encode($rst->first_row());
	}
	public function gajikaryawan_delete_row(){
		$kode = $this->input->post("kode");
		$txt_regid = $this->input->post("txt_regid");
		$rst = $this->mdl_referensi->gajikaryawan_delete($kode,$txt_regid);
		if($rst==true){
			echo "Data sudah dihapus!";
		}else{
			echo "Gagal menghapus data, ulangi beberapa saat lagi";
		}
	}
	function form_get_gajikaryawan(){
		$kode = $this->input->post("kode");
		$data['ddl_datapotongangajikaryawan'] = $this->mdl_referensi->gajikaryawan_get_bypotongan($kode);		$data['ddl_datatunjangangajikaryawan'] = $this->mdl_referensi->gajikaryawan_get_bytunjangan($kode);		
		$this->load->view("gajibulanan/gajikaryawan/index",$data);
	}
	/****************************************END GAJIKARYAWAN************************************/
		/****************************************KOMPONEN GAJI KARYAWAN*****************************************/
	function form_get_komponengajikaryawan(){		$data['ddl_datakomponenpotongan'] = $this->mdl_referensi->komponenpotongan_select_all();		$data['ddl_datakomponentunjangan'] = $this->mdl_referensi->komponentunjangan_select_all();				$data['ddl_datakomponen'] = $this->mdl_referensi->komponengaji_select_all();		
		$this->load->view("gajibulanan/gajikaryawan/index",$data);
	}		public function komponengaji_save(){		$kode  = $this->input->post("txt_kodekomponengaji");		$data['namakomponengaji'] = $this->input->post("txt_namakomponengaji");				$data['potongan'] = $this->input->post("div_potongan");			$data['kodekelompokkompgaji'] = $this->input->post("div_komponen");			$data['aktif'] = $this->input->post("div_status");				$rst = $this->mdl_referensi->komponengaji_save($data,$kode);		if($rst==""){			$response["success"] = FALSE;			$response["message"] = "Maaf komponengaji tersebut sudah terdaftar";			echo json_encode($response);		}else{			$response["success"] = true;			$response["message"] = "Berhasil, data telah disimpan";			echo json_encode($response);		}	}	public function komponengaji_pagging($id=0)	{		$txt_search = $this->input->post("txt_search-komponengaji");		$totalRows = $this->mdl_referensi->komponengaji_get_all(true,0,0,$txt_search)->num_rows();		$this->load->library('pagination');		$config = $this->config_pagination_all(site_url('gajibulanan/komponengaji_pagging'),$totalRows,$this->perpage,'pagingkomponen');				$this->pagination->initialize($config);		$data['pagingkomponengaji'] =  $this->pagination->create_links();		$data['ddl_datakomponen'] = $this->mdl_referensi->komponengaji_select_all();		$data['datakomponengaji'] = $this->mdl_referensi->komponengaji_get_all(false,$id,$this->perpage,$txt_search);				$this->load->view('gajibulanan/datatable2',$data);	}	public function komponengaji_select_row(){		$kode = $this->input->post("kode");		$rst = $this->mdl_referensi->komponengaji_get_byid($kode);		echo json_encode($rst->first_row());	}	public function komponengaji_delete_row(){		$kode = $this->input->post("kode");		$rst = $this->mdl_referensi->komponengaji_delete($kode);		if($rst==true){			echo "Data sudah dihapus!";		}else{			echo "Gagal menghapus data, ulangi beberapa saat lagi";		}	}	public function form_get_komponengaji(){		$komponengaji = '<option value="0">Pilih komponengaji</option>';		$ddl_datakomponengaji= $this->mdl_referensi->komponengaji_select_all();		foreach($ddl_datakomponengaji->result() as $kelRow) {			$komponengaji .= '<option value="'.$kelRow->kodekomponengaji.'">'.$kelRow->komponengaji.'</option>';		}		echo $komponengaji;	}
	/****************************************END KOMPONEN GAJIKARYAWAN************************************/


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
	// simpan
	function form_save(){ 
		$id = $this->input->post("txt_regid");
		$tglmasuk = $this->input->post("txt_tglmasukanggota");
		$tmtcpns = $this->input->post("txt_tmtcpns");
		$tmtpns = $this->input->post("txt_tmtpns");
		$lulusawal = $this->input->post("txt_lulusawal");
		$lulusakhir = $this->input->post("txt_lulusakhir");
		$diklatstruktural1 = $this->input->post("txt_tgldiklat1");
		$diklatstruktural2 = $this->input->post("txt_tgldiklat2");
		$diklatstruktural3 = $this->input->post("txt_tgldiklat3");
		$diklatstruktural4 = $this->input->post("txt_tgldiklat4");
		$diklatstruktural5 = $this->input->post("txt_tgldiklat5");
		$tmteseleon = $this->input->post("txt_tmteseleon");
		$tmtjafung = $this->input->post("txt_tmtjafung");
		$tmtjafungumum = $this->input->post("txt_tmtjafungumum");
		$tmtgolawal = $this->input->post("txt_tmtgolawal");
		$tmtgolakhir = $this->input->post("txt_tmtgolakhir");
		$tglaktalahir = $this->input->post("txt_tglaktalahir");
		$tglnpwp = $this->input->post("txt_tglnpwp");
		// $kode_kelompok = $this->input->post("div_kelompok");
		// $kode_universitas = $this->input->post("div_universitas");		
		$nomoranggota = $this->input->post("txt_noanggota");
		 
		// if(strlen($nomoranggota)==0){			
		// 	$kel_rows = $this->mdl_kelompok->kelompok_get_byid($kode_kelompok,$this->page);
		// 	if($kel_rows->num_rows()==0){
		// 		$response['status'] = true;
		// 		$response['id'] = 0;
		// 		$response['pesan'] = "Kelompok belum disetting, hubungi administrator";
		// 		echo json_encode($response);
		// 		return;
		// 	}
		// 	$kel_singkatan = $kel_rows->first_row()->singkatan; 
		// 	$uni_rows = $this->mdl_referensi->universitas_get_byid($kode_universitas);
		// 	if($uni_rows->num_rows()==0){
		// 		$response['status'] = true;
		// 		$response['id'] = 0;
		// 		$response['pesan'] = "Universitas belum disetting, hubungi administrator";
		// 		echo json_encode($response);
		// 		return;
		// 	}
			 
		// 	$uni_singkatan = $uni_rows->first_row()->singkatan;								
		// 	$noanggota = $kel_singkatan.date('y',strtotime($tglmasuk)).$uni_singkatan; 
		// 	$newnoanggota = $noanggota.$this->mdl_recipient->generate_number($noanggota); 
		// 	$data['noanggota'] = $newnoanggota;
		// 	$nomoranggota      = $newnoanggota;
		// }else{
			$data['noanggota'] = $this->input->post("txt_noanggota");
			$nomoranggota      = $data['noanggota']; 
		// }	
		
		$data['nipbaru'] = $this->input->post("txt_nipbaru");
		$data['niplama'] = $this->input->post("txt_niplama");
		$data['namalengkap'] = $this->input->post("txt_namalengkap");
		$data['gelardpn'] = $this->input->post("txt_gelardpn");
		$data['gelarblk'] = $this->input->post("txt_gelarblkg");
		$data['tempatlahir'] = $this->input->post("txt_tempatlahir");
		$data['tanggallahir'] = date('Y-m-d',strtotime($this->input->post("txt_tanggallahir")));
		$data['kodekomponengaji'] = $this->input->post("div_agama");
		$data['jeniskelamin'] = $this->input->post("rad_jk");
		$data['usia'] = $this->input->post("txt_usia");
		$data['kodekawin'] = $this->input->post("div_kawin");
		$data['alamat'] = $this->input->post("txt_alamat");
		$data['kodepos'] = $this->input->post("txt_pos");
		$data['jns_kepeg'] = $this->input->post("txt_jnspeg");
		$data['kodekedudukan'] = $this->input->post("div_kedudukan");
		$data['kodejabatan'] = $this->input->post("div_jabatan");
		$data['statuspeg'] = $this->input->post("rad_stat");
		$data['kodejenjangawl'] = $this->input->post("div_jenjangawal");
		$data['kodejenjangakh'] = $this->input->post("div_jenjangakhir");
		$data['unitorganisasi'] = $this->input->post("txt_unitorg");
		$data['jabstruk'] = $this->input->post("txt_jabstruk");
		$data['kodejabatan'] = $this->input->post("div_jabatan");
		$data['eseleon'] = $this->input->post("txt_eseleon");
		$data['jafung'] = $this->input->post("txt_jafung");
		$data['jafungumum'] = $this->input->post("txt_jafungumum");
		$data['golawal'] = $this->input->post("txt_golawal");
		$data['golakhir'] = $this->input->post("txt_golakhir");
		$data['gajipokokbaru'] = $this->input->post("txt_gajipokok");
		$data['kodegoldar'] = $this->input->post("div_goldar");
		$data['nokarpeg'] = $this->input->post("txt_nokarpeg");
		$data['nokaris'] = $this->input->post("txt_nokaris");
		$data['noaktalahir'] = $this->input->post("txt_noaktalahir");
		$data['noaskes'] = $this->input->post("txt_noaskes");
		$data['notaspen'] = $this->input->post("txt_notaspen");
		$data['nonpwp'] = $this->input->post("txt_nonpwp");
		$data['tmtcpns'] = date('Y-m-d',strtotime($tmtcpns));
		$data['tmtpns'] = date('Y-m-d',strtotime($tmtpns));
		$data['lulusawal'] = date('Y-m-d',strtotime($lulusawal));
		$data['lulusakhir'] = date('Y-m-d',strtotime($lulusakhir));
		$data['diklatstruktural1'] = date('Y-m-d',strtotime($diklatstruktural1));
		$data['diklatstruktural2'] = date('Y-m-d',strtotime($diklatstruktural2));
		$data['diklatstruktural3'] = date('Y-m-d',strtotime($diklatstruktural3));
		$data['diklatstruktural4'] = date('Y-m-d',strtotime($diklatstruktural4));
		$data['diklatstruktural5'] = date('Y-m-d',strtotime($diklatstruktural5));
		$data['tmteseleon'] = date('Y-m-d',strtotime($tmteseleon));
		$data['tmtjafung'] = date('Y-m-d',strtotime($tmtjafung));
		$data['tmtjafungumum'] = date('Y-m-d',strtotime($tmtjafungumum));
		$data['tmtgolawal'] = date('Y-m-d',strtotime($tmtgolawal));
		$data['tmtgolakhir'] = date('Y-m-d',strtotime($tmtgolakhir));
		$data['tglaktalahir'] = date('Y-m-d',strtotime($tglaktalahir));
		$data['tglnpwp'] = date('Y-m-d',strtotime($tglnpwp));
		$data['tipekeanggotaan'] = "recipient";

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