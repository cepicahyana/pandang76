 

<style>
td{
    border-bottom:black solid 1px;
    font-size:20px;
    padding-top:10px;
}
</style>
<?php
date_default_timezone_set('Asia/Jakarta');
$id=trim($this->input->get_post("v")); 
$var["isi"]=array();
$var["hasil"]=array();
$acara		=	$this->session->userdata("acara");
if(!$acara)
{
	$this->m_reff->page403(); return false;
}


$isi="";
  $tglin=date("Y-m-d H:i:s");
if($tglin<=date("Y-m-d 12:00:00"))
{
	$date=1;
}else{
	$date=2;
};


 $this->db->where("(barcode1='".$id."' or barcode2='".$id."')"); 
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
 
 
 
 
 
 
 
//=========================== # =====================//

$undangan=isset($data->jenis)?($data->jenis):"";
if($undangan==1){ $undangan="Pagi"; }else{ $undangan="Sore"; }
$sstatus=isset($data->status)?($data->status):"";
if($data) //apakah peserta ada ?
{
			
			$isidata="";
			 

			/*------------------------*/

	 

	$nama=isset($data->nama)?($data->nama):"";
	$instansi=isset($data->instansi)?($data->instansi):"";
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
	
			 
				 
 
    			$isi=" 			 
				<center>
    			<table class='table' style='text-align:left;color:black;font-weight:bold;width:90%'>";
				if($nama){
    			// $isi.="<tr style='text-align:left'><td>".$title."</td><td>:</td><td> ".$nama_lengkap." </td></tr>";
    			$isi.="<tr style='text-align:center'><td   align='center'>  ".$nama."  </td></tr>";
				}
				 
				 if($instansi){
				 $isi.="<tr style='text-align:center'><td>  ".$instansi."  </td></tr>";
				 }
				 
				 if($kota){
				 $isi.="<tr style='text-align:center'><td>  ".$kota."  </td></tr>";
				 }
				  
			  if($blok){
				 $isi.="<tr style='text-align:center'><td>Blok :  ".$blok." </td></tr>";
				 }
				 $isi.="<tr style='text-align:center'><td> Acara  :  ".$undangan." </td></tr>";
				 
				$isi.="</table>";
		 

	if($sts!=2)
	{
					$isi="<center>	<div class='sadow' style='color:red'><h1 style='font-size:35px'>  UNDANGAN DICEKAL  </h1></div>
					<font size='6px'> ".$isi."</font> </div>";
		 
			 $var["isi"]=$isi;
			$var["hasil"]="cekal";
	}else
	{
	
	
		if($sts=="2" and !$stscekin )
		{
				 
				
			
			 if($date==$ke)
			 {
				  
				 	$isi="<center>	<div class='sadow' style='color:green;font-size:35px'><h1 style='font-size:40px'> ✓✓  TERVERIFIKASI  </h1></div>
				  <font size='6px'> ".$isi."</font> </div>";
				  
					$var["hasil"]="ok";
					 $var["isi"]=$isi;
					$this->event->updateStatusPeserta($id,$date,$ke,"2");
			 }else{
				 
				
					$isi="<center>	<div class='sadow' style='color:green;' ><h1 style='font-size:40px'  > MAAF !!!<br> SALAH ACARA  </h1></div>
					 
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
				$isi="<center><span><h1 style='color:red;font-size:40px' class='sadow'>  INVALID   </h1> 
				<p class='sados' style='font-size:35px;color:red;margin-top:-25px'> <b> <span style='font-size:16px'>Telah dibarcode pukul</span>  ".substr($stscekin,10,9)."</b></p>
				 <font size='6px'> ".$isi."</font>  
			 
				</span>";
				 
			
			 $var["isi"]=$isi;
			 $var["hasil"]="sudah";
		
		
			
		}
		
	}
	
 
}else
{
	$isi="<center>	<div class='sadow' style='color:red'><h1 style='font-size:35px'  > <br><br>".$id."<br>TIDAK TERDAFTAR  </h1></div>
					<font size='6px'> ".$isi."</font> </div>";
 
			 $var["isi"]=$isi;
			 $var["hasil"]="no";
}

echo br().$isi;
//=========================== # =====================//
 
 
  
?> 	 
 <br>
 <br>
 <br>
 <br>
 <br> <br>
 <br>		 
 <br>
<div class="btn-group" role="group" style="bottom:95;position:fixed;width:100%;margin-left:0px">
  <center>
       <a href='back' type="button" style="width:100%;min-height:200px;" class="  btn-lg bg-teal waves-effect">
       <img width='100px' src="<?php echo base_url()?>plug/img/scanicon.png">
       </a>
  </center> 
 
 </div>	    
 

 
 <script>
			yes();		 
function yes(){
					 	 
		var audio = new Audio("<?php  echo base_url()?>file_upload/sound/bel.mp3"); 
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
		  audio.play(); 
};

function no(){
		 
			 
							var audio = new Audio("<?php  echo base_url()?>file_upload/sound/beef.mp3");
					 
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
		  audio.play(); 
};


function cekal(){
		 
			 
							var audio = new Audio("<?php  echo base_url()?>file_upload/sound/alarm.mp3");
						 
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
		  audio.play(); 
};



						
						</script>

 