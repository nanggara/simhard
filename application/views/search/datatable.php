<div id="formcontent" class="table-responsive">     	
    	<img id="loading_data" src="<?php echo base_url();?>assets/themes/inspinia/images/724.GIF" class="col-lg-1" >
    	<h2>
    		<?php 
    			if(strlen($keyword)==0){
					$keyword = "Semua Data";
				}
    		?>
    		<?php 
    			if($dataform->num_rows()>0){
    				echo "Ditemukan ".$totalRows." data untuk : <span class='text-navy'>".$keyword."</span>";
				}else{
					echo "Silahkan ketik kata kunci pada <span class='text-navy'>\"Input Pencarian\"</span>";
				}
    		?>
         	
       	</h2>
		<small>Request time  <?php echo $execution_time;?> second </small>
        <div class="col-lg-12"><br><br></div>
                          
    	<?php foreach ($dataform->result() as $item){?>
	    	<?php 
	            		$id = $item->noanggota;
	            		if(strlen($id)==0){
							$id = $item->regidrec;
						}
	            		$jeniskelamin = "Laki-Laki";
	            		if($item->jeniskelamin==0){
							$jeniskelamin = "Perempuan";
						}
			?>
    	<div class="search-result">
        	<h3><a href="javascript:;" onclick="on_print_cv('<?php echo $id;?>')"><?php echo $item->namalengkap;?></a></h3>
            <a href="#" class="search-link"><?php echo $item->email;?></a>
            <p> 
            	Nama : <?php echo $item->namalengkap;?> | 
            	Alamat : <?php echo $item->alamat;?> | 
            	Jenis Kelamin: <?php echo $jeniskelamin;?> | 
            	Kelompok : <?php echo $item->kelompok;?> 
            	<br>Catatan :  <i><?php echo $item->catatan;?></i>
            </p>
            <p>
            	<?php 
            		$att="";
            		$rst = $this->mdl_search->attachment_byanggota($item->regidrec);
            		foreach ($rst->result() as $iatt){
            			$att .= '  <a href="'.base_url().'uploads/photo/'.$iatt->filename.'" target="_blank">'.$iatt->filename.'</a> |';
            		}
            		if(strlen($att)>0){
            			echo "Attachment ".substr($att,0,strlen($att)-1);
            		}
            	?>
            </p>
            <table>
            	<tr>                	
                    <td>&nbsp;</td> 
                    <?php if(strlen($item->cvpath)>0){?>
                    <td><a href="<?php echo base_url();?>uploads/cv/<?php echo $item->cvpath;?>" class="btn btn-outline btn-success btn-xs pull-right">Attachment</a></td>
                    <td>&nbsp;</td>
                    <?php }?>                    
                    <td> 
                    <?php if(strtolower($this->session->userdata('namagrup'))=='administrator'){?>
                    	<a href="<?php echo site_url($item->tipekeanggotaan.'/index?idmembership='.$item->regidrec);?>" class="btn btn-outline btn-success btn-xs pull-right">Edit Data</button><br>
                   	<?php }?>
                    </td>
               	</tr>
          	</table>                                 
      	</div> 
        <div class="hr-line-dashed"></div>
        <?php }?>        
</div>
<div class="col-sm-12">
	<div class="text-center">
     	<?php echo $form_paging;?>
	</div>
</div>
<script> 
	<?php include("paging.js");?>
</script>