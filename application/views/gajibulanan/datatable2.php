<div id="contentkomponengaji" class="table-responsive">
<table class="table table-striped">
	<thead>
		<tr> 
			<th class="col-lg-4">Nama Komponen </th>
			<th class="col-lg-3">Kelompok</th>
			<th class="col-lg-1">Jenis</th>
			<th class="col-lg-1">Status</th>
			<th class="col-lg-1"></th> 
		</tr>
	</thead>
	<tbody>
			<?php foreach ($ddl_datakomponen->result() as $item){?>
			<tr>			    <td><?php echo $item->namakomponengaji;?></td>			
			    <td>									<?php 						if($item->kodekelompokkompgaji>=1){							echo $item->namakelompok ;						}else{							echo "-";						}					?>									</td>
			    <td>									<?php 						if($item->potongan==1){							echo "Potongan";						}else{							echo "Tunjangan";						}					?>									</td>
			    <td>									<?php 						if($item->aktif==1){							echo "Aktif";						}else{							echo "Tidak Aktif";						}					?>									</td>
			    <td class="col-lg-2 text-center">
			    	<a href="javascript:;" onclick="komponengaji_select_row(<?php echo $item->kodekomponengaji;?>)"><i class="fa fa-edit"></i></a>
			    	<a href="javascript:;" onclick="komponengaji_delete_row(<?php echo $item->kodekomponengaji;?>)"><i class="fa fa-trash-o"></i></a>
			    </td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div> 
<div class="col-sm-12">
	<div class="text-center">
     	<?php //echo $pagingkomponengaji;?>
	</div>
</div>  
<script>
	<?php //include("pagingkomponen.js");?>
</script>