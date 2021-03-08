<?php

class m_konfig extends CI_Model  {
    
		
	function __construct()
    {
        parent::__construct();
		
    }
	///////////////////Golongan validasi
	function validasi_global()
	{
		$sesi=$this->session->userdata("level");
		if(!$sesi)
		{
		redirect("login");
		}
	}
	function validasi_session($id)
	{
		$sesi=$this->session->userdata("level");
		$this->db->where_not_in("nama",$id);
		foreach($this->getDataLevel() as $data)
		{
			if($sesi==$data->nama){
				redirect($data->direct); 
			}
		}
		if(!$sesi){ redirect("login/logout");  };
	}
	function validasi_login()
	{
	$this->db->order_by("id_level","ASC");
	$db=$this->db->get("main_level")->result();
		$sesi=$this->session->userdata("level");
		foreach($db as $data)
		{
		if($sesi==$data->nama){
		redirect($data->direct); 
		}
		}
	  
	}
	//-------------------------------------------------------------------------------------//
	function jmlLog()
	{
	return $this->db->get("main_log")->num_rows();
	}
	
	private function _hapusLog()
	{
	$jmlLog=$this->jmlLog();
	$batasLog=$this->konfigurasi(7);
		if($batasLog<$jmlLog)
		{
		return $this->db->query("DELETE FROM main_log LIMIT 2 ");
		}
	}
	function getAdmin($id)
	{
	$this->load->model("m_profile","profile");
	$data=$this->profile->dataProfile($id);
	return $data;
	}
	function log($tabel,$aksi)
	{	$admin=$this->getAdmin($id=$this->session->userdata("id"));
		$this->_hapusLog();
		$data=array(
		"id_admin"=>$id,
		"nama_user"=>$admin->owner,
		"table_updated"=>$tabel,
		"aksi"=>$aksi,
		"tgl"=>date('Y-m-d H:i:s'),
		);
		return $this->db->insert("main_log",$data);
	}
	function konfigurasi($id)
    {
	$data=$this->db->query("SELECT value FROM main_konfig WHERE id_konfig='$id'")->row();
	return $data->value;
    }
	function dataKonfig($id)
	{
	$data=$this->db->get_where("main_konfig",array("id_konfig"=>$id))->row();
	return $data->value;
	}
	function maxMenu()
	{
	$db=$this->db->query("select MAX(id_menu) as max from main_menu")->row();
	return $db->max+1;
	}
	
	function getDataLevel()
	{
	$this->db->order_by("id_level","ASC");
	return $this->db->get("main_level")->result();
	}
	
	function getIdLevel($id)//id_level
	{
	$this->db->where("nama",$id);
	$data=$this->db->get("main_level")->row();
	return $data->id_level;
	}
	function getNamaUG($id)
	{
	$this->db->where("id_level",$id);
	$data=$this->db->get("main_level")->row();
	return strtoupper($data->nama);
	}
	
	
	
	
	
 

  
}