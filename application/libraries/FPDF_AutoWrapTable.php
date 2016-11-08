<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require('assets/library/fpdf17/fpdf.php');
 
class FPDF_AutoWrapTable extends FPDF { 
  	private $options = array(
  		'filename' => '',
  		'destinationfile' => '',
  		'paper_size'=>'F4',
  		'orientation'=>'P'
  	);
 
  	function __construct( $options = array()) {
    	parent::__construct();
    	$this->CI =& get_instance(); 
    	$this->options = $options;
	}
 
	public function rptDetailData ($data) {
		$this->CI->load->model("mdl_search");
		
		$border = 0;
		$this->AddPage();
		$this->SetAutoPageBreak(true,60);
		$this->AliasNbPages();
		$left = 25;

		/*$photouni  = $data->first_row()->photo;
		if(strlen($photouni)){ 
			$this->Image($photouni, 50, $this->GetY(), 100);
		}
		*/
		$photo  = $data->first_row()->photoprofil;
		/*if(file_exists(strlen($photo))){
			if(strlen($photo)){
		//$photo = "uploads/photo/index.png";
			//$this->Image($photo,430, 220, 120 ,130);
			$photo = "uploads/photo/".$photo;
			$this->Image($photo,430, 220, 120 ,130);
		}
		else{
		
		}
		}*/
		
		if(file_exists('uploads/photo/'.$photo)){
		if(strlen($photo)){
			$photo = "uploads/photo/".$photo;
			$this->Image($photo,480, 30, 80 ,80);
			}
		}else{
			$photo = "uploads/photo/index.png";
			$this->Image($photo,430, 220, 120 ,130);
			}
		
		//else{
		//if(strlen($photo)){
			
			
		//}
		// print cv
		//header
		$image1 = "assets/themes/inspinia/images/logos.png";
		$this->Ln(6);
		$this->Image($image1, 50, $this->GetY(), 60);	
		// $this->Ln(130);
		$this->SetFont("", "B", 10);
		$this->SetX($left); $this->Cell(0, 10, 'PEMERINTAH KOTA LANGSA', 0, 1,'C');
		$this->Ln(6);
		$this->SetX($left); $this->Cell(0, 10, 'BADAN KEPEGAWAIAN PENDIDIKAN DAN PELATIHAN KOTA LANGSA', 0, 1,'C');
		$this->Ln(6);
		$this->SetX($left); $this->Cell(0, 10, 'FORMULIR', 0, 1,'C');
		$this->Ln(6);
		$this->SetX($left); $this->Cell(0, 10, 'PEREMAJAAN DATA PEGAWAI NEGERI SIPIL', 0, 1,'C');
		$this->Ln(6);
		$this->SetX($left); $this->Cell(0, 10, 'DI LINGKUNGAN PEMERINTAH KOTA LANGSA TAHUN 2016', 0, 1,'C');
		$this->Ln(20);
 
		$this->SetFont('Arial','',10);
		foreach($data->result() as $item){
			$jeniskelamin = "Laki-Laki";
			if($item->jeniskelamin==0){
				$jeniskelamin = "Perempuan";
			}
			
			$this->Cell(0,10,"I 		DATA UTAMA");
			$this->Ln(25);
			$this->Cell(0,10,"Nip Baru                       : ".$item->nipbaru, 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Nip Lama                      : ".$item->niplama, 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Gelar Depan                 : ".$item->gelardpn."					Gelar Belakang		:".$item->gelarblk, 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Tempat Lahir                : ".$item->tempatlahir, 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Tanggal Lahir                : ".date('d-m-Y',strtotime($item->tanggallahir)), 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Agama                						: ".$item->agama, 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Nama                           : ".$item->namalengkap, 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Jenis Kelamin              : ".$jeniskelamin, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(0,10,"tempat, Tanggal Lahir : ".$item->tempatlahir.", ".date('d-m-Y',strtotime($item->tanggallahir)), 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(0,10,"Agama                         : ".$item->agama, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(0,10,"Suku Bangsa               : ".$item->sukubangsa, 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Alamat                          : ".$item->alamat, 0, 1,'L');
			
			
			$urutemail = 0;
			$email = $this->CI->mdl_search->form_email_selectbyid($item->regidrec);
			foreach ($email->result() as $itememail){
				$this->Ln(6);
				if($urutemail==0){
					$this->Cell(0,10,"Email                            : ".$itememail->email, 0, 1,'L');
				}else{
					$this->Cell(0,10,"                                     : ".$itememail->email, 0, 1,'L');
				} 
				$urutemail++;
			}
			
			$uruttelepon = 0;
			$telepon = $this->CI->mdl_search->form_telepon_selectbyid($item->regidrec);
			foreach ($telepon->result() as $itemtel){
				$this->Ln(6);
				if($uruttelepon==0){
					$this->Cell(0,10,"Telepon                        : ".$itemtel->telepon, 0, 1,'L');
				}else{
					$this->Cell(0,10,"                                     : ".$itemtel->telepon, 0, 1,'L');
				}
					
				$uruttelepon++;
			}

			$this->Ln(25);
			$this->SetFont('Arial','',10);
			$this->Cell(0,10,"I 		DATA UTAMA");
			$this->Ln(25);
			$this->Cell(0,10,"Induk Organisasi           : Pemeritah Kota Langsa", 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Unit Organisasi             : ".$item->unitorganisasi, 0, 1,'L');
			$this->Ln(6);
			$this->Cell(0,10,"Jenis Jabatan             : ".$item->unitorganisasi, 0, 1,'L');

			
			// $this->Ln(6);
			// $this->Cell(40,10,"Website                        : ".$item->website, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Twitter                          : ".$item->twitter, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Facebook                     : ".$item->fb, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Kelompok                     : ".$item->kelompok, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Universitas                   : ".$item->universitas, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Jenjang                        : ".$item->jenjang, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Program Studi              : ".$item->programstudi, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Jurusan                        : ".$item->fakultas, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"IPK                               : ".$item->ipk, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Pekerjaan                    : ".$item->pekerjaan, 0, 1,'L');
			// $this->Ln(6);
			// $this->Cell(40,10,"Instansi                        : ".$item->instansi, 0, 1,'L');
			
			
		}
		 
		
		$h = 17;
		$left = 40;
		$top = 80;
		
		/*GOLONGAN*/
		$this->Ln(25);
		$this->Cell(0,10,"Data Riwayat Golongan", 0, 1,'L');
		$this->Ln(5); 
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(120, $h, 'Golongan', 1, 0, 'C',true);
		$this->SetX($left += 120); $this->Cell(60, $h, 'TMT', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(100, $h, 'Masa Kerja (Tahun)', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'Masa Kerja (Bulan)', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(60, $h, 'Nomor SK ', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(100, $h, 'No. Persetujuan BKN', 1, 1, 'C',true);		 
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(120,60,100,100,60,100));
		$this->SetAligns(array('L','L','L','C','C','L')); 
		$this->SetFillColor(255);
		$datagolongan = $this->CI->mdl_referensi->golongan_get_byanggota($item->regidrec);
		foreach ($datagolongan->result() as $baris) {
			$this->Row(
				array(
				$baris->namagolongan,
				$baris->tmtgolongan,
				$baris->tahunmasagolongan,
				$baris->bulanmasagolongan,
				$baris->noskgolongan,
				$baris->nobkngolongan
			));
		}
		/*GOLONGAN*/

		/*KELUARGA*/
		$this->Ln(25);
		$this->Cell(0,10,"Data Keluarga", 0, 1,'L');
		$this->Ln(5); 
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(120, $h, 'Nama', 1, 0, 'C',true);
		$this->SetX($left += 120); $this->Cell(60, $h, 'Status', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(100, $h, 'Pekerjaan', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'Pendidikan Terakhir', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(60, $h, 'Usia', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(100, $h, 'Jenis Kelamin', 1, 1, 'C',true);		 
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(120,60,100,100,60,100));
		$this->SetAligns(array('L','L','L','C','C','L')); 
		$this->SetFillColor(255);
		$datakeluarga = $this->CI->mdl_referensi->keluarga_get_byanggota($item->regidrec);
		foreach ($datakeluarga->result() as $baris) {
			$jeniskelamin_kel = "Laki-Laki";
			if($baris->jeniskelamin==0){
				$jeniskelamin_kel = "Perempuan";
			} 
			$this->Row(
				array(
				$baris->nama,
				$baris->status,
				$baris->pekerjaan,
				$baris->pendidikanterakhir,
				$baris->usia,
				$jeniskelamin_kel
			));
		}
				
		/*PENDIDIKAN*/
		$this->Ln(25);
		$this->SetFont('Arial','',12);
		$this->Cell(0,10,"Data Pendidikan", 0, 1,'L');
		$this->Ln(5); 
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(120, $h, 'Sekolah', 1, 0, 'C',true);
		$this->SetX($left += 120); $this->Cell(160, $h, 'Nama Sekolah', 1, 0, 'C',true);
		$this->SetX($left += 160); $this->Cell(100, $h, 'Tahun', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'Jurusan', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(60, $h, 'Nilai Akhir', 1, 1, 'C',true); 
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(120,160,100,100,60));
		$this->SetAligns(array('L','L','C','C','C')); 
		$this->SetFillColor(255);
		$datapendidikan = $this->CI->mdl_referensi->pendidikan_get_byanggota($item->regidrec);
		foreach ($datapendidikan->result() as $itempend){
			$this->Row(
					array(
							$itempend->sekolah,
							$itempend->namasekolah,
							$itempend->tahun,
							$itempend->jurusan,
							$itempend->nilaiakhir 
					));
		}
		
		/*PENDIDIKAN NON FORMAL*/
		$this->Ln(25);
		$this->SetFont('Arial','',12);
		$this->Cell(0,10,"Data Pendidikan NON Formal", 0, 1,'L');
		$this->Ln(5);
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(120, $h, 'Kompetensi', 1, 0, 'C',true);
		$this->SetX($left += 120); $this->Cell(160, $h, 'Nama Lembaga', 1, 0, 'C',true);
		$this->SetX($left += 160); $this->Cell(100, $h, 'Tahun', 1, 0, 'C',true); 
		$this->SetX($left += 100); $this->Cell(160, $h, 'Spesialisasi', 1, 1, 'C',true);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(120,160,100,160));
		$this->SetAligns(array('L','L','C','L'));
		$this->SetFillColor(255);
		$datapendidikannonformal = $this->CI->mdl_referensi->pendidikannonformal_get_byanggota($item->regidrec);
		foreach ($datapendidikannonformal->result() as $itempendnf){
			$this->Row(
					array(
							$itempendnf->kompetensi,
							$itempendnf->namalembaga,
							$itempendnf->tahun,
							$itempendnf->spesialisasi
					));
		}
		
		/*ORGANISASI*/
		$this->Ln(25);
		$this->SetFont('Arial','',12);
		$this->Cell(0,10,"Data Organisasi", 0, 1,'L');
		$this->Ln(5);
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(180, $h, 'Nama Organisasi', 1, 0, 'C',true);
		$this->SetX($left += 180); $this->Cell(140, $h, 'Jabatan', 1, 0, 'C',true);
		$this->SetX($left += 140); $this->Cell(70, $h, 'Tahun', 1, 0, 'C',true);
		$this->SetX($left += 70); $this->Cell(150, $h, 'Tempat', 1, 1, 'C',true);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(180,140,70,150));
		$this->SetAligns(array('L','L','C','L'));
		$this->SetFillColor(255);
		$dataorganisasi = $this->CI->mdl_referensi->organisasi_get_byanggota($item->regidrec);
		foreach ($dataorganisasi->result() as $itemorg){
			$this->Row(
					array(
							$itemorg->namaorganisasi,
							$itemorg->jabatan,
							$itemorg->tahun,
							$itemorg->tempat
					));
		}
		 
 
		/*PENGALAMAN KERJA*/
		$this->Ln(25);
		$this->SetFont('Arial','',12);
		$this->Cell(0,10,"Data Pengalaman Kerja", 0, 1,'L');
		$this->Ln(5);
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(180, $h, 'Nama Lembaga', 1, 0, 'C',true);
		$this->SetX($left += 180); $this->Cell(140, $h, 'Jabatan', 1, 0, 'C',true);
		$this->SetX($left += 140); $this->Cell(70, $h, 'Tahun', 1, 0, 'C',true);
		$this->SetX($left += 70); $this->Cell(150, $h, 'Tempat', 1, 1, 'C',true);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(180,140,70,150));
		$this->SetAligns(array('L','L','C','L'));
		$this->SetFillColor(255);
		$datakerja = $this->CI->mdl_referensi->kerja_get_byanggota($item->regidrec);
		foreach ($datakerja->result() as $itemkrj){
			$this->Row(
					array(
							$itemkrj->namalembaga,
							$itemkrj->jabatan,
							$itemkrj->tahun,
							$itemkrj->tempat
					));
		}
		
		/*VOUNTEER*/
		$this->Ln(25);
		$this->SetFont('Arial','',12);
		$this->Cell(0,10,"Data Volunteer", 0, 1,'L');
		$this->Ln(5);
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(180, $h, 'Nama Kegiatan', 1, 0, 'C',true);
		$this->SetX($left += 180); $this->Cell(140, $h, 'Jabatan', 1, 0, 'C',true);
		$this->SetX($left += 140); $this->Cell(70, $h, 'Tahun', 1, 0, 'C',true);
		$this->SetX($left += 70); $this->Cell(150, $h, 'Tempat', 1, 1, 'C',true);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(180,140,70,150));
		$this->SetAligns(array('L','L','C','L'));
		$this->SetFillColor(255);
		$datavol = $this->CI->mdl_referensi->volunteer_get_byanggota($item->regidrec);
		foreach ($datavol->result() as $itemvol){
			$this->Row(
					array(
							$itemvol->namakegiatan,
							$itemvol->jabatan,
							$itemvol->tahun,
							$itemvol->tempat
					));
		}
		
		/*PRESTASI*/
		$this->Ln(25);
		$this->SetFont('Arial','',12);
		$this->Cell(0,10,"Data Prestasi", 0, 1,'L');
		$this->Ln(5);
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(180, $h, 'Bidang', 1, 0, 'C',true);
		$this->SetX($left += 180); $this->Cell(50, $h, 'Peringkat', 1, 0, 'C',true);
		$this->SetX($left += 50); $this->Cell(70, $h, 'Tahun', 1, 0, 'C',true);
		$this->SetX($left += 70); $this->Cell(90, $h, 'Tingkat', 1, 0, 'C',true);
		$this->SetX($left += 90); $this->Cell(150, $h, 'Penyelenggara', 1, 1, 'C',true);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(180,50,70,90,150));
		$this->SetAligns(array('L','C','C','L','L'));
		$this->SetFillColor(255);
		$datapres = $this->CI->mdl_referensi->prestasi_get_byanggota($item->regidrec);
		foreach ($datapres->result() as $itempres){
			$this->Row(
					array(
							$itempres->bidang,
							$itempres->peringkat,
							$itempres->tahun,
							$itempres->tingkat,
							$itempres->penyelenggara
					));
		}
		
	}
 
	public function printPDF ($data) {
 	
		if ($this->options['paper_size'] == "F4") {
			$a = 8.3 * 72; //1 inch = 72 pt
			$b = 13.0 * 72;
			$this->FPDF($this->options['orientation'], "pt", array($a,$b));
		} else {
			$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
		}
 
	    $this->SetAutoPageBreak(false);
	    $this->AliasNbPages();
	    $this->SetFont("helvetica", "B", 10);
	    //$this->AddPage();
 
	    $this->rptDetailData($data);
 
	    $this->Output($this->options['filename'],$this->options['destinationfile']);
  	}
 
  	private $widths;
	private $aligns;
 
	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}
 
	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
 
	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=13*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,13,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}
 
	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}
 
	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
} //end of class
