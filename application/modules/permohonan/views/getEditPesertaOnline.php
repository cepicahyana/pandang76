
<?php
	$id = $this->input->post("id");

	$this->db->where("id", $id);
	$d = $this->db->get("data_peserta")->row_array();

	if ($d["jk"] == "l") {
		$sell = "selected";
		$selp = "";
	}
	elseif($d["jk"] == "p"){
		$sell = "";
		$selp = "selected";
	}
	else{
		$sell = "";
		$selp = "";
	}
?>
<input type="hidden" value="<?php echo $d['id'] ?>" name="id">
<div class="row">
	<div class="col-md-4 col-sm-12">
		<label>Nama Pemohon</label>
		<input type="text" name="f[nama]" class="form-control" required="" value="<?php echo $d['nama'] ?>">
	</div>
	<div class="col-md-4 col-sm-12">
		<label>NIK</label>
		<input type="text" name="f[nik]" disabled class="form-control" required="" value="<?php echo $d['nik'] ?>">
	</div>
	<div class="col-md-4 col-sm-12">
		<label>KK</label>
		<input type="text" disabled name="f[kk]" class="form-control" required="" value="<?php echo $d['kk'] ?>">
	</div>
</div>

<div class="row pt-4">
	<div class="col-md-4 col-sm-12">
		<label>Jenis Kelamin</label>
		<select class="" name="f[jk]" id="fjk" required="">
			<option value="">-- PILIH JENIS KELAMIN --</option>
			<option value="l" <?php echo $sell ?>>Laki - laki</option>
			<option value="p" <?php echo $selp ?>>Perempuan</option>
		</select>
	</div>
	<div class="col-md-4 col-sm-12">
		<label>No. HP</label>
		<input disabled type="text" name="f[hp]" class="form-control" required="" value="<?php echo $d['hp'] ?>">
	</div>
	<div class="col-md-4 col-sm-12">
		<label>Email</label>
		<input disabled type="email" name="f[email]" class="form-control" required="" value="<?php echo $d['email'] ?>">
	</div>
</div>

<script type="text/javascript">
	$('#fjk').select2({ theme: "bootstrap" });
</script>