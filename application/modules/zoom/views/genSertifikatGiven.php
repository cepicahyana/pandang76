<style> 
  .monotype{
	    font-family:monotypecorsiva;
		font-weight:bold;
	}
   .posisi{
		font-size:57px;
		margin-top:122px;
		margin-left:-20px;
		color:white;
   }
</style> 
<?php
 
	$link			=	$this->m_reff->tm_pengaturan(88);
	$link_image		=	$this->m_reff->tm_pengaturan(37)."/sertifikat/".$link;
 
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

 
 