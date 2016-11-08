<div id="div_data_pendidikannonformal">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Kompetensi</th>
					<th>Nama Lembaga</th>
					<th>Tahun</th>
					<th>Spesialisasi</th> 
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datapendidikannonformal->result() as $item){?>
				<tr>
					<td><?php echo $item->kompetensi;?></td>
					<td><?php echo $item->namalembaga;?></td>
					<td><?php echo $item->tahun;?></td>
					<td><?php echo $item->spesialisasi;?></td>
				</tr>  
				<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_pendidikannonformal_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
