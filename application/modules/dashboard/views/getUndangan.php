<?php
		$tgl			=	$this->input->get_post("tgl");
		$tgl			=	explode(",",$tgl);
		$tgl			=	trim($tgl[1]);
		$tgl			=	$this->tanggal->eng_($tgl,"-");
?>
<div style='width:100%'><center><b> <?php echo $this->tanggal->hariLengkap($tgl,"-");?></b></center></div><br>
<div class="row col-md-12">&nbsp;</div>
<div class="col-md-4">
<table class="entry" width="100%">
<thead>
<tr>
<th colspan="3" >ACARA PAGI <span style='float:right'>Total : <?php echo $this->mdl->jmlDistribusiAcara($tgl,1);?></span></th>
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

<div class="col-md-4">
<table class="entry" width="100%">
<thead>
<tr>
<th colspan="3" style='background-color:orange'>ACARA SORE  <span style='float:right'>Total : <?php echo $this->mdl->jmlDistribusiAcara($tgl,2);?></span></th>
</tr>
<tr>
<th style='background-color:orange'>BLOK</th>
<th style='background-color:orange'>JUMLAH</th>
 
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


<div class="col-md-4"><center>
 
<div class="card bg-primary-gradient white"><br><b>UNDANGAN RENUNGAN SUCI</b>
								<div class="card-body  p-3 text-center">
									 
									<div class="h1 m-0"><?php echo $this->mdl->getDistribusiSuci($tgl);?></div>
							 
								</div>
							</div>
 </center>
</div>