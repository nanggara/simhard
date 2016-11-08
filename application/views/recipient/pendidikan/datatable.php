<div id="contentpendidikan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Sekolah</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datapendidikan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodependidikan;?></td>
			    <td><?php echo $item->namasekolah;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="pendidikan_select_row(<?php echo $item->kodependidikan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="pendidikan_delete_row(<?php echo $item->kodependidikan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingpendidikan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>