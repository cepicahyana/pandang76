<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
     	}
	
	function captcha($captcha)
	{
	$this->session->set_userdata(array("captcha"=>$captcha));
	}
	private function cekCaptcha($no)
	{
		$sescap=$this->session->userdata("captcha");
		if($sescap==$no){
		  return 1; 	}else
		{ return 1; 	}
	}
	private function saveSession($id,$level,$pass,$gate=null)
	{
	$array=array(
	"id"=>$id,
	"level"=>$level,
	"pass"=>$pass,
	"gate"=>$gate,
	);
	$this->session->set_userdata($array);
	}
	function getDataLevel($id)//id_level
	{
	$this->db->where("id_level",$id);
	$data=$this->db->get("main_level")->row();
	return $data->nama;
	}
	function cekLogin()
	{	$no=$this->input->post('captcha');
		$cekcap=$this->cekCaptcha($no);
		$this->db->where("username",$this->input->post('username'));
		$this->db->where("password",md5($this->input->post('password')));
		$login=$this->db->get("admin");
		if($login->num_rows()==1)
		{
			$login=$login->row();
			if($cekcap){ $this->saveSession($login->id_admin,$this->getDataLevel($login->level),$this->input->post('password'),$this->input->post('gate'));  /*success*/ };
			if($cekcap){ return "1_".$this->getDataLevel($login->level);  /*success*/ }else{  return "2_captcha";/*captcha salah*/ };
		}else
		{
			return "0_false";//username/password salah
		}
	}
		function resetValidasi()
		{
			$id_admin	=	$this->session->userdata("id");
			$this->db->where("verifikator",$id_admin);
			$this->db->where("sts_verifikasi","1");
			$this->db->set("sts_verifikasi","0");
			$this->db->set("verifikator","0");
			return $this->db->update("data_peserta");
		}
}

?>