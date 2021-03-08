<?php
$var["isi"]="";
$var["hasil"]="";
$idadmin=$this->session->userdata("id");
$id=trim($this->input->post("ID"));
$tgl=$date=date('Y-m-d'); 
 

//$idform=$this->db->query("SELECT id_form from data_event where id_event='".$u."' ")->row();		
$this->db->where("barcode3='".$id."'");


$tglin=date("Y-m-d H:i:s");
 $date=1;
 



$cek=$this->db->get("data_peserta");
$data=$cek->row();
$sts=isset($data->sts_suci)?($data->sts_suci):"";
  
	$kodbar		=	isset($data->barcode3)?($data->barcode3):"";
	$stscekin	=	isset($data->cekin3)?($data->cekin3):""; 
	 
if($data) //apakah peserta ada ?
{
			
			$isidata="";
			 

			/*------------------------*/

	 

	$nama=isset($data->nama)?($data->nama):"";
	$lembaga=isset($data->instansi)?($data->instansi):"";
	 
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
    			$isi.="<tr style='text-align:left'><td  align='center'> ".$nama_lengkap." </td></tr>";
				}
				 if($lembaga){
				 $isi.="<tr style='text-align:left'> <td  align='center'> ".$lembaga." </td></tr>";
				 }

				 if($prov){
				 $isi.="<tr style='text-align:left'><td align='center'> ".$prov." - ".$kota." </td></tr>";
				 }
				 
				 
				 
			 
				$isi.="</table>";
		 

	if($sts!=1)
	{
					$isi="<center>	<div class='sadow' style='color:red'><h1 style='font-size:88px'>  UNDANGAN DICEKAL  </h1></div>
					<font size='6px'> ".$isi."</font> </div>";
			
			 $var["isi"]=$isi;
			$var["hasil"]="cekal";
	}else
	{
	
	
		if($sts=="1" and !$stscekin )
		{
			 
				  
				 	$isi="<center>	<div class='sadow' style='color:green;font-size:88px'><h1 style='font-size:88px'>  SELAMAT DATANG  </h1></div>
				  <font size='6px'> ".$isi."</font> </div>";
					$var["hasil"]="ok";
					 $var["isi"]=$isi;
					$this->event->updateStatusPesertaSuci($id);
			 
			 
			  $var["isi"]=$isi;
			 $var["hasil"]="ok";
			
		}else 
		{
			 
				$isi="<center><span><h1 style='color:red;font-size:88px' class='sadow'>  MA'AF !!   </h1> 
				<p class='sadosw' style='font-size:35px;color:red'> <b> <span style='font-size:16px'>Telah masuk pukul</span>  ".substr($stscekin,10,9)."</b></p>
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