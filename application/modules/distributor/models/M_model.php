<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends ci_Model
{
	 
	public function __construct() {
        parent::__construct();
		 
		 
     	}
		
		
	function jmlDistribusi($tgl)
	{
		$this->db->where("diterima_tgl",null);
		$this->db->where("jadwal_distribusi",$tgl);
		$this->db->where("hps is null");
		return $this->db->get("data_peserta")->num_rows();
	}
	
	function jmlBelumDistribusi($tgl)
	{
		$this->db->where("diterima_tgl",null);
		$this->db->where("jadwal_distribusi",$tgl);
		$this->db->where("hps is null");
		return $this->db->get("data_peserta")->num_rows();
	}
	function jmlSudahDistribusi($tgl)
	{	
		$this->db->where("diterima_tgl IS NOT NULL");
		$this->db->where("jadwal_distribusi",$tgl);
		$this->db->where("hps is null");
		return $this->db->get("data_peserta")->num_rows();
	}
	function getDistribusi($tgl,$jenis)
	{	$this->db->order_by("blok","ASC");
		$this->db->where("jenis",$jenis);
		$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("v_distribusi")->result();
	}
	
	/*
	 function jmlSudahVerifikasi($tgl)
	 {
		 $this->db->where("tgl_verifikasi",$tgl);
		return $this->db->get("v_peserta")->num_rows();
	 } 
	 function totalPemohon()
	 {
		  $this->db->where("id_kategory",1);
		  $this->db->where("sts_acc!=",3);
		return $this->db->get("v_peserta")->num_rows();
	 }
	 function persenVerifikasi()
	 {
		$total  = $this->mdl->totalPemohon();
		 
				 $this->db->where("tgl_verifikasi IS NOT NULL");
		$sudah  = $this->db->get("v_peserta")->num_rows();
		$hasil	= ($sudah/$total)*100;
		return number_format($hasil,0,",",".");
	 }
	 */
}

?>