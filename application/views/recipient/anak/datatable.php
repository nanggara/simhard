<div id="contentanak" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>anak</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($dataanak->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodeanak;?></td>
			    <td><?php echo $item->namaanak;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="anak_select_row(<?php echo $item->kodeanak;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="anak_delete_row(<?php echo $item->kodeanak;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $paginganak;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>