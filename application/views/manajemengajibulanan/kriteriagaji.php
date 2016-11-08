<form id="myForm" name="myForm" method="post" action="<?php echo site_url('reports');?>" class="form-horizontal">	
	 <div class="form-group text-left">  
			<div class="col-sm-12">  
				<div class="form-group"><label class="col-sm-2 control-label">Periode Bulan</label>
					<div class="col-sm-2">
						<select id="slc_bulan0" name="slc_bulan0" class="form-control">
							<option value="0">-Pilih Bulan-</option>														<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option> 
						</select> 
					</div>
					<div class="col-sm-2"> 
						<input type="text" placeholder="Input Tahun" id="txt_tahun1" name="txt_tahun1" readonly="readonly" class="form-control" value="<?php echo date('Y');?>"> 
					</div> 
				</div>  				<div class="form-group">					<div class="col-sm-4 col-sm-offset-2">									        <button class="btn btn-primary" type="button" onclick="form_save()">Save</button> 				    	<button class="btn btn-white" type="button" onclick="form_reset()">Cancel</button> 				   	</div>				</div>
			</div>
</form><div id="contentkomponengaji" class="table-responsive"><table class="table table-striped">	<thead>		<tr> 			<th class="col-lg-4">Nama Komponen </th>			<th class="col-lg-3">Kelompok</th>			<th class="col-lg-1">Jenis</th>			<th class="col-lg-1">Status</th>			<th class="col-lg-1"></th> 		</tr>	</thead>	<tbody>			<?php foreach ($ddl_datakomponen->result() as $item){?>			<tr>			    <td><?php echo $item->namakomponengaji;?></td>						    <td>									<?php 						if($item->kodekelompokkompgaji>=1){							echo $item->namakelompok ;						}else{							echo "-";						}					?>									</td>			    <td>									<?php 						if($item->potongan==1){							echo "Potongan";						}else{							echo "Tunjangan";						}					?>									</td>			    <td>									<?php 						if($item->aktif==1){							echo "Aktif";						}else{							echo "Tidak Aktif";						}					?>									</td>			    <td class="col-lg-2 text-center">									<?php 												if($item->aktif==1){					?>							<a href="javascript:;" onclick="komponengaji_aktif_row(<?php echo $item->kodekomponengaji;?>)"><i class="fa fa-minus-square"></i></a>			    											<?php 							}						else{					?>									<a href="javascript:;" onclick="komponengaji_taktif_row(<?php echo $item->kodekomponengaji;?>)"><i class="fa fa-check-square"></i></a>					<?php 						}					?>								    </td>			</tr>			<?php }?>		</tbody>	</table></div> <script>	<?php include("komponen.js");?></script>