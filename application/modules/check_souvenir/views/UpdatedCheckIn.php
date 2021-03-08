<center>
<?php
$tglin=date("Y-m-d H:i:s");
if($tglin<=date("Y-m-d 15:00:00"))
{
$this->db->where("jenis",1);
}else{
	$this->db->where("jenis",2);
}
$date=date("Y-m-d");
		?>
<span id="updates">
<h2 style='color:white' class="sadow05"><?php echo $this->tanggal->hariLengkap($date,"/"); ?></h2>				
</span>
</center>
	

