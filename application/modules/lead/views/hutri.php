
						<div class="col-md-6 ">
							<div class="card ">
								<div class="card-body  ">
								  	<div class="card-category">Progress Permohonan Undangan Upacara</div>
					 
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Permohonan</h6>
											<h6 class="fw-bold "><?php echo $this->umum->jmlPemohon()?></h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Disposisi</h6>
											<h6 class="fw-bold "><?php echo $this->umum->jmlDispo()?></h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Distribusi</h6>
											<h6 class="fw-bold "><?php echo $this->umum->jmlDistribusi()?></h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="card card-dark bg-primary-gradient">
								<div class="card-body bubble-shadow">
									<div class="card-title">Total Permohonan Undangan Upacara</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase text-yellow op-8">  Penaikan </h6>
												<h3 class="fw-bold"><?php echo $this->umum->jmlPemohon(1);?></h3>
											</div>
											<div>
												<h6 class="fw-bold text-uppercase text-yellow op-8">  Penurunan</h6>
												<h3 class="fw-bold"><?php echo $this->umum->jmlPemohon(2);?></h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			
	<?php
$this->db->order_by("jml","desc");
//$this->db->where("jml>=",1);
$data_provinsi	=	$this->db->get("v_prov")->result();
?>
	
	
 <div class="  row col-md-12">
 <div class="card-body ">
		<table class='entry' width="100%">
		      <tr>
                    <th width="100px">NO</th>
                    <th> PROVINSI</th>
                    <th width="20%"> JML PEMOHON</th>
                </tr>
		<?php
		$no=1;
		foreach($data_provinsi as $val)
		{
		?>
		<tr>
		    <td>No. <?php echo $no++;?></td>
		    <td><a href="javascript:(0);" data-toggle="modal" data-target="#mdl_kota" onclick="getKota(`<?php echo $val->id_prov?>`, `<?php echo $val->nama?>`)">Provinsi <?php echo $val->nama;?></a> </td>
		    <td> <?php echo $val->jml;?> </td>
		</tr>
		<?php } ?>
		</table>
		<br>
	</div>
	</div>
	


 
<script>
    function getKota(id, nama){
        $("#detProv").html(nama);
        $("#dt-kota").html("");
        loading('areaKota');
        $.post("<?php echo site_url("dashboard/getKota"); ?>",{id:id}, function(data){
			$("#dt-kota").html(data);
			unblock('areaKota');
		});
    }
</script>
	<div class="modal fade" id="mdl_kota" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="areaKota">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>List Kota / Kab di Provinsi <span id='detProv'></span></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="dt-kota">
        
      </div>
    </div>
  </div>
</div>
	



			
					  <script>
					    $(document).ready(function() {
		Circles.create({
			id:'circles-1',
			radius:45,
			value:<?php echo $per_dispo=number_format($this->umum->per_pemohon(),0,"",".");?>,
			maxValue:100,
			width:7,
			text: <?php echo $per_dispo;?>+"%",
			colors:['#f1f1f1', '#FF9E27'],
			duration:600,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:<?php echo $per_dispo=number_format($this->umum->per_dispo(),0,"",".");?>,
			maxValue:100,
			width:7,
			text: <?php echo $per_dispo;?>+"%",
			colors:['#f1f1f1', '#2BB930'],
			duration:700,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:<?php echo $per_distribusi=number_format($this->umum->per_distribusi(),0,"",".");?>,
			maxValue:100,
			width:7,
			text: <?php echo $per_distribusi;?>+"%",
			colors:['#f1f1f1', '#F25961'],
			duration:900,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'pie',
			data: {
				
				labels: [   "PENURUNAN" , "PENAIAKAN",],
				datasets : [{
					label: "Jumlah", 
					borderColor: 'white',
					data: [<?php echo $this->umum->jmlPemohon(2);?>,   <?php echo $this->umum->jmlPemohon(1);?> ],
					backgroundColor: [
					 "#d4de7a", "#e079a9"
					],
				}],
			},
			options: {
				responsive: false,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
			 
			}
		});

						});
	</script>
	
	<script>
	function detail(id)
	{
		$("#mdl_detail").modal("show");
		$("#dt-detail").html("mohon tunggu...");
		$.post("<?php echo base_url()?>myevent/getDetail",{id:id},function(data){
			$("#dt-detail").html(data); 
		});
	}
	</script>
	
	
	