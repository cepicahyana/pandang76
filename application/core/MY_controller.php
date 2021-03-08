<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('vendor/autoload.php');


class MY_Controller extends CI_Controller {

	public function __construct()
	{
		
	    parent::__construct(); 
		$sessionData = $this->session->userdata();
		return false;
		if(isset($sessionData['refresh_token']))
		{
			$refreshTokenData = $this->PostRefreshToken($sessionData['refresh_token']);
			if($refreshTokenData->access_token){
				$accessTokenData = $this->PostAccessToken($refreshTokenData->access_token);
				if($accessTokenData->active){
					$this->session->set_userdata('nip',$accessTokenData->username);
					return;
				} 
			}
		}

		$this->session->sess_destroy();
		redirect('/auth');
	}

	function PostAccessToken($accesstoken){
		$config = json_decode(file_get_contents('assets/keycloak/keycloak.json'), TRUE);
		$tokenCheckResult = $this->CallApiIntrospect($config['auth-server-url'] . "/realms/".$config['realm']."/protocol/openid-connect/token/introspect", $accesstoken, BACKEND_USRPWD);

		$data = json_decode($tokenCheckResult);

		return $data;
	}

	function PostRefreshToken($refreshtoken){
		$config = json_decode(file_get_contents('assets/keycloak/keycloak.json'), TRUE);
		$tokenCheckResult = $this->CallApiRefresh($config['auth-server-url'] . "/realms/".$config['realm']."/protocol/openid-connect/token", $refreshtoken, $config['resource']);

		$data = json_decode($tokenCheckResult);

		return $data;
	}

	function CallApiIntrospect($url, $token, $usrpwd)
	{
	    $curl = curl_init();

	    curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	            'Content-Type: application/x-www-form-urlencoded')
	    );
	    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	    curl_setopt($curl, CURLOPT_USERPWD, $usrpwd);
	    $fields_string = "token=" . $token;
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	    $result = curl_exec($curl);

	    curl_close($curl);

	    return $result;
	}

	function CallApiRefresh($url, $refreshtoken, $client)
	{
	    $curl = curl_init();

	    curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	            'Content-Type: application/x-www-form-urlencoded')
	    );
	    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	    $fields_string = "client_id=" . $client;
	    $fields_string = $fields_string . "&grant_type=refresh_token";
	    $fields_string = $fields_string . "&refresh_token=" . $refreshtoken;
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	    $result = curl_exec($curl);

	    curl_close($curl);

	    return $result;
	}


} 