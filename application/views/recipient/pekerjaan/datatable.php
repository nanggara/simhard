<div id="contentpekerjaan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th> 
				<th>Pekerjaan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datapekerjaan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodepekerjaan;?></td> 
			    <td><?php echo $item->pekerjaan;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="pekerjaan_select_row(<?php echo $item->kodepekerjaan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="pekerjaan_delete_row(<?php echo $item->kodepekerjaan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingpekerjaan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>