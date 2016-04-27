<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseRelation;
use Parse\ParseACL;
use Parse\ParseRole;
use Parse\ParseQuery;
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		// Load helpers
		$this->load->model('login/Login_model', 'login');
		$this->load->helper(['notification_helper']);
		$this->load->helper(['loginval_helper']);
		$this->load->helper(['buildpage_helper']);

		// Load Parse Initialization Library (very important for login).
	    $this->load->library(array('Parseinit'));
		
	}

	public function index()
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//declare variables
			//holding boolean for error checking
			$status1 = true;
			//username from login form
			$username = $this->input->post('txtusername');
			//password from login form
			$password = $this->input->post('txtpassword');
			
			//set validation rules
			$this->form_validation->set_rules('txtusername', 'Email', 'required|min_length[5]|valid_email|trim');
			$this->form_validation->set_rules('txtpassword', 'Password', 'required|min_length[8]');

			//check validation
            if ($this->form_validation->run() == FALSE)
            {
                    $data = array(
							'displayData' => 'display:show'
							);
                   $this->load->view('login/login', $data);
            }
            else
            {
            	$loginParse = $this->login->doLogin($username, $password);

				if (!$loginParse['status']){
					$status1 = false;
				}

				if (!$status1){
					//echo "fuck";
					notify('danger', $loginParse['parseMsg'], site_url('Main/Login'));
				}else{
					$currentUser = $this->session->userdata('user_vars');
					// var_dump($currentUser);
     //  				exit;
					$accessid = $currentUser['accesslevel'];
					$roleCheck = $this->db->get_where('accesslevel', ['id' => $accessid])->row();

					if(!empty($roleCheck)){
						$role = $roleCheck->name;
						if($role == SUPER_ADMINISTRATOR || $role == USER){
							if($currentUser['status'] == '1'){
								echo "Logging you in...";
								redirect('Main/Dashboard');
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
							# code...
							echo "Taking you back...";
							notify('danger', "Please use the admin portal to login or contact administrator", site_url('Main/Login'));
						}
					}else{
						echo "Taking you back...";
						notify('danger', "You do not have permission to login here, please contact administrator", site_url('Main/Login'));
					}
				}
            }
				
		} else {
			$currentUser = $this->session->userdata('user_vars');
			if($currentUser){
				redirect('Main/Dashboard');
			}else{
				$data = array(
					'displayData' => 'display:none'
				);

				//ParseUser::logOut();

				$this->load->view('login/login', $data);
			}
		}


	}

	public function signup()
	{
		if ($this->input->post('signup')) {
			$signup = $this->input->post('signup');

			$username = $signup['username'];
			$password = $signup['password'];
			$fullname = $signup['fullname'];

			$status1 = true; 

			$this->form_validation->set_rules('signup[fullname]', 'Full Name', 'required|min_length[3]');
			$this->form_validation->set_rules('signup[username]', 'Email', 'required|min_length[5]|valid_email|trim');
			$this->form_validation->set_rules('signup[password]', 'Password', 'required|min_length[8]');

			//check validation
            if ($this->form_validation->run() == FALSE)
            {
                    $data = array(
							'displayData' => 'display:show'
							);
                   $this->load->view('login/signup', $data);
            }

			$signupParse = $this->login->doSignup($fullname, $username, $password);

				if (!$signupParse['status']){
					$status1 = false;
				}

				if (!$status1){
					//echo "fuck";
					notify('danger', $signupParse['parseMsg'], site_url('Main/Login'));
				}else{
					$currentUser = $this->session->userdata('user_vars');

					$accessid = $currentUser['accesslevel'];
					$roleCheck = $this->db->get_where('accesslevel', ['id' => $accessid])->row();
					
					if(!empty($roleCheck)){
						$role = $roleCheck->name;
						if($role == USER || $role == SUPER_ADMINISTRATOR){
							//echo "Logging you in...";
							$this->session->set_flashdata('msg0', 'Welcome!');
							$this->session->set_flashdata('msg1', 'Thank you for signing up on sme4.me!');
							$this->session->set_flashdata('msg2', '<p>You have been given a two(2) day free trial!</p>
																  <p>To extend this time click on "pay" and use one of our various payment
																options, otherwise click on "continue to site" to use the site for the
																trial period.</p>');
							$this->session->set_flashdata('msg3', 'Pay');
							$this->session->set_flashdata('msg4', 'Continue to site');
							redirect('Main/Payment');
						}
						else{
							# code...
							echo "Taking you back...";
							notify('danger', "Please use the admin portal to login or contact administrator", site_url('Main/Login'));
						}
					}else{
						echo "Taking you back...";
						notify('danger', "You do not have permission to login here, please contact administrator", site_url('Main/Login'));
					}
				}
		}else{
			$currentUser = $this->session->userdata('user_vars');
			if($currentUser){
				redirect('Main/Dashboard');
			}else{
				$data = array(
					'displayData' => 'display:none'
				);

				//ParseUser::logOut();

				$this->load->view('login/signup', $data);
			}
		}
	}

	public function forgotpassword()
	{
		# code...
	}


}

/* End of file login_controller.php */
/* Location: ./application/modules/login/controllers/login_controller.php */