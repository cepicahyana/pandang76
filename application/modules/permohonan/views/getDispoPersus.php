 
 <?php
$nik=$id		=	$this->input->get_post("id");
 $this->db->where("id",$id); 
$this->db->order_by("nama","ASC");
$data			=	$this->db->get("data_persus");
$data_persus	=	$data->row();
$kode_persus	=	$data_persus->kode;
$total_pagi_r	=	$this->m_umum->realisasi(1,$data_persus->kode);
$total_sore_r	=	$this->m_umum->realisasi(2,$data_persus->kode);
echo ' <h5>Disposisi : '.$data_persus->nama.'</h5><hr>';
 
		$this->db->order_by("nama","asc");
		$this->db->where("jenis",1);
		$data_b=$this->db->get("tr_blok")->result();
		$data_blok[null]="---";
		$listblok="";$listblokinput1="";$listblokinput2="";
		foreach($data_b as $v)
		{	$jmlBlok1=$this->m_umum->getJmlBlok($data_persus->kode,$v->id,1);
		 	$title="blue-grey";
			if($jmlBlok1)
			{
				$css1="grey"; 
			}else{
				$css1="";
			}
			
		//	$nama_blok	=	$this->m_reff->goField("tr_blok","nama","where id='".$jmlBlok1."' ");
 
			$listblok.="<td class='col-white b'  style='background-color:".$title."'>".$v->nama."</td>";
	 
			
			$listblokinput2.="<td  style='background-color:".$css1."'>
			<input type='text' onchange='setBlok(`".$data_persus->kode."`,`1`,this.value,`".$v->id."`)' style='width:40px' class='form-controls' value='".$jmlBlok1."'> </td>";
		}
		
		 
	 	
 

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
	
	
foreach($data->result() as $val)
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
	 
	
	$color	=	"Red";//$this->m_reff->getColor($val->jenis,$val->blok);
	$qr1="";
	$qr2="";$blok_pagi=$blok_sore="";
	if(1==1)
	{	$acara="PAGI";
		 
		$undangan_pagi++;
	}else{
		$acara="SORE";
		  $undangan_sore++;
	}
	 	
	 
	   
}
 
 
$jml_undangan	=	$undangan_pagi+$undangan_sore;
$all_blok		=	form_dropdown("all_blok",$data_blok,"","  class='form-control'  onchange='setAllBlok(`".$nik."`,this.value)' ");

 


?>
<br>
   <div id="load_konten">
			 <div class="col-md-12" id="load_acara_pagi">
			  <b>DISPOSISI ACARA PAGI</b>
			 <table class="entry2  " width="100%">
					<tr class='bg-green '>
					<td class='col-white b'>  PAGI</td> 
					<?php echo $listblok ?>
					</tr>
				 
					<tr>
					<td>DISPO</td>
					<?php echo $listblokinput2 ?>
					</tr>
			 </table>
			 </div>		
			 
				 <?php $this->load->view("getDispoSore");?>	 
				 <hr>
				 <div  >
				 <b>PERMOHONAN AWAL</b>
					<table class="entry2  " width="100%">
					 <tr class="bg-blue-grey">
					 <td>PERMOHONAN</td> <td>JUMLAH</td>  <td>REALISASI</td>  
					 </tr> <tr>
					 <td>PAGI</td><td><?php echo $total_pagi;?></td> <td><?php echo $total_pagi_r;?></td> 
					 </tr><tr>
					 <td>SORE</td><td><?php echo $total_sore;?></td> <td><?php echo $total_sore_r;?></td> 
					 </tr><tr>
					 <td colspan="4">Keterangan » <?php echo $ket;?></td> 
					 </tr>
					</table>
					</div> 
				 
				
 <br>
 
 <center>
 <?php
 $cek=$this->db->query("select * from data_peserta where kode_persus='".$kode_persus."' and (barcode1 is not null or barcode2 is not null) ")->num_rows();
 if(!$cek){
 ?>
 
 <div class="btn-groupw" role="group">
<!-- <button type="button" onclick="setStatus(`<?php echo $nik;?>`,3)" class="btn bg-red waves-effect">  Tolak</button>
  --><button type="button" onclick="setStatus(`<?php echo $kode_persus;?>`,3)" class="btn bg-orange waves-effect col-black fa fa-folder">  DRAFT</button>

  <button type="button" onclick="setStatus(`<?php echo $kode_persus;?>`,1)" class="btn bg-primary waves-effect col-white fas fa-check-double"> APPROVE </button>
  </div>
 <?php } ?>
  </center>
 
 
 
 
 
 
 
 
 
  <div class="row clearfix"><br></div></div>
 
 
 
 <script>
 function setBlok (kode_persus,acara,jml,blok)
{			if(acara==1){
			loading("load_acara_pagi");
			}else{
			loading("load_acara_sore");
			}
			var url="<?php echo base_url();?>permohonan/setBlokPersus"; 
			$.post(url,{ kode:kode_persus,acara:acara,blok:blok,jml:jml},function(data){
				 
			 if(acara==1){
					unblock("load_acara_pagi"); 
			}else{
					unblock("load_acara_sore"); 
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