<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_profile extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
     	}
	
	function dataProfile($id)
	{
	return $this->db->get_where("admin",array("id_admin"=>$id))->row();
	}
	
	
	public function upload_img($id)
	{	$this->m_konfig->log("admin","Upload photo");
		///
		  $lokasi_file = $_FILES['gambar']['tmp_name'];
		  $tipe_file   = $_FILES['gambar']['type'];
		  $nama_file   = $_FILES['gambar']['name'];
		  if($tipe_file)
		  {
		  $daprof=$this->dataProfile($id);
		  if($daprof->poto!="")
			 {
				 $path = "file_upload/dp/".$daprof->poto;
				 if (file_exists($path)) {
					unlink($path);
				 }
			 }
		  
		  
			$jenis=explode("/",$tipe_file);
			$jenis=$jenis[1];
			if($jenis=="png" || $jenis=="jpg" || $jenis=="jpeg")
			{
			$jenis="jpg";
			};
			 $target_path = "file_upload/dp/".$id.".".$jenis;
			 //
			 
			 
		  }
		  //
		if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$target_path);
		$array=array("poto"=>$id.".".$jenis);
		$this->db->where("id_admin",$id);
		return $this->db->update("admin",$array);
		}
	}
	private function cekPassword($id)
	{
	//if($id!="all"){
	$this->db->where("id_admin!=",$id);
	//}
	$this->db->where("username",$this->input->post('username'));
	$this->db->where("password",md5($this->input->post('password')));
	return $this->db->get("admin")->num_rows();
	}
	
	function update($id)
	{
	if(isset($_FILES['gambar']['type']))
	{
	$this->upload_img($id);
	}
	
		
	if($this->input->post("level"))
	{
		$data1=array(
		"level"=>$this->input->post("level"),
		);
	}else{ $data1=array(); };
	
	$data2=array(
	"owner"=>$this->input->post("owner"),
	"telp"=>$this->input->post("telp"),
	"email"=>$this->input->post("email"),
	"alamat"=>$this->input->post("alamat"),
	);
	$data=array_merge($data1,$data2);
	$this->db->where("id_admin",$id);
	$this->db->update("admin",$data);	
		
		
	if($this->input->post("password"))
	{
		if($this->cekPassword($id))
		{
		return "nopass";//password tidak tersedia
		}else
		{	
		$this->m_konfig->log("admin","ganti password");
		$password=md5($this->input->post("password"));
		
		$data=array(
		"username"=>$this->input->post("username"),
		"password"=>$password,
		);
		$this->db->where("id_admin",$id);
		return $this->db->update("admin",$data);
				
		}
	}else { $dt=$this->dataProfile($id);	$password=$dt->password; $this->m_konfig->log("admin","update data profile"); return true;};
	
	

	
	
	}
	function cekMaxIdAdmin()
	{
	$db=$this->db->query("select MAX(id_admin) as max from admin")->row();
	return $db->max;
	}
	
	function add_dataUser()
	{
		
	$password=md5($this->input->post("password"));
	$data=array(
	"username"=>$this->input->post("username"),
	"password"=>$password,
	"owner"=>$this->input->post("owner"),
	"level"=>$this->input->post("level"),
	"telp"=>$this->input->post("telp"),
	"email"=>$this->input->post("email"),
	"alamat"=>$this->input->post("alamat"),
	"tgl"=>date('Y-m-d H:i:s'),
	);
	
		if($this->cekPassword("all")>0)
		{
		return 0;//password tidak tersedia
		}else
		{
		$this->db->insert("admin",$data);
		//////////
		$idadmin=$this->cekMaxIdAdmin();
		if(isset($_FILES['gambar']['type']))
		{
		$this->upload_img($idadmin);
		}
		
		return true;
		}
	
	}	
	
	function add_dataUserReg()
	{
		 $hp=str_replace("+62","0",$this->input->post("telp"));
		 $ng=substr($hp,1,13);
		 $datan=substr($this->input->post("telp"),0,1);
		 $not=str_replace("0","62",$datan);
		 $datang=$not."".$ng;
		 
		 $pass=substr(str_shuffle("0123456789abcdefghijklmnopqrstupwxyz"),0,6);
		 $password=md5($pass);
		 
			$pesan="Terimakasih sudah mendaftar di barcodevent.com, password anda: ".$pass."";
			$pesan=str_replace(" ","+",$pesan);
	
			$url="http://smsplus1.routesms.com/bulksms/bulksms?";
			$curlHandle = curl_init();
			curl_setopt($curlHandle, CURLOPT_URL, $url);
			curl_setopt($curlHandle, CURLOPT_POSTFIELDS,"username=neger&password=ert77asd&type=0&dlr=1&destination=".$datang."&source=barcodevent&message=".$pesan."");
			curl_setopt($curlHandle, CURLOPT_HEADER, 0);
			curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curlHandle, CURLOPT_TIMEOUT,0);
			curl_setopt($curlHandle, CURLOPT_POST, 1);
			curl_exec($curlHandle);
			curl_close($curlHandle); 
			////
	
	$data=array(
	"username"=>$this->input->post("email"),
	"password"=>$password,
	"owner"=>$this->input->post("nama"),
	"telp"=>$this->input->post("telp"),
	"email"=>$this->input->post("email"),
	"alamat"=>$this->input->post("alamat"),
	"tgl"=>date('Y-m-d H:i:s'),
	"ip"=>$_SERVER['REMOTE_ADDR'],
	);
	
	$this->db->insert("admin",$data);
		//////////
				
		return true;
		}
	
}

?>