<?php  echo $this->load->view("temp_user/head");?>
 
<style>
..bg{
background-image:url('<?php echo base_url()?>plug/img/baner.JPG');  
 background-repeat: no-repeat;
background-size: cover; 
}
</style>


<!--<body style='background-color:#c9c9c9'>-->
<body style='background-color:#E6E6FA'>
	<div class="wrapper horizontal-layout-2 ">
		
		<div class="main-header bg-secondary-gradient "  >
			<div class="nav-top">
				<div class="container d-flex flex-row">
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"  style='color:white'>
							<i class="icon-menu"></i>
						</span>
					</button>
					<button class="topbar-toggler more"  style='color:white'><i class="icon-options-vertical"></i></button>
					<!-- Logo Header -->
					<a href="" class="logo d-flex align-items-center" style="min-width:300px">
						 
					<b style='color:white;margin-left:0px;font-size:20px'><strong>PANDANG ISTANA</strong></b></a>
					<!-- End Logo Header -->

					<!-- Navbar Header -->
					<?php 
			$mode	=	$this->m_reff->tm_pengaturan(39);
			if($mode==1){			
				echo $this->load->view("temp_user/navbar");
					}else{
			echo $this->load->view("temp_user/navbar_souvenir");
					}
			
			?>
			
			 
					<!-- end Navbar   -->
				
				</div>
			</div>
			<?php 
			$mode	=	$this->m_reff->tm_pengaturan(39);
			if($mode==1){			
				echo $this->load->view("temp_user/menu");
					}else{
				echo $this->load->view("temp_user/menu_souvenir");		
					}
			
			?>
		</div>

	 
		<?php echo $this->load->view("temp_user/konten");?>
		<?php echo $this->load->view("temp_user/quick");?>
		 
	</div>
	<?php echo $this->load->view("temp_user/footer");?>
	 
</body>
</html>
