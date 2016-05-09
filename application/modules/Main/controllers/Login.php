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

	public function index($url = '')
	{
		


	}

	public function login($url = '')
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//declare variables
			//holding boolean for error checking
			$status1 = true;
			//username from login form
			$username = $this->input->post('txtusername');
			//password from login form
			$password = $this->input->post('txtpassword');

			$formurl = $this->input->post('url');
			
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
					notify('danger', $loginParse['parseMsg'], site_url('login'));
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
								//echo "Logging you in...";
								if (empty($formurl)) {
									redirect('dashboard');
								}else{
									$url1 = str_replace('%20', '/', $formurl);
									redirect($url1);
								}
								
							}else{
								$this->session->set_flashdata('msg0', 'Subscription Expired!');
								$this->session->set_flashdata('msg1', 'subscription expiration notice!');
								$this->session->set_flashdata('msg2', 'Unfortunately your subscription has expired. Please consider renewing using any of our various payment methods');
								$this->session->set_flashdata('msg3', 'Pay');
								$this->session->set_flashdata('msg4', 'Logout');
								redirect('payment');
							}
							
						}
						else{
							# code...
							echo "Taking you back...";
							notify('danger', "Please use the admin portal to login or contact administrator", site_url('login'));
						}
					}else{
						echo "Taking you back...";
						notify('danger', "You do not have permission to login here, please contact administrator", site_url('login'));
					}
				}
            }
				
		} else {
			if (empty($url)) {
				$currentUser = $this->session->userdata('user_vars');
				if($currentUser){
					redirect('dashboard');
				}else{
					$data = array(
						'displayData' => 'display:none'
					);

					//ParseUser::logOut();

					$this->load->view('login/login', $data);
				}
			}else{
				$currentUser = $this->session->userdata('user_vars');
				if($currentUser){
					redirect('dashboard');
				}else{
					$data = array(
						'displayData' => 'display:none',
						'url' => $url,
					);

					//ParseUser::logOut();

					$this->load->view('login/login', $data);
				}
			}
			
		}
	}

	public function signup($url = '')
	{
		if ($this->input->post('signup')) {
			$signup = $this->input->post('signup');

			$username = $signup['username'];
			$password = $signup['password'];
			$password1 = $signup['password1'];
			$fullname = $signup['fullname'];
			$phone = $signup['phone'];

			$formurl = $this->input->post('url');

			$status1 = true; 

			$this->form_validation->set_rules('signup[fullname]', 'Full Name', 'required|min_length[3]');
			$this->form_validation->set_rules('signup[phone]', 'Phone', 'required|min_length[5]');
			$this->form_validation->set_rules('signup[username]', 'Email', 'required|min_length[5]|valid_email|trim');
			$this->form_validation->set_rules('signup[password]', 'Password', 'required|min_length[8]|callback_password_check');
			$this->form_validation->set_rules('signup[password1]', 'Password  Confirmation', 'required|matches[signup[password]]|callback_password_check');

			//check validation
            if ($this->form_validation->run() == FALSE)
            {
                    $data = array(
							'displayData' => 'display:show'
							);
                   $this->load->view('login/signup', $data);
            }else{
				$signupParse = $this->login->doSignup($fullname, $username, $password, $phone);

				if (!$signupParse['status']){
					$status1 = false;
				}

				if (!$status1){
					//echo "fuck";
					notify('danger', $signupParse['parseMsg'], site_url('login'));
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

							if (empty($formurl)) {
								$this->session->set_flashdata('msg5', site_url('dashboard'));
								redirect('payment');
							}else{
								$this->session->set_flashdata('msg5', site_url($formurl));
								redirect('payments/'.$formurl);
							}
							
						}
						else{
							# code...
							echo "Taking you back...";
							notify('danger', "Please use the admin portal to login or contact administrator", site_url('login'));
						}
					}else{
						echo "Taking you back...";
						notify('danger', "You do not have permission to login here, please contact administrator", site_url('login'));
					}
				}
			}
		}else{
			if (empty($url)) {
				$currentUser = $this->session->userdata('user_vars');
				if($currentUser){
					redirect('dashboard');
				}else{
					$data = array(
						'displayData' => 'display:none'
					);

					//ParseUser::logOut();

					$this->load->view('login/signup', $data);
				}
			}else{
				$currentUser = $this->session->userdata('user_vars');
				if($currentUser){
					redirect('dashboard');
				}else{
					$data = array(
						'displayData' => 'display:none',
						'url' => $url,
					);

					//ParseUser::logOut();

					$this->load->view('login/signup', $data);
				}
			}
			
		}
	}

	public function forgotpassword()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//declare variables
			//holding boolean for error checking
			$status1 = true;
			//username from login form
			$username = $this->input->post('txtusername');
			//password from login form
			//$password = $this->input->post('txtpassword');
			
			//set validation rules
			$this->form_validation->set_rules('txtusername', 'Email', 'required|min_length[5]|valid_email|trim');
			//$this->form_validation->set_rules('txtpassword', 'Password', 'required|min_length[8]');

			//check validation
            if ($this->form_validation->run() == FALSE)
            {
                    $data = array(
							'displayData' => 'display:show'
							);
                   $this->load->view('login/forgotpassword', $data);
            }
            else
            {
            	$details = $this->db->get_where('userdetails', ['username' => $username])->row();
      
		      if($details == null){
		        notify('danger', "This Email is not registered", site_url('forgotpassword'));
		      }else{
		      	$this->mailout($username, $details->id);
		      }
            }
        }else{
        	$data = array(
					'displayData' => 'display:none'
				);

				//ParseUser::logOut();

			//$this->load->view('login/login', $data);
			$this->load->view('login/forgotpassword', $data);
        }
		
	}

	public function passwrdreset($id, $hash, $time)
	{
		$hash1 = md5($id . $time . "sme4meuserspasswordreset");
		$hashes =  strcmp($hash, $hash1);
		if ($time > time() - 1 * 60 * 60) {
			echo "Active";
			if($hashes == "0"){
				//echo "hashes match";
				redirect('passwordreset/'.$id);
			}else{
				notify('danger', 'There was a problem with the password reset link', site_url('login'));
			}
		}else{
			notify('danger', 'Password reset link expired', site_url('login'));
		}
		// $currentUser = $this->session->userdata('user_vars');
		// $id = $currentUser['userid'];
		// $time = time();
		// $hash = md5($id . $time . "sme4meuserspasswordreset"); // check this again in mailout
		// $this->mailout($id, $hash, $time);
	}

	public function passwordreset($userid = '')
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//declare variables
			//holding boolean for error checking
			$status1 = true;
			//username from login form
			$password = $this->input->post('txtpassword');
			$password1 = $this->input->post('txtpassword1');
			$id = $this->input->post('id');
			//password from login form
			//$password = $this->input->post('txtpassword');
			$passwordcheck = strcmp($password, $password1);
			if ($passwordcheck == "0") {
				//set validation rules
				//$this->form_validation->set_rules('txtusername', 'Email', 'required|min_length[5]|valid_email|trim');
				$this->form_validation->set_rules('txtpassword', 'Password', 'required|min_length[8]');
				$this->form_validation->set_rules('txtpassword1', 'Password', 'required|min_length[8]');

				//check validation
	            if ($this->form_validation->run() == FALSE)
	            {
	                    $data = array(
								'displayData' => 'display:show'
								);
	                   $this->load->view('login/passwordreset', $data);
	            }
	            else
	            {
	            	$postArray = ['password' => $password,
		                         ];
		            try {
		            	$this->db->where('id', $id);
        				$this->db->update('userdetails', $postArray);
        				notify('success', 'Password Reset Successful, try signing in now', site_url('login'));
		            } catch (Exception $ex) {
		            	notify('danger', $ex->getMessage(), site_url('passwordreset/'.$id));
		            }
		            
	            }
				
			}else{
				notify('danger', "Passwords do not match", site_url('passwordreset/'.$id));
			}
			
			
        }else{
        	$data = array(
					'displayData' => 'display:none',
					'id' => $userid,
				);

				//ParseUser::logOut();

			//$this->load->view('login/login', $data);
			$this->load->view('login/passwordreset', $data);
        }
	}

