 <?php
$nik	=	$this->input->get_post("nik");
$jenis	=	1;//$this->input->get_post("jenis");

		$this->db->order_by("nama","asc");
		$this->db->where("jenis",1);
		$data_b=$this->db->get("tr_blok")->result();
		$data_blok[null]="---";
		$listblok="";$listblokinput1="";$listblokinput2="";
		foreach($data_b as $v)
		{	$jmlBlok1=$this->mdl->getJmlBlok($nik,$jenis,$v->nama,1);
		 	$title="blue-grey";
			if($jmlBlok1)
			{
				$css1="grey";
				//$title="green";
			}else{
				$css1="";
			}
			
		 
 
			$listblok.="<td style='background-color:".$title."'>".$v->nama."</td>";
	 
			
			$listblokinput2.="<td  style='background-color:".$css1."'>
			<input type='text' onchange='setBlok(`".$nik."`,`".$jenis."`,`".$v->nama."`,this.value,`1`)' style='width:40px' class='form-controls' value='".$jmlBlok1."'> </td>";
		}
		
		 
	 	
$this->db->where("nik",$nik);
$this->db->where("jenis",$jenis);
 
$this->db->order_by("jenis,blok","ASC");
$data	=	$this->db->get("data_peserta")->result();
$lis="";$no=1;$nik="";$undangan_pagi=$undangan_sore=0;


    $nama_pj	=	"";
	$nik		=	"";
	$hp			=	"";
	$email		=	"";
	$ket		=   "";
	$total_pagi			=	"";
	$total_sore			=	"";
	$pagi_single		=	"";
	$pagi_double		=	"";
	$sore_single		=	"";
	$sore_double		=   "";
	
	
foreach($data as $val)
{
	$nama_pj	=	isset($val->nama)?($val->nama):"";
	$nik		=	isset($val->nik)?($val->nik):"";
	$hp			=	isset($val->hp)?($val->hp):"";
	$email		=	isset($val->email)?($val->email):"";
	$ket		=	isset($val->ket)?($val->ket):"";
	$total_pagi			=	isset($val->jml_pagi)?($val->jml_pagi):"";
	$total_sore			=	isset($val->jml_sore)?($val->jml_sore):"";
	$pagi_single		=	isset($val->jml_s_pagi)?($val->jml_s_pagi):"";
	$pagi_double		=	isset($val->jml_d_pagi)?($val->jml_d_pagi):"";
	$sore_single		=	isset($val->jml_s_sore)?($val->jml_s_sore):"";
	$sore_double		=	isset($val->jml_d_sore)?($val->jml_d_sore):"";
	 
	
	$color	=	$this->m_reff->getColor($val->jenis,$val->blok);
	$qr1="";
	$qr2="";$blok_pagi=$blok_sore="";
	if($val->jenis==1)
	{	$acara="PAGI";
		 
		$undangan_pagi++;
	}else{
		$acara="SORE";
		  $undangan_sore++;
	}
	 	
	 
	   
}
 
 
$jml_undangan	=	$undangan_pagi+$undangan_sore;
$all_blok		=	form_dropdown("all_blok",$data_blok,"","  class='form-control'  onchange='setAllBlok(`".$nik."`,`".$jenis."`,this.value)' ");

 


?>
<br>
   <div id="load_konten">
			 <div class="col-md-12" id="load_acara_pagi">
			  <b>DISPOSISI ACARA PAGI</b>
			 <table class="entry2 card" width="100%">
					<tr class='bg-green'>
					<td >  PAGI</td> 
					<?php echo $listblok ?>
					</tr>
				 
					<tr>
					<td>DISPO</td>
					<?php echo $listblokinput2 ?>
					</tr>
			 </table>
			 </div>		
			 
				 <?php $this->load->view("getDispoSore");?>	 
				 
				 <div class="col-md-12">
				 <b>PERMOHONAN AWAL</b>
					<table class="entry2 card" width="100%">
					 <tr class="bg-blue-grey">
					 <td>PENGAJUAN</td> <td>JUMLAH</td>  
					 </tr> <tr>
					 <td>PAGI</td><td><?php echo $total_pagi;?></td> 
					 </tr><tr>
					 <td>SORE</td><td><?php echo $total_sore;?></td> 
					 </tr><tr>
					 <td colspan="4">Instruksi » <?php echo $ket;?></td> 
					 </tr>
					</table>
					</div> 
				 
				
 <br>
 
 <center>
 <div class="btn-groupw" role="group">
 <button type="button" onclick="setStatus(`<?php echo $nik;?>`,3)" class="btn bg-red waves-effect"><i class="material-icons">drafts</i> Tolak</button>
 <button type="button" onclick="setStatus(`<?php echo $nik;?>`,1)" class="btn bg-yellow waves-effect col-black"><i class="material-icons">drafts</i> Draft</button>
 <button type="button" onclick="setStatus(`<?php echo $nik;?>`,2)" class="btn bg-green waves-effect"><i class="material-icons">playlist_add_check</i>  Fix</button>
  </div>
  </center>
 
 
 
 
 
 
 
 
 
  <div class="row clearfix"><br></div></div>
 
 
 
 <script>
 function setBlok (nik,acara,blok,jml,berlaku)
{			if(acara==1){
			loading("load_acara_pagi");
			}else{
			loading("load_acara_sore");
			}
			var url="<?php echo base_url();?>pengajuan/setBlok"; 
			$.post(url,{ nik:nik,acara:acara,blok:blok,berlaku:berlaku,jml:jml},function(data){
				 
			 if(acara==1){
					unblock("load_acara_pagi"); 
			}else{
					unblock("load_acara_sore"); 
			}
			  });
} function setStatus (nik,sts)
{			 
			loading("load_konten");
			 
			var url="<?php echo base_url();?>pengajuan/setStatus"; 
			$.post(url,{ nik:nik,sts:sts},function(data){
			 $("#modal_edit").modal("hide");
			 reload_table();
					unblock("load_konten"); 
			 
			  });
}
 </script>