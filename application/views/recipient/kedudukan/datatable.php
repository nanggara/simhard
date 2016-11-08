<div id="contentkedudukan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Kedudukan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datakedudukan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodekedudukan;?></td>
			    <td><?php echo $item->kedudukan;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="kedudukan_select_row(<?php echo $item->kodekedudukan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="kedudukan_delete_row(<?php echo $item->kodekedudukan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingkedudukan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>