<?php 
 
	 $me			=	$this->m_reff->dtPegawai();
     $fileimage		=	$this->m_reff->tm_pengaturan(38).$me->foto;
	 $file  =	@get_headers($fileimage);
	if($file && strpos( $file[0], '200')) {
	 	  $poto = $fileimage;
	}
	else{
		$poto = base_url()."plug/img/garuda.png";
	} 
?>
	
	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					 
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						 
					 <?php
					 $mode	=	$this->m_reff->tm_pengaturan(39);
		 
					 if(($this->session->userdata("level")=="ADMIN" or $this->session->userdata("level")=="leader") and $mode==1){?>
						  
								<li class="nav-item dropdown hidden-caret">
									<a class="nav-link dropdown-toggle  menuclick" href="<?php echo base_url()?>kehadiran"   >
										<i class=" fab fa-microsoft"></i> Data Kehadiran
									</a> 
								</li>
					 <?php } ?>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?php echo $poto;?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src=" <?php echo $poto;?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $me->nmpeg;?></h4>
												<p class="text-muted"> </p> 
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
									 
										<a class="dropdown-item menuclick" href="<?php echo base_url()?>profile_setting">Akun</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url()?>login/logout">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->