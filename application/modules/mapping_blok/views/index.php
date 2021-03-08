<?php
	$this->load->model("model", "mdl");

	//pagi
	$a1 = $this->mdl->getBlok("A", "1");
	$b1 = $this->mdl->getBlok("B", "1");
	$c1 = $this->mdl->getBlok("C", "1");
	$d1 = $this->mdl->getBlok("D", "1");
	$e1 = $this->mdl->getBlok("E", "1");
	$f1 = $this->mdl->getBlok("F", "1");
	$g1 = $this->mdl->getBlok("G", "1");
	$h1 = $this->mdl->getBlok("H", "1");
	$i1 = $this->mdl->getBlok("I", "1");
	$j1 = $this->mdl->getBlok("J", "1");
	$k1 = $this->mdl->getBlok("K", "1");

	$m1 = $this->mdl->getBlok("M", "1");

	//sore
	$a2 = $this->mdl->getBlok("A", "2");
	$b2 = $this->mdl->getBlok("B", "2");
	$c2 = $this->mdl->getBlok("C", "2");
	$d2 = $this->mdl->getBlok("D", "2");
	$e2 = $this->mdl->getBlok("E", "2");
	$f2 = $this->mdl->getBlok("F", "2");
	$g2 = $this->mdl->getBlok("G", "2");
	$h2 = $this->mdl->getBlok("H", "2");
	$i2 = $this->mdl->getBlok("I", "2");
	$j2 = $this->mdl->getBlok("J", "2");
	$k2 = $this->mdl->getBlok("K", "2");

	$m2 = $this->mdl->getBlok("M", "2");
?>

<style type="text/css">
	.pointer{
		cursor: pointer;
	}
