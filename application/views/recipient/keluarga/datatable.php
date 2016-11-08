<div id="contentkeluarga" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Keluarga</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datakeluarga->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodekeluarga;?></td>
			    <td><?php echo $item->nama;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="keluarga_select_row(<?php echo $item->kodekeluarga;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="keluarga_delete_row(<?php echo $item->kodekeluarga;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingkeluarga;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>