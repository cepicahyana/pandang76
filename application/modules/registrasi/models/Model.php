<?php

class Model extends CI_Model  {
    
	var $tbl="data_peserta_rakor";
	var $id="1";
	function __construct()
    {
        parent::__construct();
    }
	function tbl()
	{
		return $this->tbl;
	}
	function save_set()
	{
		$id_acara	=	$this->input->get_post("id_acara");
		$field		=	$this->input->get_post("field");
		$konten		=	$this->input->get_post("konten");
		$this->db->set($field,$konten);
		$this->db->where("id",$this->id);
		return $this->db->update("tr_jenis_undangan");
	}
	function noSurat()
	{			$val=$this->input->get_post("val");
				$this->db->set("no_surat",$val);
				$this->db->where("id",$this->id_acara());
		return  $this->db->update("tr_jenis_undangan");
	}function setDeputi()
	{			$val=$this->input->get_post("val");
				$this->db->set("pimpinan",$val);
				$this->db->where("id",$this->id_acara());
		return  $this->db->update("tr_jenis_undangan");
	}function isi_undangan()
	{			$val=$this->input->get_post("isi_undangan");
				$this->db->set("isi_undangan",$val);
				$this->db->where("id",$this->id_acara());
		return  $this->db->update("tr_jenis_undangan");
	}function lampiran2()
	{			$val=$this->input->get_post("lampiran2");
				$this->db->set("lampiran2",$val);
				$this->db->where("id",$this->id_acara());
		return  $this->db->update("tr_jenis_undangan");
	}
	function idu()
	{
		return $this->session->userdata("id");
	}
	function id_acara()
	{
		return $this->id;
	}
	
