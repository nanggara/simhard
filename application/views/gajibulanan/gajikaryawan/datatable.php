<div id="contentgajikaryawan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Komponen</th>
				<th>gajikaryawan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datagajikaryawan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->namakomponengaji;?></td>
			    <td><?php echo $item->jumlah;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="gajikaryawan_select_row(<?php echo $item->kodegajikaryawan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="gajikaryawan_delete_row(<?php echo $item->kodegajikaryawan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $paginggajikaryawan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>