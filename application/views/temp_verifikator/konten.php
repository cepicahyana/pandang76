<?php 
if(isset($konten)){?>
	
	<div class="main-panel" id="loading">
			<div class="container">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							 
							 
						</div>
					</div>
				</div>
				<div class="page-inner mt--5"> 
					<div class="row content">
					 
						   <?php echo $this->load->view($konten);?>
					</div>
				</div>
			</div> 
 </div>
		 
          
        
     
	 
<?php 	}else{	echo "File Konten Tidak Ada";}; ?>



		