	function no_surat()
	{
		$r				=	$this->m_reff->goField("tr_jenis_undangan","no_surat","where id='".$this->id."'");
		$agendalast		=	$this->m_reff->goField("data_acara","no_surat","where id_acara='".$this->id_acara()."' order by tgl desc limit 1");
		$bulan		=	date("m"); $bulan	= sprintf("%02s", $bulan);
		$agendalast		=	str_replace("R-","",$agendalast);
		$agenda		=	explode("/",$agendalast);

		$noagenda	=	isset($agenda[0])?($agenda[0]):"";
		if($noagenda)
		{
		 
			$noagenda	= trim($noagenda+1);
		}else{
			$noagenda	=	"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		
		
		$tahun	=	date("Y"); 
		$hasil	=	str_replace("{agenda}",$noagenda,$r);
		$hasil	=	str_replace("{bln}",$bulan,$hasil);
		return 	str_replace("{tahun}",$tahun,$hasil);
		
	}
	function _cekNik($nik)
	{
			   $this->db->where("nik",$nik);
		return $this->db->get("v_peserta")->num_rows();
	}function _cekHp($hp)
	{
			   $this->db->where("hp",$hp);
		return $this->db->get("v_peserta")->num_rows();
	}function _cekEmail($email)
	{
			   $this->db->where("email",$email);
		return $this->db->get("v_peserta")->num_rows();
	}
	function  cekInputPersus($nama,$ket)
	{
		$this->db->where("nama",$nama);
		$this->db->where("ket",$ket);
		return $this->db->get("data_persus")->num_rows();
	}
	function  cekInputRangkai($nama,$ket)
	{
		$this->db->where("nama",$nama);
		$this->db->where("ket",$ket);
		return $this->db->get("data_rangkaian_acara")->num_rows();
	}
	function insert_persus()
    {
				$email	=	$this->input->get_post("f[email']");
    			$hp		=	$this->input->get_post("f[hp]");
    			$nama	=	$this->input->get_post("f[nama]");
    			$ket	=	$this->input->get_post("f[ket]");
    			$jper	=	$this->input->get_post("f[jenis_permohonan]");
    			$jml	=	$this->input->get_post("f[jml]");
    			$instansi	=	$this->input->get_post("f[instansi]");
				$kode	=	date('YmdHis').$this->m_reff->acak(3);
    			$form	=	$this->input->post("f");
				if(!$form){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
				$cekPersus	= null;//	$this->cekInputPersus($nama,$ket);
				
				if($jper==2 or $jper==3)
				{
					if($cekPersus)
					{
						$var["gagal"]=true;
						$var["info"]="Gagal! nama pemohon sudah pernah diinput silahkan isi kolom keterangan sebagai pembeda.";
						return $var;
					}
					$db="data_persus";
					$this->kirimNotifPersus($kode,$form);
					unset($form['jml']);
				}elseif($jper==4){
					$cek	=	null;//$this->cekInputRangkai($nama,$ket);
					if($cek)
					{
						$var["gagal"]=true;
						$var["info"]="Gagal! nama pemohon sudah pernah diinput silahkan isi kolom keterangan sebagai pembeda.";
						return $var;
					}
					
					unset($form['jml_pagi']);
					unset($form['jml_sore']);
					for($i=0;$i<$jml;$i++)
					{
						$this->insert_peserta_suci($kode,$form);
					}
					$this->kirimNotifRangkaian($kode,$form);
					$db="data_rangkaian_acara";
				  
				}else{
					$cek	=	null;//$this->cekInputRangkai($nama,$ket);
					if($cek)
					{
						$var["gagal"]=true;
						$var["info"]="Gagal! nama pemohon sudah pernah diinput silahkan isi kolom keterangan sebagai pembeda.";
						return $var;
					}
					
					unset($form['jml_pagi']);
					unset($form['jml_sore']);
					for($i=0;$i<$jml;$i++)
					{
						$this->insert_peserta_rangkaian($kode,$form);
					}
					$this->kirimNotifRangkaian($kode,$form);
					$db="data_rangkaian_acara";
				 
				}
				 
				 
				
				$this->db->set("_cid",$this->idu());
				$this->db->set("kode",$kode);
				$this->db->set($form);
		return 	$this->db->insert($db);
	}
	
	function insert_persus_souvenir()
    {
				$email		=	$this->input->get_post("f[email']");
    			$hp			=	$this->input->get_post("f[hp]");
    			$nama		=	$this->input->get_post("f[nama]");
    			$ket		=	$this->input->get_post("f[ket]"); 
    			$jml		=	$this->input->get_post("f[jml]");
    			$instansi	=	$this->input->get_post("f[instansi]"); 
				$kode		=	$this->m_reff->acak(10);
    			$form		=	$this->input->post("f");
				if(!$form){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var; 
				}
				 
					$db="data_persus"; 
					unset($form['jml']);
				 
			  
				$this->db->set("_cid",$this->idu());
				$this->db->set("jenis_permohonan",2);
				$this->db->set("kode",$kode);
				$this->db->set($form);
		return 	$this->db->insert($db);
	}
	function kirimNotifRangkaian($kode,$form)
	{       $hp		=	$form["hp"];
			$acara	=	$this->m_reff->goField("tr_kategory","nama","where id='".$form['jenis_permohonan']."'");
            $to     =   $form["email"];
            $isi    =   $this->isiEMailRangkaian($kode,$form,$acara);
            $subject=   "Permohonan Undangan ".$acara;  
            $isiWa  =   $this->isiWaRangkaian($kode,$form,$acara); 
            $isiSms =   $this->isiSmsRangkaian($kode,$form,$acara); 
                       
			    $this->m_reff->kirimEmail($to,$subject,$isi);   
    		    $this->m_reff->kirimSms($hp,$isiSms);
				$this->m_reff->kirimWa($hp,$isiWa);
			 	 
	 
	}
	function isiEMailRangkaian($kode,$form,$acara)
	{
		$nama		=	$form['nama'];
		$instansi	=	$form['instansi'];
		$jml		=	$form['jml'];
	   
		$data	=	$this->m_reff->tm_pengaturan(21);
		$data	=	str_replace("{undangan}","Undangan ".$acara,$data);
		$data	=	str_replace("{nama}",$nama,$data);
		$data	=	str_replace("{instansi}",$instansi,$data);
		$data	=	str_replace("{jml}",$jml,$data);
		$data	=	str_replace("{kode}",$kode,$data);
		return $isi=$this->m_umum->email_temp($data);
	}
	function isiWaRangkaian($kode,$form,$acara)
	{
		$nama		=	$form['nama'];
		$instansi	=	$form['instansi'];
		$jml		=	$form['jml'];
		
		$data	=	$this->m_reff->tm_pengaturan(22);
		$data	=	str_replace("{undangan}","Undangan ".$acara,$data);
		$data	=	str_replace("{nama}",$nama,$data);
		$data	=	str_replace("{instansi}",$instansi,$data);
		$data	=	str_replace("{jml}",$jml,$data);
		$data	=	str_replace("{kode}",$kode,$data);
		return $data;
	}function isiSmsRangkaian($kode,$form,$acara)
	{
		$nama		=	$form['nama'];
		$instansi	=	$form['instansi'];
		$jml		=	$form['jml'];
		
		$data	=	$this->m_reff->tm_pengaturan(23);
		$data	=	str_replace("{undangan}","Undangan ".$acara,$data);
		$data	=	str_replace("{nama}",$nama,$data);
		$data	=	str_replace("{instansi}",$instansi,$data);
		$data	=	str_replace("{jml}",$jml,$data);
		$data	=	str_replace("{kode}",$kode,$data);
		return $data;
	}
	/*==========Notif perusus==============*/
	
	function kirimNotifPersus($kode,$form)
	{       
			$hp		=	$form["hp"]; 
            $to     =   $form['email'];
            $isi    =   $this->isiEMailPersus($kode,$form );
            $subject=   "Permohonan Undangan Upacara HUT RI-75";  
            $isiWa  =   $this->isiWaPersus($kode,$form ); 
            $isiSms =   $this->isiSmsPersus($kode,$form ); 
                         
			    $this->m_reff->kirimEmail($to,$subject,$isi);   
    		    $this->m_reff->kirimSms($hp,$isiSms);
				$this->m_reff->kirimWa($hp,$isiWa);
			 	 
	 
	}
	function isiEMailPersus($kode,$form )
	{
		$nama		=	$form['nama'];
		$instansi	=	$form['instansi'];
		$jml_pagi	=	$form['jml_pagi'];
		$jml_sore	=	$form['jml_sore'];
	 
		
		$data	=	$this->m_reff->tm_pengaturan(24);
		$data	=	str_replace("{undangan}","Undangan HUT RI-75",$data);
		$data	=	str_replace("{nama}",$nama,$data);
		$data	=	str_replace("{instansi}",$instansi,$data);
		$data	=	str_replace("{jml_pagi}",$jml_pagi,$data);
		$data	=	str_replace("{jml_sore}",$jml_sore,$data);
		$data	=	str_replace("{kode}",$kode,$data);
		return $isi=$this->m_umum->email_temp($data);
	}
	
	function isiWaPersus($kode,$form )
	{
		$nama		=	$form['nama'];
		$instansi	=	$form['instansi'];
		$jml_pagi	=	$form['jml_pagi']; 
		$jml_sore	=	$form['jml_sore']; 
		
		$data	=	$this->m_reff->tm_pengaturan(25);
		$data	=	str_replace("{undangan}","Undangan HUT RI-75",$data);
		$data	=	str_replace("{nama}",$nama,$data);
		$data	=	str_replace("{instansi}",$instansi,$data);
		$data	=	str_replace("{jml_pagi}",$jml_pagi,$data);
		$data	=	str_replace("{jml_sore}",$jml_sore,$data);
		$data	=	str_replace("{kode}",$kode,$data);
		return $data;
	}
	function isiSmsPersus($kode,$form )
	{
		$nama		=	$form['nama'];
		$instansi	=	$form['instansi'];
		$jml_pagi	=	$form['jml_pagi']; 
		$jml_sore	=	$form['jml_sore']; 
		
		$data	=	$this->m_reff->tm_pengaturan(26);
		$data	=	str_replace("{undangan}","Undangan Upacara HUT RI-75",$data);
		$data	=	str_replace("{nama}",$nama,$data);
		$data	=	str_replace("{instansi}",$instansi,$data);
		$data	=	str_replace("{jml_pagi}",$jml_pagi,$data);
		$data	=	str_replace("{jml_sore}",$jml_sore,$data);
		$data	=	str_replace("{kode}",$kode,$data);
		return $data;
	}
	/*=========END===============*/
	function insert_peserta_rangkaian($kode,$form)
	{	unset($form['jml']);
		$this->db->set("kode_rangkaian",$kode);
		$this->db->set($form);
		return 	$this->db->insert("data_peserta_rangkaian");
	}function insert_peserta_suci($kode,$form)
	{	unset($form['jml']);
		unset($form['jenis_permohonan']);
		$this->db->set("r_suci",1);
		$this->db->set("id_kategory",4);
		$this->db->set("nik",$this->m_reff->acak(17));
		$this->db->set("kode_persus",$kode);
		$this->db->set($form);
		return 	$this->db->insert("data_peserta");
	}
	function insert()
	{
		$nik	=	$this->input->get_post("f[nik]");
		$hp		=	$this->input->get_post("f[hp]");
		$email	=	$this->input->get_post("f[email]");
		$cek	=	$this->_cekNik($nik);
		$cekHP	=	$this->_cekHp($hp);
		$cekEmail	=	$this->_cekEmail($email);
		if($cekEmail)
		{
			$var["gagal"]=true;
			$var["info"]="Gagal!! Email sudah terdaftar";
			return $var;
		}if($cek)
		{
			$var["gagal"]=true;
			$var["info"]="Gagal!! NIK sudah terdaftar";
			return $var;
		}if($cekHP)
		{
			$var["gagal"]=true;
			$var["info"]="Gagal!! Nomor HP sudah terdaftar";
			return $var;
		}
		$jml_pagi		=	$this->input->post("jml_pagi"); 
		$pagi_single	=	$this->input->post("pagi_single"); 
		$pagi_double	=	$this->input->post("pagi_double"); 
		$jml_sore		=	$this->input->post("jml_sore"); 
		$sore_single	=	$this->input->post("sore_single"); 
		$sore_double	=	$this->input->post("sore_double"); 
		 
		$tambahan=array(
		"jml_pagi"=>$jml_pagi,
		"jml_sore"=>$jml_sore,
		"jml_s_pagi"=>$pagi_single,
		"jml_s_sore"=>$sore_single,
		"jml_d_pagi"=>$pagi_double,
		"jml_d_sore"=>$sore_double
		); 
		if($jml_pagi)
		{
			$jml_pagi	=	$jml_pagi;
			$this->_insert_peserta($jml_pagi,1,null,$tambahan);
		}else{
			$this->_insert_peserta($pagi_double,1,2,$tambahan);
			$this->_insert_peserta($pagi_single,1,1,$tambahan);
		}	
		
		if($jml_sore)
		{
			$jml_sore	=	$jml_sore;
			$this->_insert_peserta($jml_sore,2,null,$tambahan);
		}else{ 
			$this->_insert_peserta($sore_double,2,2,$tambahan);
			$this->_insert_peserta($sore_single,2,1,$tambahan);
		}			
		 $f	    	=	$this->input->post("f");
		 $nik       =   $this->input->get_post("f[nik]");
		 $this->kirim_notif($nik);
	  	 $var["validasi"]=true;
		 return $var;
		
	}
	private function _insert_peserta($loop,$jenis,$berlaku,$tambahan)
	{
		for($i=1;$i<=$loop;$i++)
		{
			 $this->db->set($tambahan); 
			 $this->db->set("jenis",$jenis); 
			 $this->db->set("berlaku",$berlaku); 
			 $this->db->set("_cid",$this->idu()); 
			 $this->db->set("_ctime",date('Y-m-d H:i:s'));  
			 $f		=	$this->input->post("f");
			   $this->db->insert("data_peserta",$f); 
		}
		return true;
	}
	
	function insertxxxx()
	{
		$kode_acara		=	$this->input->post("f[kode_acara]");
		$durasi			=	$this->m_reff->goField("data_acara","durasi","where kode='".$kode_acara."' ");
		$tgl			=	$this->m_reff->goField("data_acara","tgl","where kode='".$kode_acara."' ");
		$qr				=	$this->m_reff->getCodeTamu($kode_acara);
		$this->m_reff->qr($kode_acara,$qr);
		$form			=	$this->input->post("f");
		
		$durasi="";$no=1;
		for($i=0;$i<=$durasi;$i++)
		{
			$tgl_pelaksanaan=$this->tanggal->tambahTgl($tgl,$i);
			$durasi[$no++][$tgl_pelaksanaan]=null;
		}
		
		$this->db->set($form);
		$this->db->set("cekin",$durasi);
		$this->db->set("sts_ikutserta",1);
		$this->db->set("qr",$qr);
		$this->db->set("_cid",$this->idu());
		return $this->db->insert("data_peserta");
	}
	 
	  
	function update()
	{ 	 $id	=	$this->input->post("id");
			
		 $tgl	=	$this->input->post("tgl");
		 $tgl	=	$this->tanggal->eng_($tgl,"-"); 
		 $this->db->set("_uid",$this->idu()); 
		 $this->db->set("_utime",date('Y-m-d')); 
		 $this->db->set("tgl",$tgl); 
		 $this->db->set("id_acara",$this->id);
		 $this->db->where("id",$this->input->post("id"));
		 $f		=	$this->input->post("f");
		
		  $this->db->update("data_acara",$f); 
		return $this->update_acara($id);
	}
	 
	  function update_acara($id)
	 {
		$kode	 = $this->m_reff->goField("data_acara","kode","where id='".$id."' ");
		$durasi	 = $this->m_reff->goField("data_acara","durasi","where id='".$id."' ");
		$tgl	 = $this->m_reff->goField("data_acara","tgl","where id='".$id."' ");
		$cekin="";$no=1;
		for($i=0;$i<$durasi;$i++)
		{
			$tgl_pelaksanaan=$this->tanggal->tambahTgl($tgl,$i);
			$cekin[$tgl_pelaksanaan]=null;
		}
		$cekin	=	json_encode($cekin);
		$this->db->set("cekin",$cekin);
		$this->db->where("kode_acara",$kode);
		return $this->db->update("data_peserta");
	 }
	 
	  function get_data()
	{
		$query=$this->_get_data();
		if($_POST['length'] != -1)
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		return $this->db->query($query)->result();
	}
	function _get_data()
	{
		    $pencarian=$this->input->get_post("pencarian");
		 if($pencarian)
		 {
			 $pencarian="AND (
				perihal LIKE '%".$pencarian."%' or  
				no_surat LIKE '%".$pencarian."%' or  
				tempat LIKE '%".$pencarian."%' or  
				acara LIKE '%".$pencarian."%'   
			   
				) ";
		 }
		 
		$query="select * from data_acara where 1=1  and id_acara='".$this->id."'  ".$pencarian;
			if($_POST['search']['value']){
			$searchkey=$_POST['search']['value'];
				$query.=" AND (
				perihal LIKE '%".$searchkey."%' or  
				no_surat LIKE '%".$searchkey."%' or  
				tempat LIKE '%".$searchkey."%' or  
				acara LIKE '%".$searchkey."%'   
				) ";
			}

		 
		if(isset($_POST['order']))
		{
		$query.=" order by id desc";
		} 
		else if(isset($order))
		{
			$order = $order;
			$query.=" order by ".key($order)." ".$order[key($order)] ;
		}
		return $query;
	}
	
