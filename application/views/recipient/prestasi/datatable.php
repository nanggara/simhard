<div id="contentprestasi" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Bidang</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($dataprestasi->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodeprestasi;?></td>
			    <td><?php echo $item->bidang;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="prestasi_select_row(<?php echo $item->kodeprestasi;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="prestasi_delete_row(<?php echo $item->kodeprestasi;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingprestasi;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>