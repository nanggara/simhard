<div id="div_data_gajikaryawan">
	<div class="table-responsive" style="width:140%;">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>Komponen Potongan</th>
					<th>Jumlah Potongan</th>
				</tr>
			</thead>			<!-- Potongan -->						<tbody>
				<?php foreach($ddl_datapotongangajikaryawan->result() as $item){?>			  
					<tr>
						<td><?php echo $item->namakomponengaji;?></td>
						<td><?php echo "Rp.".$item->jumlah;?></td>
					</tr> 
					<?php }?>
			</tbody>			<!-- end Potongan -->			<!-- Tunjangan -->			<thead>				<tr> 					<th>Komponen Tunjangan</th>					<th>Jumlah Tunjangan</th>				</tr>			</thead>						<tbody>
				<?php foreach($ddl_datatunjangangajikaryawan->result() as $item){?>			  
					<tr>
						<td><?php echo $item->namakomponengaji;?></td>						<td><?php echo "Rp.".$item->jumlah;?></td>
					<?php }?>
			</tbody>			<!-- end Tunjangan -->			
		</table>
	</div>
<button type="button" class="btn btn-w-m btn-warning btn-sm pull-right" onclick="on_gajikaryawan_click()"><i class="fa fa-plus-square-o"></i>&nbsp;Tambah Data</button>
</div>
