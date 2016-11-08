<!DOCTYPE html> 
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSUD LANGSA | Database Pegawai</title>    
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/token-input-facebook.css" rel="stylesheet">    
</head>

<body class="pace-done boxed-layout">
<?php $this->load->view("webheader");?>
<div class="wrapper wrapper-content animated fadeInRight"> 
  <div class="row"> 
  	<div class="col-lg-12">
    	<div class="ibox float-e-margins">
        	<div class="ibox-title">
            	<h5>
                	REPORTS
                </h5> 
           	</div>
           	<div class="ibox-content">
            	<?php include("detailrow.php");?>
            </div>
      	</div>
  	</div>
  </div>
</div>      
<?php $this->load->view("webfooter");?>
</body>
</html>