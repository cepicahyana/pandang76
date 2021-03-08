<?php $con=new konfig(); ?> 
<script src="<?php echo base_url()?>plug/js/jquery-2.2.1.min.js"></script>
<script src="<?php echo base_url();?>plug/jqueryform/jquery.form.js"></script>


<div class="col-lg-12 col-md-12 col-sm-12 main-box" >
<header class="main-box-header clearfix">
<h2><b><span>Konfigurasi</span></b></h2>
</header>
<div class="main-box-body clearfix">
<form class="form-horizontal" id="form" action="<?php echo base_url();?>super/updateKonfig" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="input1" class="col-lg-2 control-label black">Loggo</label>
	 <div class="col-lg-9">
		<input  type="file" class="form-control"  name="input1" id="input1">
	 </div>
</div>

<div class="form-group">
	<label for="input2" class="col-lg-2 control-label black">Nama Aplikasi</label>
	 <div class="col-lg-9">
		<input required type="text" class="form-control"  value='<?php echo $con->dataKonfig(2);?>' name="input2" id="input2">
	 </div>
</div>

<div class="form-group">
	<label for="maskedDate" class="col-lg-2 control-label black">Tanggal Project</label>
	 <div class="col-lg-9">
		<input  type="text" class="form-control"  value='<?php echo $con->dataKonfig(3);?>' name="input3" id="maskedDate">
	 </div>
</div>

<div class="form-group">
	<label for="input4" class="col-lg-2 control-label black">Klien</label>
	 <div class="col-lg-9">
		<input required type="text" class="form-control" value='<?php echo $con->dataKonfig(4);?>' name="input4" id="input4">
	 </div>
</div>

<div class="form-group">
	<label for="input5" class="col-lg-2 control-label black">Developer</label>
	 <div class="col-lg-9">
		<input  type="text" class="form-control" value='<?php echo $con->dataKonfig(5);?>' name="input5" id="input5">
	 </div>
</div>

<div class="form-group">
	<label for="input6" class="col-lg-2 control-label black">Jenis Login</label>
	 <div class="col-lg-9">
		<input  type="number" class="form-control" value='<?php echo $con->dataKonfig(6);?>' name="input6" id="input6">
	 </div>
</div>

<div class="form-group">
	<label for="input7" class="col-lg-2 control-label black">Jumlah Record Log</label>
	 <div class="col-lg-9">
		<input  type="number" class="form-control" value='<?php echo $con->dataKonfig(7);?>' name="input7" id="input7">
	 </div>
</div>
<div class="form-group">
	<label for="input8" class="col-lg-2 control-label black">Footer</label>
	 <div class="col-lg-9">
		<input  type="text" class="form-control" value='<?php echo $con->dataKonfig(8);?>' name="input8" id="input8">
	 </div>
</div>

<div class="form-group">
	
	 <div class="col-lg-11">
		<button class="btn btn-success pull-right"><i class='fa fa-save'></i> simpan</button>
	 </div>
</div>




<span id="msg" class="pull-right" style='padding-right:10px;margin-top:5px'></span>
</div>
</div>

</form>
</div>
