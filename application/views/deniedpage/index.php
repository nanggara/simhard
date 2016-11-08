<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RSUD LANGSA | Database Pegawai</title>

    <link href="<?php echo base_url();?>assets/themes/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/themes/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/themes/inspinia/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1>STOP</h1>
        <h3 class="font-bold">Akses ke halaman ini ditolak</h3>

        <div class="error-desc">
            <?php echo $pesan;?> <br/><a href="<?php echo site_url('search');?>" class="btn btn-primary m-t">Kembali</a>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/themes/inspinia/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/themes/inspinia/js/bootstrap.min.js"></script>

</body>

</html>