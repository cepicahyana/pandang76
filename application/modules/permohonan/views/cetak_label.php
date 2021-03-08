<style>
.ttm{
	margin-left:430px; 
}
.kop{
	  
}
 

  .tborder{border-collapse: collapse; word-wrap:break-word; word-break: break-all;table-layout: fixed;font-size:12px;}
                 .tborder2{border-collapse: collapse; word-wrap:break-word; word-break: break-all;table-layout: fixed;width:200mm}
               .tborder td,.tborder  th{word-wrap:break-word;word-break: break-all;border: 1px solid #000;
			   padding-left:5px;padding-right:5px;padding-top:7px;padding-bottom:7px;font-size:12px;text-align:left;}
          .bor{
		  //border:black solid 1px;
		 // padding:15px;
		  border-radius:10px;
		  width:55mm;
		  height:26mm;
		  table-layout: fixed;
		  
		  border:black solid 1px;
		  padding-left:10px;
		  padding-right:10px;
		  padding-top:10px;
		  padding-bottom:10px;
		  border-radius:10px;
		  
		  table-layout: fixed;
		  margin-left:10px;
		  margin-top:10px;
		  }		
.qr{
margin-left:180px;
margin-top:10px;
font-size:9px;
}	
</style>
<table  >

<?php 
		$id= $this->input->get("id"); 
		$in=$this->m_reff->clearkomaray($id);
		$this->db->where_in("kode_persus",$in);
		$file=$this->db->get("data_peserta")->result();
		
		$tb="";	$t=1;$sts="";
		  foreach($file as $r)
		  {
			   
				$qr="";
			   if($t==1)
			  {
				  $tb.="<tr>";
				  $tb.="<td class='size'><div class='bor' ><b>Yth ".$r->nama."</b><br>".$r->instansi."<br>di<br>  tempat </div></td>";  
			  }elseif($t==2)
			  {
				   
				  $tb.="<td  class='size'><div class='bor' ><b>Yth ".$r->nama."</b><br>".$r->instansi."<br>di<br>  tempat  </div></td>";  
			  }else{
				$tb.="<td  class='size'><div  class='bor' ><b>Yth ".$r->nama."</b><br>".$r->instansi."<br>di<br>  tempat</div></td>";  
				}
				
				if($t==1)
				{ 
				  $t=2; $sts="stop";
				}elseif($t==2)
				{ 
				  $t=3; $sts="stop";
				}else{
					 $tb.="</tr>";
					$t=1;  $sts="gerak";
				}
		  }
	  if($sts=="stop")
	  {
		  $tb.="</tr>";
	  }
	  
 
  if(!isset($tb)){ echo "<tr><td>Tidak ada data</td></tr>"; }else{  echo $tb; }
?>
</table>