<div id="contenttemplate" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Template</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($dataform_template->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->idtemplate;?></td>
			    <td><?php echo $item->judul;?></td> 
			    <td class="col-lg-1 text-center">
			    	<a href="javascript:;" onclick="template_select_row(<?php echo $item->idtemplate;?>)"><i class="fa fa-edit"></i></a>			    	
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $template_paging;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>