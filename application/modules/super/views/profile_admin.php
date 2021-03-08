<?php $con=new konfig(); $dp=$con->dataProfile($this->session->userdata("id")); ?> 
<script src="<?php echo base_url()?>plug/js/jquery-2.2.1.min.js"></script>
<script src="<?php echo base_url();?>plug/jqueryform/jquery.form.js"></script>

<div class="row" id="user-profile">
<div class="col-lg-3 col-md-4 col-sm-4" >
<div class="main-box clearfix">
<header class="main-box-header clearfix"><center>
<h2><b>Photo Admin</b></h2></center>
</header>
<div class="main-box-body clearfix">
<div class="profile-status">
</div>
<img src="<?php echo base_url();?>file_upload/dp/<?php $dp=$this->profile->dataProfile(3); echo $dp->poto;?>" alt="" class="profile-img img-responsive center-block"/>
<div class="profile-label">
<span>Ganti Photo Profile</span>
<form action="<?php echo base_url();?>super/upload_img" method='post' enctype="multipart/form-data" name="uploadfilexl" id="uploadfilexl" >
<input required type='file' name='gambar'  onchange="change()" style='font-size:13px' placeholder='Ganti Photo' class='col-lg-12 col-md-12 col-sm-12' >
<br/>
<button class="btn btn-block btn-success"><i class="fa fa-cloud-upload"></i> upload</button>
</form>

</div>

</div>
</div>
</div>



<div class="col-lg-8 col-md-7 col-sm-7 main-box" >
<header class="main-box-header clearfix">
<h2><b><span>Ubah Data Profile Admin</span></b></h2>
</header>
<div class="main-box-body clearfix">
<form class="form-horizontal" id="form" action="javascript:update()">

<div class="form-group">
	<label for="inputNama" class="black col-lg-2 control-label">Nama Lengkap</label>
	 <div class="col-lg-10">
		<input required type="text" class="form-control"  value='<?php echo $dataProfil->owner;?>' name="owner" id="inputNama" placeholder="Nama Lengkap">
	 </div>
</div>

<div class="form-group">
	<label for="inputTelp" class="black col-lg-2 control-label">No.Telp</label>
	 <div class="col-lg-10">
		<input  type="text" class="form-control"  value='<?php echo $dataProfil->telp;?>' name="telp" id="inputTelp" placeholder="Nomor Telpon">
	 </div>
</div>

<div class="form-group">
	<label for="inputEmail1" class="black col-lg-2 control-label">E-mail</label>
	 <div class="col-lg-10">
		<input  type="email" class="form-control"  value='<?php echo $dataProfil->email;?>' name="email" id="inputEmail1" placeholder="Email">
	 </div>
</div>

<div class="form-group">
	<label for="inputuser" class="black col-lg-2 control-label">Username</label>
	 <div class="col-lg-10">
		<input required type="text" class="form-control" value='<?php echo $dataProfil->username;?>' name="username" id="inputuser" placeholder="Username">
	 </div>
</div>

<div class="form-group">
	<label for="inputPassword1" class="black col-lg-2 control-label">Password baru</label>
	 <div class="col-lg-10">
		<input type="text" class="form-control"  name="password" id="inputPassword1" placeholder="Password baru (jika password akan diubah)">
	 </div>
</div>
<button class="btn btn-success pull-right"><i class='fa fa-save'></i> simpan</button>
<span id="msg" class="pull-right" style='padding-right:50px;margin-top:5px'></span>
</div>
</div>

</form>
</div>

<script>
function update()
{
$('#msg').html("<img src='<?php echo base_url();?>plug/img/load.gif'> Please wait...");
	$.ajax({
	url:"<?php echo base_url();?>super/update_admin",
	type: "POST",
    data: $('#form').serialize(),
	dataType: "JSON",
	 success: function(data)
            {
			$("#inputPassword1").val("");
			if(data==true){
			 $('#msg').html('<font color="green"><i class="fa fa-check-circle fa-fw fa-lg"></i> Berhasil disimpan.</font>');
			}else{
			$("#inputuser").val("");
			 $('#msg').html('<font color="red"><i class="fa fa-warning fa-fw fa-lg"></i>Silahkan cari username/password lain!</font>');
			}
		   },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Try Again!');
            }
	});
}
</script>
