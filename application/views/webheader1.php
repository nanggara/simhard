<div class="pace pace-inactive">
<div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>

    <div id="wrapper">

    	<?php 
    		$judulhalaman = "";
    		$al1 = "";
    		$al2 = "";
    		$al3 = "";
    		$al4 = "";
    		$al5 = "";
    		$al6 = "";
    		$al7 = "";
    		$al8 = "";
    		$al9 = "";
    		$al10 = "";
    		$URI = $this->uri->segment(1);
    		switch($URI){
    			case "nonrecipient":
    				$judulhalaman =  "Halaman Non Recipient";
    				$al1 = "class='active'";
    				break;
    			case "recipient":
    				$judulhalaman =  "Halaman Pegawai";
    				$al2 = "class='active'";
    				break;
    			case "search":
    				$judulhalaman =  "Pencarian Pegawai";
    				$al3 = "class='active'";
    				break;
    			case "emailtemplate":
    				$judulhalaman =  "Template Email";
    				$al4 = "class='active'";
    				break;
    			case "blastemail":
    				$judulhalaman =  "Blast Email";
    				$al5 = "class='active'";
    				break;  
    			case "greetings":
    				$judulhalaman =  "BIRTH GREETINGS";
    				$al7 = "class='active'";
    				break;
    			case "manajemenuser":
    				$judulhalaman =  "Manajemen User";
    				$al8 = "class='active'";
    				break;
    			case "reports":
    				$judulhalaman =  "Reports";
    				$al9 = "class='active'";
    				break;  
    			case "reportsnonrecipient":
    				$judulhalaman =  "Reports Non Recipient";
    				$al10 = "class='active'";
    				break;
    		}
    	?>
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">

                        <div class="dropdown profile-element text-center"> 
                            <img alt="image" src="<?php echo base_url();?>assets/themes/inspinia/images/logo.png" style="width:90%">
                            <br> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                            	<span class="block m-t-xs"> 
                            		<strong class="font-bold">Welcome <?php echo strtoupper($this->session->userdata('username'));?></strong>
                             	</span> 
                             	<span class="text-muted text-xs block">
                             		<?php echo strtoupper($this->session->userdata('namagrup'));?>
                             	</span> 
                             </span> 
                            </a>
                            
                        </div>
                        <div class="logo-element">
                            BCF
                        </div>

                    </li> 
                    
                    <?php 
                    	$grup = strtolower($this->session->userdata('namagrup'));
                    	if($grup=="administrator"){
                    ?>
	                    <!-- <li <?php echo $al1;?>>
	                        <a href="<?php echo site_url('nonrecipient');?>"><i class="fa fa-edit"></i> <span class="nav-label">Non Recipient</span></a>                         
	                    </li> --> 
	                    <li <?php echo $al2;?>>
	                        <a href="<?php echo site_url('recipient');?>"><i class="fa fa-edit"></i> <span class="nav-label">Pegawai</span></a>                         
	                    </li>  
	                    <li <?php echo $al3;?>>
	                        <a href="<?php echo site_url('search');?>">
	                        	<i class="fa fa-search-plus"></i> <span class="nav-label">Pencarian Pegawai</span> 
	                        </a> 
	                    </li>  
	                    <li <?php echo $al4;?>>
	                        <a href="<?php echo site_url('emailtemplate');?>">
	                        	<i class="fa fa-bookmark-o"></i> <span class="nav-label">Email Template</span> 
	                        </a> 
	                    </li> 
	                    <li <?php echo $al5;?>>
	                        <a href="<?php echo site_url('blastemail');?>">
	                        	<i class="fa fa-envelope"></i> <span class="nav-label">Blast Email</span> 
	                        </a> 
	                    </li> 
	                    <!-- <li <?php echo $al7;?>>
	                        <a href="<?php echo site_url('greetings');?>">
	                        	<i class="fa fa-send-o"></i> <span class="nav-label">Greetings</span> 
	                        </a> 
	                    </li> --> 
	                    <li <?php echo $al9;?>>
	                        <a href="<?php echo site_url('reports');?>">
	                        	<i class="fa fa-signal"></i> <span class="nav-label">Reports</span> 
	                        </a> 
	                    </li> 
	                     <!-- <li <?php echo $al10;?>>
	                        <a href="<?php echo site_url('reportsnonrecipient');?>">
	                        	<i class="fa fa-signal"></i> <span class="nav-label">Reports Non Recipient</span> 
	                        </a> 
	                    </li> --> 
	                    <li <?php echo $al8;?>>
	                        <a href="<?php echo site_url('manajemenuser');?>">
	                        	<i class="fa fa-group"></i> <span class="nav-label">Manajemen User</span> 
	                        </a> 
	                    </li> 
	            <?php }else if($grup="user"){?>
	             		<li <?php echo $al3;?>>
	                        <a href="<?php echo site_url('search');?>">
	                        	<i class="fa fa-search-plus"></i> <span class="nav-label">Pencarian Data Alumni</span> 
	                        </a> 
	                    </li> 
	            		<li <?php echo $al9;?>>
	                        <a href="<?php echo site_url('reports');?>">
	                        	<i class="fa fa-signal"></i> <span class="nav-label">Reports</span> 
	                        </a> 
	                    </li> 
	            <?php }?>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top btn-info" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-default " href="#"><i class="fa fa-bars"></i> </a>            
        </div>
            <ul class="nav navbar-top-links navbar-right">   
                <li>
                    <a href="<?php echo site_url('auth/logout');?>">
                        <i class="fa fa-sign-out"></i> <label class="color-white">Log out</label>
                    </a>
                </li>
            </ul> 
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Human Resource Development</h2>
                    <ol class="breadcrumb">
                        <!-- <li>
                            <a onclick="javascript:;">Human Resource Development</a>
                        </li> -->
                        <li>
                            <a onclick="javascript:;"><?php echo $judulhalaman;?></a>
                        </li> 
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        