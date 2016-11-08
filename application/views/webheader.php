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
			$al11 = "";
			$al12 = "";
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
				case "gajibulanan":
    				$judulhalaman =  "Manajemen Gaji";
    				$al11 = "class='active'";
    				break;
				case "manajemengajibulanan":
    				$judulhalaman =  "Manajemen Gaji Bulanan";
    				$al12 = "class='active'";
    				break;

    		}
    	?>
        <nav class="navbar-default navbar-static-side" role="navigation" style="background-color: #18212a;">
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

	                    <li <?php echo $al2;?>>
	                        <a href="<?php echo site_url('recipient');?>"><i class="fa fa-edit"></i> <span class="nav-label">Pegawai</span></a>                         
	                    </li>  
	                    <li <?php echo $al3;?>>
	                        <a href="<?php echo site_url('search');?>"><i class="fa fa-search-plus"></i> <span class="nav-label">Pencarian Pegawai</span></a> 
	                    </li>  

	                    <li <?php echo $al9;?>>
	                        <a href="<?php echo site_url('reports');?>">
	                        	<i class="fa fa-signal"></i> <span class="nav-label">Reports</span> 
	                        </a> 
	                    </li> 

	                    <li <?php echo $al8;?>>
	                        <a href="<?php echo site_url('manajemenuser');?>">
	                        	<i class="fa fa-group"></i> <span class="nav-label">Manajemen User</span> 
	                        </a> 
	                    </li> 

	                    <li <?php echo $al11;?>>
	                        <a href="<?php echo site_url('gajibulanan');?>">
	                        	<i class="fa fa-money"></i> <span class="nav-label">Manajemen Gaji</span> 
	                        </a> 
	                    </li> 

	                    <li <?php echo $al12;?>>
	                        <a href="<?php echo site_url('manajemengajibulanan');?>">
	                        	<i class="fa fa-credit-card"></i> <span class="nav-label">Manajemen Gaji Bulanan</span> 
	                        </a> 
	                    </li> 
						
						<li <?php echo $al8;?>>
	                        <a href="<?php echo site_url('shiftpegawai');?>">
	                        	<i class="fa fa-desktop"></i> <span class="nav-label">Shift Pegawai</span> 
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
        <nav class="navbar navbar-static-top btn-warning" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header">
		   <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#" style="border-radius: 15px;">			
				<i class="fa fa-arrows-h" style="font-size:20px;"></i> 			
		   </a>            
        </div>
            <ul class="nav navbar-top-links navbar-right">   
                <li>
                    <a href="<?php echo site_url('auth/logout');?>">
                       <i class="fa fa-sign-out" style="color:white;"></i><label class="color-white">Log out</label>
                    </a>
                </li>
            </ul> 
        </nav>
        </div>					
				<div class="row wrapper border-bottom white-bg page-heading" stylfxbfe="height:20%;">					<div class="col-lg-10">														<img alt="image" src="<?php echo base_url();?>assets/themes/inspinia/images/hrdrslangsa.png" style="margin-left:15%; margin-top: 5%; margin-bottom: 2%; width:90%">
					</div>
					<div class="col-lg-2">

					</div>
				</div>			
        