<div id="formcontent" class="table-responsive">
<table class="table table-striped">
	<thead>
		<tr> 
			<th class="col-lg-1"><h5><strong>Id</strong></h5></th>
			<th><h5><strong>Judul Greeting</strong></h5></th>
			<th class="col-lg-3"><h5><strong>From</strong></h5></th>  
			<th class="col-lg-1"></th> 
		</tr>
	</thead>
	<tbody>
			<?php foreach ($dataform->result() as $item){?>
			<tr>
				<td class="col-lg-1"><h5><?php echo $item->idgreeting;?></h5></td>
			    <td><h5><?php echo $item->judul;?></h5></td>
			    <td><h5><?php echo $item->fromsender;?></h5></td>  
			    <td class="col-lg-1 text-center">
			    	<a href="javascript:;" onclick="form_select_row(<?php echo $item->idgreeting;?>)"><i class="fa fa-edit"></i></a>			    	
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