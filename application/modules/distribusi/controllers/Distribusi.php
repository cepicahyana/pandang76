<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Distribusi extends MY_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model', 'mdl');
		$this->load->model('m_model_souvenir', 'mdls');
		$this->m_konfig->validasi_session(array("user", "registrasi"));

		date_default_timezone_set("Asia/Jakarta");
	}

	function tes($phone, $tgl)
	{
		ob_start();
		//include('file.html');
		$data["val"] = $phone;
		$data["tgl"] = $tgl;
		$isi = $this->load->view('genUndangan', $data);

		$isi = ob_get_clean();

		require_once('assets/html2pdf/html2pdf.class.php');
		try {
			$html2pdf = new HTML2PDF('P', array("110", "190"), 'en', true, '', array(0, 0, 0, 0));
			$html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
			//  $html2pdf->AddFont('monotypecorsiva', 'bold', 'monotypecorsiva.php'); 
			$html2pdf->Output('file_upload/' . $phone . '.pdf');
		} catch (HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
	function _template($data)
	{

		$this->load->view('temp_user/main', $data);
	}

	function form_filter()
	{
		$this->load->view('form_filter');
	}

	public function index()
	{

		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("index");
		} else {

			$data['konten'] = "index";
			$this->_template($data);
		}
	}
	public function souvenir()
	{

		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("souvenir");
		} else {
			redirect("mode_souvenir");
			$data['konten'] = "souvenir";
			$this->_template($data);
		}
	}
	function online()
	{
		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("index");
		} else {
			redirect("mode_fisik");
			$data['konten'] = "index";
			$this->_template($data);
		}
	}


	function ajax_peserta()
	{
		$list = $this->mdl->get_peserta();
		$data = array();
		$no = $this->input->post("start");
		$no = $no + 1;
		if (!$this->input->post("draw")) {
			echo $this->m_reff->page403();
			return false;
		}


		foreach ($list as $dataDB) {
			////

			$row = array();

			$row[] = ' 
			 
			  <input type="checkbox" id="md_checkbox_' . $dataDB->id . '"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="' . $dataDB->id . '" />
                                <label for="md_checkbox_' . $dataDB->id . '">&nbsp;</label> 
			 ';
			$row[] = "<span class='size'>" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}


			$dispo = "  Belum";
			if ($dataDB->jenis_acara == 1) {
				$acara = "<span class='text-black'>Pagi</span>";
				if ($dataDB->blok1) {
					$dispo = "<span class='text-success fas fa-check-double'></span> <span class='text-success'>Sudah</span>";
				}
			} elseif ($dataDB->jenis_acara == 2) {
				$acara = "<span class='text-black'>Sore</span>";
				if ($dataDB->blok2) {
					$dispo = "<span class='text-success fas fa-check-double'></span> <span class='text-success'>Sudah</span>";
				}
			} elseif ($dataDB->jenis_acara == 3) {
				$acara = "<span class='text-black'>Pagi & Sore</span>";

				if ($dataDB->blok1 and $dataDB->blok2) {
					$dispo = "<span class='text-success fas fa-check-double'></span> <span class='text-success'>Sudah</span>";
				}
			} else {
				$acara = "";
			}





			if ($dataDB->jadwal_distribusi and $dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>OPTION</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:detail(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:detail(`' . $dataDB->id . '`)">Edit</a> 
												</li>
											</ul>

										</div>';
			} elseif ($dataDB->jadwal_distribusi and !$dataDB->diterima_oleh) {
			} else {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>OPTION</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="#">Detail</a>
													<a class="dropdown-item" href="#">Edit</a>
													<a class="dropdown-item" href="#">Hapus</a> 
													
												</li>
											</ul>

										</div>';
			}
			if ($dataDB->sts_acc == 2 and $dataDB->sts_suci == 1) {
				if ($acara) {
					$acara = $acara . " + R.Suci";
				} else {
					$acara = "R.Suci";
				}
			} elseif ($dataDB->sts_acc == 3 and $dataDB->sts_suci == 1) {
				$acara = "R.Suci";
			}

			$nama			=	$dataDB->nama;
			$kab			=	$this->m_reff->goField("wil_kabupaten", "nama", "where id_kab='" . $dataDB->id_kota . "' ");
			$prov			=	$this->m_reff->goField("wil_provinsi", "nama", "where id_prov='" . $dataDB->id_provinsi . "' ");
			$row[]			= 	$nama;
			$row[]			= 	$acara;
			$row[]			= 	strtolower($kab);
			$row[]			= 	$prov;



			$data[] 		= 	$row;
		}

		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->mdl->count_file_peserta("data_peserta"),
			"recordsFiltered" => $this->mdl->count_file_peserta('data_peserta'),
			"data" => $data,
		);

		echo json_encode($output);
	}

	function ajax_souvenir()
	{
		$list = $this->mdl->get_souvenir();
		$data = array();
		$no = $this->input->post("start");
		$no = $no + 1;
		if (!$this->input->post("draw")) {
			echo $this->m_reff->page403();
			return false;
		}


		foreach ($list as $dataDB) {
			////

			$row = array();

			$row[] = ' 
			 
			  <input type="checkbox" id="md_checkbox_' . $dataDB->id . '"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="' . $dataDB->id . '" />
                                <label for="md_checkbox_' . $dataDB->id . '">&nbsp;</label> 
			 ';
			$row[] = "<span class='size'>" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama . br() . $dataDB->instansi;
			} else {
				$natam = "---";
			}


			$dispo = "  Belum";



			if ($dataDB->jadwal_distribusi and $dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>OPTION</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:detail(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:detail(`' . $dataDB->id . '`)">Edit</a> 
												</li>
											</ul>

										</div>';
			} elseif ($dataDB->jadwal_distribusi and !$dataDB->diterima_oleh) {
			} else {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>OPTION</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="#">Detail</a>
													<a class="dropdown-item" href="#">Edit</a>
													<a class="dropdown-item" href="#">Hapus</a> 
													
												</li>
											</ul>

										</div>';
			}



			$row[]			= 	$natam;
			$row[]			= 	$dataDB->email . br() . $dataDB->hp;
			$row[]			= 	"Pagi :" . $dataDB->jml_pagi . "<br>Sore :" . $dataDB->jml_sore;
			$row[]			= 	$dataDB->souvenir_1;
			$row[]			= 	$dataDB->souvenir_2;
			$row[]			= 	$dataDB->souvenir_3;


			$data[] 		= 	$row;
		}

		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->mdl->count_file_souvenir(),
			"recordsFiltered" => $this->mdl->count_file_souvenir(),
			"data" => $data,
		);

		echo json_encode($output);
	}


	function ajax_persus()
	{
		$list = $this->mdl->get_persus();
		$data = array();
		$no = $this->input->post("start");
		if (!$this->input->post("draw")) {
			echo $this->m_reff->page403();
			return false;
		}
		$no = $no + 1;
		foreach ($list as $dataDB) {

			$row = array();


			$row[] = "<span class='size'>" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}



			if ($dataDB->sts_dispo == 1) {
				$dispo = "<span class='text-success fas fa-check-double' ></span> <span class='text-success' onclick='getDispo(`" . $dataDB->id . "`)'>Sudah</span>";
			} elseif ($dataDB->sts_dispo == 2) {
				$dispo = "<button class='cursor' onclick='getDispo(`" . $dataDB->id . "`)'>Belum</button>";
			} elseif ($dataDB->sts_dispo == 3) {
				$dispo = "<button class='cursor bg-orange' onclick='getDispo(`" . $dataDB->id . "`)'>Draft</button>";
			}



			$jadwal	=	"-";
			$disbutton	=	"disabled";

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span class='text-success'>oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	$this->tanggal->eng3($dataDB->diterima_tgl, "/");
				$href			=	"";
			} else {
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
			}


			if ($dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>OPTION</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:detail(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:detail(`' . $dataDB->id . '`)">Edit</a> 
												</li>
											</ul>

										</div>';
			} elseif (!$dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>OPTION</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item"  href="javascript:detail(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item"  href="javascript:edit(`' . $dataDB->id . '`)">Edit</a>
													<a class="dropdown-item"  href="javascript:hapus(`' . $dataDB->id . '`)">Hapus</a>
													
													
												</li>
											</ul>

										</div>';
			} else {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>OPTION</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="#">Detail</a>
													<a class="dropdown-item" href="#">Edit</a>
													<a class="dropdown-item" href="#">Hapus</a> 
													
												</li>
											</ul>

										</div>';
			}
			if ($dataDB->jenis_permohonan == 2) {
				$jenis_permohonan = "Persus";
			} else {
				$jenis_permohonan = "Given";
			}

			$nama			=	$dataDB->nama;
			$row[]			= 	$nama;
			$row[]			= 	$dataDB->jml_pagi;
			$row[]			= 	$dataDB->jml_sore;
			$row[]			= 	$dispo;

			$row[]			= 	$nama_pengambil . br() . $pengambilan;
			$row[]			= 	$jenis_permohonan;
			$row[]			= 	$button;


			$data[] 		= 	$row;
		}

		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->mdl->count_file_persus("data_peserta"),
			"recordsFiltered" => $this->mdl->count_file_persus('data_peserta'),
			"data" => $data,
		);
		echo json_encode($output);
	}



	function dataProvinsi()
	{
		$query_data = array();
		$s = $this->input->get_post("search");
		if ($s) {
			$this->db->like("nama", $s);
		}

		$this->db->order_by("nama", "asc");
		$query = $this->db->get("wil_provinsi")->result();

		foreach ($query as $v) {
			$query_data[] = ["id" => $v->id_prov, "text" => $v->nama];
		}

		echo	  json_encode($query_data);
	}
	function form_kab()
	{
		$prov	=	$this->input->get_post("val");
		if (!$prov) {
			return   $this->m_reff->page403();
		}
		$this->db->where("id_prov", $prov);
		$this->db->order_by("nama", "asc");
		$data = $this->db->get("wil_kabupaten")->result();
		$db[null] = "---- semua kab/kota ----";
		foreach ($data as $data) {
			$db[$data->id_kab] = ucwords(strtolower($data->nama));
		}
		echo form_dropdown("fkab", $db, "", "id='fkab' class='form-control' onchange='reload_table()' ");
		echo "<script>
													$('#fkab').select2({
														theme: 'bootstrap'
													});
													</script>";
	}
	function getDispoPersus()
	{
		$this->load->view("getDispoPersus");
	}

	function setBlokPersus()
	{
		$data	= $this->mdl->setBlokPersus();
		echo json_encode($data);
	}
	function setDistribusi()
	{
		$model	=	$this->m_reff->tm_pengaturan(39);
		if ($model == 1) {
			$echo = $this->mdl->setDistribusi();
			echo "<table class='entry'><tr>
			<td>Notifikasi Terkirim</td><td>" . $echo["ok"] . "</td>
			</tr><tr>
			<td valign='top'>Gagal Terkirim</td><td>" . $echo["gagal"] . "<br>" . $echo["dgagal"] . "</td>
			</tr></table>";
		} else {
			$echo = $this->mdl->setDistribusiSouvenir();
			echo "Berhasil dijadwalkan!";
		}
	}
	function cek()
	{
		$tgl = "2019-09-97";
		$data = $this->db->get("data_persus")->row();
		echo	$this->mdl->isiEMailSouvenir($data, $tgl);
	}
	function isiModalDistribusi()
	{
		$this->load->view("isiModalDistribusi");
	}
	function isiModalDistribusiSouvenir()
	{
		$this->load->view("isiModalDistribusiSouvenir");
	}
	function getDetailRange()
	{
		$this->load->view("getDetailRange");
	}
	function getDetailRangeSouvenir()
	{
		$this->load->view("getDetailRangeSouvenir");
	}
}
