<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
		$this->load->model('M_login','login');
	}
	
	function _template($data)
	{
	$this->load->view('template/head',$data);
	$this->load->view('template/konten');	
	$this->load->view('template/footer');
	}
	public function logout()
	{
		$this->login->resetValidasi(); 
		//$this->session->sess_destroy();
		$this->load->view("logout");
	//	redirect("login");
		
	}
	public function index()
	{
	   $nip	= "pandu.pandang";$this->session->set_userdata("nip",$nip);
	   $nip		=  $this->session->userdata("nip");
	  if(!$nip){	redirect("login/logout"); 		}
	$this->db->where("nip",$nip);
	$this->db->where("nip IS NOT NULL");
	$this->db->where("nip!=''");
		$this->db->where("sts_aktivasi","enable");
	$cek=$this->db->get("admin")->row();
	if(!$cek)
	{
		echo $this->m_reff->page405();	return false;
	}
	
	
	$id_level	=	isset($cek->level)?($cek->level):"";
	$id			=	isset($cek->id_admin)?($cek->id_admin):"";
	

					$this->db->where("id_level",$id_level);
	$get		=	$this->db->get("main_level")->row();
	
	$nama_level	=	isset($get->nama)?($get->nama):"";
	$direct		=	isset($get->direct)?($get->direct):"";
	
	if($get){	
			/* simpan sesssion */
			$this->session->set_userdata("level",$nama_level);
			$this->session->set_userdata("id",$id);
		 	redirect($direct);
	}else{
			/* level not found */
			echo $this->m_reff->page405();	return false;
	}
		
		 
	 
	}
	
	function captcha()
	{
	$captcha=substr(str_shuffle("123456789"),0,5); // string yg akan diacak membentuk captcha 0-z dan sebanyak 6 karakter
	$this->login->captcha($captcha);
	$gambar=ImageCreate(50,25); // ukuran kotak width=60 dan height=20
	$wk=ImageColorAllocate($gambar, 255, 255, 255); // membuat warna kotak -> Navajo White
	$wt=ImageColorAllocate($gambar, 51, 153, 153); // membuat warna tulisan -> Putih
	ImageFilledRectangle($gambar, 190, 776, 50, 120, $wk);
	ImageString($gambar, 10, 1, 3, $captcha, $wt);
	ImageJPEG($gambar);
	}
	function cekLogin()
	{
		
		if(!$this->input->post('username'))
		{
			echo $this->m_reff->page403(); return false;
		}
	$hasil=$this->login->cekLogin();
	echo json_encode($hasil);
	}
}

