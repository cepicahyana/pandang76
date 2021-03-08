<?php
$var["isi"]="";
$var["hasil"]="";
$idadmin=$this->session->userdata("id");
$id=trim($this->input->post("ID"));
$tgl=$date=date('Y-m-d'); 
 

//$idform=$this->db->query("SELECT id_form from data_event where id_event='".$u."' ")->row();		
$this->db->where("barcode",$id);


$tglin=date("Y-m-d H:i:s");
 $date=1;
 



$cek			=	$this->db->get("data_peserta_rangkaian");
$data			=	$cek->row();
$sts			=	isset($data->sts_dispo)?($data->sts_dispo):"";
$id_acara		=	isset($data->jenis_permohonan)?($data->jenis_permohonan):"";
  
	$kodbar		=	isset($data->barcode)?($data->barcode):"";
	$stscekin	=	isset($data->cekin)?($data->cekin):""; 
	$acara		=	$this->m_reff->goField("tr_kategory","nama","where id='".$id_acara."'");
if($data) //apakah peserta ada ?
{
			
			$isidata="";
			 

			/*------------------------*/

	 

	$nama=isset($data->nama)?($data->nama):"";
	$lembaga=isset($data->instansi)?($data->instansi):""; 
	 
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
    			$isi.="<tr style='text-align:center'><td   align='center'> ".$nama_lengkap." </td></tr>";
				}
				 if($lembaga){
				 $isi.="<tr style='text-align:center'> <td> ".$lembaga." </td></tr>";
				 }
				if($acara){
				 $isi.="<tr style='text-align:center'> <td  > ".$acara." </td></tr>";
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
					$this->event->updateStatusPesertaAcara($id);
			 
			 
			  $var["isi"]=$isi;
			 $var["hasil"]="ok";
			
		}else 
		{
			 
				$isi="<center><span><h1 style='color:red;font-size:88px' class='sadow'>  MA'AF!!   </h1> 
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