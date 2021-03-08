<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends ci_Model
{
 
	public function __construct() {
        parent::__construct();
 
		$this->session->unset_userdata("date");
     	}
		
		function getJumlahPersediaan($jenis=null)
	{ 
		$this->db->where("id",$jenis);
		$return=$this->db->get("tr_souvenir")->row();
		return isset($return->jml)?($return->jml):0;
	}
	
	function getJmlPemohon($jenis=null)
	{ 
		$this->db->select("SUM(souvenir_".$jenis.") as jml"); 
		$db=$this->db->get("data_persus")->row();
		return isset($db->jml)?($db->jml):0;
	}
	
	function getJmlPemohonDistribusi($jenis=null)
	{ 
		$this->db->select("SUM(souvenir_".$jenis.") as jml"); 
		$this->db->where("diterima_oleh IS NOT NULL");
		$db=$this->db->get("data_persus")->row();
		return isset($db->jml)?($db->jml):0;
	}
	
	  
	  
	function persenPermohonan($total,$input)
	{
		if(!$total){ return 0;}
		return number_format(($input/$total)*100,0,",",".");
	}
	 
	 /*--------------------------------------------------*/
	function get_persus()
	{
		$this->_get_datatables_persus(); 
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	private function _get_datatables_persus()
	{	$filter		=	"";
	
		$jenis_permohonan	=	$this->input->get_post("jenis_permohonan");
		$dispo				=	$this->input->get_post("dispo");
		$distri				=	$this->input->get_post("distri");
		$fpengiriman				=	$this->input->get_post("fpengiriman");
		 
		 
		 
		if($distri==1){ 
			 $this->db->where("diterima_oleh IS NOT NULL"); 
		}elseif($distri==2){ 
			 $this->db->where("diterima_oleh IS NULL"); 
		} 
		 
		if($fpengiriman){ 
			$this->db->where("pengiriman",$fpengiriman); 
		} 
		  
	
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"kode"=>$searchkey, 
				"hp"=>$searchkey,
				"email"=>$searchkey, 
				"ket"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				  
			}
		
		 
		 
	 	$this->db->order_by("id","asc");
		$query=$this->db->from("data_persus");
		return $query;
	
	}
	
	public function count_file_persus()
	{		
		
		 $this->_get_datatables_persus();
		return $this->db->get()->num_rows();
	}
	 
	
	/*--------------------------------------------------*/	/*--------------------------------------------------*/
	/*function jmlSouvenir($kode,$souveinr)
	{
		
		$this->db->where("souvenir_",$kode);
		$this->db->where("kode_persus",$kode);
		return $this->db->get("data_persus")->num_rows();
	}*/
}

?>