<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_super','super');
		$this->load->model('m_profile','profile');
		$this->m_konfig->validasi_session(array("super"));
	}
	
	function _template($data)
	{
	$this->load->view('template/main',$data);	
	}
	
	public function index()
	{

	$data['dataUser']=$this->m_konfig->getDataLevel();
	$data['konten']="manajemen";
	$data['dataProfil']=$this->super->dataProfile($this->session->userdata("id"));
	$this->_template($data);
	}
	function konfig()
	{
	$data['konten']="konfig";
	$data['dataProfil']=$this->super->dataProfile($this->session->userdata("id"));
	$this->_template($data);
	}
	
	function menu($id)
	{
	$data['konten']="menu";
	$data['dataProfil']=$this->super->dataProfileLevel($id);
	$this->_template($data);
	}
	function manajemen()
	{
	$this->index();
	}
	function cekID($id)
	{
	$this->db->where("id_menu",$id);
	echo $this->db->get("main_menu")->num_rows();
	}
	function updateKonfig()
	{
	$this->super->updateKonfig();
	redirect("super/konfig");
	}	
	function editMenu($id)
	{
	$data=$this->super->editMenu($id);
	echo json_encode($data);
	}
	
	function updateMenu()
	{
	$level=$this->input->post("Level");
	if($level==2){	$this->super->updateIdMain($this->input->post("Induk")); }
	echo $this->super->updateMenu();
	}
	function hapus_UG($id)
	{
	$this->super->hapus_UG($id);
	redirect("super/manajemen");
	}
	function HapusMenu($id)
	{
	$this->super->HapusMenu($id);
	}
	
	function simpanMenu()
	{
	$level=$this->input->post("Level");
	if($level==2){	$this->super->updateIdMain($this->input->post("Induk")); }
	echo $this->super->simpanMenu();
	}
	
	function menuLevel1($id,$val)
	{
	$dataMenu=$this->db->query("select * from main_menu where level='1' and hak_akses ='".$id."' ");
		  $dt="";
		  foreach($dataMenu->result() as $op)
		  {
		  $dt[$op->id_menu]=$op->nama;
		  }
		  $array=$dt;
	echo form_dropdown("Induk",$array,$val,"class='form-control'");
	}
	
	function profile_admin()
	{
	$data['konten']="profile_admin";
	$data['dataProfil']=$this->profile->dataProfile(3);
	$this->_template($data);
	}
	
	function add_dataUser()
	{
	$data=$this->profile->add_dataUser();
	echo json_encode($data);
	}
	
	function update_profile($id)
	{
	$data=$this->profile->update($id);
	echo json_encode($data);
	}
	public function upload_img()
	{
	$this->profile->upload_img(3);
	redirect("super/profile_admin");
	}
	
	function addUserGroup()
	{
	echo $this->super->addUserGroup();
	}
	function editUserGroup()
	{
	echo $this->super->editUserGroup();
	}
	function getUG($id)
	{
	$data=$this->super->getUG($id);
	echo json_encode($data);
	}
	function getDataUg($id)
	{
	 $dataMenu=$this->db->get("main_level");
		  $dt="";
		  foreach($dataMenu->result() as $op)
		  {
		  $dt[$op->id_level]=$op->nama;
		  }
		  $array=$dt;
	echo form_dropdown("Hak",$array,$id,'style="width:380px" id="sel2"');
	}
	//<!----------------------------------------------------------------------------------------->
	function data_user()
	{
	$data['konten']="data_user";
	$data['dataProfil']=$this->profile->dataProfile(3);
	$this->_template($data);
	}
	
	function control_sys()
	{
	$data['konten']="control";
	$data['dataProfil']=$this->profile->dataProfile(3);
	$this->_template($data);
	}
	
	function log()
	{
	$data['konten']="log";
	$data['dataProfil']=$this->profile->dataProfile(3);
	$this->_template($data);
	}
	
	function ajax_open()
	{
			
		$list = $this->super->get_open();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'><img width='30px' src='".base_url()."/file_upload/dp/".$dataDB->poto."'></span>";
			$row[] = "<span class='size'>".$dataDB->owner."</a></span>";
			$row[] = "<span class='size'>".$dataDB->telp."</span>";
			$row[] = "<span class='size'>".$dataDB->email."</span>";
			$row[] = "<span class='size'>".$dataDB->namaGroup."</span>";
					
			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_admin.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_admin.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->super->count_file("admin"),
						"recordsFiltered" =>$this->super->count_filtered('admin'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	function ajax_open_log()
	{
			
		$list = $this->super->get_open_log();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->tgl."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_user."</span>";
			$row[] = "<span class='size'>".$dataDB->table_updated."</span>";
			$row[] = "<span class='size'>".$dataDB->aksi."</span>";
					
			//add html for action
			$row[] = '
		
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_log.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->super->count_file_log("main_log"),
						"recordsFiltered" =>$this->super->count_file_log('main_log'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	function ajax_edit($id)
	{
	$data=$this->super->getDataUser($id);
	echo json_encode($data);
	}	
	
	function deleted_UG($id)
	{
	$data=$this->super->deleted_UG($id);
	echo json_encode($data);
	}
	
	
	function deleted_log($id)
	{
	$data=$this->super->deleted_log($id);
	echo json_encode($data);
	}
	//----------------------------------------------------------->
	function dropdownHak($id)
	{
	$val=$this->super->dataProfile($id);
	$dataMenu=$this->db->query("select * from main_level");
		  $dt="";
		  foreach($dataMenu->result() as $op)
		  {
		  $dt[$op->id_level]=$op->nama;
		  }
		  $array=$dt;
	echo form_dropdown("level",$array,isset($val->level)?($val->level):"","class='form-control'");
	}
}

