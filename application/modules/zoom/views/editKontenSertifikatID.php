<div id="area_form_konten_sertifikat">
<?php
$id		=	$this->input->get_post("val");
$jml	=	count($this->m_reff->clearkomaray($id));
?>
<form action="javascript:submitForm('form_konten_sertifikat')" id='form_konten_sertifikat' url="<?php echo base_url()?>zoom/save_konten_sertifikat" method="post">
<input type="hidden" name="id" value="48">
<div class="row col-md-12">
<div class="col-md-4">

	<?php
	 $link=$this->m_reff->tm_pengaturan(65);
	 $link=realpath($this->m_reff->tm_pengaturan(37)."/sertifikat/".$link);
	?>
	 <br>
	<img id="blah" class="card-img-top rounded"  src="<?php echo $this->konversi->img($link);?>" width="200px">
	<input type="file" name="file" id="imgInp">
 </div>
 
 <script>
  function readURL_1(input) {
        	if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
		
        $("#imgInp").change(function() {
			 
          readURL_1(this);
        });
 </script>
 
 
<div class='col-md-8'> 
 <button class='btn btn-sm pull-right' onclick="submitForm('form_konten_sertifikat')" style='margin-top:-10px;margin-left:-220px'>Simpan</button> 
<br>

<div class='col-md-12'> 
<b class='text-primary'>Konten Whatsapp:</b> 
<textarea class='form-control' name="kontent_wa" id="kontent_wa" style='min-height:150px' onchange="save_konten(`64`,this.value)"><?php echo $this->m_reff->tm_pengaturan(64)?></textarea>
</div>
<div class="row col-md-12"> <hr></div>
 
<div class="row">
<div class='col-md-3' style='text-align:right'><span style="margin-top:230px"><br> <b class='text-primary'>Subject  :</b></span> </div>
<div class='col-md-9'> <input  type="text" class='form-control' name='subject' onchange="save_konten(`66`,this.value)" value="<?php echo $this->m_reff->tm_pengaturan(66)?>"> </div>
</div>

<br>
<textarea class='form-control' name="email" id="kontent_ID" style='min-height:200px' ><?php echo $this->m_reff->tm_pengaturan(63)?></textarea>
<br>

</div>
</div>
</form>

<div class="alert alert-info">
Kode yang dapat digunakan: <br>
{nama}	=	nama peserta<br>
{email}	=	email<br>
{hp}	=	hp<br>
{kota}	=	kota<br>
{id}	=	ID MEETING<br>
</div>


</div>

								<script>
								var editor =  CKEDITOR.replace('kontent_ID'); 
								  CKEDITOR.config.height = 220; 
							 
								</script>

 
 
 



<script>
function reload_table()
{		loading("load_viewKonten_sertifikat");
		$("#viewKontenSertifikat").html("mohon tunggu..."); 
		$.post("<?php echo base_url()?>zoom/viewKontenSertifikat",function(data){ 
			$("#viewKontenSertifikat").html(data); 
			unblock("load_viewKonten_sertifikat");
		});
}
 function save_konten(id,val)
 {
	  $.post("<?php echo site_url("zoom/save_konten"); ?>",{val:val,id:id},function(data){  
	  }); 
 }
  $("#reportSertifikat").hide(); 


</script>
