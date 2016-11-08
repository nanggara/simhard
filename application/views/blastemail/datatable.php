<div id="formcontent" class="table-responsive">
<table class="table table-striped">
	<thead>
		<tr> 
			<th class="col-lg-1"><h5><strong>Id</strong></h5></th>
			<th class="col-lg-2"><h5><strong>Tanggal</strong></h5></th> 
			<th ><h5><strong>Subjek</strong></h5></th>
			<th class="col-lg-3"><h5><strong>Email</strong></h5></th>
			<th class="col-lg-1"><h5><strong>Status</strong></h5></th>  
			<th class="col-lg-1"></th> 
		</tr>
	</thead>
	<tbody>
			<?php foreach ($dataform->result() as $item){?>
			<tr>
				<td class="col-lg-1"><h5><?php echo $item->kodeemail;?></h5></td>
				<td class="col-lg-2"><h5><?php echo date('d-m-Y H:i',strtotime($item->tanggal));?></h5></td>
			    <td><h5><?php echo $item->subjek;?></h5></td>
			    <td><h5><?php echo $item->kepada;?></h5></td>
			    <td>
			    	<h5>
			    		<?php
			    			switch($item->status){
								case 0:
									echo "Baru";
									break;
								case 1:
									echo "Sukses";
									break;
								case 2:
									echo "Gagal";
									break;
							} 
			    			
			    		?>
			    	</h5></td>  
			    <td class="text-center">			    	
			    	<a href="javascript:;" title="Delete" onclick="form_delete_row(<?php echo $item->kodeemail;?>)"><i class="fa fa-trash-o"></i></a>
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