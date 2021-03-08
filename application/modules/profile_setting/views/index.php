<?php 
     $data			=	$this->m_reff->dtPegawai();
     $fileimage		=	$this->m_reff->tm_pengaturan(38).$data->foto;
	 $file  =	@get_headers($fileimage);
	if($file && strpos( $file[0], '200')) {
	 	  $foto = $fileimage;
	}
	else{
		$foto = base_url()."plug/img/garuda.png";
	} 
?> 

   
    <div class="row col-md-12">
        <div class="col-md-12" id="area_formSubmit">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form id="formSubmit" action="javascript:submitForm('formSubmit')" method="post" url="<?php echo site_url('profile_setting/update');?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <center class="hide">
                                    <label>
                                        <div style="max-width:300px">
                                           
                                           
                                            <img class="img-responsive" style="width:200px;height:200px;border-radius:20px;border:#F5F5DC solid 2px;padding:5px;margin-top:20px;margin-bottom:20px;" id="blah" src="<?php echo $foto;?>" alt="" height="100px" />
                                            
                                            <br>
                                        </div>
                                    </label>
                                </center>
                                
                            </div>
                            <div class="col-md-6">
							<h2>DATA PROFILE</h2>
							<table class="entry">
							<tr>
							<td>Nama</td><td><?php echo $data->nmpeg;?></td>
							</tr>
							<tr>
							<td>NIP/ID</td><td><?php echo $data->niplama;?></td>
							</tr>
							</table>
							<br>
                              <div class="aler alert-info" style='padding:10px'> Jika terdapat ketidak sesuaian data profile mohon hubungi admin pandang istana.</div>
                                
                              
                            </div> 
                        </div>
                        <div class="row justify-content-between btn-page">
                            <div class="col-sm-6">
                                <span class="pull-right" id="msg"></span>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    $('.image img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
		function reload_table()
		{
			window.location.href="";
		}
		 setTimeout(function(){ $("[name='password']").val("");  }, 500);
    </script>