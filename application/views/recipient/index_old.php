<!DOCTYPE html> 
<html>
<head>
	<?php $this->load->view("webhead");?>	
</head>

<body class="pace-done skin-4 boxed-layout">
 
<!-- MODAL -->
<?php include("progressdialog.php");?>
<?php include("keluarga/form.php");?>
<?php include("pendidikan/form.php");?>
<?php include("pendidikannf/form.php");?>
<?php include("organisasi/form.php");?>
<?php include("kerja/form.php");?>
<?php include("volunteer/form.php");?>
<?php include("prestasi/form.php");?>
<?php include("kelompok/form.php");?>
<?php include("agama/form.php");?>
<?php include("universitas/form.php");?>
<?php include("jenjang/form.php");?>
<?php include("pekerjaan/form.php");?>
<?php include("institusi/form.php");?>
<?php include("instansi/form.php");?>
<?php include("fileupload/form.php");?>
<!-- END MODAL -->
<!-- END MODAL -->

<?php $this->load->view("webheader");?>
<div class="wrapper wrapper-content animated fadeInRight"> 
  <div class="row"> 
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	RECIPIENT
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