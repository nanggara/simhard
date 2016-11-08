<div id="div_data_penghargaan">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Penghargaan</th>
					<th>No Keputusan</th>
					<th>Tanggal Keputusan</th>
					<th>Pemberi Penghargaan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datapenghargaan->result() as $item){?>
					<tr>
						<td><?php echo $item->namapenghargaan;?></td>
						<td><?php echo $item->nokeputusan;?></td>
						<td><?php echo $item->tglkeputusan;?></td>
						<td><?php echo $item->pemberipenghargaan;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_penghargaan_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
