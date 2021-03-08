<hr>
<?php
		$tgl			=	$this->input->get_post("tgl");
		$tgl			=	explode(",",$tgl);
		$tgl			=	trim($tgl[1]);
		$tgl			=	$this->tanggal->eng_($tgl,"-");
?><center><b> <?php echo $this->tanggal->hariLengkap($tgl,"-");?></b></center>
<br>
<div class="row">

<div class="col-md-6">
<table class="entry" width="100%">
<thead>
<tr>
<th colspan="3">ACARA PAGI</th>
</tr>
<tr>
<th>BLOK</th>
<th>JUMLAH</th>
 
</tr>
</thead>
<?php

$data	=	$this->mdl->getDistribusi($tgl,1);
if(!$data){
echo "<tr><td colspan='2'> Data tidak tersedia. </td></tr>";
}
foreach($data as $data)
{	$nama_blok	=	$this->m_reff->goField("tr_blok","nama","where id='".$data->blok."'");
	echo "<tr>
	<td> Blok ".$nama_blok."</td>
	<td>".$data->jml."</td>
	 
	</tr>";
}
?>
</table>
</div>

<div class="col-md-6">
<table class="entry" width="100%">
<thead >
<tr >
<th colspan="3" style='background-color:#1572E8' >ACARA SORE</th>
</tr>
<tr>
<th style='background-color:#1572E8'>BLOK</th>
<th style='background-color:#1572E8'>JUMLAH</th>
 
</tr>
</thead>
<?php

$data	=	$this->mdl->getDistribusi($tgl,2);
if(!$data){
echo "<tr><td colspan='2'> Data tidak tersedia. </td></tr>";
}
foreach($data as $data)
{	$nama_blok	=	$this->m_reff->goField("tr_blok","nama","where id='".$data->blok."'");
	echo "<tr>
	<td> Blok ".$nama_blok."</td>
	<td>".$data->jml."</td>
	 
	</tr>";
}
?>
</table>
</div>
</div>
<br>