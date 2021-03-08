Penyesuaian Jumlah Souvenir & Undangan<hr>
 <?php
$nik=$id		=	$this->input->get_post("id");
 $this->db->where("id",$id); 
 
$data			=	$this->db->get("data_persus");
$data_persus	=	$data->row();
$kode_persus	=	$data_persus->kode;
$pagi			=	$data_persus->jml_pagi;
$sore 			=	$data_persus->jml_sore;
$vvip 			=	$data_persus->souvenir_1;
$vip 			=	$data_persus->souvenir_2;
$umum 			=	$data_persus->souvenir_3;
 
		
	 
$souvenir="<td  style=''>
			<input type='text' onchange='setBlok(`".$data_persus->kode."`,`souvenir_1`,this.value,`vvip`)' style='width:40px;text-align:center' class='form-controls' value='".$vvip."'> 
			VVIP
			</td>";	 
	 
	 $souvenir.="<td  style=''>
			<input type='text' onchange='setBlok(`".$data_persus->kode."`,`souvenir_2`,this.value,`".$data_persus->id."`)' style='width:40px;text-align:center' class='form-controls' value='".$vip."'> 
			VIP
			</td>";	 
	 
	 $souvenir.="<td  style=''>
			<input type='text' onchange='setBlok(`".$data_persus->kode."`,`souvenir_3`,this.value,`".$data_persus->id."`)' style='width:40px;text-align:center' class='form-controls' value='".$umum."'> 
			UMUM
			</td>";	 
	 
	 
	 	 $undangan="<td  style=''>
			<input type='text' onchange='setBlok(`".$data_persus->kode."`,`jml_pagi`,this.value,`pagi`)' style='width:40px;text-align:center' class='form-controls' value='".$pagi."'> 
			   Undangan Pagi
			</td>";	 
	  $undangan.="<td  style=''>
			<input type='text' onchange='setBlok(`".$data_persus->kode."`,`jml_sore`,this.value,`sore`)' style='width:40px;text-align:center' class='form-controls' value='".$sore."'> 
			Undangan Sore
			</td>";	 
	 
	 
	 
  
 
?>
<br>
   <div id="load_konten">
			 <div class="col-md-12" id="load_acara_pagi">
		 
			 <table class=" entry2  " width="100%">
					 
				 
					<tr>
				 
					<?php echo $souvenir ?>
					</tr>
			 </table>
			 </div>		<br>
			 
			 <div class="col-md-12" id="load_acara_pagi">
		 
			 <table class=" entry2  " width="100%">
					 
				 
					<tr>
					 
					<?php echo $undangan ?>
					</tr>
			 </table>
			 </div>		
			 
			 
				 
				 
				
 <br>
  
 
 
 
 
 
 
  <div class="row clearfix"><br></div></div>
 
 
 
 <script>
 function setBlok(kode_persus,acara,jml,blok)
{			if(acara==1){
			loading("load_konten");
			}else{
			loading("load_konten");
			}
			var url="<?php echo base_url();?>permohonan/setBlokPersusSouvenir"; 
			$.post(url,{ kode:kode_persus,field:acara,blok:blok,jml:jml},function(data){
				 
			 if(acara==1){
					unblock("load_konten"); 
			}else{
					unblock("load_konten"); 
			}
			  });
} function setStatus (kode,sts)
{			 
			loading("load_konten");
			 
			var url="<?php echo base_url();?>permohonan/setStatus"; 
			$.post(url,{ kode:kode,sts:sts},function(data){
			 $("#mdl_modal").modal("hide");
			 
			 reload_table();
					unblock("load_konten"); 
			 
			  });
}
 </script>