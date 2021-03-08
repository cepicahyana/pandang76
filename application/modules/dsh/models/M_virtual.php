<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_virtual extends ci_Model
{
	 
	public function __construct() {
        parent::__construct();
		
     	}
	function kontenGivenWa($isi)
	{
		
				$isi	=	str_replace("{link}","https://zoom.us/",$isi); 
				$isi	=	str_replace("{nama}","(nama peserta)",$isi);
			//	$isi	=	str_replace("{jabatan}","Staff",$isi);
			//	$isi	=	str_replace("{instansi}","Sekretariat Negara",$isi);
				$isi	=	str_replace("{email}","(email peserta)",$isi);
				$isi	=	str_replace("{hp}","(nomor hp peserta)",$isi);
				$isi	=	str_replace("{kota}","(kota peserta)",$isi);
			//	$isi	=	str_replace("{alamat}","08123456780",$isi);
		return	$isi	=	str_replace("{id}","(id meeting)",$isi);
	}function kontenGiven($isi)
	{
				$isi	=	str_replace("{link}","<a href='#'>https://zoom.us/</a>",$isi);
				$isi	=	str_replace("(link)","<a href='#'>",$isi);
				$isi	=	str_replace("(unlink)","</a>",$isi);
				$isi	=	str_replace("{nama}","(nama peserta)",$isi);
			//	$isi	=	str_replace("{jabatan}","Staff",$isi);
			//	$isi	=	str_replace("{instansi}","Sekretariat Negara",$isi);
				$isi	=	str_replace("{email}","(email peserta)",$isi);
				$isi	=	str_replace("{hp}","(nomor hp peserta)",$isi);
				$isi	=	str_replace("{kota}","(kota peserta)",$isi);
			//	$isi	=	str_replace("{alamat}","08123456780",$isi);
		return	$isi	=	str_replace("{id}","(id meeting)",$isi);
	}
	function save_konten()
	{
		$val		=	$this->input->post("val");
		$val		=	str_replace("&nbsp;"," ",$val);
		$id			=	$this->input->post("id");
		$this->db->set("val",$val);
		$this->db->where("id",$id);
		return $this->db->update("tm_pengaturan");
	}
	 
	
	function insert_peserta_zoom_given()
	{
		$form		=	$this->input->post("f");
		 
		$email		=	$this->input->post("f[email]");
						$this->db->where("email",$email); 
		$cek		=	$this->db->get("zoom_data")->num_rows();
		if($cek)
		{
			$var["gagal"]=true;
			$var["info"]="gagal!! email sudah terdaftar";
			return $var;
		}
		
				$this->db->set($form); 
				$this->db->set("id_type",1); 
				$this->db->set("durasi",0); 
		return $this->db->insert("zoom_data");
		 
	}	 
	
	function insert_peserta_zoom_online()
	{
		$form		=	$this->input->post("f");
		 
		$email		=	$this->input->post("f[email]");
						$this->db->where("email",$email); 
		$cek		=	$this->db->get("zoom_data")->num_rows();
		if($cek)
		{
			$var["gagal"]=true;
			$var["info"]="gagal!! email sudah terdaftar";
			return $var;
		}
		
				$this->db->set($form); 
				$this->db->set("id_type",2); 
				$this->db->set("id_negara",94); 
		return $this->db->insert("zoom_data");
		 
	}	 
	
	function update_peserta_zoom()
	{
		$form		=	$this->input->post("f");
		$id			=	$this->input->post("id");
		$id_event	=	$this->input->post("id_event");
		$email		=	$this->input->post("f[email]");
						$this->db->where("email",$email);
						$this->db->where("id!=",$id);
		$cek		=	$this->db->get("zoom_data")->num_rows();
		if($cek)
		{
			$var["gagal"]=true;
			$var["info"]="gagal!! email sudah terdaftar";
			return $var;
		}
		
		$this->db->set($form);
		$this->db->where("id",$id);
		$this->db->update("zoom_data");
		if($id_event)
		{
			$data=$this->input->post("f");
			return $this->goInsertZoomOne($id_event,$data,$id);
		}
		return true;
	}
	
	function goInsertZoomOne($id_event,$data,$uid)
	{
		$meetingID_post	=	$id_event;
		$meetingID_rest	=	$this->m_reff->goField("zoom_event","kode","where id='".$meetingID_post."' ");
		  
			$email				=	$data["email"];
			$nama				=	$data["nama"];
			$meetingID			=	$meetingID_rest; 
			$jabatan			=	$data["jabatan"];
			 
			if($jabatan)
			{
				$jabatan=$jabatan." - ";
			}
			
			$data=array(
			"email"			=> trim($email),
			"first_name"	=> $jabatan,
			"last_name"		=> $nama." - #".$uid,
			);
			
			 
			 $return	=	$this->zoom_api->registrans($data,$meetingID); 
			 
		     $sts		=	isset($return['registrant_id'])?($return['registrant_id']):false;
			if($sts)
			{
				 
				$this->db->set("id_event",$meetingID_post);
				$this->db->set("registrant_id",$sts); 
				$this->db->where("email",$email);
				$this->db->update("zoom_data");			
				 
			}else{
				 
			}
		 
		 return true; 
	}
		function goInsertZoom($given=null)
	{ 
		$meetingID_post	=	$this->input->post("event");
		$meetingID_rest	=	$this->m_reff->goField("zoom_event","kode","where id='".$meetingID_post."' ");
		$id				=	$this->input->post("id");
		$id				=	$this->m_reff->clearhasray($id);
		$add			=	0;
		$gagal			=	0;
		foreach($id as $id)
		{
			$full			=	explode("::",$id);
			$email			=	isset($full[0])?($full[0]):"";
			$nama			=	isset($full[1])?($full[1]):"";
			$meetingID		=	isset($full[2])?($full[2]):"";
			$registrant_id	=	isset($full[3])?($full[3]):"";
			$kota			=	isset($full[4])?($full[4]):"";
			$phone			=	isset($full[5])?($full[5]):"";
			$uid			=	isset($full[6])?($full[6]):"";
			 
			
			
			
			
			if($given)
			{
				if($kota)
				{
					$kota 		=	$kota." - ";
				}else{
					$kota		=	" ";
				}
				
				
				$data=array(
					"email"			=> trim($email),
					"first_name"	=> $kota, //jabatan untuk given
					"last_name"		=> $nama." - #".$uid,
				);
			}else{
				
				if($kota)
				{
					$kota 		=	"- ".$kota;
				}else{
					$kota		=	"";
				}
				$uid			=	isset($full[7])?($full[7]):"";
				$data=array(
				"email"			=> trim($email),
				"first_name"	=> $nama,
				"last_name"		=> $kota." #".$uid,
				);
			}
			
			if($meetingID_post=="database")
			{
				$meetingID_select	=	$meetingID;	
			}else{ 
				$meetingID_select	=	$meetingID_rest;	 
			}
		 
			 $return	=	$this->zoom_api->registrans($data,$meetingID_select); 
			
			//return  print_r($return);
		      $sts			=	isset($return['registrant_id'])?($return['registrant_id']):"";
		      $join_url		=	isset($return['join_url'])?($return['join_url']):"";
			if(strlen($sts)>2)
			{
				if($meetingID_post!="database")
				{
					$this->db->set("id_event",$meetingID_post);
				}
				
				$this->db->set("_cid",$this->idu()); 
				$this->db->set("registrant_id",$sts); 
				$this->db->set("join_url",$join_url); 
				$this->db->where("email",$email);
				$this->db->update("zoom_data");			
				$add++;
			}else{
				$gagal++;
				 echo json_encode($return);
			}
		}
		$var["add"] =$add;
		$var["gagal"] =$gagal;
		return $var;
			
	}
	
	function deleteUser()
	{  
		$id				=	$this->input->post("id");
		$id				=	$this->m_reff->clearhasray($id);
		$add			=	0;
		$gagal			=	0;
		foreach($id as $id)
		{
			$full			=	explode("::",$id);
			$email			=	isset($full[0])?($full[0]):"";
			$nama			=	isset($full[1])?($full[1]):"";
			$meetingID		=	isset($full[2])?($full[2]):"";
			$registrant_id	=	isset($full[3])?($full[3]):"";
			
			$data["action"]							=	"deny";
			$data["registrants"]["email"]			=	$email;
			$data["registrants"]["registrant_id"]	=	$registrant_id; 
			return $return	=	$this->zoom_api->registransDelete($data,$meetingID); 
			//return  print_r($return);
		      $sts		=	isset($return['registrant_id'])?($return['registrant_id']):false;
			if($sts)
			{
				if($meetingID_post!="database")
				{
					$this->db->set("id_event",$meetingID_post);
				} 
			
				
				$this->db->set("registrant_id",$sts); 
				$this->db->where("email",$email);
				$this->db->update("zoom_data");			
				$add++;
			}else{
				$gagal++;
			}
		}
		$var["add"] =$add;
		$var["gagal"] =$gagal;
		return $var;
			
	}
	function delete_event()
	{
		$kode	=	$this->input->get_post("kode");
		$this->db->where("kode",$kode);
		return $this->db->delete("zoom_event");
	}function delete_peserta_zoom()
	{
		$id	=	$this->input->post("id");
		$this->db->where("id",$id);
		return $this->db->delete("zoom_data");
	}
	
	function delete_peserta_zoom_all()
	{
		$id		=	$this->input->post("id");
		$data	=	$this->m_reff->clearhasray($id);
		$iddata	=	array();
		foreach($data as $val)
		{
			$data			=	explode("::",$val);
			$iddata[]		=	isset($data[6])?($data[6]):"";
			
		}
		$this->db->where_in("id",$iddata);
		return $this->db->delete("zoom_data");
	}
	function delete_peserta_zoom_all_online()
	{
		$id		=	$this->input->post("id");
		$data	=	$this->m_reff->clearhasray($id);
		$iddata	=	array();
		foreach($data as $val)
		{
			$data			=	explode("::",$val);
			$iddata[]		=	isset($data[7])?($data[7]):"";
			
		}
		$this->db->where_in("id",$iddata);
		return $this->db->delete("zoom_data");
	}
	
	function insert_event()
	{
		$code		=	$this->input->post("code");
		$title		=	$this->input->post("title");
		$id_akun	=	$this->input->post("id_akun");
		
		$cek	=	$this->db->get_where("zoom_event",array("kode"=>$code))->num_rows();
		if($cek){
			$var["gagal"] = true;
			$var["info"]  = "Gagal!! Kode meeting sudah tersedia.";
			return $var;
		}
		$this->db->set("id_akun",$id_akun);
		$this->db->set("kode",$code);
		$this->db->set("title",$title);
		return $this->db->insert("zoom_event");
	}
	/*--------------------------------------------------*/
	function get_zoom()
	{
			$mulai			=	$this->input->post("mulai");  
			$sampai			=	$this->input->post("sampai");  
			$start			=	$this->input->post("start");
			
		$this->_get_datatables_zoom(); 
		if($this->input->post("length")!=-1) 
			if($mulai)
			{
				$this->db->limit($this->input->post("length"),(($mulai-1)+$start));
			}else{
				$this->db->limit($this->input->post("length"),$this->input->post("start"));
			}
		
	 	return $this->db->get()->result();
		 
	}
	private function _get_datatables_zoom()
	{	 
			
			$zoomin		=	$this->input->get_post("zoomin");  
			if($zoomin==1){ 
				 $this->db->where("registrant_id IS NOT NULL"); 
			}elseif($zoomin==2){ 
				 $this->db->where("registrant_id IS NULL"); 
			}elseif($zoomin==3){ 
				 $this->db->where("esign",1); 
			}elseif($zoomin==4){ 
				  $this->db->where("esign",0); 
			}elseif($zoomin==5){ 
				  $this->db->where("LENGTH(join_url)>1"); 
			}elseif($zoomin==6){ 
				  $this->db->where("(LENGTH(join_url)<=0 or join_url is null)"); 
			}
			
			$event		=	$this->input->get_post("event");  
			if($event){ 
				 $this->db->where("id_event",$event); 
			} 
			$join		=	$this->input->get_post("join");  
			if($join){ 
				 $this->db->where("durasi>=",$join); 
			} 
		  	 $this->db->where("id_type",1); 
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"hp"=>$searchkey, 
				"email"=>$searchkey,
				"instansi"=>$searchkey, 
				"jabatan"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				  
			}
		
			  
	 	$this->db->order_by("id","asc");
		$query=$this->db->from("zoom_data");
		return $query;
	
	}
	
	public function count_zoom()
	{		
		
		 $this->_get_datatables_zoom();
		return $this->db->get()->num_rows();
	}
	 
	
	  	/*--------------------------------------------------*/
	function get_online()
	{
		 
		
			$mulai			=	$this->input->post("mulai");   
			$start			=	$this->input->post("start");
			
		$this->_get_datatables_online(); 
		if($this->input->post("length")!=-1) 
			if($mulai)
			{
				$this->db->limit($this->input->post("length"),(($mulai-1)+$start));
			}else{
				$this->db->limit($this->input->post("length"),$this->input->post("start"));
			}
		
	 	return $this->db->get()->result();
		
		
		 
	}
	private function _get_datatables_online()
	{	 
			$negara		=	$this->input->get_post("negara");  
			if($negara==1){ 
				 $this->db->where("id_negara",94); 
			}elseif($negara==2){ 
				 $this->db->where("id_negara!=94"); 
			}
			$zoomin		=	$this->input->get_post("zoomin");  
			if($zoomin==1){ 
				 $this->db->where("registrant_id IS NOT NULL"); 
			}elseif($zoomin==2){ 
				 $this->db->where("registrant_id IS NULL"); 
			}elseif($zoomin==3){ 
				 $this->db->where("esign",1); 
			}elseif($zoomin==4){ 
				  $this->db->where("esign",0); 
			}elseif($zoomin==5){ 
				  $this->db->where("LENGTH(join_url)>1"); 
			}elseif($zoomin==6){ 
				  $this->db->where("(LENGTH(join_url)<=0 or join_url is null)"); 
			}
			
			$event		=	$this->input->get_post("event");  
			if($event){ 
				 $this->db->where("id_event",$event); 
			} 
			
			$durasi		=	$this->input->get_post("join");  
			if($durasi){ 
				 $this->db->where("durasi>=",$durasi); 
			} 
			
		    $id_pekerjaan		=	$this->input->get_post("id_pekerjaan");  
			if($id_pekerjaan){ 
				 $this->db->where("id_pekerjaan",$id_pekerjaan); 
			} 
		  
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"hp"=>$searchkey, 
				"email"=>$searchkey,
				"instansi"=>$searchkey, 
				"jabatan"=>$searchkey,
				"pekerjaan_lainnya"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				  
			}
		
			  
	 	$this->db->where("id_type",2);
	 	$this->db->order_by("id","asc");
		$query=$this->db->from("zoom_data");
		return $query;
	
	}
	
	public function count_online()
	{		
		
		 $this->_get_datatables_online();
		return $this->db->get()->num_rows();
	}
	 
		/*--------------------------------------------------*/
	function get_dashboard()
	{
		$this->_get_datatables_dashboard(); 
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	private function _get_datatables_dashboard()
	{	 
			 
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"country_name"=>$searchkey, 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end(); 
			}
		 
	 	$this->db->order_by("jml","desc");
	 	$this->db->order_by("country_name","asc");
		$query=$this->db->from("v_country");
		return $query;
	
	}
	
	public function count_dahboard()
	{		
		
		 $this->_get_datatables_dashboard();
		return $this->db->get()->num_rows();
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
	 
	function hapus_cek()
	{
	    $id =   $this->input->post("id");
	    $in =   $this->m_reff->clearhasray($id);
		//$this->kirim_notif_dis($in);
	    $this->db->where("diterima_oleh",null);
	    $this->db->where_in("id",$in);
	    $this->db->set("hps",1);
	 return   $this->db->update("data_peserta");
	}
	 
	function setBroadcast()//given
	{
	    $subject		=	$this->m_reff->tm_pengaturan(49);
	    $konten			=	$this->m_reff->tm_pengaturan(48);
	    $id				=	$this->input->get_post("id");//id
		$id_pemohon		=	$this->m_reff->clearhasray($id); 
		$isiWa 			=   $this->m_reff->tm_pengaturan(52);
		return $this->kirimEmail($id_pemohon,$subject,$konten,$isiWa); 
	}
	function kirim_sertifikat()//given
	{ 
	    $id				=	$this->input->get_post("id"); 
		$id_pemohon		=	$this->m_reff->clearhasray($id);  
		return $this->kirimEmailSertifikat($id_pemohon); 
	}
		function kirim_sertifikat_given()//given
	{ 
	    $id				=	$this->input->get_post("id"); 
		$id_pemohon		=	$this->m_reff->clearhasray($id);  
		return $this->kirimEmailSertifikatGiven($id_pemohon); 
	}
	
	 	function kirim_undangan()//given
	{ 
	    $id				=	$this->input->get_post("id"); 
		$id_pemohon		=	$this->m_reff->clearhasray($id);  
		return $this->kirimEmailUndangan($id_pemohon); 
	}
	
	 
	
	function kirimEmailUndangan($id_pemohon)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]=""; 
		 $ok=0;$gagal=0;$dgagal="";
		 
				$subject_ind		=	$this->m_reff->tm_pengaturan(74);
				$konten_ind			=	$this->m_reff->tm_pengaturan(75);
				$isiWa_ind 			=   $this->m_reff->tm_pengaturan(73);


				$subject_eng		=	$this->m_reff->tm_pengaturan(78);
				$konten_eng			=	$this->m_reff->tm_pengaturan(79);
				$isiWa_eng 			=   $this->m_reff->tm_pengaturan(77);
				
				
        foreach($id_pemohon as $val)
        {              
			$full			=	explode("::",$val);
			$email			=	isset($full[0])?($full[0]):"";
			$nama			=	isset($full[1])?($full[1]):"";
			$meetingID		=	isset($full[2])?($full[2]):"";
			$registrant_id	=	isset($full[3])?($full[3]):"";
			$kota			=	isset($full[4])?($full[4]):"";
			$phone=$hp		=	isset($full[5])?($full[5]):"";
			$id_negara		=	isset($full[6])?($full[6]):"";
			$given			=	isset($full[7])?($full[7]):"";
			$link_join		=	$this->m_reff->goField("zoom_data","join_url","where registrant_id='".$registrant_id."'");
			
			if($id_negara==94 or $id_negara==null or $id_negara=="" or $given=="given")
			{
				$subject		=	$subject_ind;
				$konten			=	$konten_ind;
				$isiWa 			=   $isiWa_ind;
			}else{
				$subject		=	$subject_eng;
				$konten			=	$konten_eng;
				$isiWa 			=   $isiWa_eng;
			}
				
								$this->db->where("email",$email);
				$db			=	$this->db->get("zoom_data")->row();				
				$jabatan	=	isset($db->jabatan)?($db->jabatan):"";
				$instansi	=	isset($db->instansi)?($db->instansi):"";
				 
				$isi    =   $konten;  
				
				$isi	=	str_replace("{link}","<a target='_blank' href='".$link_join."'>".$link_join."</a>",$isi);
				$isi	=	str_replace("(link)","<a target='_blank' href='".$link_join."'>",$isi);
				$isi	=	str_replace("(unlink)","</a>",$isi);
				
				$isi	=	str_replace("{nama}",$nama,$isi);
				$isi	=	str_replace("{jabatan}",$jabatan,$isi);
				$isi	=	str_replace("{instansi}",$instansi,$isi);
				$isi	=	str_replace("{email}",$email,$isi);
				$isi	=	str_replace("{hp}",$hp,$isi);
				$isi	=	str_replace("{kota}",$kota,$isi);
				//$isi	=	str_replace("{alamat}","08123456780",$isi);
				$isi	=	str_replace("{id}",$meetingID,$isi);
			
				 
				$subject			=	str_replace("{jabatan}",$jabatan,$subject); 
				$subject			=	str_replace("{instansi}",$instansi,$subject); 
				$subject			=	str_replace("{nama}",$nama,$subject); 
				$subject			=	str_replace("{email}",$email,$subject);
				$subject			=	str_replace("{hp}",$hp,$subject);
				$subject			=	str_replace("{kota}",$kota,$subject); 
				$subject			=	str_replace("{id}",$meetingID,$subject);
			
			 
			
				 
				$isiWa			=	str_replace("{link}",$link_join,$isiWa); 
				$isiWa			=	str_replace("{instansi}",$instansi,$isiWa); 
				$isiWa			=	str_replace("{jabatan}",$jabatan,$isiWa); 
				$isiWa			=	str_replace("{nama}",$nama,$isiWa); 
				$isiWa			=	str_replace("{email}",$email,$isiWa);
				$isiWa			=	str_replace("{hp}",$hp,$isiWa);
				$isiWa			=	str_replace("{kota}",$kota,$isiWa); 
				$isiWa			=	str_replace("{id}",$meetingID,$isiWa);
				
				if($id_negara==94  or $id_negara==null or $id_negara=="" or $given=="given")
				{ 
					 $pathUndangan	=	 $this->m_reff->tm_pengaturan(37)."/sertifikat/".$this->m_reff->tm_pengaturan(72);
				}else{
					 $pathUndangan	=	 $this->m_reff->tm_pengaturan(37)."/sertifikat/".$this->m_reff->tm_pengaturan(76);
				}
				
				//if($registrant_id){//
				if(1==1){
					$path			=	$pathUndangan;
					$sts    		=   $this->m_reff->kirimEmail($email,$subject,$isi,$path,"e-undangan");   
				}else{
					$sts			=	"";
				}
			if(isset($sts["sts"])?($sts["sts"]):""=="ok"){  
				$ok++; 
				$this->m_reff->kirimWa($phone,$isiWa); 
			}else{
				$gagal++;
				$dgagal.=$email."/".$phone."<br>";
			}
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	 function kirimEmailSertifikat($id_pemohon)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]=""; 
		 $ok=0;$gagal=0;$dgagal="";
		 
				$subject_ind		=	$this->m_reff->tm_pengaturan(66);
				$konten_ind			=	$this->m_reff->tm_pengaturan(63);
				$isiWa_ind 			=   $this->m_reff->tm_pengaturan(64);


				$subject_eng		=	$this->m_reff->tm_pengaturan(68);
				$konten_eng			=	$this->m_reff->tm_pengaturan(67);
				$isiWa_eng 			=   $this->m_reff->tm_pengaturan(69);
				
				
        foreach($id_pemohon as $val)
        {              
			$full			=	explode("::",$val);
			$email			=	isset($full[0])?($full[0]):"";
			$nama			=	isset($full[1])?($full[1]):"";
			$meetingID		=	isset($full[2])?($full[2]):"";
			$registrant_id	=	isset($full[3])?($full[3]):"";
			$kota			=	isset($full[4])?($full[4]):"";
			$phone=$hp		=	isset($full[5])?($full[5]):"";
			$id_negara		=	isset($full[6])?($full[6]):"";
			$idtable		=	isset($full[7])?($full[7]):"";
		 
			if($id_negara==94)
			{
				$subject		=	$subject_ind;
				$konten			=	$konten_ind;
				$isiWa 			=   $isiWa_ind;
			}else{
				$subject		=	$subject_eng;
				$konten			=	$konten_eng;
				$isiWa 			=   $isiWa_eng;
			}
				 
				$isi    =   $konten;  
				$isi	=	str_replace("{nama}",$nama,$isi);
				//$isi	=	str_replace("{jabatan}","Staff",$isi);
				//$isi	=	str_replace("{instansi}","Sekretariat Negara",$isi);
				$isi	=	str_replace("{email}",$email,$isi);
				$isi	=	str_replace("{hp}",$hp,$isi);
				$isi	=	str_replace("{kota}",$kota,$isi);
				//$isi	=	str_replace("{alamat}","08123456780",$isi);
				$isi	=	str_replace("{id}",$meetingID,$isi);
			
				 
				$subject			=	str_replace("{nama}",$nama,$subject); 
				$subject			=	str_replace("{email}",$email,$subject);
				$subject			=	str_replace("{hp}",$hp,$subject);
				$subject			=	str_replace("{kota}",$kota,$subject); 
				$subject			=	str_replace("{id}",$meetingID,$subject);
			
			 
			
				 
				$isiWa			=	str_replace("{nama}",$nama,$isiWa); 
				$isiWa			=	str_replace("{email}",$email,$isiWa);
				$isiWa			=	str_replace("{hp}",$hp,$isiWa);
				$isiWa			=	str_replace("{kota}",$kota,$isiWa); 
				$isiWa			=	str_replace("{id}",$meetingID,$isiWa);
				if($email){
					$path				=	$this->genSertifikat($id_negara,$nama,$registrant_id); 
					$path_esign			=	realpath($path);
					$esign    			=   $this->m_reff->esign($path_esign,$email);   
				//	print_r($esign);
					if($esign["status"]==1)
					{
						 
						$sts    		=   $this->m_reff->kirimEmail($email,$subject,$isi,$path,"e-certificate");   
					} 
				}else{
					$sts			=	"";
				}
			if(isset($sts["sts"])?($sts["sts"]):""=="ok"){  
						
						$this->db->set("esign",$esign["status"]);
						$this->db->where("id",$idtable);
						$this->db->update("zoom_data");
			
				$ok++; 
				$this->m_reff->kirimWa($phone,$isiWa); 
			}else{
				$gagal++;
				$dgagal.=$email."/".$phone."<br>";
			}
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	  function kirimEmailSertifikatGiven($id_pemohon)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]=""; 
		 $ok=0;$gagal=0;$dgagal="";
		 
				$subject_ind		=	$this->m_reff->tm_pengaturan(86); //subject email
				$konten_ind			=	$this->m_reff->tm_pengaturan(87); //isi email
				$isiWa_ind 			=   $this->m_reff->tm_pengaturan(85); //isi wa

 
				
				
        foreach($id_pemohon as $val)
        {              
			$full			=	explode("::",$val);
			$email			=	isset($full[0])?($full[0]):"";
			$nama			=	isset($full[1])?($full[1]):"";
			$meetingID		=	isset($full[2])?($full[2]):"";
			$registrant_id	=	isset($full[3])?($full[3]):"";
			$jabatan		=	isset($full[4])?($full[4]):"";
			$phone=$hp		=	isset($full[5])?($full[5]):"";
			$id=$idtable	=	isset($full[6])?($full[6]):"";
			 
			 
				$subject		=	$subject_ind;
				$konten			=	$konten_ind;
				$isiWa 			=   $isiWa_ind;
			  
				$isi    =   $konten;  
				$isi	=	str_replace("{nama}",$nama,$isi);
				//$isi	=	str_replace("{jabatan}","Staff",$isi);
				//$isi	=	str_replace("{instansi}","Sekretariat Negara",$isi);
				$isi	=	str_replace("{email}",$email,$isi);
				$isi	=	str_replace("{hp}",$hp,$isi);
				//$isi	=	str_replace("{kota}",$kota,$isi);
				//$isi	=	str_replace("{alamat}","08123456780",$isi);
				$isi	=	str_replace("{id}",$meetingID,$isi);
			
				 
				$subject			=	str_replace("{nama}",$nama,$subject); 
				$subject			=	str_replace("{email}",$email,$subject);
				$subject			=	str_replace("{hp}",$hp,$subject);
				//$subject			=	str_replace("{kota}",$kota,$subject); 
				$subject			=	str_replace("{id}",$meetingID,$subject);
			
			 
			
				 
				$isiWa			=	str_replace("{nama}",$nama,$isiWa); 
				$isiWa			=	str_replace("{email}",$email,$isiWa);
				$isiWa			=	str_replace("{hp}",$hp,$isiWa);
			//	$isiWa			=	str_replace("{kota}",$kota,$isiWa); 
				$isiWa			=	str_replace("{id}",$meetingID,$isiWa);
				if($email){
					$path				=	$this->genSertifikatGiven($nama,$registrant_id); 
					$path_esign			=	realpath($path);
					$esign    			=   $this->m_reff->esign($path_esign,$email);   
				//	print_r($esign);
					if($esign["status"]==1)
					{
						 
						$sts    		=   $this->m_reff->kirimEmail($email,$subject,$isi,$path,"e-certificate");   
					} 
				}else{
					$sts			=	"";
				}
			if(isset($sts["sts"])?($sts["sts"]):""=="ok"){  
						
						$this->db->set("esign",$esign["status"]);
						$this->db->where("id",$idtable);
						$this->db->update("zoom_data");
			
				$ok++; 
				$this->m_reff->kirimWa($phone,$isiWa); 
			}else{
				$gagal++;
				$dgagal.=$email."/".$phone."<br>";
			}
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	 
	 function genSertifikatGiven($nama,$registrant_id)
	{
	      
		ob_start();
		//include('file.html');
		$data["nama"]		=	$nama;	
		  
			$isi=$this->load->view('genSertifikatGiven',$data); 
		 
		$isi = ob_get_clean();

		require_once('assets/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('L',array("210","297"), 'en', true, '', array(1,1,1,1));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		  $html2pdf->AddFont('monotypecorsiva', 'bold', 'monotypecorsiva.php'); 
		  $html2pdf->Output($this->m_reff->tm_pengaturan(37).'/sertifikat/'.$registrant_id.'.pdf', 'F');
		 //  $html2pdf->Output($this->m_reff->tm_pengaturan(37).'/sertifikat/'.$registrant_id.'.pdf' );
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	    return $this->m_reff->tm_pengaturan(37)."/sertifikat/".$registrant_id.".pdf";
	}
	 
	  function genSertifikat($id_negara,$nama,$registrant_id)
	{
	      
		ob_start();
		//include('file.html');
		$data["nama"]		=	$nama;	
		$data["id_negara"]	=	$id_negara;	
		 
			$isi=$this->load->view('genUndangan',$data); 
		 
		$isi = ob_get_clean();

		require_once('assets/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(1,1,1,1));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		  $html2pdf->AddFont('monotypecorsiva', 'bold', 'monotypecorsiva.php'); 
		   $html2pdf->Output($this->m_reff->tm_pengaturan(37).'/sertifikat/'.$registrant_id.'.pdf', 'F');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	    return $this->m_reff->tm_pengaturan(37)."/sertifikat/".$registrant_id.".pdf";
	}
	 
	 
		function setBroadcastOnline()//given
	{
	    $subject		=	$this->m_reff->tm_pengaturan(51);
	    $konten			=	$this->m_reff->tm_pengaturan(50);
	    $id				=	$this->input->get_post("id");//id
		$id_pemohon		=	$this->m_reff->clearhasray($id); 
		$isiWa 			=   $this->m_reff->tm_pengaturan(53);
		return $this->kirimEmailOnline($id_pemohon); 
	}
		function kirimEmailOnline($id_pemohon)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]=""; 
		 $ok=0;$gagal=0;$dgagal="";
		 
				$subject_ind		=	$this->m_reff->tm_pengaturan(51);
				$konten_ind			=	$this->m_reff->tm_pengaturan(50);
				$isiWa_ind 			=   $this->m_reff->tm_pengaturan(53);


				$subject_eng		=	$this->m_reff->tm_pengaturan(58);
				$konten_eng			=	$this->m_reff->tm_pengaturan(59);
				$isiWa_eng 			=   $this->m_reff->tm_pengaturan(60);
				
				
        foreach($id_pemohon as $val)
        {              
			$full			=	explode("::",$val);
			$email			=	isset($full[0])?($full[0]):"";
			$nama			=	isset($full[1])?($full[1]):"";
			$meetingID		=	isset($full[2])?($full[2]):"";
			$registrant_id	=	isset($full[3])?($full[3]):"";
			$kota			=	isset($full[4])?($full[4]):"";
			$phone=$hp		=	isset($full[5])?($full[5]):"";
			$id_negara		=	isset($full[6])?($full[6]):"";
		 
			if($id_negara==94)
			{
				$subject		=	$subject_ind;
				$konten			=	$konten_ind;
				$isiWa 			=   $isiWa_ind;
			}else{
				$subject		=	$subject_eng;
				$konten			=	$konten_eng;
				$isiWa 			=   $isiWa_eng;
			}
				 
				$isi    =   $konten;  
				
				
				
				$link_join		=	$this->m_reff->goField("zoom_data","join_url","where registrant_id='".$registrant_id."'");
			 
				$isi	=	str_replace("{link}","<a target='_blank' href='".$link_join."'>".$link_join."</a>",$isi);
				$isi	=	str_replace("(link)","<a target='_blank' href='".$link_join."'>",$isi);
				$isi	=	str_replace("(unlink)","</a>",$isi); 
				
				$isi	=	str_replace("{nama}",$nama,$isi);
				//$isi	=	str_replace("{jabatan}","Staff",$isi);
				//$isi	=	str_replace("{instansi}","Sekretariat Negara",$isi);
				$isi	=	str_replace("{email}",$email,$isi);
				$isi	=	str_replace("{hp}",$hp,$isi);
				$isi	=	str_replace("{kota}",$kota,$isi);
				//$isi	=	str_replace("{alamat}","08123456780",$isi);
				$isi	=	str_replace("{id}",$meetingID,$isi);
			
				 
				$subject			=	str_replace("{nama}",$nama,$subject); 
				$subject			=	str_replace("{email}",$email,$subject);
				$subject			=	str_replace("{hp}",$hp,$subject);
				$subject			=	str_replace("{kota}",$kota,$subject); 
				$subject			=	str_replace("{id}",$meetingID,$subject);
			
			 
			
				 
				$isiWa			=	str_replace("{link}",$link_join,$isiWa); 
				$isiWa			=	str_replace("{nama}",$nama,$isiWa); 
				$isiWa			=	str_replace("{email}",$email,$isiWa);
				$isiWa			=	str_replace("{hp}",$hp,$isiWa);
				$isiWa			=	str_replace("{kota}",$kota,$isiWa); 
				$isiWa			=	str_replace("{id}",$meetingID,$isiWa);
				
			$sts    =   $this->m_reff->kirimEmail($email,$subject,$isi);   
    		
			if($sts["sts"]=="ok"){  
				$ok++; 
				$this->m_reff->kirimWa($phone,$isiWa); 
			}else{
				$gagal++;
				$dgagal.=$email."/".$phone."<br>";
			}
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	 
	 
	   
	
	 function kirimEmail($id_pemohon,$subject,$konten,$isiWaAwal)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]=""; 
		 $ok=0;$gagal=0;$dgagal="";
        foreach($id_pemohon as $val)
        {              
			$full			=	explode("::",$val);
			$email			=	isset($full[0])?($full[0]):"";
			$nama			=	isset($full[1])?($full[1]):"";
			$meetingID		=	isset($full[2])?($full[2]):"";
			$registrant_id	=	isset($full[3])?($full[3]):"";
			$kota			=	isset($full[4])?($full[4]):"";
			$phone=$hp		=	isset($full[5])?($full[5]):"";
			$link_join		=	$this->m_reff->goField("zoom_data","join_url","where registrant_id='".$registrant_id."'");
			
			$dt=$this->db->query("select jabatan,instansi from zoom_data where email='".$email."' and hp='".$hp."' ")->row();
			$jabatan	=	isset($dt->jabatan)?($dt->jabatan):"";
			$instansi	=	isset($dt->instansi)?($dt->instansi):"";
				$to     =   $email;
				
				$isi    =   $konten;  
				
				$isi	=	str_replace("{link}","<a target='_blank' href='".$link_join."'>".$link_join."</a>",$isi);
				$isi	=	str_replace("(link)","<a target='_blank' href='".$link_join."'>",$isi);
				$isi	=	str_replace("(unlink)","</a>",$isi);
				
				$isi	=	str_replace("{nama}",$nama,$isi);
				$isi	=	str_replace("{jabatan}",$jabatan,$isi);
				$isi	=	str_replace("{instansi}",$instansi,$isi);
				$isi	=	str_replace("{email}",$email,$isi);
				$isi	=	str_replace("{hp}",$hp,$isi);
				$isi	=	str_replace("{kota}",$kota,$isi);
				//$isi	=	str_replace("{alamat}","08123456780",$isi);
				$isi	=	str_replace("{id}",$meetingID,$isi);
			
				 
				$subject			=	str_replace("{nama}",$nama,$subject); 
				$subject			=	str_replace("{email}",$email,$subject);
				$subject			=	str_replace("{hp}",$hp,$subject);
				$subject			=	str_replace("{kota}",$kota,$subject); 
				$subject			=	str_replace("{id}",$meetingID,$subject);
			
			 
			
				$isiWa			=	$isiWaAwal;
				$isiWa			=	str_replace("{nama}",$nama,$isiWa); 
				$isiWa			=	str_replace("{link}",$link_join,$isiWa);
				$isiWa			=	str_replace("{email}",$email,$isiWa);
				$isiWa			=	str_replace("{hp}",$hp,$isiWa);
				$isiWa			=	str_replace("{kota}",$kota,$isiWa); 
				$isiWa			=	str_replace("{id}",$meetingID,$isiWa);
				$isiWa			=	str_replace("{jabatan}",$jabatan,$isiWa);
				$isiWa			=	str_replace("{instansi}",$instansi,$isiWa);
			 
				$sts    =   $this->m_reff->kirimEmail($to,$subject,$isi);   
    		
			if($sts["sts"]=="ok"){  
				$ok++; 
				$this->m_reff->kirimWa($phone,$isiWa); 
			}else{
				$gagal++;
				$dgagal.=$email."/".$phone."<br>";
			}
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	 
	 
	   
	
	 
	  
	function download_zoom()
	{
		 
		$zoomin				=	$this->input->get_post("zoomin"); 
		$event				=	$this->input->get_post("event");
		  
			$zoomin		=	$this->input->get_post("zoomin");  
			if($zoomin==1){ 
				 $this->db->where("registrant_id IS NOT NULL"); 
			}elseif($zoomin==2){ 
				 $this->db->where("registrant_id IS NULL"); 
			}
			
			$event		=	$this->input->get_post("event");  
			if($event){ 
				 $this->db->where("id_event",$event); 
			} 
			$join		=	$this->input->get_post("join");  
			if($join){ 
				 $this->db->where("durasi>=",$join); 
			} 
		   $this->db->where("id_type",1);
		 $data=$this->db->get("zoom_data");
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
			    $objPHPExcel->getActiveSheet(0)->setCellValue('C1',"JABATAN");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('D1',"INSTANSI");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('E1',"EMAIL");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('F1',"TELP");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('G1',"KOTA");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('H1',"ALAMAT LENGKAP");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('I1',"STATUS VCON");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('J1',"DURASI JOIN (menit)");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('K1',"ROOM EVENT");
			    
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("A")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("B")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("C")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("D")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("E")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("F")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("G")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("H")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("I")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("J")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("K")->setAutoSize(true);
			   
				$objPHPExcel->getActiveSheet(0)->getStyle("A1:K1")->applyFromArray($style);
				 
      
	  
		$no=1;   $start=2;
		foreach($data as $val)
		{	 
		
			if($val->registrant_id)
			{
				$sts_vcon	=	"Masuk";
			}else{
				$sts_vcon	=	"Draft";
			}
			$room			=	$this->m_reff->goField("zoom_event","title","where id='".$val->id_event."' ");
		 	$objPHPExcel->getActiveSheet(0)->setCellValue("A".$start, $no++);
			$objPHPExcel->getActiveSheet(0)->setCellValue("B".$start, $val->nama);
			$objPHPExcel->getActiveSheet(0)->setCellValue("C".$start, $val->jabatan);
			$objPHPExcel->getActiveSheet(0)->setCellValue("D".$start, $val->instansi);
			$objPHPExcel->getActiveSheet(0)->setCellValue("E".$start, $val->email);
			$objPHPExcel->getActiveSheet(0)->setCellValue("F".$start, "'".$val->hp);
			$objPHPExcel->getActiveSheet(0)->setCellValue("G".$start, $val->kota); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("H".$start, $val->alamat); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("I".$start, $sts_vcon); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("J".$start, $val->durasi); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("K".$start, $room); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("L".$start, $room); 
			 
			$start++;
		}
		  
        $objPHPExcel->getActiveSheet(0)->setTitle('GIVEN');
		
						
//<!-------------------------------------------------------------------------------  --->		
		$nama_file="DATA VCON ".date("d-m-Y")." pukul ".date("h.i")."wib";
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$nama_file.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
	 
	}
	
	
	function download_online()
	{
		 
		$zoomin				=	$this->input->get_post("zoomin"); 
		$event				=	$this->input->get_post("event");
		  
			$zoomin		=	$this->input->get_post("zoomin");  
			if($zoomin==1){ 
				 $this->db->where("registrant_id IS NOT NULL"); 
			}elseif($zoomin==2){ 
				 $this->db->where("registrant_id IS NULL"); 
			}
			
			$event		=	$this->input->get_post("event");  
			if($event){ 
				 $this->db->where("id_event",$event); 
			} 
		
		
			$join		=	$this->input->get_post("join");  
			if($join){ 
				 $this->db->where("durasi>=",$join); 
			} 
		
		
		
		
			$negara		=	$this->input->get_post("negara");  
			if($negara==1){ 
				 $this->db->where("id_negara",94); 
			}elseif($negara==2){ 
				 $this->db->where("id_negara!=94"); 
			}
			 
			
		    $id_pekerjaan		=	$this->input->get_post("id_pekerjaan");  
			if($id_pekerjaan){ 
				 $this->db->where("id_pekerjaan",$id_pekerjaan); 
			} 
			
		  $this->db->where("id_type",2);
		 $data=$this->db->get("zoom_data");
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
			    $objPHPExcel->getActiveSheet(0)->setCellValue('C1',"GENDER");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('D1',"EMAIL");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('E1',"HP");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('F1',"PEKERJAAN");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('G1',"NEGARA");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('H1',"PROVINSI");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('I1',"KAB/KOTA"); 
			    $objPHPExcel->getActiveSheet(0)->setCellValue('J1',"ALAMAT");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('K1',"STATUS VCON");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('L1',"DURASI JOIN (menit)");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('M1',"ROOM EVENT");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('N1',"ALASAN MENGIKUTI");
			    
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("A")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("B")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("C")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("D")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("E")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("F")->setAutoSize(true);
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
			$ket_pekerjaan	=	"";
			if($val->registrant_id)
			{
				$sts_vcon	=	"Masuk";
			}else{
				$sts_vcon	=	"Draft";
			}
			
			if($val->jk=="l")
			{
				$gender		=	"Laki-laki";
			}else{
				$gender		=	"Perempuan";
			}
			
			$negara			=	$this->m_reff->namaNegara($val->id_negara); 
			$alamat			=	$val->alamat;
			if($val->id_negara==94)
			{	
				$kota			=	ucwords(strtolower($this->m_reff->namaKota($val->id_kab)));
				$provinsi		=	$this->m_reff->namaProvinsi($val->id_prov);
			}else{ 
				$kota			=	"";
				$provinsi		=	"";
			}
			 
			 if($val->id_pekerjaan==4)
			{ 
					$pekerjaan		=	"Wartawan ".$val->job_media; 
			}else if($val->id_pekerjaan==5)
			{
				$pekerjaan		=	$val->pekerjaan_lainnya;
			}else if($val->id_pekerjaan==1)
			{
				$pekerjaan		=	"ASN - ".$val->instansi;
			}else{
				$pekerjaan		=	$this->m_reff->goField("tr_pekerjaan","nama","where id='".$val->id_pekerjaan."' ");
			}
			 
			 
			 
			
			$room			=	$this->m_reff->goField("zoom_event","title","where id='".$val->id_event."' ");
		 	$objPHPExcel->getActiveSheet(0)->setCellValue("A".$start, $no++);
			$objPHPExcel->getActiveSheet(0)->setCellValue("B".$start, $val->nama);
			$objPHPExcel->getActiveSheet(0)->setCellValue("C".$start, $gender);
			$objPHPExcel->getActiveSheet(0)->setCellValue("D".$start, $val->email);
			$objPHPExcel->getActiveSheet(0)->setCellValue("E".$start, "'".$val->hp);
			$objPHPExcel->getActiveSheet(0)->setCellValue("F".$start, $pekerjaan); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("G".$start, $negara); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("H".$start, $provinsi); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("I".$start, $kota); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("J".$start, $alamat); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("K".$start, $sts_vcon); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("L".$start, $val->durasi); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("M".$start, $room); 
			$objPHPExcel->getActiveSheet(0)->setCellValue("N".$start, $val->alasan_mengikuti); 
		 
 
			 
			$start++;
		}
		  
        $objPHPExcel->getActiveSheet(0)->setTitle('ONLINE');
		
						
//<!-------------------------------------------------------------------------------  --->		
		$nama_file="DATA VCON ONLINE - ".date("d-m-Y")." pukul ".date("h.i")."wib";
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$nama_file.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
	 
	}
	function jmlDalamNegeri()
	{
		$this->db->where("id_type",2);
		$this->db->where("id_negara",94);
		return	$this->db->get("zoom_data")->num_rows();
	}function totalOnline()
	{
		$this->db->where("id_type",2);
		return	$this->db->get("zoom_data")->num_rows();
	}function jmlLuarNegeri()
	{	$this->db->where("id_type",2);
		$this->db->where("id_negara!=",94);
		return $this->db->get("zoom_data")->num_rows();
	}
	
	function import_zoom($file_form)
	{		
	
	 
		$this->load->library("PHPExcel");
		$insert=0;$gagal=0;$edit=0;$validasi_hp=true;$validasi=true;$data="";
		$file   = explode('.',$_FILES[$file_form]['name']);
		$length = count($file);
		if($file[$length -1] == 'xlsx' || $file[$length -1] == 'xls'){
         $tmp    = $_FILES[$file_form]['tmp_name']; 
	 
			    $load = PHPExcel_IOFactory::load($tmp);
                $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
				$i=1;
		 	 
				 
			
				foreach ($sheets as $sheet) {
					//$cek	=	isset($sheet[9])?($sheet[9]):"";
					 
					//	if($cek!="HP"){
					//		$var["gagal"]=true;
					//	  $var["info"]="Gagal! Salah format upload...".$cek;
					//	  return $var;
					//	}
					 
						$kode	=	$this->m_reff->acak(10);
					if ($i > 1) {	 
					
									 $email		=	isset($sheet[2])?($sheet[2]):"";	
									 $email		=	str_replace("`","",$email);						 
									 $email		=	str_replace("'","",$email);						 
									 $email		=	str_replace(",","",$email);		
									 $email		=	str_replace(" ","",$email);		
									  
									 $nama		=	isset($sheet[1])?($sheet[1]):""; 
									
							 if($email){ 
									
									 
									 $hp		=	isset($sheet[3])?($sheet[3]):"";						 
									 $hp		=	str_replace("`","",$hp);						 
									 $hp		=	str_replace(" ","",$hp);						 
									 $hp		=	str_replace("-","",$hp);						 
									 $hp		=	str_replace("'","",$hp);						 
									 $hp		=	str_replace(",","",$hp);						 
									 $hp		=	str_replace("+62","0",$hp);		
												$digit0=substr($hp,0,1);
												if($digit0!="0")
												{
													$hp="0".$hp;
												}
									 $zoomID	=	isset($sheet[4])?($sheet[4]):"";	
									 $jabatan	=	isset($sheet[5])?($sheet[5]):"";	
									 $instansi	=	isset($sheet[6])?($sheet[6]):"";	
									 $kota		=	isset($sheet[7])?($sheet[7]):"";	
									 $alamat	=	isset($sheet[8])?($sheet[8]):"";	
									 
									$cek		=	$this->db->get_where("zoom_data",array("email"=>$email))->num_rows();
									if(!$cek){
										$dataray=array(
											"id_type"			=>	1,
											"nama"				=>	$nama,  
											"email"				=>	$email,
											"hp"				=>	$hp,
											"id_event"			=>	$zoomID,
											"kota"				=>	$kota,
											"alamat"			=>	$alamat,
											"jabatan"			=>	$jabatan,
											"instansi"			=>	$instansi,
											"durasi"			=>	0,
											"_cid"				=>	$this->idu(),
											);
										$this->db->insert("zoom_data",$dataray);
										$insert++;  
										//$this->kirimNotifPersus($kode,$dataray);
									}else{
										$edit++;
										$data.="<br>Baris : ".$i." - " .$email;
									}
								} 
					}
					$i++;
					
                }
                
       } else{
			 $var["file"]=false;
			 $var["type_file"]="<br>&nbsp;&nbsp;File Excell";
		}
			  $var["import_data"]=true;
			  $var["insert"]=$insert;
			  $var["data"]=$data;
			  $var["gagal"]=$gagal;
			  $var["edit"]=$edit; 
			  $var["validasi"]=$validasi;
		return $var;
	}
	
	
	function import_zoom_online($file_form)
	{		
	
	 
		$this->load->library("PHPExcel");
		$insert=0;$gagal=0;$edit=0;$validasi_hp=true;$validasi=true;$data="";
		$file   = explode('.',$_FILES[$file_form]['name']);
		$length = count($file);
		if($file[$length -1] == 'xlsx' || $file[$length -1] == 'xls'){
         $tmp    = $_FILES[$file_form]['tmp_name']; 
	 
			    $load = PHPExcel_IOFactory::load($tmp);
                $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
				$i=1;
		 	 
				 
			
				foreach ($sheets as $sheet) {
					//$cek	=	isset($sheet[9])?($sheet[9]):"";
					 
					//	if($cek!="HP"){
					//		$var["gagal"]=true;
					//	  $var["info"]="Gagal! Salah format upload...".$cek;
					//	  return $var;
					//	}
					 
						$kode	=	$this->m_reff->acak(10);
					if ($i > 1) {	 
					
									 $email		=	isset($sheet[2])?($sheet[2]):"";	
									 $email		=	str_replace("`","",$email);						 
									 $email		=	str_replace("'","",$email);						 
									 $email		=	str_replace(",","",$email);		
									 $email		=	str_replace(" ","",$email);		
									  
									 $nama		=	isset($sheet[1])?($sheet[1]):""; 
									
							 if($email){ 
									
									 
									 $hp		=	isset($sheet[3])?($sheet[3]):"";						 
									 $hp		=	str_replace("`","",$hp);						 
									 $hp		=	str_replace(" ","",$hp);						 
									 $hp		=	str_replace("-","",$hp);						 
									 $hp		=	str_replace("'","",$hp);						 
									 $hp		=	str_replace(",","",$hp);						 
									 $hp		=	str_replace("+62","0",$hp);		
												$digit0=substr($hp,0,1);
												if($digit0!="0")
												{
													$hp="0".$hp;
												}
									 $zoomID	=	isset($sheet[4])?($sheet[4]):"";	
									 $jabatan	=	isset($sheet[5])?($sheet[5]):"";	
									 $instansi	=	isset($sheet[6])?($sheet[6]):"";	
									 $kota		=	isset($sheet[7])?($sheet[7]):"";	
									 $alamat	=	isset($sheet[8])?($sheet[8]):"";	
									 
									$cek		=	$this->db->get_where("zoom_data",array("email"=>$email))->num_rows();
									if(!$cek){
										$dataray=array(
											"id_type"			=>	2,
											"nama"				=>	$nama,  
											"email"				=>	$email,
											"hp"				=>	$hp,
											"id_event"			=>	$zoomID,
											"kota"				=>	$kota,
											"alamat"			=>	$alamat,
											"pekerjaan_lainnya"			=>	$jabatan,
											"instansi"			=>	$instansi,
											"id_negara"			=>	94,
											"id_pekerjaan"		=>	5,
											"_cid"				=>	$this->idu(),
											);
										$this->db->insert("zoom_data",$dataray);
										$insert++;  
										//$this->kirimNotifPersus($kode,$dataray);
									}else{
										$edit++;
										$data.="<br>Baris : ".$i." - " .$email;
									}
								} 
					}
					$i++;
					
                }
                
       } else{
			 $var["file"]=false;
			 $var["type_file"]="<br>&nbsp;&nbsp;File Excell";
		}
			  $var["import_data"]=true;
			  $var["insert"]=$insert;
			  $var["data"]=$data;
			  $var["gagal"]=$gagal;
			  $var["edit"]=$edit; 
			  $var["validasi"]=$validasi;
		return $var;
	}
	function import_durasi($file_form)
	{		
	
	 
		$this->load->library("PHPExcel");
		$insert=0;$gagal=0;$edit=0;$validasi_hp=true;$validasi=true;
		$file   = explode('.',$_FILES[$file_form]['name']);
		$length = count($file);
		if($file[$length -1] == 'xlsx' || $file[$length -1] == 'xls'){
         $tmp    = $_FILES[$file_form]['tmp_name']; 
	 
			    $load = PHPExcel_IOFactory::load($tmp);
                $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
				$i=1;
		 	 
				 
			
				foreach ($sheets as $sheet) {
					  
					if ($i > 1) {	 
							 $email		=	isset($sheet[1])?($sheet[1]):""; 
							 $durasi	=	isset($sheet[2])?($sheet[2]):""; 
							 $nama		=	isset($sheet[0])?($sheet[0]):""; 
						//	 $exp		=	explode("#",$nama);
							// $uid		=	isset($exp[1])?($exp[1]):"";
							// $uid		=	trim($uid);
							 
							 
								$dataray=array(
								"durasi"=>$durasi
								);
								$this->db->where("email",$email);
								$this->db->update("zoom_data",$dataray);
								$insert++;  
								//$this->kirimNotifPersus($kode,$dataray);
							  
					}
					$i++;
                }
                
       } else{
			 $var["file"]=false;
			 $var["type_file"]="<br>&nbsp;&nbsp;File Excell";
		}
			  $var["import_data"]=true;
			  $var["insert"]=$insert;
			  $var["gagal"]=$gagal;
			  $var["edit"]=$edit; 
			  $var["validasi"]=$validasi;
		return $var;
	}
	function seProv($id_prov)
	{		$this->db->where("id_prov",$id_prov);
			return $this->db->get("zoom_data")->num_rows();
	}function seKab($id_kab)
	{		$this->db->where("id_kab",$id_kab);
			return $this->db->get("zoom_data")->num_rows();
	}function getSenegara($id_negara)
	{		 
		$this->db->where("id_negara",$id_negara);
		return $this->db->get("zoom_data")->num_rows();
		 
	}
	function totalData($type=null)
	{		
		if($type)
		{
			$this->db->where("id_type",$type);
		} 
		return $this->db->get("zoom_data")->num_rows();
		 
	}
	function totalDataMasuk($type=null)
	{		
		if($type)
		{
			$this->db->where("id_type",$type);
		} 
			$this->db->where("registrant_id IS NOT NULL");
		return $this->db->get("zoom_data")->num_rows();
		 
	}function jmlPekerjaan($id=null)
	{		 $this->db->where("id_type",2);
			$this->db->where("id_pekerjaan",$id); 
		return $this->db->get("zoom_data")->num_rows();
		 
	}function jmlNegara($id=null)
	{		 $this->db->where("id_type",2);
			$this->db->where("id_negara",$id); 
		return $this->db->get("zoom_data")->num_rows();
		 
	}
	function persen($total,$input)
	{
		if(!$total){ return 0;}
		return number_format(($input/$total)*100,0,",",".");
	}
	
	function save_konten_sertifikat()
	{	
			$idu	=	$this->idu();
			if(isset($_FILES["file"]['tmp_name']))
			{  
				$dok 	=	$this->m_reff->tm_pengaturan(37)."sertifikat";
				$file	=	$this->upload_file("file",$dok,$idu);
				if($file["validasi"]!=false)
				{ 
					$this->db->set("val",$file["name"]);
					$this->db->where("id",65);
					$this->db->update("tm_pengaturan");
				}
			 
			} 
					$this->db->set("val",$this->input->post("email"));
					$this->db->where("id",63);
					$this->db->update("tm_pengaturan");
					
			return true;		
	}function save_konten_sertifikat_given()
	{	
			$idu	=	$this->idu();
			if(isset($_FILES["file"]['tmp_name']))
			{  
				$dok 	=	$this->m_reff->tm_pengaturan(37)."sertifikat";
				$file	=	$this->upload_file("file",$dok,$idu);
				if($file["validasi"]!=false)
				{ 
					$this->db->set("val",$file["name"]);
					$this->db->where("id",88);
					$this->db->update("tm_pengaturan");
				}
			 
			} 
					$this->db->set("val",$this->input->post("email"));
					$this->db->where("id",87);
					$this->db->update("tm_pengaturan");
					
			return true;		
	}
		function save_konten_undangan_ID()
	{	
			$idu	=	$this->idu();
			if(isset($_FILES["file"]['tmp_name']))
			{  
				$dok 	=	$this->m_reff->tm_pengaturan(37)."sertifikat";
				$file	=	$this->upload_file_pdf("file",$dok,$idu);
				if($file["validasi"]!=false)
				{ 
					$this->db->set("val",$file["name"]);
					$this->db->where("id",72);
					$this->db->update("tm_pengaturan");
				}
			 
			} 
					$this->db->set("val",$this->input->post("email"));
					$this->db->where("id",75);
					$this->db->update("tm_pengaturan");
					
			return true;		
	}
	
	function save_konten_undangan_EN()
	{	
			$idu	=	$this->idu();
			if(isset($_FILES["file"]['tmp_name']))
			{  
				$dok 	=	$this->m_reff->tm_pengaturan(37)."sertifikat";
				$file	=	$this->upload_file_pdf("file",$dok,$idu);
				if($file["validasi"]!=false)
				{ 
					$this->db->set("val",$file["name"]);
					$this->db->where("id",76);
					$this->db->update("tm_pengaturan");
				}
			 
			} 
					$this->db->set("val",$this->input->post("email"));
					$this->db->where("id",79);
					$this->db->update("tm_pengaturan");
					
			return true;		
	}
	
	function save_konten_sertifikat_EN()
	{	
			$idu	=	$this->idu();
			if(isset($_FILES["file"]['tmp_name']))
			{  
				$dok 	=	$this->m_reff->tm_pengaturan(37)."sertifikat";
				$file	=	$this->upload_file("file",$dok,$idu);
				if($file["validasi"]!=false)
				{ 
					$this->db->set("val",$file["name"]);
					$this->db->where("id",70);
					$this->db->update("tm_pengaturan");
				}
			 
			} 
					$this->db->set("val",$this->input->post("email"));
					$this->db->where("id",67);
					$this->db->update("tm_pengaturan");
					
			return true;		
	}
	
	
	function upload_file_pdf($form,$dok,$id=null)
	{		
		$var=array();
		$var["size"]=""; 
		$var["file"]="";
		$var["validasi"]=false; 
 
	      $nama=$this->m_reff->acak(4);
		  $lokasi_file = $_FILES[$form]['tmp_name'];
		  $tipe_file   = $_FILES[$form]['type'];
		  $nama_file   = $_FILES[$form]['name'];
		   $size  	   = $_FILES[$form]['size'];
			$nama_file = str_replace(" ","_",$nama_file);
			// $jenis="jpg";
			$nama=str_replace("/","",$nama."_".$nama_file);
			 $target_path = $dok."/".$nama;
			 
			  $ex=substr($nama_file,-3);
			$extention=str_replace(" ","_",strtoupper($ex));
			
		 $maxsize = 300000000000;
		  if($extention!="PDF" AND $extention!="pdf"){
			$var["file"]=$extention;
		 }else{
		 	$var["validasi"]=true;
			if (!empty($lokasi_file)) {
		 	move_uploaded_file($lokasi_file,$target_path);
		 
			//	if($id)
			//	{
				/*	$namapotoid=$this->m_reff->goField("tm_pengaturan","val","where id='65'");
					$file_namapotoid=$dok."/".$namapotoid;
					if(file_exists($file_namapotoid) and $namapotoid)
					{
						unlink($file_namapotoid);
					}*/
			//	}
			
			 }
			$var["name"]=$nama;
		 }
		 
		// $this->cek_rotation();
		 return $var;
	}
	function upload_file($form,$dok,$id=null)
	{		
		$var=array();
		$var["size"]=""; 
		$var["file"]="";
		$var["validasi"]=false; 
 
	      $nama=$this->m_reff->acak(4);
		  $lokasi_file = $_FILES[$form]['tmp_name'];
		  $tipe_file   = $_FILES[$form]['type'];
		  $nama_file   = $_FILES[$form]['name'];
		   $size  	   = $_FILES[$form]['size'];
			$nama_file = str_replace(" ","_",$nama_file);
			// $jenis="jpg";
			$nama=str_replace("/","",$nama."_".$nama_file);
			 $target_path = $dok."/".$nama;
			 
			  $ex=substr($nama_file,-3);
			$extention=str_replace(" ","_",strtoupper($ex));
			
		 $maxsize = 300000000;
		 if($size>=$maxsize)
		 {
			$var["size"]=$size; 
		 }elseif($extention!="JPG" AND $extention!="PNG"){
			$var["file"]=$extention;
		 }else{
		 	$var["validasi"]=true;
			if (!empty($lokasi_file)) {
		 	move_uploaded_file($lokasi_file,$target_path);
		 
			//	if($id)
			//	{
				/*	$namapotoid=$this->m_reff->goField("tm_pengaturan","val","where id='65'");
					$file_namapotoid=$dok."/".$namapotoid;
					if(file_exists($file_namapotoid) and $namapotoid)
					{
						unlink($file_namapotoid);
					}*/
			//	}
			
			 }
			$var["name"]=$nama;
		 }
		 
		// $this->cek_rotation();
		 return $var;
	}
	
}
