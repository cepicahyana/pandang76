<?php
error_reporting(0);
$me			=	$this->m_reff->dtPegawai();
$fileimage		=	$this->m_reff->tm_pengaturan(38) . $me->foto;
$file  =	@get_headers($fileimage);
if ($file && strpos($file[0], '200')) {
	$foto = $fileimage;
} else {
	$foto = base_url() . "plug/img/garuda.png";
}
?>


<nav class="navbar navbar-header navbar-expand-lg p-0">

	<div class="container-fluid p-0">

		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

			<li class="nav-item  dropdown hidden-caret">
				<a class="nav-link dropdown-toggle " href="<?php echo base_url() ?>mode_vicon">
					<i class="fa fa-angle-double-right"></i> Mode undangan virtual
				</a>
			</li>


			<li class="nav-item active dropdown hidden-caret">
				<a class="nav-link dropdown-toggle " href="<?php echo base_url() ?>mode_fisik">
					<i class="fa fa-angle-double-right"></i><span style="color:yellow"> Mode undangan fisik</span>
				</a>
			</li>



			<li class="nav-item dropdown hidden-caret">
				<a class="nav-link dropdown-toggle " href="<?php echo base_url() ?>mode_souvenir">
					<i class="fa fa-angle-double-right"></i> Mode Souvenir
				</a>
			</li>


			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="avatar-sm">
						<img src="<?php echo $foto; ?>" alt="..." class="avatar-img rounded-circle">
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box">
								<div class="avatar-lg"><img src="<?php echo $foto; ?>" alt="image profile" class="avatar-img rounded"></div>
								<div class="u-text">
									<h4><?php echo $me->nmpeg ?> </h4>
									<p class="text-muted"><?php echo $me->email ?></p>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url() ?>profile">Profile</a>
							<a class="dropdown-item" href="<?php echo base_url() ?>login/logout">Logout</a>
						</li>
					</div>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<!-- End Navbar -->