<?php

class Model extends CI_Model  {
    
	var $tbl="admin";
 
 	function __construct()
    {
        parent::__construct();
    }
	function idu()
	{
		return $this->session->userdata("id");
	}
	
	 
	function saveweb_($idp,$val)
	{
		$this->db->set("value",$val);
		$this->db->where("id",$idp);
	return $this->db->update("tm_website");
	} function hapus_img($id)
	{
		$this->db->set("value",null);
		$this->db->where("id",$id);
	return $this->db->update("tm_website");
	} 
	function save_($idp,$val)
	{
		$this->db->set("val",$val);
		$this->db->where("id",$idp);
	return $this->db->update("tm_pengaturan");
	}function saveblok_($idp,$val)
	{
		$this->db->set("color",$val);
		$this->db->where("id",$idp);
	return $this->db->update("tr_blok");
	}
	
	 function gosin()
	{
		if(!isset($_FILES['userfile']['name']))
	 {
		 echo $this->m_reff->page403();	return false;
	 }
	 
		$sukses=0;$gagal=0;
		 $file   = explode('.',$_FILES['userfile']['name']);
		$length = count($file);
		if($file[$length -1] == 'json'){ 
		$file = $_FILES['userfile']['tmp_name'];
		  $file_handle = fopen($file , "rb");
	  	 $return=$line_of_text = fgets($file_handle);
		 $return=json_decode($return);
		 
		 foreach($return as $val)
		 { 
			 
			 if(isset($val->cekin1)){
			 $this->db->set("cekin1",$val->cekin1);
			 }
			 if(isset($val->cekin2)){
			 $this->db->set("cekin2",$val->cekin2);
			 }
			 if(isset($val->cekin3)){
			 $this->db->set("cekin3",$val->cekin3);
			 }
			 
			 $this->db->where("nik",$val->nik);
			 $this->db->update("data_peserta");
		 
		}
			                
		}else{
        return 'File tidak sesuai';//pesan error tipe file tidak tepat
		}
		
	}
	  function gosinGelang()
	{	
	 
		$var=array();
	$var["size"]=""; 
	$var["file"]="";
	$var["password"]="";
	$var["validasi"]=false; 
	$id=$this->input->post("id");
	  
			if(isset($_FILES["userfile".$id]['tmp_name']))
			{  
				$file=$this->m_reff->upload_file("userfile".$id,"gelang",$id,$type_file="JPG,PNG",$sizeFile="3000000");
				if($file["validasi"]!=false)
				{
					
					$this->db->set("link_gelang",$file["name"]);
					
				}
				$var=$file;
			} 
			
			$this->db->where("id",$id);
			$this->db->update("tr_blok");		 
			 
		 

		return $var["validasi"];
		
		
		
	}
	 
	 
	 
	 function gosinWeb()
	{	
	 
		$var=array();
	$var["size"]=""; 
	$var["file"]="";
	$var["password"]="";
	$var["validasi"]=false; 
	$id=$this->input->post("id");
			$pat	=	$this->m_reff->goField("tm_website","value","where id='15'");
			if(isset($_FILES["userfile".$id]['tmp_name']))
			{  
				$file=$this->m_reff->upload_file_basepath("userfile".$id,$pat,$id,$type_file="JPG,PNG,MP4,mp4",$sizeFile="30000000");
				if($file["validasi"]!=false)
				{
					
					$this->db->set("value",$file["name"]);
					
				}
				$var=$file;
			} 
			
			$this->db->where("id",$id);
			$this->db->update("tm_website");		 
			 
		 

		return $var["validasi"];
		
		
		
	}
	 
	  function gosinGelangAcara()
	{	 
	$var=array();
	$var["size"]=""; 
	$var["file"]="";
	$var["password"]="";
	$var["validasi"]=false; 
	$id=$this->input->post("id"); 
			if(isset($_FILES["userfile".$id]['tmp_name']))
			{  
				$file=$this->m_reff->upload_file("userfile".$id,"gelang",$id,$type_file="JPG,PNG",$sizeFile="3000000");
				if($file["validasi"]!=false)
				{
					
					$this->db->set("link_gelang",$file["name"]);
					
				}
				$var=$file;
			} 
			
			$this->db->where("id",$id);
			$this->db->update("tr_kategory"); 
		return $var["validasi"]; 
	}
	 
	 
	 function gosin2()
	{	
	 if(!isset($_FILES['userfile2']['name']))
	 {
		 echo $this->m_reff->page403();	return false;
	 }
		$sukses=0;$gagal=0;
		 $file   = explode('.',$_FILES['userfile2']['name']);
		$length = count($file);
		if($file[$length -1] == 'json'){ 
		$file = $_FILES['userfile2']['tmp_name'];
		  $file_handle = fopen($file , "rb");
	  	 $return=$line_of_text = fgets($file_handle);
		 $return=json_decode($return);
		 
		 foreach($return as $val)
		 {  
		 
			 if(isset($val->cekin)){
				$this->db->set("cekin",$val->cekin);
				$this->db->where("barcode",$val->barcode);
				$this->db->update("data_peserta_rangkaian");
			 } 
			
			 
		}
			                
		}else{
        return 'File tidak sesuai';//pesan error tipe file tidak tepat
		}
		
	}
	 
	 function ressetDatabase()
	{
		$bulan	=	date("m");
		$token	=	$this->input->post("token");
		if(1==1)
	///	if($token=="token" and ($bulan=="01" or $bulan=="02" or $bulan=="03" or $bulan=="04" or $bulan=="05" or $bulan=="06"))
		{
		 
			$this->db->query("TRUNCATE TABLE  data_persus");
			$this->db->query("TRUNCATE TABLE  data_peserta");
			$this->db->query("TRUNCATE TABLE  data_peserta_rangkaian");
			$this->db->query("TRUNCATE TABLE  data_rangkaian_acara");
			$this->db->query("TRUNCATE TABLE  main_log");
			$this->db->query("TRUNCATE TABLE  zoom_data");
			$this->db->query("TRUNCATE TABLE  zoom_event");
		}else{
			return false;
		}
	}
	function setPengiriman()
	{
		$this->db->set("default",false);
		$this->db->update("tr_pengiriman");
		
		$value	=	$this->input->post("value");
		$this->db->set("default",1);
		$this->db->where("id",$value);
		return $this->db->update("tr_pengiriman");
	}
	 
}