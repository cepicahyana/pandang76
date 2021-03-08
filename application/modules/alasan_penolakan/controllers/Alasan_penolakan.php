<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alasan_penolakan extends MY_Controller {

	  
	function __construct()
	{
		parent::__construct();	
		$this->load->model('model','mdl');
		$this->m_konfig->validasi_session(array("user","registrasi"));
		
		date_default_timezone_set("Asia/Jakarta");
	}
	 
	
	function _template($data){
		$this->load->view('temp_user/main',$data);	
	}
	 	
	 
	public function index(){
		 
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("index");
		}else{
			$data['konten']="index";
			$this->_template($data);
		}
		 
	}

	function insert(){
		echo json_encode($this->mdl->insert());
	}

	function update(){
		echo json_encode($this->mdl->update());
	}

	function delete(){
		echo $this->mdl->delete();
	}

	function edit(){
		echo $this->load->view('edit');
	}

	function getData(){
		$list = $this->mdl->get_data();
		$data = array();
		$no = $this->input->post("start");
		if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no = $no+1;
		 
		foreach ($list as $dataDB) {		 
			$row = array();
			$button	= '
				<div class=" ">
					<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
						<b>OPTION</b>
					</button>
					<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
						<li>
							<a class="dropdown-item" href="javascript:edit(`'.$dataDB->id.'`)">Edit</a>
							<a class="dropdown-item" href="javascript:showDelete(`'.$dataDB->id.'`)">Hapus</a>
						</li>
					</ul>
				</div>
			';

			$row[] 	= "<center>".$no++."</center>";
			$row[]	= $dataDB->alasan;
			$row[]	= $button;
		 
		 
			$data[]	= $row;
		}

		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $this->mdl->count_file(),
						"recordsFiltered" =>$this->mdl->count_file(),
						"data" => $data,
						);
		echo json_encode($output);
	}

	public function detail(){
		$this->db->where("nama", $_POST["blok"]);
 		$this->db->where("jenis", $_POST["jenis"]);
 		$d = $this->db->get("v_blok")->row_array();

 		$data["d"] = $d;
		echo $this->load->view("detail", $data);
	}

	function updateTarget(){
		echo $this->mdl->updateTarget();
	}
}

