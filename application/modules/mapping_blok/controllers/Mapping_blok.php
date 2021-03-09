<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mapping_blok extends MY_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('model', 'mdl');
		$this->m_konfig->validasi_session(array("user", "registrasi"));

		date_default_timezone_set("Asia/Jakarta");
	}


	function _template($data)
	{
		redirect("mode_souvenir");
		$this->load->view('temp_user/main', $data);
	}

	function form_filter()
	{
		$this->load->view('form_filter');
	}

	public function souvenir()
	{

		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("souvenir");
		} else {
			redirect("mode_souvenir");
			$data['konten'] = "souvenir";
			$this->_template($data);
		}
	}
	public function index()
	{

		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("index");
		} else {
			redirect("mode_fisik");
			$data['konten'] = "index";
			$this->_template($data);
		}
	}

	public function detail()
	{

		if (!$this->input->post("blok")) {
			echo $this->m_reff->page403();
			return false;
		}

		$this->db->where("nama", $this->input->post("blok"));
		$this->db->where("jenis", $jenis = $this->input->post("jenis"));

		$d = $this->db->get("v_blok")->row_array();
		if (!$d) {
			return false;
		}
		$data["d"] = $d;
		echo $this->load->view("detail", $data);
	}

	public function detail_souvenir()
	{

		if (!$this->input->post("id")) {
			echo $this->m_reff->page403();
			return false;
		}

		echo $this->load->view("detail_souvenir");
	}

	public function detail_souvenir_und()
	{

		if (!$this->input->post("id")) {
			echo $this->m_reff->page403();
			return false;
		}

		echo $this->load->view("detail_souvenir_und");
	}

	function updateTarget()
	{
		echo $this->mdl->updateTarget();
	}
	function updateTargetSouvenir()
	{
		echo $this->mdl->updateTargetSouvenir();
	}
}
