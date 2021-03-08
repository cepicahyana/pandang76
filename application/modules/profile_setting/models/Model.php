<?php

class Model extends CI_Model  {
    
		
	function __construct()
    {
        parent::__construct();
    }
	 
	 
	 
	  function dataProfile()
	 {
		$idu=$this->session->userdata("id");
		$this->db->where("id_admin",$idu);
		return $this->db->get("admin")->row();
		 
	 }
	  
	  
	
	function update()
	{
	 $var=array();
	$var["size"]=""; 
	$var["file"]="";
	$var["password"]="";
	$var["gagal"]=false; 
	
	 $user=$this->input->post("f[username]");
	 $user=$this->security->xss_clean($user);
	 
	 $pass=$this->input->post("password");
	 $cpassword=$this->input->post("cpassword");
	 $pass=$this->security->xss_clean($pass);
	 if($cpassword!=$pass)
	 {
		 $var["gagal"]=true;
		 $var["info"]="Ketik ulang password tidak sama.";
		 return $var;
	 }
	 if(strlen($pass)<8 and $pass)
	 {
		 $var["gagal"]=true;
		 $var["info"]="password minimal 8 digit.";
		 return $var;
	 }
	 $id=$this->input->post("id_admin");
	 $idu=$this->session->userdata("id");
	 
	 if(!$id) {		$id=$idu;	 }
	 
	 $pro=$this->mdl->dataProfile();
		$data=$this->input->post("f");
		if(!$data){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
		$data=$this->security->xss_clean($data);
		if($pass)
		{
		  $this->db->set("password",md5($pass));
		 
		} 
		 
		if($this->cekPassword($id,$user,$pass)>0)
		{
			 $var["info"]="Silahkan cari username/password lain"; $var["gagal"]=true; 
			 return $var;
		}else
		{
			 $var["validasi"]=true; 
			 if(isset($_FILES["poto"]['tmp_name']))
			{  
				$file=$this->upload_file("poto","user",$idu,$id);
				if($file["validasi"]!=false)
				{
					
					$this->db->set("poto",$file["name"]);
					
				}else{
				$var["gagal"]=true;
				$var["info"]=$file["info"];
				return $var;
				}
			$var=$file;
			} 

				$this->db->set("username",$user); 
			
				$this->db->where("id_admin",$id);
				$this->db->update("admin",$data);		
			
			 
		}
			return $var;
	
	}
	function upload_file($form,$dok,$idu,$id=null,$tabel="admin")
	{		
	 $allowed_image_extension = array(
        "image/jpeg",
        "image/png", 
    );
		$var=array();
		$var["size"]=""; 
		$var["file"]="";
		$var["validasi"]=false; 
	
		$nama=date("YmdHis")."_".$idu."_";
		  $lokasi_file = $_FILES[$form]['tmp_name'];
		  $tipe_file   = $_FILES[$form]['type'];
		  $nama_file   = $_FILES[$form]['name'];
		   $size  	   = $_FILES[$form]['size'];
			$nama_file=str_replace(" ","_",$nama_file);
			// $jenis="jpg";
			$nama=str_replace("/","",$nama."_".$nama_file);
			 $target_path = "file_upload/".$dok."/".$nama;
			 
			  $ex=substr($nama_file,-3);
			$extention=str_replace(" ","_",strtoupper($ex));
			
		 $maxsize = 3000000;
		 $file_extension = pathinfo($_FILES[$form]["name"], PATHINFO_EXTENSION);
		 
		$fileType = image_type_to_mime_type(exif_imagetype($lokasi_file));
		if (!in_array($fileType, $allowed_image_extension)) { 
			 $var["validasi"]=false; 
			 $var["info"]="File tidak dizinkan."; 
			 return $var;
		 }
		 elseif($size>=$maxsize)
		 {
			$var["size"]=$size; 
		 }elseif($extention!="JPG" AND $extention!="PNG"){
			$var["file"]=$extention;
		 }else{
		 	$var["validasi"]=true;
			if (!empty($lokasi_file)) {
			move_uploaded_file($lokasi_file,$target_path);
				if($id)
				{
					$namapotoid=$this->m_reff->goField($tabel,"poto","where id_admin='".$id."'");
					$file_namapotoid="file_upload/".$dok."/".$namapotoid."";
					if(file_exists($file_namapotoid) and $namapotoid)
					{
						unlink($file_namapotoid);
					}
				}
			
			 }
			$var["name"]=$nama;
		 }
		 return $var;
	}
	function insert()
	{
		$var=array();
	$var["size"]=""; 
	$var["file"]="";
	$var["password"]="";
	$var["validasi"]=false; 
	
	 $user=$this->input->post("f[username]");
	 $user=$this->security->xss_clean($user);
	 
	 $pass=$this->input->post("password");
	 $pass=$this->security->xss_clean($pass);
	 
	 $id=$this->session->userdata("id");
	 $pro=$this->mdl->dataProfile();
		$data=$this->input->post("f");
		$data=$this->security->xss_clean($data);
		if($pass)
		{
		  $this->db->set("password",md5($pass));
		   $this->db->set("alias","li".$pass."la");
		} 
		 
		if($this->cekPassword("",$user,$pass)>0)
		{
			 $var["password"]=false; $var["validasi"]=false; 
		}else
		{
			 $var["validasi"]=true; 
			 if(isset($_FILES["poto"]['tmp_name']))
			{  
				$file=$this->mdl_extra->upload_file_image("poto","dp",$id);
				if($file["validasi"]!=false)
				{
					
					$this->db->set("poto",$file["name"]);
					
				}
			$var=$file;
			} 
			//	$this->db->where("id_admin",$id);
				$this->db->insert("admin",$data);		
			
			 
		}
			return $var;
	
	}
	
	 
	
	
	 function cekPassword($id,$user,$pass)
	{
		 
		$this->db->where("id_admin!=",$id);
		$this->db->where("username",$user);
		$this->db->where("password",md5($pass));
		$return1=	$this->db->get("admin")->num_rows();
		
		 
		return ($return1);
	}
	
	 
}