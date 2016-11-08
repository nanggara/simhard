<!DOCTYPE html> 
<html>
<head>
	<?php $this->load->view("webhead");?>	
</head>

<body class="pace-done skin-4 boxed-layout">
 
<!-- MODAL -->
<?php include("gajikaryawan/form.php");?>
<!-- END MODAL -->

<?php $this->load->view("webheader");?>
<div class="wrapper wrapper-content animated fadeInRight"> 
  <div class="row"> 
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	MAMAJEMEN GAJI PEGAWAI
                </h5> 
           	</div>
            <div class="ibox-content">
				<?php include("form.php");?>          
			</div>
      	</div>
  	</div>
  </div>
</div>                  
<?php $this->load->view("webfooter");?>
 
 </body>
 </html>