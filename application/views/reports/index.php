			<!DOCTYPE html> 
<html>
<head>
	<?php $this->load->view("webhead");?>	
</head>

<body class="pace-done boxed-layout">

<?php $this->load->view("webheader");?>


<div class="wrapper wrapper-content animated fadeInRight"> 
  <div class="row"> 
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	KRITERIA
                </h5> 
           	</div>
            <div class="ibox-content text-center">
				 <?php include("kriteria.php");?>   
			</div>
      	</div>
  	</div> 
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	REPORTS&nbsp;
                	<?php echo $namakelompok;?>&nbsp;
                	<?php echo $namauniversitas;?>&nbsp;
                </h5>  
                <h5><?php echo $periode;?></h5>
                 
           	</div>
            <div class="ibox-content text-center"> 
				<?php   
					if(strlen($universitas)>0){
						if($universitas!=0){ 
							$datar['rowdetail'] = $this->mdl_reports->select_detail($universitas,$periode1,$periode2);
							$datar['kodeuniversitas'] = $universitas;
							$datar['tahun'] =  $periode1."|".$periode2;	
							$datar['periode'] =  $periode;											
							$this->load->view("reports/detailrow",$datar);
						}else{
							include("form.php");
						}
					}else{
						include("form.php");
					}
				?>        
			</div>
      	</div>
  	</div>
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	GRAFIK&nbsp;
                	<?php echo $namakelompok;?>&nbsp;
                	<?php echo $namauniversitas;?>&nbsp;
                </h5> 
                <h5><?php echo $periode;?></h5>
           	</div>
            <div class="ibox-content text-center">
            	 
				 <?php 
				 
					 //require_once("http://10.86.1.7/assets/library/FusionCharts/FC_Colors.php");
					 //require_once("http://10.86.1.7/assets/library/FusionCharts/FusionCharts_Gen.php");
					 //require_once ("http://10.86.1.7/assets/library/FusionCharts/FusionCharts.php");
						require_once(APPPATH.'../assets/library/FusionCharts/FC_Colors.php');	
						require_once(APPPATH.'../assets/library/FusionCharts/FusionCharts_Gen.php');	
						require_once(APPPATH.'../assets/library/FusionCharts/FusionCharts.php');
				   
					 if($universitas>0){		
					 			 						 
						echo"<div style='width:100%;margin-bottom:20px'><SCRIPT LANGUAGE='Javascript' SRC='".base_url()."assets/library/FusionCharts/FusionCharts.js'></SCRIPT>";
						$FC = new FusionCharts("Column3D","600","300");
						$FC->setSWFPath(base_url()."assets/library/FusionCharts/");
						$strParam="caption=Grafik Data Anggota; xAxisName=Daftar Fakultas ; yAxisName=Jumlah; numberPrefix=; decimalPrecision=0";
						$FC->setChartParams($strParam); 
							$datafakultas = $this->mdl_reports->count_fakultas($periode1,$periode2,$universitas); 
							foreach ($datafakultas->result() as $row){
								$FC->addChartData($row->jumlah,"name=".$universitas);
							}
						 
						$FC->renderChart();
						echo"</div>";
					 }else{ 
						 echo"<div style='width:100%;margin-bottom:20px'><SCRIPT LANGUAGE='Javascript' SRC='".base_url()."assets/library/FusionCharts/FusionCharts.js'></SCRIPT>";					 
						 $FC = new FusionCharts("Column3D","600","300");
						 $FC->setSWFPath(base_url()."assets/library/FusionCharts/");
						 $strParam="caption=Grafik Data Universitas; xAxisName=Daftar Fakultas ; yAxisName=Jumlah; numberPrefix=; decimalPrecision=0";
						 $FC->setChartParams($strParam);
						 
						 foreach ($datauniversitas->result() as $row){
						 	$datajmluni = $this->mdl_reports->count_universitas_bychart($periode1,$periode2,$row->kodeuniversitas,$kelompok,$universitas);
						 	if($datajmluni->num_rows()>0){
						 		$FC->addChartData($datajmluni->num_rows(),"name=".$datajmluni->first_row()->singkatan);
						 	} 
						 } 
						 
						 $FC->renderChart(); 
						 echo"</div>";
					 }
				 ?>      
			</div>
      	</div>
  	</div>
  </div> 
</div>
<script>
<?php include("form.js");?>
</script>
<?php $this->load->view("webfooter");?>
 
 </body>
 </html>