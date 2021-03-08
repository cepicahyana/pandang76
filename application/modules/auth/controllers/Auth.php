<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('auth/index');
	}

	public function token()
	{
		if ($this->input->is_ajax_request()) {
			if(!empty($this->input->post('refresh_token'))) 
			{
				if ($this->agent->is_browser())
				{
			        $agent = $this->agent->browser().' '.$this->agent->version();
				}
				elseif ($this->agent->is_robot())
				{
			        $agent = $this->agent->robot();
				}
				elseif ($this->agent->is_mobile())
				{
			        $agent = $this->agent->mobile();
				}
				else
				{
			        $agent = 'Unidentified User Agent';
				}

				$newdata = array(
						        'challenge_client' => $agent . $this->input->ip_address(),
						        'refresh_token' =>$this->input->post('refresh_token')
							);

				$this->session->set_userdata($newdata);

				$response = array('status' => 'true');
				$this->output
			        ->set_status_header(200)
			        ->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response))
			        ->_display();
				exit;
			}
		} 

		show_404();
		exit;
	}
}
