
<?php
	$id = $_POST["id"];

	$this->db->where("id", $id);
	$d = $this->db->get("data_persus")->row_array();

?>
<input type="hidden" value="<?php echo $d['id'] ?>" name="id">
<div class="row col-sm-12">
<table class='entry'width="100%">
<tr>
<td>Nama Pemohon</td><td><?php echo $d['nama'] ?>  </td>
</tr>
<tr>
<td>Instansi</td><td><?php echo $d['instansi'] ?></td>
</tr>
<tr>
<td>Email</td><td><?php echo $d['email'] ?></td>
</tr><tr>
<td>Hp</td><td><?php echo $d['hp'] ?></td>
</tr><tr>
<td>Ket. Alamat (label)</td><td><?php echo $d['ket'] ?></td>
</tr>
<tr>
<td>Permohonan awal ( pagi ) : <?php echo $d['jml_pagi'] ?></td><td> Acc : <?php echo $this->mdl->getPagiReal($d['kode']) ?></td>
</tr><tr>
<td>Permohonan awal ( sore ) : <?php echo $d['jml_sore'] ?></td><td> Acc : <?php echo $this->mdl->getSoreReal($d['kode']) ?></td>
</tr>
<tr>
<td>Tanggal Input</td><td><?php echo $this->tanggal->hariLengkapJam($d['_ctime'],"/");?> WIB</td>
</tr><tr>
<td>Operator Input</td><td><?php echo $this->m_reff->opr($d['_cid']);?></td>
</tr>
</table>

	 
</div>

 
</div>

<hr>
 
		 


<?php
$nik=$id		=	$this->input->get_post("id");
 $this->db->where("id",$id); 
$this->db->order_by("nama","ASC");
$data			=	$this->db->get("data_persus");
$data_persus	=	$data->row();
$kode_persus	=	$data_persus->kode;
 

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
	 
			
			$listblokinput2.="<td  style='background-color:".$css1."'> ".$jmlBlok1."  </td>";
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
 <div   id="load_acara_pagi">
			  <b>Disposisi Pagi</b>
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
		



<?php
  

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
			}else{
				$css1="";
			}
			
		//	$nama_blok	=	$this->m_reff->goField("tr_blok","nama","where id='".$jmlBlok1."' ");
 
			$listblok.="<td class='col-white b'  style='background-color:".$title."'>".$v->nama."</td>";
	 
			
			$listblokinput2.="<td  style='background-color:".$css1."'> ".$jmlBlok1."  </td>";
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
			 <div   id="load_acara_pagi">
			  <b>Disposisi sore</b>
			 <table class="entry2  " width="100%">
					<tr class='bg-orange '>
					<td class='col-white b'>  SORE</td> 
					<?php echo $listblok ?>
					</tr>
				 
					<tr>
					<td>DISPO</td>
					<?php echo $listblokinput2 ?>
					</tr>
			 </table>
			 </div>	


<hr>
<?php
$link=isset($d['diterima_poto'])?($d['diterima_poto']):"xxx";
	$link=realpath($this->m_reff->tm_pengaturan(37)."/webcamp/".$link);
if(!file_exists($link))
{
	$link="";
}else{
	$link=$this->konversi->img(realpath($link));
}

		//$data=$this->db->get()->row();
		if($d['diterima_oleh'])
		{
			echo "  
			<table class='entry' width='100%'>
			<tr>
			<td>Diterima Oleh</td><td>".$d['diterima_oleh']."</td>
			</tr><tr>
			<td>Tanggal penyerahan</td><td>".$this->tanggal->hariLengkap(substr($d['diterima_tgl'],0,10),"/")."</td>
			</tr><tr>
			<td colspan='2'><center><img alt='poto penerima' width='300px'  src='".$link."'></center></td>
			</tr>
			</table>
			
			";
		}
		?>			 