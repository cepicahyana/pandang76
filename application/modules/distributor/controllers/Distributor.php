<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor extends MY_Controller {

	  
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_model','mdl');
		$this->m_konfig->validasi_session(array("distributor"));
		
		date_default_timezone_set("Asia/Jakarta");
	}
	 
	
	function _template($data)
	{
	$this->load->view('temp_verifikator/main',$data);	
	}
	 	
	function form_filter()
	{
	$this->load->view('form_filter');	
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
	 
	function getDetail()
	{
	 
			echo	$this->load->view("getDetail");
		 
	}
	
	
	 
}

