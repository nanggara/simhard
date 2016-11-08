<div id="contentjabatan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th> 
				<th>Jabatan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datajabatan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodejabatan;?></td> 
			    <td><?php echo $item->jabatan;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="jabatan_select_row(<?php echo $item->kodejabatan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="jabatan_delete_row(<?php echo $item->kodejabatan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingjabatan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>