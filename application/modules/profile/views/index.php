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

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Profile</div>
        </div>

        <form method="POST" enctype="multipart/form-data" url="<?php echo base_url() ?>profile/updateProfile" action="javascript:submitFormNoResset('formSubmit')" id="formSubmit">

            <div class="row card-body" style='padding-top:10px;padding-bottom:20px' id="area_formSubmit">
                <input type="hidden" value="<?php echo $this->session->userdata("id") ?>" name="id_admin">
                <div class="col-md-12 text-center">
                    <div class="form-group">
                        <div style="width: 150px;border-radius: 50%;overflow: hidden;margin:auto">
                            <img src="<?php echo  $foto; ?>" class="img-fluid" id="photo" style="width: 150px"  />
                        </div>
                        <br>
                      <!--  <div style="margin: auto;width: 200px;">
                            <input type="file" class="form-control" name="photo" id="imgInp"/>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"  disabled class="form-control" value="<?php echo $data->nmpeg ?>" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"   disabled class="form-control" value="<?php echo $data->email ?>" required />
                    </div>
                </div>  
                
				<div class="col-md-6">
                    <div class="form-group">
                        <label>NIP/ID</label>
                        <input type="text" name="f[nip]" class="form-control" value="<?php echo $this->m_reff->dataProfileAdmin()->nip ?>" />
                    </div>
                </div>
                <!--
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="10" name="f[alamat]"><?php echo $data->alamat ?></textarea>
                    </div>
                    <hr>
                </div>-->
             <!--   <div class="col-md-4">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="f[username]" class="form-control" value="<?php echo $data->username ?>" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Ubah Password</label>
                        <input type="password" name="password" class="form-control" value="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Ketik Ulang Password</label>
                        <input type="password" name="password2" class="form-control" value="" />
                    </div>
                </div>-->

                <div class="col-md-12">
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit" onclick="javascript:submitFormNoResset('formSubmit')"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                    </div>
                </div>   
            </div>

        </form>

    </div>
</div>


<script>
function reload_table()
{
	
}

    $("#imgInp").change(function() {
      readURLImg(this);
    });

    function readURLImg(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#photo').attr('src', e.target.result);
          $('.avatar-img').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>
 