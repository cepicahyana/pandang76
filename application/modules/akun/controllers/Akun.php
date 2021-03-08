<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends MY_Controller {

	 
	var $tbl="admin";
	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("user"));
		$this->load->model("model","mdl");
		date_default_timezone_set('Asia/Jakarta');
	}
	 
	function _template($data)
	{
	$this->load->view('temp_user/main',$data);	
	}
	
	public function link()
	{
		 	
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("link");
		}else{
			$data['konten']="link";
			$this->_template($data);
		}
		
	}
	
	
	function verifikator()
	{
		$this->index();
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
		
	}public function vicon()
	{
		 	
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("vicon");
		}else{
			$data['konten']="vicon";
			$this->_template($data);
		}
		
	}
	public function room_vicon()
	{
		 	
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("room_vicon");
		}else{
			$data['konten']="room_vicon";
			$this->_template($data);
		}
		
	}
	 public function distributor()
	{
		 	
		$ajax=$this->input->post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("distributor");
		}else{
			$data['konten']="distributor";
			$this->_template($data);
		}
		
	}
	 
	 
	
	 
	///-----------------------SISWA--------------------------///
 
	 
	
	///-----------------------mitra PENILIAAN--------------------------///
	function getData()
	{
		$list = $this->mdl->get_data();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
	 
		if($dataDB->sts_aktivasi=="enable")
		{
			$sts="<span class='text-primary'>Aktif</span>";
		}else{
			$sts="<span class='text-danger'>Non-aktif</span>";
		}
		 $tombol='<div class="demo-button-groups">
                                <div class="btn-group" role="group">
                                    <button type="button" onclick="edit(`'.$dataDB->id_admin.'`)" class="btn btn-primary btn-sm waves-effect waves-light">EDIT</button>
                                    <button type="button" onclick="hapus(`'.$dataDB->id_admin.'`,`'.$dataDB->owner.'`)" class="btn btn-danger btn-sm waves-effect waves-light">HAPUS</button>
                                    
                                </div>
                                
                            </div>';
			 		
			$level	= $this->m_reff->goField("main_level","nama","where id_level='".$dataDB->level."'");
			$level	=	str_replace("user","admin",$level);
			$level	=	str_replace("leader","Pimpinan",$level);
		 
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";	
			$row[] = "<span class='size'>  ".$dataDB->owner." </span>";
			$row[] = "<span class='size'>  ".$dataDB->nip." </span>";
			$row[] = "<span class='size'>  ".$level." </span>"; 
			$row[] = "<span class='size'>  ".$sts."   </span>";
		 
			 
			$row[] = $tombol;
		  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	 
	//------------------------------------------- -----------------------------------//
	 
	
	///-----------------------mitra PENILIAAN--------------------------///
	function getDataRoom()
	{
		$list = $this->mdl->get_data_room();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
	 
		 if($dataDB->sts_aktivasi==1)
		{
			$sts="<span class='text-primary'>Aktif</span>";
		}else{
			$sts="<span class='text-danger'>Non-aktif</span>";
		}
		 $tombol='<div class="demo-button-groups">
                                <div class="btn-group" role="group">
                                    <button type="button" onclick="edit(`'.$dataDB->id.'`)" class="btn btn-primary btn-sm waves-effect waves-light">EDIT</button>
                                    <button type="button" onclick="hapus(`'.$dataDB->id.'`)" class="btn btn-danger btn-sm waves-effect waves-light">HAPUS</button>
                                    
                                </div>
                                
                            </div>';
			 		
			 	$row = array();
			$row[] = "<span class='size'>".$no++."</span>";	
			$row[] = "<span class='size'>  ".$this->m_reff->goField("zoom_akun","nama","where id='".$dataDB->id_akun."'")."</span>";
			$row[] = "<span class='size'>  ".$dataDB->kode." </span>";
			$row[] = "<span class='size'>  ".$dataDB->title." </span>";
			$row[] = "<span class='size'>  ".$sts."   </span>"; 
			$row[] = $tombol;
			$row[] = "<span class='size'>  
			<a class='text-danger' href='javascript:ressetPesertaZoom(`".$dataDB->id."`,`".$dataDB->title."`,`2`)'>resset online</a>  <br><br> 
			<a href='javascript:ressetPesertaZoom(`".$dataDB->id."`,`".$dataDB->title."`,`1`)'>resset given</a>  
			</span>";
			
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count_room(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	 
	//------------------------------------------- -----------------------------------//
	///-----------------------mitra PENILIAAN--------------------------///
	function getDataRoomLink()
	{
		$list = $this->mdl->get_data_room();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
	 
		 if($dataDB->sts_aktivasi==1)
		{
			$sts="<span class='text-primary'>Aktif</span>";
		}else{
			$sts="<span class='text-danger'>Non-aktif</span>";
		}
		 $tombol='<div class="demo-button-groups">
                                <div class="btn-group" role="group">
                                    <button type="button" onclick="submit(`'.$dataDB->id.'`,`'.$dataDB->title.'`)" class="btn btn-danger btn-sm waves-effect waves-light">SUBMIT</button>
                                     
                                </div>
                                
                            </div>';
		$tersedia	= $this->mdl->linkReady(1,$dataDB->id);					
		$belum		= $this->mdl->linkReady(0,$dataDB->id);					
		$link="Tersedia : ".$tersedia.br()."Belum Tersedia : ".$belum;	 		
			 	$row = array();
			$row[] = "<span class='size'>".$no++."</span>";	
			//$row[] = "<span class='size'>  ".$this->m_reff->goField("zoom_akun","nama","where id='".$dataDB->id_akun."'")."</span>";
		//	$row[] = "<span class='size'>  ".$dataDB->kode." </span>";
			$row[] = "<span class='size'>  ".$dataDB->title." </span>";
			$row[] = "<span class='size'>  ".$sts."   </span>"; 
			$row[] = "<span class='size'>  <input type='text' style='max-width:90px' value='".$dataDB->leng."'  onkeyup='setLeng(`".$dataDB->id."`,this.value)' >   </span>"; 
			$row[] = "<span class='size'>  <input type='text'  value='".$dataDB->page."' onkeyup='setPage(`".$dataDB->id."`,this.value)' >   </span>"; 
			$row[] = $tombol;
			$row[] = $link;
			 
			
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count_room(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	 
	//------------------------------------------- -----------------------------------//
	
	///-----------------------mitra PENILIAAN--------------------------///
	function getData_vicon()
	{
		$list = $this->mdl->get_data_vicon();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
	 
		 
		 $tombol='<div class="demo-button-groups">
                                <div class="btn-group" role="group">
                                    <button type="button" onclick="edit(`'.$dataDB->id.'`)" class="btn btn-primary btn-sm waves-effect waves-light">EDIT</button>
                                    <button type="button" onclick="hapus(`'.$dataDB->id.'`)" class="btn btn-danger btn-sm waves-effect waves-light">HAPUS</button>
                                    
                                </div>
                                
                            </div>';
			 		 
		 
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";	
			$row[] = "<span class='size'>  ".$dataDB->nama." </span>";
			$row[] = "<span class='size'>  ".$dataDB->key." </span>";
			$row[] = "<span class='size'>  ".$dataDB->secreet." </span>";
			  
			 
			$row[] = $tombol;
		  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count_vicon(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	 
	//----------------------------------------------- -----------------------//
	function idu()
	{
		return $this->session->userdata("id");
	}
	  
	 
	function viewAdd()
	{
		echo $this->load->view("viewAdd");
	}  
	 	 
	function viewAdd_room()
	{
		echo $this->load->view("viewAdd_room");
	}  
	 
	function viewAdd_vicon()
	{
		echo $this->load->view("viewAdd_vicon");
	}
	function viewEdit()
	{
		echo $this->load->view("viewEdit");
	}	function viewEdit_room()
	{
		echo $this->load->view("viewEdit_room");
	}function viewEdit_vicon()
	{
		echo $this->load->view("viewEdit_vicon");
	}
	function insert($level=null)
	{
		echo json_encode($this->mdl->insert($level));
	}
	function insert_room()
	{
		echo json_encode($this->mdl->insert_room());
	}
	function resset_zoom_peserta()
	{
		echo json_encode($this->mdl->resset_zoom_peserta());
	}
	
	function insert_vicon()
	{
		echo json_encode($this->mdl->insert_vicon());
	}
	function update()
	{
		echo json_encode($this->mdl->update());
	}	
	function update_vicon()
	{
		echo json_encode($this->mdl->update_vicon());
	}function update_room()
	{
		echo json_encode($this->mdl->update_room());
	}
	function set()
	{
		echo $this->mdl->set();
	}
	
	
	function hapus()
	{
		$id=$this->input->post("id");
		echo $this->mdl->hapus($id);
	}
	 function hapus_vicon()
	{
		$id=$this->input->post("id");
		echo $this->mdl->hapus_vicon($id);
	}
	  function hapus_room()
	{
		$id=$this->input->post("id");
		echo $this->mdl->hapus_room($id);
	}
	 
	function save_bursa()
	{
	$data=$this->mdl->save_bursa();
	echo json_encode($data);
	}
	function hapus_bursa()
	{
	$data=$this->mdl->hapus_bursa();
	echo json_encode($data);
	}
	function setLeng()
	{
		$data=$this->mdl->setLeng();
		echo json_encode($data);
	}
	
	function setPage()
	{
		$data=$this->mdl->setPage();
		echo json_encode($data);
	}
	
	function get_link()
	{
		echo $data=$this->mdl->get_link();
		//echo json_encode($data);
	}
	
}