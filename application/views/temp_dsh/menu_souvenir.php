<div class="nav-bottom">
	<div class="container">
		<h3 class="title-menu d-flex d-lg-none" style='color:white;font-weight:bold'>
			Menu
			<div class="close-menu"> <i class="flaticon-cross"></i></div>
		</h3>

		<!-- <ul class="nav page-navigation page-navigation-info bg-white" style="background-color:#E42C2D"> -->


<div class="row row-card-no-pd mt--2">
						<div class="col-sm-6 col-md-4 cursor" onclick="goDsh('<?php echo base_url() ?>dsh/virtual')">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-chart-pie text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">FISIK</p>
												<h4 class="card-title">150GB</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4   cursor" onclick="goDsh('<?php echo base_url() ?>dsh/undangan')">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-coins text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">VIRTUAL</p>
												<h4 class="card-title">$ 1,345</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 cursor  " onclick="goDsh('<?php echo base_url() ?>dsh/souvenir')">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-error text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">SOUVENIR</p>
												<h4 class="card-title">23</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						 
					</div>




<script>
function goDsh(url){
	$.get(url,{ajax:"yes"},function(data){
			$(".content").html(data); 
		});
}
</script>




<!--
		<div class="col-md-12 mb-4">
			<div class="card">
				<div class="card-body">

					<ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
						<li class="nav-item">
							<a class="nav-link menuclick " data-toggle="pill" href="<?php echo base_url() ?>dsh/virtual" role="tab">Virtual</a>
						</li>
						<li class="nav-item">
							<a class="nav-link menuclick" data-toggle="pill" href="<?php echo base_url() ?>dsh/undangan" role="tab">Undangan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link menuclick" data-toggle="pill" href="<?php echo base_url() ?>dsh/souvenir" role="tab">Souvenir</a>
						</li>
					</ul>



				</div>
			</div>
		</div>

		<!-- </ul> -->

	</div>
</div>