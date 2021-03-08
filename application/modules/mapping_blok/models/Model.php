<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends ci_Model
{
	 
	public function __construct() {
    parent::__construct();
	 
	 
 	}
	
	function persenPermohonan($total,$input)
	{
		if(!$total){ return 0;}
		return number_format(($input/$total)*100,0,",",".");
	}
	 function getJumlahPersediaan($jenis=null)
	{ 
		$this->db->where("id",$jenis);
		$return=$this->db->get("tr_souvenir")->row();
		return isset($return->jml)?($return->jml):0;
	}
	function getJmlDistribusiPemohon($id)
	{
		$this->db->select("SUM(souvenir_".$id.") as jml"); 
		$db=$this->db->where("diterima_oleh IS NOT NULL");
		$db=$this->db->get("data_persus")->row();
		return isset($db->jml)?($db->jml):0;
	}	
	
	function getJmlDistribusiPemohonUnd($id)
	{
		$this->db->select("SUM(".$id.") as jml"); 
		$db=$this->db->where("diterima_oleh IS NOT NULL");
		$db=$this->db->get("data_persus")->row();
		return isset($db->jml)?($db->jml):0;
	}		
	
	function getJmlPemohonUnd($id)
	{ 
 		$this->db->select("SUM(".$id.") as jml"); 
		$db=$this->db->get("data_persus")->row();
		return isset($db->jml)?($db->jml):0;
	}function getSouvenir($id)
	{ 
 		$this->db->where("id", $id);
 		$d = $this->db->get("tr_souvenir")->row();
		return isset($d->jml)?($d->jml):"";
	}
	function getJmlPemohon($id)
	{ 
 		$this->db->select("SUM(souvenir_".$id.") as jml"); 
		$db=$this->db->get("data_persus")->row();
		return isset($db->jml)?($db->jml):0;
	}

 	public function getBlok($blok, $jenis){
 		$this->db->where("nama", $blok);
 		$this->db->where("jenis", $jenis);
 		$d = $this->db->get("v_blok")->row_array();

 		return $d;
 	}

 	function updateTarget(){
 		$id		= $this->input->post("id");
 		$target = $this->input->post("target");

 		$this->db->set("target", $target);
 		$this->db->where("id", $id);
 		$this->db->update("tr_blok");

 		return "1"; 
 	}	
 	function updateTargetSouvenir(){
 		$id		= $this->input->post("id");
 		$target = $this->input->post("target");

 		$this->db->set("jml", $target);
 		$this->db->where("id", $id);
 		$this->db->update("tr_souvenir");

 		return "1"; 
 	}	

 	public function getProgressPermohonan($blok, $jenis){
		if(!$jenis){
			return false;
		}
					  $this->db->where("nama",$blok);
					  $this->db->where("jenis",$jenis);
		$v			= $this->db->get("v_blok")->row();
 		$id_blok 	= isset($v->id)?($v->id):"";//$this->m_reff->goField("v_blok", "id", "WHERE nama='".$blok."' AND jenis='".$jenis."' ");
 		$disposisi 	= isset($v->jml)?($v->jml):"";//$this->m_reff->goField("v_blok", "jml", "WHERE nama='".$blok."' AND jenis='".$jenis."' ");
 		$kuota 		= isset($v->target)?($v->target):"";//$this->m_reff->goField("v_blok", "target", "WHERE nama='".$blok."' AND jenis='".$jenis."' ");

 		$this->db->where("hps IS NULL");
 		$this->db->where("sts_acc != ", "3");
 		$this->db->where("blok".$jenis, $id_blok);
 		$permohonan = $this->db->get("data_peserta")->num_rows();

 		$this->db->where("diterima_tgl is NOT NULL", NULL, FALSE);
 		$this->db->where("blok".$jenis, $id_blok);
		$this->db->where("hps IS NULL");
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
 		if(!$d["kuota"])
		{
			return 0;
		}
 		$hasil = ($x["jml"] / $d["kuota"]) * 100;

 		return number_format($hasil, 1);
 	}	

 	public function getPercent($blok, $jenis){
 		$this->db->where("nama", $blok);
 		$this->db->where("jenis", $jenis);
 		$d = $this->db->get("v_blok")->row_array();
		if(!$d["target"])
		{
			return 0;
		}
 		$hasil = ($d["jml"] / $d["target"]) * 100;

 		return number_format($hasil, 1);
 	}	
}

?>