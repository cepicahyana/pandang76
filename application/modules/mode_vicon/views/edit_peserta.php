
<?php
	$id = $this->input->post("id");

	$this->db->where("id", $id);
	$d = $this->db->get("zoom_data")->row_array();
	$register_id	=	$d['registrant_id'];
	if($register_id){
		$sts="";//disabled";
	}else{
		$sts="";
		}
?>
<input type="hidden" value="<?php echo $d['id'] ?>" name="id">
<div class="row">
	<div class="col-md-4 col-sm-12">
		<label>Nama </label>
		<input type="text" name="f[nama]" class="form-control" required="" value="<?php echo $d['nama'] ?>">
	</div>
	<div class="col-md-4 col-sm-12">
		<label>Email</label>
		<input type="email" name="f[email]" <?php echo $sts;?>  class="form-control" required="" value="<?php echo $d['email'] ?>">
	</div>
	<div class="col-md-4 col-sm-12">
		<label>Hp</label>
		<input type="text"   name="f[hp]" class="form-control"   value="<?php echo $d['hp'] ?>">
	</div>
	<div class="col-md-4 col-sm-12">
		<label>Jabatan</label>
		<input type="text"   name="f[jabatan]" class="form-control" value="<?php echo $d['jabatan'] ?>">
	</div>
	<div class="col-md-4 col-sm-12">
		<label>Instansi</label>
		<input type="text"   name="f[instansi]" class="form-control"   value="<?php echo $d['instansi'] ?>">
	</div><div class="col-md-4 col-sm-12">
		<label>Kota</label>
		<input type="text"   name="f[kota]" class="form-control" required="" value="<?php echo $d['kota'] ?>">
	</div><div class="col-md-12 col-sm-12">
		<label>Alamat lengkap</label>
		<input type="text"   name="f[alamat]" class="form-control"   value="<?php echo $d['alamat'] ?>">
	</div>
	<input type="hidden" name="id_event" value="<?php echo $d['id_event']?>">
</div>
<br>
<span class='text-info'>Ket : Otomatis update ke vicon jika data sudah ditambahkan sebelumnya.</span>