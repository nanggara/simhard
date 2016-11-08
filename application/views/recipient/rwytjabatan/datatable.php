<div id="contentrwytjabatan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Jabatan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datarwytjabatan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->koderwytjabatan;?></td>
			    <td><?php echo $item->namarwytjabatan;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="rwytjabatan_select_row(<?php echo $item->koderwytjabatan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="rwytjabatan_delete_row(<?php echo $item->koderwytjabatan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingrwytjabatan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>