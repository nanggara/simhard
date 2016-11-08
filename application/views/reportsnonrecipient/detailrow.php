
				 	<?php 
				 		$institusi = "";
				 		if($rowdetail->num_rows()>0){
				 	 		$institusi = $rowdetail->first_row()->institusi;
				 		}
				 	?>				 	
				 	<table  class="table table-bordered">
					 	<thead>
					 		<tr>
					 			<td colspan="200" class="text-center">
					 				<strong>
					 					<?php 
					 						if(strlen($kodeinstitusi)){
					 							echo strtoupper($namainstitusi);
					 						}else{
					 							echo "SEMUA INSTITUSI";
					 						}
					 						echo " PERIODE: ".$periode1." s/d ".$periode2;
    									?>
					 				</strong>
					 			</td>
					 		</tr> 
					 		<tr>
					 			<td class="col-lg-10"><strong>INSTITUSI</strong></td>
					 			<td class="col-lg-2 text-center"><strong>JUMLAH</strong></td>  
					 		</tr>
					 	</thead>
					 	<tbody>
						 	<?php 
						 	$jumlah = 0; 
						 	foreach ($rowdetail->result() as $rowItem){?>
						 		 <tr>
						 		 	<td class="text-left"><?php echo $rowItem->institusi;?></td>
						 		 	<td class="text-center">
						 		 		<?php 
						 		 			if(!strlen($kodeinstitusi)){
						 		 				$kodeinstitusi = "ALL";
						 		 			}
						 		 			echo "<a href='".site_url('reportsnonrecipient/detailanggota/'.$periode1."/".$periode2."/".$kodeinstitusi)."'>".$rowItem->jumlah."</a>";
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
						 		 		echo "<a href='".site_url('reportsnonrecipient/detailanggota/'.$periode1."/".$periode2."/")."'>".$jumlah."</a>";
						 		 	?> 
					 		 	</td>
					 		 </tr>
					 	</tbody>
					 
					 </table>
				 
				 	<a href="javascript:;" onclick="window.history.back()" class="btn btn-info"><i class="fa fa-angle-double-left"></i>&nbsp;Kembali</a>
				 	<!-- <a href="javascript:;" class="btn btn-warning" onclick=on_print_detail('<?php echo $periode1;?>','<?php echo $periode2;?>','<?php echo $kodeinstitusi;?>')>Print</a> -->
 <script type="text/javascript">
	function on_print_detail(tahun,univ){
		var url = "<?php echo site_url('reports/detail_print');?>"+"/"+tahun+"/"+univ;
		window.open(url, '_blank');
	}
</script> 
 