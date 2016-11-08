
				 	<?php 
				 		$universitas = "";
				 		if($rowdetail->num_rows()>0){
				 	 		$universitas = $rowdetail->first_row()->universitas;
				 		}
				 	?>		
				 	 		 	
				 	<table  class="table table-bordered table-responsive">
					 	<thead>
					 		<tr>
					 			<td colspan="200" class="text-center">
					 				<strong>
					 					<?php 
					 						if(strlen($kodeuniversitas)){
					 							echo strtoupper($universitas);
					 						}else{
					 							echo "SEMUA UNIVERSITAS";
					 						}
					 						if(strpos($tahun, "|")){ 
					 							echo " ".$periode;
					 						}else{ 
					 							echo " ".$tahun;
					 						}
    									?>
					 				</strong>
					 			</td>
					 		</tr> 
					 		<tr>
					 			<td class="col-lg-10"><strong>FAKULTAS</strong></td>
					 			<td class="col-lg-2 text-center"><strong>JUMLAH</strong></td>  
					 		</tr>
					 	</thead>
					 	<tbody>
						 	<?php  
						 	$tahunurl = $this->php_chiper_ex->encode($tahun);
						 	$jumlah = 0;
						 	foreach ($rowdetail->result() as $rowItem){?>
						 		 <tr>
						 		 	<td class="text-left"><?php echo $rowItem->fakultas;?></td>
						 		 	<td class="text-center">
						 		 		<?php 
						 		 			if(!strlen($kodeuniversitas)){
						 		 				$kodeuniversitas = "ALL";
						 		 			}
						 		 			$fakultas = $this->php_chiper_ex->encode($rowItem->fakultas);  
						 		 			echo "<a href='".site_url('reports/detailanggota/'.$tahunurl."/".$kodeuniversitas."/".$fakultas)."'>".$rowItem->jumlah."</a>";
						 		 		?> 
						 		 	</td>
						 		 </tr>
						 	<?php 
						 		$jumlah = $jumlah+$rowItem->jumlah;
						 		}?>
					 		<tr>
					 		 	<td align="right">Total</td>
					 		 	<td class="text-center">
					 		 		<?php 
						 		 		echo "<a href='".site_url('reports/detailanggota/'.$tahunurl."/".$kodeuniversitas."/")."'>".$jumlah."</a>";
						 		 	?> 
					 		 	</td>
					 		 </tr>
					 	</tbody>
					 
					 </table>
				 	 
				 	 
				 	<a href="javascript:;" onclick="window.history.back()" class="btn btn-info"><i class="fa fa-angle-double-left"></i>&nbsp;Kembali</a>
				 	<a href="javascript:;" class="btn btn-warning" onclick=on_print_detail('<?php echo $tahunurl;?>','<?php echo $kodeuniversitas;?>')>Print</a>
 <script type="text/javascript">
	function on_print_detail(tahun,univ){ 
		var url = "<?php echo site_url('reports/detail_print');?>"+"/"+tahun+"/"+univ;
		window.open(url, '_blank');
	}
</script> 
 