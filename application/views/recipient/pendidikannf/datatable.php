<div id="contentpendidikannonformal" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Lembaga</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datapendidikannonformal->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodependidikannf;?></td>
			    <td><?php echo $item->namalembaga;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="pendidikannonformal_select_row(<?php echo $item->kodependidikannf;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="pendidikannonformal_delete_row(<?php echo $item->kodependidikannf;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingpendidikannonformal;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>