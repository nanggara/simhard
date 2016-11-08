<div id="contentinstansi" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Instansi</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datainstansi->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodeinstansi;?></td>
			    <td><?php echo $item->instansi;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="instansi_select_row(<?php echo $item->kodeinstansi;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="instansi_delete_row(<?php echo $item->kodeinstansi;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $paginginstansi;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>