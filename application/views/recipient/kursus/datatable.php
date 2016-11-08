<div id="contentkursus" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Kursus</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datakursus->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodekursus;?></td>
			    <td><?php echo $item->namakursus;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="kursus_select_row(<?php echo $item->kodekursus;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="kursus_delete_row(<?php echo $item->kodekursus;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingkursus;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>