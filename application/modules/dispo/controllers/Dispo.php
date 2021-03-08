<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dispo extends MY_Controller {

	  
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_model','mdl');
		$this->m_konfig->validasi_session(array("user","verifikator"));
		
		date_default_timezone_set("Asia/Jakarta");
	}
	 
	
	function _template($data)
	{
		$level=$this->session->userdata("level");
		if($level=="user"){
			$this->load->view('temp_user/main',$data);	
		}else{
			$this->load->view('temp_verifikator/main',$data);	
		}
	}
	 	
	function form_filter()
	{
	$this->load->view('form_filter');	
	}
	 
	public function index()
	{
		 
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("index");
		}else{
			$data['konten']="index";
			$this->_template($data);
		}
		 
	}
	public function persus()
	{
		 
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("persus");
		}else{
			$data['konten']="persus";
			$this->_template($data);
		}
		 
	}	public function lainnya()
	{
		 
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("lainnya");
		}else{
			$data['konten']="lainnya";
			$this->_template($data);
		}
		 
	}	 
	function online()
	{
		$this->index();
	}
	
	
	function ajax_peserta()
	{
		$list = $this->mdl->get_peserta();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		 
		 
		 
		foreach ($list as $dataDB) {
		////
		 
			$row = array();
			 
			
			$row[] = "<span class='size'>".$no++."</span>";
			 
			 
			$button	=	"";
			 
			if($dataDB->nama)
			{
				$natam=$dataDB->nama;
			}else{
				$natam="---";
			}
			if($dataDB->instansi)
			{
				$instansi=$dataDB->instansi;
			}else{
				$instansi="---";
			}
			
			$dispo="  Belum";
			if($dataDB->jenis_acara==1){
			$acara="<span class='text-black'>Pagi</span>";
				if($dataDB->blok1){
					$dispo="  <span class='text-primary fa'>Terverifikasi</span>";
				}
			}elseif($dataDB->jenis_acara==2){
				$acara="<span class='text-black'>Sore</span>";
				if($dataDB->blok2){
					$dispo="  <span class='text-primary fa'>Terverifikasi</span>";
				}
			}elseif($dataDB->jenis_acara==3){
				 $acara="<span class='text-black'>Pagi & Sore</span>";	 
				 $dispo="  <span class='text-primary fa'>Terverifikasi</span>"; 
			}else{ $acara="-";	
					if($dataDB->sts_acc==2 && $dataDB->sts_suci==1)
					{
						 $dispo="  <span class='text-primary fa'>Terverifikasi</span>"; 
					}elseif($dataDB->sts_suci==2)
					{
						 $dispo="Ditolak"; 
					}
			}
			
			if($dataDB->jadwal_distribusi)
			{
				$jadwal		=	$this->tanggal->hariLengkap($dataDB->jadwal_distribusi,"/");
				$disbutton	=	"";
			}else{
				$jadwal	=	"-";
				$disbutton	=	"disabled";
			}
			
			if($dataDB->diterima_oleh)
			{
				$nama_pengambil	=	"<span class='text-success'>oleh: ".$dataDB->diterima_oleh."</span>";
				$pengambilan	=	$this->tanggal->eng3($dataDB->diterima_tgl,"/");
				$href			=	"";
			
			}else{
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
				 
			}
			
			 if($dataDB->sts_verifikasi==1)
			{	$class="bg-orange";
				$sts="Sedang diproses";
			}else
			{	$class="btn-primary";
				$sts="Verifikasi";
			}
			 
				$button			=	'  	<button onclick="verifikasi(`'.$dataDB->id.'`)" aria-expanded="false" class="btn-block btn btn-sm '.$class.'  " type="button" >
												<b>'.$sts.'</b>
											</button>
										 ';
			 
			if($dataDB->r_suci==1)
			{
				$suci="<br>R. Suci";
			}else{
				$suci="";
			}
			
			$nama			=	$dataDB->nama.br().$dataDB->nik;
			$kab			=	$this->m_reff->goField("wil_kabupaten","nama","where id_kab='".$dataDB->id_kota."' ");
			$prov			=	$this->m_reff->goField("wil_provinsi","nama","where id_prov='".$dataDB->id_provinsi."' ");
			$row[]			= 	$nama;
			$row[]			= 	$acara.$suci;
			$row[]			= 	$dataDB->hp.br().$dataDB->email;
			 $row[]			= 	strtolower($kab)." <br>".$prov;
			 
			 $row[]			= 	$button;
		 
		 
			$data[] 		= 	$row;
		}

		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $this->mdl->count_file_peserta("data_peserta"),
						"recordsFiltered" =>$this->mdl->count_file_peserta('data_peserta'),
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
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		 
		 
		 
		foreach ($list as $dataDB) {
		////
		 
			$row = array();
			 
			
			$row[] = "<span class='size'>".$no++."</span>";
			 
			 
			$button	=	"";
			 
			if($dataDB->nama)
			{
				$natam=$dataDB->nama;
			}else{
				$natam="---";
			}
			
					
			
			 if($dataDB->sts_dispo==1)
			{	 
			 $dispo="<span class='text-success fas fa-check-double' ></span> <span class='text-success' onclick='getDispo(`".$dataDB->id."`)'>Sudah</span>";
			}elseif($dataDB->sts_dispo==2){
			$dispo="<button class='btn btn-sm btn-danger btn-block cursor' onclick='getDispo(`".$dataDB->id."`)'>Belum</button>";
			}elseif($dataDB->sts_dispo==3){
			$dispo="<button class='btn btn-sm cursor btn-warning btn-block' onclick='getDispo(`".$dataDB->id."`)'>Draft</button>";
			}				
			 
			
			 
				$jadwal	=	"-";
				$disbutton	=	"disabled";
			 
			if($dataDB->diterima_oleh)
			{
				$nama_pengambil	=	"<span class='text-success'>oleh: ".$dataDB->diterima_oleh."</span>";
				$pengambilan	=	$this->tanggal->eng3($dataDB->diterima_tgl,"/");
				$href			=	"";
			
			}else{
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
				 
			}
			
			
			if($dataDB->diterima_oleh  )
			{
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item"  data-toggle="modal" data-target="#mdl_detail" href="javascript:(0)" onclick="detail_peserta_persus(`'.$dataDB->id.'`)">Detail</a>
													<a class="dropdown-item"   data-toggle="modal" data-target="#mdl_edit" href="javascript:(0)" onclick="edit_peserta_persus(`'.$dataDB->id.'`)">Edit</a> 
												</li>
											</ul>

										</div>';
			}elseif(  !$dataDB->diterima_oleh){
			$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item"   data-toggle="modal" href="javascript:(0)" data-target="#mdl_detail" onclick="detail_peserta_persus(`'.$dataDB->id.'`)">Detail</a>
													<a class="dropdown-item"   data-toggle="modal" href="javascript:(0)" data-target="#mdl_edit" onclick="edit_peserta_persus(`'.$dataDB->id.'`)">Edit</a>
													<!--<a class="dropdown-item"   data-toggle="modal" href="javascript:(0)" data-target="#mdl_delete" onclick="getId(`'.$dataDB->id.'`)">Hapus</a>
													-->
													
												</li>
											</ul>

										</div>';
			}else 
			{
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item"   data-toggle="modal"  href="javascript:(0)" data-target="#mdl_detail" onclick="detail_peserta_persus(`'.$dataDB->id.'`)">Detail</a>
													<a class="dropdown-item"  data-toggle="modal"  href="javascript:(0)" data-target="#mdl_edit" onclick="edit_peserta_persus(`'.$dataDB->id.'`)">Edit</a>
													<a class="dropdown-item"  data-toggle="modal"  href="javascript:(0)" data-target="#mdl_delete" onclick="getId(`'.$dataDB->id.'`)">Hapus</a> 
													
												</li>
											</ul>

										</div>';
			}
			if($dataDB->jenis_permohonan==2)
			{
				$jenis_permohonan="Persus";
			}else{
				$jenis_permohonan="Given";
			}
			
			$nama			=	$dataDB->nama;
			 $row[]			= 	$nama;
			 $row[]			= 	$dataDB->instansi;
			 $row[]			= 	$dataDB->jml_pagi;
			 $row[]			= 	$dataDB->jml_sore;
			 $row[]			= 	$dispo;
			 
			// $row[]			= 	$nama_pengambil.br().$pengambilan;
			 $row[]			= 	$jenis_permohonan;
			 $row[]			= 	$button;
		 
		 
			$data[] 		= 	$row;
		}

		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $this->mdl->count_file_persus("data_peserta"),
						"recordsFiltered" =>$this->mdl->count_file_persus('data_peserta'),
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
		if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		 
		 
		 
		foreach ($list as $dataDB) {
		////
		 
			$row = array();
			 
			
			$row[] = "<span class='size'>".$no++."</span>";
			 
			 
			$button	=	"";
			 
			if($dataDB->nama)
			{
				$natam=$dataDB->nama;
			}else{
				$natam="---";
			}
			
					
			
			 if($dataDB->sts_dispo==1)
			{	 
			 $dispo="<span class='text-success fas fa-check-double' ></span> <span class='text-success' onclick='getDispo(`".$dataDB->id."`)'>Sudah</span>";
			}elseif($dataDB->sts_dispo==2){
			$dispo="<button class='cursor' onclick='getDispo(`".$dataDB->id."`)'>Belum</button>";
			}elseif($dataDB->sts_dispo==3){
			$dispo="<button class='cursor bg-orange' onclick='getDispo(`".$dataDB->id."`)'>Draft</button>";
			}				
			 
			
			 
				$jadwal	=	"-";
				$disbutton	=	"disabled";
			 
			if($dataDB->diterima_oleh)
			{
				$nama_pengambil	=	"<span class='text-success'>oleh: ".$dataDB->diterima_oleh."</span>";
				$pengambilan	=	$this->tanggal->eng3($dataDB->diterima_tgl,"/");
				$href			=	"";
			
			}else{
				$pengambilan	=	"-";
				$nama_pengambil	=	"";
				$href			=	"";
				 
			}
			
			
			if($dataDB->diterima_oleh  )
			{
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item"  data-toggle="modal" data-target="#mdl_detail" href="javascript:(0)" onclick="detail_peserta_persus(`'.$dataDB->id.'`)">Detail</a>
													<a class="dropdown-item"   data-toggle="modal" data-target="#mdl_edit" href="javascript:(0)" onclick="edit_peserta_persus(`'.$dataDB->id.'`)">Edit</a> 
												</li>
											</ul>

										</div>';
			}elseif(  !$dataDB->diterima_oleh){
			$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item"   data-toggle="modal" href="javascript:(0)" data-target="#mdl_detail" onclick="detail_peserta_persus(`'.$dataDB->id.'`)">Detail</a>
													<a class="dropdown-item"   data-toggle="modal" href="javascript:(0)" data-target="#mdl_edit" onclick="edit_peserta_persus(`'.$dataDB->id.'`)">Edit</a>
													<!--<a class="dropdown-item"   data-toggle="modal" href="javascript:(0)" data-target="#mdl_delete" onclick="getId(`'.$dataDB->id.'`)">Hapus</a>
													-->
													
												</li>
											</ul>

										</div>';
			}else 
			{
				$button			=	'<div class=" ">
											<button aria-expanded="false" class="btn-block btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
												<b>Action</b>
											</button>
											<ul style="position: absolute; transform: translate3d(0px, 43px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" class="dropdown-menu" role="menu">
												<li>
												  
													<a class="dropdown-item"   data-toggle="modal"  href="javascript:(0)" data-target="#mdl_detail" onclick="detail_peserta_persus(`'.$dataDB->id.'`)">Detail</a>
													<a class="dropdown-item"  data-toggle="modal"  href="javascript:(0)" data-target="#mdl_edit" onclick="edit_peserta_persus(`'.$dataDB->id.'`)">Edit</a>
													<a class="dropdown-item"  data-toggle="modal"  href="javascript:(0)" data-target="#mdl_delete" onclick="getId(`'.$dataDB->id.'`)">Hapus</a> 
													
												</li>
											</ul>

										</div>';
			}
			$jenis_permohonan=$this->m_reff->goField("tr_kategory","nama","where id='".$dataDB->jenis_permohonan."' ");
			
			$nama			=	$dataDB->nama;
			 $row[]			= 	$nama;
			 $row[]			= 	$dataDB->instansi;
			 $row[]			= 	$dataDB->jml; 
			 $row[]			= 	$dispo;
			 
			// $row[]			= 	$nama_pengambil.br().$pengambilan;
			 $row[]			= 	$jenis_permohonan;
			 $row[]			= 	$button;
		 
		 
			$data[] 		= 	$row;
		}

		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $this->mdl->count_file_lainnya(),
						"recordsFiltered" =>$this->mdl->count_file_lainnya(),
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
		$db[null]="---- semua kab/kota ----";
		foreach($data as $data)
		{
			$db[$data->id_kab]=$data->nama;
		}
		echo form_dropdown("fkab",$db,"","id='fkab' class='form-control' onchange='reload_table()' ");
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
	function verifikasi()
	{
		$this->load->view("verifikasi");
	}
	function getVerifikasi()
	{
		$this->load->view("getVerifikasi");
	}
	function getNextVerifikasi()
	{
		$this->load->view("getVerifikasi");
	}function setAcc()
	{
		$id	=	$this->input->post("id"); 
		$sts	=	$this->input->post("sts"); 
		echo $this->mdl->setStsAcc($id,$sts);
	}function setAccSuci()
	{
		$id	=	$this->input->post("id"); 
		$sts	=	$this->input->post("sts"); 
		echo $this->mdl->setStsAccSuci($id,$sts);
	}function setTolak()
	{
		$id	=	$this->input->post("id"); 
		$alasan	=	$this->input->post("alasan"); 
		$suci	=	$this->input->post("suci"); 
		$echo	=	$this->mdl->setTolak($id,$alasan,$suci);
		echo json_encode($echo);
	}function setTolakSuci()
	{
		$id	=	$this->input->post("id"); 
		$alasan	=	$this->input->post("alasan"); 
		$suci	=	$this->input->post("suci"); 
		$echo	=	$this->mdl->setTolakSuci($id,$alasan,$suci);
		echo json_encode($echo);
	}
	
	function setBlokPersus()
	{
		$data	= $this->mdl->setBlokPersus();
		echo json_encode($data);
	}function closeVerifikasi()
	{	//$id	= 	$this->input->post("id");
		//$sts	=	$this->input->post("sts");
		//$data	= 	$this->mdl->setStsVerifikasi($id,$sts);
		 $data  =	$this->mdl->clearVerification();
		echo json_encode($data);
	}
	function setStatus()
	{
	echo $this->mdl->setStatus();
	}
	 
}

