<form id="myForm" name="myForm" method="post" action="<?php echo site_url('reportsnonrecipient');?>" class="form-horizontal">	
	 <div class="form-group text-left">  
			<div class="col-sm-12">  
				<div class="form-group"><label class="col-sm-2 control-label">Periode</label>
					<div class="col-sm-2">
						<select id="slc_bulan1" name="slc_bulan1" class="form-control">
							<option value="1">Januari</option>
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
						<input type="text" placeholder="Input Tahun" id="txt_tahun1" name="txt_tahun1" class="form-control" value="<?php echo date('Y');?>"> 
					</div> 
				</div>  
			</div>
			<div class="col-sm-12"> 
				<div class="form-group"><label class="col-sm-2 control-label">s/d</label>
					<div class="col-sm-2">
						<select id="slc_bulan2" name="slc_bulan2" class="form-control">
							<option value="1">Januari</option>
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
						<input type="text" placeholder="Input Tahun" id="txt_tahun2" name="txt_tahun2" class="form-control" value="<?php echo date('Y');?>"> 
					</div>
				</div>  
			</div>
			<div class="col-sm-12"> 
				 &nbsp;
			</div> 
			<div class="col-sm-12"> 
				<div class="form-group"><label class="col-sm-2 control-label">Institusi</label>
					<div class="col-sm-4">
						<select id="slc_institusi" name="slc_institusi" class="form-control">
							<option value="0">SEMUA INSTITUSI</option>
						<?php foreach($ddl_datainstitusi->result() as $kelUni) {?>
						    <option value="<?php echo $kelUni->kodeinstitusi;?>"><?php echo $kelUni->institusi;?></option> 
						<?php }?>
						</select> 
					</div> 
				</div>  
			</div>
			<div class="col-sm-12"> 
				<div class="form-group"><label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-4">
						 <input type="button" name="btnbuka" id="btnbuka" value="BUKA LAPORAN" class="btn btn-primary" onclick="on_buka()">
						 <input type="reset" name="btnreset" id="btnreset" value="RESET" class="btn btn-white">
					</div> 
				</div>  
			</div>
		</div>
</form>