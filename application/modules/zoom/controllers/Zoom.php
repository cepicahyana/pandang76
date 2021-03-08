<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zoom extends MY_Controller {

	  
	function __construct()
	{
		parent::__construct();	
		$this->load->library("Zoom_api"); 
		$this->load->model('m_model','mdl');
		$this->m_konfig->validasi_session(array("user","registrasi","distributor","leader")); 
		date_default_timezone_set("Asia/Jakarta");
	}
	 function tte()
	 {
		 $email="cahyanacepi@gmail.com";
		 $subject="subject mail";
		 $isi="message";
		 $path="/data-pandang/sertifikat/12345_sertifikan_HUTRI74.pdf";
		 $data=$this->m_reff->kirimEmail($email,$subject,$isi,$path,"12345_sertifikan_HUTRI74.pdf"); 
		 $data=json_encode($data);
		 echo $data;
	 }
	/*function tes()
	{
		 
		$reg[] =array(
		"id"=>"gIl5uEhDSaiBE_5cLtvDYQ",
		"email"=>"uarmoure@gmail.com" 
		);
		
		$data	= array(
		"action"=> "cancel",
		"registrants"=>$reg
		);
			echo json_encode($data);
		 $return =$this->zoom_api->registransDelete($data,"88190918907");
		 print_r($return); 			
	}*/
	 
	function delete_peserta_zoom(){
		echo $this->mdl->delete_peserta_zoom();
	}	 
	function delete_peserta_zoom_all(){
		echo $this->mdl->delete_peserta_zoom_all();
	}
	function delete_peserta_zoom_all_online(){
		echo $this->mdl->delete_peserta_zoom_all_online();
	}
	function _template($data)
	{
	$this->load->view('temp_user/main',$data);	
	}
	 function viewKontenGiven()
	{
	$this->load->view('viewKontenGiven');	
	} 
	function save_konten_sertifikat()
	{
		$data	=	$this->mdl->save_konten_sertifikat();
		echo json_encode($data);
	}
	
	function save_konten_sertifikat_given()
	{
		$data	=	$this->mdl->save_konten_sertifikat_given();
		echo json_encode($data);
	}
	
	function save_konten_sertifikat_EN()
	{
		$data	=	$this->mdl->save_konten_sertifikat_EN();
		echo json_encode($data);
	}function save_konten_undangan_ID()
	{
		$data	=	$this->mdl->save_konten_undangan_ID();
		echo json_encode($data);
	}function save_konten_undangan_EN()
	{
		$data	=	$this->mdl->save_konten_undangan_EN();
		echo json_encode($data);
	}
	function viewKontenSertifikat()
	{
	$this->load->view('viewKontenSertifikat');	
	}function viewKontenSertifikatGiven()
	{
	$this->load->view('viewKontenSertifikatGiven');	
	}
	function viewKontenUndangan()
	{
	$this->load->view('viewKontenUndangan');	
	}
	
	  function editKontenGiven()
	{
	$this->load->view('editKontenGiven');	
	}
	  
	function editKontenSertifikat()
	{
	$this->load->view('editKontenSertifikat');	
	}  
	
	function editKontenSertifikatGiven()
	{
	$this->load->view('editKontenSertifikatGiven');	
	} 
	
	function editKontenUndanganID()
	{
	$this->load->view('editKontenUndanganID');	
	}
	function editKontenUndanganEN()
	{
	$this->load->view('editKontenUndanganEN');	
	}
	 function viewKontenOnline()
	{
	$this->load->view('viewKontenOnline');	
	} function viewKontenOnline_english()
	{
	$this->load->view('viewKontenOnline_english');	
	}
	  function editKontenOnline()
	{
	$this->load->view('editKontenOnline');	
	}
	   function editKontenOnline_english()
	{
	$this->load->view('editKontenOnline_english');	
	}
	 
	function form_filter()
	{
	$this->load->view('form_filter');	
	}
	function sinkron()
	{
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("sinkron");
		}else{
			$data['konten']="sinkron";
			$this->_template($data);
		}
	}
	function given()
	{
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("given");
		}else{
			$data['konten']="given";
			$this->_template($data);
		}
	}
	function online()
	{
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("online");
		}else{
			$data['konten']="online";
			$this->_template($data);
		}
	}function dashboard()
	{
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("dashboard");
		}else{
			$data['konten']="dashboard";
			$this->_template($data);
		}
	}
	public function index()
	{
		 
		$this->given();
	}
 
 
	 
	
	function update_peserta_zoom(){
		$cek=$this->input->post("id");
		if(!$cek){echo $this->m_reff->page403(); return false;}
		echo json_encode($this->mdl->update_peserta_zoom());
	}

	 
	
	function insertZoom(){
		  $this->load->view("insertZoom");		  
	}
	
	function goInsertZoom(){
		  $data=$this->mdl->goInsertZoom(); 
		  echo "Berhasil ditambahkan : ".$data["add"];
		  echo "<br>";
		  if($data["gagal"]){
		  echo "gagal ditambahkan : ".$data["gagal"];
		  }
	}
	
	function goInsertZoomGiven(){
		  $data=$this->mdl->goInsertZoom(true); 
		  echo "Berhasil ditambahkan : ".$data["add"];
		  echo "<br>";
		  if($data["gagal"]){
		  echo "gagal ditambahkan : ".$data["gagal"];
		  }
	}
	
	function deleteUser(){
		  $data=$this->mdl->deleteUser(); 
		  echo json_encode($data);
		//  echo $data." Berhasil dihapus ";
		 
	}
	
	function broadcast_zoom()
	{
		  $this->load->view("broadcast_zoom");
	}
	 

	  function broadcast_online()
	{
		  $this->load->view("broadcast_online");
	}
	 

	  
	
	function ajax_zoom()
	{
		$list = $this->mdl->get_zoom();
		$data = array();
			$no				= 	$this->input->post("start");
			$mulai			=	$this->input->post("mulai");  
			$sampai			=	$this->input->post("sampai");  
			
			if($mulai){
				$no =($mulai+$no);
			}else{
				$no =$no+1;
			}
		
		 
		 	if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		 
		foreach ($list as $dataDB) {
		////
			$meetingID	=	$this->m_reff->goField("zoom_event","kode","where id='".$dataDB->id_event."' ");
			$row		=	array();
			$jabatan	=	$dataDB->jabatan;	
		 	
				$row[] = ' 
			 
			  <input type="checkbox" id="md_checkbox_'.$dataDB->id.'"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="'.$dataDB->email.'::'.$dataDB->nama.'::'.$meetingID.'::'.$dataDB->registrant_id.'::'.$jabatan.'::'.$dataDB->hp.'::'.$dataDB->id.'::given" />
                                <label for="md_checkbox_'.$dataDB->id.'">&nbsp;</label>';
			 
			$row[] = "<span >".$no++."</span>";
			 
			 
			$button	=	"";
			 
			  
			 
			$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
												 	 
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit(`'.$dataDB->id.'`)">
														Edit
													</a>
												 	<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`'.$dataDB->id.'`)" >
														Hapus
													</a> 	 										
													
												</li>
											</ul>

										</div>';
		 
			 
			
			 $room			=	 $this->m_reff->goField("zoom_event","title","where id='".$dataDB->id_event."' ");
			 $nama			=	"<b>".$dataDB->nama."</b><br>".$dataDB->jabatan."<br>".$dataDB->instansi;
			 $durasi		=	"<span class='text-secondary'>durasi : ".$dataDB->durasi."</span>";
			 if($dataDB->registrant_id)
			 {
				 $sts		=	"<span class='text-primary'>Masuk</span>";
				 $room		=	br().$room.br();
			 }else{
				$sts		=	"<span class='text-danger'>Draft</span>";
				 $room		=	br();
				 $durasi	=	"";
			 }
		 
		 if($dataDB->esign)
			{
				$esign="<span class='text-primary'>Sudah dikirim</span>";
			}else{
				$esign="<i>belum</i>";
			}

			if($dataDB->join_url)
			{
				$join_url	=	br()."Link Join : <a href='".$dataDB->join_url."' target='_link'>Tersedia</a>";
			}else{
				$join_url	=	br()."Link Join : <span class='text-danger'>Belum tersedia</span>";
			}

			
			 $row[]			= 	$nama;
			 $row[]			= 	$dataDB->email.br().$dataDB->hp.$join_url; 
		     $row[]			= 	$dataDB->kota.br().$dataDB->alamat;
			 $row[]			= 	$sts.$room.$durasi; 
			 $row[]			= 	$esign; 
			 $row[]			= 	$button; 
			$data[] 		= 	$row;
		}
		
		if($mulai)
		{	$dt=($this->mdl->count_zoom()-$mulai)+1;
		}else{
			$dt=$this->mdl->count_zoom();
		}
		
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $dt,
						"recordsFiltered" =>$dt,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);
	}
	function  genSertifikatGiven(){
		$this->mdl->genSertifikatGiven("cepi cahyana","1234");
	}
	 function ajax_online()
	{
		$list = $this->mdl->get_online();
			$no				= 	$this->input->post("start");
			$mulai			=	$this->input->post("mulai");  
			$sampai			=	$this->input->post("sampai");  
			
			if($mulai){
				$no =($mulai+$no);
			}else{
				$no =$no+1;
			}
			
			
		
		$data = array();
		  
		 	if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		 
		foreach ($list as $dataDB) {
		////
			$meetingID	=	$this->m_reff->goField("zoom_event","kode","where id='".$dataDB->id_event."' ");
			$row = array();
			 
			 
			if($dataDB->id_negara==94)
			{	
				$kota		=	ucwords(strtolower($this->m_reff->namaKota($dataDB->id_kab)));
				$alamat		=	$this->m_reff->namaProvinsi($dataDB->id_prov).br().$kota." - ".$dataDB->alamat;
				$last_name	=	$kota;
				$last_name	=	str_replace("Kab. ","",$last_name);
				$last_name	=	str_replace("Kota ","",$last_name);
			}else{
				$negara		=	$this->m_reff->namaNegara($dataDB->id_negara);
				$alamat		=	$negara.br().$dataDB->alamat;
				$last_name	=	$negara;
			}
			 
			 if($dataDB->id_pekerjaan==4)
			{
			 
				 if($dataDB->id_negara==94)
				 {
					$last_name		=  "wartawan  ".$dataDB->job_media;
					$pekerjaan		=	"Wartawan <br>".$dataDB->job_media;
				 }else{
					$last_name		=	$last_name;
				 }
				
			}else if($dataDB->id_pekerjaan==5)
			{
				$pekerjaan		=	$dataDB->pekerjaan_lainnya;
			}else if($dataDB->id_pekerjaan==1)
			{
				$pekerjaan		=	str_replace("(Aparatur Sipil Negara)","",$this->m_reff->goField("tr_pekerjaan","nama","where id='".$dataDB->id_pekerjaan."' ")).br().$dataDB->instansi;
			}else{
				$pekerjaan		=	$this->m_reff->goField("tr_pekerjaan","nama","where id='".$dataDB->id_pekerjaan."' ");
			}
			 
			 
			 
			 
			 $last_name	=
				$row[] = ' 
			 
			  <input type="checkbox" id="md_checkbox_'.$dataDB->id.'"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="pilih[]"  value="'.$dataDB->email.'::'.$dataDB->nama.'::'.$meetingID.'::'.$dataDB->registrant_id.'::'.$last_name.'::'.$dataDB->hp.'::'.$dataDB->id_negara.'::'.$dataDB->id.'" />
                                <label for="md_checkbox_'.$dataDB->id.'">&nbsp;</label>';
			 
			$row[] = "<span  >".$no++."</span>";
			 
			 
			$button	=	"";
			 
			  
			 
			$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
												 <a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_detail"  onclick="detail(`'.$dataDB->id.'`)">Detail</a>	 
													<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_edit" onclick="edit(`'.$dataDB->id.'`)">
														Edit
													</a>
												 	<a class="dropdown-item" href="javascript:(0)" data-toggle="modal" data-target="#mdl_delete" onclick="getId(`'.$dataDB->id.'`)" >
														Hapus
													</a> 	 										
													
												</li>
											</ul>

										</div>';
		 
			 
			 $room			=	 $this->m_reff->goField("zoom_event","title","where id='".$dataDB->id_event."' ");
		 
			 
			 $nama			=	"<b>".$dataDB->nama."</b><br>".$dataDB->jabatan."<br>".$dataDB->instansi;
			 if($dataDB->registrant_id)
			 {
				 $sts		=	"<span class='text-primary'>Masuk</span>";
				 $room		=	br().$room;
			 }else{
				$sts		=	"<span class='text-danger'>Draft</span>";
				$room		=	"";
			 }
		 
			
			
			$durasi		=	isset($dataDB->durasi)?($dataDB->durasi):"0";
			$durasi		=	"<span class='text-secondary'>durasi join: ".$durasi."</span>";
			
			if($dataDB->esign)
			{
				$esign="<span class='text-primary'>Sudah dikirim</span>";
			}else{
				$esign="<i>belum</i>";
			}
			
			if($dataDB->join_url)
			{
				$join_url	=	br()."Link Join : <a href='".$dataDB->join_url."' target='_link'>Tersedia</a>";
			}else{
				$join_url	=	br()."Link Join :<span class='text-danger'>Belum tersedia</span>";
			}

			 $row[]			= 	$nama;
			 $row[]			= 	$dataDB->email.br().$dataDB->hp.$join_url; 
		     $row[]			= 	$alamat;
		     $row[]			= 	$pekerjaan;
		     
			 $row[]			= 	$sts.$room.br().$durasi; 
			 $row[]			= 	$esign;
			 $row[]			= 	$button; 
			$data[] 		= 	$row;
		}


		if($mulai)
		{	$dt=($this->mdl->count_online()-$mulai)+1;
		}else{
			$dt=$this->mdl->count_online();
		}
		
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $dt,
						"recordsFiltered" =>$dt,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);
	}
	 
	 
	  function ajax_dashboard()
	{
		$list = $this->mdl->get_dashboard();
		$data = array();
		 
			$no				= 	$this->input->post("start");
			$mulai			=	$this->input->post("mulai");  
			 
			if($mulai){
				$no =($mulai+$no);
			}else{
				$no =$no+1;
			}
			
			
		$no =$no+1;
		 
		 	if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		 
		foreach ($list as $val) {
		////
			 
			$row = array();
			 
		  
			 $jml			=	$this->mdl->jmlNegara($val->id);
			 $row[]			= 	$no++;
			 $row[]			= 	$val->country_name;
			 $row[]			= 	$jml; 
		   
			$data[] 		= 	$row;
		}

		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $dt=$this->mdl->count_dahboard(),
						"recordsFiltered" =>$dt,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);
	}
	 
	 
	 
	function dataProvinsi()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	 
			$this->db->like("nama",$s); 
		}
		
			$this->db->order_by("nama","asc");
			$query=$this->db->get("wil_provinsi")->result();
		 
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->id_prov,"text"=>$v->nama];
			}
		 
	echo	  json_encode($query_data);
	}
	function form_kab()
	{
		$prov	=	$this->input->get_post("val");
		$this->db->where("id_prov",$prov);
		$this->db->order_by("nama","asc");
		$data=$this->db->get("wil_kabupaten")->result();
		$db[""]="---- semua kab/kota ----";
		foreach($data as $data)
		{
			$db[$data->id_kab]=$data->nama;
		}
		echo form_dropdown("fkab",$db,"","id='fkab' class='form-control' ");
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
	function setStatus()
	{
	echo $this->mdl->setStatus();
	}
	 
	 
	function hapus_cek()
	{
	    echo $this->mdl->hapus_cek();
	}
	function broadcast()
	{
	    $this->load->view("broadcast");
	}function broadcast_persus()
	{
	    $this->load->view("broadcast_persus");
	}
	function setBroadcast()
	{
	$echo=$this->mdl->setBroadcast();
	//echo json_encode($echo);
	echo "<table class='entry'><tr>
	<td>Notifikasi Terkirim</td><td>".$echo["ok"]."</td>
	</tr><tr>
	<td valign='top'>Gagal Terkirim</td><td>".$echo["gagal"]."<br>".$echo["dgagal"]."</td>
	</tr></table>";
	}
	function editKontenSertifikatID()
	{
		 $this->load->view("editKontenSertifikatID");
	}function editKontenSertifikatEN()
	{
		 $this->load->view("editKontenSertifikatEN");
	}
	function kirim_sertifikat()
	{
	$echo=$this->mdl->kirim_sertifikat();
	//echo json_encode($echo);
	echo "<table class='entry'><tr>
	<td>  Terkirim</td><td>".$echo["ok"]."</td>
	</tr><tr>
	<td valign='top'>Gagal Terkirim</td><td>".$echo["gagal"]."<br>".$echo["dgagal"]."</td>
	</tr></table>";
	}
	function kirim_sertifikat_given()
	{
	$echo=$this->mdl->kirim_sertifikat_given();
	//echo json_encode($echo);
	echo "<table class='entry'><tr>
	<td>  Terkirim</td><td>".$echo["ok"]."</td>
	</tr><tr>
	<td valign='top'>Gagal Terkirim</td><td>".$echo["gagal"]."<br>".$echo["dgagal"]."</td>
	</tr></table>";
	}
	
	function kirim_undangan()
	{
	$echo=$this->mdl->kirim_undangan();

	//echo json_encode($echo);
	echo "<table class='entry'><tr>
	<td>  Terkirim</td><td>".$echo["ok"]."</td>
	</tr><tr>
	<td valign='top'>Gagal Terkirim</td><td>".$echo["gagal"]."<br>".$echo["dgagal"]."</td>
	</tr></table>";
	}
	 function setBroadcastOnline()
	{
	$echo=$this->mdl->setBroadcastOnline();
	//echo json_encode($echo);
	echo "<table class='entry'><tr>
	<td>Notifikasi Terkirim</td><td>".$echo["ok"]."</td>
	</tr><tr>
	<td valign='top'>Gagal Terkirim</td><td>".$echo["gagal"]."<br>".$echo["dgagal"]."</td>
	</tr></table>";
	}
	 
	  
	function download_zoom()
	{
		echo $this->mdl->download_zoom();
	}	
  
	function download_online()
	{
		echo $this->mdl->download_online();
	}	

	function data_event()
	{
		echo $this->load->view("data_event");
	}
	
	function zoomDataAjax()
	{
		echo $this->load->view("zoomDataAjax");
	}
	function sertifikat()
	{
		echo $this->load->view("sertifikat");
	}function sertifikat_given()
	{
		echo $this->load->view("sertifikat_given");
	}	function eundangan()
	{
		echo $this->load->view("eundangan");
	}
	function import_file()
	{
		echo $this->load->view("import_file");
	}function import_file_online()
	{
		echo $this->load->view("import_file_online");
	}function edit_peserta()
	{
		echo $this->load->view("edit_peserta");
	}function add_peserta()
	{
		echo $this->load->view("add_peserta");
	}function add_peserta_online()
	{
		echo $this->load->view("add_peserta_online");
	}function edit_peserta_online()
	{
		echo $this->load->view("edit_peserta_online");
	}
	function insert_event()
	{
		$echo	=	$this->mdl->insert_event();
		echo json_encode($echo);
	}
	function insert_peserta_zoom_given()
	{
		$echo	=	$this->mdl->insert_peserta_zoom_given();
		echo json_encode($echo);
	}function insert_peserta_zoom_online()
	{
		$echo	=	$this->mdl->insert_peserta_zoom_online();
		echo json_encode($echo);
	}function delete_event()
	{
		$echo	=	$this->mdl->delete_event();
		echo json_encode($echo);
	}
	function save_konten()
	{
		$echo	=	$this->mdl->save_konten();
		echo json_encode($echo);
	}
	
	function import_zoom()
	{
		$var=array();
	 
		  
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->import_zoom("file");
				$sama=$echo['data'];
				$var['info']="Berhasil ditambahkan : ".$echo['insert']." 
				<br>Data yang sama : ".$echo['edit'].br().$sama; 
				echo json_encode($var);
			 
		}else{
			$var["gagal"]="true";
			$var["info"]="SIlahkan coba lagi dengan file yang berbeda.";
				echo json_encode($var);
		}
		
	}function import_zoom_online()
	{
		$var=array();
	 
		  
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->import_zoom_online("file");
				$sama=$echo['data'];
				$var['info']="Berhasil ditambahkan : ".$echo['insert']." 
				<br>Data yang sama : ".$echo['edit'].br().$sama; 
				echo json_encode($var);
			 
		}else{
			$var["gagal"]="true";
			$var["info"]="SIlahkan coba lagi dengan file yang berbeda.";
				echo json_encode($var);
		}
		
	}function import_durasi()
	{
		$var=array();
	 
		  
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->import_durasi("file");
				
				$var['info']="Berhasil diupdate : ".$echo['insert']; 
				echo json_encode($var);
			 
		}else{
			$var["gagal"]="true";
			$var["info"]="Silahkan coba lagi dengan file yang berbeda.";
				echo json_encode($var);
		}
		
	}
	function detail()
	{
		echo $this->load->view("getDetailOnline");
	}
	
}

