

<?php
	$id = $_POST["id"];

	$this->db->where("id", $id);
	$dt = $this->db->get("tm_alasan_penolakan")->row_array();
?>

<div class="col-md-12">
	<label>Deskripsi Alasan</label>
	<input class="form-control" rows="10" name="f[alasan]" value="<?php echo $dt["alasan"] ?>"/></input>
	<input type="hidden" name="id" value="<?php echo $id ?>"/>
</div>