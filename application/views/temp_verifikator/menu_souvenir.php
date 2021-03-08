<?php 
     $data			=	$this->m_reff->dtPegawai();
     $fileimage		=	$this->m_reff->tm_pengaturan(38).$data->foto;
	 $file  =	@get_headers($fileimage);
	if($file && strpos( $file[0], '200')) {
	 	  $poto = $fileimage;
	}
	else{
		$poto = base_url()."plug/img/garuda.png";
	} 
?> 

	<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo $poto;?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a   href="javascript:void(0)" style="margin-top:10px">
								<span >
									<?php echo  $data->nmpeg ?>
									<span class="user-level"> </span>
									 
								</span>
							</a>
							 
							 
						</div>
					</div>
					
					
			 
		<ul class="nav nav-primary">
                    						
<!------------------------------------------------------------------------->
 
	<li class='active  nav-item'>
	<a href="<?php echo base_url()?>monitoring_souvenir"  class="menu-toggle menuclick">
	<i class="link-icon icon-screen-desktop"></i> 
	<span>Dashboard</span> 
	</a> 
	</li>
	
	<li class='  nav-item'>
	<a href="<?php echo base_url()?>monitoring_souvenir/data"  class="menu-toggle menuclick">
	<i class="link-icon icon-layers"></i> 
	<span>Data Penerima</span> 
	</a> 
	</li>
	
 <li class='  nav-item'>
	<a href="<?php echo base_url()?>zoom/dashboard"  class="menu-toggle menuclick">
	<i class="link-icon fas fa-video"></i> 
	<span>Rekap Data VCON</span> 
	</a> 
	</li>
 
 
<li class="active"></li>
<!------------------>
 
 
<!------------------------------------------------------------------------->
   </ul>
				
					
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
