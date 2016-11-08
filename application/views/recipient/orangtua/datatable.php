<div id="contentorangtua" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>orangtua</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($dataorangtua->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodeorangtua;?></td>
			    <td><?php echo $item->namaorangtua;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="orangtua_select_row(<?php echo $item->kodeorangtua;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="orangtua_delete_row(<?php echo $item->kodeorangtua;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingorangtua;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>