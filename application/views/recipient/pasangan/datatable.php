<div id="contentpasangan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>pasangan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datapasangan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodepasangan;?></td>
			    <td><?php echo $item->namapasangan;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="pasangan_select_row(<?php echo $item->kodepasangan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="pasangan_delete_row(<?php echo $item->kodepasangan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingpasangan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>