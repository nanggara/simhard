<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 4;
	var $page = 'search';
	var $mod_app = 'page_search';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_search");
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
		 
		$totalRowsForm = $this->mdl_search->form_get_all(true,0,0,$this->init_filter())->num_rows();
		$form_config = $this->config_pagination_all(site_url('search/form_pagging'),$totalRowsForm,$this->form_perpage,'form_paging');
		$this->pagination->initialize($form_config);
		$data['form_paging'] =  $this->pagination->create_links();
		$data['keyword'] = "";
		$data['totalRows'] = $totalRowsForm;
		$data['dataform'] = $this->mdl_search->form_get_all(false,0,$this->form_perpage,$this->init_filter());
		$data['execution_time'] = 0;
		$this->load->view('search/index',$data);
	} 
 
	public function init_filter(){
		$filter['hdn_search']      = "";
		$filter['ddl_filter1']     = "";
		$filter['ddl_like1']       = "";
		$filter['txt_search_adv1'] = "";
		$filter['ddl_op1'] 		   = ""; 
		$filter['ddl_filter2']     = "";
		$filter['ddl_like2']       = "";
		$filter['txt_search_adv2'] = "";
		$filter['ddl_op2'] 		   = ""; 
		$filter['ddl_filter3']     = "";
		$filter['ddl_like3']       = "";
		$filter['txt_search_adv3'] = ""; 
		$filter['txt_search']	   = "&0&";
		return $filter;
	}

	public function form_pagging($id=0)
	{		
		$filter['hdn_search']      = $this->input->post("hdn_search"); 
		$filter['ddl_filter1']     = $this->input->post("ddl_filter1");
		$filter['ddl_like1']       = $this->input->post("ddl_like1");
		if(strlen($this->input->post("txt_search_adv1"))==0){
			$filter['txt_search_adv1'] = "&0&";
		}else{
			$filter['txt_search_adv1'] = $this->input->post("txt_search_adv1");
		} 
		$filter['ddl_op1'] 		   = $this->input->post("ddl_op1");
		 
		$filter['ddl_filter2']     = $this->input->post("ddl_filter2");
		$filter['ddl_like2']       = $this->input->post("ddl_like2");
		$filter['txt_search_adv2'] = $this->input->post("txt_search_adv2");
		$filter['ddl_op2'] 		   = $this->input->post("ddl_op2");
				 
		$filter['ddl_filter3']     = $this->input->post("ddl_filter3");
		$filter['ddl_like3']       = $this->input->post("ddl_like3");
		$filter['txt_search_adv3'] = $this->input->post("txt_search_adv3"); 
		
		if(strlen($this->input->post("txt_search"))==0){
			$filter['txt_search']	   = "&0&";
		}else{
			$filter['txt_search']	   = $this->input->post("txt_search");
		}
		
		$start = microtime(true);
		
		$txt_search = $this->input->post("txt_search");
		$totalRows = $this->mdl_search->form_get_all(true,0,0,$filter)->num_rows();
		$this->load->library('pagination');
		$config = $this->config_pagination_all(site_url('search/form_pagging'),$totalRows,$this->form_perpage,'form_paging');
	
		$this->pagination->initialize($config);
		$data['form_paging'] =  $this->pagination->create_links();
		$data['keyword'] = $txt_search;
		$data['totalRows'] = $totalRows;
		$data['dataform'] = $this->mdl_search->form_get_all(false,$id,$this->form_perpage,$filter);
		 
		$end = microtime(true); 
		$data['execution_time'] =  number_format(($end - $start), 2);
		 
		$this->load->view('search/datatable',$data);
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
	 
	function on_print_pdf(){
		require('assets/library/fpdf17/fpdf.php');
		$txt_cari = str_replace("%20"," ",$this->uri->segment(3));
		if(strlen($txt_cari)==0){
			 
		}
		
		$filter['hdn_search'] = str_replace("%20"," ",$this->input->post("hdn_search"));
		$filter['txt_search'] = $txt_cari;
		$data = $this->mdl_search->form_get_all(false,0,100000,$filter);
		
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',19);
		
		if(strlen($txt_cari)==0){
			$pdf->Cell(40,10,'Ditemukan '.$data->num_rows()." data ");
		}else{		
			$pdf->Cell(40,10,'Ditemukan '.$data->num_rows()." data untuk : ".$txt_cari);
		}
		$pdf->Ln(15);
		$pdf->SetFont('Arial','',11);
		foreach($data->result() as $item){
			$jeniskelamin = "Laki-Laki";
			if($item->jeniskelamin==0){
				$jeniskelamin = "Perempuan";
			}
			
			$pdf->Cell(40,10,$item->namalengkap);
			$pdf->Ln(6);
			$pdf->Cell(40,10,"Nama :".$item->namalengkap." | Alamat : ".$item->alamat." | Jenis Kelamin: ".$jeniskelamin." | Email: ".$item->email);
			$pdf->Ln(6);
			$pdf->Cell(40,10,"Catatan:".$item->catatan);
			$pdf->Ln(12);
		} 
		
		/*$pdf->SetFont('Arial','',11); 
		$pdf->Cell(50,5,'Words HereWords Here',1,0,'L',0);
		$pdf->Cell(50,5,'Words Here',1,0,'L',0);
		$pdf->Cell(50,5,'Words Here',1,0,'L',0);
		$pdf->Cell(50,5,'Words Here',1,0,'L',0); 
		*/
		
		$pdf->Output();
	}
	
	function show_data_keluarga($pdf,$regidrec){
		/* TES WRAP */
		$pdf->Ln(15);
		$pdf->Cell(40,10,"Data Keluarga");
		$pdf->Ln(10);
		$header = array("Nama", "Status", "Pekerjaan", "Pendidikan Terakhir", "Usia", "Jenis Kelamin");
		
		$data = array();
		$datakeluarga2 = $this->mdl_referensi->keluarga_get_byanggota(regidrec);
		foreach ($datakeluarga2->result() as $itemkel){
			$jeniskelamin_kel = "Laki-Laki";
			if($itemkel->usia==0){
				$jeniskelamin_kel = "Perempuan";
			}
			$data[] = array($itemkel->nama, $itemkel->status, $itemkel->pekerjaan, $itemkel->pendidikanterakhir,$itemkel->usia, $jeniskelamin_kel);
		}
		$w = array(43, 15, 40, 40, 20, 30);
		for($i = 0; $i < count($header); $i++) {
			$pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
		}
		$pdf->Ln();
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$i = 0;
		foreach($data as $row)
		{
			$y1 = $pdf->GetY();
			$pdf->MultiCell($w[0], 6, $row[0], 'LRB');
			$y2 = $pdf->GetY();
			$yH = $y2 - $y1;
				
			$pdf->SetXY($x + $w[0], $pdf->GetY() - $yH);
				
			$pdf->Cell($w[1], $yH, $row[1], 'LRB');
			$pdf->Cell($w[2], $yH, $row[2], 'LRB');
			$pdf->Cell($w[3], $yH, $row[3], 'LRB');
			$pdf->Cell($w[4], $yH, $row[4], 'LRB');
			$pdf->Cell($w[5], $yH, $row[5], 'LRB');
				
			$pdf->Ln();
				
			$i++;
		}
		$pdf->Ln(10);
	}
	
	function on_print_cv(){
		$this->load->library("FPDF_AutoWrapTable"); 
		$txt_cari = $this->uri->segment(3); 
		$data_header = $this->mdl_search->member_select_by_id($txt_cari);
		if($data_header->num_rows()==0){
			$data_header  = $this->mdl_search->member_select_by_regidrec($txt_cari);
		} 
		$options = array(
				'filename' => '', 
				'destinationfile' => '', 
				'paper_size'=>'F4',	 
				'orientation'=>'P' 
		); 
		$tabel = new FPDF_AutoWrapTable($options);
		$tabel->printPDF($data_header); 
	}
 
	
	function on_print_excel()
	{
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		 
		
		$objPHPExcel = new PHPExcel();
	
		// Set properties
		$objPHPExcel->getProperties()
		->setCreator("Daftar Pencarian") //creator
		->setTitle("Export Excel Pendarian");  //file title
	
		$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
		$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
	
		$objget->setTitle('Daftar'); //sheet title
		$objset->setCellValue('A1',"Daftar Pencarian"); //insert cell value
		$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
		->setSize(15);    //set font size
	
		//table header
		$cols = array("A","B","C","D","E","F","G","H","I","J","K");
		$val = array("Kode","Nama","Alamat","Universitas","Fakultas","Program Studi","Tgl. Masuk","Jenis Kelamin","Kelompok","Telepon","Email");
		for ($a=0;$a<11;$a++)
		{
				$objset->setCellValue($cols[$a].'3', $val[$a]);
				//set borders
				$objget->getStyle($cols[$a].'3')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objget->getStyle($cols[$a].'3')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objget->getStyle($cols[$a].'3')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objget->getStyle($cols[$a].'3')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	
				//set alignment
				$objget->getStyle($cols[$a].'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols[$a].'3')->getFont()->setBold(true) ;
		}
	
		$txt_cari = $this->uri->segment(3);
		$filter['hdn_search'] = $this->input->post("hdn_search");
		$filter['txt_search'] = $txt_cari;
		$dataform = $this->mdl_search->form_get_all(false,0,100000,$filter);
		$row = 4;
		foreach ($dataform->result() as $item){
			$telepon     = "";
			$rst_telepon = $this->mdl_search->form_telepon_selectbyid($item->regidrec);
			if($rst_telepon->num_rows()){
				$telepon = $rst_telepon->first_row()->telepon;
			}
			
			$email       = "";
			$rst_email   = $this->mdl_search->form_email_selectbyid($item->regidrec);
			if($rst_email->num_rows()){
				$email = $rst_email->first_row()->email;
			}
			
			
			$objset->setCellValue($cols[0].$row, $item->noanggota);
			$objset->setCellValue($cols[1].$row, $item->namalengkap);
			$objset->setCellValue($cols[2].$row, $item->alamat);
			$objset->setCellValue($cols[3].$row, $item->universitas);
			$objset->setCellValue($cols[4].$row, $item->fakultas);
			$objset->setCellValue($cols[5].$row, $item->programstudi);
			$objset->setCellValue($cols[6].$row, date('d-m-Y',strtotime($item->tglmasukanggota)));
			$objset->setCellValue($cols[7].$row, $item->jeniskelamin);
			$objset->setCellValue($cols[8].$row, $item->kelompok);
			$objset->setCellValue($cols[9].$row, $telepon);
			$objset->setCellValue($cols[10].$row, $email);
			$row++;
		}
		 
		
		//simpan dalam file sample.xls
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('uploads/exportpencarian.xls');
		header('Location: '.base_url()."uploads/exportpencarian.xls");	 
	}
	
	
}
 