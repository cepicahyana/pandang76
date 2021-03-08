 <?php
$id		=	$this->input->post("id");
$post_acara	=	$this->input->post("acara");
$post_kab	=	$this->input->post("kab");
$post_prov	=	$this->input->post("prov");
$post_suci	=	$this->input->post("suci");
if($id){
	$data	=	$this->db->get_where("data_peserta",array("id"=>$id,"sts_verifikasi"=>0,"id_kategory"=>1))->row();
}else{
		
				if($post_acara)
				{
						$this->db->where("jenis_acara",1);
				}
				if($post_kab)
				{
						$this->db->where("id_kota",$post_kab);
				}if($post_prov)
				{
						$this->db->where("id_provinsi",$post_prov);
				}if($post_suci==1)
				{
						$this->db->where("r_suci",1);
				}elseif($post_suci==2)
				{
						$this->db->where("r_suci",2);
				}
				
				$this->db->where("sts_verifikasi",0);
				$this->db->where("id_kategory=1");
//	$dt		=	$this->db->get("data_peserta")->result_array();
				///$this->db->order_by("id","asc");
				$this->db->limit(1);
	$dt		=	$this->db->get("data_peserta");
	if(!$dt->num_rows()){
		echo "<script>$('#mdl_modal').modal('hide');</script>";
	echo '
<b>Maff!</b>   <button type="button" class="close"  onclick="closeModal(0)" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
  </button> 
<h5 class="text-danger"><i>Data tidak tersedia..</i></h5>';
echo '<script>reload_table();</script>';
		return false;}
//	$k		=	array_rand($dt) ;  
//	$iddb	=	 isset($dt[$k]['id'])?($dt[$k]['id']):""; 
	$data	=	$dt->row();//$this->db->get_where("data_peserta",array("id"=>$iddb))->row();
}
 
if(!$data){echo '
<b>Maff!</b>   <button type="button" class="close"  onclick="closeModal(0)" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
  </button> 
<h5 class="text-danger"><i>Data tidak tersedia..</i></h5>';
echo '<script>reload_table();</script>';
 return false;}
 $this->mdl->setStsVerifikasi($data->id,1);	
?>

<div id="loadGet">


  <button type="button" class="close"  onclick="closeModal(`<?php echo $data->id;?>`,`0`)" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
  </button> 
 				
					
 <b style='font-size:20px'>Verifikasi</b>
 <!-- <span style='margin-left:300px;'><button class="btn   bg-teal" type="button"  ><b class="fas fa-chevron-circle-left"> </b> Sebelumnya </button>
 <button  class=' btn' type="button" onclick="selanjutnya(``)" >Selanjutnya <b class="fas fa-chevron-circle-right"> </b> </button>
</span>-->
<hr>

