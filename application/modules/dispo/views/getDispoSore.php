 <?php
$nik	=	$id	=	$this->input->get_post("id");
$jenis	=	2;
 $this->db->where("id",$id); 
$this->db->order_by("nama","ASC");
$data	=	$this->db->get("data_persus");
$data_persus	=	$data->row();


		$this->db->order_by("nama","asc");
		$this->db->where("jenis",2);
		$data_b=$this->db->get("tr_blok")->result();
		$data_blok[null]="---";
		$listblok="";$listblokinput1="";$listblokinput2="";
		foreach($data_b as $v)
		{	$jmlBlok1=$this->m_umum->getJmlBlok($data_persus->kode,$v->id,2);
		 
			$title="blue-grey";
			if($jmlBlok1)
			{
				$css1="grey";
				//$title=$v->color;
			}else{
				$css1="";
			}
			
		
		
			 
			$listblok.="<td class='b col-white ' style='background-color:".$title."'>".$v->nama."</td>";
		 	
			$listblokinput1.="<td  style='background-color:".$css1."'>
			<input type='text' onchange='setBlok(`".$data_persus->kode."`,`2`,this.value,`".$v->id."`)' style='width:40px' class='form-controls' value='".$jmlBlok1."'> </td>";
		}
		
		 
			 
		
$this->db->where("id",$id);
 
 
$this->db->order_by("nama","ASC");
$data	=	$this->db->get("data_persus")->result();
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
	 
	
	$color	=	"red";//$this->m_reff->getColor($jenis,);
	$qr1="";
	$qr2="";$blok_pagi=$blok_sore="";
	 
		$acara="SORE";
		  $undangan_sore++;
	 
	$blok="<span class='label font-14' style='background-color:".$color."'>BLOK&nbsp; : w </span>";
		 
	
}
 
 
$jml_undangan	=	$undangan_pagi+$undangan_sore;
$all_blok		=	form_dropdown("all_blok",$data_blok,"","  class='form-control'  onchange='setAllBlok(`".$nik."`,`".$jenis."`,this.value)' ");

 


?>
<br>

<div class="col-md-12" id="load_acara_sore">
			  <b>DISPOSISI ACARA SORE</b>
			 <table class="entry2 " width="100%">
					<tr class='bg-light-green'>
					<td class='col-white b'>  SORE</td> 
					<?php echo $listblok  ?>
					</tr>
				 
					<tr>
					<td>DISPO</td>
					<?php echo $listblokinput1 ?>
					</tr>
			 </table>
			 </div>		<br>