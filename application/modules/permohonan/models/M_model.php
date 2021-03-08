<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends ci_Model
{
	 
	public function __construct() {
        parent::__construct();
		 
		 
     	}
	function updatePesertaLabel($in)
	{
			   $this->db->set("jadwal_distribusi","0000-00-00");
			   $this->db->where_in("id",$in); 
		return $this->db->update("data_persus");
	}
		function get_peserta()
	{
		 $this->_get_datatables_peserta();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
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


	public function update_peserta_online(){
		$id = $_POST["id"];

		$f = $_POST["f"];

		$this->db->where('id', $id);
		return $this->db->update('data_peserta', $f);
	}

	public function delete_peserta_online(){
		$id = $_POST["id"];

		$this->db->where("id", $id);
		return $this->db->delete('data_peserta');
	}

	public function update_peserta_persus(){
		$kode	= $this->input->post("kode"); 
		$id 	= $this->input->post("id"); 
		$f  	= $this->input->post("f"); 
		if(!$f){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
		$this->db->where('id', $id); 
		$this->db->update('data_persus', $f);
		
		$array=array(
		"nama"=>$this->input->post("f[nama]"),
		"ket"=>$this->input->post("f[ket]"),
		"instansi"=>$this->input->post("f[instansi]"),
		"hp"=>$this->input->post("f[hp]"),
		"email"=>$this->input->post("f[email]"),
		);
		$this->db->where('kode_persus', $kode); 
		return $this->db->update("data_peserta",$array);
	}
	public function update_peserta_lainnya(){
		$kode	= $this->input->post("kode"); 
		$id 	= $this->input->post("id"); 
		$f  	= $this->input->post("f"); 
if(!$f){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
		$this->db->where('id', $id);
		$this->db->update('data_rangkaian_acara', $f);
		
		$array=array(
		"nama"=>$this->input->post("f[nama]"),
		"ket"=>$this->input->post("f[ket]"),
		"instansi"=>$this->input->post("f[instansi]"),
		"hp"=>$this->input->post("f[hp]"),
		"email"=>$this->input->post("f[email]"),
		);
		$this->db->where('kode_rangkaian', $kode); 
		return $this->db->update("data_peserta_rangkaian",$array);
	}	
	
	public function update_peserta_suci(){
		$kode	= $this->input->post("kode"); 
		$id 	= $this->input->post("id"); 
		$f  	= $this->input->post("f"); 
if(!$f){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
		$this->db->where('id', $id);
		$this->db->update('data_rangkaian_acara', $f);
		
		$array=array(
		"nama"=>$this->input->post("f[nama]"),
		"ket"=>$this->input->post("f[ket]"),
		"instansi"=>$this->input->post("f[instansi]"),
		"hp"=>$this->input->post("f[hp]"),
		"email"=>$this->input->post("f[email]"),
		);
		$this->db->where('kode_persus', $kode); 
		return $this->db->update("data_peserta",$array);
	}

	public function delete_peserta_persus(){
		$id 	= $this->input->post("id");
		$kode	= $this->m_reff->goField("data_persus","kode","where id='".$id."' ");
		$this->db->where("id", $id);
		$this->db->delete('data_persus');
		
		
		return $this->db->query('delete from data_peserta where kode_persus="'.$kode.'" ');
	}
	
	public function delete_peserta_lainnya(){
		$id 	= $this->input->post("id");
		$kode	= $this->m_reff->goField("data_rangkaian_acara","kode","where id='".$id."' ");
		$this->db->where("id", $id);
		$this->db->delete('data_rangkaian_acara');
		
		
		return $this->db->query('delete from data_peserta_rangkaian where kode_rangkaian="'.$kode.'" ');
	}

	private function _get_datatables_peserta()
	{	$filter		=	"";
	
		$jenis_acara	=	$this->input->get_post("jenis_acara");
		$dispo			=	$this->input->get_post("dispo");
		$distri			=	$this->input->get_post("distri");
		$prov			=	$this->input->get_post("prov");
		$kab			=	$this->input->get_post("kab");
		$fjadwal		=	$this->input->get_post("fjadwal");
		$fdis			=	$this->input->get_post("fdis");
		$facara			=	$this->input->get_post("facara");
		$fblok			=	$this->input->get_post("fblok");
		$tgl            =   date('Y-m-d');
		
		if($facara==1)
		{
			  $this->db->where("r_suci",1);
		} 
		if($fblok)
		{
			 
			  $query_blok=array(
			 "blok1"=>$fblok,
			 "blok2"=>$fblok,
			 );
			 $this->db->group_start()
                        ->or_where($query_blok)
                ->group_end();
		} 
		
		
		if($fjadwal==1)
		{ 
			 $this->db->where("jadwal_distribusi IS NULL ");
		}elseif($fjadwal==2)
		{
			 $this->db->where("jadwal_distribusi IS NOT NULL ");
		}
		
		if($jenis_acara){
			  
			// $this->db->where("(jenis_acara=".$jenis_acara." or jenis_acara=3) ");
			 $query_jenis=array(
			 "jenis_acara"=>$jenis_acara,
			 "jenis_acara"=>3,
			 );
			 $this->db->group_start()
                        ->or_where($query_jenis)
                ->group_end();
		}
		if($dispo==1){
			 
			 $this->db->where("(blok1 IS NOT NULL or blok2 IS NOT NULL)");
		}elseif($dispo==2){ 
			 $this->db->where("(blok1 IS NULL and blok2 IS NULL)");
		}
		if($distri==1){ 
			 $this->db->where("diterima_oleh IS NOT NULL");
		}elseif($distri==2){
		 	   $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".date('Y-m-d')."')");
		 }elseif($distri==3){ 
			 $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,1)."')");
		}elseif($distri==4){ 
			 $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,2)."')");
		}elseif($distri==5){
			  $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,3)."')");
		}elseif($distri==6){ 
			  $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi<='".$this->tanggal->minTgl($tgl,4)."')");
		}
		
		
		
		
		if($fdis==1){ 
			 $this->db->where("hps",1);
		}elseif($fdis==2){ 
			 $this->db->where("hps is null");
		}elseif($fdis==3){ 
			$this->db->where("(sts_acc=3 and sts_suci=2)");
		}
		
		if($prov){ 
			 $this->db->where("id_provinsi",$prov);
		}
		if($kab){ 
			 $this->db->where("id_kota",$kab);
		}
		 $this->db->where("id_kategory",1);
		 
	
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"nik"=>$searchkey, 
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
			$query=$this->db->from("data_peserta");
		return $query;
			 
		   
	}
	
	public function count_file_peserta()
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
		$fqr				=	$this->input->get_post("fqr");
		$fpengiriman		=	$this->input->get_post("fpengiriman");
		$tgl          		=   date('Y-m-d');
		$mode				=	$this->m_reff->tm_pengaturan(39);
		
		
		
		$notif				=	$this->input->get_post("notif");
		if($notif==1)
		{
			 $this->db->where("jadwal_distribusi",null);
		}elseif($notif==2)
		{
			 $this->db->where("jadwal_distribusi IS NOT NULL and jadwal_distribusi!='0000-00-00'");
		}elseif($notif==3)
		{
			 $this->db->where("jadwal_distribusi","0000-00-00");
		}
		
		
		
		
		
		
		
		
		
		if($fpengiriman){
			 $this->db->where("pengiriman",$fpengiriman); 
		} 
		if($jenis_permohonan){
			 $this->db->where("jenis_permohonan",$jenis_permohonan); 
		}
		if($dispo){ 
			 $this->db->where("sts_dispo",$dispo); 
		}
		
		
		if($mode==2)
		{
			if($distri==1){ 
			 $this->db->where("diterima_oleh IS NOT NULL");
			}elseif($distri==2){
				   $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".date('Y-m-d')."')");
			 }elseif($distri==3){ 
				 $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,1)."')");
			}elseif($distri==4){ 
				 $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,2)."')");
			}elseif($distri==5){
				  $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,3)."')");
			}elseif($distri==6){ 
				  $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi<='".$this->tanggal->minTgl($tgl,4)."')");
			}
		
		}else{
			if($distri==1){ 
				 $this->db->where("diterima_oleh IS NOT NULL"); 
			}elseif($distri==2){ 
				 $this->db->where("diterima_oleh IS NULL"); 
			} 
		}
		
		
		 
		if($fqr==1){ 
			$this->db->where("sts_qrcode",1); 
		}elseif($fqr==2){ 
			$this->db->where("sts_qrcode",2); 
		} 
		  
	
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
	
	public function count_file_persus()
	{		
		
		 $this->_get_datatables_persus();
		return $this->db->get()->num_rows();
	}
	 
	
	/*--------------------------------------------------*/	/*--------------------------------------------------*/
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
		$fqr				=	$this->input->get_post("fqr");
		 
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
		 
		if($fqr==1){ 
			$this->db->where("sts_qrcode",1); 
		}elseif($fqr==2){ 
			$this->db->where("sts_qrcode",2); 
		} 
		
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
		 "instansi"=>$data->instansi,
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
	}/*--------------------------------------------------*/
	function setBlokPersusSouvenir()
	{
		$kode		=	$this->input->get_post("kode");
		$field		=	$this->input->get_post("field");
	 
		$jml		=	$this->input->get_post("jml");
		 
				$this->db->set($field,$jml);  
				$this->db->where("kode",$kode);  
		return	$this->db->update("data_persus");
	 
	}
	function idu()
	{
		$this->session->userdata("id");
	}
	
	function setStatus()
	{
		$kode	=	$this->input->post("kode");
		$sts	=	$this->input->post("sts");
		$this->db->set("sts_dispo",$sts);
		$this->db->where("kode",$kode);
		return $this->db->update("data_persus");
	}
	function setStatusLainnya()
	{
		$kode	=	$this->input->post("kode");
		$sts	=	$this->input->post("sts");
		$this->db->set("sts_dispo",$sts);
		$this->db->where("kode",$kode);
		$this->db->update("data_rangkaian_acara");
		 
		$this->db->set("sts_dispo",$sts);
		$this->db->where("kode_rangkaian",$kode);
		return $this->db->update("data_peserta_rangkaian");
	}function setStatusSuci()
	{
		$kode	=	$this->input->post("kode");
		$sts	=	$this->input->post("sts");
		$this->db->set("sts_dispo",$sts);
		$this->db->where("kode",$kode);
		$this->db->update("data_rangkaian_acara");
		if($sts==3)
		{
			$sts=1;
			$this->db->set("sts_verifikasi",0);
			$this->db->set("sts_suci",null);
		}
		if($sts==1)
		{
			$sts=2;
			$this->db->set("sts_verifikasi",2);
			$this->db->set("sts_suci",1);
		}
		$this->db->set("sts_acc",$sts);
		$this->db->set("verifikator",$this->idu());
		
		$this->db->set("tgl_verifikasi",date('Y-m-d H:i:s'));
		$this->db->where("kode_persus",$kode);
		return $this->db->update("data_peserta");
	}
	function hapus_cek()
	{
	    $id =   $this->input->post("id");
	    $in =   $this->m_reff->clearkomaray($id);
		//$this->kirim_notif_dis($in);
	    $this->db->where("diterima_oleh",null);
	    $this->db->where_in("id",$in);
	    $this->db->set("hps",1);
	 return   $this->db->update("data_peserta");
	}
	 
	function setBroadcast()
	{
	    $id				=	$this->input->get_post("id");//id
	 
		$id_pemohon		=	$this->m_reff->clearkomaray($id); 
		return $this->kirimEmail($id_pemohon); 
	}
		function kirimEmail($id_pemohon)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]=""; 
		 $ok=0;$gagal=0;$dgagal="";
        foreach($id_pemohon as $val)
        {              
                        $this->db->where("id",$val);
                        $this->db->where("sts_acc",2);
                        $this->db->where("jadwal_distribusi IS NOT NULL");
                        $this->db->where("diterima_oleh IS NULL"); 
            $val    =   $this->db->get("data_peserta")->row();
            $to     =   $val->email;
            $isi    =   $this->isiEMail($val);
            $subject=   "Bukti Pengambilan Undangan"; 
            $tgl    =   $val->jadwal_distribusi;
            $phone  =   $val->hp;
            $path   =   $this->mdl->genUndangan($val); 
            $isiWa  =   $this->isiWa($val); 
                        
                        
            $isiSms =   $this->isiSms($val);
                        
			$sts    =   $this->m_reff->kirimEmail($to,$subject,$isi,$path,"Bukti Pengambilan Undangan HUT RI-75.pdf","delete");   
    		
			if($sts["sts"]=="ok"){
				$this->db->set("sts_notif",1);
				$this->db->set("sts_acc",2);
				$this->db->set("jadwal_distribusi",$tgl);
				$this->db->where("diterima_tgl",null);
				$this->db->where("email",$val->email);
				$this->db->update("data_peserta");
				$ok++;
				
				$this->m_reff->kirimSms($phone,$isiSms);
				$this->m_reff->kirimWa($phone,$isiWa);
				//$this->m_reff->kirimWa($phone,"Bukti Pengambilan Undangan",base_url().$path);
				
				
			}else{
				$gagal++;
				$dgagal.=$val->email."<br>";
			}
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	 
	function setBroadcastPersus()
	{
	    $id				=	$this->input->get_post("id");//id
	 
		$id_pemohon		=	$this->m_reff->clearkomaray($id); 
		return $this->kirimEmailSouvenir($id_pemohon);
	}
	
	 
	 
	function kirimEmailSouvenir($id_pemohon)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]="";
		 $id     =   $this->input->get_post("id"); 
         $data   =   $this->m_reff->clearkomaray($id);
		 $ok=0;$gagal=0;$dgagal="";
        foreach($id_pemohon as $val)
        {    
                        $this->db->where("kode",$val); 
						$this->db->where("jadwal_distribusi IS NOT NULL");
						$this->db->where("jadwal_distribusi!=","0000-00-00");
                        $this->db->where("diterima_oleh IS NULL"); 
            $data    =  $this->db->get("data_persus")->row();
        if($data){   
            
											$tgl	=	$data->jadwal_distribusi;
											$to     =   $data->email; 
											$isi    =   $this->isiEMailSouvenir($data,$tgl);
											$subject=   "Bukti Pengambilan Souvenir";  
											$phone  =   $data->hp;
											$path   =   null;//$this->mdl->genUndanganSouvenir($data,$tgl); 
											$isiWa  =   $this->isiWaSouvenir($data,$tgl); 
														
										   // $isiSms =   $this->isiSmsSouvenir($tgl);
													  
											$sts    =   $this->m_reff->kirimEmail($to,$subject,$isi,$path,"","");   
											
											if($sts["sts"]=="ok"){
													//	$this->m_reff->kirimSms($phone,$isiSms);
														$this->m_reff->kirimWa($phone,$isiWa);
													   /// $this->m_reff->kirimWa($phone,"Bukti Pengambilan souvenir",base_url().$path); 
														
												$ok++;
											}else{
												$gagal++;
												$dgagal.=$data->email."<br>";
											}
	 
			
        }//end if cek ketersediaan data	
			
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	
	
	 function isiWaSouvenir($data,$tgl)
    {
        
        $kode        =   $data->kode;
		$this->m_reff->qr($kode);
        $nama        =   $data->nama;
        $email       =   $data->email;
        $hp      	 =   $data->hp;
        $instansi    =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
        $this->m_reff->qr($kode);
        
        $blok_pagi  =   $data->jml_pagi;
        $blok_sore  =   $data->jml_sore;
	 
		$vvip	   =	 $data->souvenir_1;
		$vip	   =	 $data->souvenir_2;
		$umum	   =	 $data->souvenir_3;
		
		
		$pos1="";
		$pos2="";
		$pos3="";
		$pos4="";
		$pos5="";
		$pos6="";
		$perolehan	=		"";
		if($blok_pagi)
		{
				$perolehan.=	' - Acara Penaikan Bendera : '.$blok_pagi."\n";
			 
		}
		if($blok_sore)
		{
			$perolehan.=	' - Acara Penurunan Bendera : '.$blok_sore."\n";
		 
		}
		if($vvip)
		{
			$perolehan.=	' - Souvenir VVIP : '.$vvip."\n";
		 
		}
		if($vip)
		{
			$perolehan.=	' - Souvenir VIP : '.$vip."\n"; 
		 
		}if($umum)
		{
			$perolehan.=	' - Souvenir UMUM : '.$umum."\n"; 
		 
		}
		 
		 
		 
		$icon2="📍";
		$icon1="🏛";
	 
        $isi=$this->m_reff->tm_pengaturan(41);
        $isi=str_replace('{perolehan}',$perolehan,$isi);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{email}',$email,$isi);
        $isi=str_replace('{hp}',$hp,$isi);
      //  $isi=str_replace('{acara_penaikan}',$pos1,$isi);
      //  $isi=str_replace('{acara_penurunan}',$pos2,$isi);
      //  $isi=str_replace('{vvip}',$pos3,$isi);
      //  $isi=str_replace('{vip}',$pos4,$isi);
      //  $isi=str_replace('{umum}',$pos5,$isi);
        $isi=str_replace('{kode}',$kode,$isi);
        $isi=str_replace('{waktu_pengambilan}',$tgl_ambil,$isi); 
        $isi=str_replace('{icon2}',$icon2,$isi);
        $isi=str_replace('{icon1}',$icon1,$isi);
        return $isi;
    }
	
	
	
	
	
	
	
	
	
	
	 function isiEMailSouvenir($data,$tgl)
    {
        
        $kode         =   $data->kode;
		$this->m_reff->qr($kode);
        $nama        =   $data->nama;
        $email       =   $data->email;
        $hp		     =   $data->hp;
        $instansi    =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
         
        $pagi		  	=   $data->jml_pagi;
        $sore		  	=   $data->jml_sore;
		$vvip		  	=   $data->souvenir_1;
		$vip		  	=   $data->souvenir_2;
        $umum		  	=   $data->souvenir_3;
		$und			=	"";
		
		$isi_info		=	"";
		$template		=	$this->m_reff->tm_pengaturan(40);
		$template		=	str_replace("{tgl_ambil}",$tgl_ambil,$template);
		 
		if($pagi)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black"> '.$pagi.' Undangan Penaikan Bendera </span> <br> ';
		}
		if($sore)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black"> '.$sore.' Undangan Penurunan Bendera  </span> <br>';
		}
		if($vvip)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black">'.$vvip.'   Souvenir VVIP  </span> <br>';
		}if($vip)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black"> '.$vip.'   Souvenir VIP  </span> <br>';
		}if($umum)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black"> '.$umum.'   Souvenir UMUM  </span> <br>';
		}
        
    return    $isi='
    <table style="max-width:400px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE;">
    <img  style="border-top-left-radius:15px;border-top-right-radius:15px" src="'.$this->m_reff->tm_pengaturan(35).'/plug/img/banner2.jpg" width="100%"   alt="E-receipt"  class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 1; left: 745px; top: 101px;"><div id=":rt" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
     <center>
     <span style="font-size:16"><b> BUKTI PENGAMBILAN SOUVENIR<br> HUT RI-'.$this->m_reff->tm_pengaturan(31).'</b></span>
     <hr width="90%">
     </center>
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;padding:10px"> 
     <span style="font-size:11px;color:#9e9e9e;line-height:16px">Nama :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$nama.'</span> <br>
      
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">Email :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$email.'</span> <br>
	  
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">Hp :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$hp.'</span> <br>
	  
	  <span style="font-size:11px;color:#9e9e9e;line-height:16px">Kode Registrasi :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$kode.'</span> <br>
       
     <br>
        <b style="font-size:12px;font-weight:bold;color:teal;"> PEROLEHAN </b><br>
      
      '.$und.'
       
    </td> <td style="background-color:#EEE"> 
                 
                  <img src="'.$this->konversi->img(realpath($this->m_reff->tm_pengaturan(37)."/qr/".$kode.".png")).'" width="80px"><br>
                
    </td>
    </tr>
    <tr>
    <td colspan="2"  style="background-color:#EEE;padding:10px"> 
	
	<div>  
	<b style="font-size:12px;font-weight:bold;color:teal;"> INFORMASI PENGAMBILAN SOUVENIR</b><br> 
	<span style="font-size:13px;color:black;line-height:16px"> '.$template.' </span>
	</div> 
   
   </td>
    </tr>
    </table>
    
    
    ';
        
    }
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 function genUndangan($val)
	{
		ob_start();
		//include('file.html');
	    $data["val"]=$val; 
		$isi=$this->load->view('genUndangan',$data); 
		
		$isi = ob_get_clean();

		require_once('assets/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("110","190"), 'en', true, '', array(0,0,0,0));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
	//  $html2pdf->AddFont('monotypecorsiva', 'bold', 'monotypecorsiva.php'); 
		 $html2pdf->Output($this->m_reff->tm_pengaturan(37).'/pdf/'.$val->id.'.pdf', 'F');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	    
       return  $this->m_reff->tm_pengaturan(37)."/pdf/".$val->id.".pdf";
	}
	 
	 function isiEMail($data)
    {   $tgl         =   $data->jadwal_distribusi;   
        $nik         =   $data->nik;
		//$this->m_reff->qr($nik);
        $nama        =   $data->nama;
        $email       =   $data->email;
        $instansi     =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
        $this->m_reff->qr($nik);
        
        $blok_pagi  =   $data->blok1;
        $blok_sore  =   $data->blok2;
		$blok_pagi_="";
		$blok_sore_="";
		$suci_="";
		
		if($blok_pagi)
		{
			$blok_pagi_='<span style="font-size:13px;line-height:16px; color:black">Acara Penaikan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_pagi."'").'</span> <br> ';
		}
		if($blok_sore)
		{
			$blok_sore_='<span style="font-size:13px;line-height:16px; color:black">Acara Penurunan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_sore."'").'</span> <br>';
		}
		if($data->sts_suci==1 and $data->r_suci==1)
		{
			$suci_=' Undangan Acara Renungan Suci ';
		}
        
    return    $isi='
    <table style="max-width:400px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE;">
    <img  style="border-top-left-radius:15px;border-top-right-radius:15px" src="'.$this->m_reff->tm_pengaturan(35).'/plug/img/banner2.jpg" width="100%"   alt="E-receipt"  class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 1; left: 745px; top: 101px;"><div id=":rt" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
     <center>
     <span style="font-size:16"><b> BUKTI PENGAMBILAN UNDANGAN<br> HUT RI-'.$this->m_reff->tm_pengaturan(31).'</b></span>
     <hr width="90%">
     </center>
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;padding:10px"> 
     <span style="font-size:11px;color:#9e9e9e;line-height:16px">Nama Pemohon :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$nama.'</span> <br>
      
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">NIK / nomor identitas :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$nik.'</span> <br>
      
   
     <br>
        <b style="font-size:12px;font-weight:bold;color:teal;"> PEROLEHAN UNDANGAN</b><br>
      
      '.$blok_pagi_.'
      '.$blok_sore_.'
      '.$suci_.'
    
      
     
     
    </td> <td style="background-color:#EEE"> 
                 
                 <img src="'.$this->konversi->img(realpath($this->m_reff->tm_pengaturan(37)."/qr/".$nik.".png")).'" width="80px"><br>
                
    </td>
    </tr>
    <tr>
    <td colspan="2"  style="background-color:#EEE;padding:10px"> 
   <div>  <b style="font-size:12px;font-weight:bold;color:teal;"> INFORMASI PENGAMBILAN UNDANGAN</b><br> 
     <span style="font-size:13px;color:black;line-height:16px"> - Undangan dapat diambil pada :<br>hari   '.$tgl_ambil.' pukul 08.30 - 16.00 WIB </span><br>
      <span style="font-size:13px;color:black;line-height:16px">Alamat  :   Kantor Sekretariat Negara <br>
      Jl. Veteran No.17-18, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat.
      </span><br>
    <span style="font-size:13px;color:black;line-height:16px"> - Membawa KTP Asli atau tanda pengenal yang didaftarkan. </span><br>
        <span style="font-size:13px;color:black;line-height:16px"> - Menunjukan email ini saat pengambilan. </span><br>
        <span style="font-size:13px;color:black;line-height:16px"> - Jika Undangan tidak diambil  lebih dari 3 hari dari tanggal pengambilan maka otomatis dibatalkan. </span><br>
        
        </div>
    </td>
    </tr>
    </table>
    
    
    ';
        
    }
    
    
     function isiWa($val)
    {
       
        $data=$val;
        $tgl         =   $val->jadwal_distribusi; 
        $nik         =   $data->nik;
		$this->m_reff->qr($nik);
        $nama        =   $data->nama;
        $email       =   $data->email;
        $instansi     =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
        $this->m_reff->qr($nik);
        
        $blok_pagi  =   $data->blok1;
        $blok_sore  =   $data->blok2;
		$blok_pagi_	=	"";
		$blok_sore_	=	"";
		$suci_		=	"";
		$acara_penaikan		=	"";
		$acara_penurunan	=	"";
		$acara_renungan		=	"";
		$pos1="";
		$pos2="";
		$pos3="";
		if($blok_pagi)
		{
			$blok_pagi_			=	' - Acara Penaikan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_pagi."'");
			$acara_penaikan		=	$blok_pagi_;
			$pos1				=	$acara_penaikan;
		}
		if($blok_sore)
		{
			$blok_sore_				=	' - Acara Penurunan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_sore."'");
			$acara_penurunan		=	$blok_sore_;
			$pos2					=	$acara_penurunan;
		}
		if($data->r_suci==1 and $data->sts_suci==1)
		{
			$suci_				=	' - Acara Renungan Suci ';
			$acara_renungan		=	$suci_;
			$pos3				=	$acara_renungan;
		}
		
		 if(!$pos1)
		 {	
			 if(!$pos2)
				{
					$pos1=$acara_renungan;
					$pos2="";
					$pos3="";
				}else{
						$pos1=$acara_penurunan;
						if($pos3)
						{
							$pos2=$acara_renungan;
							$pos3="";
						}else{
							$pos2="";
							$pos3="";
						}
				}
		 }else{
			$pos1=$acara_penaikan; 
			if(!$pos2)
			{
				$pos2=$acara_renungan;
				$pos3="";
			}else{
				$pos2=$acara_penurunan;
						if($pos3)
						{
							$pos3=$acara_renungan;
						}else{
							$pos3="";
						}
			}
		 }
		
		$perolehan_undangan=$blok_pagi_.$blok_sore_.$suci_;
 
		$icon2="📍";
		$icon1="🏛";
	 
        $isi=$this->m_reff->tm_pengaturan(7);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{nik}',$nik,$isi);
        $isi=str_replace('{acara_penaikan}',$pos1,$isi);
        $isi=str_replace('{acara_penurunan}',$pos2,$isi);
        $isi=str_replace('{acara_renungan}',$pos3,$isi);
       // $isi=str_replace('{blok_pagi}',$blok_pagi_,$isi);
     //   $isi=str_replace('{blok_sore}',$blok_sore_,$isi);
        $isi=str_replace('{waktu_pengambilan}',$tgl_ambil,$isi); 
        $isi=str_replace('{icon2}',$icon2,$isi);
        $isi=str_replace('{icon1}',$icon1,$isi);
        return $isi;
    }
	
	
	 function isiSms($val)
    { 
        $tgl    =   $val->jadwal_distribusi;
        $tgl    =   $this->tanggal->hariLengkap($tgl,"/");
        $isi=$this->m_reff->tm_pengaturan(9); 
        $isi=str_replace('{waktu_pengambilan}',$tgl,$isi);  
        return $isi;
    }
    function getPagiReal($kode)
	{
		$this->db->where("kode_persus",$kode);
		$this->db->where("blok1 IS NOT NULL");
		return $this->db->get("data_peserta")->num_rows();
	}function getSoreReal($kode)
	{
		$this->db->where("kode_persus",$kode);
		$this->db->where("blok2 IS NOT NULL");
		return $this->db->get("data_peserta")->num_rows();
	}
	function getJmlReal($kode,$jper=null)
	{
		if($jper==4)
		{
			$this->db->where("kode_persus",$kode); 
			return $this->db->get("data_peserta")->num_rows();
		}
		$this->db->where("kode_rangkaian",$kode); 
		return $this->db->get("data_peserta_rangkaian")->num_rows();
	}
	function setJmlLainnya($kode,$jml)
	{
		$this->db->where("kode_rangkaian",$kode);
		$this->db->delete("data_peserta_rangkaian");
		
		$dt=$this->db->get_where("data_rangkaian_acara",array("kode"=>$kode))->row();
		
									$form=array(
									"jenis_permohonan"			=>	$dt->jenis_permohonan,
									"kode_rangkaian"			=>	$dt->kode,
									"nama"						=>	$dt->nama, 
									"instansi"					=>	$dt->instansi,  
									"email"						=>	$dt->email,
									"hp"						=>	$dt->hp,
									"ket"						=>	$dt->ket,
									"_cid"						=>	$this->idu(),
									);
									
									
		for($i=0;$i<$jml;$i++)
		{
			$this->insert_peserta_rangkaian($kode,$form);
		}
	}
	
	function insert_peserta_rangkaian($kode,$form)
	{	  
		$this->db->set($form);
		return 	$this->db->insert("data_peserta_rangkaian");
	}
	
	function setJmlSuci($kode,$jml)
	{
		$this->db->where("kode_persus",$kode);
		$this->db->delete("data_peserta");
		
		$dt=$this->db->get_where("data_rangkaian_acara",array("kode"=>$kode))->row();
		
									$form=array(
									"jenis_permohonan"			=>	$dt->jenis_permohonan,
									"kode_rangkaian"			=>	$dt->kode,
									"nama"						=>	$dt->nama, 
									"instansi"					=>	$dt->instansi,  
									"email"						=>	$dt->email,
									"hp"						=>	$dt->hp,
									"ket"						=>	$dt->ket,
									"_cid"						=>	$this->idu(),
									);
									
									
		for($i=0;$i<$jml;$i++)
		{
			$this->insert_peserta_suci($kode,$form);
		}
	}
	
	function insert_peserta_suci($kode,$form)
	{	   
		unset($form['jenis_permohonan']);
		unset($form['kode_rangkaian']);
		$this->db->set("r_suci",1);
		$this->db->set("id_kategory",4);
		$this->db->set("nik",$this->m_reff->acak(17));
		$this->db->set("kode_persus",$kode);
		$this->db->set($form);
		return 	$this->db->insert("data_peserta");
	}
	function download_souvenir()
	{
		 
		$distri				=	$this->input->get_post("distri"); 
		$fpengiriman		=	$this->input->get_post("fpengiriman");
		$tgl          		=   date('Y-m-d');
		$notif				=	$this->input->get_post("notif");
		if($notif==1)
		{
			 $this->db->where("jadwal_distribusi",null);
		}elseif($notif==2)
		{
			 $this->db->where("jadwal_distribusi IS NOT NULL and jadwal_distribusi!='0000-00-00'");
		}elseif($notif==3)
		{
			 $this->db->where("jadwal_distribusi","0000-00-00");
		}

		
		if($fpengiriman){
			 $this->db->where("pengiriman",$fpengiriman); 
		} 
		 
		
		
		 
			if($distri==1){ 
				$this->db->where("diterima_oleh IS NOT NULL");
			}elseif($distri==2){
				   $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".date('Y-m-d')."')");
			 }elseif($distri==3){ 
				 $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,1)."')");
			}elseif($distri==4){ 
				 $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,2)."')");
			}elseif($distri==5){
				  $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi='".$this->tanggal->minTgl($tgl,3)."')");
			}elseif($distri==6){ 
				  $this->db->where("(diterima_oleh IS NULL and jadwal_distribusi<='".$this->tanggal->minTgl($tgl,4)."')");
			}
		
		  
		 $data=$this->db->get("data_persus");
		 if(!$data->row()){
		 echo  $this->m_reff->page403(); return false;
		 }
		  
		 $data=$data->result();
        $objPHPExcel = new PHPExcel();
 
        $style = array(
            
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '6CCECB')
            ),
            'borders' =>
            array('allborders' =>
                array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'),
                ),
            ),
        );
		
		  
        		
			    $objPHPExcel->getActiveSheet(0)->setCellValue('A1',"NO");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('B1',"NAMA");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('C1',"JABATAN/INSTANSI");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('D1',"NOMOR HP");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('E1',"EMAIL");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('F1',"ALAMAT");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('G1',"VVIP");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('H1',"VIP");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('I1',"UMUM");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('J1',"UND. PAGI");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('K1',"UND. SORE");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('L1',"JADWAL DISTRIBUSI");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('M1',"DIDISTRIBUSIKAN KEPADA");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('N1',"JENIS PENGIRIMAN");
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("A")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("B")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("C")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("D")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("E")->setAutoSize(true);
			    //$objPHPExcel->getActiveSheet(0)->getColumnDimension("F")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("G")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("H")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("I")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("J")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("K")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("L")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("M")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("N")->setAutoSize(true); 
				$objPHPExcel->getActiveSheet(0)->getStyle("A1:N1")->applyFromArray($style);
				 
      
	  
		$no=1;   $start=2;
		foreach($data as $val)
		{	 
		
		if($val->jadwal_distribusi!="0000-00-00" and $val->jadwal_distribusi!=null)
		{
			$jadwal_distribusi	=	 $this->tanggal->hariLengkap($val->jadwal_distribusi,"-");
		}elseif($val->jadwal_distribusi=="0000-00-00")
		{
			$jadwal_distribusi	=	"Tidak dijadwalkan";
		}else{
			$jadwal_distribusi	=	"-";
		}
		
		
			if($val->diterima_oleh)
			{
				$nama_pengambil	=	$val->diterima_oleh;
				$pengambilan	=	$this->tanggal->hariLengkapJam(substr($val->diterima_tgl,0,10),"/");
				$ambil			=	$nama_pengambil.", Hari ".$pengambilan; 
			
			}else{
				$ambil			=	"";
				 
				 
			} 
			 
			$pengiriman			=	$this->m_reff->goField("tr_pengiriman","nama","where id='".$val->pengiriman."' ");
		
		 	$objPHPExcel->getActiveSheet(0)->setCellValue("A".$start, $no++);
			$objPHPExcel->getActiveSheet(0)->setCellValue("B".$start, $val->nama);
			$objPHPExcel->getActiveSheet(0)->setCellValue("C".$start, $val->instansi);
			$objPHPExcel->getActiveSheet(0)->setCellValue("D".$start, "'".$val->hp);
			$objPHPExcel->getActiveSheet(0)->setCellValue("E".$start, $val->email);
			$objPHPExcel->getActiveSheet(0)->setCellValue("F".$start, $val->ket);
			$objPHPExcel->getActiveSheet(0)->setCellValue("G".$start, $val->souvenir_1); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("H".$start, $val->souvenir_2); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("I".$start, $val->souvenir_3); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("J".$start, $val->jml_pagi); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("K".$start, $val->jml_sore); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("L".$start, $jadwal_distribusi); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("M".$start, $ambil); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("N".$start, $pengiriman); 
			$start++;
		}
		  
        $objPHPExcel->getActiveSheet(0)->setTitle('rekap');
		
						
//<!-------------------------------------------------------------------------------  --->		
		$nama_file="DATA REKAP ".date("d-m-Y")." pukul ".date("h.i")."wib";
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$nama_file.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
	 
	}
	
	function delete_peserta_souvenir_cek()
	{
		$id		=	$this->input->post("id");
		$data	=	$this->m_reff->clearhasray($id);
		$iddata	=	array();
		$iddata[]		=	"xxx";
		foreach($data as $val)
		{
			$cek=$this->db->query("select * from data_persus where kode='".$val."' ")->row();
			$diterima_oleh		=	isset($cek->diterima_oleh)?($cek->diterima_oleh):"";
			$jadwal_distribusi	=	isset($cek->jadwal_distribusi)?($cek->jadwal_distribusi):"";
			if(!$diterima_oleh and !$jadwal_distribusi ){
				$iddata[]		=	$val;
			}
			
			
		}
		$this->db->where_in("kode",$iddata);
		return $this->db->delete("data_persus");
	}
}

?>