<div class='row'>
	<div class='col-md-6'>
	
	<?php 
	$link=$this->m_reff->tm_pengaturan(14);
	?>
	<a href='<?php echo $link."/upload/peserta/ktp/".$data->foto_ktp?>' target="_blank"><img alt='ktp' src="<?php echo $link."/upload/peserta/ktp/".$data->foto_ktp?>" width='100%'></a>
	<a href='<?php echo $link."/upload/peserta/kk/".$data->foto_kk?>'  target="_blank"><img  alt='kk' src="<?php echo $link."/upload/peserta/kk/".$data->foto_kk?>" width='100%'></a>
	</div>

	<div class='col-md-6'>
	
	<table class='entry' width="100%">
	<tr class='bg-grey '>
	<td colspan="2"><b class=' '> Data profile</b></td>
	</tr>
	<tr>
	<td>Nama</td> <td><?php echo $data->nama; ?></td>
	</tr>
	<tr>
	<td>NIK</td> <td>  <?php echo $data->nik; ?></td>
	</tr><tr>
	<td>Hp</td> <td>  <?php echo $data->hp; ?></td>
	</tr><tr>
	<td>E-mail</td> <td>  <?php echo $data->email; ?></td>
	</tr><tr>
	<td>Alamat</td> <td>  <?php echo $prov=$this->m_reff->goField("wil_provinsi","nama","where id_prov='".$data->id_provinsi."' "); ?> - 
	 <?php echo $kab=strtolower($this->m_reff->goField("wil_kabupaten","nama","where id_kab='". $data->id_kota."'")); ?>
	 </td>
	</tr> 
	<tr>
	 <td>Alasan Mengikuti</td> <td>  <?php echo $data->alasan_mengikuti; ?></td>
	</tr>
	</table>
	Jumlah pendaftar pada   wilayah yang sama
	<table class='entry' width="100%">
	<tr>
	<td>Seprovinsi <?php echo $prov;?></td><td><?php echo $this->mdl->getProvByNik($data->id_provinsi)?></td>
	</tr><tr>
	<td>Sekabupaten  <?php echo str_replace("KAB. ","",$kab);?></td> <td><?php echo $this->mdl->getKabByNik($data->id_kota)?></td>
	</tr>
	</table>
	<hr>
	
	<?php
	$permohonan	=	$data->jenis_acara;
	$r_suci		=	$data->r_suci;
	?>
	
	<div class="row">
	<div class='col-md-12'>
	<?php
	if($r_suci==1)
	{
		echo '<div class="col-md-12 alert alert-danger">
		<center>Silahkan lakukan validasi undangan renungan suci.</center>
												<label class="custom-control custom-checkbox">
													<input id="rsuci1" value="1" onclick="set_rsuci(`'.$data->id.'`,1)" name="r_suci" class="custom-control-input" type="radio"><span class="custom-control-label"></span>
												<b class="text-primary">Acc Renungan suci</b>
												</label> 
												
												 <label class="custom-control custom-checkbox">
													<input id="rsuci2" value="2" onclick="set_rsuci(`'.$data->id.'`,2)" name="r_suci" class="custom-control-input" type="radio"><span class="custom-control-label"></span>
												<b class="text-danger">Tolak Renungan suci</b>
												</label>
												 
											</div>';
	}
	
	?>
	</div>
	
	<div class='col-md-12'>&nbsp;</div>
	<div class='col-md-4'>
	<?php
	if($permohonan==1 or $permohonan==3)
	{?>
	<button class="btn btn-block bg-orange btn-block fas fa-check-double" type="button" onclick="setAcc('<?php echo $data->id;?>',1)" >
													ACC PAGI
	 </button>
	<?php }elseif($permohonan==null){
		
	}else{   echo "<button class='btn' onclick='setAcc(`".$data->id."`,1)' >ACC PAGI</button>";  } ?>
	</div>
	<div class='col-md-4'>
	<?php
	if($permohonan==3)
	{?>
	
	<button class="btn bg-success  btn-block fas fa-check-double" type="button" onclick="setAcc('<?php echo $data->id;?>',3)" >
													ACC SEMUA
	 </button>
	 <?php }elseif($permohonan==null){
		
	}else{
		   echo "<button class='btn' disabled >ACC SEMUA</button>"; 
	 }?>
	</div>
	<div class='col-md-4'>
	<?php
	if($permohonan==2  or $permohonan==3 )
	{?>
	<button class="btn bg-orange  btn-block fas fa-check-double" type="button" onclick="setAcc('<?php echo $data->id;?>',2)" >
													ACC SORE
	 </button>
	<?php }elseif($permohonan==null){
		
	}else{
			  echo "<button class='btn' onclick='setAcc(`".$data->id."`,2)'>ACC SORE</button>"; 
	}
			  ?>
	</div>
	</div>
	<?php
	if($permohonan)
	{
	 
	?>
	 
	 
	 
	 
	 <hr>
	 <center>Permohonan <b>undangan upacara </b> ditolak</center>
		 
												 
														 
														<?php 
														$this->db->order_by("id","asc");
														$dataAlasan=$this->db->get("tm_alasan_penolakan")->result();
														$db[null]="---- pilih alasan penolakan ----";
														foreach($dataAlasan as $dataAlasan)
														{
															$db[$dataAlasan->id]=$dataAlasan->alasan;
														}
														echo form_dropdown("alasan",$db,"","id='alasan' class='form-control'   ");
														?>
													<br>
													 
													
	<button class="btn btn-danger btn-block far fa-times-circle" type="button" onclick="setTolak('<?php echo $data->id;?>')" >
													TOLAK UNDANGAN UPACARA
												</button>
	
	 
	<?php } ?>
	</div> 
