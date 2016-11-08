<div id="div_data_orangtua">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Status</th>
					<th>Nama Orangtua </th>
					<th>Gelar Depan </th>
					<th>Gelar Belakang </th>
					<th>Agama</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_dataorangtua->result() as $item){?>			  
					<tr>
						<td><?php echo $item->status;?></td>
						<td><?php echo $item->namaorangtua;?></td>
						<td><?php echo $item->gelardpn;?></td>
						<td><?php echo $item->gelarblk;?></td>
						<td><?php echo $item->agama;?></td>
					</tr> 
					<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_orangtua_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
