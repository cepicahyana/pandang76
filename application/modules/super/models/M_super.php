<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_super extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
		//$this->m_konfig->validasi_session("super");
     	}
	public function updateMenu()
	{
	$data=array(
	"id_menu"=>$this->input->post("idmenu"),
	"nama"=>$this->input->post("Nama"),
	"level"=>$this->input->post("Level"),
	"icon"=>$this->input->post("Icon"),
	"hak_akses"=>$this->input->post("Hak"),
	"link"=>$this->input->post("Link"),
	);
	
	if($this->input->post("Level")==2){
	$data2=array("id_main"=>$this->input->post("Induk"));
	$data=array_merge($data,$data2);
	}
	
	$this->db->where("id_menu",$this->input->post("menuIdLama"));
	return $this->db->update("main_menu",$data);
	}
	function hapus_UG($id)
	{
	$this->db->where("id_level",$id);
	return $this->db->delete("main_level");
	}
	
	
	function editMenu($id)
	{
	$this->db->where("id_menu",$id);
	return $this->db->get("main_menu")->row();
	}
	
	private function _cekDel($id)
	{
	$this->db->where("id_admin!=",$this->session->userdata('id'));
	$this->db->where("id_admin",$id);
	return $this->db->get("admin")->num_rows();
	}
	
	public function deleted_UG($id)
	{
	$daprof=$this->dataProfile($id);
	$path = "file_upload/dp/".$daprof->poto;
	
	$cekiddel=$this->_cekDel($id);	
	if($cekiddel){			 
				 if (file_exists($path)) {
					unlink($path);
				 }
	};			 
	
	$this->db->where("id_admin!=",$this->session->userdata('id'));
	$this->db->where("id_admin",$id);
	$data=$this->db->delete("admin");
	}
		
	public function deleted_log($id)
	{	
	$this->db->where("id_log",$id);
	return $this->db->delete("main_log");
	}
	
	public function HapusMenu($id)
	{
	$this->db->where("id_menu",$id);
	return $this->db->delete("main_menu");
	}	
	
	public function updateIdMain($id)
	{
	$this->db->where("id_menu",$id);
	return $this->db->update("main_menu",array("id_main"=>1));
	}	
	function simpanMenu()
	{
	$data=array(
	"id_menu"=>$this->input->post("idmenu"),
	"nama"=>$this->input->post("Nama"),
	"level"=>$this->input->post("Level"),
	"id_main"=>$this->input->post("Induk"),
	"icon"=>$this->input->post("Icon"),
	"hak_akses"=>$this->input->post("Hak"),
	"link"=>$this->input->post("Link"),
	);
	return $this->db->insert("main_menu",$data);
	}
	
	function dataProfileLevel($id)
	{
	return $this->db->get_where("main_level",array("id_level"=>$id))->row();
	}
	function dataProfile($id)
	{
	return $this->db->get_where("admin",array("id_admin"=>$id))->row();
	}
	
	function dataKonfig($id)
	{
	$data=$this->db->get_where("main_konfig",array("id_konfig"=>$id))->row();
	return $data->value;
	}
	function updateKonfig()
	{
		///
		  $lokasi_file = $_FILES['input1']['tmp_name'];
		  $tipe_file   = $_FILES['input1']['type'];
		  $nama_file   = $_FILES['input1']['name'];
		  if($tipe_file)
		  {
		  $daprof=$this->dataKonfig(1);
		  if($daprof!="")
			 {
			 $path = "file_upload/img/".$daprof;
			if (file_exists($path)) {
					unlink($path);
				 }
			 }
		   
		  
			$jenis=explode("/",$tipe_file);
			$jenis=$jenis[1];
			if($jenis=="png" || $jenis=="jpg" || $jenis=="jpeg")
			{
			$jenis="jpg";
			};
			 $target_path = "file_upload/img/loggo.".$jenis;
			 //
			 
			 
		  }
		  //
		if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$target_path);
		$array=array("value"=>"loggo.".$jenis);
		$this->db->where("id_konfig",2);
		$this->db->update("main_konfig",$array);
		}
		////////////////////
		for($i=2;$i<=20;$i++)
		{
		$this->db->where("id_konfig",$i);
		$array=array("value"=>$this->input->post("input".$i));
		$this->db->update("main_konfig",$array);
		}
		
	}
	
	function addUserGroup()
	{
	$data=array(
	"nama"=>$this->input->post("nama"),
	"direct"=>$this->input->post("link"),
	"ket"=>$this->input->post("ket"),
	);
	return $this->db->insert("main_level",$data);
	}
	function editUserGroup()
	{
	$data=array(
	"nama"=>$this->input->post("nama"),
	"direct"=>$this->input->post("link"),
	"ket"=>$this->input->post("ket"),
	);
	$this->db->where("id_level",$this->input->post("id_level"));
	return $this->db->update("main_level",$data);
	}
	
	function getUG($id)
	{
	$this->db->where("id_level",$id);
	return $this->db->get("main_level")->row();
	}
		
	///-----------------------------------ajax//
	private function _get_datatables_open()
	{
	$query="select *,b.nama as namaGroup from admin a,main_level b where a.level=b.id_level ";
	
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND a.level='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			b.nama LIKE '%".$searchkey."%' or 
			nama LIKE '%".$searchkey."%' or 
			telp LIKE '%".$searchkey."%' or 
			email LIKE '%".$searchkey."%'
			) ";
		}

		$column = array('','poto','nama','telp','email','namaGroup');
		$i=0;
		foreach ($column as $item) 
		{
		$column[$i] = $item;
		}
		
		if(isset($_POST['order']))
		{
		//	$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			$query.=" order by ".$column[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'] ;
		} 
		else if(isset($order))
		{
			$order = $order;
		//	$this->db->order_by(key($order), $order[key($order)]);
			$query.=" order by ".key($order)." ".$order[key($order)] ;
		}
		return $query;
	
	}	///-----------------------------------ajax//
	private function _get_datatables_open_log()
	{
	$query="select * from main_log a LEFT JOIN main_level b ON a.id_admin=b.id_level WHERE 1=1 ";
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			nama LIKE '%".$searchkey."%' or 
			nama_user LIKE '%".$searchkey."%' or 
			table_updated LIKE '%".$searchkey."%' or 
			aksi LIKE '%".$searchkey."%' OR 
			tgl LIKE '%".$searchkey."%'  
			) ";
		}

		$column = array('','tgl','nama','nama_user','table_updated','aksi');
		$i=0;
		foreach ($column as $item) 
		{
		$column[$i] = $item;
		}
		
		if(isset($_POST['order']))
		{
		//	$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			$query.=" order by ".$column[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'] ;
		} 
		else if(isset($order))
		{
			$order = $order;
		//	$this->db->order_by(key($order), $order[key($order)]);
			$query.=" order by ".key($order)." ".$order[key($order)] ;
		}
		return $query;
	
	}
	
	function get_open()
	{
		
		$query=$this->_get_datatables_open();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}
	
	function get_open_log()
	{
		
		$query=$this->_get_datatables_open_log();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}
	public function count_file_log($tabel)
	{		
		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}
	
	public function count_file($tabel)
	{		
		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}
	function count_filtered($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_open();
		return $this->db->query($query)->num_rows();
	}
	function getDataUser($id) //id_file
	{
	$this->db->where("id_admin",$id);
	$this->db->join("main_level b","a.level=b.id_level");
	$this->db->from("admin a");
	return $this->db->get()->row();
	}
	///////-----------------------------------------------------
	
}

?>