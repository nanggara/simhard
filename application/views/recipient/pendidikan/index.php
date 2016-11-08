<div id="div_data_pendidikan">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Sekolah</th>
					<th>Nama Sekolah</th>
					<th>Tahun</th>
					<th>Jurusan</th>
					<th>Nilai Akhir</th>  
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datapendidikan->result() as $item){?>
					<tr>
						<td><?php echo $item->sekolah;?></td>
						<td><?php echo $item->namasekolah;?></td>
						<td><?php echo $item->tahun;?></td>
						<td><?php echo $item->jurusan;?></td>
						<td><?php echo $item->nilaiakhir;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_pendidikan_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
