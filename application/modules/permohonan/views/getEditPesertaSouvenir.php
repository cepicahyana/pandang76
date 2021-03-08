
<?php
	$id = $_POST["id"];

	$this->db->where("id", $id);
	$d = $this->db->get("data_persus")->row_array();

?>
<input type="hidden" value="<?php echo $d['kode'] ?>" name="kode">
<input type="hidden" value="<?php echo $d['id'] ?>" name="id">
<div class="row">
	<div class="col-md-6 col-sm-12">
		<label>Nama Pemohon</label>
		<input type="text" name="f[nama]" class="form-control" required="" value="<?php echo $d['nama'] ?>">
	</div>
	<div class="col-md-6 col-sm-12">
		<label>Instansi</label>
		<input type="text" name="f[instansi]" class="form-control"  value="<?php echo $d['instansi'] ?>">
	</div>
	<div class="col-md-6 col-sm-12">
		<label>No. HP</label>
		<input type="text" name="f[hp]" class="form-control" required="" value="<?php echo $d['hp'] ?>">
	</div>
	<div class="col-md-6 col-sm-12">
		<label>Email</label>
		<input type="email" name="f[email]" class="form-control" required="" value="<?php echo $d['email'] ?>">
	</div>
 
	 
	<?php
	if($d['jenis_permohonan']==2 or $d['jenis_permohonan']==3){?>
	<div class="col-md-4 col-sm-12">
		<label>Ket. Alamat (label)</label>
		<input type="text" name="f[ket]" class="form-control"   value="<?php echo $d['ket'] ?>">
	</div>
	<?php }else{ ?>
	<div class="col-md-4 col-sm-12">
		<label>Keterangan</label>
		<input type="text" name="f[ket]" class="form-control"   value="<?php echo $d['ket'] ?>">
	</div>
	<?php } ?>
</div>

<?php
 
$kode			=	$d['kode'];
$pagi			=	$d['jml_pagi'];
$sore 			=	$d['jml_sore'];
$vvip 			=	$d['souvenir_1'];
$vip 			=	$d['souvenir_2'];
$umum 			=	$d['souvenir_3'];
 
$souvenir="<td  style=''>
			<input type='text' onchange='setBlok(`".$kode."`,`souvenir_1`,this.value,`vvip`)' style='width:40px;text-align:center' class='form-controls' value='".$vvip."'> 
			VVIP
			</td>";	 
	 
	 $souvenir.="<td  style=''>
			<input type='text' onchange='setBlok(`".$kode."`,`souvenir_2`,this.value,`".$d['id']."`)' style='width:40px;text-align:center' class='form-controls' value='".$vip."'> 
			VIP
			</td>";	 
	 
	 $souvenir.="<td  style=''>
			<input type='text' onchange='setBlok(`".$kode."`,`souvenir_3`,this.value,`".$d['id']."`)' style='width:40px;text-align:center' class='form-controls' value='".$umum."'> 
			UMUM
			</td>";	 
	 
	 
	 	 $undangan="<td  style=''>
			<input type='text' onchange='setBlok(`".$kode."`,`jml_pagi`,this.value,`pagi`)' style='width:40px;text-align:center' class='form-controls' value='".$pagi."'> 
			   Undangan Pagi
			</td>";	 
	  $undangan.="<td  style=''>
			<input type='text' onchange='setBlok(`".$kode."`,`jml_sore`,this.value,`sore`)' style='width:40px;text-align:center' class='form-controls' value='".$sore."'> 
			Undangan Sore
			</td>";	 
	 
	 
	 
?>
<hr>
<div class="row">
<div class="col-md-4 col-sm-12">
		<label>VVIP</label>
		<input type="text" name="f[souvenir_1]" class="form-control"   value="<?php echo $vvip ?>">
	</div><div class="col-md-4 col-sm-12">
		<label>VIP</label>
		<input type="text" name="f[souvenir_2]" class="form-control"   value="<?php echo $vip ?>">
	</div><div class="col-md-4 col-sm-12">
		<label>UMUM</label>
		<input type="text" name="f[souvenir_3]" class="form-control"   value="<?php echo $umum ?>">
	</div>
</div>
<hr>
<div class="row"> 
<div class="col-md-4 col-sm-12">
		<label>Undangan Pagi</label>
		<input type="text" name="f[jml_pagi]" class="form-control"   value="<?php echo $pagi ?>">
	</div><div class="col-md-4 col-sm-12">
		<label>Undangan Sore</label>
		<input type="text" name="f[jml_sore]" class="form-control"   value="<?php echo $sore ?>">
	</div> 
</div>