<?php

class Model extends CI_Model  {
    
	var $tbl="admin";
 
 	function __construct()
    {
        parent::__construct();
    }
	function idu()
	{
		return $this->session->userdata("id");
	}
	
	 
	function save_($id,$set)
	{
		$this->db->set("peruntukan",$set);
		$this->db->where("id",$id);
	return $this->db->update("tr_blok");
	}
	
	 
	 
	 
	 
}