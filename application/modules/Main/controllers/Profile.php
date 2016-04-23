<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper(['buildpage_helper']);
	    $this->load->library(array('Parseinit'));
	    $this->load->helper(['notification_helper']);
	    $this->load->model('login/Login_model', 'login');
	}

	public function index()
	{
		$currentUser = $this->session->userdata('user_vars');
		$adminName = $this->menu_header();
		if ($currentUser){		
		
			if($currentUser['status'] == '1'){

				$this->load->view('dashboard/profile', $adminName);

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
			//echo 'hey';
			redirect('Main/Login', 'refresh');
		}
	}

	public function edit($userid)
	{
		if ($this->input->post('editprofile')) {
			$edit = $this->input->post('editprofile');

			$currentUser = $this->session->userdata('user_vars');
			$access = $currentUser['accesslevel'];

			$username = $edit['email'];
			$firstname = $edit['firstname'];
			$lastname = $edit['lastname'];
			$fullname = $edit['fullname'];

			$status1 = true; 

			$signupParse = $this->login->doProfileEdit($fullname, $username, $userid, $firstname, $lastname);

				if (!$signupParse['status']){
					$status1 = false;
				}

				if (!$status1){
					notify('danger', $signupParse['parseMsg'], site_url('Main/Profile'));
				}else{
					notify('success', 'Profile edit successful', site_url('Main/Profile'));
				}
		}
		
	}

	public function menu_header(){

		//getting the currently logged in admin
		$currentUser = $this->session->userdata('user_vars');
		$firstName = '';
		$lastName = '';
		$url = '/Main/dashboard';
		$cssClass = 'active';
		$cssClass1 = '""';
		$cssClass2 = '""';
		$cssClass3 = '""';
		if ($currentUser) {
    		// do stuff with the user
    		$firstName = $currentUser['firstname'];
    		$lastName = $currentUser["lastname"];
    		$username = $currentUser["username"];
    		$fullname = $currentUser['fullname'];

    		$accessid = $currentUser['accesslevel'];
    		$userid = $currentUser['userid'];
			$roleCheck = $this->db->get_where('accesslevel', ['id' => $accessid])->row();
    		$role = $roleCheck->name;
    		$details = $this->db->get_where('userdetails', ['id' => $userid])->row();
    		$start = new DateTime('now');
    		$end = new DateTime($details->expDate);
    		$diff = date_diff($start, $end);
    		// var_dump($currentUser);
    		// exit;
    		

    		return array(
    		'displayData' => 'display:none',
        	'firstname' => $firstName,
        	'lastname' => $lastName,
        	'username' => $username,
        	'fullname' => $fullname,
        	'daysleft' => $diff->format("%R%a days"),
        	'redirect' => $url,
        	'accesslevel' => $accessid,
        	'role' => $role,
        	'userid' => $userid,
        	);

		} else {
    		// show the signup or login page
    		redirect('Main/Login','refresh');
		}
    }

}

/* End of file Profile.php */
/* Location: ./application/modules/Main/controllers/Profile.php */