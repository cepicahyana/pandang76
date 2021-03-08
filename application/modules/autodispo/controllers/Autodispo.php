<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autodispo extends MY_Controller {

	 
	var $tbl="admin";
	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("user"));
		$this->load->model("model","mdl");
		$this->load->model("M_umum","umum");
		date_default_timezone_set('Asia/Jakarta');
	}
	 
	function _template($data)
	{
	$this->load->view('temp_user/main',$data);	
	}
 
	public function index()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("index");
		}else{
			$data['konten']="index";
			$this->_template($data);
		}
		
	}
	 function save_()
	{
	$set=$this->security->xss_clean($this->input->post("set"));
	$id=$this->security->xss_clean($this->input->post("id"));
	$data=$this->mdl->save_($id,$set);
	echo json_encode($data);
	}
}