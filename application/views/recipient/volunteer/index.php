<div id="div_data_volunteer">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Kegiatan</th>
					<th>Jabatan</th>
					<th>Tahun</th>
					<th>Tempat</th> 
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datavolunteer->result() as $item){?>
					<tr>
						<td><?php echo $item->namakegiatan;?></td>
						<td><?php echo $item->jabatan;?></td>
						<td><?php echo $item->tahun;?></td>
						<td><?php echo $item->tempat;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_volunteer_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
