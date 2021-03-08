<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends ci_Model
{
	 
	public function __construct() {
        parent::__construct();
		 
		 
     	}
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
		if(!$total){ return 0;}
		$hasil	= ($sudah/$total)*100;
		return number_format($hasil,0,",",".");
	 }
}

?>