</div>

</div>
 <?php 	if(!$permohonan){	$only="suci";	}else{	$only="";	}	?>
  
 
<script> 
var suci="";
function ceksuci()
{
<?php 
if($r_suci!=1)
{
	echo 'return true;';
}
?> 
	var radios = document.getElementsByName('r_suci');  
	for (var i = 0, length = radios.length; i < length; i++) {
	  if (radios[i].checked) { 
	  return true;
	  }
	}
	return false;
}

</script> 
 
<script>

function set_rsuci(id,sts)
{  
			var only ="<?php echo $only;?>";
			suci=sts;
			 loading("loadGet"); 	 
			  $.post("<?php echo site_url("dispo/setAccSuci"); ?>",{id:id,sts:sts,only:only},function(data){ 
			  unblock("loadGet"); 
			 <?php 
			if(!$permohonan)
			{
				echo 'setTolakSuci(`'.$data->id.'`)';
			} 
			?>
			}); 
}
</script>
<script>

function setAcc(id,sts)
{ 			
		 
if(!ceksuci()){ notif("Silahkan lakukan validasi renungan suci terlebih dahulu."); return false;}

			 loading("loadGet"); 	 
			  $.post("<?php echo site_url("dispo/setAcc"); ?>",{id:id,sts:sts},function(data){ 
			  unblock("loadGet");
			  if(data==false){	notif("Maaf! terjadi kesalahan dalam proses disposisi");	return false;} 
			getNext();			  
			}); 
}
</script>

<script>
function setTolakSuci(id)
{  

	var alasan = 1;
	if(!alasan){ notif("Mohon pilih alasan penolakan!"); $("[name='alasan']").focus(); return false;}
			 loading("loadGet"); 	 
			  $.post("<?php echo site_url("dispo/setTolakSuci"); ?>",{id:id,alasan:alasan},function(data){ 
		 	  unblock("loadGet");
			getNext();			  
			}); 
}
</script>
<script>
function setTolak(id)
{  if(!ceksuci()){ notif("Silahkan lakukan validasi renungan suci terlebih dahulu."); return false;}
	var alasan = $("[name='alasan']").val(); 
	if(!alasan){ notif("Mohon pilih alasan penolakan!"); $("[name='alasan']").focus(); return false;}
			 loading("loadGet"); 	 
			  $.post("<?php echo site_url("dispo/setTolak"); ?>",{id:id,alasan:alasan,suci:suci},function(data){ 
		 	  unblock("loadGet");
			getNext();			  
			}); 
}
</script>

<script>
 
function getNext()
		 {	 
		 var post_acara="<?php echo $post_acara;?>";
		 var post_kab="<?php echo $post_kab;?>";
		 var post_prov="<?php echo $post_prov;?>";
		 var post_suci="<?php echo $post_suci;?>";
			$("#getVerifikasi").html("Mohon menunggu...."); 	 
			  $.post("<?php echo site_url("dispo/getNextVerifikasi"); ?>",{acara:post_acara,kab:post_kab,prov:post_prov,suci:post_suci},function(data){ 
		 	    $("#getVerifikasi").html(data); 	 		 	
			});   
		 }
</script>		 