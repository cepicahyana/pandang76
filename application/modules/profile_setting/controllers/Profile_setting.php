<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_setting extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_global();
		$this->load->model("Model","mdl");
		date_default_timezone_set('Asia/Jakarta');
	}
	 
	function _template($data)
	{
	$this->load->view('temp_verifikator/main',$data);	
	}
	 
	public function index()
	{	
		
		$level=strtoupper($this->session->userdata("level"));
	 
		$index="index";
		 
		$ajax=$this->input->get_post("ajax");
		$data['data']=$this->mdl->dataProfile();
		if($ajax=="yes")
		{
			echo	$this->load->view($index,$data);
		}else{
			$data['konten']=$index;
			$this->_template($data);
		}
		
	}
	public function data()
	{	
		 $this->m_konfig->validasi_session(array("panitia","admin"));
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
		echo	$this->load->view("profile_panitia");
		}else{
			$data['konten']="profile_panitia";
			$this->_template($data);
		}
	}
	 
	function update()
	{
	$this->m_konfig->validasi_global();
	$data=$this->mdl->update();
	echo json_encode($data);
	}
	function insert()
	{
	 $this->m_konfig->validasi_session(array("pusat","admin"));
	$this->m_konfig->log("admin","update data akun (pengguna) ",$this->session->userdata("id"));
	$data=$this->mdl->insert();
	echo json_encode($data);
	}
	
	 
	 
}