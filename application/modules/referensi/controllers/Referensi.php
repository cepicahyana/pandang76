<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referensi extends MY_Controller {

	 
	 
	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("user"));
		$this->load->model("model","mdl");
		date_default_timezone_set('Asia/Jakarta');
	}
	 
	function _template($data)
	{
	$this->load->view('temp_user/main',$data);	
	}
	function pekerjaan()
	{
		$this->index();
	}
	public function index()
	{
		 	
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("pekerjaan");
		}else{
			$data['konten']="pekerjaan";
			$this->_template($data);
		}
		
	}
	public function master()
	{
		 	
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("master");
		}else{
			$data['konten']="master";
			$this->_template($data);
		}
		
	}
	 public function distributor()
	{
		 	
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("distributor");
		}else{
			$data['konten']="distributor";
			$this->_template($data);
		}
		
	}
	 
	 
	
	 
	///-----------------------SISWA--------------------------///
 
	 
	
	///-----------------------mitra PENILIAAN--------------------------///
	function getDataPekerjaan()
	{
		$list = $this->mdl->get_data_pekerjaan();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
	 
		 
		 $tombol='<div class="demo-button-groups">
                                <div class="btn-group" role="group">
                                    <button type="button" onclick="edit(`'.$dataDB->id.'`)" class="btn btn-primary btn-sm waves-effect waves-light">EDIT</button>
                                    <button type="button" onclick="hapus(`'.$dataDB->id.'`)" class="btn btn-danger btn-sm waves-effect waves-light">HAPUS</button>
                                    
                                </div>
                                
                            </div>';
			 		
		 
		 
			$row = array();
	 $row[] = "<span class='size'>  ".$dataDB->urut." </span>";
			$row[] = "<span class='size'>  ".$dataDB->id." </span>";
			
			$row[] = "<span class='size'>  ".$dataDB->nama." </span>"; 
			$row[] = "<span class='size'>  ".$dataDB->english." </span>"; 
		 
			 
			$row[] = $tombol;
		  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	 ///-----------------------mitra PENILIAAN--------------------------///
	function getDataMaster()
	{
		$list = $this->mdl->get_data_master();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
	 
		 
		 $tombol='<div class="demo-button-groups">
                                <div class="btn-group" role="group">
                                    <button type="button" onclick="edit(`'.$dataDB->id.'`)" class="btn btn-primary btn-sm waves-effect waves-light">EDIT</button>
                                    <button type="button" onclick="hapus(`'.$dataDB->id.'`)" class="btn btn-danger btn-sm waves-effect waves-light">HAPUS</button>
                                    
                                </div>
                                
                            </div>';
			 		
		 
		 
			$row = array();
	 
			$row[] = "<span class='size'>  ".$dataDB->id." </span>";
			
			$row[] = "<span class='size'>  ".$dataDB->pengaturan." </span>"; 
			$row[] = "<span class='size'>  ".$dataDB->val." </span>"; 
		 
			 
			$row[] = $tombol;
		  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count_master(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	 
	//-------------------------------------------------END SISWA------------------------------------//
	function idu()
	{
		return $this->session->userdata("id");
	}
	  
	 
	function viewAdd()
	{
		echo $this->load->view("viewAdd");
	} 
	function viewAddMaster()
	{
		echo $this->load->view("viewAddMaster");
	}
	function viewEditMaster()
	{
		echo $this->load->view("viewEditMaster");
	}function viewEdit()
	{
		echo $this->load->view("viewEdit");
	}
	function insert_master()
	{
		echo json_encode($this->mdl->insert_master());
	}
	function insert_pekerjaan()
	{
		echo json_encode($this->mdl->insert_pekerjaan());
	}
	function update_pekerjaan()
	{
		echo json_encode($this->mdl->update_pekerjaan());
	}function update_master()
	{
		echo json_encode($this->mdl->update_master());
	}
	function set()
	{
		echo $this->mdl->set();
	}
	
	
	function hapus()
	{
		$id=$this->input->post("id");
		echo $this->mdl->hapus($id);
	}
	 
	function save_bursa()
	{
	$data=$this->mdl->save_bursa();
	echo json_encode($data);
	}
	function hapus_master()
	{
		$id=$this->input->post("id");
	$data=$this->mdl->hapus_master($id);
	echo json_encode($data);
	}
}