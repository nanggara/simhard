<form id="form2" name="form2" method="post" class="form-inline"> 
	<input type="hidden" id="hdn_search" name="hdn_search" value="">  
	<table class="col-lg-12">
		<tr>
	    	<td>
	        	<div class="form-group"> 
					<select class="form-control" id="ddl_filter1" name="ddl_filter1">
					    <option value="r.namalengkap">Nama</option>
					    <option value="r.noanggota">No Anggota</option>
					    <option value="u.universitas">Universitas</option>
					    <option value="r.jurusan">Jurusan</option> 					    
					    <option value="a.agama">Agama</option> 
					    <option value="r.jeniskelamin">Jenis Kelamin</option>
					    <option value="k.kelompok">Kelompok</option>
					    <option value="date_format(r.tglmasukanggota,'%Y')">Angkatan (Tahun)</option>
					    <option value="r.tipekeanggotaan">Jenis Anggota</option>					    
					    <!-- <option value="k.kelompok">Jurusan</option> -->
					</select>
				</div> 
				<div class="form-group"> 
					<select class="form-control" id="ddl_like1" name="ddl_like1">
				    	<option value="like">Like</option>
				        <option value="=">=</option>
				        <option value="<?php echo "<";?>"><?php echo "<";?></option>
				        <option value="<?php echo ">";?>"><?php echo ">";?></option>				        
					</select>
				</div> 
				<div class="form-group"> 
					<input type="email" placeholder="" id="txt_search_adv1" name="txt_search_adv1" class="form-control" onkeypress="isNumberKey(this)">
				</div>  
				<div class="form-group"> 
					<select class="form-control" id="ddl_op1" name="ddl_op1">
				    	<option value="and">And</option>
				        <option value="or">Or</option> 			        
					</select>
				</div> 
	       	</td>
	  	</tr>
	  	<tr>
	    	<td style="padding-top: 4px">
	        	<div class="form-group"> 
					<select class="form-control" id="ddl_filter2" name="ddl_filter2">
					    <option value="r.namalengkap">Nama</option>
					    <option value="r.noanggota">No Anggota</option>
					    <option value="u.universitas">Universitas</option> 		
					    <option value="r.jurusan">Jurusan</option>			    
					    <option value="a.agama">Agama</option> 
					    <option value="r.jeniskelamin">Jenis Kelamin</option>
					    <option value="k.kelompok">Kelompok</option>  
					    <option value="date_format(r.tglmasukanggota,'%Y')">Angkatan (Tahun)</option>
					    <option value="r.tipekeanggotaan">Jenis Anggota</option>					    
					    <!-- <option value="k.kelompok">Jurusan</option> -->
					</select>
				</div> 
				<div class="form-group"> 
					<select class="form-control" id="ddl_like2" name="ddl_like2">
				    	<option value="like">Like</option>
				        <option value="=">=</option>
				        <option value="<?php echo "<";?>"><?php echo "<";?></option>
				        <option value="<?php echo ">";?>"><?php echo ">";?></option>				        
					</select>
				</div> 
				<div class="form-group"> 
					<input type="email" placeholder="" id="txt_search_adv2" name="txt_search_adv2" class="form-control" onkeypress="isNumberKey(this)">
				</div>  
				<div class="form-group"> 
					<select class="form-control" id="ddl_op2" name="ddl_op2">
				    	<option value="and">And</option>
				        <option value="or">Or</option> 			        
					</select>
				</div> 
	       	</td>
	  	</tr>
	  	<tr>
	    	<td style="padding-top: 4px">
	        	<div class="form-group"> 
					<select class="form-control" id="ddl_filter3" name="ddl_filter3">
					    <option value="r.namalengkap">Nama</option>
					    <option value="r.noanggota">No Anggota</option>
					    <option value="u.universitas">Universitas</option> 	
					    <option value="r.jurusan">Jurusan</option>				    
					    <option value="a.agama">Agama</option> 
					    <option value="r.jeniskelamin">Jenis Kelamin</option>
					    <option value="k.kelompok">Kelompok</option> 
					    <option value="date_format(r.tglmasukanggota,'%Y')">Angkatan (Tahun)</option>
					    <option value="r.tipekeanggotaan">Jenis Anggota</option>					    
					    <!-- <option value="k.kelompok">Jurusan</option> -->
					</select>
				</div> 
				<div class="form-group"> 
					<select class="form-control" id="ddl_like3" name="ddl_like3">
				    	<option value="like">Like</option>
				        <option value="=">=</option>
				         <option value="<?php echo "<";?>"><?php echo "<";?></option>
				        <option value="<?php echo ">";?>"><?php echo ">";?></option>			        
					</select>
				</div> 
				<div class="form-group"> 
					<input type="email" placeholder="" id="txt_search_adv3" name="txt_search_adv3" class="form-control" onkeypress="isNumberKey(this)">
				</div> 
	       	</td>
	  	</tr>
	</table>	
</form> 