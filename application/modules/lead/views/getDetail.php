

<?php
	$id	=	$this->input->get_post("id");
	 
			$this->db->where("jenis_permohonan",$id);
			$this->db->where("sts_dispo",2);
			$this->db->where("diterima_oleh IS NOT NULL");
	$dis		= 	$this->db->get("data_peserta_rangkaian")->num_rows();
	$target		=	$this->m_reff->goField("tr_kategory","quota","where id='".$id."' ");
	$nama		=	$this->m_reff->goField("tr_kategory","nama","where id='".$id."' ");

?>


<div class="col-md-12">
	<div class="card-category" style='color:black'>Progress Permohonan <?php echo $nama;?></div>
					 
	<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
		<div class="px-2 pb-2 pb-md-0 text-center">
			<div id="circles-4"></div>
			<h6 class="fw-bold mt-3 mb-0">Permohonan</h6>
			<h6 class="fw-bold "><?php echo $per=$this->event->getJmlPemohonAll($id); ?></h6>
		</div>
		<div class="px-2 pb-2 pb-md-0 text-center">
			<div id="circles-5"></div>
			<h6 class="fw-bold mt-3 mb-0">Verifikasi</h6>
			<h6 class="fw-bold "><?php echo $ver=$this->event->getJmlPemohon($id); ?></h6>
		</div>
		<div class="px-2 pb-2 pb-md-0 text-center">
			<div id="circles-6"></div>
			<h6 class="fw-bold mt-3 mb-0">Distribusi</h6>
			<h6 class="fw-bold "><?php echo $dis; ?></h6>
		</div>
	</div>
 
</div>

 
<?php
if($per==0)
{
	$ver		=	0;
	$persendis	=	0;
}else{
	$ver		=	($ver/$per)*100;
	$persendis	=	($dis/$ver)*100;
}


?>
<?php
if($ver==0)
{
	 $persendis=0;
} 
?>
<script type="text/javascript">

	function updateTarget(v){
		loading("dt-detail");
		var id = "<?php echo $id; ?>";
		$.post("<?php echo site_url("myevent/updateTarget"); ?>",{id:id, target:v},function(data){
	 	   unblock("dt-detail");
	 	     
		});

	}
</script>
<script type="text/javascript">

	Circles.create({
		id:'circles-4',
		radius:45,
		value:<?php echo $per_dispo=number_format($this->event->getJmlPemohonPersen($id),0,"",".");?>,
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
		id:'circles-5',
		radius:45,
		value:<?php echo $per_dispo=number_format($ver,0,"",".");?>,
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
		id:'circles-6',
		radius:45,
		value:<?php echo $per_distribusi=number_format($persendis,0,"",".");?>,
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