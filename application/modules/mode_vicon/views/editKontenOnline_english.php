<?php
$id		=	$this->input->get_post("val");
$jml	=	count($this->m_reff->clearkomaray($id));
?>
<form action="javascript:submitForm('form_konten')" id='form_konten' url="<?php echo base_url()?>zoom/save_konten" method="post">
<input type="hidden" name="id" value="59">

<div class='col-md-12'> 
 <button class='btn btn-sm pull-right' onclick="submitForm('form_konten')" style='margin-top:-10px;margin-left:-220px'>Simpan</button> 
<br>

<div class='col-md-12'> 
<b class='text-primary'>Konten Whatsapp:</b> 
<textarea class='form-control' name="kontent_wa" id="kontent_wa" style='min-height:150px' onchange="save_konten(`60`,this.value)"><?php echo $this->m_reff->tm_pengaturan(60)?></textarea>
</div>
<div class="row col-md-12"> <hr></div>
 
<div class="row">
<div class='col-md-3' style='text-align:right'><span style="margin-top:230px"><br> <b class='text-primary'>Subject email :</b></span> </div>
<div class='col-md-9'> <input  type="text" class='form-control' name='subject' onchange="save_konten(`58`,this.value)" value="<?php echo $this->m_reff->tm_pengaturan(58)?>"> </div>
</div>

<br>
<textarea class='form-control' name="val" id="kontent" style='min-height:200px' ><?php echo $this->m_reff->tm_pengaturan(59)?></textarea>
<br>

</div>
</form>

<div class="alert alert-info">
Kode yang dapat digunakan: <br>
{nama}	=	nama peserta<br>
{email}	=	email<br>
{hp}	=	hp<br>
{kota}	=	kota<br>
{id}	=	ID MEETING<br>
{link}	=	full text link <br>
(link) klik disini (unlink)	=	Link Join<br>
</div>

								<script>
								var editor =  CKEDITOR.replace('kontent'); 
								  CKEDITOR.config.height = 220; 
								  
								</script>

 
 
 



<script>
function reload_table()
{		loading("load_viewKonten");
		$("#viewKonten_english").html("mohon tunggu..."); 
		$.post("<?php echo base_url()?>zoom/viewKontenOnline_english",function(data){ 
			$("#viewKonten_english").html(data); 
			unblock("load_viewKonten");
		});
}
 function save_konten(id,val)
 {
	  $.post("<?php echo site_url("zoom/save_konten"); ?>",{val:val,id:id},function(data){  
	  }); 
 } 
</script>
