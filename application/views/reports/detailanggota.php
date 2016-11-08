<!DOCTYPE html> 
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSUD LANGSA | Database Pegawai</title>    
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/token-input-facebook.css" rel="stylesheet">    
</head>

<body class="pace-done boxed-layout">
<?php $this->load->view("webheader");?>
<div class="wrapper wrapper-content animated fadeInRight"> 
  <div class="row"> 
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	REPORTS
                </h5> 
           	</div>
            <div class="ibox-content"> 
            		<div class="col-lg-12"  style="overflow: auto;height:600px;margin-bottom:20px;">
				 	<table  class="table table-bordered  table-responsive">
					 	<thead>
					 		<tr>
					 			<td colspan="200" class="text-center">
					 				<strong>
					 					<?php 
					 					if(strlen($universitas)){
					 						echo "UNIVERSITAS: " .strtoupper($universitas)." ";
					 					}else{
					 						echo "SEMUA UNIVERSITAS ";
					 					}
					 					
					 					if(strlen($fakultas)){
					 						echo " FAKULTAS:".strtoupper($fakultas)." ";
					 					}else{
					 						echo "SEMUA FAKULTAS ";
					 					}
					 					if(strpos($tahun, "|")){
					 						$arr_thn = explode("|",$tahun);
					 						echo " ".date('m-Y',strtotime($arr_thn[0]))." s/d ".date('m-Y',strtotime($arr_thn[1]));
					 					}else{
					 						echo " ".$tahun;
					 					}
					 					?>
					 				</strong>
					 			</td>
					 		</tr> 
					 		<tr>
					 			<td class="col-lg-1"><strong>No Anggota</strong></td>
					 			<td><strong>Nama</strong></td> 
					 			<td><strong>Jenis Kelamin</strong></td> 
					 			<td><strong>Alamat</strong></td>
					 			<td class="col-lg-1"><strong>Universitas</strong></td>
					 			<td class="col-lg-1"><strong>Fakultas</strong></td>
					 			<td class="col-lg-1"><strong>Program Studi</strong></td>
					 			<td class="col-lg-1"><strong>Tgl.Masuk</strong></td>
					 			<td class="col-lg-1"><strong>Kelompok</strong></td>
					 			<td class="col-lg-1"><strong>Telepon</strong></td>
					 			<td class="col-lg-1"><strong>Email</strong></td>
					 		</tr>
					 	</thead>
					 	<tbody>
						 	<?php  
						 	$tahunurl = $this->php_chiper_ex->encode($tahun);
						 	$jumlah = 0; 
						 	foreach ($rowdetail->result() as $rowItem){
						 		$telepon     = "";
						 		$rst_telepon = $this->mdl_search->form_telepon_selectbyid($rowItem->regidrec);
						 		if($rst_telepon->num_rows()){
						 			$telepon = $rst_telepon->first_row()->telepon;
						 		}
						 			
						 		$email       = "";
						 		$rst_email   = $this->mdl_search->form_email_selectbyid($rowItem->regidrec);
						 		if($rst_email->num_rows()){
						 			$email = $rst_email->first_row()->email;
						 		}
						 		?>
						 		 <tr>
						 		 	<td><?php echo $rowItem->noanggota;?></td>
						 		 	<td><?php echo $rowItem->namalengkap;?></td>
						 		 	<td>
						 		 		<?php 
						 		 			switch($rowItem->jeniskelamin){
						 		 				case 0:
						 		 					echo "Perempuan";
						 		 					break;
						 		 				case 1:
						 		 					echo "Laki-Laki";
						 		 					break;
						 		 			}
						 		 		?>
						 		 	</td> 
						 		 	<td><?php echo $rowItem->alamat;?></td>
						 		 	<td><?php echo $rowItem->universitas;?></td>
						 		 	<td><?php echo $rowItem->fakultas;?></td>
						 		 	<td><?php echo $rowItem->programstudi;?></td>
						 		 	<td><?php echo date('d-m-Y',strtotime($rowItem->tglmasukanggota));?></td>
						 		 	<td><?php echo $rowItem->kelompok;?></td>
						 		 	<td><?php echo $telepon;?></td>
						 		 	<td><?php echo $email;?></td>
						 		 </tr>
						 	<?php  
						 		}?> 
					 	</tbody>
					 
					 </table>
				 	</div> 
				 	<?php 
				 		$fakultas = $this->php_chiper_ex->encode($fakultas);
				 	?>
				 	<a href="javascript:;" onclick="window.history.back()" class="btn btn-info"><i class="fa fa-angle-double-left"></i>&nbsp;Kembali</a>
				 	<a href="javascript:;" class="btn btn-warning" onclick=on_print_detailanggota('<?php echo $tahunurl;?>','<?php echo $kodeuniversitas;?>','<?php echo $fakultas;?>')>Print</a>
            </div>
      	</div>
  	</div>
  </div>
</div>      
<?php $this->load->view("webfooter");?>
 <script type="text/javascript">
	function on_print_detailanggota(tahun,univ,fak){
		if(univ.length==0){univ='ALL';}
		var url = "<?php echo site_url('reports/detailanggota_print');?>"+"/"+tahun+"/"+univ+"/"+fak;
		window.open(url, '_blank');
	}
</script> 
 </body>
 </html>