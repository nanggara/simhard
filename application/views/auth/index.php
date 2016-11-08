<!DOCTYPE html>
<?php
$bgLogin = ""; 
$sql = "select * from appconfig where nama='bg'";
$rst = $this->db->query($sql);
if($rst->num_rows()){
	$bgLogin = base_url().$rst->first_row()->isi;
}
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RSUD LANGSA | Login</title>
 
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/font-awesome.css" rel="stylesheet"> 
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/style.css" rel="stylesheet"> 
    
</head>

<body style="background: url(<?php echo $bgLogin;?>) no-repeat center center fixed;">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div style="margin-top:60%; margin-left:20%;">
            <h3>Selamat Datang di Human Resource Development RSUD LANGSA</h3>
            
            <p>Silahkan lakukan login</p>
            <div id="alertMsgLogin" class="alert alert-danger alert-dismissable hide">
				<button id="alertCloseLogin" aria-hidden="true" class="close" type="button" onclick="login_alert_close()">
	            	<i class="fa fa-times"></i>
	          	</button>
	            <small id="alertTextLogin">Selamat datang</small>
	      	</div> 
            <form class="m-t" role="form">
                <div class="form-group">
                    <input type="text" name="txt_username" id="txt_username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="txt_password" id="txt_password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="button" class="btn btn-primary block full-width m-b" onclick="on_login()">Login</button>
 
                 
            </form>
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/themes/inspinia/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/themes/inspinia/js/bootstrap.min.js"></script>
    <script type="text/javascript">
	    <?php include("auth.js");?>
    </script>

</body>
</html>