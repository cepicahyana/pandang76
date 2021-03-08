<?php 
	$link=$this->m_reff->tm_pengaturan(14);

	$id		=	$this->input->post("id");
	$data = $this->db->get_where("data_peserta", array("id" => $id))->row();
?>

<div class="row">
	<div class='col-md-6'>
		<a href='<?php echo $link."/upload/peserta/ktp/".$data->foto_ktp?>'  target="_blank"><img alt='image ktp' src="<?php echo $link."/upload/peserta/ktp/".$data->foto_ktp?>" width='100%'></a>
	<br>	<a href='<?php echo $link."/upload/peserta/kk/".$data->foto_kk?>'   target="_blank"><img alt='image kk' src="<?php echo $link."/upload/peserta/kk/".$data->foto_kk?>" width='100%'></a>
	</div>
	<div class='col-md-6'>
		<table class='entry' width="100%">
		    <tr class='bg-grey '>
		        <td colspan="2"><b class=' '> Data profile</b></td>
		    </tr>
		    <tr>
		        <td>Nama</td>
		        <td>
		            <?php echo $data->nama; ?>
		        </td>
		    </tr>
		    <tr>
		        <td>NIK</td>
		        <td>
		            <?php echo $data->nik; ?>
		        </td>
		    </tr>
		    <tr>
		        <td>Hp</td>
		        <td>
		            <?php echo $data->hp; ?>
		        </td>
		    </tr>
		    <tr>
		        <td>E-mail</td>
		        <td>
		            <?php echo $data->email; ?>
		        </td>
		    </tr>
		    <tr>
		        <td>Alamat</td>
		        <td>
		            <?php echo $prov=$this->m_reff->goField("wil_provinsi","nama","where id_prov='".$data->id_provinsi."' "); ?> -
		                <?php echo $kab=strtolower($this->m_reff->goField("wil_kabupaten","nama","where id_kab='".$data->id_kota."'")); ?>
		        </td>
		    </tr>
		    <tr>
		        <td>Alasan  </td>
		        <td>
		            <?php echo $data->alasan_mengikuti; ?>
		        </td>
		    </tr>
		</table>
		<br/>
		Jumlah pendaftar pada wilayah yang sama
		<table class='entry' width="100%">
		    <tr>
		        <td>Seprovinsi
		            <?php echo $prov;?>
		        </td>
		        <td>
		            <?php echo $this->mdl->getProvByNik($data->id_provinsi)?>
		        </td>
		    </tr>
		    <tr>
		        <td>Se<?php echo strtolower(str_replace("KAB. ","",$kab));?>
		        </td>
		        <td>
		            <?php echo $this->mdl->getKabByNik($data->id_kota)?>
		        </td>
		    </tr>
		</table>
		 
		<?php
		if($data->permohonan_awal==1)
		{
			$upacara="Penaikan  ";
		}elseif($data->permohonan_awal==2)
		{
			$upacara="Penurunan  ";
		}elseif($data->permohonan_awal==3)
		{
			$upacara="Penaikan & Penurunan";
		}else{
			$upacara="-";
		}
		
		if($data->r_suci==1){
		$suci="Ya";
		}else{
		$suci="-";
		}
		?>
		
		<?php
		$blokPagi=$blokSore="";
		if($data->blok1){
		$blokPagi= "<span class='text-danger'>(".$this->m_reff->goField("tr_blok","nama","where id='".$data->blok1."' ").")</span>";
		}
		?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
		if($data->blok2){
		$blokSore= "<span class='text-primary' >(".$this->m_reff->goField("tr_blok","nama","where id='".$data->blok2."' ").")</span>";
		}
		?>
		
		
		<?php
		if($data->jenis_acara==1)
		{
			$upacara_acc="Penaikan  ".$blokPagi;
		}elseif($data->jenis_acara==2)
		{
			$upacara_acc="Penurunan ".$blokSore;
		}elseif($data->jenis_acara==3)
		{
			$upacara_acc="Penaikan ".$blokPagi." <br> Penurunan ".$blokSore;
		}else{
			$upacara_acc="-";
		}
		if($data->sts_acc==3 and $data->jenis_acara)
		{
			$upacara_acc="Ditolak";
		}elseif($data->sts_acc==3 and !$data->jenis_acara)
		{
			$upacara_acc="-";
		}
		
		if($data->sts_suci==2)
		{
			$stssuci="Ditolak";
		}elseif($data->sts_suci==1){
			$stssuci="Diterima";
		}else{
			$stssuci="-";
		}
		?>
		
		
		
		<br>Permohonan awal :
		<table class='entry' width="100%">
		<tr>
		<td>Upacara</td><td><?php echo $upacara;?></td></tr>
		<tr><td>Renungan suci</td><td><?php echo $suci;?></td>
		</tr>
		</table>
		<br>
		<?php
		if($data->sts_acc){?>
		 Assessment :
		<table class='entry' width="100%">
		<tr>
		<td>Upacara</td><td><?php echo $upacara_acc;?></td></tr>
		<tr><td>Renungan suci</td><td><?php echo $stssuci;?></td>
		</tr>
		 <?php
		if($data->sts_acc==3)
		{
			echo " 
			<tr>
			<td>Alasan Penolakan</td><td>".$this->m_reff->goField('tm_alasan_penolakan','alasan','where id="'.$data->id_alasan.'" ')."</td>
			</tr> 
			 
			";
		}
		 
		if($data->verifikator)
		{
			echo " 
			 <tr>
			<td>Verifikator</td><td>".$this->m_reff->goField('admin','owner','where id_admin="'.$data->verifikator.'" ')."</td>
			</tr> 
			 
			";
		}
		?>
		</table>
		<?php } ?>
		
		<br>
		
		<?php
$link=isset($data->diterima_poto)?($data->diterima_poto):"xxx";
 $link=realpath($this->m_reff->tm_pengaturan(37)."/webcamp/".$link);		
 
if(!file_exists($link))
{
	$link="";
}else{
	$link=$this->konversi->img(realpath($link));
}
		if($data->diterima_oleh)
		{
			echo "
			<table class='entry' width='100%'>
			<tr>
			<td>Diterima oleh</td><td>".$data->diterima_oleh."</td>
			</tr><tr>
			<td>Tanggal penyerahan</td><td>".$this->tanggal->hariLengkap(substr($data->diterima_tgl,0,10),"/")."</td>
			</tr><tr>
			<td colspan='2'><center><img alt='poto penerima' width='300px' src='".$link."'></center></td>
			</tr>
			</table>
			
			";
		}
		?>
			 
		
	</div>
</div>