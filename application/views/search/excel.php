<div id="formcontent" class="table-responsive">     	
              
    	<?php foreach ($dataform->result() as $item){?>
    	<div class="search-result">
        	<h3><a href="#"><?php echo $item->namalengkap;?></a></h3>
            <a href="#" class="search-link"><?php echo $item->email;?></a>
            <p>
            	<?php 
            		$jeniskelamin = "Laki-Laki";
            		if($item->jeniskelamin==0){
						$jeniskelamin = "Perempuan";
					}
            	?>
            	Nama : <?php echo $item->namalengkap;?> | Alamat : <?php echo $item->alamat;?> | Jenis Kelamin: <?php echo $jeniskelamin;?> | Email : <?php echo $item->email;?> <br>Catatan :  <i><?php echo $item->catatan;?></i>
            </p>
            <table>
            	<tr>
                	<td><button type="button" onclick="On_Print_CV()" class="btn btn-outline btn-success btn-xs pull-right">Print CV</button></td>
                    <td>&nbsp;</td>
                    <td><button type="button" onclick="On_Edit()" class="btn btn-outline btn-success btn-xs pull-right">Edit Data</button><br></td>
               	</tr>
          	</table>                                 
      	</div> 
        <div class="hr-line-dashed"></div>
        <?php }?>
        
</div>

<?php 
	header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=hasil-export.xls");
    
 ?>