
<?php
	$id = $_POST["id"];

	$this->db->where("id", $id);
	$d = $this->db->get("data_rangkaian_acara")->row_array();

?>
<input type="hidden" value="<?php echo $d['jenis_permohonan'] ?>" name="jper">
<input type="hidden" value="<?php echo $d['kode'] ?>" name="kode">
<input type="hidden" value="<?php echo $d['id'] ?>" name="id">
<div class="row">
	<div class="col-md-6 col-sm-12">
		<label>Nama Pemohon</label>
		<input type="text" name="f[nama]" class="form-control" required="" value="<?php echo $d['nama'] ?>">
	</div>
	<div class="col-md-6 col-sm-12">
		<label>Instansi</label>
		<input type="text" name="f[instansi]" class="form-control" required="" value="<?php echo $d['instansi'] ?>">
	</div>
	<div class="col-md-6 col-sm-12">
		<label>No. HP</label>
		<input type="text" name="f[hp]" class="form-control" required="" value="<?php echo $d['hp'] ?>">
	</div>
	<div class="col-md-6 col-sm-12">
		<label>Email</label>
		<input type="email" name="f[email]" class="form-control" required="" value="<?php echo $d['email'] ?>">
	</div>
</div>

<div class="row pt-4">
	<div class="col-md-6 col-sm-12">
		<label>Jumlah Undangan (permohonan awal)</label>
		<input type="text" name="f[jml]" class="form-control" required="" value="<?php echo $d['jml'] ?>">
	</div>
	 <div class="col-md-6 col-sm-12">
		<label>Keterangan</label>
		<input type="text" name="f[ket]" class="form-control"   value="<?php echo $d['ket'] ?>">
	</div>
</div>

<script type="text/javascript">
	//$('#fjk').select2({ theme: "bootstrap" });
</script>