<?php
$id	=	$this->input->post("id");
?>




<div class="col-md-12"  id="interval">
 
					 
	<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
		<div class="px-2 pb-2 pb-md-0 text-center">
			<div id="circles-1"></div>
			<h6 class="fw-bold mt-3 mb-0">Permohonan</h6>
			<h6 class="fw-bold "><?php echo $pemohon=$this->mdl->getJmlPemohon($id); ?></h6>
		</div>
	 
		<div class="px-2 pb-2 pb-md-0 text-center">
			<div id="circles-3"></div>
			<h6 class="fw-bold mt-3 mb-0">Distribusi</h6>
			<h6 class="fw-bold "><?php echo $dis=$this->mdl->getJmlDistribusiPemohon($id); ?></h6>
		</div>
	</div>
	<hr>
</div>
<?php
if(!$this->input->post("inter")){?>
<div class="col-md-4" id="jumlah_sedia">
	<div class="card-category" style='color:black'>Jumlah Tersedia</div>
	<input type="text" class="form-control" name="target" id="target" value="<?php echo $sedia=$this->mdl->getJumlahPersediaan($id); ?>" onchange="updateTarget(this.value)" />
</div>
<?php }else{
$sedia = $this->mdl->getJumlahPersediaan($id);
}	?>
<script type="text/javascript">

setTimeout(function(){ interval(<?php echo $id; ?>); }, 10000);
 
function interval(id){
		  
		$.post("<?php echo site_url("mapping_blok/detail_souvenir"); ?>",{id:id,inter:1},function(data){ 
	 	     $("#interval").html(data);
	 	     $("#jumlah_sedia").html("");
		});
	}
	function updateTarget(v){
		var id = "<?php echo $id; ?>";
		$.post("<?php echo site_url("mapping_blok/updateTargetSouvenir"); ?>",{id:id, target:v},function(data){
	 	    notif("Target Peserta berhasil di edit, tunggu sebentar :)");
	 	    setTimeout(function(){
	 	    	location.reload();
	 	    }, 2000)
		});

	}


	Circles.create({
		id:'circles-1',
		radius:45,
		value:<?php echo $per_pemohon=number_format($this->mdl->persenPermohonan($sedia,$pemohon),0,"",".");?>,
		maxValue:100,
		width:7,
		text: <?php echo $per_pemohon;?>+"%",
		colors:['#f1f1f1', '#FF9E27'],
		duration:600,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})

	 

	Circles.create({
		id:'circles-3',
		radius:45,
		value:<?php echo $per_dis=number_format($this->mdl->persenPermohonan($pemohon,$dis),0,"",".");?>,
		maxValue:100,
		width:7,
		text: <?php echo $per_dis;?>+"%",
		colors:['#f1f1f1', '#F25961'],
		duration:900,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})
	
	
</script>