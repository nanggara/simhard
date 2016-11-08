<div id="formcontent" class="table-responsive">
<?php 
$sql_q = "select tanggal, 
(SELECT  count(status) as jumlah FROM `blastemail` where status=1 and date_format(tanggal,'%Y-%m-%d')='2014-12-08') as sukses,
(SELECT  count(status) as jumlah FROM `blastemail` where status=2 and date_format(tanggal,'%Y-%m-%d')='2014-12-08') as gagal
from blastemail where date_format(tanggal,'%Y-%m-%d')='2014-12-08' group by tanggal";
$rstSql = $this->db->query($sql_q);
?>
<table class="table table-striped">
	<thead>
		<tr>  
			<th class="col-lg-2"><h5><strong>Tanggal</strong></h5></th>  
			<th class="col-lg-4 text-center"><h5><strong>Terkirim</strong></h5></th>
			<th class="col-lg-4 text-center"><h5><strong>Gagal</strong></h5></th>   
		</tr>
	</thead>
	<tbody>
			<?php foreach ($rstSql->result() as $item){?>
			<tr> 
				<td class="col-lg-2"><h5><?php echo date('d-m-Y',strtotime($item->tanggal));?></h5></td> 
			    <td class="text-center"><h5><?php echo $item->sukses;?></h5></td>
			    <td class="text-center"><h5><?php echo $item->gagal;?></h5></td>   
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