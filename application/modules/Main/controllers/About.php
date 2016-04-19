<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$currentUser = $this->session->userdata('user_vars');
		if ($currentUser){		
		
			// $dashView = $this->load->view('dashboard/dashboard', $adminName, true);
			// buildPage($dashView, 'Dashboard');
			if($currentUser['status'] == '1'){
				//echo "Logging you in...";
				$this->load->view('dashboard/about');
			}else{
				$this->session->set_flashdata('msg0', 'Subscription Expired!');
				$this->session->set_flashdata('msg1', 'subscription expiration notice!');
				$this->session->set_flashdata('msg2', 'Unfortunately your subscription has expired. Please consider renewing using any of our various payment methods');
				$this->session->set_flashdata('msg3', 'Pay');
				$this->session->set_flashdata('msg4', 'Logout');
				redirect('Main/Payment');
			}
			
		}
		else{
			echo 'hey';
			redirect('Main/Login', 'refresh');
		}
	}

}

/* End of file About.php */
/* Location: ./application/modules/Main/controllers/About.php */