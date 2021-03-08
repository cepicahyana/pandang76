<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 
	public function getAttachment($f='')
	{
		if(isset($f))
		{	
			//mulai disini decryptnya
			$pdffile = $this->m_reff->decrypt($f);

			if (file_exists($pdffile )) 
			{
				header('Content-Description: File Transfer');
	    			header('Content-Type: application/octet-stream');
	    			header('Content-Disposition: attachment; filename="'.basename($pdffile).'"');
	    			header('Expires: 0');
	    			header('Cache-Control: must-revalidate');
	    			header('Pragma: public');
	    			header('Content-Length: ' . filesize($pdffile));
	    			readfile($pdffile);
	    			exit;
			}
		}
			
		header("HTTP/1.1 404 Not Found");
		show_404();
		return;
	}
	
	/* function insert()
	{$this->load->library("zoom_api");
				$data=array(
				"email"			=> "cahyanacepi@gmail.com",
				"first_name"	=> "cepicahyana.com",
				"last_name"		=> "subang",
				); 
				 $meetingID		=	"82414235078";
				
	  $data =	$this->zoom_api->registrans($data,$meetingID); 
	  echo 	json_encode($data);
	} 
	
	  function test()
	 {				
	 	 
	 $this->load->library("zoom_api");
	 $meetingID	=	"81251965281";
	  
				$post="page_size=1&status=approved&page_number=2 ";
				
				
			$data	= $this->zoom_api->getParticipants($post,$meetingID); 
			 //print_r($data); return false;
		     echo    $data	=	json_encode($data);
		 
			echo "<br>";
			echo "<br>";
			echo "<br>";
		         $data	=	json_decode($data,TRUE);
				$hal=1;
				// foreach($data as $key )
				// {
					 //echo $val["registrants"]["id"];
				 
					 $dt=$data["registrants"];//["registrants"]; 
					  $no=0;
					 foreach($dt as $v)
					 {
						  echo $email	= $hal." ".$dt[$no]["email"]." - ".$dt[$no]["join_url"].br();
						  $no++;$hal++;
					 }
					
			//	 }
		   
  //header('Content-type: text/javascript');
	 }  */
	 
		function api_scan()
		{	
			
			$this->load->model("m_check","event");
			$id	=	$this->session->userdata("acara");
			if($id!=1 and $id!=2 and $id!=3)
			{
				$this->m_reff->page403(); return false;
			}
			 
			 
			 echo '<!DOCTYPE html>
				<html> 
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=Edge">
					<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
					<title>pandangISTANA</title></head><body   style="background:#FFF5EE">'; 
				$this->load->view("hasil_scan".$id);
				echo "</body></html>";
			 
		}
		function souvenir_api_scan()
		{	
			 
				$this->load->view("souvenir_hasil_scan");
				 
			 
		}
	
	
	function update_souvenir()
	{
			$this->m_umum->update_souvenir();
			$post	=	$this->input->get_post("kode");
			$this->session->set_flashdata("msg","ok");
			redirect("welcome/souvenir_api_scan?v=".$post);
	}
	
	public function api_login()
	{
	$data["konten"]="api_login";
	$this->load->view('temp_mobile/main',$data);
	}
	
	public function souvenir_api_login()
	{
	$data["konten"]="souvenir_api_login";
	$this->load->view('temp_mobile/main',$data);
	}
	
	
	
	public function load()
	{
	$this->load->view('load');
	}
	function setAcara($id=null)
	{
		if($id!=1 and $id!=2 and $id!=3)
		{
			$this->m_reff->page403(); return false;
		}
		
		 $this->session->set_userdata("acara",$id);
		
		redirect("welcome/api_login");
		
	}
	function inputUlang()
	{
		$this->session->unset_userdata("acara");
		redirect("welcome/api_login");
	}
 
	
}
