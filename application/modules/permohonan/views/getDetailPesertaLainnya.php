
<?php
	$id = $_POST["id"];

	$this->db->where("id", $id);
	$d = $this->db->get("data_rangkaian_acara")->row_array();

?>
<input type="hidden" value="<?php echo $d['id'] ?>" name="id">
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
<td>Keterangan</td><td><?php echo $d['ket'] ?></td>
</tr><tr>
<td>Tanggal Input</td><td><?php echo $this->tanggal->hariLengkapJam($d['_ctime'],"/");?> WIB</td>
</tr><tr>
<td>Operator Input</td><td><?php echo $this->m_reff->opr($d['_cid']);?></td>
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
 
		if($d['diterima_oleh'])
		{
			echo "  
			<table class='entry' width='100%'>
			<tr>
			<td>Diterima Oleh</td><td>".$d['diterima_oleh']."</td>
			</tr><tr>
			<td>Tanggal penyerahan</td><td>".$this->tanggal->hariLengkap(substr($d['diterima_tgl'],0,10),"/")."</td>
			</tr><tr>
			<td colspan='2'><center><img alt='poto penerima' width='300px' src='".$link."'></center></td>
			</tr>
			</table>
			
			";
		}
		?>			 