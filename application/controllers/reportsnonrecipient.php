<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reportsnonrecipient extends CI_Controller {
 
	var $perpage = 5;
	var $form_perpage = 10;
	var $page = 'reports';
	var $mod_app = 'page_reports';
	
	function __construct(){
		parent::__construct();
		$this->load->model("mdl_reports");
		$this->load->model("mdl_search");
		$this->load->model("mdl_auth");
		$this->load->model("mdl_referensi");
		$this->load->model("mdl_kelompok");
		$this->load->model("mdl_institusi");
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
		
		$periode1 = date('Y-m',strtotime($this->input->post("txt_tahun1")."-".$this->input->post("slc_bulan1")));
		$periode2 = date('Y-m',strtotime($this->input->post("txt_tahun2")."-".$this->input->post("slc_bulan2")));		
		$institusi = $this->input->post("slc_institusi");
   
		$data['ddl_datainstitusi'] = $this->mdl_institusi->institusi_select_all();
		 
		$data['datatahun'] = $this->mdl_reports->select_tahun_anggotainstitusi($periode1,$periode2,$institusi);		
		if(strlen($this->input->post("txt_tahun1"))>0){
			$data['periode'] = "Periode : ".date('m-Y',strtotime($periode1))." s/d ".date('m-Y',strtotime($periode2));
		}else{
			$data['periode'] = "Periode : -";
		}		
		$data["periode1"] = $periode1;
		$data["periode2"] = $periode2;		
		$data["institusi"] = $institusi;
		 
		$data["namainstitusi"] = "";
		if(strlen($institusi)>0){
			$rstuni = $this->mdl_institusi->institusi_get_byid($institusi);
			if($rstuni->num_rows()){
				$data["namainstitusi"] = "INSTITUSI: ".$rstuni->first_row()->institusi;
			}
		}
		
		$this->load->view('reportsnonrecipient/index',$data);
	} 
  
	public function print_laporan()
	{
		$periode1    = $this->uri->segment(3);
		$periode2    = $this->uri->segment(4);
		$kelompok    = $this->uri->segment(5);
		$universitas = $this->uri->segment(6);	
			
		$periode1 = date('Y-m',strtotime($periode1));
		$periode2 = date('Y-m',strtotime($periode2));
		$kelompok = $kelompok;
		$universitas = $universitas;	 
		$datatahun= $this->mdl_reports->select_tahun_anggota($periode1,$periode2,$kelompok,$universitas);	
		if(strlen($periode1)>0){
			$periode= "Periode : ".date('m-Y',strtotime($periode1))." s/d ".date('m-Y',strtotime($periode2));
		}else{
			$periode= "Periode : -";
		} 
 
		$namakelompok = "";
		if(strlen($kelompok)>0){
			$rstkel = $this->mdl_kelompok->kelompok_get_byid($kelompok,"");
			if($rstkel->num_rows()){
				$namakelompok = "KELOMPOK: ".$rstkel->first_row()->kelompok;
			}
		} 
		$namauniversitas= "";
		if(strlen($universitas)>0){
			$rstuni = $this->mdl_referensi->universitas_get_byid($universitas);
			if($rstuni->num_rows()){
				$namauniversitas = "UNIVERSITAS: ".$rstuni->first_row()->universitas;
			}
		} 
		 
		$col_abj = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE");		 
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
					
		$objPHPExcel = new PHPExcel();		
		$objPHPExcel->getProperties()
		->setCreator("Daftar Pencarian")
		->setTitle("Export Excel Pencarian");
		
		$objset = $objPHPExcel->setActiveSheetIndex(0);
		$objget = $objPHPExcel->getActiveSheet();
		
		$objget->setTitle('Daftar');
		$objset->setCellValue('A1',"Daftar Pencarian ".$periode." ".$namauniversitas." ".$namakelompok);
		$objget->getStyle('A1')->getFont()->setBold(true)
		->setSize(15);
				
		$datauniversitas = $this->mdl_referensi->universitas_select_all();
		$cols = array(); 	 
		$i=0;
		for($x=0;$x<=$datauniversitas->num_rows()+1;$x++){
			array_push($cols, $col_abj[$i]);
			$i++;
		}		
		$val = array("Tahun");  
		foreach ($datauniversitas->result() as $row){
			array_push($val,$row->universitas); 
		}		
		for ($a=0;$a<$datauniversitas->num_rows()+1;$a++)
		{
			$objset->setCellValue($cols[$a].'3', $val[$a]);
			$objget->getStyle($cols[$a].'3')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($cols[$a].'3')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($cols[$a].'3')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($cols[$a].'3')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);		
			$objget->getStyle($cols[$a].'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);		
			$objget->getStyle($cols[$a].'3')->getFont()->setBold(true) ;
		}
		 
		$objset->setCellValue($cols[$a].'3', "Total");
		$objget->getStyle($cols[$a].'3')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objget->getStyle($cols[$a].'3')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objget->getStyle($cols[$a].'3')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objget->getStyle($cols[$a].'3')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objget->getStyle($cols[$a].'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objget->getStyle($cols[$a].'3')->getFont()->setBold(true) ;
				
		$row = 4;
		foreach ($datatahun->result() as $rowTahun){ 
			$objset->setCellValue($cols[0].$row, $rowTahun->tahun);
		 	
			$total  = 0;
			$column = 1;
			foreach ($datauniversitas->result() as $item){ 
				$subtotal = 0;
				$datajmluni = $this->mdl_reports->count_universitas_by($rowTahun->tahun,$periode1,$periode2,$item->kodeuniversitas,$kelompok,$universitas);
				if($datajmluni->num_rows()>0){					
					$subtotal = $datajmluni->num_rows();
					$total = $total+$subtotal;
				}	
				$objset->setCellValue($cols[$column].$row, $subtotal);
				$column++;
			}
			$objset->setCellValue($cols[$column].$row, $total);
			$row++;
		}
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('uploads/exportuniversitas.xls');
		header('Location: '.base_url()."uploads/exportuniversitas.xls");		
	}
	 
	public function detail()
	{  		
		$tahun = $this->uri->segment(3);
		$kodeuniversitas = $this->uri->segment(4);
		$data['rowdetail'] = $this->mdl_reports->select_detail($kodeuniversitas,$tahun);
		$data['tahun'] = $tahun;
		$data['kodeuniversitas'] = $kodeuniversitas;
		$this->load->view('reports/detail',$data);
	}
	public function detail_print()
	{
		$tahun = $this->uri->segment(3);
		$kodeuniversitas = $this->uri->segment(4);			
		if($kodeuniversitas == "ALL"){$kodeuniversitas="";} 
		$namauniversitas= "";
		if(strlen($kodeuniversitas)>0){
			$rstuni = $this->mdl_referensi->universitas_get_byid($kodeuniversitas);
			if($rstuni->num_rows()){
				$namauniversitas = "UNIVERSITAS: ".$rstuni->first_row()->universitas;
			}
		}		
		$rowdetail = $this->mdl_reports->select_detail($kodeuniversitas,$tahun);		
		$col_abj = array("A","B");
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory')); 
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()
		->setCreator("Export Fakultas")
		->setTitle("Export Excel Fakultas"); 
		$objset = $objPHPExcel->setActiveSheetIndex(0);
		$objget = $objPHPExcel->getActiveSheet(); 
		$objget->setTitle('Daftar');
		$objset->setCellValue('A1',"Export Fakultas ".$namauniversitas." Tahun: ".$tahun);
		$objget->getStyle('A1')->getFont()->setBold(true)
		->setSize(15); 
		$val = array("Fakultas","Jumlah");
		for ($a=0;$a<2;$a++)
		{
			$objset->setCellValue($col_abj[$a].'3', $val[$a]);
			$objget->getStyle($col_abj[$a].'3')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($col_abj[$a].'3')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($col_abj[$a].'3')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($col_abj[$a].'3')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($col_abj[$a].'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objget->getStyle($col_abj[$a].'3')->getFont()->setBold(true) ;
		} 
		$total = 0;
		$row = 4;
		foreach ($rowdetail->result() as $item){
			$objset->setCellValue($col_abj[0].$row, $item->fakultas);		 
			$objset->setCellValue($col_abj[1].$row, $item->jumlah);
			$total = $total+$item->jumlah;
			$row++;
		} 
		$objset->setCellValue($col_abj[0].$row, "Total");
		$objset->setCellValue($col_abj[1].$row, $total); 
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('uploads/exportfakultas.xls');
		header('Location: '.base_url()."uploads/exportfakultas.xls");
	}
	public function detailanggota()
	{ 
		$periode1 = $this->uri->segment(3);
		$periode2 = $this->uri->segment(4);
		$institusi = $this->uri->segment(5);	
		
		$data['rowdetail'] = $this->mdl_reports->select_detailanggotainstitusi($institusi,$periode1,$periode2);
		$data["institusi"] = $institusi;
		$data["periode1"] = $periode1;
		$data["periode2"] = $periode2;
		
		$namainstitusi = "";
		if(strlen($institusi)){
			$rst = $this->mdl_institusi->institusi_get_byid($institusi);
			if($rst){
				$namainstitusi = $rst->first_row()->institusi;
			}
		}
		$data['namainstitusi'] = $namainstitusi;
		$this->load->view('reportsnonrecipient/detailanggota',$data);
	}
	
	public function detailanggota_print()
	{
		$universitas = "";
		$tahun = $this->uri->segment(3);
		$kodeuniversitas = $this->uri->segment(4);
		$fakultas = $this->uri->segment(5);
			
		if($kodeuniversitas=="ALL"){
			$kodeuniversitas = "";
		}else{
			$rst = $this->mdl_referensi->universitas_get_byid($kodeuniversitas);
			if($rst->num_rows()){
				$universitas = $rst->first_row()->universitas;
			}
		}
		$rowdetail = $this->mdl_reports->select_detailanggota($kodeuniversitas,$fakultas,$tahun);

		if(strlen($universitas)>0){$universitas=" Universitas: ".$universitas." ";}
		if(strlen($fakultas)>0){$fakultas=" Fakultas: ".$fakultas." ";}
		
		$col_abj = array("A","B","C","D","E","F","G","H","I","J","K");
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()
		->setCreator("Export Data Anggota")
		->setTitle("Export Excel Anggota");
		$objset = $objPHPExcel->setActiveSheetIndex(0);
		$objget = $objPHPExcel->getActiveSheet();
		$objget->setTitle('Daftar');
		$objset->setCellValue('A1',"Export Data Anggota ".$universitas.$fakultas.$tahun);
		$objget->getStyle('A1')->getFont()->setBold(true)
		->setSize(15);
		$val = array("No Anggota","Nama","Jenis Kelamin","Alamat","Universitas","Fakultas","Program Studi","Tgl.Masuk","Kelompok","Telepon","Email");
		for ($a=0;$a<11;$a++)
		{
			$objset->setCellValue($col_abj[$a].'3', $val[$a]);
			$objget->getStyle($col_abj[$a].'3')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($col_abj[$a].'3')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($col_abj[$a].'3')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($col_abj[$a].'3')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objget->getStyle($col_abj[$a].'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objget->getStyle($col_abj[$a].'3')->getFont()->setBold(true) ;
		}
		
		$row = 4;
		foreach ($rowdetail->result() as $item){
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
			$jeniskelamin = "";
			switch($rowItem->jeniskelamin){
				case 0:
					$jeniskelamin="Perempuan";
					break;
				case 1:
					$jeniskelamin="Laki-Laki";
					break;
			}
			
			$objset->setCellValue($col_abj[0].$row, $item->noanggota);
			$objset->setCellValue($col_abj[1].$row, $item->namalengkap);
			$objset->setCellValue($col_abj[2].$row, $jeniskelamin);
			$objset->setCellValue($col_abj[3].$row, $item->alamat);
			$objset->setCellValue($col_abj[4].$row, $item->universitas);
			$objset->setCellValue($col_abj[5].$row, $item->fakultas);
			$objset->setCellValue($col_abj[6].$row, $item->programstudi);
			$objset->setCellValue($col_abj[7].$row, date('d-m-Y',strtotime($rowItem->tglmasukanggota)));
			$objset->setCellValue($col_abj[8].$row, $item->kelompok);
			$objset->setCellValue($col_abj[9].$row, $telepon);
			$objset->setCellValue($col_abj[10].$row, $email);
		  
			$row++;
		}
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('uploads/exportlaporananggota.xls');
		header('Location: '.base_url()."uploads/exportlaporananggota.xls");
	}
}
 