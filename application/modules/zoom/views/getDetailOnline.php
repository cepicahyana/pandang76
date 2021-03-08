<?php 
	error_reporting(0); 
	$link=$this->m_reff->goField("tm_website","value","where id='16' ");

	$id		=	$this->input->post("id");
	$data = $this->db->get_where("zoom_data", array("id" => $id))->row();
	
	if($data->jk=="l")
			{
				$gender		=	"Laki-laki";
			}else{
				$gender		=	"Perempuan";
			}
	$negara					=	$this->m_reff->namaNegara($data->id_negara);		
		if($data->id_pekerjaan==4)
			{ 
					$pekerjaan		=	"Wartawan ".$data->job_media; 
			}else if($data->id_pekerjaan==5)
			{
				$pekerjaan		=	$data->pekerjaan_lainnya;
			}else{
				$pekerjaan		=	$this->m_reff->goField("tr_pekerjaan","nama","where id='".$data->id_pekerjaan."' ");
			}	
			
			$ktp		=	isset($data->poto)?($data->poto):"xxx";
			$linkktp	=	$link."/".$ktp;
			$src=$this->konversi->img($linkktp);
			 
			
			
?>

<div class="row">
	<div class='col-md-6'>
		 
	<br>	<a href='<?php echo $src;?>'   target="_blank"><img alt='Card identity' src="<?php echo $src?>" width='100%'></a>
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
		    </tr> <tr>
		        <td>Gender</td>
		        <td>
		            <?php echo $gender; ?>
		        </td>
		    </tr>
			<tr>
		        <td>Pekerjaan</td>
		        <td>
		            <?php echo $pekerjaan; ?>
		        </td>
		    </tr>
		     <?php
			 if($data->id_pekerjaan==1)
			 {
				 echo '<tr>
		        <td>Instansi</td>
		        <td>
		          '.$data->instansi.'
		        </td>
		    </tr>';
			 }
			 ?>
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
		        <td>Negara</td>
		        <td>
		            <?php echo $negara; ?>
		        </td>
		    </tr>
		    <tr>
		        <td>Alamat</td>
		        <td>
		            <?php echo $prov=$this->m_reff->goField("wil_provinsi","nama","where id_prov='".$data->id_prov."' "); ?> -
		                <?php echo $kab=strtolower($this->m_reff->goField("wil_kabupaten","nama","where id_kab='".$data->id_kab."'")); ?> <br> 
		                <?php echo $data->alamat; ?>
		        </td>
		    </tr> 
			<tr>
		        <td>Alasan Mengikuti</td>
		        <td>
		            
		                <?php echo $data->alasan_mengikuti; ?>
		        </td>
		    </tr>
			
			<tr>
		        <td>Tanggal daftar</td>
		        <td>
		            
		                <?php echo $data->_ctime; ?> WIB
		        </td>
		    </tr>
		    
		</table>
		<br/>
		
		<?php
		if($data->id_negara==94){?>
		
		Jumlah pendaftar pada wilayah yang sama
		<table class='entry' width="100%">
		    <tr>
		        <td>Seprovinsi
		            <?php echo $prov;?>
		        </td>
		        <td>
		            <?php echo $this->mdl->seProv($data->id_prov)?>
		        </td>
		    </tr>
		    <tr>
		        <td>Se<?php echo strtolower(str_replace("KAB. ","",$kab));?>
		        </td>
		        <td>
		            <?php echo $this->mdl->seKab($data->id_kab)?>
		        </td>
		    </tr>
		</table>
		<?php }else{?>
		Jumlah pendaftar pada wilayah yang sama
	<table class='entry' width="100%">
		    <tr>
		        <td>Negara
		            <?php echo $negara;?>
		        </td>
		        <td>
		            <?php echo $this->mdl->getSenegara($data->id_negara)?>
		        </td>
		    </tr>
		    
		</table>
		<?php } ?>		
		 
		 
		<?php
		if($data->registrant_id)
		{
			$sts_vcon	=	"Masuk";
		}else{
			$sts_vcon	=	"Draf";
		}
		$room			=	$this->m_reff->goField("zoom_event","title","where id='".$data->id_event."' ");
		?>
		
		<br>Video Conferensi  :
		<table class='entry' width="100%">
		<tr>
		<td>Status</td><td> <?php echo $sts_vcon; ?> </td></tr>
		<tr><td>Room Vcon</td><td><?php echo $room; ?></td>
		</tr>
		</table>
		
		
		<br>
		 
		 
		</table>
		 
		<br>
		
		 
		
	</div>
</div>