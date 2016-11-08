<div id="formcontent" class="table-responsive">
<table class="table table-striped">
	<thead>
		<tr> 
			<th class="col-lg-1"><h5><strong>Id</strong></h5></th>
			<th class="col-lg-10"><h5><strong>Judul Newsletter</strong></h5></th> 
			<th class="col-lg-1"></th> 
		</tr>
	</thead>
	<tbody>
			<?php foreach ($dataform->result() as $item){?>
			<tr>
				<td class="col-lg-1"><h5><?php echo $item->idnewsletter;?></h5></td>
			    <td><h5><?php echo $item->judul;?></h5></td> 
			    <td class="col-lg-1 text-center">
			    	<a href="javascript:;" onclick="form_select_row(<?php echo $item->idnewsletter;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="form_delete_row(<?php echo $item->idnewsletter;?>)"><i class="fa fa-trash-o"></i></a>
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