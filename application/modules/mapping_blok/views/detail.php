

<?php
	$this->load->model("model", "mdl");
	$dt = $this->mdl->getProgressPermohonan($d["nama"], $d["jenis"]);

?>


<div class="col-md-12">
	<div class="card-category"  style='color:black'>Progress Permohonan</div>
					 
	<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
		<div class="px-2 pb-2 pb-md-0 text-center">
			<div id="circles-1"></div>
			<h6 class="fw-bold mt-3 mb-0">Permohonan</h6>
			<h6 class="fw-bold "><?php echo $dt["permohonan"] ?></h6>
		</div>
		<div class="px-2 pb-2 pb-md-0 text-center">
			<div id="circles-2"></div>
			<h6 class="fw-bold mt-3 mb-0">Disposisi</h6>
			<h6 class="fw-bold "><?php echo $dt["disposisi"] ?></h6>
		</div>
		<div class="px-2 pb-2 pb-md-0 text-center">
			<div id="circles-3"></div>
			<h6 class="fw-bold mt-3 mb-0">Distribusi</h6>
			<h6 class="fw-bold "><?php echo $dt["distribusi"] ?></h6>
		</div>
	</div>
	<hr>
</div>

<div class="col-md-4">
	<div class="card-category" style='color:black'>Target Peserta</div>
	<input type="text" class="form-control" name="target" id="target" value="<?php echo $dt["target"] ?>" onchange="updateTarget(this.value)" />
</div>

<script type="text/javascript">

	function updateTarget(v){
		var id = "<?php echo $d['id']; ?>";
		$.post("<?php echo site_url("mapping_blok/updateTarget"); ?>",{id:id, target:v},function(data){
	 	    notif("Target Peserta berhasil di edit, tunggu sebentar :)");
	 	    setTimeout(function(){
	 	    	location.reload();
	 	    }, 2000)
		});

	}


	Circles.create({
		id:'circles-1',
		radius:45,
		value:<?php echo $per_dispo=number_format($dt["permohonan_percent"],0,"",".");?>,
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
		value:<?php echo $per_dispo=number_format($dt["disposisi_percent"],0,"",".");?>,
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
		value:<?php echo $per_distribusi=number_format($dt["distribusi_percent"],0,"",".");?>,
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
</script>