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
  

 $this->db->where("barcode",$id); 
$cek=$this->db->get("data_peserta_rangkaian");
$data=$cek->row();

 
$cekposisi=isset($data->barcode)?($data->barcode):""; /////cek kode barko
$sts=true;
 
	$ke="1"; 
	$kodbar		=	isset($data->barcode)?($data->barcode):"";
	$stscekin	=	isset($data->cekin)?($data->cekin):"";
	$id_blok	=	"";
	 
 
 
//=========================== # =====================//

 $undangan	=	isset($data->jenis_permohonan)?($data->jenis_permohonan):"";
 $undangan	=	$this->m_reff->goField("tr_kategory","nama","where id='".$undangan."' ");
 
 
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
				 
				 if($undangan){
				 $isi.="<tr style='text-align:center'><td>  ".$undangan."  </td></tr>";
				 }
				  
			   
				$isi.="</table>";
		 
 
	
	
		if(!$stscekin )
		{
				 
			   
				 	$isi="<center>	<div class='sadow' style='color:green;font-size:30px'><h1 style='font-size:35px'> ✓✓  TERVERIFIKASI  </h1></div>
				  <font size='6px'> ".$isi."</font> </div>";
					$var["hasil"]="ok";
					 $var["isi"]=$isi;
					$this->event->updateStatusPesertaAcara($id);
			   
			
		}else 
		{
			/*	if($data->konsep==1)
				 {
					 $isi="";
				 }else{
					$isi=$isi;
				 }
			 */
				$isi="<center><span><h1 style='color:red;font-size:40px' class='sadow'>  MA'AF!!   </h1> 
				<p class='sados' style='font-size:35px;color:red;margin-top:-25px'> <b> <span style='font-size:16px'>Telah masuk pukul</span>  ".substr($stscekin,10,9)."</b></p>
				 <font size='6px'> ".$isi."</font>  
			 
				</span>";
			
			 $var["isi"]=$isi;
			 $var["hasil"]="sudah";
		
		
			
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
 
 