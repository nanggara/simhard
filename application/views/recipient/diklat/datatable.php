<div id="contentdiklat" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Diklat</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datadiklat->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodediklat;?></td>
			    <td><?php echo $item->namadiklat;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="diklat_select_row(<?php echo $item->kodediklat;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="diklat_delete_row(<?php echo $item->kodediklat;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingdiklat;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>