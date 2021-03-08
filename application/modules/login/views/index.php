<?php $con=new konfig(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url()?>assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url()?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/atlantis.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
			<h1 class="title fw-bold text-white mb-3">PANDANG ISTANA</h1>
			<p class="subtitle text-white op-7">Penyiapan Undangan HUT RI Istana</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
		<form role="form" id="form" action="javascript:login()">
			<div class="container container-login container-transparent animated fadeIn">
				<h3 class="text-center">Sign In </h3>
				<div class="login-form">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Username</b></label>
						<input id="username" name="username" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Password</b></label>
 
						<div class="position-relative">
							<input id="password" name="password" type="password" class="form-control" required>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div>
				 <span id='msg'></span>
					 	 
						<button   class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</button>
					 
					 
					 
				</div>
			</div>
		</form>
			 
		</div>
	</div>
	<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/atlantis.min.js"></script>
	
	                    <!----------------------------------------->
<script>
function login()
{
$('#msg').html("<img src='<?php echo base_url();?>plug/img/load.gif'> Please wait...");
	$.ajax({
	url:"<?php echo base_url();?>login/cekLogin",
	type: "POST",
    data: $('#form').serialize(),
	dataType: "JSON",
	 success: function(data)
            {
			 var result=data.split("_");
               //if success close modal and reload ajax table
			   if(result[0]=="0"){
               $('#msg').html("<i class='fa fa-warning'></i> Username/Password Salah!"); 
			   }else if(result[0]=="1"){
				$('#msg').html("<img src='<?php echo base_url();?>plug/img/load.gif'> Success! Mohon Tunggu..."); 
				 <?php
				 $link=$con->direct();
				 foreach($link as $link)
				 {?>
				 if(result[1]=="<?php echo $link->nama; ?>"){
				 window.location.href="<?php echo base_url().$link->direct;?>"; 
				 }
				 <?php } ?>
			   }else
			   {
	 		     $('#msg').html("<i class='fa fa-warning'></i> Nomor Captcha tidak sesuai!"); 
			     
			   }
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Try Again!');
            }
	});
}
</script>



      
</body>
</html>