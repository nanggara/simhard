<div id="contentorganisasi" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Organisasi</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($dataorganisasi->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodeorganisasi;?></td>
			    <td><?php echo $item->namaorganisasi;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="organisasi_select_row(<?php echo $item->kodeorganisasi;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="organisasi_delete_row(<?php echo $item->kodeorganisasi;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingorganisasi;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>