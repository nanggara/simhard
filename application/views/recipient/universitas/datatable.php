<div id="contentuniversitas" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Singkatan</th>
				<th>Universitas</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datauniversitas->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodeuniversitas;?></td>
				<td class="col-lg-1"><?php echo $item->singkatan;?></td>
			    <td><?php echo $item->universitas;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="universitas_select_row(<?php echo $item->kodeuniversitas;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="universitas_delete_row(<?php echo $item->kodeuniversitas;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $paginguniversitas;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>