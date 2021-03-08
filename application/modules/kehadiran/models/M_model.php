<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends ci_Model
{
	var $idevent=13;
	public function __construct() {
        parent::__construct();
 
		$this->session->unset_userdata("date");
     	}
		
		function jmlPemohon($jenis=null)
	{
		if($jenis)
		{ 
			
			$this->db->where("jenis_acara IN (".$jenis.",3)");
			$this->db->select("count(*) as jml");
		}else{
			$this->db->where("jenis_acara IN (1,2,3)");
			$this->db->select("sum(jml_undangan) as jml");
		}
		 
		$this->db->where("sts_acc!=3");
		$this->db->where("hps IS NULL");
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}
	
	
		function jmlDispoByBlok($jenis,$blok)
	{	
		if($jenis)
		{
			$this->db->where("(jenis_acara ='".$jenis."' or jenis_acara=3)");
			$this->db->select("count(*) as jml");
		}else{
			$this->db->select("sum(jml_undangan) as jml");
			$this->db->where("jenis_acara IN(1,2,3)");
		}
		
		if($jenis==1){
				$this->db->where("blok1",$blok); 
		}elseif($jenis==2){
				$this->db->where("blok2",$blok); 
		}elseif($jenis==3){
			 $this->db->where("(blok1='".$blok."'  or blok2='".$blok."')"); 
		}
		//$this->db->where("sts_acc",2); 
		$this->db->where("hps IS NULL");
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}
		function jmlHadirPagiByBlok($blok)
	{	
		    $this->db->select("count(*) as jml"); 
			$this->db->where("blok1",$blok); 
			$this->db->where("cekin1 IS NOT NULL");   
			$this->db->where("hps IS NULL");
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}	function jmlHadirSoreByBlok($blok)
	{	
		    $this->db->select("count(*) as jml"); 
			$this->db->where("blok2",$blok); 
			$this->db->where("cekin2 IS NOT NULL");   
			$this->db->where("hps IS NULL");
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}
	
		function persentase($hasil,$total)
		{
			if(!$total){ return 0;}
			return number_format((($hasil/$total)*100),0,"",".");
		}
		function jmlPemohonPagiHadir()
	{
		 	
			$this->db->where("(cekin1 IS NOT NULL AND cekin1!='') ");
			//$this->db->where("jenis_acara IN (".$jenis.",3)");
			$this->db->select("count(*) as jml"); 
			//$this->db->where("sts_acc!=3");
			$this->db->where("hps IS NULL");
		$return=$this->db->get("data_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	} 
	
	function jmlPemohonSoreHadir()
	{
		 	
			$this->db->where("(cekin2 IS NOT NULL  AND cekin2!='')");
			//$this->db->where("jenis_acara IN (".$jenis.",3)");
			$this->db->select("count(*) as jml"); 
			//$this->db->where("sts_acc!=3");
			$this->db->where("hps IS NULL");
		$return=$this->db->get("data_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	} 
	 
	function getJmlPemohonSuci()
	{ 
		$this->db->where("r_suci",1);
		$this->db->where("sts_suci",1);
		$this->db->where("hps IS NULL");
		return $this->db->get("data_peserta")->num_rows();
	}function getJmlPemohonSuciHadir()
	{ 
		$this->db->where("cekin3 IS NOT NULL");
		$this->db->where("r_suci",1);
		$this->db->where("sts_suci",1);
		$this->db->where("hps IS NULL");
		return $this->db->get("data_peserta")->num_rows();
	}function getJmlPemohonSuciPersen()
	{ 
		$q	=	$this->m_reff->goField("tr_kategory","quota","where id='4' ");
		$this->db->where("sts_suci",1);
		$this->db->where("r_suci",1);
		$this->db->where("hps IS NULL");
		$jml=$this->db->get("data_peserta")->num_rows();
		return number_format(($jml/$q)*100,0,",",".");
	}
	 
	function getJmlPemohonSuciAll()
	{
		$this->db->where("r_suci",1);
		$this->db->where("sts_suci!=",2);
		$this->db->where("hps IS NULL");
		return $this->db->get("data_peserta")->num_rows();
	}function getJmlPemohon($id)
	{
		$this->db->where("jenis_permohonan",$id);
		$this->db->where("sts_dispo",1);
		return $this->db->get("data_peserta_rangkaian")->num_rows();
	}
	function getJmlPemohonHadir($id)
	{
		$this->db->where("cekin IS NOT NULL");
		$this->db->where("jenis_permohonan",$id);
		$this->db->where("sts_dispo",1);
		return $this->db->get("data_peserta_rangkaian")->num_rows();
	}
	function getJmlPemohonAll($id)
	{
		$this->db->where("jenis_permohonan",$id); 
		return $this->db->get("data_peserta_rangkaian")->num_rows();
	}function getJmlPemohonAllPersen($id)
	{ 
		$q	=	$this->m_reff->goField("tr_kategory","quota","where id='".$id."' "); 
		$jml=$this->db->get("data_peserta_rangkaian")->num_rows();
		return number_format(($jml/$q)*100,0,",",".");
	}
	function getJmlPemohonPersen($id)
	{
		$q	=	$this->m_reff->goField("tr_kategory","quota","where id='".$id."' ");
		$this->db->where("jenis_permohonan",$id);
		$this->db->where("sts_dispo",1);
		$jml=$this->db->get("data_peserta_rangkaian")->num_rows();
		return number_format(($jml/$q)*100,0,",",".");
	}
	function getJmlPemohonHadirPersen($id)
	{
		$q		=	$this->getJmlPemohon($id);
		$jml	=	$this->getJmlPemohonHadir($id); 
		if(!$q){ return 0;}
		return number_format(($jml/$q)*100,0,",",".");
	}function getJmlPemohonSuciHadirPersen()
	{
		$q		=	$this->getJmlPemohonSuci();
		$jml	=	$this->getJmlPemohonSuciHadir(); 
		if(!$q){ return 0;}
		return number_format(($jml/$q)*100,0,",",".");
	}
	
	 
}

?>