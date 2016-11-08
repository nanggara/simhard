<div id="contentpenghargaan" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Penghargaan</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datapenghargaan->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodepenghargaan;?></td>
			    <td><?php echo $item->namapenghargaan;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="penghargaan_select_row(<?php echo $item->kodepenghargaan;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="penghargaan_delete_row(<?php echo $item->kodepenghargaan;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingpenghargaan;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>