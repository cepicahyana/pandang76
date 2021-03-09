<?php  echo $this->load->view("temp_vicon/head");?>
 
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
		
		<div class="main-header bg-success-gradient "  >
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
					echo $this->load->view("temp_vicon/navbar_souvenir"); 
					?>
			
			 
					<!-- end Navbar   -->
				
				</div>
			</div>
			<?php 
			 			
				 
				echo $this->load->view("temp_vicon/menu_souvenir");		
				 
			?>
		</div>

	 
		<?php echo $this->load->view("temp_vicon/konten");?>
		<?php echo $this->load->view("temp_vicon/quick");?>
		 
	</div>
	<?php echo $this->load->view("temp_vicon/footer");?>
	 
</body>
</html>