</style>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="area_formSubmit">

    <div class="card">
        <div class="card-header">
            <div class="card-title">Mapping Blok</div>
        </div>

        <div class="row card-body" style='padding-top:10px;padding-bottom:20px'>
        	<div class="col-md-12 text-center">
				<h2>DENAH UNDANGAN UPACARA DETIK - DETIK PROKLAMASI</h2>        			
        	</div>
        	<div class="col-md-12 pt-4">
        		<ul class="nav nav-tabs" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#pagi" role="tab" >
				    	Acara Pagi
				    </a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#sore" role="tab" >
				    	Acara Sore
				    </a>
				  </li>

				</ul>
        	</div>


        	<div class="col-md-12 pt-4" role="tabpanel">
        		<div class="tab-content" id="myTabContent">
        			<div class="tab-pane fade show active" id="pagi" role="tabpanel">
		        		<table width="100%">
		        			<tr>
		        				<td align="left" valign="top">
		        					<div class="text-center pb-4">
		        						<button class="btn btn-outline-info">BARAT</button>
		        					</div>
		        					<div class="card text-white bg-info mb-3 pointer" style="max-width: 12rem;" onclick="detail('I', '1')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK I</strong></h5>
									    <p class="card-text">
									    	<?php echo $i1["jml"]." / ".$i1["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3 pointer"style="max-width: 12rem;" onclick="detail('J', '1')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK J</strong></h5>
									    <p class="card-text">
									    	<?php echo $j1["jml"]." / ".$j1["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3 pointer"style="max-width: 12rem;" onclick="detail('K', '1')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK K</strong></h5>
									    <p class="card-text">
									    	<?php echo $k1["jml"]." / ".$k1["target"]; ?>
									    </p>
									  </div>
									</div>
		        				</td>

		        				<td valign="top" align="center">
		        					<table width="100%">
		        						<tr>
		        							<td align="left" width="200">
		        								<div class="card text-white bg-info mb-3 pointer"style="max-width: 12rem;"  onclick="detail('C', '1')">
												  <div class="card-body text-center">
												    <h5 class="card-title"><strong>BLOK C</strong></h5>
												    <p class="card-text">
												    	<?php echo $c1["jml"]." / ".$c1["target"]; ?>
												    </p>
												  </div>
												</div>		
		        							</td>
		        							<td align="center" >
		        								<div class="card text-white bg-info mb-3 pointer"style="padding: 0;">
												  <div class="card-body text-center" style="height: 104px;padding: 0;">
												    <table width="100%" border="0" height="100%">
												    	<tr>
												    		<td bgcolor="red"  onclick="detail('A', '1')"><h5 style="font-size: 20px;color:#2A2F5B;"><strong>A</strong></h5></td>
												    		<td onclick="detail('M', '1')"><h5 style="font-size: 20px;color:#2A2F5B;"><strong>VVIP / MIMHOR</strong></h5></td>
												    		<td bgcolor="blue" onclick="detail('B', '1')"><h5 style="font-size: 20px;color:#2A2F5B;"><strong>B</strong></h5></td>
												    	</tr>
												    	<tr>
												    		<td bgcolor="red" onclick="detail('A', '1')"><?php echo $a1['jml'] ?> / <?php echo $a1['target'] ?></td>
												    		<td onclick="detail('M', '1')"><?php echo $m1["jml"]." / ".$m1["target"]; ?></td>
												    		<td bgcolor="blue" onclick="detail('B', '1')"><?php echo $b1["jml"]." / ".$b1["target"]; ?></td>
												    	</tr>
												    </table>
												  </div>
												</div>
		        							</td>
		        							<td align="right" width="200">
		        								<div class="card text-white bg-info mb-3 pointer"style="max-width: 12rem;" onclick="detail('D', '1')">
												  <div class="card-body text-center">
												    <h5 class="card-title"><strong>BLOK D</strong></h5>
												    <p class="card-text">
												    	<?php echo $d1["jml"]." / ".$d1["target"]; ?>
												    </p>
												  </div>
												</div>
		        							</td>
		        						</tr>
		        						<tr>
		        							<td colspan="3" align="center">
		        								<div class="card text-white bg-info mb-3 pointer"style="max-width: 30rem;height: 450px;">
												  <div class="card-body text-center">
												    <h5 class="card-title"><strong>HALAMAN DEPAN ISTANA MERDEKA</strong></h5>
												    <p class="card-text text-center">
												    	<i class="fas fa-flag fa-lg" style="font-size: 100px;margin-top: 140px"></i>
												    </p>
												  </div>
												</div>
		        							</td>
		        						</tr>
		        					</table>
		        				</td>
		        				
		        				<td align="right" valign="top">
		        					<div class="text-center pb-4">
		        						<button class="btn btn-outline-info">TIMUR</button>
		        					</div>
		        					<div class="card text-white bg-info mb-3 pointer"style="max-width: 12rem;" onclick="detail('E', '1')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK E</strong></h5>
									    <p class="card-text">
									    	<?php echo $e1["jml"]." / ".$e1["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3 pointer"style="max-width: 12rem;" onclick="detail('F', '1')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK F</strong></h5>
									    <p class="card-text">
									    	<?php echo $f1["jml"]." / ".$f1["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3 pointer"style="max-width: 12rem;" onclick="detail('G', '1')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK G</strong></h5>
									    <p class="card-text">
									    	<?php echo $g1["jml"]." / ".$g1["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3 pointer"style="max-width: 12rem;" onclick="detail('H', '1')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK H</strong></h5>
									    <p class="card-text">
									    	<?php echo $h1["jml"]." / ".$h1["target"]; ?>
									    </p>
									  </div>
									</div>
		        				</td>
		        			</tr>
		        		</table>
		        		<div class="row">
			        		<div class="col-md-12 pt-4">
				        		<h3>Progress Kuota Disposisi Peserta Acara Pagi</h3>
				        	</div>
			        		<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok A</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("A", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("A", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("A", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok B</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("B", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("B", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("B", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok C</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("C", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("C", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("C", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok D</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("D", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("D", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("D", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok E</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("E", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("E", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("E", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok F</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("F", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("F", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("F", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok G</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("G", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("G", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("G", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok H</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("H", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("H", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("H", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok I</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("I", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("I", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("I", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok J</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("J", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("J", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("J", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok K</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("K", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("K", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("K", "1") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok VVIP / MIMHOR</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-info" style="width: <?php echo $this->mdl->getPercent("M", "1") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("M", "1") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("M", "1") ?>%</p>
								</div>
				        	</div>
				        </div>
		        	</div>
		        	<div class="tab-pane fade" id="sore" role="tabpanel">
						<table width="100%">
							<tr>
								<td align="left" valign="top">
									<div class="text-center pb-4">
										<button class="btn btn-outline-warning">BARAT</button>
									</div>
									<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('I', '2')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK I</strong></h5>
									    <p class="card-text">
									    	<?php echo $i2["jml"]." / ".$i2["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('J', '2')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK J</strong></h5>
									    <p class="card-text">
									    	<?php echo $j2["jml"]." / ".$j2["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('K', '2')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK K</strong></h5>
									    <p class="card-text">
									    	<?php echo $k2["jml"]." / ".$k2["target"]; ?>
									    </p>
									  </div>
									</div>
								</td>

								<td valign="top" align="center">
									<table width="100%">
										<tr>
											<td align="left" width="200">
												<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('C', '2')">
												  <div class="card-body text-center">
												    <h5 class="card-title"><strong>BLOK C</strong></h5>
												    <p class="card-text">
												    	<?php echo $c2["jml"]." / ".$c2["target"]; ?>
												    </p>
												  </div>
												</div>		
											</td>
											<td align="center" >
												<div class="card text-white bg-warning mb-3 pointer"style="padding: 0;">
												  <div class="card-body text-center" style="height: 104px;padding: 0;">
												    <table width="100%" border="0" height="100%">
												    	<tr>
												    		<td bgcolor="red" onclick="detail('A', '2')"><h5 style="font-size: 20px;color:#2A2F5B;"><strong>A</strong></h5></td>
												    		<td onclick="detail('M', '2')"><h5 style="font-size: 20px;color:#2A2F5B;"><strong>VVIP / MIMHOR</strong></h5></td>
												    		<td bgcolor="blue" onclick="detail('B', '2')"><h5 style="font-size: 20px;color:#2A2F5B;"><strong>B</strong></h5></td>
												    	</tr>
												    	<tr>
												    		<td bgcolor="red" onclick="detail('A', '2')"><?php echo $a2['jml'] ?> / <?php echo $a2['target'] ?></td>
												    		<td onclick="detail('M', '2')"><?php echo $m2["jml"]." / ".$m2["target"]; ?></td>
												    		<td bgcolor="blue" onclick="detail('B', '2')"><?php echo $b2["jml"]." / ".$b2["target"]; ?></td>
												    	</tr>
												    </table>
												  </div>
												</div>
											</td>
											<td align="right" width="200">
												<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('D', '2')">
												  <div class="card-body text-center">
												    <h5 class="card-title"><strong>BLOK D</strong></h5>
												    <p class="card-text">
												    	<?php echo $d2["jml"]." / ".$d2["target"]; ?>
												    </p>
												  </div>
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">
												<div class="card text-white bg-warning mb-3 pointer"style="max-width: 30rem;height: 450px;" >
												  <div class="card-body text-center">
												    <h5 class="card-title"><strong>HALAMAN DEPAN ISTANA MERDEKA</strong></h5>
												    <p class="card-text text-center">
												    	<i class="fas fa-flag fa-lg" style="font-size: 100px;margin-top: 140px"></i>
												    </p>
												  </div>
												</div>
											</td>
										</tr>
									</table>
								</td>
								
								<td align="right" valign="top">
									<div class="text-center pb-4">
										<button class="btn btn-outline-warning">TIMUR</button>
									</div>
									<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('E', '2')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK E</strong></h5>
									    <p class="card-text">
									    	<?php echo $e2["jml"]." / ".$e2["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('F', '2')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK F</strong></h5>
									    <p class="card-text">
									    	<?php echo $f2["jml"]." / ".$f2["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('G', '2')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK G</strong></h5>
									    <p class="card-text">
									    	<?php echo $g2["jml"]." / ".$g2["target"]; ?>
									    </p>
									  </div>
									</div>
									<div class="card text-white bg-warning mb-3 pointer"style="max-width: 12rem;" onclick="detail('H', '2')">
									  <div class="card-body text-center">
									    <h5 class="card-title"><strong>BLOK H</strong></h5>
									    <p class="card-text">
									    	<?php echo $h2["jml"]." / ".$h2["target"]; ?>
									    </p>
									  </div>
									</div>
								</td>
							</tr>
						</table>
						<div class="row">
			        		<div class="col-md-12 pt-4">
				        		<h3>Progress Kuota Disposisi Peserta Acara Sore</h3>
				        	</div>
			        		<div class="col-12 col-md-4 pt-4 ">
				        		<h5>Blok A</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("A", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("A", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("A", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok B</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("B", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("B", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("B", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok C</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("C", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("C", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("C", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok D</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("D", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("D", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("D", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok E</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("E", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("E", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("E", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok F</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("F", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("F", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("F", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok G</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("G", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("G", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("G", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok H</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("H", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("H", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("H", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok I</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("I", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("I", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("I", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok J</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("J", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("J", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("J", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok K</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("K", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("K", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("K", "2") ?>%</p>
								</div>
				        	</div>
				        	<div class="col-12 col-md-4 pt-4">
				        		<h5>Blok VVIP / MIMHOR</h5>
				        		<div class="progress progress-sm">
									<div class="progress-bar bg-warning" style="width: <?php echo $this->mdl->getPercent("M", "2") ?>% !important" role="progressbar" aria-valuenow="<?php echo $this->mdl->getPercent("M", "2") ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex justify-content-between mt-2">
									<p class="text-muted mb-0"></p>
									<p class="text-muted mb-0"><?php echo $this->mdl->getPercent("M", "2") ?>%</p>
								</div>
				        	</div>
				        </div>
					</div>
        		</div>
        	</div>

        	

        	
        
        </div>

    </div>
</div>		


<div class="modal fade " id="mdl_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content">
            	<div class="modal-header">
            		<h2>Detail Blok <span id="detail_name"></span></h2>
            	</div>
                <div class="modal-body" id="detail_area">
                	<div class="row" id="data_blok">
                		
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>	

<script type="text/javascript">
	
	function detail(blok, jenis){
		if (blok == "M") {
			var newBlok = "VVIP / MIMHOR";
		}
		else{
			var newBlok = blok;
		}

		$("#mdl_detail").modal("toggle");
		$("#detail_name").html(newBlok);
		loading("detail_area");
		$.post("<?php echo site_url("mapping_blok/detail"); ?>",{blok:blok, jenis:jenis},function(data){
	 	     unblock('detail_area');
	 	     $("#data_blok").html(data);
		});
	}

</script>
	


	
		