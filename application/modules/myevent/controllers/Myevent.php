<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myevent extends MY_Controller {

	
	var $idevent=13;
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_myevent','event');
		$this->load->model('m_umum','umum');
		$this->m_konfig->validasi_session(array("user"));
		
		date_default_timezone_set("Asia/Jakarta");
	}
	 function updateTarget()
	 {
		 $updateTarget=$this->event->updateTarget();
		 echo json_encode($updateTarget);
	 }
	 function alokasi()
	{
	    	$this->load->view('alokasi');
	}function getDetail()
	{
		
		if(!$this->input->post("id"))
		{
			echo $this->m_reff->page403(); return false;
		}elseif($this->input->post("id")==4)
		{
			$this->load->view('getDetailSuci');
		}else{
	    	$this->load->view('getDetail');
		}
	}
	function jadwal_distribusi()
	{
	    	$this->load->view('jadwal_distribusi');
	}
	public function kodevoucher($id)
	{
	echo $this->event->kodevoucher($id);
	}
	
	function _template($data)
	{
	$this->load->view('temp_user/main',$data);	
	}
	function CheckClass()
	{
	$this->load->view("DataCekInClass");
	}
	function CheckSv()
	{
	$this->load->view("DataCekInSv");
	}
	function CheckPb()
	{
	$this->load->view("DataCekInPb");
	}
	function CheckMakan()
	{
	$this->load->view("DataCekInMakan");
	}function CheckRegister()
	{
	echo $this->load->view("DataCekIn");
	}
	function saveRegister()
	{
		$id=$this->idevent;
	echo $this->event->saveRegister($id);
	}
	function editRegister()
	{
	$id=$this->input->post("idPeserta");
	$idEvent=$this->input->post("idEvent");
	$urut=$this->input->post("urut");
	echo $this->event->editRegister($id,$idEvent,$urut);
	}
	function addPeserta()
	{
	$data["id"]=$this->idevent;
	$this->load->view("modalAdd",$data);
	}
	public function index()
	{
		 	 
					$mode	=	$this->m_reff->tm_pengaturan(39);
					if($mode==2){			
						redirect("monitoring_souvenir");
					} 
			
			 
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("dashboard");
		}else{
			$data['konten']="dashboard";
			$this->_template($data);
		}
		 
	}
	function setValidasi($barcode)
	{
		$cek=$this->db->query("select * from data_peserta where (ip='".$barcode."' or ip2='".$barcode."') ")->num_rows();
		if($cek){	echo "false"; return false;}
		//$isi=$this->_getDataPeserta2($id);
			$data=array(
			//"id_admin"=>$this->session->userdata("id"),
			"data"=>"--- __v||v__ --- __v||v__ --- __v||v__ ",
			"id_event"=>13,
			"tgl"=>date('Y-m-d')." ".date('H:i:s'),
			"ip"=>$barcode,
			"kode_registrasi"=>$barcode,
			"status"=>"1",
			"cekin"=>null,
			"konsep"=>1,
			);
	  $this->db->insert("data_peserta",$data);
	  echo "true";
	  return true;
	}
	
	public function validasi()
	{
		 
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("validasi");
		}else{
			$data['konten']="validasi";
			$this->_template($data);
		}
		 
	}
	public function sinkronisasi()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("sinkronisasi");
		}else{
			$data['konten']="sinkronisasi";
			$this->_template($data);
		}
	}
	public function in()
	{
		$id=$this->idevent;
	$data['dataEvent']=$id;
	$this->load->view('checkin',$data);	
	}	
	public function makan($id)
	{
	$data['dataEvent']=$id;
	$this->load->view('makan',$data);	
	}
	public function rekap($id=11)
	{
	$data['dataEvent']=$id;
	$this->load->view('rekap',$data);	
	}
	function izinkanSv($id)
	{
		$id=$this->input->post("ID");
	echo	$this->event->updateStatusSvPeserta($id);
	}
	function izinkanMakan($id)
	{
		$id=$this->input->post("ID");
	echo	$this->event->updateStatusMakanPeserta($id);
	}
	function izinkanPb($id)
	{
		$id=$this->input->post("ID");
	echo	$this->event->updateStatusPbPeserta($id);
	}
	public function sv($id)
	{
	$data['dataEvent']=$id;
	$this->load->view('sv',$data);	
	}
	public function pb($id)
	{
	$data['dataEvent']=$id;
	$this->load->view('pb',$data);	
	}
	public function kelas($id)
	{
	$data['dataEvent']=$id;
	$this->load->view('kelas',$data);	
	}
	
	public function create()
	{

	$data['dataForm']=$this->event->dataForm();
	$data['konten']="create";
	$this->_template($data);
	}
	
	public function edit($id)
	{

	$data['dataForm']=$this->event->dataForm();
	$data['E']=$this->event->dataEventID($id);
	$data['konten']="edit";
	$this->_template($data);
	}
	
	public function kalender()
	{

	$data['konten']="kalender";
	$this->_template($data);
	}
	function process()
	{
	/////////////
//	date_default_timezone_set("Asia/Jakarta");
	$type = $_POST['type'];

	if($type == 'new')
	{
		$startdate = $_POST['startdate'].'+'.$_POST['zone'];
		$title = $_POST['title'];
		$insert ="INSERT INTO data_event(`title`, `startdate`, `enddate`, `allDay`) VALUES('$title','$startdate','$startdate','false')";
		$lastid = $this->db->query($insert);
		echo json_encode(array('status'=>'success','eventid'=>$lastid));
	}

	if($type == 'changetitle')
	{
		$eventid = $_POST['eventid'];
		$title = $_POST['title'];
		$update = $this->db->query("UPDATE data_event SET title='$title' where id_event='$eventid'");
		if($update)
			echo json_encode(array('status'=>'success'));
		else
			echo json_encode(array('status'=>'failed'));
	}

	if($type == 'resetdates')
	{
		$title = $_POST['title'];
		$startdate = $_POST['start'];
		$enddate = $_POST['end'];
		$eventid = $_POST['eventid'];
		$update = $this->db->query("UPDATE data_event SET title='$title', startdate = '$startdate', enddate = '$enddate' where id_event='$eventid'");
		if($update)
			echo json_encode(array('status'=>'success'));
		else
			echo json_encode(array('status'=>'failed'));
	}

	if($type == 'remove')
	{
		$eventid = $_POST['eventid'];
		$delete = $this->db->query("DELETE FROM data_event where id_event='$eventid'");
		if($delete)
			echo json_encode(array('status'=>'success'));
		else
			echo json_encode(array('status'=>'failed'));
	}

	if($type == 'fetch')
	{
		$events = array();
		$fetch = $this->db->query("SELECT * FROM data_event where id_admin='".$this->session->userdata('id')."'")->result();
		foreach($fetch as $fetch)
		{
		$e = array();
		$e['id'] = $fetch->id_event;
		$e['title'] = $fetch->title;
		$e['start'] = $fetch->startdate;
		$e['end'] = $fetch->enddate;

		$allday = ($fetch->allDay == "true") ? true : false;
		$e['allDay'] = $allday;

		array_push($events, $e);
		}
		echo json_encode($events);
	}

/////////
	}
	
	//--------------------------->
	function ajax_open()
	{
		$this->load->library("konversi");
		$list = $this->event->get_open();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		$n=1;
		
		foreach ($list as $dataDB) {
		////
		$terdaftar=$this->event->jmlPeserta($dataDB->id_event,"1");
		$dihadiri=$this->event->jmlPeserta($dataDB->id_event,"2");
		
		$batas=substr($dataDB->batas_registrasi,0,10);
		$jamBatas=substr($dataDB->batas_registrasi,11,5);
		
		if($n==1){
		$warna="emerald-bg";
		}elseif($n==2){
		$warna="red-bg";
		}elseif($n==3){
		$warna="blue-bg";
		}elseif($n==4){
		$warna="purple-bg";
		}else{
		$warna="gray-bg";
		}
		if($n==7){ $n=1; };
		$n++;
		if($dataDB->acc==1){ $acc="Ya"; }else{ $acc="Tidak"; }
		if($dataDB->sistem_tiket==1){ $tiket="Ya"; }else{ $tiket="Tidak"; }
			$row = array();
			if($dataDB->acc==1){ $v="Ya"; }else{ $v="Tidak";}
			
			$row[]='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="btn-group pull-left" style="padding:10px;position:absolute;right:0px">
				
				<a class="fa fa-edit" style="padding:10px;cursor:pointer" href="'.base_url().'myevent/edit/'.$dataDB->id_event.'"> Edit</a> | 
				<a class="fa fa-trash" style="padding:10px;cursor:pointer" onclick="deleted('.$dataDB->id_event.')"> Hapus</a>
			</div>
			<div class="btn-group pull-right" style="padding:10px;position:absolute">
			<a onclick="widget('.$dataDB->link.''.$dataDB->id_admin.')" class="btn btn-default btn-xs btn-purple">WIDGET</a>
		<a target="_blank" href="'.base_url().'on/line/'.$dataDB->link."".$dataDB->id_admin.'" class="btn btn-default btn-xs btn-purple">LINK PENDAFTARAN</a>
	<a href="'.base_url().'myevent/register/'.$dataDB->id_event.'" class="btn btn-default btn-xs btn-default">DATA PESERTA</a>
				
				
				<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="max-height:32px">
CEKIN <span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu">
<li><a target="_blank" href="'.base_url().'myevent/in/'.$dataDB->id_event.'"  >REGISTRASI</a></li>
 <li  ><a href="javascript:cekinclass('.$dataDB->id_event.')" >ROOM</a></li>
<li><a target="_blank" href="'.base_url().'myevent/makan/'.$dataDB->id_event.'" >MAKAN</a></li>
<li  ><a target="_blank" href="'.base_url().'myevent/sv/'.$dataDB->id_event.'"  >SOUVENIR</a></li>
<li  ><a target="_blank" href="'.base_url().'myevent/pb/'.$dataDB->id_event.'"  >PHOTOBOTH</a></li> 
 
</ul>
</div>
				
				
		
			
			
			</div>
					<div class="main-box weather-box">
					<div class="main-box-body clearfix">
					<div class="main-box weather-box-large" style="margin-bottom:0">
					<div class="main-box-body main-box-no-header clearfix">
					
					<div class="current" style="min-height:205px">
					<h5 style="margin-top:25px;font-size:25px"><b>'.strtoupper($dataDB->title).'</b></h5>
										
					
					<div class="size">
					<i class="fa fa-calendar"></i>	<small>Batas registrasi '.$this->tanggal->hariLengkap($batas,"/").' '.$jamBatas.' WIB</small>
					</div>
					<div class="temp-out-wrapper clearfix">
					<p class="sadow editable editable-pre-wrapped editable-click" data-type="textarea" data-pk="1" data-original-title="" data-title="Enter comments" id="comments">'.$dataDB->ket.'</p>
									
					</div>
					</div>
					</div>
					</div>
					<div class="next">
					<ul class="clearfix">
					<li>
					<div class="day">
					QUOTA
					</div>
					<div class="icon" title="Hot" data-toggle="tooltip">
					<i class="wi wi-hot"></i>
					</div>
					<div class="temperature">
					'.$dataDB->quota.'<span class="sign"></span>
					</div>
					</li>
					<li>
					<div class="day">
					FORM
					</div>
					<div class="icon" title="Showers" data-toggle="tooltip">
					<i class="wi wi-day-showers"></i>
					</div>
					<div class="temperature" onclick="tampilForm(`'.$dataDB->id_event.'`,`'.$this->event->namaForm($dataDB->id_event).'`)">
					'.$this->event->namaForm($dataDB->id_form).'<span class="sign"></span>
					</div>
					</li>
					<li>
					<div class="day">
					Verifikasi Peserta
					</div>
					<div class="icon" title="Cloudy" data-toggle="tooltip">
					<i class="wi wi-cloudy-windy"></i>
					</div>
					<div class="temperature">
					'.$v.'<span class="sign"></span>
					</div>
					</li>
					<li>
					
					<div class="day">
					SISTEM TIKET
					</div>
					<div class="icon" title="Thunderstom" data-toggle="tooltip">
					<i class="wi wi-thunderstorm"></i>
					</div>
					<div class="temperature">
					'.$tiket.'<span class="sign"></span>
					</div>
					</li>
					<li>
					<div class="day">
					Dihadiri
					</div>
					<div class="icon" title="Lightning" data-toggle="tooltip">
					<i class="wi wi-night-alt-lightning"></i>
					</div>
					<div class="temperature">
					'.$dihadiri.'<span class="sign"></span>
					</div>
					</li>
					</ul>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>';
					
			//add html for action
			$rowx= '
			
			<a class="table-link" href="javascript:void()" title="Lihat" onclick="tampil(`'.$dataDB->id_event.'`,`'.$dataDB->id_event.'`)">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-eye fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_event.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_event.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->event->count_file("data_event"),
						"recordsFiltered" =>$this->event->count_filtered('data_event'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	function delete($id)
	{
	echo $this->event->delete($id);
	}
	function save()
	{
	$data=$this->event->save();
	echo json_encode($data);
	}
	function getBarcode($id)
	{
	$data['id']=$id;
	$this->load->view("getBarcode",$data);
	}
	function saveChange($id)
	{
	echo $this->event->saveChange($id);
	}
	function loadinvoice($ket)
	{
	$data['ket']=$ket;
	$this->load->view("invoice",$data);
	}
	
	function editPeserta()
	{
	$data["idEvent"]=$this->idevent;
	$data["urut"]=$this->input->post("urut");
	$data["idPeserta"]=$this->input->post("idPeserta");
	$this->load->view("formEdit",$data);
	}
	function loadNewinvoice()
	{
	$this->load->view("Newinvoice");
	}
	
	function sessiondate($id)
	{
	  $this->session->set_userdata("dates",$id);
	  echo $this->session->userdata("dates");
	}
	
	function barcode($id=13)
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	$data['id']=$id;
			echo	$this->load->view("barcode",$data);
		}else{
			$data['id']=$id;
			$data['konten']="barcode";
			$this->_template($data);
		}
	
	}function register($id=13)
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	$data['id']=$id;
			echo	$this->load->view("peserta",$data);
		}else{
			$data['id']=$id;
			$data['konten']="peserta";
			$this->_template($data);
		}
	
	}
	function saveket()
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$this->input->post("idPeserta"));
	echo $this->db->update("data_peserta",array("ket"=>$this->input->post("ket")));
	}	
	function savePb()
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$this->input->post("idPeserta"));
	echo $this->db->update("data_peserta",array("pb"=>$this->input->post("pb")));
	}
	function saveSv()
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$this->input->post("idPeserta"));
	echo $this->db->update("data_peserta",array("sv"=>$this->input->post("sv")));
	}
	function saveMakan()
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$this->input->post("idPeserta"));
	echo $this->db->update("data_peserta",array("makan"=>$this->input->post("makan")));
	}
	function saveblokan()
	{
//	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$this->input->post("idPeserta"));
	echo $this->db->update("data_peserta",array("blok"=>$this->input->post("blok")));
	}
	
	function saveberlaku()
	{
	$this->db->where("id_peserta",$this->input->post("idPeserta"));
	echo $this->db->update("data_peserta",array("berlaku"=>$this->input->post("berlaku")));
	}
	
	function savepic()
	{
//	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$this->input->post("idPeserta"));
	echo $this->db->update("data_peserta",array("pic"=>$this->input->post("pic")));
	}
	
	function getKet($id)
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$id);
	$data=$this->db->get("data_peserta")->row();
	$dt=$id."::".$data->ket;
	echo $dt;
	}
	
	function getPb($id)
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$id);
	$data=$this->db->get("data_peserta")->row();
	$tbl="<table class='tabel table-bordered table-hover table-striped'>";
	$dt=explode(",",$data->pb);$no=1;
	foreach($dt as $va)
	{
		if($va){
			$tbl.="<tr><td>".$no."</td><td>".$this->tanggal->hariLengkap(substr($va,0,10),"/")." ".substr($va,11,10)."</td></tr>";	$no++;
		}
	}
	$tbl.="</table>";
	$dt=$id."::".$data->pb."::".$tbl;
	echo $dt;
	}
	
	function getBlok($id)
	{
		//$this->db->where("id_admin",$this->session->userdata("id"));
		$this->db->where("id_peserta",$id);
		$data=$this->db->get("data_peserta")->row();
		$dt["id"]=$id;
		$dt["blok"]=$data->blok;
		echo json_encode($dt);
	}
	
	function getberlaku($id)
	{
		//$this->db->where("id_admin",$this->session->userdata("id"));
		$this->db->where("id_peserta",$id);
		$data=$this->db->get("data_peserta")->row();
		$dt["id"]=$id;
		$dt["berlaku"]=$data->berlaku;
		echo json_encode($dt);
	}
	
	
	function getpic($id)
	{
		//$this->db->where("id_admin",$this->session->userdata("id"));
		$this->db->where("id_peserta",$id);
		$data=$this->db->get("data_peserta")->row();
		$dt["id"]=$id;
		$dt["pic"]=$data->pic;
		echo json_encode($dt);
	}
	
	
	function getMakan($id)
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$id);
	$data=$this->db->get("data_peserta")->row();
	$tbl="<table class='tabel table-bordered table-hover table-striped'>";
	$dt=explode(",",$data->makan);$no=1;
	foreach($dt as $va)
	{
		if($va){
			$tbl.="<tr><td>".$no."</td><td>".$this->tanggal->hariLengkap(substr($va,0,10),"/")." ".substr($va,11,10)."</td></tr>";	$no++;
		}
	}
	$tbl.="</table>";
	$dt=$id."::".$data->makan."::".$tbl;
	echo $dt;
	}
	
	
	
	function getSv($id)
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_peserta",$id);
	$data=$this->db->get("data_peserta")->row();
	$tbl="<table class='tabel table-bordered table-hover table-striped'>";
	$dt=explode(",",$data->sv);$no=1;
	foreach($dt as $va)
	{
		if($va){
			$tbl.="<tr><td>".$no."</td><td>".$this->tanggal->hariLengkap(substr($va,0,10),"/")." ".substr($va,11,10)."</td></tr>";	$no++;
		}
	}
	$tbl.="</table>";
	$dt=$id."::".$data->sv."::".$tbl;
	echo $dt;
	}
	
	function hapusAll()
	{
	echo $this->event->hapusAll();
	}
	function ajax_peserta()
	{
		$list = $this->event->get_peserta();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		///
		//$id=$this->uri->segment(3); 
	//	$event=$this->event->dataEvent($id);
	//	$jmlKolom=$this->event->jmlKolom($event->id_form); 
		foreach ($list as $dataDB) {
		////
		$isidata=explode(" __v||v__ ",$dataDB->data);
			$row = array();
			$row[] =  '
			 <input type="checkbox" id="md_checkbox_'.$dataDB->id_peserta.'"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="hapus[]"  value="'.$dataDB->id_peserta.'" />
                                <label for="md_checkbox_'.$dataDB->id_peserta.'">&nbsp;</label> ';
			
			$row[] = "<span class='size'>".$no++."</span>";
			
			
			
			if($dataDB->status=="0")
			{
			$acc='<a class="label label-danger" href="javascript:void()" data-toggle="tooltip" data-placement="top" title="Klik untuk menyetuji" onclick="acc('.$dataDB->id_peserta.')">
			<i class="fa fa-lg fa-minus"></i>DICEKAL</a>';
			}elseif($dataDB->status=="1")
			{
			$acc='<a class="label bg-grey" href="javascript:void()"  data-toggle="tooltip" data-placement="top" title="Klik untuk batal menyetujui" onclick="not('.$dataDB->id_peserta.')">
			<i class="fa fa-lg fa-dot-circle-o"></i> Tidak Hadir</a>';
			}else
			{
			$acc='<a class="label label-primary" href="javascript:void()" title="Batalkan" onclick="acc('.$dataDB->id_peserta.')">
			<i class="fa fa-check fa-lg"></i>  Hadir</a>';
			}
			
			if($dataDB->status2=="0")
			{
			$acc2='<a class="label label-danger" href="javascript:void()" data-toggle="tooltip" data-placement="top" title="Klik untuk menyetuji" onclick="acc2('.$dataDB->id_peserta.')">
			<i class="fa fa-lg fa-minus"></i>DICEKAL</a>';
			}elseif($dataDB->status2=="1")
			{
			$acc2='<a class="label bg-grey" href="javascript:void()"  data-toggle="tooltip" data-placement="top" title="Klik untuk batal menyetujui" onclick="not2('.$dataDB->id_peserta.')">
			<i class="fa fa-lg fa-dot-circle-o"></i> Tidak Hadir</a>';
			}else
			{
			$acc2='<a class="label label-primary" href="javascript:void()" title="Batalkan" onclick="acc2('.$dataDB->id_peserta.')">
			<i class="fa fa-check fa-lg"></i>  Hadir</a>';
			}
			
			
			if($dataDB->rekap==0)
			{
			$rekap='<a class="label bg-brown" href="javascript:void()" title="Hitung rekap" onclick="rekap(`1`,`'.$dataDB->id_peserta.'`)">
			<i class="fa fa-check fa-lg"></i>  Ya</a>';
			}else{
				 $rekap='<a class="label bg-grey" href="javascript:void()" title="Hitung rekap" onclick="rekap(`0`,`'.$dataDB->id_peserta.'`)">
			<i class="fa fa-check fa-lg"></i>  No</a>';
			}
			 
				
			 
			if($dataDB->nama)
			{
				$natam=$dataDB->nama;
			}else{
				$natam="---";
			}
			if($dataDB->lembaga)
			{
				$lembaga=$dataDB->lembaga;
			}else{
				$lembaga="---";
			}
			if($dataDB->jenis==1){
			$acara="Pagi";}else{
				$acara="Sore";
			}
			
			 	$kod1="<input type='text' name='kod' id='kod1".$dataDB->id_peserta."' value='".$dataDB->ip."' onchange='setKode(`1`,`".$dataDB->id_peserta."`)'>";
			 	$kod2="<input type='text' name='kod' id='kod2".$dataDB->id_peserta."' value='".$dataDB->ip2."' onchange='setKode(`2`,`".$dataDB->id_peserta."`)'>";
			 
			
			
			
			//if(!$dataDB->ket){ $ket='<a href="javascript:ket(`'.$dataDB->id_peserta.'`)">----------</a>';}else{ 
		//	$ket='<a href="javascript:ket(`'.$dataDB->id_peserta.'`)">'.$dataDB->ket.'</a>';};
			//$row[]=" <a href='javascript:getbarcode(`".$dataDB->kode_registrasi."`)'>  `".$dataDB->kode_registrasi."</a> ";
			$row[]= $kod1;
			$row[]= $kod2;
		//	$row[]="<a href='javascript:edit(`1`,`".$dataDB->id_peserta."`)'>".$natam."</a>" ;
		//	$row[]="<a href='javascript:edit(`2`,`".$dataDB->id_peserta."`)'>".$lembaga."</a>" ;
			if($dataDB->konsep==0){
			$row[]="<span onclick='javascript:blokan(`".$dataDB->id_peserta."`)'>".$dataDB->blok." - ".$acara."</span>" ;
			}else{
			$row[]="";
			}
		//	$row[]="<a href='javascript:pic(`".$dataDB->id_peserta."`)'>".$dataDB->pic."</a>" ;
		///	$row[]="<span href='#'>".$acara."</span>" ;
						$row[]="<span onclick='javascript:berlakukan(`".$dataDB->id_peserta."`)'>".$dataDB->berlaku."</span>" ;




$row[] = $acc.'		
					
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_peserta.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';	
				$row[] = $acc2.'		
					
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_peserta.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';	





			$row[]=$rekap ;
			$row[]=$dataDB->no_surat ;
			$row[]=$dataDB->gate ;
		 
	 
			
			
		
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->event->count_file_peserta("data_peserta"),
						"recordsFiltered" =>$this->event->count_filtered_peserta('data_peserta'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);
	}
	function setRekap()
	{
		$id=$this->input->post("id");
		$set=$this->input->post("set");
		$this->db->where("id_peserta",$id);
		$this->db->set("rekap",$set);
		echo $this->db->update("data_peserta");
	}
	function ajax_barcode()
	{
		$list = $this->event->get_barcode();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		///
		//$id=$this->uri->segment(3); 
	//	$event=$this->event->dataEvent($id);
	//	$jmlKolom=$this->event->jmlKolom($event->id_form); 
		foreach ($list as $dataDB) {
		////
		$isidata=explode(" __v||v__ ",$dataDB->data);
			$row = array();
			$row[] =  '
			 <input type="checkbox" id="md_checkbox_'.$dataDB->id_peserta.'"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="hapus[]"  value="'.$dataDB->id_peserta.'" />
                                <label for="md_checkbox_'.$dataDB->id_peserta.'">&nbsp;</label> ';
			
			$row[] = "<span class='size'>".$no++."</span>";
		 
			  
			 
			$row[]= $dataDB->ip;
			$row[]= $dataDB->cetak;
	 
		  
		
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->event->count_file_barcode("data_peserta"),
						"recordsFiltered" =>$this->event->count_filtered_barcode('data_peserta'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);
	}
	function setKode()
	{
		$id=$this->input->post("id");
		$ke=$this->input->post("ke");
		$kode=$this->input->post("kode");
		$cek=$this->db->query("select * from data_peserta where (ip='".$kode."' or ip2='".$kode."') ")->num_rows();
		if($cek){
		echo "false";
		return false;
		}
		
		$this->db->where("id_peserta",$id);
		$this->db->set("kode_registrasi",$kode);
		if($ke==1)
		{
			$this->db->set("ip",$kode);
		}else{
			$this->db->set("ip2",$kode);
		}
		
		$this->db->update("data_peserta");
		return $this->m_reff->qr($kode);
	}
	function deletePeserta()
	{
	echo $this->event->deletePeserta();
	}
	function acc($id)
	{
		$event=$this->idEvent;
	echo $this->event->acc($id,$event);
	}function not($id)
	{
	echo $this->event->not($id);
	}function acc2($id)
	{
		$event=$this->idEvent;
	echo $this->event->acc2($id,$event);
	}function not2($id)
	{
	echo $this->event->not2($id);
	}
	function updatedCheckIn()
	{
	$this->load->view("UpdatedCheckIn");
	}
	function exportPeserta($id)
	{
	$this->load->library("PHPExcel");
	$this->event->exportPeserta($id);
	}
	
	function download_template()
	{
	$id=$this->idevent;
	$this->load->library("PHPExcel");
	$this->event->download_template($id);
	}
	
	function modeEvent($id)
	{
	$iduser=$this->session->userdata("id");
	$this->db->where("id_admin",$iduser);
	$this->db->where("id_event",$id);
	$this->session->set_userdata(array("reg"=>$id));
	return $this->db->update("data_event",array("mode"=>"0"));
	}
	function upload_file()
	{	$id=$this->idevent;
		if($this->input->post("hapus")==1)
		{
		$this->event->deleteAllPeserta($id);
		$iduser=$this->session->userdata("id");
		$this->db->where("id_admin",$iduser);
		$this->db->where("id_event",$id);
		$this->db->delete("data_peserta");
		}
		$mode=$this->input->get_post("mode");
		$data=$this->event->do_upload_file($id,$mode);
		$data=explode("-",$data);
		
               ?><hr>
			 
                <table class="table col-black table-hover table-bordered" >
			        <?php echo "<tr><td>PAGI</td><td>:</td><td>".$data[0]."</td></tr>"; ?>
			       <?php echo "<tr><td>SORE</td><td>:</td><td>".$data[1]."</td></tr>"; ?>
					<?php echo "<tr><td>Diupdate</td><td>:</td><td>".$data[2]."</td></tr>"; ?>
                </table>
                <?php
    }
	function upload_file_barcode()
	{
		$jml=$this->input->post("jml");
		for($i=1;$i<=$jml;$i++)
		{
			$this->buildBarcode();
		}
		echo "true";
	}
	function buildBarcode()
	{
					$like=$this->db->query("SHOW TABLE STATUS LIKE 'data_barcode'")->row();
					$additional=substr(str_shuffle("123456789"),0,5);
					$kode=$additional.sprintf("%05s", $like->Auto_increment);
					$this->db->set("ip",$kode);
					$this->db->set("kode_registrasi",$kode);
					$this->db->insert("data_barcode");
					return $this->m_reff->qr($kode);
	}
	
	function upload_file_khusus()
	{	$id=$this->idevent;
		$mode=$this->input->get_post("mode");
		$data=$this->event->do_upload_file_khusus($id,$mode);
		$data=explode("-",$data);$no_surat="Tidak ada";
		if(isset($data[2])){
			$no_surat="No Surat : ".$data[3];
		}
               ?><hr>
	 
                <table class="table col-black table-hover table-bordered" >
			       <?php echo "<tr><td>PAGI</td><td>:</td><td>".$data[0]."</td></tr>"; ?>
			       <?php echo "<tr><td>SORE</td><td>:</td><td>".$data[1]."</td></tr>"; 
				   if($data[3]){
				   echo "<tr><td>DATA DOUBLE</td><td>:</td><td>".$no_surat."</td></tr>"; } 
				   if($data[4]){
				   echo "<tr><td>MASALAH </td><td>:</td><td>Nomor surat ada yg kosong</td></tr>"; }
				   if($data[5]){
				   echo "<tr><td>MASALAH </td><td>:</td><td>Nama File ada yg kosong</td></tr>"; } 
				   if($data[6]){
				   echo "<tr><td>MASALAH </td><td>:</td><td>Blok pagi ada yg kosong No.".$data[6]."</td></tr>"; } 
				   if($data[7]){
				   echo "<tr><td>MASALAH </td><td>:</td><td>Blok sore ada yg kosong No.".$data[7]." </td></tr>"; } ?>
				 
                </table>
                <?php
    }
	function cetak()
	{
		$this->load->view("cetak");
	}
	function cetak_label()
	{
		$this->load->view("cetak_label");
	}
	function cetak_barcode()
	{
		$this->load->view("cetak_barcode");
	}
	function downloadData()
	{ 
		$namaFile = "data.json"; 
		header("Content-type: text/plain");
	 	header("Content-Disposition: attachment; filename=".$namaFile); 
		$query = "SELECT kode_registrasi,jenis,gate FROM data_peserta where status='2' and jenis='1'"; 
		$hasil = $this->db->query($query)->result();
		$val=array();$n=1;$kode="";$gate="";
		foreach ($hasil as $data)
		{
			$kode.=$data->kode_registrasi."::".$data->gate.",";
		//	$gate.="'".$data->gate."',";
			
		}
		$kode=substr($kode,0,-1);
		//$gate=substr($gate,0,-1);
		if($kode){
		$val[]=array("reg"=>$kode,"jenis"=>1,"gate"=>$gate);
		}
		
		$query = "SELECT kode_registrasi,jenis,gate FROM data_peserta where status='2' and jenis='2'"; 
		$hasil = $this->db->query($query)->result();
		 $kode="";
		foreach ($hasil as $data)
		{
			$kode.=$data->kode_registrasi."::".$data->gate.",";
		//	$gate.="'".$data->kode_registrasi."',";
		}
		$kode=substr($kode,0,-1);
		//$gate=substr($gate,0,-1);
		if($kode){
		$val[]=array("reg"=>$kode,"jenis"=>2,"gate"=>$gate);
		}
		
		echo json_encode($val); 
	 	
	}
	function gosin()
	{
	echo	$this->event->gosin();
	}
	
}

