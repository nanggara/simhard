<div id="contentagama" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Agama</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($dataagama->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodeagama;?></td>
			    <td><?php echo $item->agama;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="agama_select_row(<?php echo $item->kodeagama;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="agama_delete_row(<?php echo $item->kodeagama;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingagama;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>