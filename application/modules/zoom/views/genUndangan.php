<style> 
  .monotype{
	    font-family:monotypecorsiva;
		font-weight:bold;
	}
   .posisi{
		font-size:45px;
		margin-top:250px;
		margin-left:-20px;
   }
</style> 
<?php
if($id_negara==94){
	$link			=	$this->m_reff->tm_pengaturan(65);
	$link_image		=	$this->m_reff->tm_pengaturan(37)."/sertifikat/".$link;
}else{
	$link			=	$this->m_reff->tm_pengaturan(65);
	$link_image		=	$this->m_reff->tm_pengaturan(37)."/sertifikat/".$link;
}
?>



<page orientation="lanscape"   backimg="<?php echo realpath($link_image);?>"  >  
<p align="center">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<b class="monotype posisi"><strong><?php echo $nama;?></strong></b>
</p>
</page>

 
 