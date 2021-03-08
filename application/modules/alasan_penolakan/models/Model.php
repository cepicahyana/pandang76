<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends ci_Model
{
	 
	public function __construct() {
    parent::__construct();
	 	 
 	}

 	function insert(){
 		$f = $this->input->post("f"); 
				if(!$f){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
 		return $this->db->insert("tm_alasan_penolakan", $f);
 	}

 	function update(){
 		$f  = $this->input->post("f");
 		$id = $this->input->post("id");
		if(!$f){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
 		$this->db->where("id", $id);
 		return $this->db->update("tm_alasan_penolakan", $f);
 	}

 	function delete(){
 		$id = $this->input->post("id");

 		$this->db->where("id", $id);
 		return $this->db->delete("tm_alasan_penolakan");
 	}

 	function get_data()
	{
		
		$this->_get_datatables();
		if($this->input->post("length") != -1 and $this->input->post("start")) 
		$this->db->limit($this->input->post("start"),$this->input->post("length"));
	 	return $this->db->get()->result();
	}
	private function _get_datatables()
	{	$filter		=	"";
	
		
		$query="select * from tm_alasan_penolakan where 1=1 ".$filter;
	
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"alasan"=>$searchkey 				 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end(); 
			}	

		$this->db->group_by("alasan","asc");
			$query=$this->db->from("tm_alasan_penolakan");
		return $query;
		 
	
	}
	
	public function count_file()
	{		
		$this->_get_datatables();
		return $this->db->get()->num_rows();
	}

}

?>