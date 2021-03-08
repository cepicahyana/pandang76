<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends ci_Model
{
	 
	public function __construct() {
        parent::__construct();
		 
		 
     	}
		
		function get_peserta()
	{
		
		$this->_get_datatables_peserta();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	}
	private function _get_datatables_peserta()
	{	$filter		=	"";
	
		$jenis_acara	=	$this->input->get_post("jenis_acara");
		$dispo			=	$this->input->get_post("dispo");
		$distri			=	$this->input->get_post("distri");
		$prov			=	$this->input->get_post("prov");
		$kab			=	$this->input->get_post("kab");
		$suci			=	$this->input->get_post("suci");
		
		if($suci){ 
			$this->db->where("r_suci",$suci);
		}
		
		if($jenis_acara){ 
			$this->db->where("jenis_acara",$jenis_acara);
		}
		  
		if($dispo==1){ 
			$this->db->where("(blok1 IS NOT NULL or blok2 IS NOT NULL)");
		}elseif($dispo==2){
		 
			$this->db->where("(blok1 IS NULL and blok2 IS NULL)");
		}
		
		if($distri==1){
		 
				$this->db->where("diterima_oleh IS NOT NULL");
		}elseif($distri==2){
				$this->db->where("diterima_oleh IS NULL");
		} 
		
		if($prov){
			$this->db->where("id_provinsi",$prov);
		}
		if($kab){
			$this->db->where("id_kota",$kab);
		}
		$this->db->where("id_kategory",1);
		$this->db->where("sts_acc",0);
	 
	  
	
	if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"nik"=>$searchkey, 
				"kk"=>$searchkey, 
				"hp"=>$searchkey,
				"email"=>$searchkey, 
				"instansi"=>$searchkey, 
				"ket"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			}
		 
		$waktu=$this->input->post("waktu");
	 	if($waktu){ 
			 $this->db->where("jenis",$waktu);
		}
		$gate=$this->input->post("gate");
	 	if($gate){
		 
			 $this->db->where("gate",$gate);
		}
		 
		$status=$this->input->post("status");
		if($status!=null){
			$this->db->where("status",$status);
		}
		
		$blok=$this->input->post("blok");
		if($blok){ 
			$this->db->where("blok",$blok);
		}
	 
		 	 $this->db->order_by("id","asc");
			$query=$this->db->from("data_peserta");
		return $query;
	
	}
	
	public function count_file_peserta($tabel)
	{		
		
		$this->_get_datatables_peserta();
		return $this->db->get()->num_rows();
	}
	 
	
	/*--------------------------------------------------*/
	function get_persus()
	{
		
		$this->_get_datatables_persus();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	}
	private function _get_datatables_persus()
	{	$filter		=	"";
	
		$jenis_permohonan	=	$this->input->get_post("jenis_permohonan");
		$dispo				=	$this->input->get_post("dispo");
		$distri				=	$this->input->get_post("distri");
		 
		if($jenis_permohonan){
			 $this->db->where("jenis_permohonan",$jenis_permohonan); 
		}
		if($dispo){ 
			 $this->db->where("sts_dispo",$dispo); 
		}
		
		
		if($distri==1){ 
			 $this->db->where("diterima_oleh IS NOT NULL"); 
		}elseif($distri==2){ 
			 $this->db->where("diterima_oleh IS NULL"); 
		} 
		 $this->db->where("sts_dispo in(2,3)"); 
	 
	 if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"kode"=>$searchkey, 
				"hp"=>$searchkey,
				"email"=>$searchkey, 
				"ket"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				  
			}
			
		 
	$waktu=$this->input->post("waktu");
	 	if($waktu){
			  $this->db->where("jenis",$waktu); 
		}
		$gate=$this->input->post("gate");
	 	if($gate){ 
			 $this->db->where("gate",$gate); 
		}
		
	 
		$status=$this->input->post("status");
		if($status!=null){
			$this->db->where("status",$status); 
		}
		
		$blok=$this->input->post("blok");
		if($blok){
			$this->db->where("blok",$blok); 
		}
		
		 
	 	$this->db->order_by("id","asc");
		$query=$this->db->from("data_persus");
		return $query;
	
	
	}
	
	public function count_file_persus($tabel)
	{		
		
			 $this->_get_datatables_persus();
		return $this->db->get()->num_rows();
	}
	 
	
	/*--------------------------------------------------*/
	
	/*--------------------------------------------------*/
	function get_lainnya()
	{
		
		$this->_get_datatables_lainnya();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	}
	private function _get_datatables_lainnya()
	{	$filter		=	"";
	
		$jenis_permohonan	=	$this->input->get_post("jenis_permohonan");
		$dispo				=	$this->input->get_post("dispo");
		$distri				=	$this->input->get_post("distri");
		 
		if($jenis_permohonan){
			  
			$this->db->where("jenis_permohonan",$jenis_permohonan);
		}
		if($dispo){ 
			$this->db->where("sts_dispo",$dispo);
		}
		
		
			if($distri==1){ 
			 $this->db->where("diterima_oleh IS NOT NULL"); 
		}elseif($distri==2){ 
			 $this->db->where("diterima_oleh IS NULL"); 
		} 
		 
		 $this->db->where("sts_dispo in(2,3)"); 
	 
		 if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"kode"=>$searchkey, 
				"hp"=>$searchkey,
				"email"=>$searchkey, 
				"ket"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				  
			}
		
	$waktu=$this->input->post("waktu");
	 	if($waktu){
			  $this->db->where("jenis",$waktu); 
		}
		$gate=$this->input->post("gate");
	 	if($gate){ 
			 $this->db->where("gate",$gate); 
		}
	
	
	  
		$status=$this->input->post("status");
		if($status!=null){ 
			$this->db->where("status",$status);
		}
		
		$blok=$this->input->post("blok");
		if($blok){
			 $this->db->where("blok",$blok);
		}
		
		 
		$this->db->order_by("id","asc");
		$query=$this->db->from("data_rangkaian_acara");
		return $query;
	
	}
	
	public function count_file_lainnya()
	{		
		$this->_get_datatables_lainnya();
		return $this->db->get()->num_rows();
	}
	 
	
	/*--------------------------------------------------*/
	function setBlokPersus()
	{
		$kode		=	$this->input->get_post("kode");
		$acara		=	$this->input->get_post("acara");
		$blok		=	$this->input->get_post("blok"); 
		$jml		=	$this->input->get_post("jml");
		
		$data		=	$this->db->query("select * from data_persus where kode='".$kode."' ")->row();
		
		$data_awal=array(
		"kode_persus"=>$data->kode,
		"email"=>$data->email,
		"nama"=>$data->nama,
		"hp"=>$data->hp,
		//"instansi"=>$data->instansi,
		"id_kategory"=>$data->jenis_permohonan,
		//"ket"=>$data->ket,
	///////	"jml_pagi"=>$data->jml_pagi,
	//////	"jml_sore"=>$data->jml_sore, 
	///	"sts_acc"=>$data->sts_acc,
		"_cid"=>$this->idu(),
		"_ctime"=>date('Y-m-d H:i:s'),
		); 
		
		 
		
		 if($acara==1){
		     	$this->db->query("delete from data_peserta where kode_persus='".$kode."' and jenis_acara='1'
		 and   (blok1='".$blok."' or blok1 is null or blok1='' )");
			$jblok="blok1";
		 }else{
			 $jblok="blok2"; 
		     	$this->db->query("delete from data_peserta where kode_persus='".$kode."' and jenis_acara='2'
		  and (blok2='".$blok."' or blok2 is null or blok2='' )");
		 } 
	  // $this->db->query("delete from data_peserta where kode_persus='".$blok."' and ( blok1 is null and blok2 is null ) ");
		
		for($i=1;$i<=$jml;$i++)
		{   $nik	=	$this->m_reff->acak("16");
			$this->db->set($jblok,$blok);
			$this->db->set($data_awal);
			$this->db->set("nik",$nik);
			$this->db->set("jenis_acara",$acara); 
			$this->db->set("_cid",$this->idu());
			$this->db->set("_ctime",date('Y-m-d H:i:s'));
			$this->db->insert("data_peserta");
		}
		 
		return true;
	}
	function idu()
	{
		return $this->session->userdata("id");
	}
	
	function setStatus()
	{
		$kode	=	$this->input->post("kode");
		$sts	=	$this->input->post("sts");
		$this->db->set("sts_dispo",$sts);
		$this->db->where("kode",$kode);
		return $this->db->update("data_persus");
	}
	function setStsVerifikasi($id,$sts)
	{  
		$this->db->set("verifikator",$this->idu());
		$this->db->set("sts_verifikasi",$sts);
		$this->db->where("id",$id);
		return $this->db->update("data_peserta");
	}
	 
	function setTolak($id,$alasan,$suci)
	{
		/*$this->db->set("verifikator",$this->idu());
		$this->db->set("id_alasan",$alasan);
		$this->db->set("sts_verifikasi",2);
		$this->db->set("sts_acc",3);
		$this->db->where("id",$id);
		return $this->db->update("data_peserta");*/
		return $this->kirimEmail($id,$alasan,$suci);
	}
function kirimEmail($id,$id_alasan,$suci=null)
	{	 
	     $alasan =   $this->m_reff->goField("tm_alasan_penolakan","alasan","where id='".$id_alasan."' ");
	     
	     $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]="";
		                $this->db->where("id",$id);
		                $this->db->where("sts_acc!=",2);
		 $data     =    $this->db->get("data_peserta")->row();
		 $ok=0;$gagal=0;$dgagal="";
            
            $to     	 =   $data->email;//$this->m_reff->goField("data_peserta","email","where id='".$val."' ");  
			if($suci==1)
			{	 $isi    =   $this->isiEMailPenolakanSuci($data->nama,$data->nik,$alasan);
			}else{
				 $isi    =   $this->isiEMailPenolakan($data->nama,$data->nik,$alasan);
			}
			
			
            $subject=   "HUT-RI75 ISTANA NEGARA"; 
            
            $phone  =   $data->hp; 
			$sts    =   $this->m_reff->kirimEmail($to,$subject,$isi);   
			if($sts["sts"]=="ok"){
				if($suci==1)
				{	
					$isiWa  =   $this->isiWaPenolakanSuci($data->nama,$data->nik,$alasan); 
				}else{
					$isiWa  =   $this->isiWaPenolakan($data->nama,$data->nik,$alasan); 
				}
				$this->m_reff->kirimWa($phone,$isiWa);
				
				if($suci==1)
				{	
					$isiSms  =   $this->isiSmsPenolakanSuci($data->nama,$data->nik,$alasan); 
				}else{
					$isiSms  =   $this->isiSmsPenolakan($data->nama,$data->nik,$alasan); 
				}
				$this->m_reff->kirimSms($phone,$isiSms);
				
					$this->db->set("verifikator",$this->idu());
					$this->db->set("tgl_verifikasi",date('Y-m-d H:i:s'));
            		$this->db->set("id_alasan",$id_alasan);
            		$this->db->set("sts_verifikasi",2);
            		$this->db->set("sts_acc",3);
            		$this->db->where("sts_acc!=",2);
            		$this->db->where("id",$id);
                	$this->db->update("data_peserta");
				$ok++;
			}else{
				$gagal++;
				$dgagal.="<br>";
			}
        
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	
	
	
	function isiEMailPenolakanSuci($nama,$nik,$alasan)//isi email penolakan kecuali suci
	{
	    return    $isi='
    <table style="max-width:400px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE;">
    <img  style="border-top-left-radius:15px;border-top-right-radius:15px" src="'.$this->m_reff->tm_pengaturan(35).'/plug/img/banner1.jpg" width="100%"   alt="E-receipt"  class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 1; left: 745px; top: 101px;"><div id=":rt" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
     <center>
     <span style="font-size:13"><b>  HUT RI-75 ISTANA NEGARA </b></span><br>
     <span style="font-size:13;color:#1572E8"><b>Status Permohonan : Hanya Renungan Suci </b></span>
     <hr width="90%">
     </center>
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;padding:10px"> 
    Kepada Yth:<br>
    Bapak/Ibu/Saudara :'.$nama.' <br>
    NIK / nomor identitas :'.$nik.' <br>
    Mohon maaf permohonan undangan anda untuk mengikuti Upacara HUT RI-75 di Istana Negara tidak kami setujui dengan alasan :<br>
    <b>'.$alasan.'</b><br>
	Adapun permohonan anda yang kami setujui hanya <b><u>Undangan Renungan Suci</u></b>.<br>
	Untuk informasi pengambilan undangan renungan suci akan kami informasikan kembali melalui email & whatsapp anda.<br>
     Terimakasih atas.
    </td> <td style="background-color:#EEE"> 
    </td>
    </tr>
   
    </table>
    
    
    ';
	}
	
	function isiEMailPenolakan($nama,$nik,$alasan)
	{
	    return    $isi='
    <table style="max-width:400px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE;">
    <img  style="border-top-left-radius:15px;border-top-right-radius:15px" src="'.$this->m_reff->tm_pengaturan(35).'/plug/img/banner1.jpg" width="100%"   alt="E-receipt"  class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 1; left: 745px; top: 101px;"><div id=":rt" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
     <center>
     <span style="font-size:13"><b>  HUT RI-75 ISTANA NEGARA </b></span><br>
     <span style="font-size:13;color:#1572E8"><b>Status permohonan : tidak disetujui </b></span>
     <hr width="90%">
     </center>
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;padding:10px"> 
    Kepada Yth:<br>
    Bapak/Ibu/Saudara :'.$nama.' <br>
    NIK / nomor identitas :'.$nik.' <br>
    Mohon maaf permohonan undangan anda untuk mengikuti acara HUT RI-75 di Istana Negara tidak kami setujui dengan alasan :<br>
    <b>'.$alasan.'</b><br>
     Terimakasih atas partisipasi anda.
    </td> <td style="background-color:#EEE"> 
    </td>
    </tr>
   
    </table>
    
    
    ';
	}
	
	function isiWaPenolakan($nama,$nik,$alasan)
	{
	      $isi=$this->m_reff->tm_pengaturan(8);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{nik}',$nik,$isi);
        $isi=str_replace('{alasan}',$alasan,$isi); 
        return $isi;
	}
	
	function isiWaPenolakanSuci($nama,$nik,$alasan)
	{
	      $isi=$this->m_reff->tm_pengaturan(27);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{nik}',$nik,$isi);
        $isi=str_replace('{alasan}',$alasan,$isi); 
        return $isi;
	}
	function isiSmsPenolakan($nama,$nik,$alasan)
	{
	      $isi=$this->m_reff->tm_pengaturan(10);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{nik}',$nik,$isi);
        $isi=str_replace('{alasan}',$alasan,$isi); 
        return $isi;
	}
	
	function isiSmsPenolakanSuci($nama,$nik,$alasan)
	{
	      $isi=$this->m_reff->tm_pengaturan(28);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{nik}',$nik,$isi);
        $isi=str_replace('{alasan}',$alasan,$isi); 
        return $isi;
	}
	
	
	//=====================PENOLAKAN UNDANGAN HANYA SUCI============================//
	function setTolakSuci($id,$alasan,$suci)
	{ 
		return $this->kirimEmailTolakSuci($id,$alasan,$suci);
	}
	
	
function kirimEmailTolakSuci($id,$id_alasan,$suci=null)
	{	 
		 $sts_suci =	 $this->m_reff->goField("data_peserta","sts_suci","where id='".$id."' ");	
		 if($sts_suci==1)
		 {
					$this->db->set("verifikator",$this->idu());
					$this->db->set("tgl_verifikasi",date('Y-m-d H:i:s')); 
            		$this->db->set("sts_verifikasi",2);
            		$this->db->set("sts_acc",2); 
            		$this->db->where("id",$id);
                	return $this->db->update("data_peserta");
		 }
		 
	     $alasan   =  $this->m_reff->goField("tm_alasan_penolakan","alasan","where id='".$id_alasan."' ");
	     
	     $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]="";
		                $this->db->where("id",$id);
		               
		 $data     =    $this->db->get("data_peserta")->row();
		 $ok=0;$gagal=0;$dgagal="";
            
            $to     	 =   $data->email;//$this->m_reff->goField("data_peserta","email","where id='".$val."' ");  
			$isi    =   $this->isiEMailPenolakanHanyaSuci($data->nama,$data->nik,$alasan);
			 
            $subject=   "HUT-RI75 ISTANA NEGARA"; 
            
            $phone  =   $data->hp; 
			$sts    =   $this->m_reff->kirimEmail($to,$subject,$isi);   
			if($sts["sts"]=="ok"){
				 	
				 $isiWa  =   $this->isiWaPenolakanHanyaSuci($data->nama,$data->nik,$alasan); 
				 
				$this->m_reff->kirimWa($phone,$isiWa);
				
				 
					$isiSms  =   $this->isiSmsPenolakanHanyaSuci($data->nama,$data->nik,$alasan); 
				 
				$this->m_reff->kirimSms($phone,$isiSms);
				
					$this->db->set("verifikator",$this->idu());
					$this->db->set("tgl_verifikasi",date('Y-m-d H:i:s'));
            		$this->db->set("id_alasan",$id_alasan);
            		$this->db->set("sts_verifikasi",2);
            		$this->db->set("sts_acc",3);
            		$this->db->where("sts_acc!=",2);
            		$this->db->where("id",$id);
                	$this->db->update("data_peserta");
				$ok++;
			}else{
				$gagal++;
				$dgagal.="<br>";
			}
        
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	
	
	
	function isiEMailPenolakanHanyaSuci($nama,$nik,$alasan)
	{
	    return    $isi='
    <table style="max-width:400px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE;">
    <img  style="border-top-left-radius:15px;border-top-right-radius:15px" src="'.$this->m_reff->tm_pengaturan(35).'/plug/img/banner1.jpg" width="100%"   alt="E-receipt"  class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 1; left: 745px; top: 101px;"><div id=":rt" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
     <center>
     <span style="font-size:13"><b>  HUT RI-75 ISTANA NEGARA </b></span><br>
     <span style="font-size:13;color:#1572E8"><b>Status permohonan : tidak disetujui </b></span>
     <hr width="90%">
     </center>
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;padding:10px"> 
    Kepada Yth:<br>
    Bapak/Ibu/Saudara :'.$nama.' <br>
    NIK / nomor identitas :'.$nik.' <br>
    Mohon maaf permohonan anda untuk mengikuti acara renungan suci HUT RI-75 di Istana Negara tidak kami setujui dengan alasan :<br>
    <b>'.$alasan.'</b><br>
     Terimakasih atas partisipasi anda.
    </td> <td style="background-color:#EEE"> 
    </td>
    </tr>
   
    </table>
    
    
    ';
	}
	
	function isiWaPenolakanHanyaSuci($nama,$nik,$alasan)
	{
	      $isi=$this->m_reff->tm_pengaturan(29);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{nik}',$nik,$isi);
        $isi=str_replace('{alasan}',$alasan,$isi); 
        return $isi;
	}function isiSmsPenolakanHanyaSuci($nama,$nik,$alasan)
	{
	      $isi=$this->m_reff->tm_pengaturan(30);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{nik}',$nik,$isi);
        $isi=str_replace('{alasan}',$alasan,$isi); 
        return $isi;
	}
	
	//=====================END PENOLAKAN UNDANGAN HANYA SUCI============================//
	
	
	function autoDispo()
	{
		$data=$this->db->query("SELECT * FROM v_blok  WHERE peruntukan=1 AND jenis=1 ORDER BY jml,nama ASC")->row();
		$var["blok1"]=isset($data->id)?($data->id):"";
		$data=$this->db->query("SELECT * FROM v_blok  WHERE peruntukan=1 AND jenis=2 ORDER BY jml,nama ASC")->row();
		$var["blok2"]=isset($data->id)?($data->id):"";
		return $var;
	}
	
	function setStsAcc($id,$sts)
	{   $this->db->set("verifikator",$this->idu());
	    $this->db->set("tgl_verifikasi",date('Y-m-d'));
		$this->db->set("sts_verifikasi",2);
		$this->db->set("sts_acc",2);
		$this->db->set("jenis_acara",$sts);
		
		$dispo	=	$this->mdl->autoDispo();
		if($sts==1)
		{	$this->db->set("blok1",$dispo["blok1"]);
			$this->db->set("blok2",null);
		}elseif($sts==2)
		{	$this->db->set("blok2",$dispo["blok2"]);
			$this->db->set("blok1",null);
		}else{
			$this->db->set("blok1",$dispo["blok1"]);
			$this->db->set("blok2",$dispo["blok2"]);
		}
		if(!$dispo["blok1"] and !$dispo["blok2"]){	return false;	}
		$this->db->where("id",$id);
		return $this->db->update("data_peserta");
	}function setStsAccSuci($id,$sts)
	{   
		$only = $this->input->get_post("only");
		if($only)
		{
			$this->db->set("verifikator",$this->idu());
			$this->db->set("tgl_verifikasi",date('Y-m-d'));
			$this->db->set("sts_verifikasi",2);
			$this->db->set("sts_acc",$sts);
		}
		$this->db->set("sts_suci",$sts); 
		$this->db->where("id",$id);
		return $this->db->update("data_peserta");
	}
	function getProvByNik($idProv)
	{		$this->db->where("sts_acc!=",3);
		$this->db->select("sum(jml_undangan) as jml");
	//	$this->db->where("SUBSTR(nik,1,2)",substr($nik,0,2));
		$this->db->where("id_provinsi",$idProv);
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):"0";
	}function getKabByNik($id_kota)
	{		$this->db->where("sts_acc!=",3);
	 	$this->db->select("sum(jml_undangan) as jml");
		$this->db->where("id_kota",$id_kota);
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):"0";
	}
	function clearVerification()
	{
		$this->db->set("sts_verifikasi",0);
		$this->db->set("verifikator",null);
		$this->db->where("sts_verifikasi",1);
		$this->db->where("verifikator",$this->mdl->idu());
		return $data=$this->db->update("data_peserta");
	}
}

?>