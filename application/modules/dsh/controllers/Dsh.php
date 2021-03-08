<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dsh extends MY_Controller
{



	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model', 'mdl');
		$this->load->model('m_myevent', 'event');
		$this->load->model('m_umum', 'umum');
		$this->load->model('m_virtual', 'vrtl');
		$this->load->model('m_souvenir', 'svnr');

		$this->m_konfig->validasi_session(array("user", "leader"));

		date_default_timezone_set("Asia/Jakarta");
	}



	function _template($data)
	{
		$level = $this->session->userdata("level");
		if (strtolower($level) == "leader") {
			$this->load->view('temp_verifikator/main', $data);
		} else {
			$this->load->view('temp_dsh/main', $data);
		}
	}


	public function index()
	{

		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("dashboard1");
		} else {
			$data['konten'] = "dashboard1";
			$this->_template($data);
		}
	}

	public function undangan()
	{

		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("undangan");
		} else {
			$data['konten'] = "undangan";
			$this->_template($data);
		}
	}

	public function virtual()
	{
		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("virtual");
		} else {
			$data['konten'] = "virtual";
			$this->_template($data);
		}
	}

	public function souvenir()
	{
		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("souvenir");
		} else {
			$data['konten'] = "souvenir";
			$this->_template($data);
		}
	}
}
