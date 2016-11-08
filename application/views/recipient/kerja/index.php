<div id="div_data_kerja">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Lembaga</th>
					<th>Jabatan</th>
					<th>Tahun</th>
					<th>Tempat</th> 
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datakerja->result() as $item){?>
					<tr>
						<td><?php echo $item->namalembaga;?></td>
						<td><?php echo $item->jabatan;?></td>
						<td><?php echo $item->tahun;?></td>
						<td><?php echo $item->tempat;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_kerja_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
