<b>Detail penerimaan</b><hr>
<?php
$this->db->where("id",$id);
$data	=	$this->db->get("data_persus")->row();
if(!$data){	echo "data tidak ditemukan"; return false;}

$status_distribusi="Belum didistribusikan";
if($data->diterima_oleh)
{
	$status_distribusi=" Diterima oleh <span class='text-primary'> ".$data->diterima_oleh. " </span>
	<br><span class='text-secondary'>".$this->tanggal->hariLengkapJam($data->diterima_tgl,"-")." WIB</span>";
} 

$jadwal_distribusi="Belum dijadwalkan";
if($data->jadwal_distribusi and $data->jadwal_distribusi!="0000-00-00")
{
	$jadwal_distribusi	= $this->tanggal->hariLengkapJam($data->jadwal_distribusi,"-");
}elseif($data->jadwal_distribusi=="0000-00-00")
{
	$jadwal_distribusi	=	"Tidak dijadwalkan";
} 



?>

<table class="entry" width="100%">
<tr>
<td>
Atas nama penerima 
</td>
<td><?php echo $data->nama;?></td>
</tr>

<tr>
<td>
Instansi / lembaga
</td>
<td><?php echo $data->instansi;?></td>
</tr>

<tr>
<td>
Email
</td>
<td><?php echo $data->email;?></td>
</tr>

<tr>
<td>
Nomor Hp
</td>
<td><?php echo $data->hp;?></td>
</tr>

<tr>
<td>
Undangan
</td>
<td><?php echo "Pagi :".$data->jml_pagi."<br>Sore :".$data->jml_sore;?></td>
</tr>
<tr>
<td>
Souvenir VVIP
</td>
<td><?php echo $data->souvenir_1;?></td>
</tr>
<tr>
<td>
Souvenir VIP
</td>
<td><?php echo $data->souvenir_2;?></td>
</tr>
<tr>
<td>
Souvenir UMUM
</td>
<td><?php echo $data->souvenir_3;?></td>
</tr>

</table>
<br>
<table class="entry" width="100%">

<tr>
<td>
Jadwal distribusi
</td>
<td><?php echo $jadwal_distribusi;?></td>
</tr>
<tr>
<td>
Diserahkan
</td>
<td><?php echo $status_distribusi;?></td>
</tr>

<?php
if($data->diterima_oleh)
{
?>
<tr>
<td>
Pengiriman
</td>
<td><?php echo $this->m_reff->goField("tr_pengiriman","nama","where id='".$data->pengiriman."'");?></td>
</tr>
<tr>
 
<td colspan="2">
<?php
$link=isset($data->diterima_poto)?($data->diterima_poto):"xxx";
 $link=realpath($this->m_reff->tm_pengaturan(37)."/webcamp/".$link);		
 
if(!file_exists($link))
{
	$link="";
}else{
	$link=$this->konversi->img(realpath($link));
}
?>
 <center><img alt='poto penerima' width='300px' src='<?php echo $link; ?>'></center>
</td>
</tr>
<?php } ?>

</table>