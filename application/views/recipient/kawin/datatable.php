<div id="contentkawin" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Kawin</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datakawin->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodekawin;?></td>
			    <td><?php echo $item->kawin;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="kawin_select_row(<?php echo $item->kodekawin;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="kawin_delete_row(<?php echo $item->kodekawin;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingkawin;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>