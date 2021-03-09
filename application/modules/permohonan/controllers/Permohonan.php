<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permohonan extends MY_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model', 'mdl');
		$this->m_konfig->validasi_session(array("user", "registrasi", "distributor"));

		date_default_timezone_set("Asia/Jakarta");
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
	public function persus()
	{

		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("persus");
		} else {
			redirect("mode_fisik");
			$data['konten'] = "persus";
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
	public function lainnya()
	{

		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			echo	$this->load->view("lainnya");
		} else {
			redirect("mode_fisik");
			$data['konten'] = "lainnya";
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

	function detail_peserta_persus()
	{
		echo $this->load->view("getDetailPesertaPersus");
	}

	function edit_peserta_persus()
	{
		echo $this->load->view("getEditPesertaPersus");
	}
	function edit_peserta_souvenir()
	{
		echo $this->load->view("getEditPesertaSouvenir");
	}
	function detail_peserta_lainnya()
	{
		echo $this->load->view("getDetailPesertaLainnya");
	}

	function edit_peserta_lainnya()
	{
		echo $this->load->view("getEditPesertaLainnya");
	}

	function update_peserta_lainnya()
	{
		$jper = $this->input->post("jper");
		if ($jper == 4) {
			echo json_encode($this->mdl->update_peserta_suci());
		} else {
			echo json_encode($this->mdl->update_peserta_lainnya());
		}
	}

	function update_peserta_persus()
	{
		$cek = $this->input->post("kode");
		if (!$cek) {
			echo $this->m_reff->page403();
			return false;
		}
		echo json_encode($this->mdl->update_peserta_persus());
	}

	function delete_peserta_persus()
	{
		echo $this->mdl->delete_peserta_persus();
	}

	function delete_peserta_lainnya()
	{
		echo $this->mdl->delete_peserta_lainnya();
	}

	function detail_peserta_online()
	{
		echo $this->load->view("getDetailPesertaOnline");
	}

	function edit_peserta_online()
	{
		echo $this->load->view("getEditPesertaOnline");
	}

	function update_peserta_online()
	{
		echo json_encode($this->mdl->update_peserta_online());
	}

	function delete_peserta_online()
	{
		echo json_encode($this->mdl->delete_peserta_online());
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
			if ($dataDB->diterima_oleh or !$dataDB->jadwal_distribusi) {
				$row[] = "";
			} else {
				$row[] = ' 
			 
			  <input type="checkbox" id="md_checkbox_' . $dataDB->id . '"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="' . $dataDB->id . '" />
                                <label for="md_checkbox_' . $dataDB->id . '">&nbsp;</label>';
			}

			$row[] = "<span >" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}
			if ($dataDB->instansi) {
				$instansi = $dataDB->instansi;
			} else {
				$instansi = "---";
			}

			$dispo = "  Belum";
			if ($dataDB->jenis_acara == 1) {
				$acara = "<span class='text-black'>Pagi</span>";
				if ($dataDB->blok1) {
					$dispo = "  <span class='text-primary fa'>Terverifikasi</span>";
				}
			} elseif ($dataDB->jenis_acara == 2) {
				$acara = "<span class='text-black'>Sore</span>";
				if ($dataDB->blok2) {
					$dispo = "  <span class='text-primary fa'>Terverifikasi</span>";
				}
			} elseif ($dataDB->jenis_acara == 3) {
				$acara = "<span class='text-black'>Pagi & Sore</span>";
				if ($dataDB->blok2 and $dataDB->blok1) {
					$dispo = "  <span class='text-primary fa'>Terverifikasi</span>";
				}
			} else {
				$acara = "-";
				if ($dataDB->sts_acc == 2 && $dataDB->sts_suci == 1) {
					$dispo = "  <span class='text-primary fa'>Terverifikasi</span>";
				} elseif ($dataDB->sts_suci == 2) {
					$dispo = "Ditolak";
				}
			}

			if ($dataDB->jadwal_distribusi) {
				$jadwal		=	$this->tanggal->hariLengkap($dataDB->jadwal_distribusi, "/");
				$disbutton	=	"";
			} else {
				$jadwal	=	"-";
				$disbutton	=	"disabled";
			}

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span class='text-success'>oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	$this->tanggal->eng3(substr($dataDB->diterima_tgl, 0, 10), "/");
				$href			=	"";
			} else {
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
			}


			if ($dataDB->jadwal_distribusi and $dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail"  onclick="detail_peserta_online(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_online(`' . $dataDB->id . '`)">
														Edit
													</a>
												</li>
											</ul>

										</div>';
			} elseif ($dataDB->jadwal_distribusi and !$dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												 
												 
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_online(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_online(`' . $dataDB->id . '`)">
														Edit
													</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Diskulifikasi
													</a> 													
													
												</li>
											</ul>

										</div>';
			} else {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_online(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_online(`' . $dataDB->id . '`)">
														Edit
													</a>
													<!--<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapusd
													</a> -->
													
												</li>
											</ul>

										</div>';
			}


			if ($dataDB->hps) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-danger  "   >
												<b>Didiskulifikasi</b>
											</button>
											<ul style="display:none;position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_online(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_online(`' . $dataDB->id . '`)">
														Edit
													</a>
													<!--<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapusd
													</a> -->
													
												</li>
											</ul>

										</div>';
			}
			$ambil = $nama_pengambil . br() . $pengambilan;

			if ($dataDB->sts_acc == 3) {
				$acara = "Ditolak";
			}
			if ($dataDB->sts_acc == 3 and $dataDB->sts_suci != 1) {
				$dispo = "<button data-toggle='modal' data-target='#mdl_detail' onclick='detail_peserta_online(`" . $dataDB->id . "`)' class='dt-button btn btn-danger btn-border btn-round btn-sm dt-padding-right'>Ditolak</button>";
				$jadwal = "<button  data-toggle='modal' data-target='#mdl_detail' onclick='detail_peserta_online(`" . $dataDB->id . "`)'  class='dt-button btn btn-danger btn-border btn-round btn-sm dt-padding-right'>Ditolak</button>";
				$ambil = "<button data-toggle='modal' data-target='#mdl_detail' onclick='detail_peserta_online(`" . $dataDB->id . "`)'  class='dt-button btn btn-danger btn-border btn-round btn-sm dt-padding-right'>Ditolak</button>";
			}
			$rsuci = "-";
			if ($dataDB->r_suci == 1) {
				$rsuci = "Ya";
			}
			if ($dataDB->r_suci == 1 and $dataDB->sts_suci == 2) {
				$rsuci = "Ditolak";
			}


			$nama			=	$dataDB->nama;
			$kab			=	$this->m_reff->goField("wil_kabupaten", "nama", "where id_kab='" . $dataDB->id_provinsi . "' ");
			$prov			=	$this->m_reff->goField("wil_provinsi", "nama", "where id_prov='" . $dataDB->id_kota . "' ");
			//	$row[]			= 	$nama.br()."<span class='text-primary'>".strtolower($kab)." -".$prov."</span>";
			$row[]			= 	$nama . br() . "Reg: <span class='text-primary'>" . $this->tanggal->hariLengkap(substr($dataDB->tgl, 0, 10), "/") . "</span>";

			$row[]			= 	$acara;
			$row[]			= 	$rsuci;
			$row[]			= 	$dispo;
			$row[]			= 	$jadwal;
			$row[]			= 	$ambil;
			$row[]			= 	$button;


			$data[] 		= 	$row;
		}

		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->mdl->count_file_peserta("data_peserta"),
			"recordsFiltered" => $this->mdl->count_file_peserta('data_peserta'),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
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

		foreach ($list as $dataDB) {
			////

			$row = array();

			$row[] = ' 
			 
			  <input type="checkbox" id="md_checkbox_' . $dataDB->kode . '"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="' . $dataDB->kode . '" />
                                <label for="md_checkbox_' . $dataDB->kode . '">&nbsp;</label>';

			$row[] = "<span  >" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}



			if ($dataDB->sts_dispo == 1) {
				if ($dataDB->diterima_oleh) {
					$dispo = "<span class='  fas fa-check-double' ></span> <span   >Sudah</span>";
				} else {
					$dispo = "<span class='text-success fas fa-check-double' ></span> <span class='text-success' onclick='getDispo(`" . $dataDB->id . "`)'>Sudah</span>";
				}
			} elseif ($dataDB->sts_dispo == 2) {
				$dispo = "<button class='cursor' onclick='getDispo(`" . $dataDB->id . "`)'>Belum</button>";
			} elseif ($dataDB->sts_dispo == 3) {
				$dispo = "<button class='cursor bg-orange' onclick='getDispo(`" . $dataDB->id . "`)'>Draft</button>";
			}



			$jadwal	=	"-";
			$disbutton	=	"disabled";

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span  >oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	"<span style='font-size:11px'>" . $this->tanggal->eng3($dataDB->diterima_tgl, "/") . "</span>";
				$href			=	"";
			} else {
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
			}


			if ($dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_persus(`' . $dataDB->id . '`)">
														Edit
													</a>
												</li>
											</ul>

										</div>';
			} elseif (!$dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_persus(`' . $dataDB->id . '`)">
														Edit
													</a>
												 	<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapus
													</a> 	 										
													
												</li>
											</ul>

										</div>';
			} else {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_persus(`' . $dataDB->id . '`)">
														Edit
													</a>
												<!--	<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapus
													</a> 	--->												
												</li>
											</ul>

										</div>';
			}
			if ($dataDB->jenis_permohonan == 2) {
				$jenis_permohonan = "Persus";
			} else {
				$jenis_permohonan = "Given";
			}

			if ($dataDB->sts_qrcode == 1) {
				$qrcode = " <span class='text-primary fa'  >Sudah disiapkan</span>";
			} else {
				$qrcode = "  <span   >Belum disiapkan</span>";
			}

			$jml_pagi		=	$this->mdl->getPagiReal($dataDB->kode);
			$jml_sore		=	$this->mdl->getSoreReal($dataDB->kode);

			$nama			=	"<b>" . $dataDB->nama . "</b>" . br() .
				"<span style='font-size:13px' class='fa fa-clock text-primary'>  " . $this->tanggal->hariLengkap(substr($dataDB->_ctime, 0, 10), "/") . "</span> ";








			$row[]			= 	$nama;
			$row[]			= 	$dataDB->instansi;
			$row[]			= 	"mohon: " . $dataDB->jml_pagi . "<br> Acc: " . $jml_pagi;
			$row[]			= 	"mohon: " . $dataDB->jml_sore . "<br> Acc: " . $jml_sore;
			$row[]			= 	$dispo;
			$row[]			= 	$qrcode;

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
		//output to json format
		echo json_encode($output);
	}


	function ajax_souvenir()
	{
		$list = $this->mdl->get_persus();
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
			 
			  <input type="checkbox" id="md_checkbox_' . $dataDB->kode . '"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="' . $dataDB->kode . '" />
                                <label for="md_checkbox_' . $dataDB->kode . '">&nbsp;</label>';

			$row[] = "<span >" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}






			$jadwal	=	"-";
			$disbutton	=	"disabled";

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span  >oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	"<span style='font-size:11px'>" . $this->tanggal->eng3($dataDB->diterima_tgl, "/") . "</span>";
				$href			=	"";
			} else {
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
			}


			if ($dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													 
												</li>
												
												<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapus
													</a> 	
											</ul>

										</div>';
			} elseif (!$dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													 
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_persus(`' . $dataDB->id . '`)">
														Edit
													</a>
												 	<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapus
													</a> 	 										
													
												</li>
											</ul>

										</div>';
			} else {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_persus(`' . $dataDB->id . '`)">
														Edit
													</a>
												<!--	<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapus
													</a> 	--->												
												</li>
											</ul>

										</div>';
			}


			if ($dataDB->sts_qrcode == 1) {
				$qrcode = " <span class='text-primary fa'  >Sudah disiapkan</span>";
			} else {
				$qrcode = "  <span   >Belum disiapkan</span>";
			}

			$jml_pagi		=	$this->mdl->getPagiReal($dataDB->kode);
			$jml_sore		=	$this->mdl->getSoreReal($dataDB->kode);

			$nama			=	"<b>" . $dataDB->nama . "</b><br>" . $dataDB->instansi;




			$vvip			=	$dataDB->souvenir_1;
			$vip			=	$dataDB->souvenir_2;
			$umum			=	$dataDB->souvenir_3;



			if ($dataDB->jadwal_distribusi and $dataDB->jadwal_distribusi != "0000-00-00") {
				$jadwal		=	$this->tanggal->hariLengkap($dataDB->jadwal_distribusi, "/");
			} elseif ($dataDB->jadwal_distribusi == "0000-00-00") {
				$jadwal		=	"<span class='text-danger'>Tidak dijadwalkan</span>";
			} else {
				$jadwal	=	"-";
			}

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span class='text-success'>oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	$this->tanggal->ind(substr($dataDB->diterima_tgl, 0, 10), "/");
			} else {
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
			}


			$row[]			= 	$nama;
			$row[]			= 	"Pagi :" . $dataDB->jml_pagi . "<br>Sore :" . $dataDB->jml_sore;
			$row[]			= 	"<div style='font-size:13px'>VVIP: <b>" . $vvip . "</b>" . br() . "VIP: <b>" . $vip . "</b>" . br() . "UMUM: <b>" . $umum . "</b></div>";

			//$row[]			= 	$dispo;

			$row[]			= 	$jadwal;
			$row[]			= 	$nama_pengambil . br() . $pengambilan;
			$row[]			= 	$button;


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



	function ajax_lainnya()
	{
		$list = $this->mdl->get_lainnya();
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


			$row[] = "<span class='size'>" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}



			if ($dataDB->sts_dispo == 1) {
				if ($dataDB->diterima_oleh) {
					$dispo = "  <span   >Terverifikasi</span>";
				} else {
					$dispo = " <span class='text-primary fa' onclick='getDispo(`" . $dataDB->id . "`)'>Terverifikasi</span>";
				}
			} elseif ($dataDB->sts_dispo == 2) {
				$dispo = "<button class='cursor' onclick='getDispo(`" . $dataDB->id . "`)'>Belum</button>";
			} elseif ($dataDB->sts_dispo == 3) {
				$dispo = "<button class='cursor bg-orange' onclick='getDispo(`" . $dataDB->id . "`)'>Draft</button>";
			}



			$jadwal	=	"-";
			$disbutton	=	"disabled";

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span  >oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	"<span style='font-size:11px'>" . $this->tanggal->hariLengkap(substr($dataDB->diterima_tgl, 0, 10), "/") . "</span>";
				$href			=	"";
			} else {
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
			}


			if ($dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_persus(`' . $dataDB->id . '`)">
														Edit
													</a>
												</li>
											</ul>

										</div>';
			} elseif (!$dataDB->diterima_oleh) {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_persus(`' . $dataDB->id . '`)">
														Edit
													</a>
										 	<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapus
													</a> 	 									
													
												</li>
											</ul>

										</div>';
			} else {
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</a>
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit_peserta_persus(`' . $dataDB->id . '`)">
														Edit
													</a>
												<!--	<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`' . $dataDB->id . '`)" >
														Hapus
													</a> 	--->												
												</li>
											</ul>

										</div>';
			}

			$jenis_permohonan = $this->m_reff->goField('tr_kategory', 'nama', 'where id="' . $dataDB->jenis_permohonan . '" ');

			if ($dataDB->sts_qrcode == 1) {
				$qrcode = " <span class='text-primary fa'  >Sudah disiapkan</span>";
			} else {
				$qrcode = "  <span   >Belum disiapkan</span>";
			}

			$jml			=	$this->mdl->getJmlReal($dataDB->kode, $dataDB->jenis_permohonan);

			$nama			=	$dataDB->nama;
			$row[]			= 	"<b>" . $dataDB->nama . "</b>" . br() .
				"<span style='font-size:13px' class='fa fa-clock text-primary'>  " . $this->tanggal->hariLengkap(substr($dataDB->_ctime, 0, 10), "/") . "</span> ";
			$row[]			= 	$dataDB->instansi;
			$row[]			= 	$jenis_permohonan;
			$row[]			= 	"Mohon: " . $dataDB->jml . "<br> Acc: " . $jml;

			$row[]			= 	$dispo;
			$row[]			= 	$qrcode;

			$row[]			= 	$nama_pengambil . br() . $pengambilan;

			$row[]			= 	$button;


			$data[] 		= 	$row;
		}

		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->mdl->count_file_lainnya(),
			"recordsFiltered" => $this->mdl->count_file_lainnya(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}



	function dataProvinsi()
	{
		$query_data = "";
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
		$this->db->where("id_prov", $prov);
		$this->db->order_by("nama", "asc");
		$data = $this->db->get("wil_kabupaten")->result();
		$db[""] = "---- semua kab/kota ----";
		foreach ($data as $data) {
			$db[$data->id_kab] = $data->nama;
		}
		echo form_dropdown("fkab", $db, "", "id='fkab' class='form-control' ");
	}
	function getDispoPersus()
	{
		$mode	=	$this->m_reff->tm_pengaturan(39);
		if ($mode == 1) {
			$this->load->view("getDispoPersus");
		} else {
			$this->load->view("getDispoSouvenir");
		}
	}
	function getDispoLainnya()
	{
		$this->load->view("getDispoLainnya");
	}

	function setBlokPersus()
	{
		$data	= $this->mdl->setBlokPersus();
		echo json_encode($data);
	}
	function setBlokPersusSouvenir()
	{
		$data	= $this->mdl->setBlokPersusSouvenir();
		echo json_encode($data);
	}
	function delete_peserta_souvenir_cek()
	{
		$data	= $this->mdl->delete_peserta_souvenir_cek();
		echo json_encode($data);
	}
	function setStatus()
	{
		echo $this->mdl->setStatus();
	}
	function setJmlLainnya()
	{
		$jml	=	$this->input->post("jml");
		$kode	=	$this->input->post("kode");
		$data	=	$this->mdl->setJmlLainnya($kode, $jml);
		echo json_encode($data);
	}
	function setJmlSuci()
	{
		$jml	=	$this->input->post("jml");
		$kode	=	$this->input->post("kode");
		$data	=	$this->mdl->setJmlSuci($kode, $jml);
		echo json_encode($data);
	}

	function setStatusLainnya()
	{
		echo $this->mdl->setStatusLainnya();
	}
	function setStatusSuci()
	{
		echo $this->mdl->setStatusSuci();
	}
	function hapus_cek()
	{
		echo $this->mdl->hapus_cek();
	}
	function broadcast()
	{
		$this->load->view("broadcast");
	}
	function broadcast_persus()
	{
		$this->load->view("broadcast_persus");
	}
	function setBroadcast()
	{
		$echo = $this->mdl->setBroadcast();
		//echo json_encode($echo);
		echo "<table class='entry'><tr>
	<td>Notifikasi Terkirim</td><td>" . $echo["ok"] . "</td>
	</tr><tr>
	<td valign='top'>Gagal Terkirim</td><td>" . $echo["gagal"] . "<br>" . $echo["dgagal"] . "</td>
	</tr></table>";
	}
	function setBroadcastPersus()
	{
		$echo = $this->mdl->setBroadcastPersus();
		//echo json_encode($echo);
		echo "<table class='entry'><tr>
	<td>Notifikasi Terkirim</td><td>" . $echo["ok"] . "</td>
	</tr><tr>
	<td valign='top'>Gagal Terkirim</td><td>" . $echo["gagal"] . "<br>" . $echo["dgagal"] . "</td>
	</tr></table>";
	}

	function cetak_label()
	{

		$opsi	= $this->input->get("opsi");
		$id		= $this->input->get("id");
		if (!$id) {
			echo $this->m_reff->page403();
			return false;
		}
		$data['id'] = $id;
		ob_start();
		//include('file.html');

		$isi = $this->load->view('cetak_label_121', $data);

		$isi = ob_get_clean();

		require_once('assets/html2pdf/html2pdf.class.php');
		try {
			$html2pdf = new HTML2PDF('P', array("210", "165"), 'en', true, '', array(0.5, 0.5, 0, 0));
			$html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
			$html2pdf->Output('undangan.pdf');
		} catch (HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}

	function download_souvenir()
	{
		echo $this->mdl->download_souvenir();
	}
}
