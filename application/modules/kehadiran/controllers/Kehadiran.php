<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kehadiran extends MY_Controller {

	
	 
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_model','event');
	 
		$this->m_konfig->validasi_session(array("user","leader"));
		
		date_default_timezone_set("Asia/Jakarta");
	}
	 
	 
	
	function _template($data)
	{
		$level=$this->session->userdata("level");
		if(strtolower($level)=="leader")
		{
			$this->load->view('temp_verifikator/main',$data);	
		}else{
			$this->load->view('temp_user/main',$data);	
		}
	}
	 
  
	public function index()
	{
		 
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("dashboard");
		}else{
			$data['konten']="dashboard";
			$this->_template($data);
		}
		 
	}
	 
 
	 	
 
}

