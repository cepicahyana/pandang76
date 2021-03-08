<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_blok extends ci_Model
{
	 
	public function __construct() {
    parent::__construct();
	 
	 
 	}

 	public function getBlok($blok, $jenis){
 		$this->db->where("nama", $blok);
 		$this->db->where("jenis", $jenis);
 		$d = $this->db->get("v_blok")->row_array();

 		return $d;
 	}

 	function updateTarget(){
 		$id = $_POST["id"];
 		$target = $_POST["target"];

 		$this->db->set("target", $target);
 		$this->db->where("id", $id);
 		$this->db->update("tr_blok");

 		return "1"; 
 	}	

 	public function getProgressPermohonan($blok, $jenis){
					  $this->db->where("nama",$blok);
					  $this->db->where("jenis",$jenis);
		$v			= $this->db->get("v_blok")->row();
 		$id_blok 	= isset($v->id)?($v->id):"";//$this->m_reff->goField("v_blok", "id", "WHERE nama='".$blok."' AND jenis='".$jenis."' ");
 		$disposisi 	= isset($v->jml)?($v->jml):"";//$this->m_reff->goField("v_blok", "jml", "WHERE nama='".$blok."' AND jenis='".$jenis."' ");
 		$kuota 		= isset($v->target)?($v->target):"";//$this->m_reff->goField("v_blok", "target", "WHERE nama='".$blok."' AND jenis='".$jenis."' ");
		
		

 		$this->db->where("sts_acc != ", "3");
 		$this->db->where("blok".$jenis, $id_blok);
 		$permohonan = $this->db->get("data_peserta")->num_rows();

 		$this->db->where("diterima_tgl is NOT NULL", NULL, FALSE);
 		$this->db->where("blok".$jenis, $id_blok);
 		$distribusi = $this->db->get("data_peserta")->num_rows();

 		$permohonan_percent		= ($permohonan!=0)?($permohonan / $kuota) * 100:0;
 		$disposisi_percent 		= ($disposisi!=0)?($disposisi / $permohonan) * 100:0;
 		$distribusi_percent 	= ($distribusi!=0)?($distribusi / $disposisi) * 100:0;

 		$dt = array(
 			"permohonan" 			=> $permohonan,
 			"distribusi" 			=> $distribusi,
 			"disposisi"				=> $disposisi,
 			"permohonan_percent"	=> $permohonan_percent,
 			"distribusi_percent"	=> $distribusi_percent,
 			"disposisi_percent"		=> $disposisi_percent,
 			"target"				=> $kuota
 		);

 		return $dt;

 	}

 	public function getPercentAll($jenis){
 		
 		$this->db->select("SUM(target) AS kuota");
 		$this->db->from("v_blok");
 		$this->db->where("jenis", $jenis);
 		$d = $this->db->get()->row_array();

 		$this->db->select("SUM(jml) AS jml");
 		$this->db->from("v_blok");
 		$this->db->where("jenis", $jenis);
 		$x = $this->db->get()->row_array();
 		
 		$hasil = ($x["jml"] / $d["kuota"]) * 100;

 		return number_format($hasil, 1);
 	}	

 	public function getPercent($blok, $jenis){
 		$this->db->where("nama", $blok);
 		$this->db->where("jenis", $jenis);
 		$d = $this->db->get("v_blok")->row_array();

 		$hasil = ($d["jml"] / $d["target"]) * 100;

 		return number_format($hasil, 1);
 	}	
}

?>