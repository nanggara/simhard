<div id="div_data_keluarga">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Status</th>
					<th>Nama </th>
					<th>L/P</th>
					<th>Usia</th>
					<th>Pendidikan Terakhir</th>
					<th>Pekerjaan</th> 
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datakeluarga->result() as $item){?>			  
					<tr>
						<td><?php echo $item->status;?></td>
						<td><?php echo $item->nama;?></td>
						<td>
							<?php 
								if($item->jeniskelamin==0){
									echo "Perempuan";
								}else{
									echo "Laki-laki";
								}
							?>
						</td>
						<td><?php echo $item->usia;?></td>
						<td><?php echo $item->pendidikanterakhir;?></td>
						<td><?php echo $item->pekerjaan;?></td>  
					</tr> 
					<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_keluarga_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