public function password_check($str)
{
   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
     return TRUE;
   }
   return FALSE;
}

	public function mailout($email, $id)
	{
		// $currentUser = $this->session->userdata('user_vars');
		// $userid = $currentUser['userid'];

		$time = time();
		$hash = md5($id . $time . "sme4meuserspasswordreset");

		$to      = $email;
    	//$to      .= 'agbani92@gmail.com';
		$subject = 'Password Reset';
		$message = '
		<!DOCTYPE html>
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<style type="text/css">
		* {
		  margin: 0;
		  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		  box-sizing: border-box;
		  font-size: 14px;
		}

		img {
		  max-width: 100%;
		}

		body {
		  -webkit-font-smoothing: antialiased;
		  -webkit-text-size-adjust: none;
		  width: 100% !important;
		  height: 100%;
		  line-height: 1.6em;
		  
		}


		table td {
		  vertical-align: top;
		}

		body {
		  background-color: #f6f6f6;
		}

		.body-wrap {
		  background-color: #f6f6f6;
		  width: 100%;
		}

		.container {
		  display: block !important;
		  max-width: 600px !important;
		  margin: 0 auto !important;
		  clear: both !important;
		}

		.content {
		  max-width: 600px;
		  margin: 0 auto;
		  display: block;
		  padding: 20px;
		}

		.main {
		  background-color: #fff;
		  border: 1px solid #e9e9e9;
		  border-radius: 3px;
		}

		.content-wrap {
		  padding: 20px;
		}

		.content-block {
		  padding: 0 0 20px;
		}

		.header {
		  width: 100%;
		  margin-bottom: 20px;
		}

		.footer {
		  width: 100%;
		  clear: both;
		  color: #999;
		  padding: 20px;
		}
		.footer p, .footer a, .footer td {
		  color: #999;
		  font-size: 12px;
		}

		h1, h2, h3 {
		  font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
		  color: #000;
		  margin: 40px 0 0;
		  line-height: 1.2em;
		  font-weight: 400;
		}

		h1 {
		  font-size: 32px;
		  font-weight: 500;
		  /* 1.2em * 32px = 38.4px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
		  /*line-height: 38px;*/
		}

		h2 {
		  font-size: 24px;
		  /* 1.2em * 24px = 28.8px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
		  /*line-height: 29px;*/
		}

		h3 {
		  font-size: 18px;
		  /* 1.2em * 18px = 21.6px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
		  /*line-height: 22px;*/
		}

		h4 {
		  font-size: 14px;
		  font-weight: 600;
		}

		p, ul, ol {
		  margin-bottom: 10px;
		  font-weight: normal;
		}
		p li, ul li, ol li {
		  margin-left: 5px;
		  list-style-position: inside;
		}


		a {
		  color: #348eda;
		  text-decoration: underline;
		}

		.btn-primary {
		  text-decoration: none;
		  color: #FFF;
		  background-color: #FF9F00;
		  border: solid #FF9F00;
		  border-width: 10px 20px;
		  line-height: 2em;
		  /* 2em * 14px = 28px, use px to get airier line-height also in Thunderbird, and Yahoo!, Outlook.com, AOL webmail clients */
		  /*line-height: 28px;*/
		  font-weight: bold;
		  text-align: center;
		  cursor: pointer;
		  display: inline-block;
		  border-radius: 5px;
		  text-transform: capitalize;
		}

		.last {
		  margin-bottom: 0;
		}

		.first {
		  margin-top: 0;
		}

		.aligncenter {
		  text-align: center;
		}

		.alignright {
		  text-align: right;
		}

		.alignleft {
		  text-align: left;
		}

		.clear {
		  clear: both;
		}

		.alert {
		  font-size: 16px;
		  color: #fff;
		  font-weight: 500;
		  padding: 20px;
		  text-align: center;
		  border-radius: 3px 3px 0 0;
		}
		.alert a {
		  color: #fff;
		  text-decoration: none;
		  font-weight: 500;
		  font-size: 16px;
		}
		.alert.alert-warning {
		  background-color: #FF9F00;
		}
		.alert.alert-bad {
		  background-color: #D0021B;
		}
		.alert.alert-good {
		  background-color: #68B90F;
		}

		.invoice {
		  margin: 40px auto;
		  text-align: left;
		  width: 80%;
		}
		.invoice td {
		  padding: 5px 0;
		}
		.invoice .invoice-items {
		  width: 100%;
		}
		.invoice .invoice-items td {
		  border-top: #eee 1px solid;
		}
		.invoice .invoice-items .total td {
		  border-top: 2px solid #333;
		  border-bottom: 2px solid #333;
		  font-weight: 700;
		}

		@media only screen and (max-width: 640px) {
		  body {
		    padding: 0 !important;
		  }

		  h1, h2, h3, h4 {
		    font-weight: 800 !important;
		    margin: 20px 0 5px !important;
		  }

		  h1 {
		    font-size: 22px !important;
		  }

		  h2 {
		    font-size: 18px !important;
		  }

		  h3 {
		    font-size: 16px !important;
		  }

		  .container {
		    padding: 0 !important;
		    width: 100% !important;
		  }

		  .content {
		    padding: 0 !important;
		  }

		  .content-wrap {
		    padding: 10px !important;
		  }

		  .invoice {
		    width: 100% !important;
		  }
		}
		</style>
		</head>

		<body itemscope itemtype="http://schema.org/EmailMessage">

		<table class="body-wrap">
			<tr>
				<td></td>
				<td class="container" width="600">
					<div class="content">
						<table class="main" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td class="alert alert-warning">
									Password Reset
								</td>
							</tr>
							<tr>
								<td class="content-wrap">
									<table width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td class="content-block">
												You have requested a password reset.
											</td>
										</tr>
										<tr>
											<td class="content-block">
												If you did not intiate a password reset, please ignore this mail.
											</td>
										</tr>
										<tr>
											<td class="content-block">
												This Link Will Expire After One Hour.
											</td>
										</tr>
										<tr>
											<td class="content-block">
												<a href="'.site_url('reset/'.$id.'/'.$hash.'/'.$time).'" class="btn-primary">Reset Password</a>
											</td>
										</tr>
										<tr>
											<td class="content-block">
												Thanks for choosing Smart Money Encyclopedia Inc.
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<div class="footer">
							
						</div></div>
				</td>
				<td></td>
			</tr>
		</table>

		</body>
		</html>';
    	// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		//$headers .= 'To: Lawrence <l.agbani@hotmail.co.uk>' . "\r\n";
		$headers .= 'From: Sme4.me <lawrence@lawrencetalks.com>' . "\r\n";
		//$headers .= 'Cc: agbani92@gmail.com' . "\r\n";
		$headers .= 'Bcc: info@sme4.me' . "\r\n";
	   try {
	   	mail($to, $subject, $message, $headers, '-flawrence@lawrencetalks.com -rlawrence@lawrencetalks.com');
	   	notify('info', "A Password reset mail has been sent to you. If you do not see it immediately, please wait for about 5 minutes", site_url('forgotpassword'));
	   	//echo "Mail sent ";
	   } catch (Exception $e) {
	   	echo "THere was a problem " . $e->getMessage();
	   }
	}
}

/* End of file login_controller.php */
/* Location: ./application/modules/login/controllers/login_controller.php */