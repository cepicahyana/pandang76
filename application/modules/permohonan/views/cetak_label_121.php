<style>
.ttm{
	margin-left:430px; 
}
.kop{
	  
}
 

  .tborder{border-collapse: collapse; word-wrap:break-word; word-break: break-all;table-layout: fixed;font-size:12px;}
                 .tborder2{border-collapse: collapse; word-wrap:break-word; word-break: break-all;table-layout: fixed;width:75mm;height:35mm;}
               .tborder td,.tborder  th{word-wrap:break-word;word-break: break-all;border: 1px solid #000;
			   padding-left:5px;padding-right:5px;padding-top:7px;padding-bottom:7px;font-size:12px;text-align:left;}
          .bor{
		  //border:black solid 1px;
		 // padding:15px;
		  border-radius:10px;
		 
		 
		  
		  border:white solid 1px;
		  padding-left:20px;
		  padding-right:10px;
		  padding-top:10px;
		  padding-bottom:1px;
		  border-radius:10px;
	 
		  margin-left:10px;
		  margin-top:10px;
		  }		
.qr{
//position : absolute;
margin-left:255px;
margin-top:-50px;
width:40px;
}	
.tmt{
font-size:11px;
}
.namalab{
margin-left:-7px;
}
</style>
 
<table cellspacing="0" cellpadding="0" border='0' >

<?php 
		$base_url	=	$this->m_reff->tm_pengaturan(37);
		$mode		=	$this->m_reff->tm_pengaturan(39);
		$id		= $this->input->get("id"); 
		$opsi	= $this->input->get("opsi"); 
		$in=$this->m_reff->clearkomaray($id);
		if($opsi=="true")
		{
			$this->mdl->updatePesertaLabel($in);
			$this->db->where_in("id",$in); 
		}else{
			$this->db->where_in("kode",$in);
		}
		
		//$this->db->group_by("kode_persus");
		$file=$this->db->get("data_persus")->result();
		
		$tb="";	$t=1;
		  foreach($file as $r)
		  {
			  if($r->instansi)
			  {
				  $instansi =	$r->instansi."<br>";
			  }else{
				  $instansi	=	"";
			  }
			  
			  if($r->ket and strtolower($r->ket)!='tempat')
			  {
				  $tempat =	"<br>".$r->ket;
			  }else{
				  $tempat	=	"<br>di tempat";
			  }
			  
			  
			 if($mode==2){
				  $this->m_reff->qr($r->kode);
				  $src	=	$base_url."/qr/".$r->kode.".png";
				  $qr	=	" <img class='qr' src='".realpath($src)."'>";
			 }else{
				  $qr	=	"";
			 }
			   if($t==1)
			  {
				  $tb.="<tr>";
				  $tb.="<td class='tborder2' ><div class='bor' style=' width:69mm;height:35mm; line-height:17px ;' ><b>Yth ".$instansi."</b> 
				   <span class='namalab'> ".trim($r->nama)."</span> 
				    <span class='tmt'>".$tempat."</span>  
				  </div>
				 ".$qr."
				  </td>";  
			  } else{
				$tb.="<td  class='size'><div  class='bor' style=' width:69mm;height:35mm;line-height:17px   ' > <b>Yth ".$instansi." </b>
				  <span class='namalab'> ".trim($r->nama)."</span> 
				    <span class='tmt'>".$tempat."</span> <br>  
				</div>
				 ".$qr."
				</td>";  
				}
				
				if($t==1)
				{ 
				  $t=2; $sts="stop";
				} else{
					 $tb.="</tr>";
					$t=1;  $sts="gerak";
				}
		  }
		  if(!$sts){redirect("permohonan/persus");} 
	  if($sts=="stop")
	  {
		  $tb.="</tr>";
	  }
	  
 
  if(!isset($tb)){ echo "<tr><td>Tidak ada data</td></tr>"; }else{  echo $tb; }
?>
</table>
