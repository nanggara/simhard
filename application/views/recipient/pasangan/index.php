<div id="div_data_pasangan">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Status</th>
					<th>Nama Pasangan </th>
					<th>Gelar Depan </th>
					<th>Gelar Belakang </th>
					<th>Agama</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datapasangan->result() as $item){?>			  
					<tr>
						<td><?php echo $item->status;?></td>
						<td><?php echo $item->namapasangan;?></td>
						<td><?php echo $item->gelardpn;?></td>
						<td><?php echo $item->gelarblk;?></td>
						<td><?php echo $item->agamapasangan;?></td>
					</tr> 
					<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_pasangan_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
