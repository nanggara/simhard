<!-- FORM -->
<form id="myForm" name="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">	
	 <input type="hidden" id="hdn_periode1" name="hdn_periode1" value="<?php echo $periode1;?>">
	 <input type="hidden" id="hdn_periode2" name="hdn_periode2" value="<?php echo $periode2;?>">
	 <input type="hidden" id="hdn_kelompok" name="hdn_kelompok" value="<?php echo $kelompok;?>">
	 <input type="hidden" id="hdn_universitas" name="hdn_universitas" value="<?php echo $universitas;?>">
	 
	 <div class="col-lg-12" style="overflow: auto;height:500px;">
	 <table  class="table table-bordered table-responsive">
	 	<thead>
	 		<tr>
	 			<td colspan="200" class="text-center"><strong>UNIVERSITAS</strong></td>
	 		</tr> 
	 		<tr>
	 			<td><strong>Tahun</strong></td>
		 		<?php foreach ($datauniversitas->result() as $row){?>
		 			<td class="text-center"><strong><?php echo $row->universitas;?></strong></td>
		 		<?php }?>
		 		<td><strong>TOTAL</strong></td>
	 		</tr>
	 	</thead>
	 	<tbody>
	 	<?php  
	 	$totalSemua=0;
	 	foreach ($datatahun->result() as $rowTahun){?>	 		 
	 		 <tr>
	 			<td><h5><?php echo $rowTahun->tahun;?></h5></td>
		 		<?php 
		 			$jumlah=0;
		 			foreach ($datauniversitas->result() as $row){?>
		 			<td class="text-center"> 
		 					<?php  
		 						$datajmluni = $this->mdl_reports->count_universitas_by($rowTahun->tahun,$periode1,$periode2,$row->kodeuniversitas,$kelompok,$universitas);
						 		if($datajmluni->num_rows()>0){
									echo "<a href='".site_url('reports/detail/'.$rowTahun->tahun."/".$row->kodeuniversitas)."'>".$datajmluni->num_rows()."</a>";
									$jumlah = $jumlah+$datajmluni->num_rows();
								}else{
									echo "0";
								}
						 	?>  
		 			</td>
		 		<?php }?>
		 		<td>
		 			<a href="<?php echo site_url('reports/detail/'.$rowTahun->tahun);?>"><?php echo $jumlah;$totalSemua=$totalSemua+$jumlah;?></a>
		 		</td>
	 		</tr> 
	 	<?php }?>
	 	<tr>
	 		<td colspan="5000" style="text-align: right;"><?php echo $totalSemua;?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	 	</tr> 
	 	</tbody> 
	 </table> 
	 </div>
	 
</form> 
<a href="javascript:;" class="btn btn-warning" onclick="on_print()" style="margin-top: 20px;">Print</a> 
<!-- END FORM -->


 

 