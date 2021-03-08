<?php 
require APPPATH . 'libraries/jwt/BeforeValidException.php';
require APPPATH . 'libraries/jwt/ExpiredException.php';
require APPPATH . 'libraries/jwt/SignatureInvalidException.php';
require APPPATH . 'libraries/jwt/JWT.php';
use \Firebase\JWT\JWT;

class Zoom_api
{
	
	  
	 function registrans($data,$meetingId)
	 {
		$ci = &get_instance();
		$ci->load->model("m_reff"); 
		$id_akun=$ci->m_reff->get_id_zoom_akun($meetingId); 
		//$id_akun		=	isset($event->id_akun)?isset($event->id_akun):"";
		
		$akun			=	$ci->m_reff->zoom_akun($id_akun); 
		$key			=	isset($akun->key)?($akun->key):"";
		$secreet		=	isset($akun->secreet)?($akun->secreet):"";
		
		 
		    $request_url = 'https://api.zoom.us/v2/meetings/'.$meetingId.'/registrants';
            $headers = array(
				'authorization: Bearer '.$this->generateJWTKey($key,$secreet),
				'content-type: application/json'
            );
           $postFields = json_encode($data);
		   $ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_URL, $request_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
			$response = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);
			if(!$response){
				return $err;
			}
			return json_decode($response,true);

	 }
	 
	 function getListRegistrant($data,$meetingID)
	 {
		 
		    $request_url = 'https://api.zoom.us/v2/meetings/'.$meetingID.'/registrants';
            $headers = array(
				'authorization: Bearer '.$this->generateJWTKey(),
				'content-type: application/json'
            );
           $postFields = json_encode($data);
		   $ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_URL, $request_url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
			$response = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);
			if(!$response){
				return $err;
			}
			return json_decode($response,true);

	 } 
	 
	  function getParticipants($data,$meetingID)
	 {
		$ci = &get_instance();
		$ci->load->model("m_reff"); 
		$id_akun=$ci->m_reff->get_id_zoom_akun($meetingID); 
		//$id_akun		=	isset($event->id_akun)?isset($event->id_akun):"";
		
		$akun			=	$ci->m_reff->zoom_akun($id_akun); 
		$key			=	isset($akun->key)?($akun->key):"";
		$secreet		=	isset($akun->secreet)?($akun->secreet):"";
		
		 
		    $request_url = 'https://api.zoom.us/v2/meetings/'.$meetingID.'/registrants?'.$data;
            $headers = array(
				'authorization: Bearer '.$this->generateJWTKey($key,$secreet),
				'content-type: application/json'
            );
           $postFields = json_encode($data);
		   $ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_URL, $request_url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
			$response = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);
			if(!$response){
				return $err;
			}
			return json_decode($response,true);

	 } 
	   function getDetailMeeting($data,$meetingID)
	 {
		$ci = &get_instance();
		$ci->load->model("m_reff"); 
		$id_akun=$ci->m_reff->get_id_zoom_akun($meetingID); 
		//$id_akun		=	isset($event->id_akun)?isset($event->id_akun):"";
		
		$akun			=	$ci->m_reff->zoom_akun($id_akun); 
		$key			=	isset($akun->key)?($akun->key):"";
		$secreet		=	isset($akun->secreet)?($akun->secreet):"";
		
		  
		     $request_url = 'https://api.zoom.us/v2/report/meetings/'.$meetingID;
             $headers = array(
				'authorization: Bearer '.$this->generateJWTKey($key,$secreet),
				'content-type: application/json'
            );
           $postFields = json_encode($data);
		   $ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_URL, $request_url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
			$response = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);
			if(!$response){
				return $err;
			}
			return json_decode($response,true);

	 } 
	 
	 function registransDelete($data,$meetingID)
	 {
		 
		    $request_url = 'https://api.zoom.us/v2/meetings/'.$meetingID.'/registrants/status';
            $headers = array(
				'authorization: Bearer '.$this->generateJWTKey(),
				'content-type: application/json'
            );
           $postFields = json_encode($data);
		   $ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_URL, $request_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
			$response = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);
			if(!$response){
				return $err;
			}
			return json_decode($response,true);

	 }
	 function generateJWTKey($key,$secreet)
	 {
		//	$ci = &get_instance();
			//$ci->load->model("m_reff"); 
		    $zoom_api_key		=  $key;//$ci->m_reff->tm_pengaturan(45);//$this->zoom_api_key;
			$zoom_api_secret	=  $secreet;//$ci->m_reff->tm_pengaturan(46);//$this->zoom_api_secret;
		    $key	=	$zoom_api_key;
		    $screet	=	$zoom_api_secret;
            $token  = array(
                "iss" => $key,
                "exp" => time() + 3600 //60 seconds as suggested
            );
            return JWT::encode( $token, $screet );
	 }
	 
	/* function meetingList($data)
	 {
		    $request_url 	= 'https://api.zoom.us/v2/users/apunir72@gmail.com/meetings';
            $headers 		= array(
				'authorization: Bearer '.$this->generateJWTKey(),
				'content-type: application/json'
            );
           $postFields = json_encode($data);
		   $ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_URL, $request_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
			$response = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);
			if(!$response){
				return $err;
			}
			return json_decode($response);
	 }
	/*function xample()
	{
			$this->load->library("zoom");
			$data=array(
			"email"			=>	"cahyanacepi@gmail.com",
			"first_name"	=>	"cepi cahyana",
			);
			$meetingID="86907851014";
			echo $this->zoom->registrans($data,$meetingID);
	}*/
	
}
