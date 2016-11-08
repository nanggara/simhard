<div id="div_data_prestasi">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Bidang</th>
					<th>Peringkat</th>
					<th>Tahun</th>
					<th>Tingkat</th> 
					<th>Penyelenggara</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_dataprestasi->result() as $item){?>
						<tr>
							<td><?php echo $item->bidang;?></td>
							<td><?php echo $item->peringkat;?></td>
							<td><?php echo $item->tahun;?></td>
							<td><?php echo $item->tingkat;?></td>
							<td><?php echo $item->penyelenggara;?></td>
						</tr>
					<?php }?>
			</tbody>
		</table>
	</div>
	<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_prestasi_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
