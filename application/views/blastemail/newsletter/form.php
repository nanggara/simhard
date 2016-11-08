<div id="modal-form-newsletter" class="modal fade" aria-hidden="true">
	<div class="modal-dialog"> 
    	<div class="modal-content">
        	<div class="modal-body">
            	<form role="form" method="post">
	            	<div class="row"> 
	                    <div class="col-sm-12"> 
	                        <div class="col-sm-5"> 
	                            <img id="progressBar-newsletter" src="<?php echo base_url();?>assets/themes/inspinia/css/progressbar.gif" class="col-lg-12" style="margin-top: 7px;">
	                        </div> 
	                    	<div class="col-sm-7">
	                            <div class="input-group">
	                            	<input type="text" id="txt_search-newsletter" name="txt_search-newsletter" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
	                            	<button type="button" id="btnSearchKelompok" class="btn btn-sm btn-primary" onclick="newsletter_search()"> Go!</button> </span>
	                            </div>
	                        </div>
	                        <br><br>
	                    	<div id="contentnewsletter" class="table-responsive">
							 	<?php include("datatable.php");?> 		     
							</div> 
						</div>
	               	</div>
               	</form>
        	</div>
		</div>
	</div>
</div>
<script>
 <?php include("form.js");?> 
</script>
