<div id="div_data_golongan">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Golongan</th>
					<th>TMT</th>
					<th>Masa Kerja Tahun</th>
					<th>Masa Kerja Bulan</th>
					<th>No. SK</th>
					<th>No. Persetujuan BKN</th> 
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datagolongan->result() as $item){?>
					<tr>
						<td><?php echo $item->namagolongan;?></td>
						<td><?php echo $item->tmtgolongan;?></td>
						<td><?php echo $item->tahunmasagolongan;?></td>
						<td><?php echo $item->bulanmasagolongan;?></td>
						<td><?php echo $item->noskgolongan;?></td>
						<td><?php echo $item->nobkngolongan;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_golongan_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
