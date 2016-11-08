<div id="contentgolongan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Golongan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datagolongan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodegolongan;?></td>
			    <td><?php echo $item->namagolongan;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="golongan_select_row(<?php echo $item->kodegolongan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="golongan_delete_row(<?php echo $item->kodegolongan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $paginggolongan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>