<form id="myForm" name="myForm" method="post" action="<?php echo site_url('reports');?>" class="form-horizontal">	
	 <div class="form-group text-left">  
			<div class="col-sm-12">  
				<div class="form-group"><label class="col-sm-2 control-label">Periode Bulan</label>
					<div class="col-sm-2">
						<select id="slc_bulan0" name="slc_bulan0" class="form-control">
							<option value="0">-Pilih Bulan-</option>
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
				</div>  
			</div>
</form>