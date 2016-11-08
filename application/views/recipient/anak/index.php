<div id="div_data_anak">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Anak </th>
					<th>Tempat Lahir </th>
					<th>Tanggal Lahir </th>
					<th>Jenis Kelamin</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_dataanak->result() as $item){?>			  
					<tr>
						<td><?php echo $item->namaanak;?></td>
						<td><?php echo $item->tempatlahiranak;?></td>
						<td><?php echo $item->tgllahiranak;?></td>
						<td>
							<?php 
								if($item->jkanak==0){
									echo "Laki-laki";
								}else{
									echo "Perempuan";
								}
							?>
						</td>
					</tr> 
					<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_anak_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
