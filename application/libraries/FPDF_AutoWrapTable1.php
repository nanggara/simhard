<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require('assets/library/fpdf17/fpdf.php');
 
class FPDF_AutoWrapTable1 extends FPDF { 
  
	private $options = array(
  		'filename' => '',
  		'destinationfile' => '',
  		'paper_size'=>'A4',
  		'orientation'=>'L'
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

		
/*		
		$photouni  = $data->first_row()->photoprofil;
		if(strlen($photouni)){ 
			$this->Image($photouni, 50, $this->GetY(), 100);
		}
		
		$photo  = $data->first_row()->photoprofil;
		if(strlen($photo)){
			$photo = "uploads/photo/".$photo;
			$this->Image($photo,430, 220, 120 ,130);
		}
		*/
		

		
		//header
		$image1 = "assets/themes/inspinia/images/logo.png";
		$this->Ln(6);
		$this->Image($image1, 400, $this->GetY()+10, 150);	
		$this->Ln(130);
		$this->SetFont("", "B", 16);
		$this->SetX($left); $this->Cell(0, 10, 'DAFTAR PENCARIAN', 0, 1,'C');
		$this->Ln(10);
		
		$h = 17;
		$left = 40;
		$top = 80;
		
		//echo "Ditemukan ".$data->num_rows()." data ";
		$this->Cell(40,10,'Ditemukan '.$data->num_rows()." data");
		
		$this->Ln(20);
		//$this->Cell(0,10,"Daftar Pencarian", 0, 1,'L');
		$this->Ln(5); 
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->SetFont('Arial','',9);
		$this->Cell(80, $h, 'Kode', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(90, $h, 'Nama', 1, 0, 'C',true);
		$this->SetX($left += 90); $this->Cell(100, $h, 'Alamat', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(70, $h, 'Universitas', 1, 0, 'C',true);
		$this->SetX($left += 70); $this->Cell(60, $h, 'Fakultas', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(80, $h, 'P.Studi', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(80, $h, 'Tgl.Masuk', 1, 0, 'C',true);
		$this->SetX($left += 80); $this->Cell(60, $h, 'J.Kelamin', 1, 0, 'C',true);
		$this->SetX($left += 60); $this->Cell(90, $h, 'Kelompok', 1, 0, 'C',true);
		$this->SetX($left += 90); $this->Cell(70, $h, 'Telp', 1, 0, 'C',true);
		$this->SetX($left += 70); $this->Cell(100, $h, 'Email', 1, 1, 'C',true);
		
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(80,90,100,70,60,80,80,60,90,70,100));
		$this->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C')); 
		$this->SetFillColor(255);
		$urut = 0;
		
		//$data = $this->CI->mdl_search->form_get_all(false,0,100000,true);
		foreach ($data->result() as $baris) {
			
			$this->Row(
				array(
				$baris->noanggota,
				$baris->namalengkap,
				$baris->alamat,
				$baris->universitas,
				$baris->fakultas,
				$baris->programstudi,
				date('d-m-Y',strtotime($baris->tglmasukanggota)),
				$baris->jeniskelamin,
				$baris->kelompok,
				$baris->telepon,
				$baris->email
				
			));
		}
				
		
	}
 
	public function printPDF ($data) {
 
		if ($this->options['paper_size'] == "A4") {
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
?>