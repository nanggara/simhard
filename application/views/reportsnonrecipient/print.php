<script>
function myFunction() {
    window.print();
}
</script>
<button onclick="myFunction()" style="margin-left: 88%">Print this page</button>
<center>
<h3>REPORTS&nbsp;<?php echo $namakelompok;?>&nbsp;<?php echo $namauniversitas;?>&nbsp;</h3> 
<h5><?php echo $periode;?></h5>
                
<table width="95%" border="1" cellpadding="0" cellspacing="0">
	<thead> 
		<tr>
	 		<td colspan="200" align="center"><strong>UNIVERSITAS</strong></td>
	 	</tr> 
	 	<tr>
	 		<td align="center"><h5><strong>Tahun</strong></h5></td>
		 		<?php foreach ($datauniversitas->result() as $row){?>
		 			<td align="center"><h5><strong><?php echo $row->universitas;?></strong></h5></td>
		 		<?php }?>
	 		</tr>
	 	</thead>
	 	<tbody>
	 	<?php foreach ($datatahun->result() as $rowTahun){?>	 		 
	 		 <tr>
	 			<td align="center"><?php echo $rowTahun->tahun;?></td>
		 		<?php foreach ($datauniversitas->result() as $row){?>
		 			<td align="center"> 
		 					<?php  
		 						$datajmluni = $this->mdl_reports->count_universitas_by($rowTahun->tahun,$periode1,$periode2,$row->kodeuniversitas,$kelompok,$universitas);
						 		if($datajmluni->num_rows()>0){
									echo $datajmluni->num_rows(); 
								}else{
									echo "0";
								}
						 	?>  
		 			</td>
		 		<?php }?>
	 		</tr> 
	 	<?php }?> 
	 	</tbody> 
	 </table> 
</center> 
