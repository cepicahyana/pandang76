<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class mode_souvenir extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model', 'mdl');

		$this->m_konfig->validasi_session(array("user", "leader"));

		date_default_timezone_set("Asia/Jakarta");
	}


	function _template($data)
	{
		$this->load->view('temp_souvenir/main', $data);
	}

	public function index()
	{

		$ajax = $this->input->get_post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("dashboard");
		} else {
			$data['konten'] = "dashboard";
			$this->_template($data);
		}
	}
	public function data()
	{

		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("persus");
		} else {
			$data['konten'] = "persus";
			$this->_template($data);
		}
	}
	function ajax_persus()
	{
		$list = $this->mdl->get_persus();
		$data = array();
		$no = $this->input->post("start");
		$no = $no + 1;

		if (!$this->input->post("draw")) {
			echo $this->m_reff->page403();
			return false;
		}
		$level	=	$this->session->userdata("level");
		foreach ($list as $dataDB) {
			////

			$row = array();


			$row[] = "<span class='size'>" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}

			$button = '<a class="btn btn-primary btn-border btn-sm" href="javascript:detail(' . $dataDB->id . ')"  onclick="detail(`' . $dataDB->id . '`)">
														Detail
													</a>';




			$jadwal	=	"-";
			$disbutton	=	"disabled";

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span  >oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	"<span style='font-size:11px'>" . $this->tanggal->eng3($dataDB->diterima_tgl, "/") . "</span>";
				$href			=	"";
			} else {
				$pengambilan	=	"";
				$nama_pengambil	=	"";
				$href			=	"";
			}


			if ($dataDB->jenis_permohonan == 2) {
				$jenis_permohonan = "Persus";
			} else {
				$jenis_permohonan = "Given";
			}

			if ($dataDB->diterima_oleh) {
				$status = " <span class='text-primary fa'  >Sudah distribusi</span>";
			} else {
				$status = "  <span   >Belum distribusi</span>";
			}


			$nama			=	"<b>" . $dataDB->nama . "</b>" . br() . $dataDB->instansi;

			$vvip			=	$dataDB->souvenir_1;
			$vip			=	$dataDB->souvenir_2;
			$umum			=	$dataDB->souvenir_3;


			$row[]			= 	$nama;
			$row[]			= 	"Pagi :" . $dataDB->jml_pagi . "<br>Sore :" . $dataDB->jml_sore;
			$row[]			= 	$vvip;
			$row[]			= 	$vip;
			$row[]			= 	$umum;;


			$row[]			= 	$status;

			if ($level == "admin") {
				$row[]			= 	$button;
			} else {
				$row[]			= 	$button;
			}




			$data[] 		= 	$row;
		}

		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->mdl->count_file_persus("data_peserta"),
			"recordsFiltered" => $this->mdl->count_file_persus('data_peserta'),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function detail()
	{
		$id	=	$this->input->get_post("id");
		$data["id"]	=	$id;
		$this->load->view("detail", $data);
	}

	function list_data()
	{
		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("list_data");
		} else {
			$data['konten'] = "list_data";
			$this->_template($data);
		}
	}

	public function notifWa()
	{
		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("notif_wa");
		} else {
			$data['konten'] = "notif_wa";
			$this->_template($data);
		}
	}

	public function notifEmail()
	{
		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("notif_email");
		} else {
			$data['konten'] = "notif_email";
			$this->_template($data);
		}
	}
}
