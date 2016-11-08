<div id="contentjenjang" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th> 
				<th>Jenjang</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($datajenjang->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->kodejenjang;?></td> 
			    <td><?php echo $item->jenjang;?></td> 
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="jenjang_select_row(<?php echo $item->kodejenjang;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="jenjang_delete_row(<?php echo $item->kodejenjang;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $pagingjenjang;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>