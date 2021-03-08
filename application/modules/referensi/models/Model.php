<?php

class Model extends CI_Model  {
    
	 
 
 	function __construct()
    {
        parent::__construct();
    }
	function idu()
	{
		return $this->session->userdata("id");
	}
	
	 
	function set()
	{
		$sts=$this->input->post("sts");
		$id=$this->input->post("id");
		if($sts==0){ $sts=1;}else{ $sts=0;}
		$this->db->set("sts",$sts);
		$this->db->where("id",$id);
		return $this->db->update($this->tbl);
	}
	 
	 function get_data_pekerjaan()
	{
		 $this->_get_data_pekerjaan();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data_pekerjaan()
	{
		 
		  
		   
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"nama"=>$searchkey ,			 
				"english"=>$searchkey 	 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			}	
			
			
			$this->db->order_by("urut","asc");
			$query=$this->db->from("tr_pekerjaan");
		return $query;
			 
		
		 
	}
	
	public function count()
	{				
			$this->_get_data_pekerjaan();
		return $this->db->get()->num_rows();
	} 
	
	
	
	function get_data_master()
	{
		 $this->_get_data_master();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data_master()
	{
		  
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"pengaturan"=>$searchkey ,			 
				"val"=>$searchkey 	 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			}	
			
			
			$this->db->order_by("id","asc");
			$query=$this->db->from("tm_pengaturan");
		return $query;
			 
		
		 
	}
	
	public function count_master()
	{				
			$this->_get_data_master();
		return $this->db->get()->num_rows();
	}
	function insert_master()
	{	 
		$post=$this->input->post("f"); 
		$post=$this->security->xss_clean($post); 
	 	return $this->db->insert("tm_pengaturan",$post);
	 
	}function insert_pekerjaan()
	{	 
		$post=$this->input->post("f"); 
		$post=$this->security->xss_clean($post); 
	 	return $this->db->insert("tr_pekerjaan",$post);
	 
	}
	function update_pekerjaan()
	{	  
		$post=$this->input->post("f"); 
		$post=$this->security->xss_clean($post);
		 
		$this->db->where("id",$this->input->post("id"));
	 	return $this->db->update("tr_pekerjaan",$post);
	 
	}function update_master()
	{	  
		$post=$this->input->post("f"); 
		$post=$this->security->xss_clean($post);
		 
		$this->db->where("id",$this->input->post("id"));
	 	return $this->db->update("tm_pengaturan",$post);
	 
	}
	function hapus($id)
	{
		 
		$this->db->where("id",$id);
		return $this->db->delete("tr_pekerjaan");
	}
	
	 function hapus_master($id)
	{
		 
		$this->db->where("id",$id);
		return $this->db->delete("tm_pengaturan");
	}
	
	 
	 
	 
	 
}