<div id="div_data_kewirausahaan">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Usaha</th>
					<th>Bidang Usaha </th>
					<th>Tahun Mulai</th>
					<th>Tahun Akhir</th>
					<th>Jabatan</th> 
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datakewirausahaan->result() as $item){?>			  
					<tr>
						<td><?php echo $item->namausaha;?></td>
						<td><?php echo $item->bidangusaha;?></td>
						<td><?php echo $item->tahunmulai;?></td>
						<td><?php echo $item->tahunakhir;?></td>
						<td><?php echo $item->jabatan;?></td>  
					</tr> 
					<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_kewirausahaan_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
