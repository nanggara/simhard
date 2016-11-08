<div id="content" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Singkatan</th>
				<th>Kelompok</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datakelompok->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodekelompok;?></td>
				<td class="col-lg-1"><?php echo $item->singkatan;?></td>
			    <td><?php echo $item->kelompok;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="kelompok_select_row(<?php echo $item->kodekelompok;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="kelompok_delete_row(<?php echo $item->kodekelompok;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $paging;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>