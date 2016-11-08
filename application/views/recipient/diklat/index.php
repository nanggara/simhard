<div id="div_data_diklat">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Diklat</th>
					<th>No. Sertifikat</th>
					<th>Tanggal</th>
					<th>Jumlah Jam</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datadiklat->result() as $item){?>
					<tr>
						<td><?php echo $item->namadiklat;?></td>
						<td><?php echo $item->nosertifikat;?></td>
						<td><?php echo $item->tanggal;?></td>
						<td><?php echo $item->jumlahjam;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_diklat_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
