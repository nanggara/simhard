<div id="contentnewsletter" class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Newsletter</th>
				<th></th> 
			</tr>
		</thead>
		<tbody> 
			<?php foreach ($dataform_newsletter->result() as $item){?>
			<tr>
				<td class="col-lg-1"><?php echo $item->idnewsletter;?></td>
			    <td><?php echo $item->judul;?></td> 
			    <td class="col-lg-1 text-center">
			    	<a href="javascript:;" onclick="newsletter_select_row(<?php echo $item->idnewsletter;?>)"><i class="fa fa-edit"></i></a>			    	
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $newsletter_paging;?>
	</div>
</div>  
<script>
	<?php include("paging.js");?>
</script>