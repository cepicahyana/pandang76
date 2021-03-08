<style>
div .scroll { 
  height: 300px;
  overflow: scroll;
}
</style>
<div class="scroll">
<table class="entry table-hover" width="100%">
<tr class='bg-warning'>
<td width="10px">No</td>
<td width="10px">Akun</td>
<td>Kode / Title</td>
<td width="10px">hapus</td>
</tr>
<?php
 
$dt	=	$this->db->query("SELECT a.id,a.id_akun,nama,kode,title FROM zoom_event a LEFT JOIN zoom_akun b ON a.id_akun=b.id ORDER BY nama ASC,title ASC")->result();
$no=1;
foreach($dt as $val)
{
	 
	echo "<tr>
	<td>".$no++."</td>
	<td><span class='text- '>".$val->nama."</td>
	<td><span class='text-primary'>".$val->kode."</span><br>".$val->title."</td>
	<td><button onclick='hapus_event(`".$val->kode."`,`".$val->title."`)' class='btn btn-sm btn-icon btn-round btn-warning' title='hapus'><i class='fas fa-times'></i></button></td>
	</tr>";
}
?>
</table>
</div>
