<div id="div_data_kursus">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Kursus</th>
					<th>Lama Kursus</th>
					<th>No. Sertifikat</th>
					<th>Tanggal Sertifikat</th>
					<th>Nama Penyelenggara</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datakursus->result() as $item){?>
					<tr>
						<td><?php echo $item->namakursus;?></td>
						<td><?php echo $item->lamakursus;?></td>
						<td><?php echo $item->nosertifikat;?></td>
						<td><?php echo $item->tglsertifikat;?></td>
						<td><?php echo $item->penyelenggara;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_kursus_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
