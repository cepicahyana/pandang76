 
 <?php
$nik=$id		=	$this->input->get_post("id");
 $this->db->where("id",$id); 
$this->db->order_by("nama","ASC");
$data			=	$this->db->get("data_rangkaian_acara");
$data_lainnya	=	$data->row();
$kode			=	$data_lainnya->kode;
$total_pagi_r	=	$this->m_umum->realisasi(1,$data_lainnya->kode);
$total_sore_r	=	$this->m_umum->realisasi(2,$data_lainnya->kode);
echo ' <h5>Tanggal input : '.$this->tanggal->hariLengkap(substr($data_lainnya->_ctime,0,10),"/").'</h5><hr>';
 
		$this->db->order_by("nama","asc");
		$this->db->where("jenis",1);
		$data_b=$this->db->get("tr_blok")->result();
		$data_blok[null]="---";
		$listblok="";$listblokinput1="";$listblokinput2="";
		foreach($data_b as $v)
		{	$jmlBlok1=$this->m_umum->getJmlBlok($data_lainnya->kode,$v->id,1);
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
			<input type='text' onchange='setBlok(`".$data_lainnya->kode."`,`1`,this.value,`".$v->id."`)' style='width:40px' class='form-controls' value='".$jmlBlok1."'> </td>";
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
	$jper				=	isset($val->jenis_permohonan)?($val->jenis_permohonan):"";
	  
	   
}
 
 
$jml_undangan	=	$undangan_pagi+$undangan_sore;
$all_blok		=	form_dropdown("all_blok",$data_blok,"","  class='form-control'  onchange='setAllBlok(`".$nik."`,this.value)' ");

 


?>
<br>
   <div id="load_konten" class='col-md-12 row'>
   
			 <div class="col-md-6" >
			<center>   <table class='entry2'>
			   <tr><td>Nama Pemohon</td><td>  <?php echo $data_lainnya->nama;?></td></tr>
			   <tr><td>Instansi</td><td>   <?php echo $data_lainnya->instansi;?></td></tr>
			   <tr><td>Permohonan awal</td><td>   <?php echo $data_lainnya->jml;?> Undangan</td></tr>
			   </table>
			  </center>
			
			 </div>	

			 
			 <div class="col-md-6" > 
			 <center> 
			 <b>Acc jumlah undangan</b><br>
			 <input id='acc'  onchange='setBlok(`<?php echo $kode?>`,this.value)' style='width:200px;border:#1572E8 solid 2px;text-align:center' type="number" value='<?php echo $this->mdl->getJmlReal($data_lainnya->kode,$jper);?>' class='form-control'>
			 </center>
			 </div>		
			 
				 
			<hr>
				 
 </div>
 
   <hr> 
 <center>
<div class="btn-groupw" role="group">
 <button type="button" onclick="setStatus(`<?php echo $kode;?>`,3)" class="btn bg-orange waves-effect col-black fa fa-folder">  DRAFT</button>
  <button type="button" onclick="setStatus(`<?php echo $kode;?>`,1)" class="btn bg-primary waves-effect col-white fas fa-check-double"> APPROVE </button>
  </div>
 </center>
 <script>
 setTimeout(function(){  $("#acc").focus(); }, 500); 
 function setBlok(kode,jml)
{			 var jper="<?php echo $jper;?>";
			loading("mdl_modal"); 
			if(jper==4)
			{
				var url="<?php echo base_url();?>permohonan/setJmlSuci";
			}else{
				var url="<?php echo base_url();?>permohonan/setJmlLainnya";
			}
		 
			$.post(url,{ kode:kode,jml:jml},function(data){
			 unblock("mdl_modal");  
			  });
} function setStatus (kode,sts)
{			 
			loading("load_konten");
			var jper="<?php echo $jper;?>";
			if(jper==4)
			{
				var url="<?php echo base_url();?>permohonan/setStatusSuci";
			}else{
				var url="<?php echo base_url();?>permohonan/setStatusLainnya";
			}
			 
			$.post(url,{ kode:kode,sts:sts},function(data){
			 $("#mdl_modal").modal("hide");
			 
			 reload_table();
					unblock("load_konten"); 
			 
			  });
}
 </script>