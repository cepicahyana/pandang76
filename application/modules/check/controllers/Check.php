<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check extends CI_Controller {

	
	 
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_myevent','event');
		$this->m_konfig->validasi_session(array("user"));
		
		date_default_timezone_set("Asia/Jakarta");
	}
	 
	function _template($data)
	{
	$this->load->view('temp_check/main',$data);	
	}
	
	 function CheckRegister()
	{
	echo $this->load->view("DataCekIn");
	}function CheckRegisterSuci()
	{
	echo $this->load->view("DataCekInSuci");
	}function CheckRegisterAcara()
	{
	echo $this->load->view("DataCekInAcara");
	}
	function saveRegister()
	{
		$id=$this->idevent;
	echo $this->event->saveRegister($id);
	}
 
	public function index()
	{
		 
		$this->in();
		 
	}
	 
	
 
	 
	public function in()
	{
 
	$this->load->view('checkin');	
	}	public function suci()
	{

	$this->load->view('suci');	
	}	
	public function acara()
	{

	$this->load->view('acara');	
	}	
 
	public function kelas($id)
	{
	$this->load->view('kelas');	
	}
	
 
 
	function save()
	{
	$data=$this->event->save();
	echo json_encode($data);
	}
	 
	function saveChange($id)
	{
	echo $this->event->saveChange($id);
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
	
	 
	 
 
	 function not($id)
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
 
	 
	
}

