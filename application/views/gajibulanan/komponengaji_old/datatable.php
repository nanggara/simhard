<div id="contentkomponengaji" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>komponengaji</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datakomponen->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodekomponengaji;?></td>
			    <td><?php echo $item->namakomponengaji;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="komponengaji_select_row(<?php echo $item->kodekomponengaji;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="komponengaji_delete_row(<?php echo $item->kodekomponengaji;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingkomponengaji;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>