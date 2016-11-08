<div id="contentvolunteer" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Kegiatan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datavolunteer->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodevolunteer;?></td>
			    <td><?php echo $item->namakegiatan;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="volunteer_select_row(<?php echo $item->kodevolunteer;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="volunteer_delete_row(<?php echo $item->kodevolunteer;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingvolunteer;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>