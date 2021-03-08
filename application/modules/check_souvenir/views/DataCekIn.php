
<?php
$var["isi"]="";
$var["hasil"]="";
$idadmin=$this->session->userdata("id");
$id=trim($this->input->post("ID"));
$tgl=$date=date('Y-m-d'); 
 

//$idform=$this->db->query("SELECT id_form from data_event where id_event='".$u."' ")->row();		
$this->db->where("kode",$id);


$tglin=date("Y-m-d H:i:s");
if($tglin<=date("Y-m-d 12:00:00"))
{
	$date=1;
}else{
	$date=2;
};



$cek=$this->db->get("data_persus");
$data=$cek->row();
 //   $sts=isset($data->sts_acc)?($data->sts_acc):"";
 
	 
 $kodbar		=	isset($data->kode)?($data->kode):"";
	  
$sstatus=isset($data->status)?($data->status):"";
if($data) //apakah peserta ada ?
{
			
			$isidata="";
			 

			/*------------------------*/

	 

	$sts=isset($data->diterima_oleh)?($data->diterima_oleh):"";
	$nama=isset($data->nama)?($data->nama):"";
	$vvip			=	$data->souvenir_1;
	$vip			=	$data->souvenir_2;
	$umum			=	$data->souvenir_3;
	$pagi			=	$data->jml_pagi;
	$sore			=	$data->jml_sore;
	/*------------------------*/
	$titleform="";
             
			$row = array();
	
			 
    			$isi='<table width="100%" style="font-size:30px" class="entry2">


						<tr>
						<td align="center">'.$data->nama.'</td>
						</tr>

						<tr>
						<td align="center">'.$data->instansi.'</td>
						</tr>

						<tr>
						<td align="center">VVIP : '.$vvip.'   </td>
						</tr>


						<tr>
						<td align="center">VIP : '.$vip.'   </td>
						</tr>


						<tr>
						<td align="center"> UMUM : '.$umum.'  </td>
						</tr>

						<tr>
						<td align="center"> Und.Pagi : '.$pagi.' | Und.Sore : '.$sore.'  </td>
						</tr>



						</table>';

		if(!$sts){		 
				  
			 	 $this->event->updateStatusPesertaSouvenir($id,$data->nama);
			 $isi.="</table>";
			 $var["isi"]=$isi;
			 $var["hasil"]="ok";
		}else{
				$isi="<div class='sadow'><center>
				<p style='font-size:28px'><img width='100px' src='".base_url()."plug/img/warning.png'> <br> <font color='red'>".$id."  <br>Sudah diterima !!<br>
				Oleh : ".$sts."<br>
			 ".$this->tanggal->hariLengkapJam($data->diterima_tgl,"/")." WIB<br></p> </font><br>
				</center></div>";
			 $var["isi"]=$isi;
			 $var["hasil"]="no";
		}
	 
	 
	
 
}else
{
$isi="<div class='sadow'><center>
<h1 style='font-size:88px'><img width='100px' src='".base_url()."plug/img/warning.png'> <br> <font color='red'>".$id."  <br>TIDAK TERDAFTAR !!</h1> </font> </center></div>";
			 $var["isi"]=$isi;
			 $var["hasil"]="no";
}
echo json_encode($var);