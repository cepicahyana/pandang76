<div class="nav-bottom">
	<div class="container">
		<h3 class="title-menu d-flex d-lg-none" style='color:white;font-weight:bold'>
			Menu
			<div class="close-menu"> <i class="flaticon-cross"></i></div>
		</h3>
		<ul class="nav page-navigation page-navigation-info bg-white" style="background-color:#E42C2D">

			<li class="nav-item  submenu  ">
				<a class="nav-link menuclick" href="<?php echo base_url() ?>mode_fisik">
					<i class="link-icon icon-screen-desktop"></i>
					<span class="menu-title"> Dashboard</span>
				</a>
				<div class="navbar-dropdown animated fadeIn">
					<ul>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle  menuclick" href="<?php echo base_url() ?>mode_fisik">
								<i class=" fas fa-chart-bar"></i> Klasifikasi
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle  menuclick" href="<?php echo base_url() ?>kehadiran">
								<i class=" fab fa-microsoft"></i> Data Kehadiran
							</a>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle  menuclick" href="<?php echo base_url() ?>dashboard/jadwal_distribusi">
								<i class="fa fa-calendar"></i> Jadwal Distribusi
							</a>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle  menuclick" href="<?php echo base_url() ?>mapping_blok">
								<i class="fa fa-couch"></i> Mapping Blok
							</a>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle  menuclick" href="<?php echo base_url() ?>dashboard/mappingWilayah">
								<i class="fas fa-map-marked-alt"></i> Data perwilayah
							</a>
						</li>


					</ul>
				</div>
			</li>


			<li class="nav-item submenu">
				<a class="nav-link" href="#">
					<i class="link-icon icon-grid"></i>
					<span class="menu-title">Input</span>
				</a>
				<div class="navbar-dropdown animated fadeIn">
					<ul>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>registrasi/persus">Input Permohonan </a>
						</li>

						<li>
							<a class='menuclick' href="<?php echo base_url() ?>registrasi/import">Import File</a>
						</li>

					</ul>
				</div>
			</li>

			<li class="nav-item submenu ">
				<a class="nav-link" href="#">
					<i class="link-icon icon-disc"></i>
					<span class="menu-title">Verifikasi</span>
				</a>
				<div class="navbar-dropdown animated fadeIn">
					<ul>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>dispo/online">Verifikasi Permohonan Online</a>
						</li>

						<li>
							<a class='menuclick' href="<?php echo base_url() ?>dispo/persus">Dispo Persus & Given</a>
						</li>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>dispo/lainnya">Verifikasi Acara lainnya</a>
						</li>

					</ul>
				</div>
			</li>
			<li class="nav-item   submenu">
				<a class="nav-link" href="#">
					<i class="link-icon icon-envelope"></i>
					<span class="menu-title">Pendistribusian </span>
				</a>
				<div class="navbar-dropdown animated fadeIn">
					<ul>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>distribusi/online">Penjadwalan Permohonan Online</a>
						</li>

						<li>
							<a class='menuclick' href="<?php echo base_url() ?>penyerahan/persus">Penyerahan/penyiapan Persus & Given </a>
						</li>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>penyerahan/lainnya">Penyerahan/penyiapan Acara lainnya</a>
						</li>

					</ul>
				</div>
			</li>
			<li class="nav-item   submenu ">
				<a class="nav-link  " href="#">
					<i class="link-icon icon-user"></i>
					<span class="menu-title"> Rekap Pemohon</span>
				</a>
				<div class="navbar-dropdown animated fadeIn">
					<ul>
						<li>
							<a class="menuclick" href="<?php echo base_url() ?>permohonan/online"> Permohonan Online</a>
						</li>
						<li>
							<a class="menuclick" href="<?php echo base_url() ?>permohonan/persus"> Permintaan Khusus & Given </a>
						</li>

						<li>
							<a class="menuclick" href="<?php echo base_url() ?>permohonan/lainnya">Data permohonan acara lainnya</a>
						</li>


					</ul>
				</div>
			</li>



			<li class="nav-item submenu">
				<a class="nav-link" href="#">
					<i class="link-icon icon-book-open"></i>
					<span class="menu-title">Lainnya</span>
				</a>
				<div class="navbar-dropdown animated fadeIn">
					<ul>

						<li>
							<a class='menuclick' href="<?php echo base_url() ?>akun/verifikator">Data akun </a>
						</li>

						<li>
							<a class=' ' href="<?php echo base_url() ?>autodispo">Atur autodispo untuk umum </a>
						</li>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>konfigurasi">Konfigurasi Konten</a>
						</li>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>konfigurasi/email">Konfigurasi Email</a>
						</li>

						<li>
							<a class='menuclick' href="<?php echo base_url() ?>konfigurasi/gelang">Desain gelang </a>
						</li>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>konfigurasi/database">Backup Database</a>
						</li>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>konfigurasi/check">Pandang check</a>
						</li>
						<li>
							<a class='menuclick' href="<?php echo base_url() ?>konfigurasi/frontend">Konten pandang frontend</a>
						</li>
					</ul>
				</div>
			</li>

		</ul>
	</div>
</div>