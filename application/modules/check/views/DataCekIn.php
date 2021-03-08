<?php
$var["isi"]="";
$var["hasil"]="";
$idadmin=$this->session->userdata("id");
$id=trim($this->input->post("ID"));
$tgl=$date=date('Y-m-d'); 
 

//$idform=$this->db->query("SELECT id_form from data_event where id_event='".$u."' ")->row();		
$this->db->where("(barcode1='".$id."' or barcode2='".$id."')");


$tglin=date("Y-m-d H:i:s");
if($tglin<=date("Y-m-d 12:00:00"))
{
	$date=1;
}else{
	$date=2;
};



$cek=$this->db->get("data_peserta");
$data=$cek->row();
$cekposisi=isset($data->barcode1)?($data->barcode1):""; /////cek kode barko
$sts=isset($data->sts_acc)?($data->sts_acc):"";
if($cekposisi==$id)
{
	$ke="1"; 
	$kodbar		=	isset($data->barcode1)?($data->barcode1):"";
	$stscekin	=	isset($data->cekin1)?($data->cekin1):"";
	$id_blok	=	isset($data->blok1)?($data->blok1):"";
	$blok		=	$this->m_reff->goField("tr_blok","nama","where id='".$id_blok."'");
}else{
	$ke="2"; 
	$kodbar		=	isset($data->barcode2)?($data->barcode2):"";
	$stscekin	=	isset($data->cekin2)?($data->cekin2):"";
	$id_blok	=	isset($data->blok2)?($data->blok2):"";
	$blok		=	$this->m_reff->goField("tr_blok","nama","where id='".$id_blok."'");
}
$undangan=isset($data->jenis)?($data->jenis):"";
if($undangan==1){ $undangan="Pagi"; }else{ $undangan="Sore"; }
$sstatus=isset($data->status)?($data->status):"";
if($data) //apakah peserta ada ?
{
			
			$isidata="";
			 

			/*------------------------*/

	 

	$nama=isset($data->nama)?($data->nama):"";
	$lembaga=isset($data->instansi)?($data->instansi):"";
	$penanggung_jawab=isset($data->berlaku)?($data->berlaku):"";
	////$berlaku=isset($data->jml_berlaku)?($data->jml_berlaku):"";
	$blok1=isset($data->blok1)?($data->blok1):"";
	$blok2=isset($data->blok2)?($data->blok2):"";
	$id_provinsi=isset($data->id_provinsi)?($data->id_provinsi):"";
	$id_kota=isset($data->id_kota)?($data->id_kota):"";
	$prov=$this->m_reff->goField("wil_provinsi","nama","where id_prov='".$id_provinsi."'");
	$kota=ucwords(strtolower($this->m_reff->goField("wil_kabupaten","nama","where id_kab='".$id_kota."'")));
	//if(!$berlaku){ $berlaku=1; }
	/*------------------------*/
	$titleform="";
             
			$row = array();
	
			  if($nama )
			  {
				  $nama_lengkap=$nama;
				  $title="Nama ";
			  } 
    			$isi=" 			 
				<center>
    			<table class='table' style='text-align:left;color:black;font-weight:bold;width:70%'>";
				if($nama_lengkap){
    			// $isi.="<tr style='text-align:left'><td>".$title."</td><td>:</td><td> ".$nama_lengkap." </td></tr>";
    			$isi.="<tr style='text-align:left'><td colspan='3' align='center'> ".$nama_lengkap." </td></tr>";
				}
				 if($lembaga){
				 $isi.="<tr style='text-align:left'><td colspan='3'  align='center'>  ".$lembaga." </td></tr>";
				 }

				 if($prov){
				 $isi.="<tr style='text-align:left'><td colspan='3' align='center'> ".$prov." - ".$kota." </td></tr>";
				 }
				 if($blok){
				 $isi.="<tr style='text-align:left'><td>Blok </td><td>:</td><td> ".$blok." </td></tr>";
				 }
				 $isi.="<tr style='text-align:left'><td> Acara   </td><td>:</td><td>  ".$undangan." </td></tr>";
				 
			 
				$isi.="</table>";
		 

	if($sts!=2)
	{
					$isi="<center>	<div class='sadow' style='color:red'><h1 style='font-size:88px'>  UNDANGAN DICEKAL  </h1></div>
					<font size='6px'> ".$isi."</font> </div>";
			
			 $var["isi"]=$isi;
			$var["hasil"]="cekal";
	}else
	{
	
	
		if($sts=="2" and !$stscekin )
		{
				 
				
			
			 if($date==$ke)
			 {
				  
				 	$isi="<center>	<div class='sadow' style='color:green;font-size:88px'><h1 style='font-size:88px'>  SELAMAT DATANG  </h1></div>
				  <font size='6px'> ".$isi."</font> </div>";
					$var["hasil"]="ok";
					 $var["isi"]=$isi;
					$this->event->updateStatusPeserta($id,$date,$ke,"2");
			 }else{
				 
				
					$isi="<center>	<div class='sadow' style='color:red;font-size:88px'><h1 style='font-size:88px'>  MAAF !!!<br> SALAH ACARA  </h1></div>
					 
					<font size='6px'> ".$isi."</font> </div>";
				 
			 }
			 
			  $var["isi"]=$isi;
			 $var["hasil"]="ok";
			
		}else 
		{
			/*	if($data->konsep==1)
				 {
					 $isi="";
				 }else{
					$isi=$isi;
				 }
			 */
				$isi="<center><span><h1 style='color:red;font-size:88px' class='sadow'>  INVALID   </h1> 
				<p class='sadosw' style='font-size:35px;color:red'> <b> <span style='font-size:16px'>Telah dibarcode pukul</span>  ".substr($stscekin,10,9)."</b></p>
				 <font size='6px'> ".$isi."</font>  
			 
				</span>";
			
			 $var["isi"]=$isi;
			 $var["hasil"]="sudah";
		
		
			
		}
		
	}
	
 
}else
{
$isi="<div class='sadow'><center>
<h1 style='font-size:88px'><img width='100px' src='".base_url()."plug/img/warning.png'> <br> <font color='red'>".$id."  <br>TIDAK TERDAFTAR !!</h1> </font> </center></div>";
			 $var["isi"]=$isi;
			 $var["hasil"]="no";
}
echo json_encode($var);