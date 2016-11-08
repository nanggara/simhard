<div id="div_data_rwytjabatan">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Nama Jabatan</th>
					<th>Instansi</th>
					<th>Unit Kerja</th>
					<th>No. SK</th>
					<th>Tanggal SK</th>
					<th>TMT</th> 
					<th>Eseleon</th> 
				</tr>
			</thead>
			<tbody>
				<?php foreach($ddl_datarwytjabatan->result() as $item){?>
					<tr>
						<td><?php echo $item->namarwytjabatan;?></td>
						<td><?php echo $item->instansi?></td>
						<td><?php echo $item->unitkerja;?></td>
						<td><?php echo $item->nosk;?></td>
						<td><?php echo $item->tglsk;?></td>
						<td><?php echo $item->tmtjabatan;?></td>
						<td><?php echo $item->eseleonjabatan;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_rwytjabatan_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
