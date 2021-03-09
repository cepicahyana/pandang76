<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{



	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard', 'mdl');
		$this->load->model('m_dashboard_souvenir', 'mdls');
		$this->m_konfig->validasi_session(array("user", "leader"));
	}

	function getKota()
	{
		$this->load->view('getKota');
	}
	function _template($data)
	{
		redirect("mode_souvenir");
		$this->load->view('temp_user/main', $data);
	}

	function getDetail()
	{
		$this->load->view('getDetail');
	}
	function getDetailSouvenir()
	{
		$this->load->view('getDetailSouvenir');
	}
	function getUndangan()
	{
		$this->load->view('getUndangan');
	}
	function getUndanganSouvenir()
	{
		$this->load->view('getUndanganSouvenir');
	}

	function mappingWilayah()
	{
		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("wilayah");
		} else {
			redirect("mode_fisik");
			$data['konten'] = "wilayah";
			$this->_template($data);
		}
	}
	function jadwal_distribusi()
	{
		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("jadwal_distribusi");
		} else {
			redirect("mode_fisik");
			$data['konten'] = "jadwal_distribusi";
			$this->_template($data);
		}
	}
	function jadwal_distribusi_souvenir()
	{
		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("jadwal_distribusi_souvenir");
		} else {
			redirect("mode_souvenir");
			$data['konten'] = "jadwal_distribusi_souvenir";
			$this->_template($data);
		}
	}
}