	public function count()
	{				
		$query = $this->_get_data();
        return  $this->db->query($query)->num_rows();
	}
	
	
	
	
	  function _dataTamu()
	{
		$query=$this->_dataTamu_();
		if($_POST['length'] != -1)
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		return $this->db->query($query)->result();
	}
	function _dataTamu_()
	{
		    $kode=$this->input->get_post("kode"); 
		    $query=" AND kode_acara='".$kode."' ";
			
		 $blok=$this->input->get_post("blok");	
		 if($blok)
		 {
			   $query.=" AND blok LIKE '%".$blok."%' "; 
		 }

		 $nama=$this->input->get_post("nama");	
		 if($nama)
		 {
			   $query.=" AND (nama LIKE '%".$nama."%' OR qr LIKE '%".$nama."%') "; 
		 }
		 $jabatan=$this->input->get_post("jabatan");	
		 if($jabatan)
		 {
			   $query.=" AND jabatan LIKE '%".$jabatan."%' "; 
		 }
		 $alamat=$this->input->get_post("alamat");	
		 if($alamat)
		 {
			   $query.=" AND alamat LIKE '%".$alamat."%' "; 
		 }
		 $ikutserta=$this->input->get_post("ikutserta");	
		 if($ikutserta!="")
		 {
			   $query.=" AND sts_ikutserta LIKE '%".$ikutserta."%' "; 
		 }
		 $kehadiran=$this->input->get_post("kehadiran");	
		 if($kehadiran!="")
		 {
			   $query.=" AND sts_kehadiran LIKE '%".$kehadiran."%' "; 
		 }
		 
		$query="select * from data_peserta where 1=1   ".$query;
			if($_POST['search']['value']){
			$searchkey=$_POST['search']['value'];
				$query.=" AND (
				nama LIKE '%".$searchkey."%' or  
				jabatan LIKE '%".$searchkey."%' or  
				qr LIKE '%".$searchkey."%' or  
				alamat LIKE '%".$searchkey."%'   
				) ";
			}

		 
		if(isset($_POST['order']))
		{
		$query.=" order by id desc";
		} 
		else if(isset($order))
		{
			$order = $order;
			$query.=" order by ".key($order)." ".$order[key($order)] ;
		}
		return $query;
	}
	
	public function count_tamu()
	{				
		$query = $this->_dataTamu_();
        return  $this->db->query($query)->num_rows();
	}
	
	function show_file_xl()
	{
		$id= $this->input->get("id"); 
		$this->db->where("id",$id);
		$db=$this->db->get("file_peserta")->row();
		$kode_acara=isset($db->kode_acara)?($db->kode_acara):"";
		if(!$kode_acara){ echo "<i>Acara tidak ditemukan</i>"; return false;}

		$peserta=$db->peserta;
		$r_peserta=json_decode($peserta,true);
		 
		 
		$data=$this->db->query("select * from data_acara where kode='".$kode_acara."' ")->row(); 
		$no_surat=$data->no_surat;

		$title=$db->title;
		$r_title=json_decode($title,true);

 
 
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
		
		 
			 
		 
	 
        $awal="A";$jml=0;
        foreach($r_title as $t)
		{		
			    $objPHPExcel->getActiveSheet(0)->setCellValue($awal.'1', strtoupper($t));
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension($awal)->setAutoSize(true);
				$objPHPExcel->getActiveSheet(0)->getStyle( $awal.'1')->applyFromArray($style);
				 $jml++;$awal++;
		} 
  
      
	  
		$no=0; $awal="A"; $start=1;
		foreach($r_peserta as $key=>$val)
		{	$start++;
			$isi="";$no++;
		 
			$awal_isi="A";
			for($i=0;$i<$jml;$i++){ 
				$objPHPExcel->getActiveSheet(0)->setCellValue($awal_isi++.$start, $val[$i]);
			} 
		}
		  
        $objPHPExcel->getActiveSheet(0)->setTitle('TAMU UNDANGAN');
		
						
//<!-------------------------------------------------------------------------------  --->		
     
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$db->nama_file.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
	}
	  	
	function import_persus($file_form)
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
		 	 
				 $jenis_permohonan	=	$this->input->post("id_kategory");
			
				foreach ($sheets as $sheet) {
						$kode	=	$this->m_reff->acak(17);
					if ($i > 1) {	 
							 $nama		=	isset($sheet[1])?($sheet[1]):"";						 
							 $instansi	=	isset($sheet[2])?($sheet[2]):"";						 
							 $jml_pagi	=	isset($sheet[3])?($sheet[3]):"";						 
							 $jml_pagi	=	(int)$jml_pagi;
							 $jml_sore	=	isset($sheet[4])?($sheet[4]):"";	
							 $jml_sore	=	(int)$jml_sore;
					 
							 $email		=	isset($sheet[5])?($sheet[5]):"";						 
							 $hp		=	isset($sheet[6])?($sheet[6]):"";						 
							 $hp		=	str_replace("`","",$hp);						 
							 $hp		=	str_replace("'","",$hp);						 
							 $hp		=	str_replace(",","",$hp);						 
							 $ket		=	isset($sheet[7])?($sheet[7]):"";						 
							if($jenis_permohonan==2 or $jenis_permohonan==3)
							{
								$dataray=array(
									"jenis_permohonan"	=>	$jenis_permohonan,
									"kode"			=>	$kode,
									"nama"			=>	$nama, 
									"instansi"		=>	$instansi, 
									"jml_pagi"		=>	$jml_pagi,
									"jml_sore"		=>	$jml_sore,
									"email"			=>	$email,
									"hp"			=>	$hp,
									"ket"			=>	$ket,
									"_cid"			=>	$this->idu(),
									);
								$this->db->insert("data_persus",$dataray);
								$insert++;  
								$this->kirimNotifPersus($kode,$dataray);
							}elseif($jenis_permohonan==4){
								$dataray=array(
									"jenis_permohonan"	=>	$jenis_permohonan,
									"kode"			=>	$kode,
									"nama"			=>	$nama, 
									"instansi"		=>	$instansi, 
									"jml"			=>	$jml=($jml_pagi+$jml_sore),  
									"email"			=>	$email,
									"hp"			=>	$hp,
									"ket"			=>	$ket,
									"_cid"			=>	$this->idu(),
									);
								$this->db->insert("data_rangkaian_acara",$dataray);
								$insert++; 
								$this->kirimNotifRangkaian($kode,$dataray);
								unset($dataray['kode']);								
								for($i=0;$i<$jml;$i++)
								{ 
									$this->insert_peserta_suci($kode,$dataray);
								} 
								
							}else{
								$dataray=array(
									"jenis_permohonan"	=>	$jenis_permohonan,
									"kode"			=>	$kode,
									"nama"			=>	$nama, 
									"instansi"		=>	$instansi, 
									"jml"			=>	$jml=($jml_pagi+$jml_sore),  
									"email"			=>	$email,
									"hp"			=>	$hp,
									"ket"			=>	$ket,
									"_cid"			=>	$this->idu(),
									);
								$this->db->insert("data_rangkaian_acara",$dataray);
								$insert++; 
								$this->kirimNotifRangkaian($kode,$dataray);
								unset($dataray['kode']);								
								for($i=0;$i<$jml;$i++)
								{ 
									$this->insert_peserta_rangkaian($kode,$dataray);
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
			  $var["data_insert"]=$insert;
			  $var["data_gagal"]=$gagal;
			  $var["data_edit"]=$edit; 
			  $var["validasi"]=$validasi;
		return $var;
	}
	function import_persus_souvenir($file_form)
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
					//$cek	=	isset($sheet[9])?($sheet[9]):"";
					 
					//	if($cek!="HP"){
					//		$var["gagal"]=true;
					//	  $var["info"]="Gagal! Salah format upload...".$cek;
					//	  return $var;
					//	}
					 
						$kode	=	$this->m_reff->acak(10);
					if ($i > 1) {	 
							 $nama		=	isset($sheet[1])?($sheet[1]):"";						 
							 $instansi	=	isset($sheet[2])?($sheet[2]):"";						 
							 $jml_pagi	=	isset($sheet[3])?($sheet[3]):"";						 
							 $jml_pagi	=	(int)$jml_pagi;
							 $jml_sore	=	isset($sheet[4])?($sheet[4]):"";	
							 $jml_sore	=	(int)$jml_sore;
							 
							 $souvenir_1	=	isset($sheet[5])?($sheet[5]):"";	
							 $souvenir_1	=	(int)$souvenir_1;
							
							 $souvenir_2	=	isset($sheet[6])?($sheet[6]):"";	
							 $souvenir_2	=	(int)$souvenir_2;

							 $souvenir_3	=	isset($sheet[7])?($sheet[7]):"";	
							 $souvenir_3	=	(int)$souvenir_3;
					 
							 $email		=	isset($sheet[8])?($sheet[8]):"";						 
							 $hp		=	isset($sheet[9])?($sheet[9]):"";						 
							 $hp		=	str_replace("`","",$hp);						 
							 $hp		=	str_replace("'","",$hp);						 
							 $hp		=	str_replace(",","",$hp);						 
							 $hp		=	str_replace("+62","0",$hp);		
										$digit0=substr($hp,0,1);
										if($digit0!="0")
										{
											$hp="0".$hp;
										}
							 $ket		=	isset($sheet[10])?($sheet[10]):"";						 
							 
								$dataray=array(
									"jenis_permohonan"	=>	2,
									"kode"				=>	$kode,
									"nama"				=>	$nama, 
									"instansi"			=>	$instansi, 
									"jml_pagi"			=>	$jml_pagi,
									"jml_sore"			=>	$jml_sore,
									"souvenir_1"		=>	$souvenir_1,
									"souvenir_2"		=>	$souvenir_2,
									"souvenir_3"		=>	$souvenir_3,
									"email"				=>	$email,
									"hp"				=>	$hp,
									"ket"				=>	$ket,
									"_cid"				=>	$this->idu(),
									);
									if(strlen($nama)>1){
								$this->db->insert("data_persus",$dataray);
								$insert++;  
								//$this->kirimNotifPersus($kode,$dataray);
									}
							 
					}
					$i++;
                }
                
       } else{
			 $var["file"]=false;
			 $var["type_file"]="<br>&nbsp;&nbsp;File Excell";
		}
			  $var["import_data"]=true;
			  $var["data_insert"]=$insert;
			  $var["data_gagal"]=$gagal;
			  $var["data_edit"]=$edit; 
			  $var["validasi"]=$validasi;
			 // $var["gagal"]=true;
			//  $var["info"]=$insert." data ditambahkan.";
		return $var;
	}
	
	function import_peserta($file_form)
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
		 	
				$jml_title=count(array_keys($sheets[1]));	 
				$title=json_encode($sheets[1],true);	
					 unset($sheets[1]);
				$peserta=json_encode($sheets,true);		 
					 
			 	foreach ($sheets as $sheet) 
				{ 
							$insert++; 
				}
				 
							$dataray=array(
								"id_acara"=>$this->mdl->id_acara(),
								"jml_peserta"=>$insert, 
								"title"=>$title,
								"peserta"=>$peserta,
								"_cid"=>$this->mdl->idu(),
								"_ctime"=>date("Y-m-d H:i:s")
								);
							$form	=	$this->input->get_post("f");	
							$this->db->set($form);	
						return 	$this->db->insert("file_peserta",$dataray);
							 
				$i++;
       } else{
			 $var["file"]=false;
			 $var["type_file"]="<br>&nbsp;&nbsp;File Excell";
		}
			  $var["import_data"]=true;
			  $var["data_insert"]=$insert;
			  $var["data_gagal"]=$gagal;
			  $var["data_edit"]=$edit; 
			  $var["validasi"]=$validasi;
		return $var;
	}
	
	function edit_import_peserta($file_form)
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
		 	
				$jml_title=count(array_keys($sheets[1]));	 
				$title=json_encode($sheets[1],true);	
					 unset($sheets[1]);
				$peserta=json_encode($sheets,true);		 
					 
			 	foreach ($sheets as $sheet) 
				{ 
							$insert++; 
				}
				 
							$dataray=array( 
								"jml_peserta"=>$insert, 
								"title"=>$title,
								"peserta"=>$peserta,
								"_cid"=>$this->mdl->idu(),
								"_ctime"=>date("Y-m-d H:i:s")
								);
							$form	=	$this->input->get_post("f");	
							$this->db->set($form);	
							$this->db->where("id",$this->input->post("id"));
						return 	$this->db->update("file_peserta",$dataray);
							 
				$i++;
       } else{
			 $var["file"]=false;
			 $var["type_file"]="<br>&nbsp;&nbsp;File Excell";
		}
			  $var["import_data"]=true;
			  $var["data_insert"]=$insert;
			  $var["data_gagal"]=$gagal;
			  $var["data_edit"]=$edit; 
			  $var["validasi"]=$validasi;
		return $var;
	}
	
	function hapus_file()
	{
	    $id = $this->input->get_post("id");
		$id = $this->encrypt->decode($id,"key");
		$this->db->where("id",$id);
		$this->db->delete("file_peserta");
	}
	function hapus()
	{
	    $id 			= 	$this->input->get_post("id");
		//$id = $this->encrypt->decode($id,"key");
		
		$nama_file		=	$this->m_reff->goField("data_peserta","qr","where id='".$id."' ");
		$kode			=	$this->m_reff->goField("data_peserta","kode_acara","where id='".$id."' ");
		 
		$this->db->where("kode_acara",$id);
		$this->db->delete("file_peserta");
		$this->m_reff->hapus_file("qr/".$kode."/".$nama_file);
		$this->db->where("kode",$id);
		return $this->db->delete("data_acara");
	}
	function jml_acara()
	{
		$this->db->where("id_acara",$this->id);
		return $this->db->get("data_acara")->num_rows();
	}
	function getBlok($blok)
	{
	return $this->db->query("SELECT blok,COUNT(*) as jml FROM data_peserta WHERE blok IS NOT NULL AND kode_acara='".$kode."'  GROUP BY blok ORDER BY blok ASC ")->result();
	}
	
	function insert_tamu()
	{
		$kode_acara		=	$this->input->post("f[kode_acara]");
		$durasi			=	$this->m_reff->goField("data_acara","durasi","where kode='".$kode_acara."' ");
		$tgl			=	$this->m_reff->goField("data_acara","tgl","where kode='".$kode_acara."' ");
		$qr				=	$this->m_reff->getCodeTamu($kode_acara);
		$this->m_reff->qr($kode_acara,$qr);
		$form			=	$this->input->post("f");
		
		$cekin="";$no=1;
		for($i=0;$i<$durasi;$i++)
		{
			$tgl_pelaksanaan=$this->tanggal->tambahTgl($tgl,$i);
			$cekin[$tgl_pelaksanaan]=null;
		}
		$cekin	=	json_encode($cekin);
		$this->db->set($form);
		$this->db->set("cekin",$cekin);
		$this->db->set("sts_ikutserta",1);
		$this->db->set("qr",$qr);
		$this->db->set("_cid",$this->idu());
		return $this->db->insert("data_peserta");
	}function update_tamu()
	{ 
		$form			=	$this->input->post("f"); 
		$this->db->set($form); 
		$this->db->where("id",$this->input->post("id"));
		$this->db->set("_uid",$this->idu());
		return $this->db->update("data_peserta");
	}
	function jmlBlokPeserta($kode,$blok)
	{	 
		    
		$this->db->where("sts_ikutserta",1);
		$this->db->where("blok",$blok);
		$this->db->where("kode_acara",$kode);
		$this->db->select("SUM(berlaku) as jml");
		$return=$this->db->get("v_peserta")->row();
		$return=$return->jml;
		if(!$return)
		{
			return 0;
		}else{
			return $return;
		}
		
	}function jmlBlokUndangan($kode,$blok)
	{	 
		    
		$this->db->where("sts_ikutserta",1);
		$this->db->where("blok",$blok);
		$this->db->where("kode_acara",$kode);
		$this->db->select("SUM(berlaku) as jml");
		return $this->db->get("v_peserta")->num_rows();
		 
	}
	function jmlBlokTerisi($kode,$blok,$in)
	{
		$this->db->LIKE("cekin",$in);
		$this->db->where("sts_ikutserta",1);
		$this->db->where("blok",$blok);
		$this->db->where("kode_acara",$kode);
		$this->db->select("SUM(berlaku) as jml");
		$return=$this->db->get("v_peserta")->row();
		$return=$return->jml;
		if(!$return)
		{
			return 0;
		}else{
			return $return;
		}
	}
	function hapus_cek()
	{	
		$ray=$this->m_reff->clearkomaray($this->input->post("id"));
		$kode=$this->input->post("kode"); 
		$this->db->where_in("id",$ray);
		return $this->db->delete("data_peserta");
	}
	function export_xl()
	{
		$id= $this->input->get("id"); 
		$in=$this->m_reff->clearkomaray($id);
		$this->db->where_in("id",$in);
		$data=$this->db->get("data_peserta")->result();
		 
		  
		 
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
			    $objPHPExcel->getActiveSheet(0)->setCellValue('C1',"JABATAN/LEMBAGA");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('D1',"ALAMAT");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('E1',"BLOK");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('F1',"KEIKUTSERTAAN");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('G1',"KEHADIRAN");
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("A")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("B")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("C")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("D")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("E")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("F")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("G")->setAutoSize(true);
				$objPHPExcel->getActiveSheet(0)->getStyle("A1:G1")->applyFromArray($style);
				 
      
	  
		$no=1;   $start=2;
		foreach($data as $val)
		{	$kode_acara=$val->kode_acara;
		
		if($val->sts_ikutserta==0)	{ $ikut="Belum konfirmasi"; }elseif($val->sts_ikutserta==1){ $ikut="Ya";}else{ $ikut="Tidak";}
		if($val->sts_kehadiran==0)	{ $hadir="Tidak hadir"; }elseif($val->sts_kehadiran==1){ $hadir="Hadir";}else{ $hadir="Diblok";}
		 	$objPHPExcel->getActiveSheet(0)->setCellValue("A".$start, $no++);
			$objPHPExcel->getActiveSheet(0)->setCellValue("B".$start, $val->nama);
			$objPHPExcel->getActiveSheet(0)->setCellValue("C".$start, $val->jabatan);
			$objPHPExcel->getActiveSheet(0)->setCellValue("D".$start, strip_tags($val->alamat));
			$objPHPExcel->getActiveSheet(0)->setCellValue("E".$start, $val->blok);
			$objPHPExcel->getActiveSheet(0)->setCellValue("F".$start, $ikut);
			$objPHPExcel->getActiveSheet(0)->setCellValue("G".$start, $hadir); 
			$start++;
		}
		  
        $objPHPExcel->getActiveSheet(0)->setTitle('TAMU UNDANGAN');
		
						
//<!-------------------------------------------------------------------------------  --->		
		$nama_file=$this->m_reff->goField("data_acara","perihal","where kode='".$kode_acara."' ");
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$nama_file.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
	}
		function dispon_sore($nik)
	{
		$this->db->where("nik",$nik);
		$this->db->where("jenis",2);
		return $this->db->get("data_peserta")->num_rows();
	}
		function dispon_pagi($nik)
	{
		$this->db->where("nik",$nik);
		$this->db->where("jenis",1);
		return $this->db->get("data_peserta")->num_rows();
	}
		
	 function config1()
	{
		$config = Array(
		'protocol' => 'smtp',
    	'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => "uarmoure@gmail.com",
		'smtp_pass' => "cipanandur",
		'mailtype'  => 'html',
		'charset'   => 'iso-8859-1'
		);
		 
	    	$this->load->library('email', $config);
        	$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');
	}
 
	function kirim_notif($nik)
	{
	        $data       =   $this->db->get_where("v_peserta",array("nik"=>$nik))->row();
	        $to         =   $data->email;
            $subject    =   "Permohonan Undangan HUT RI 75";
             $isi        =   $this->isiEMail($data);
            $this->_kirim_email($isi,$to,$subject);
       
    }
    	private function _kirim_email($isi,$to,$subject)
	{
		 
		$this->config1();
		$this->email->set_newline("\r\n");
		$mail = $this->email;
		$mail->from("no-replay@divisionit.co.id","HUT-RI 75");
		$mail->to($to); 
		 
		$mail->subject($subject);
		$mail->message($isi);	
	
   if($this->email->send())
   {
	return true;
   }else
   {
	return false;
   }
		 
	return	$mail->send();
		 
	}
    function isiEMail($data)
    {
        
        $nik         =   $data->nik;
        $nama        =   $data->nama;
        $email       =   $data->email;
        $lembaga     =   $data->lembaga;
      
        $blok_pagi  =   $this->mdl->dispon_pagi($nik);
        $blok_sore  =   $this->mdl->dispon_sore($nik);
         
         
       
        
    return    $isi='
    <table style="max-width:400px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE">
    <img src="'.$this->m_reff->tm_pengaturan(35).'/plug/img/banner1.jpg" width="100%"   alt="E-receipt"
    style="border-top-left-radius:15px;border-top-right-radius:15px" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 1; left: 745px; top: 101px;"><div id=":rt" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
     <center>
     <span style="font-size:16"><b> PERMOHONAN UNDANGAN HUT-RI 75</b></span>
     <hr width="90%">
     </center>
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;padding:10px">

     <span style="font-size:11px;color:#9e9e9e;line-height:16px">Nama Pemohon :</span><br>
      <span style="font-size:13px;line-height:16px;;color:black"><b>'.$nama.'</b></span> <br>
      
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">NIK :</span><br>
      <span style="font-size:13px;line-height:16px;;color:black"><b>'.$nik.'</b></span> <br>
      
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">Email :</span><br>
      <span style="font-size:13px;line-height:16px;;color:black"> '.$email.' </span> <br>
      
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">Lembaga / instansi:</span><br>
      <span style="font-size:13px;line-height:16px;color:black"><b>'.$lembaga.'</b></span> <br>
       
      
      
     <br>
        <b style="font-size:12px;;color:teal;"> PERMOHONAN UNDANGAN</b><br>
      
      <span style="font-size:13px;line-height:16px; color:black">Undangan Pagi : '.$blok_pagi.'</span> <br> 
    
      <span style="font-size:13px;line-height:16px; color:black">Undangan Sore : '.$blok_sore.'</span> <br>
     
     
    </td>  
    </tr>
    <tr>
    <td   style="background-color:#EEE;padding:10px">
    
      
        <span style="font-size:13px;color:black;line-height:16px">Permohonan anda sedang kami proses, untuk informasi jadwal 
        pengambilan dan jumlah undangan yang diperoleh akan kami informasikan kembali melalui email,sms dan whatsapp.   </span><br>
    </td>
    </tr>
    </table>
    
    
    ';
        
    }
 
	
	
	
}




