<div id="formcontent" class="table-responsive">
<table class="table table-striped">
	<thead>
		<tr> 
			<th class="col-lg-1">Id</th>
			<th class="col-lg-4">Nama Lengkap </th>
			<th class="col-lg-3">Instansi</th>
			<th class="col-lg-1">Telepon</th>
			<th class="col-lg-2">Email</th>
			<th class="col-lg-1"></th> 
		</tr>
	</thead>
	<tbody>
			<?php foreach ($dataform->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->regidrec;?></td>
			    <td><?php echo $item->namalengkap;?></td>
			    <td><?php echo $item->instansi;?></td>
			    <td><?php echo $item->telepon;?></td>
			    <td><?php echo $item->email;?></td>
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="form_select_row(<?php echo $item->regidrec;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="form_delete_row(<?php echo $item->regidrec;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $form_paging;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>