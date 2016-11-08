 
	<div class="row wrapper">
    	<div class="col-lg-10">
        	<h2>Pencarian Data</h2>
            <ol class="breadcrumb">
            <li>
            	<a href="#">Home</a>
            </li>
            <li>
            	<a>Forms</a>
            </li>
            <li class="active">
            	<strong>Pencarian Data Pegawai</strong>
            </li>
            </ol>
      	</div>
        <div class="col-lg-2">

		</div>
	</div>
	
	 <div class="wrapper wrapper-content animated fadeInRight">
             <div class="row">
                <div class="col-lg-12">
                	 <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            
                            <div class="search-form">
                                <form role="form" method="post" >
                                    <div class="input-group">
                                        <input type="text" placeholder="Ketik Nama Seseorang " id="txt_search" 
                                        	   name="txt_search" class="form-control input-lg" onkeypress="isNumberKey(this)">
                                        
                                        <div class="input-group-btn">
                                            <button type="button" onclick="on_form_search()" class="btn btn-lg btn-primary" >
                                                Search
                                            </button> 
                                            <button onclick="on_print_search()"  type="button" class="btn btn-lg btn-info">
                                                Print
                                            </button>
                                            <button onclick="on_print_excel()" type="button" class="btn btn-lg btn-warning" >
                                                Export
                                            </button>
                                            <button onclick="on_advancesearch()" type="button" class="btn btn-lg btn-default" >
                                                Advanced
                                            </button>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                            
                            <div id="contentadvancesearch" class="co-lg-12">
                            	<?php include("advancesearch.php");?>
                            </div>
                            
                            <div class="col-lg-12"><br></div>
                            
                            <div id="formcontent" class="table-responsive col-lg-12">
							 	<?php include("datatable.php");?> 		     
							</div> 
                        </div>
                    </div> 
                    <p>&nbsp;</p>
                </div>
             </div>
        </div>
	
 
<!-- END FORM -->
<script>
<?php include("form.js");?>
</script>
