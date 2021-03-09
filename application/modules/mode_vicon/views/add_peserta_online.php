<form method="POST" url="<?php echo base_url() ?>zoom/insert_peserta_zoom_online" id="modal" action="javascript:submitForm('modal')">
 <b>Tambah</b><hr>
<div class="row" id="area_modal">
	<div class="col-md-4 col-sm-12">
		<label>Nama </label>
		<input type="text" name="f[nama]" class="form-control" required="" >
	</div>
	<div class="col-md-4 col-sm-12">
		<label>Email</label>
		<input type="email" name="f[email]"   class="form-control" required="" >
	</div>
	<div class="col-md-4 col-sm-12">
		<label>Hp</label>
		<input type="text"   name="f[hp]" class="form-control"    >
	</div>
	 <div class="col-md-6 col-sm-12">
		<label>Pekerjaan</label>
		<input type="text"   name="f[pekerjaan_lainnya]" class="form-control"    >
		<input type="hidden"   name="f[id_pekerjaan]" value="5" class="form-control"    >
	</div><div class="col-md-6 col-sm-12">
		<label>Alamat lengkap</label>
		<input type="text"   name="f[alamat]" class="form-control"  >
	</div>
	 
</div>
  <div class="modal-footer">
	    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary" onclick="submitForm('modal')">Simpan Perubahan</button>
	    </div>
      </form>