<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penyerahan extends MY_Controller
{



	function __construct()
	{
		parent::__construct();
		$this->m_konfig->validasi_session(array("distributor", "user"));
		$this->load->model("model", "mdl");
		date_default_timezone_set('Asia/Jakarta');
	}
	function setPenerima()
	{
		echo $this->mdl->setPenerima();
	}
	function setPenerimaPersus()
	{
		echo $this->mdl->setPenerimaPersus();
	}
	function setPenerimaLainnya()
	{
		echo $this->mdl->setPenerimaLainnya();
	}
	function setTanggalTerima()
	{
		echo $this->mdl->setTanggalTerima();
	}
	function _template($data)
	{

		$level = $this->session->userdata("level");
		if ($level == "user") {
			$this->load->view('temp_user/main', $data);
		} else {
			$this->load->view('temp_verifikator/main', $data);
		}
	}
	function setKode()
	{
		$id		=	$this->input->post("id");
		if (!$id) {
			return false;
		}
		$ke		=	$this->input->post("ke");
		$idblok	=	$this->input->post("idblok");
		$kode	=	$this->input->post("kode");
		$cek	=	$this->db->query("select * from data_peserta where (barcode1='" . $kode . "' or barcode2='" . $kode . "' or barcode3='" . $kode . "') ")->num_rows();
		if ($cek) {
			echo "false";
			return false;
		}


		if ($idblok != substr($kode, 0, 2) and $ke != 3) {
			echo "wrong";
			return false;
		}

		if ("44" != substr($kode, 0, 2) and $ke == 3) {
			echo "wrong";
			return false;
		}

		$this->db->where("id", $id);
		$this->db->set("barcode" . $ke, $kode);
		$this->db->set("sts_acc", 2);

		return $this->db->update("data_peserta");
		//return $this->m_reff->qr($kode);
	}

	function setKodeLainnya()
	{
		$id		=	$this->input->post("id");
		$kode	=	$this->input->post("kode");
		$cek	=	$this->db->query("select * from data_peserta_rangkaian where (barcode='" . $kode . "') ")->num_rows();
		if ($cek) {
			echo "false";
			return false;
		}

		$this->db->where("id", $id);
		$this->db->set("barcode", $kode);

		return $this->db->update("data_peserta_rangkaian");
	}
	function setKodeSuci()
	{
		$id		=	$this->input->post("id");
		$kode	=	$this->input->post("kode");
		$cek	=	$this->db->query("select * from data_peserta  where (barcode3='" . $kode . "') ")->num_rows();
		if ($cek) {
			echo "false";
			return false;
		}

		$this->db->where("id", $id);
		$this->db->set("barcode3", $kode);
		return $this->db->update("data_peserta");
	}

	function getData()
	{
		echo	$this->load->view("getData");
	}
	function getDataPersus()
	{
		echo	$this->load->view("getDataPersus");
	}
	function getDataLainnya()
	{
		echo	$this->load->view("getDataLainnya");
	}
	function getDataSuci()
	{
		echo	$this->load->view("getDataSuci");
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

	function tes()
	{	//return false;
		$c = "<center><b>INFORMASI PENYERAHAN UNDANGAN<br> HUT RI " . $this->m_reff->tm_pengaturan(31) . "</b></center><br>
		Kepada Yth Bapak/Ibu/Saudara <b>cepi cahyana</b> permohonan undangan anda telah selesai diproses,
		silahkan untuk melakukan pengambilan pada hari & jam kerja.<br><br>
		<b>Detail permohonan :</b>
		<table style='width:100%'>
		<tr>
		<td>Nama Pemohon</td><td> : cepi cahyana </td>
		</tr>
		<tr>
		<td>Instansi</td><td>: Pemerintahan</td>
		</tr>
		<tr>
		<td>Kode Pendaftaran</td><td>: 98798798</td>
		</tr>
		</table><br>
		<center>
		<img src='" . base_url() . "qr/1101040801160320.png' width='100px'>
		</center>
		";
		echo $this->m_umum->email_temp($c);
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
			if ($dataDB->sts_qrcode == 1 and !$dataDB->diterima_oleh) {
				$row[] = '  
			  <input type="checkbox" id="md_checkbox_' . $dataDB->id . '"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="' . $dataDB->id . '" />
                                <label for="md_checkbox_' . $dataDB->id . '">&nbsp;</label> 
			 ';
			} else {
				$row[] = "";
			}

			$row[] = "<span class='size'>" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}



			if ($dataDB->sts_dispo == 1) {
				if ($dataDB->diterima_oleh) {
					$dispo = "<span class='text-primary fa ' > Sudah</span>";
				} else {
					$dispo = "<span class='text-primary fa ' > Sudah</span>";
				}
			} elseif ($dataDB->sts_dispo == 2) {
				$dispo = " Belum ";
			} elseif ($dataDB->sts_dispo == 3) {
				$dispo = " Draft ";
			}



			$jadwal	=	"-";
			$disbutton	=	"disabled";

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span  >oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	"<span style='font-size:11px'>" . $this->tanggal->eng3(substr($dataDB->diterima_tgl, 0, 10), "/") . "</span>";
				$href			=	"";
			} else {
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
			}


			if ($dataDB->diterima_oleh) {
				$button			=	'  <button class="  btn btn-primary btn-sm"   data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</button>
									';
			} elseif (!$dataDB->diterima_oleh) {
				$button			=	'  	<button class="  btn btn-primary btn-sm"   data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</button>
												 ';
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

			if ($dataDB->sts_qrcode == 1 and !$dataDB->diterima_oleh) {
				$qrcode = "<span onclick='kode(`" . $dataDB->kode . "`,`" . $dataDB->sts_dispo . "`)'  class='text-primary fa' >  Sudah siap</span>";
			} elseif ($dataDB->sts_qrcode == 1 and $dataDB->diterima_oleh) {
				$qrcode = "<span    class='text-primary fa' >  Sudah siap</span>";
			} else {
				$qrcode = "  <button class='cursor' onclick='kode(`" . $dataDB->kode . "`,`" . $dataDB->sts_dispo . "`)'  >Belum disiapkan</button>";
			}

			$jml_pagi		=	$this->mdl->getPagiReal($dataDB->kode);
			$jml_sore		=	$this->mdl->getSoreReal($dataDB->kode);
			$ambil			=	$nama_pengambil . br() . $pengambilan;


			if (!$dataDB->diterima_oleh and $dataDB->sts_qrcode == 1) {
				$pengambilan	=	"<button class='cursor' onclick='kode(`" . $dataDB->kode . "`,`" . $dataDB->sts_dispo . "`)'>Lakukan penyerahan</button>";
			}

			if ($dataDB->diterima_oleh) {
				$pengambilan	=	$nama_pengambil . br() . $pengambilan;
			}

			$notif			=	"";
			if ($dataDB->notif) {
				$notif			=	$this->tanggal->ind(substr($dataDB->notif, 0, 10), "/");
			}

			$nama			=	"<span class='cursor' data-toggle='modal' data-target='#mdl_detail' onclick='detail_peserta_persus(`" . $dataDB->id . "`)'><b >" . $dataDB->nama . "</b>" . br() .
				"<span style='font-size:13px' class='fa fa-clock text-primary'>  " . $this->tanggal->hariLengkap(substr($dataDB->_ctime, 0, 10), "/") . "</span></span> ";
			$row[]			= 	$nama;
			$row[]			= 	$dataDB->instansi;
			$row[]			= 	"mohon: " . $dataDB->jml_pagi . "<br> Acc: " . $jml_pagi;
			$row[]			= 	"mohon: " . $dataDB->jml_sore . "<br> Acc: " . $jml_sore;
			$row[]			= 	$dispo;
			$row[]			= 	$qrcode;

			$row[]			= 	$pengambilan;
			$row[]			= 	$jenis_permohonan;
			$row[]			= 	"<center>" . $notif . "<center>";


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


	function ajax_lainnnya()
	{
		$list = $this->mdl->get_lainnya();
		$data = array();
		$no = $this->input->post("start");
		if (!$this->input->post("draw")) {
			echo $this->m_reff->page403();
			return false;
		}
		$no = $no + 1;
		foreach ($list as $dataDB) {
			////
			$jper = $dataDB->jenis_permohonan;
			$row = array();
			if ($dataDB->sts_qrcode == 1 and !$dataDB->diterima_oleh) {
				$row[] = '  
			  <input type="checkbox" id="md_checkbox_' . $dataDB->id . '"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="' . $dataDB->id . '" />
                                <label for="md_checkbox_' . $dataDB->id . '">&nbsp;</label> 
			 ';
			} else {
				$row[] = "";
			}

			$row[] = "<span class='size'>" . $no++ . "</span>";


			$button	=	"";

			if ($dataDB->nama) {
				$natam = $dataDB->nama;
			} else {
				$natam = "---";
			}



			if ($dataDB->sts_dispo == 1) {
				if ($dataDB->diterima_oleh) {
					$dispo = "<span class='text-primary fa ' > Sudah</span>";
				} else {
					$dispo = "<span class='text-primary fa ' > Sudah</span>";
				}
			} elseif ($dataDB->sts_dispo == 2) {
				$dispo = " Belum ";
			} elseif ($dataDB->sts_dispo == 3) {
				$dispo = " Draft ";
			}



			$jadwal	=	"-";
			$disbutton	=	"disabled";

			if ($dataDB->diterima_oleh) {
				$nama_pengambil	=	"<span  >oleh: " . $dataDB->diterima_oleh . "</span>";
				$pengambilan	=	"<span style='font-size:11px'>" . $this->tanggal->eng3(substr($dataDB->diterima_tgl, 0, 10), "/") . "</span>";
				$href			=	"";
			} else {
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
			}


			if ($dataDB->diterima_oleh) {
				$button			=	'  <button class="  btn btn-primary btn-sm"   data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</button>
									';
			} elseif (!$dataDB->diterima_oleh) {
				$button			=	'  	<button class="  btn btn-primary btn-sm"   data-toggle="modal" data-target="#mdl_detail" onclick="detail_peserta_persus(`' . $dataDB->id . '`)">Detail</button>
												 ';
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

			$jenis_permohonan = $this->m_reff->goField("tr_kategory", "nama", "where id='" . $dataDB->jenis_permohonan . "' ");

			if ($dataDB->sts_qrcode == 1 and !$dataDB->diterima_oleh) {
				$qrcode = "<span onclick='kode(`" . $dataDB->kode . "`,`" . $dataDB->sts_dispo . "`,`" . $jper . "`)'  class='text-primary fa' >  Sudah siap</span>";
			} elseif ($dataDB->sts_qrcode == 1 and $dataDB->diterima_oleh) {
				$qrcode = "<span    class='text-primary fa' >  Sudah siap</span>";
			} else {
				$qrcode = "  <button class='cursor' onclick='kode(`" . $dataDB->kode . "`,`" . $dataDB->sts_dispo . "`,`" . $jper . "`)'  >Belum disiapkan</button>";
			}

			$jml_pagi		=	$this->mdl->getPagiReal($dataDB->kode);
			$jml_sore		=	$this->mdl->getSoreReal($dataDB->kode);
			$ambil			=	$nama_pengambil . br() . $pengambilan;


			if (!$dataDB->diterima_oleh and $dataDB->sts_qrcode == 1) {
				$pengambilan	=	"<button class='cursor' onclick='kode(`" . $dataDB->kode . "`,`" . $dataDB->sts_dispo . "`,`" . $jper . "`)'>Lakukan penyerahan</button>";
			}

			if ($dataDB->diterima_oleh) {
				$pengambilan	=	$nama_pengambil . br() . $pengambilan;
			}

			$notif			=	"";
			if ($dataDB->notif) {
				$notif			=	$this->tanggal->ind(substr($dataDB->notif, 0, 10), "/");
			}

			$nama			=	"<span class='cursor' data-toggle='modal' data-target='#mdl_detail' onclick='detail_peserta_persus(`" . $dataDB->id . "`)'><b >" . $dataDB->nama . "</b>" . br() .
				"<span style='font-size:13px' class='fa fa-clock text-primary'>  " . $this->tanggal->hariLengkap(substr($dataDB->_ctime, 0, 10), "/") . "</span></span> ";
			$row[]			= 	$nama;
			$row[]			= 	$dataDB->instansi;
			$row[]			= 	"mohon: " . $dataDB->jml . "<br> Acc: " . $this->mdl->getJmlReal($dataDB->kode, $jper);
			$row[]			= 	$dispo;
			$row[]			= 	$qrcode;

			$row[]			= 	$pengambilan;
			$row[]			= 	$jenis_permohonan;
			$row[]			= 	"<center>" . $notif . "<center>";


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


	function setKesiapan()
	{
		$data = $this->mdl->setKesiapan();
		echo json_encode($data);
	}
	function setKesiapanLainnya()
	{
		$data = $this->mdl->setKesiapanLainnya();
		echo json_encode($data);
	}
	function setKesiapanSuci()
	{
		$data = $this->mdl->setKesiapanSuci();
		echo json_encode($data);
	}
	function setStsPenyiapan()
	{
		$echo = $this->mdl->setStsPenyiapan();
		echo "<table class='entry'><tr>
		<td>Notifikasi Terkirim</td><td>" . $echo["ok"] . "</td>
		</tr><tr>
		<td valign='top'>Gagal Terkirim</td><td>" . $echo["gagal"] . "<br>" . $echo["dgagal"] . "</td>
		</tr></table>";
	}
	function setStsPenyiapanLainnya()
	{
		$echo = $this->mdl->setStsPenyiapanLainnya();
		echo "<table class='entry'><tr>
		<td>Notifikasi Terkirim</td><td>" . $echo["ok"] . "</td>
		</tr><tr>
		<td valign='top'>Gagal Terkirim</td><td>" . $echo["gagal"] . "<br>" . $echo["dgagal"] . "</td>
		</tr></table>";
	}

	function isiModalDistribusi()
	{
		$this->load->view("isiModalDistribusiPersus");
	}
}
