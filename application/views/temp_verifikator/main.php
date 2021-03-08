
<?php  echo $this->load->view("temp_verifikator/head");?>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo text-white">
					PANDANG ISTANA
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
				<?php  echo $this->load->view("temp_verifikator/navbar");?>
		
		</div>

		<?php 
		$mode	=	$this->m_reff->tm_pengaturan(39);
		if($mode==2){
		echo $this->load->view("temp_verifikator/menu_souvenir");
		}else{ 
		echo $this->load->view("temp_verifikator/menu");
		}?>
		<?php  echo $this->load->view("temp_verifikator/konten");?>
		
		 
		 
		<!-- End Custom template -->
	</div>
	
		<?php echo $this->load->view("temp_verifikator/footer");?>
	