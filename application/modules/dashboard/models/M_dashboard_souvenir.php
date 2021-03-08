<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard_souvenir extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
		 
     	}
	 
 
	function jmlDistribusiAcara($tgl,$acara)
	{
		if($acara==1)
		{
			$this->db->where("blok1 IS NOT NULL"); 
		}else{
				$this->db->where("blok2 IS NOT NULL"); 
		}
		
		
		$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("data_persus")->num_rows();
	}
	
	function jmlDistribusi($tgl)
	{
			
		$this->db->where("diterima_tgl",null);
		$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("data_persus")->num_rows();
	}
	
	function jmlBelumDistribusi($tgl)
	{
 
		$this->db->where("diterima_tgl",null);
		$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("data_persus")->num_rows();
	}
	function jmlSudahDistribusi($tgl)
	{		
		$this->db->where("diterima_tgl IS NOT NULL");
		$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("data_persus")->num_rows();
	}
	function getDistribusi($tgl,$jenis)
	{	$this->db->order_by("blok","ASC");
		$this->db->where("jenis",$jenis);
		$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("v_distribusi")->result();
	}
	function getDistribusiSuci($tgl)
	{	 	
		$this->db->where("sts_suci",1);
		$this->db->where("r_suci",1);
		$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("data_persus")->num_rows();
	}
	function persenPermohonan($input,$total)
	{
		if(!$total){ return 0;}
		return number_format(($input/$total)*100,0,",",".");
	}
	function getSouvenir($id,$tgl)
	{ 
 		$this->db->select("SUM(souvenir_".$id.") as jml"); 
		$db=$this->db->where("jadwal_distribusi",$tgl);
		$db=$this->db->get("data_persus")->row();
		return isset($db->jml)?($db->jml):0;
	}
	 function jmlDistribusiByItem($id,$tgl)
	{ 
 		$this->db->select("SUM(souvenir_".$id.") as jml"); 
		$db=$this->db->where("diterima_oleh IS NOT NULL");
		$db=$this->db->where("jadwal_distribusi",$tgl);
		$db=$this->db->get("data_persus")->row();
		return isset($db->jml)?($db->jml):0;
	}
	function jmlDijadwalkan($tgl)
	{ 
 		 
	 
		$db=$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("data_persus")->num_rows();
	 
	}
	 
}
?>