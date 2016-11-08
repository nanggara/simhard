<!DOCTYPE html> 
<html>
<head>
	<?php $this->load->view("webhead");?>	
</head>

<body class="pace-done boxed-layout">

<?php $this->load->view("webheader");?>


<div class="wrapper wrapper-content animated fadeInRight"> 
  <div class="row"> 
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	KRITERIA
                </h5> 
           	</div>
            <div class="ibox-content text-center">
				 <?php include("kriteria.php");?>   
			</div>
      	</div>
  	</div> 
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	REPORTS&nbsp; 
                	<?php echo $namainstitusi;?>&nbsp;
                </h5>  
                <h5><?php echo $periode;?></h5>
                 
           	</div>
            <div class="ibox-content text-center"> 
				<?php   
						$datar['rowdetail'] = $this->mdl_reports->select_detailinstitusi($institusi,$periode1,$periode2);
						$datar['kodeinstitusi'] = $institusi; 
						$this->load->view("reportsnonrecipient/detailrow",$datar); 
				?>        
			</div>
      	</div>
  	</div> 
  </div> 
</div>
<script>
<?php include("form.js");?>
</script>
<?php $this->load->view("webfooter");?>
 
 </body>
 </html>