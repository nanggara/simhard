<div id="content" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Institusi</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datainstitusi->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodeinstitusi;?></td>
			    <td><?php echo $item->institusi;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="institusi_select_row(<?php echo $item->kodeinstitusi;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="institusi_delete_row(<?php echo $item->kodeinstitusi;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $institusi_paging;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>